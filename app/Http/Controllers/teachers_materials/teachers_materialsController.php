<?php

namespace App\Http\Controllers\teachers_materials;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\teachers_material;
use Illuminate\Http\Request;

class teachers_materialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // $keyword = $request->get('search');
        // $perPage = 25;

        // if (!empty($keyword)) {
            // $teachers_materials = teachers_material::where('file_name', 'LIKE', "%$keyword%")
                // ->orWhere('file_directory', 'LIKE', "%$keyword%")
                // ->orWhere('teacher_ssn', 'LIKE', "%$keyword%")
                // ->orWhere('level', 'LIKE', "%$keyword%")
                // ->orWhere('subject', 'LIKE', "%$keyword%")
                // ->orWhere('semester', 'LIKE', "%$keyword%")
                // ->orWhere('lesson', 'LIKE', "%$keyword%")
                // ->orWhere('unit', 'LIKE', "%$keyword%")
                // ->latest()->paginate($perPage);
        // } else {
            // $teachers_materials = teachers_material::latest()->paginate($perPage);
        // }
        
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
            

        // return view('teachers_materials.index', compact('teachers_materials'));
        return view('teachers_materials.teachers_materials' , compact('arabic_admin' , 'english_admin' , 'math_admin' , 'religion_admin' , 'social_admin' , 'science_admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('teachers_materials.create');
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
        
        if($request->hasfile("file_directory")){
            $file = $request->file("file_directory");
            $filename = $file->getClientOriginalName();
            if(!array_key_exists("teacher_id" , $requestData)){
                $requestData["file_directory"] = "storage/materials/admins/".$filename;
                $stored_name = "public/materials/admins/";
            }
            else{
                $requestData["file_directory"] = "storage/materials/".$requestData["teacher_id"]."/".$requestData["school_id"]."/"; 
                $stored_name = "public/materials/".$requestData["teacher_id"]."/".$requestData["school_id"]."/"; 
            }
            $file->storeAs($stored_name , $filename);
        }        
        
        teachers_material::create($requestData);
        if(!array_key_exists("school_id", $requestData)){
            return redirect('teachers_materials')->with('flash_message', 'teachers_material added!');   
        }
        else{
            return redirect('schools/'.$requestData['school_id'])->with('flash_message', 'teachers_material added!');
        }
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
        $teachers_material = teachers_material::findOrFail($id);

        return view('teachers_materials.show', compact('teachers_material'));
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
        $teachers_material = teachers_material::findOrFail($id);

        return view('teachers_materials.edit', compact('teachers_material'));
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
        $teachers_material = teachers_material::findOrFail($id);
        if($request->hasfile("file_directory")){
            $file = $request->file("file_directory");
            $filename = $file->getClientOriginalName();
            if(!array_key_exists("teacher_id" , $requestData)){
                $requestData["file_directory"] = "storage/materials/admins/".$filename;
                $stored_name = "public/materials/admins/";
            }
            else{
                $requestData["file_directory"] = "storage/materials/".$requestData["teacher_id"]."/".$requestData["school_id"]."/"; 
                $stored_name = "public/materials/".$requestData["teacher_id"]."/".$requestData["school_id"]."/"; 
            }
            $file->storeAs($stored_name , $filename);
        }
        else{
            if(!$requestData["file_link"]){
                $old_file = $teachers_material->file_directory;
                $requestData["file_directory"] = $old_file;
            }
        }
        $teachers_material->update($requestData);
        
        if(!array_key_exists("school_id", $requestData)){
            return redirect('teachers_materials')->with('flash_message', 'teachers_material added!');   
        }
        else{
            return redirect('schools/'.$requestData['school_id'])->with('flash_message', 'teachers_material added!');
        }
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
        teachers_material::destroy($id);

        return redirect('teachers_materials')->with('flash_message', 'teachers_material deleted!');
    }
}
