<?php

namespace App\Http\Controllers\supported_students;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\supported_student;
use Illuminate\Http\Request;

class supported_studentsController extends Controller
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
            $supported_students = supported_student::where('investors_id', 'LIKE', "%$keyword%")
                ->orWhere('student_ssn', 'LIKE', "%$keyword%")
                ->orWhere('support_lvl', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $supported_students = supported_student::latest()->paginate($perPage);
        }

        return view('supported_students.index', compact('supported_students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('supported_students.create');
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
        
        supported_student::create($requestData);

        return redirect('supported_students')->with('flash_message', 'supported_student added!');
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
        $supported_student = supported_student::findOrFail($id);

        return view('supported_students.show', compact('supported_student'));
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
        $supported_student = supported_student::findOrFail($id);

        return view('supported_students.edit', compact('supported_student'));
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
        
        $supported_student = supported_student::findOrFail($id);
        $supported_student->update($requestData);

        return redirect('supported_students')->with('flash_message', 'supported_student updated!');
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
        supported_student::destroy($id);

        return redirect('supported_students')->with('flash_message', 'supported_student deleted!');
    }
}
