<?php

namespace App\Http\Controllers\supported_schools;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\supported_school;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class supported_schoolsController extends Controller
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

        if (!empty($keyword)) {
            $supported_schools = supported_school::where('investor_id', 'LIKE', "%$keyword%")
                ->orWhere('school_id', 'LIKE', "%$keyword%")
                ->orWhere('support_lvl', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $supported_schools = supported_school::latest()->paginate($perPage);
        }

        return view('supported_schools.index', compact('supported_schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('supported_schools.create');
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
        $this->validate($request, [
			'investor_id' => 'required',
			'school_id' => 'required',
			'support_lvl' => 'required'
		]);
        $requestData = $request->all();
        
        supported_school::create($requestData);

        return redirect('supported_schools')->with('flash_message', 'supported_school added!');
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
        $supported_school = supported_school::findOrFail($id);

        return view('supported_schools.show', compact('supported_school'));
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
        $supported_school = supported_school::findOrFail($id);

        return view('supported_schools.edit', compact('supported_school'));
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
        $this->validate($request, [
			'investor_id' => 'required',
			'school_id' => 'required',
			'support_lvl' => 'required'
		]);
        $requestData = $request->all();
        
        $supported_school = supported_school::findOrFail($id);
        $supported_school->update($requestData);

        return redirect('supported_schools')->with('flash_message', 'supported_school updated!');
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
        supported_school::destroy($id);

        return redirect()->back();
    }

    /*public function delete(Request $request){
        dd($request->all());
        DB::table('supported_schools')
            ->where('school_id', '=', $request->school_id)
            ->where(function ($query) use ($request) {
                $query->where('investor_id', '=', $request->support_id);

            })
            ->delete();
      return redirect()->back();

    }*/
}
