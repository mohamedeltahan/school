<?php

namespace App\Http\Controllers\technical_users;

use App\asset;
use App\help;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Permission;
use App\Role;
use App\school;
use App\supported_school;
use App\technical_user;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class technical_usersController extends Controller
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
             $technical_users = technical_user::where('full_name', 'LIKE', "%$keyword%")
                 ->orWhere('account_name', 'LIKE', "%$keyword%")
                 ->orWhere('password', 'LIKE', "%$keyword%")
                 ->orWhere('user_category', 'LIKE', "%$keyword%")
                 ->orWhere('tracing_key', 'LIKE', "%$keyword%")
                 ->orWhere('ssn', 'LIKE', "%$keyword%")
                 ->orWhere('birth_date', 'LIKE', "%$keyword%")
                 ->orWhere('phone', 'LIKE', "%$keyword%")
                 ->orWhere('email', 'LIKE', "%$keyword%")
                 ->orWhere('sex', 'LIKE', "%$keyword%")
                 ->orWhere('address', 'LIKE', "%$keyword%")
                 ->orWhere('education', 'LIKE', "%$keyword%")
                 ->orWhere('hiring_date', 'LIKE', "%$keyword%")
                 ->orWhere('salary', 'LIKE', "%$keyword%")
                 ->orWhere('salary_investor_id', 'LIKE', "%$keyword%")
                 ->orWhere('experience_years', 'LIKE', "%$keyword%")
                 ->orWhere('job_type', 'LIKE', "%$keyword%")
                 ->latest()->paginate($perPage);
         } else {


             $technical_users = technical_user::latest()->paginate($perPage);
        */
        $technical_users = [];
        $head = [];

        if (technical_user::find(Auth::user()->user_id)->user_category == "مدير نظام") {
            $technical_users = technical_user::all();


        } else if (technical_user::find(Auth::user()->user_id)->user_category == "جهه داعمة") {
            $technical_users = technical_user::where("investor_id", Auth::user()->user_id)->get();

        }


        foreach ($technical_users as $technical_user) {
            if ($technical_user->user_category == "دعم فني") {
                $head[$technical_user->id] = $technical_user::findOrFail($technical_user->investor_id)->full_name;
            }
        }


        return view('technical_users.manage_users', compact('technical_users', "head"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // $schools = school::all();
        $permissions = Permission::all();
        $supports = technical_user::where("user_category", "جهه داعمة")->get();
		
		$schools= DB::table("schools")
			->select('schools.id', 'schools.name', 'schools.governorate', 'schools.Adminstration', 'supported_schools.investor_id AS investor')
            ->join("supported_schools" , "schools.id" , "=" , "supported_schools.school_id", 'left outer')
            ->get();
		
		// dd($output);
		
        $count = 1;
        return view('technical_users.create_new_user', compact("schools", "supports", "count", "permissions"));
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
        /*$this->validate($request, [
			'full_name' => 'required',
			'account_name' => 'required',
			'password' => 'required',
			'user_category' => 'required',
			'tracing_key' => 'required',
			'ssn' => 'required',
			'birth_date' => 'required',
			'phone' => 'required',
			'sex' => 'required',
			'address' => 'required',
			'education' => 'required',
			'hiring_date' => 'required',
			'salary' => 'required',
			'salary_investor_id' => 'required',
			'experience_years' => 'required',
			'job_type' => 'required'
		]);*/
        // dd($request->all());
        $requestData = $request->all();
        dd($requestData);
        $requestData["education"] = $requestData["education"][0] . ":" . $requestData["education"][1];

        technical_user::create($requestData);
        $requestData["user_id"] = technical_user::max("id");

        $requestData["user_category"] = "technical_user";
        $requestData["password"] = Hash::make($requestData['password']);
        $requestData["name"] = $requestData["account_name"];
        $requestData["label"] = $requestData["account_name"];

        User::create($requestData);


        if ($request->filled('permissions')) {

            $role = Role::create($requestData);
            $role->permissions()->detach();
            foreach ($request->permissions as $permission_name) {
                $permission = Permission::whereName($permission_name)->first();
                $role->givePermissionTo($permission);
            }
            $id = User::max("id");
            if ($id == null) {
                $id = 1;
            }
            $user = User::find($id);

            $user->assignRole($role->name);
        } else {


            if ($request->user_category == "مدير نظام" || $request->user_category == "جهه داعمة") {

                $id = User::max("id");
                if ($id == null) {
                    $id = 1;
                }
                $user = User::find($id);
                $user->assignRole("high");

            }


        }

        if ($request->user_catogry != "مدير نظام" && $request->has("schools")) {

            $supported_schools = $request->schools;
            foreach ($supported_schools as $school) {
                $id = technical_user::max("id");
                if ($id == null) {
                    $id = 1;
                }
                $record = new supported_school();
                $record->investor_id = $id;
                $record->school_id = $school;
                $record->support_lvl = 5;
                $record->save();

            }


        }


        return redirect('technical_users')->with('flash_message', 'technical_user added!');
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
        $technical_user = technical_user::findOrFail($id);
        $head = "";
        if ($technical_user->user_category == "دعم فني") {
            $head = $technical_user::findOrFail($technical_user->investor_id)->full_name;


        }
        $schools = DB::table('schools')
            ->join('supported_schools', 'schools.id', '=', 'supported_schools.school_id')
            ->where("supported_schools.investor_id", $id)
            ->get();

        $assets = asset::where("investor_id", $id)->get();
        $schools_take_asset = [];
        foreach ($assets as $asset) {
            $schools_take_asset[$asset->id] = school::where("id", $asset->school_id)->first();

        }
        $count = 1;
        $supported_schools_id = supported_school::where("investor_id", $id)->get()->pluck('school_id');
        $helps = [];
        foreach ($supported_schools_id as $id) {

            $helps[] = help::where("school_id", $id)->get();
        }

        return view('technical_users.user_profile', compact('technical_user', "schools", "helps", "count", "head", "assets", "schools_take_asset"));
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


        $technical_user = technical_user::findOrFail($id);
        $supports = technical_user::where("user_category", "جهه داعمة")->get();
        // $schools = school::all();
        $support = supported_school::where("investor_id", $id)->get();
        /*$user=User::where("user_id",$id)->first();

        $rolee=DB::table("role_user")->where("user_id",$user->id)->first();
        $role = Role::findOrFail($rolee->role_id);
        dd($role->permissions()->detach());
        $permissions=DB::table("permission_role")->where("role_id",$role->role_id)->get();
        $temp=Permission;
        User::get
        $user = User::with('roles')->select('id', 'name', 'email')->findOrFail($user->id);
        $user_roles = [];
        foreach ($user->roles as $role) {
            $user_roles[] = $role->name;
        }*/
        $permissions = Permission::all();

		$schools= DB::table("schools")
			->select('schools.id', 'schools.name', 'schools.governorate', 'schools.Adminstration', 'supported_schools.investor_id AS investor')
            ->join("supported_schools" , "schools.id" , "=" , "supported_schools.school_id", 'left outer')
            ->get();

        $supporters = $support->pluck('school_id')->toArray();

        $count = 0;
        return view('technical_users.edit_user', compact("permissions", 'technical_user', "supports", "schools", "count", "supporters"));
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
             'account_name' => 'required',
             'password' => 'required',
             'user_category' => 'required',
             'tracing_key' => 'required',
             'ssn' => 'required',
             'birth_date' => 'required',
             'phone' => 'required',
             'sex' => 'required',
             'address' => 'required',
             'education' => 'required',
             'hiring_date' => 'required',
             'salary' => 'required',
             'salary_investor_id' => 'required',
             'experience_years' => 'required',
             'job_type' => 'required'
         ]);*/

        $requestData = $request->all();

        $requestData["education"] = $requestData["education"][0] . ":" . $requestData["education"][1];

        $technical_user = technical_user::findOrFail($id);
        $technical_user->update($requestData);
        if ($request->user_catogry != "مدير نظام" && $request->has("schools")) {
            foreach ($requestData["schools"] as $school) {
                $temp = DB::table('supported_schools')
                    ->where('investor_id', $id)
                    ->where(function ($query) use ($school) {
                        $query->where('school_id', $school);

                    })->first();
                if ($temp == null) {
                    $record = new supported_school();
                    $record->investor_id = $id;
                    $record->school_id = $school;
                    $record->support_lvl = 5;
                    $record->save();
                }
            }
        }
        $user = User::where("user_id", $id)->first();

        $rolee = DB::table("role_user")->where("user_id", $user->id)->delete();

        $requestData["name"] = $requestData["account_name"].Carbon::now()->toDateString();
        $requestData["label"] = $requestData["account_name"].Carbon::now()->toDateString();
        $role = Role::create($requestData);
        $role->permissions()->detach();
        foreach ($request->permissions as $permission_name) {


                $permission = Permission::whereName($permission_name)->first();

                $role->givePermissionTo($permission);


        }
        $user->assignRole($role->name);

        return redirect('technical_users')->with('flash_message', 'technical_user updated!');
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
        technical_user::destroy($id);

        return redirect('technical_users')->with('flash_message', 'technical_user deleted!');
    }

    public function a()
    {
        /*$schools = DB::table('technical_users')
            ->leftJoin('supported_schools', 'supported_schools.investor_id', '=', 'technical_users.id')
            ->leftJoin('schools', 'schools.id', '=', 'supported_schools.id')
            ->select( 'schools.name')->where("supported_schools.id",1)
            ->get();*/


    }

    public function get_my_schools(Request $request)
    {
        $schools = [];
        $supported_schools_id = supported_school::where("investor_id", $request->data)->get()->pluck("school_id")->toArray();

        foreach ($supported_schools_id as $id) {

            $schools[] = school::where("id", $id)->first();

        }

        return $schools;


    }

}
