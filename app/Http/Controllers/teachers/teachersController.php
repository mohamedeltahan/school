<?php

namespace App\Http\Controllers\teachers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\school;
use App\supported_school;
use App\teacher;
use App\teachers_file;
use App\technical_user;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class teachersController extends Controller
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
             $teachers = teacher::where('full_name', 'LIKE', "%$keyword%")
                 ->orWhere('account_name', 'LIKE', "%$keyword%")
                 ->orWhere('password', 'LIKE', "%$keyword%")
                 ->orWhere('tracing_key', 'LIKE', "%$keyword%")
                 ->orWhere('ssn', 'LIKE', "%$keyword%")
                 ->orWhere('birth_date', 'LIKE', "%$keyword%")
                 ->orWhere('phone', 'LIKE', "%$keyword%")
                 ->orWhere('email', 'LIKE', "%$keyword%")
                 ->orWhere('sex', 'LIKE', "%$keyword%")
                 ->orWhere('addres', 'LIKE', "%$keyword%")
                 ->orWhere('education', 'LIKE', "%$keyword%")
                 ->orWhere('hiring_date', 'LIKE', "%$keyword%")
                 ->orWhere('salary', 'LIKE', "%$keyword%")
                 ->orWhere('salary_investor_id', 'LIKE', "%$keyword%")
                 ->orWhere('experience_years', 'LIKE', "%$keyword%")
                 ->orWhere('job_type', 'LIKE', "%$keyword%")
                 ->latest()->paginate($perPage);
         } else {
             $teachers = teacher::latest()->paginate($perPage);
         }*/

        // $teachers=teacher::all();
        $supported_schools = [];
        $teachers = [];
        $schools = [];

        if (technical_user::find(Auth::user()->user_id)->user_category != "مدير نظام") {
            $supported_schools = supported_school::where("investor_id", Auth::user()->user_id)->get();


            foreach ($supported_schools as $supported_school) {
                $schools[] = school::where("id", $supported_school->id)->first();

                $teachers[$supported_school->id] = teacher::where("school_id", $supported_school->school_id)->get();


            }



        } else {
            $schools = school::all();
            foreach ($schools as $school) {

                $teachers[$school->id] = teacher::where("school_id", $school->id)->get();


            }


        }

        return view('teachers.manage_teachers', compact('teachers', "schools"));
        //return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $schools = [];
        $technical_users = technical_user::where("user_category", "جهه داعمة")->get();
        if (technical_user::find(Auth::user()->user_id)->user_category == "مدير نظام") {
            $schools = school::all();
        } else {
            $supported_schools=supported_school::where("investor_id",(Auth::user()->user_id))->get();
            foreach ($supported_schools as $supported_school) {
                $schools[] = school::where("id", $supported_school->school_id)->first();
            }
        }
        return view('teachers.create_new_teacher', compact("schools", "technical_users"));
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
        $requestData["education"] = $requestData["education"][0] . ":" . $requestData["education"][1];

        teacher::create($requestData);
        $requestData["teacher_id"] = teacher::max("id");
        $requestData["user_category"] = "teacher";
        $requestData["name"] = $requestData["account_name"];

        User::create($requestData);

        return redirect('teachers')->with('flash_message', 'teacher added!');
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
        $teacher = teacher::findOrFail($id);
        $school = school::where("id", $teacher->school_id)->first();
        $technical_user = technical_user::where("id", $teacher->salary_investor_id)->first();

        /*$technical_user=explode(":",$teacher->salary_investor);
        if($technical_user[1]==-1){$teacher->salary_investor=$technical_user[0];}
        else{$teacher->salary_investor=technical_user::where("id",$technical_user[1])->first()->full_name;}*/
        $files = teachers_file::where('owner_id', $id)->get();

        return view('teachers.teacher_profile', compact('teacher', 'files', "technical_user", "school"));
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
        $teacher = teacher::findOrFail($id);

        $technical_users = technical_user::where("user_category", "جهه داعمة")->get();
        return view('teachers.edit_teacher', compact('teacher', "technical_users"));
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

        $requestData = $request->all();

        $teacher = teacher::findOrFail($id);
        $requestData["education"] = $requestData["education"][0] . ":" . $requestData["education"][1];

        $teacher->update($requestData);

        return redirect('teachers')->with('flash_message', 'teacher updated!');
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
        teacher::destroy($id);

        return redirect('teachers')->with('flash_message', 'teacher deleted!');
    }

    public function viewall()
    {
        $teachers = teacher::all();
        return view('teachers.manage_teachers', compact('teachers'));
    }
}
