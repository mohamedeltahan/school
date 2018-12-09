<?php

namespace App\Http\Controllers\schools;

use App\asset;
use App\book;
use App\help;
use App\Http\Controllers\technical_users\technical_usersController;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\school;
use App\student;
use App\supported_school;
use App\teacher;
use App\teachers_file;
use App\technical_user;
use App\User;
use App\teachers_material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class schoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
       /* $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $schools = school::where('name', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('library_id', 'LIKE', "%$keyword%")
                ->orWhere('governorate', 'LIKE', "%$keyword%")
                ->orWhere('center', 'LIKE', "%$keyword%")
                ->orWhere('Adminstration', 'LIKE', "%$keyword%")
                ->orWhere('mother_village', 'LIKE', "%$keyword%")
                ->orWhere('village', 'LIKE', "%$keyword%")
                ->orWhere('school_created_at', 'LIKE', "%$keyword%")
                ->orWhere('seasonal_vacation', 'LIKE', "%$keyword%")
                ->orWhere('working_hours', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('created_way', 'LIKE', "%$keyword%")
                ->orWhere('education_accelerate', 'LIKE', "%$keyword%")
                ->orWhere('levels', 'LIKE', "%$keyword%")
                ->orWhere('code', 'LIKE', "%$keyword%")
                ->orWhere('rate', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $schools = school::latest()->paginate($perPage);
        }
*/       $schools = [];

        if (technical_user::find(Auth::user()->user_id)->user_category == "مدير نظام") {

            $schools = school::all();

        } else {
            $supported_schools = supported_school::where("investor_id", Auth::user()->user_id)->get();
            foreach ($supported_schools as $supported_school) {
                $schools[] = school::where("id", $supported_school->school_id)->first();

            }
        }


        return view('schools.manage_schools',compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $technical_users=technical_user::where("user_category","جهه داعمة")->get();

        return view('schools.create_new_school',compact("technical_users"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    { $requestData = $request->all();

       /* $this->validate($request, [
			'name' => 'required',
			'address' => 'required',
			'library_id' => 'required',
			'governorate' => 'required',
			'center' => 'required',
			'Adminstration' => 'required',
			'mother_village' => 'required',
			'school_created_at' => 'required',
			'seasonal_vacation' => 'required',
			'working_hours' => 'required',
			'type' => 'required',
			'created_way' => 'required',
			'education_accelerate' => 'required',
			'levels' => 'required',
			'rate' => 'required'
		]);
       */
        $working_hours="";
        if($requestData["created_way_option"]=="option2"){$requestData["created_way"]="جهة داعمة";}
        if($requestData["created_way_option"]=="option3"){$requestData["created_way"]="جمعية اهلية";}

        $working_hours=$request->working_hours[0]."|".$request->working_hours[1];



        $requestData["working_hours"]=$working_hours;


        school::create($requestData);
        if($requestData["created_way"]=="جهة داعمة") {
            $string = $requestData["investor"];
            $technical_users = explode(":", $string);
            $id = school::max("id");
            if ($id == null) {
                $id = 1;
            }
            $record = new supported_school();
            $record->investor_id = $technical_users[1];
            $record->school_id = $id;
            $record->support_lvl = 5;
            $record->save();


        }
        return redirect('schools');
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
        $technical_users=[];
        $technical_user=null;
        $books=book::where("school_id",$id)->get();
        $school = school::findOrFail($id);
        $teachers=teacher::where("school_id",$id)->get();
        $students=student::where("school_id",$id)->get();
        $supports = DB::table('technical_users')
            ->join("supported_schools", 'supported_schools.investor_id', '=', 'technical_users.id')
            ->where("supported_schools.school_id",$id)->where("user_category","جهه داعمة")
            ->get();
        $absent_today = DB::table("students_attendances")
            ->join("students" , "students.id" , "=" , "students_attendances.student_id")
            ->join("schools" , "schools.id" , "=" , "students.school_id")
            ->select("students_attendances.student_id")
            ->where("schools.id" , "=" , $id)
            ->where("students_attendances.absent_time" , "=" , date("Y/m/d"))
            ->get()
            ->all();
        
        $absent_ids = array();
        
        for($i = 0; $i < count($absent_today) ; $i++){
            array_push($absent_ids , $absent_today[$i]->student_id);
        }
        $absent_today_teachers = DB::table("teachers_attendances")
            ->join("teachers" , "teachers.id" , "=" , "teachers_attendances.teacher_id")
            ->join("schools" , "schools.id" , "=" , "teachers.school_id")
            ->select("teachers_attendances.teacher_id")
            ->where("schools.id" , "=" , $id)
            ->where("teachers_attendances.absent_time" , "=" , date("Y/m/d"))
            ->get()
            ->all();
        
        $absent_ids_teachers = array();
        
        for($i = 0; $i < count($absent_today_teachers) ; $i++){
            array_push($absent_ids_teachers , $absent_today_teachers[$i]->teacher_id);
        }
        $assets=asset::where("school_id",$id)->where("category","اصول")->get();
        $backup=asset::where("school_id",$id)->get();
        //$backup=asset::where("school_id",$id)->where("investor_name","!=",null)->get();
        $helps=help::where("school_id",$id)->get();
        if (technical_user::find(Auth::user()->user_id)->user_category == "مدير نظام") {

            $technical_users = technical_user::where("user_category", "جهه داعمة")->get();
        }
        
        $arabic_admin = teachers_material::where("subject" , "اللغة العربية")
            ->where("teacher_id" , NULL)->get();
        $english_admin = teachers_material::where("subject" , "اللغة الانجليزية")
            ->where("teacher_id" , NULL)->get();
        $math_admin = teachers_material::where("subject" , "الرياضة")
            ->where("teacher_id" , NULL)->get();
        $religion_admin = teachers_material::where("subject" , "الدين")
            ->where("teacher_id" , NULL)->get();
        $social_admin = teachers_material::where("subject" , "دراسات")
            ->where("teacher_id" , NULL)->get();
        $science_admin = teachers_material::where("subject" , "علوم")
            ->where("teacher_id" , NULL)->get();
        
        $arabic = DB::table('teachers_materials')
            ->join('teachers' , "teachers.id" , "=" , "teachers_materials.teacher_id")
            ->select("teachers_materials.*" , "teachers.full_name")
            ->where("teachers_materials.school_id" , $id)
            ->where("subject" , "اللغة العربية")->get();
        $english = DB::table('teachers_materials')
            ->join('teachers' , "teachers.id" , "=" , "teachers_materials.teacher_id")
            ->select("teachers_materials.*" , "teachers.full_name")
            ->where("teachers_materials.school_id" , $id)
            ->where("subject" , "اللغة الانجليزية")->get();
        $religion = DB::table('teachers_materials')
            ->join('teachers' , "teachers.id" , "=" , "teachers_materials.teacher_id")
            ->select("teachers_materials.*" , "teachers.full_name")
            ->where("teachers_materials.school_id" , $id)
            ->where("subject" , "الدين")->get();
        $math = DB::table('teachers_materials')
            ->join('teachers' , "teachers.id" , "=" , "teachers_materials.teacher_id")
            ->select("teachers_materials.*" , "teachers.full_name")
            ->where("teachers_materials.school_id" , $id)
            ->where("subject" , "الرياضة")->get();
        $social = DB::table('teachers_materials')
            ->join('teachers' , "teachers.id" , "=" , "teachers_materials.teacher_id")
            ->select("teachers_materials.*" , "teachers.full_name")
            ->where("teachers_materials.school_id" , $id)
            ->where("subject" , "الدراسات")->get();
        $science = DB::table('teachers_materials')
            ->join('teachers' , "teachers.id" , "=" , "teachers_materials.teacher_id")
            ->select("teachers_materials.*" , "teachers.full_name")
            ->where("teachers_materials.school_id" , $id)
            ->where("subject" , "علوم")->get();
        return view('schools.school_profile', compact('school','teachers','students','supports',"helps","technical_users","books","assets","backup" , 'arabic' , 'arabic_admin' , 'english' , 'english_admin' , 'math',
        'math_admin' , 'religion' , 'religion_admin' , 'social' , 'social_admin' , 'science' , 'science_admin' , 'absent_ids' , 'absent_ids_teachers'));
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
        $school = school::findOrFail($id);
        $technical_users=technical_user::where("user_category","جهه داعمة")->get();
        $support=supported_school::where("school_id",$id)->get();
        $supports=$support->pluck('investor_id')->toArray();
        $create=null;
        if($school->investor!=null)
        {
            $create=explode(":",$school->investor)[0];



        }


        return view('schools.edit_school', compact('school',"technical_users","supports","create"));
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
        /*$this->validate($request, [
			'name' => 'required',
			'address' => 'required',
			'library_id' => 'required',
			'governorate' => 'required',
			'center' => 'required',
			'Adminstration' => 'required',
			'mother_village' => 'required',
			'school_created_at' => 'required',
			'seasonal_vacation' => 'required',
			'working_hours' => 'required',
			'type' => 'required',
			'created_way' => 'required',
			'education_accelerate' => 'required',
			'levels' => 'required',
			'rate' => 'required'
		]);*/
        $working_hours=$request->working_hours[0]."|".$request->working_hours[1];

        $request->working_hours=$working_hours;
        $requestData = $request->all();
        $requestData["working_hours"]=$working_hours;



       /* if($request->created_way=="جهة داعمة") {
            $string = $requestData["investor"];
            $technical_users = explode(":",$string);

            $record = new supported_school();
            $record->investor_id = $technical_users[1];
            $record->school_id = $id;
            $record->support_lvl = 5;
            $record->save();


        }
*/
            $school = school::findOrFail($id);
            $school->update($requestData);

            return redirect('schools')->with('flash_message', 'school updated!');

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
        school::destroy($id);

        return redirect('schools')->with('flash_message', 'school deleted!');
    }

    public function get_govern_schools(Request $request){
        $schools=school::where("governorate",$request->data)->get();

        return $schools;


    }


}
