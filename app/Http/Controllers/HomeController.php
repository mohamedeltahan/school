<?php

namespace App\Http\Controllers;

use App\student;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;
use Excel;
use File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('first');
    }

    public function import(Request $request){

        //validate the xls file
        $this->validate($request, array(
            'file'      => 'required'
        ));

        if($request->hasFile('file')){
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {

                $path = $request->file->getRealPath();
                $data = Excel::load($path, function($reader) {
                })->get();


                if(!empty($data) && $data->count()){

                    foreach ($data as $key => $value) {
                        if($value->account_name==null){break;}

                        $insert[] = [
                            'full_name' => $value->full_name,
                            'account_name' => $value->account_name,
                            'points' => $value->points,
                            'sex'=>$value->sex,
                            'address'=>$value->address,
                            'educate'=>$value->educate,
                             'current_state'=>$value->current_state,
                            'society'=>$value->society,
                            'level'=>$value->level,
                            'school_id'=>$value->school_id,
                            'social_status'=>$value->social_status,
                            'health_state'=>$value->health_state,
                            "talent"=>$value->talent,
                            "password"=>$value->password

                        ];
                        $insert2[] = [

                            'name' => $value->account_name,
                            "password"=>Hash::make($value->password),
                            "user_category"=>"student"

                        ];
                    }

                    if(!empty($insert)){

                        //$insertData = DB::table('students')->insert($insert);
                       foreach ($insert as $insertDatum){

                           student::create($insertDatum);
                       }
                        foreach ($insert2 as $insertDatum){

                            $user= new User();
                            $user->name=$insertDatum["name"];
                            $user->password=$insertDatum["password"];
                            $user->user_category=$insertDatum["user_category"];
                            $user->save();
                        }
                       // $insertData = DB::table('users')->insert($insert2);
                        if ($insert) {
                            Session::flash('success', 'Your Data has successfully imported');
                        }else {
                            Session::flash('error', 'Error inserting the data..');
                            return back();
                        }
                    }
                }

                return redirect()->route("students.index");

            }else {
                Session::flash('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');
                return back();
            }
        }
    }




}
