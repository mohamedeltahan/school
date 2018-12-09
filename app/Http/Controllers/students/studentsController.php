<?php

namespace App\Http\Controllers\students;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\school;
use App\student;
use App\students_file;
use App\supported_school;
use App\technical_user;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class studentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        /*$keyword = $request->get('search');
          $perPage = 25;

          if (!empty($keyword)) {
              $students = student::where('full_name', 'LIKE', "%$keyword%")
                  ->orWhere('ssn', 'LIKE', "%$keyword%")
                  ->orWhere('birth_date', 'LIKE', "%$keyword%")
                  ->orWhere('sex', 'LIKE', "%$keyword%")
                  ->orWhere('religion', 'LIKE', "%$keyword%")
                  ->orWhere('educate', 'LIKE', "%$keyword%")
                  ->orWhere('current_state', 'LIKE', "%$keyword%")
                  ->orWhere('society', 'LIKE', "%$keyword%")
                  ->orWhere('email', 'LIKE', "%$keyword%")
                  ->orWhere('level', 'LIKE', "%$keyword%")
                  ->orWhere('password', 'LIKE', "%$keyword%")
                  ->orWhere('school_id', 'LIKE', "%$keyword%")
                  ->orWhere('report', 'LIKE', "%$keyword%")
                  ->orWhere('social_status', 'LIKE', "%$keyword%")
                  ->orWhere('talent', 'LIKE', "%$keyword%")
                  ->orWhere('health_state', 'LIKE', "%$keyword%")
                  ->orWhere('points', 'LIKE', "%$keyword%")
                  ->latest()->paginate($perPage);
          } else {
              $students = student::latest()->paginate($perPage);
          }*/
		  
        $schools  = [];
        $students = [];
        if (technical_user::find(Auth::user()->user_id)->user_category == "مدير نظام") {
            $schools = school::all();
            foreach ($schools as $school) {
                $students[$school->id] = student::where("school_id", $school->id)->get()->toArray();
            }

        } else {
            $supported_schools = supported_school::where("investor_id", Auth::user()->user_id)->get();
            foreach ($supported_schools as $supported_school) {
                $schools[] = school::where("id", $supported_school->school_id)->first();
                $students[$supported_school->school_id] = student::where("school_id", $supported_school->school_id)->get()->toArray();
            }
        }

        return view('students.manage_students', compact('students', "schools"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if (!session()->exists("school_id")) {
            $schools = school::all();
        } else {
            $schools = school::where("id", session()->get("school_id"))->first();

        }
        $technical_users = technical_user::where("user_category", "جهه داعمة")->get();
        $count = 1;
        return view('students.create_new_student', compact("schools", "technical_users", "count"));
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
        /* $this->validate($request, [
             'full_name' => 'required',
             'ssn' => 'required',
             'birth_date' => 'required',
             'sex' => 'required',
             'religion' => 'required',
             'educate' => 'required',
             'current_state' => 'required',
             'society' => 'required',
             'level' => 'required',
             'password' => 'required',
             'school_id' => 'required',
             'social_status' => 'required',
             'health_state' => 'required',
             'points' => 'required'
         ]);*/

        $requestData = $request->all();

        $requestData["relation"] = json_encode($requestData["relation"]);

        if (session()->exists("school_id")) {

            $requestData["school_id"] = session()->get("school_id");

        }

        student::create($requestData);
        $requestData["student_id"] = student::max("id");
        $requestData["user_category"] = "student";
        $requestData["name"] = $requestData["account_name"];

        User::create($requestData);
        session()->forget("school_id");

        return redirect('students')->with('flash_message', 'student added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $student = student::findOrFail($id);
        $student["relation"] = json_decode($student->relation);


        $school = school::where("id", $student->school_id)->first();
        $files = students_file::where("owner_id", $id)->get();
        return view('students.student_profile', compact('student', 'school', "files"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $schools = school::all();

        $student = student::findOrFail($id);
        $student["relation"] = json_decode($student->relation);

        $technical_users = technical_user::where("user_category", "جهه داعمة")->get();

        return view('students.edit_student', compact('student', 'technical_users', 'schools'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        /* $this->validate($request, [
             'full_name' => 'required',
             'ssn' => 'required',
             'birth_date' => 'required',
             'sex' => 'required',
             'religion' => 'required',
             'educate' => 'required',
             'current_state' => 'required',
             'society' => 'required',
             'level' => 'required',
             'password' => 'required',
             'school_id' => 'required',
             'social_status' => 'required',
             'health_state' => 'required',
             'points' => 'required'
         ]);*/
        $requestData = $request->all();
        $requestData["relation"] = json_encode($requestData["relation"]);

        $student = student::findOrFail($id);
        $user=User::where("user_id",$id)->first();
        $user->update($requestData);

        $student->update($requestData);

        return redirect('students')->with('flash_message', 'student updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        student::destroy($id);

        return redirect('students')->with('flash_message', 'student deleted!');
    }

    public function addstudentforschool($id)
    {


        session()->put('school_id', $id);
        return $this->create();

    }

}
