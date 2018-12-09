<?php

namespace App\Http\Controllers\borrowings;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $requestData = $request->all();
        $school_id = $requestData['school_id'];
        borrowing::create($requestData);
        return redirect("schools/".$school_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\borrowing  $borrowing
     * @return \Illuminate\Http\Response
     */
    public function show(borrowing $borrowing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\borrowing  $borrowing
     * @return \Illuminate\Http\Response
     */
    public function edit(borrowing $borrowing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\borrowing  $borrowing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, borrowing $borrowing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\borrowing  $borrowing
     * @return \Illuminate\Http\Response
     */
    public function destroy(borrowing $borrowing)
    {
        //
    }
}
