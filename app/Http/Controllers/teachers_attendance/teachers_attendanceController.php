<?php

namespace App\Http\Controllers\teachers_attendance;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

use App\teachers_attendance;
use App\teacher;
use Illuminate\Http\Request;

class teachers_attendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        // if (!empty($keyword)) {
            // $teachers_attendance = teachers_attendance::where('title', 'LIKE', "%$keyword%")
                // ->orWhere('report', 'LIKE', "%$keyword%")
                // ->orWhere('file_attached_link', 'LIKE', "%$keyword%")
                // ->orWhere('teacher_ssn', 'LIKE', "%$keyword%")
                // ->orWhere('absent_time', 'LIKE', "%$keyword%")
                // ->latest()->paginate($perPage);
        // } else {
            // $teachers_attendance = teachers_attendance::latest()->paginate($perPage);
        // }

        //return view('teachers_attendance.index', compact('teachers_attendance'));
        
        $attendances = DB::table('teachers')
            ->join('teachers_attendances' , 'teachers.id' , '=' , 'teachers_attendances.teacher_id')
            ->join('schools' , 'teachers.school_id' , '=' , 'schools.id')
            ->select('teachers.full_name' , "teachers_attendances.*" , "schools.name" , "schools.governorate","schools.Adminstration")
            ->get();
        
		
		return view('teachers_attendance.teachers_attendance' , compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('teachers_attendance.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        if(array_key_exists("tech" , $requestData)){
            foreach($requestData as $key => $val){
                if($key != "tech" && $key != "reason" && $key != "absent_time" && $key != "_token"){
                    $newdata = array(
                        "teacher_id" => $key,
                        "reason" => $requestData["reason"],
                        "absent_time" => $requestData["absent_time"],
                        "return_time" => $requestData["absent_time"],
                        "reason" => "اجازة عارضة"
                    );
                    $record = teachers_attendance::where("teacher_id" , $key)
                        ->where("absent_time" , $requestData["absent_time"])
                        ->get();
                    if($val == "on"){
                        if(!$record->count()){
                            teachers_attendance::create($newdata);
                        }
                    }
                    else{
                        if($record->count()){
                            $ta = new teachers_attendance;
                            $ta::where("teacher_id" , $key)
                                ->where("absent_time" , $requestData["absent_time"])
                                ->delete();
                            $ta->save();
                        }
                    }
                }
            }
            return redirect()->back();
        }
        else{
            switch($requestData["reason"]){
                case "option1":
                    $requestData["reason"] = "اجازة مرضية";
                    break;
                case "option2":
                    $requestData["reason"] = "اجازة عارضة";
                    break;
                case "option3":
                    $requestData["reason"] = "اجازة وضع";
                    break;
                case "option4":
                    $requestData["reason"] = "اجازة حضور تدريبات";
                    break;
                case "option5":
                    $requestData["reason"] = "اجازة حضور مؤتمرات";
                    break;
            }

            if($request->hasfile("report")){
                $file = $request->file("report");
                $filename = $file->getClientOriginalName();
                $requestData["report"] = "storage/teachers_attendance/".$requestData["teacher_id"]."/".$filename;
                $file->storeAs("public/teachers_attendance/". $requestData["teacher_id"] , $filename);
            }
        }
                
        teachers_attendance::create($requestData);

        return redirect('teachers_attendance')->with('flash_message', 'teachers_attendance added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $teachers_attendance = teachers_attendance::findOrFail($id);

        return view('teachers_attendance.show', compact('teachers_attendance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        
        $teachers_attendance = teachers_attendance::findOrFail($id);

        return view('teachers_attendance.edit', compact('teachers_attendance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $teachers_attendance = teachers_attendance::findOrFail($id);
        $old_file = $teachers_attendance['report'];
        $requestData = $request->all();
        
        switch($requestData["reason"]){
            case "option1":
                $requestData["reason"] = "اجازة مرضية";
                break;
            case "option2":
                $requestData["reason"] = "اجازة عارضة";
                break;
            case "option3":
                $requestData["reason"] = "اجازة وضع";
                break;
            case "option4":
                $requestData["reason"] = "اجازة تدريب";
                break;
            case "option5":
                $requestData["reason"] = "اجازة مؤتمر";
                break;
        }
        
        if($request->hasfile("report")){
            $file = $request->file("report");
            $filename = $file->getClientOriginalName();
            $requestData["report"] = "storage/teachers_attendance/".$requestData["teacher_id"]."/".$filename;
            $file->storeAs("public/teachers_attendance/". $requestData["teacher_id"] , $filename);
        }
        
        else{
            $requestData['report'] = $old_file;
        }
        
        $teachers_attendance->update($requestData);

        return redirect('teachers_attendance')->with('flash_message', 'teachers_attendance updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        teachers_attendance::destroy($id);

        return redirect('teachers_attendance')->with('flash_message', 'teachers_attendance deleted!');
    }
}
