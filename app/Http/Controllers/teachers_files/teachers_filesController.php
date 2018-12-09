<?php

namespace App\Http\Controllers\teachers_files;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\teachers_file;
use Illuminate\Http\Request;

class teachers_filesController extends Controller
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
            $teachers_files = teachers_file::where('owner_id', 'LIKE', "%$keyword%")
                ->orWhere('file_name', 'LIKE', "%$keyword%")
                ->orWhere('file_path', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $teachers_files = teachers_file::latest()->paginate($perPage);
        }

        return view('teachers_files.index', compact('teachers_files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('teachers_files.create');
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
        if ($request->hasFile("file")) {
            $file = $request->file("file");
            if ($requestData["type"] == "pp") {
                $requestData["file_name"] = "pp.jpg";
            }
            else{

                $requestData["file_name"]=$file->getClientOriginalName();
            }
            $requestData["file_path"] = "storage/teachers/" . $requestData["owner_id"];


            $file->storeAs("public/teachers/" . $requestData["owner_id"], $requestData["file_name"]);
            if ($requestData["type"] != "pp") {
                teachers_file::create($requestData);
            }
        }


        return redirect()->back();
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
        $teachers_file = teachers_file::findOrFail($id);

        return view('teachers_files.show', compact('teachers_file'));
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
        $teachers_file = teachers_file::findOrFail($id);

        return view('teachers_files.edit', compact('teachers_file'));
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
        
        $teachers_file = teachers_file::findOrFail($id);
        $teachers_file->update($requestData);

        return redirect('teachers_files')->with('flash_message', 'teachers_file updated!');
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
        $file=teachers_file::find($id);
        unlink(public_path($file->file_path."/".$file->file_name));
        teachers_file::destroy($id);

        return redirect()->back();
    }
}
