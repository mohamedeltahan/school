<?php

namespace App\Http\Controllers\reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	     

	
    public function index()
    {

        $male_gov = ReportsController::get_all_gov("ذكر")->all();
        $female_gov = ReportsController::get_all_gov("انثي")->all();
        $governments = array();
        for($i = 0 ; $i < count($male_gov) ; $i++){
            if(!in_array($male_gov[$i]->governorate , $governments)){
                array_push($governments , $male_gov[$i]->governorate);
            }
        }
        for($i = 0 ; $i < count($female_gov) ; $i++){
            if(!in_array($female_gov[$i]->governorate , $governments)){
                array_push($governments , $female_gov[$i]->governorate);
            }
        }
        $num_gov = count($governments);
        $gov_array = array();
        for($i = 0 ; $i < $num_gov ; $i++){
            $gov_name = $governments[$i];
            $male_stats = 0;
            $female_stats = 0;
            for($j = 0 ; $j < count($male_gov) ; $j++){
                if($male_gov[$j]->governorate == $gov_name){
                    $male_stats = $male_gov[$j]->cnt;
                } 
            }
            for($j = 0 ; $j < count($female_gov) ; $j++){
                if($female_gov[$j]->governorate == $gov_name){
                    $female_stats = $female_gov[$j]->cnt;
                } 
            }
            $sub_arr = array(
                "gov_name" => $gov_name,
                "male_stats" => $male_stats,
                "female_stats" => $female_stats,
                "top_centers" => ReportsController::get_top_centers($gov_name)
            );
            array_push($gov_array , $sub_arr);
        }
        $male_adm = ReportsController::get_all_adm("ذكر")->all();
        $female_adm = ReportsController::get_all_adm("انثي")->all();
        $adms = array();
        for($i = 0 ; $i < count($male_adm) ; $i++){
            if(!in_array($male_adm[$i]->adminstration , $adms)){
                array_push($adms , $male_adm[$i]->adminstration);
            }
        }
        for($i = 0 ; $i < count($female_adm) ; $i++){
            if(!in_array($female_adm[$i]->adminstration , $adms)){
                array_push($adms , $female_adm[$i]->adminstration);
            }
        }
        $num_adm = count($adms);
        $adm_array = array();
        for($i = 0 ; $i < $num_gov ; $i++){
            $adm_name = $adms[$i];
            $male_stats = 0;
            $female_stats = 0;
            for($j = 0 ; $j < count($male_adm) ; $j++){
                if($male_adm[$j]->adminstration == $adm_name){
                    $male_stats = $male_adm[$j]->cnt;
                } 
            }
            for($j = 0 ; $j < count($female_adm) ; $j++){
                if($female_adm[$j]->adminstration == $adm_name){
                    $female_stats = $female_adm[$j]->cnt;
                } 
            }
            $sub_arr = array(
                "adm_name" => $adm_name,
                "male_stats" => $male_stats,
                "female_stats" => $female_stats,
                "top_schools" => ReportsController::get_top_schools($adm_name)
            );
            array_push($adm_array , $sub_arr);
        }
        return view('reports.reports' , compact('adm_array' , 'gov_array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

	public function get_all_gov($gender){
        $output= DB::table("students_attendances")
            ->join("students" , "students.id" , "=" , "students_attendances.student_id")
            ->join("schools" , "students.school_id" , "=" , "schools.id")
            ->select(DB::raw('COUNT(students_attendances.id) as cnt') , "schools.governorate")
            ->where("students.sex" , $gender)
            ->groupBy("schools.governorate")
            ->get();
        return $output;
    }
    
    public function get_top_centers($gov){
        $output= DB::table("students_attendances")
            ->join("students" , "students.id" , "=" , "students_attendances.student_id")
            ->join("schools" , "students.school_id" , "=" , "schools.id")
            ->select(DB::raw('COUNT(students_attendances.id) as cnt') , "schools.governorate" , "schools.adminstration")
            ->where("schools.governorate" , $gov)
            ->groupBy("schools.governorate" , "schools.adminstration")
            ->orderby('cnt' , 'desc')
            ->limit(6)
            ->get()
            ->all();
        return $output;
    }
    
    	public function get_all_adm($gender){
        $output= DB::table("students_attendances")
            ->join("students" , "students.id" , "=" , "students_attendances.student_id")
            ->join("schools" , "students.school_id" , "=" , "schools.id")
            ->select(DB::raw('COUNT(students_attendances.id) as cnt') , "schools.adminstration")
            ->where("students.sex" , $gender)
            ->groupBy("schools.adminstration")
            ->get();
        return $output;
    }
    
    public function get_top_schools($adm){
        $output= DB::table("students_attendances")
            ->join("students" , "students.id" , "=" , "students_attendances.student_id")
            ->join("schools" , "students.school_id" , "=" , "schools.id")
            ->select(DB::raw('COUNT(students_attendances.id) as cnt') , "schools.adminstration" , "schools.name")
            ->where("schools.governorate" , $adm)
            ->groupBy("schools.adminstration" , "schools.name")
            ->orderby('cnt' , 'desc')
            ->limit(6)
            ->get()
            ->all();
        return $output;
    }
	
}
