<?php

namespace App\Http\Controllers;

use App\Models\BranchOffice;
use Illuminate\Http\Request;

class BranchOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $branch_offices = BranchOffice::all();

        return response()->json(['message' => 'success', 'branch_offices'=>$branch_offices]);
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
     * @param  \App\Models\BranchOffice  $branchOffice
     * @return \Illuminate\Http\Response
     */
    public function show(BranchOffice $branchOffice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BranchOffice  $branchOffice
     * @return \Illuminate\Http\Response
     */
    public function edit(BranchOffice $branchOffice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BranchOffice  $branchOffice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BranchOffice $branchOffice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BranchOffice  $branchOffice
     * @return \Illuminate\Http\Response
     */
    public function destroy(BranchOffice $branchOffice)
    {
        //
    }
}
