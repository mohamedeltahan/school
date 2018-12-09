<?php

namespace App\Http\Controllers\students_files;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\students_file;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class students_filesController extends Controller
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
            $students_files = students_file::where('owner_id', 'LIKE', "%$keyword%")
                ->orWhere('file_name', 'LIKE', "%$keyword%")
                ->orWhere('file_path', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $students_files = students_file::latest()->paginate($perPage);
        }

        return view('students_files.index', compact('students_files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('students_files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {   // Storage::makeDirectory($requestData["id"]);
        //$directories = Storage::allDirectories("public");


        $requestData = $request->all();
        if ($request->hasFile("file")) {
            $file = $request->file("file");
            if ($requestData["type"] == "pp") {
                $requestData["file_name"] = "pp.jpg";
            }
            else{

                $requestData["file_name"]=$file->getClientOriginalName();
            }
            $requestData["file_path"] = "storage/students/" . $requestData["owner_id"];


            $file->storeAs("public/students/" . $requestData["owner_id"], $requestData["file_name"]);
            if ($requestData["type"] != "pp") {
                students_file::create($requestData);
            }
        }
        return redirect()->back();
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
        $students_file = students_file::findOrFail($id);

        return view('students_files.show', compact('students_file'));
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
        $students_file = students_file::findOrFail($id);

        return view('students_files.edit', compact('students_file'));
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

        $students_file = students_file::findOrFail($id);
        $students_file->update($requestData);

        return redirect('students_files')->with('flash_message', 'students_file updated!');
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
        $file=students_file::find($id);
        unlink(public_path($file->file_path."/".$file->file_name));
        students_file::destroy($id);


        return redirect()->back();
    }
}
