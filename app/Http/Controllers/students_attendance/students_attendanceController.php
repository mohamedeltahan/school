<?php

namespace App\Http\Controllers\students_attendance;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\students_attendance;
use Illuminate\Http\Request;
use DB;
class students_attendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // $keyword = $request->get('search');
        // $perPage = 25;

        // if (!empty($keyword)) {
            // $students_attendance = students_attendance::where('title', 'LIKE', "%$keyword%")
                // ->orWhere('report', 'LIKE', "%$keyword%")
                // ->orWhere('file_attached_link', 'LIKE', "%$keyword%")
                // ->orWhere('student_ssn', 'LIKE', "%$keyword%")
                // ->orWhere('absent_time', 'LIKE', "%$keyword%")
                // ->latest()->paginate($perPage);
        // } else {
            // $students_attendance = students_attendance::latest()->paginate($perPage);
        // }

        // return view('students_attendance.students_attendance'), compact('students_attendance'));
        $attendances = DB::table('students')
            ->join('students_attendances' , 'students.id' , '=' , 'students_attendances.student_id')
            ->join('schools' , 'students.school_id' , '=' , 'schools.id')
            ->select('students.full_name' , "students_attendances.*" , "schools.name" , "schools.governorate","schools.Adminstration")
            ->get();
        return view('students_attendance.students_attendance' , compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('students_attendance.create');
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
                        "student_id" => $key,
                        "reason" => $requestData["reason"],
                        "absent_time" => $requestData["absent_time"],
                        "return_time" => $requestData["absent_time"],
                        "reason" => "اجازة بدون اذن"
                    );
                    $record = students_attendance::where("student_id" , $key)
                        ->where("absent_time" , $requestData["absent_time"])
                        ->get();
                    if($val == "on"){
                        if(!$record->count()){
                            students_attendance::create($newdata);
                        }
                    }
                    else{
                        if($record->count()){
                            $sa = new students_attendance;
                            $sa::where("student_id" , $key)
                                ->where("absent_time" , $requestData["absent_time"])
                                ->delete();
                            $sa->save();
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
                    $requestData["reason"] = "اجازة بدون اذن";
                    break;
            }

            if($request->hasfile("report")){
                $file = $request->file("report");
                $filename = $file->getClientOriginalName();
                $requestData["report"] = "storage/student_attendances/".$requestData["student_id"]."/".$filename;
                $file->storeAs("public/student_attendances/". $requestData["student_id"] , $filename);
            }

            students_attendance::create($requestData);
        }

        return redirect('students_attendance')->with('flash_message', 'student_attendance added!');
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
        $students_attendance = students_attendance::findOrFail($id);

        return view('students_attendance.show', compact('students_attendance'));
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
        $students_attendance = students_attendance::findOrFail($id);

        return view('students_attendance.edit', compact('students_attendance'));
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
        
        $requestData = $request->all();
        $students_attendance = students_attendance::findOrFail($id);
        $old_file = $students_attendance['report'];
        
            switch($requestData["reason"]){
                case "option1":
                    $requestData["reason"] = "اجازة مرضية";
                    break;
                case "option2":
                    $requestData["reason"] = "اجازة بدون اذن";
                    break;
        }
        
        if($request->hasfile("report")){
            $file = $request->file("report");
            $filename = $file->getClientOriginalName();
            $requestData["report"] = "storage/student_attendances/".$requestData["student_id"]."/".$filename;
            $file->storeAs("public/student_attendances/". $requestData["student_id"] , $filename);
        }
        
        else{
            $students_attendance["report"] = $old_file;
        }
        
        $students_attendance->update($requestData);

        return redirect('students_attendance')->with('flash_message', 'students_attendance updated!');
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
        students_attendance::destroy($id);

        return redirect('students_attendance')->with('flash_message', 'students_attendance deleted!');
    }
}
