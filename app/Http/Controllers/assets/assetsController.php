<?php

namespace App\Http\Controllers\assets;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\asset;
use App\school;
use App\technical_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class assetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        /*  $assets = DB::table('schools')
              ->join('supported_schools', 'supported_schools.school_id', '=', 'schools.id')
              ->join('technical_users', 'assets.school_id', '=', 'schools.id')
              ->join('assets', 'assets.school_id', '=', 'schools.id')
              ->get();*/
        $assets = [];
        $schools = [];
        $supports = [];
        $count = 1;
        if (technical_user::find(Auth::user()->user_id)->user_category == "مدير نظام") {
            $assets = asset::all();

            foreach ($assets as $asset) {
                $schools[$asset->id] = school::find($asset->school_id);
                $supports[$asset->id] = technical_user::find($asset->investor_id);
            }

        } else if (technical_user::find(Auth::user()->user_id)->user_category == "جهه داعمة") {
            $assets = asset::where("investor_id", Auth::user()->user_id)->get();
            foreach ($assets as $asset) {
                $schools[$asset->id] = school::find($asset->school_id);
            }
        } else if (technical_user::find(Auth::user()->user_id)->user_category == "دعم فني") {
            $his_support = technical_user::find(Auth::user()->user_id)->investor_id;
            $assets = asset::where("investor_id", $his_support)->get();
            foreach ($assets as $asset) {
                $schools[$asset->id] = school::find($asset->school_id);

            }
        }

        return view('assets.manage_assets', compact('assets', "count", "schools", "supports"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $technical_users = technical_user::where("user_category", "جهه داعمة")->get();
        $schools = school::all();
        $count = 1;
        return view('assets.create_new_asset', compact("technical_users", "schools", "count"));
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
			'name' => 'required',
			'report' => 'required',
			'released_date' => 'required',
			'investor_id' => 'required',
			'school_id' => 'required',
			'counter' => 'required'
		]);*/
        $requestData = $request->all();
        if (technical_user::find(Auth::user()->user_id)->user_category == "جهه داعمة") {
            $requestData["investor_id"] = Auth::user()->user_id;
            $requestData["investor_name"] = technical_user::find(Auth::user()->user_id)->full_name;

        } else if (technical_user::find(Auth::user()->user_id)->user_category == "دعم فني") {
            $his_support = technical_user::find(Auth::user()->user_id);
            $requestData["investor_id"] = $his_support->investor_id;
            $requestData["investor_name"] = $his_support->full_name;

        } else {
            $requestData["investor_name"] = technical_user::find($requestData["investor_id"])->full_name;
        }

        if ($requestData["category"] == "option1") {
            $requestData["category"] = "اصول";
        } else if ($requestData["category"] == "option2") {
            $requestData["category"] = "صيانة";
        } else if ($requestData["category"] == "option3") {
            $requestData["category"] = "طلاب";
        }

        /* if (technical_user::find(Auth::user()->user_id)->user_category != "جهه داعمة" || technical_user::find(Auth::user()->user_id)->user_category != "مدير نظام") {
             $requestData["type"] = "asset";
         }*/

        foreach ($request->schools as $id) {
            $requestData["school_id"] = $id;
            asset::create($requestData);
        }
        return redirect('assets');
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
        $asset = asset::findOrFail($id);

        return view('assets.show', compact('asset', "technical_users", "schools"));
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
        $asset = asset::findOrFail($id);
        $technical_users = technical_user::where("user_category", "جهه داعمة")->get();
        $schools = school::all();
        $count = 1;


        return view('assets.edit_asset', compact('asset', "schools", "technical_users", "count"));
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
             'name' => 'required',
             'report' => 'required',
             'released_date' => 'required',
             'investor_id' => 'required',
             'school_id' => 'required',
             'counter' => 'required'
         ]);*/
        $requestData = $request->all();
        if ($requestData["category"] == "option1") {
            $requestData["category"] = "اصول";
        } else if ($requestData["category"] == "option2") {
            $requestData["category"] = "صيانة";
        } else if ($requestData["category"] == "option3") {
            $requestData["category"] = "طلاب";
        }

        $asset = asset::findOrFail($id);
        foreach ($request->schools as $id) {
            $requestData["school_id"] = $id;
            $asset->update($requestData);
        }


        return redirect('assets')->with('flash_message', 'asset updated!');
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
        asset::destroy($id);

        return redirect('assets')->with('flash_message', 'asset deleted!');
    }

    public function change_state($id)
    {
       $asset=asset::find($id);
       $asset->state="هالك";
       $asset->save();
       return redirect()->back();

    }
}
