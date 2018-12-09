<?php

namespace App\Http\Controllers\supported_teachers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\supported_teacher;
use Illuminate\Http\Request;

class supported_teachersController extends Controller
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
            $supported_teachers = supported_teacher::where('investors_id', 'LIKE', "%$keyword%")
                ->orWhere('teacher_ssn', 'LIKE', "%$keyword%")
                ->orWhere('support_lvl', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $supported_teachers = supported_teacher::latest()->paginate($perPage);
        }

        return view('supported_teachers.index', compact('supported_teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('supported_teachers.create');
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
        
        supported_teacher::create($requestData);

        return redirect('supported_teachers')->with('flash_message', 'supported_teacher added!');
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
        $supported_teacher = supported_teacher::findOrFail($id);

        return view('supported_teachers.show', compact('supported_teacher'));
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
        $supported_teacher = supported_teacher::findOrFail($id);

        return view('supported_teachers.edit', compact('supported_teacher'));
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
        
        $supported_teacher = supported_teacher::findOrFail($id);
        $supported_teacher->update($requestData);

        return redirect('supported_teachers')->with('flash_message', 'supported_teacher updated!');
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
        supported_teacher::destroy($id);

        return redirect('supported_teachers')->with('flash_message', 'supported_teacher deleted!');
    }
}
