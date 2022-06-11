<?php

namespace App\Http\Controllers;

use App\Models\BranchOffice;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees = Employee::paginate(15);

        return response()->json(['message' => 'success', 'employees'=>$employees]);

/*
        $employees = Employee::select('*', "employees.id as id")
        ->join('branch_offices as bo', 'employees.branch_office_id', '=', 'bo.id')
        ->paginate(15);

        return response()->json(['message' => 'success', 'documents'=>$employees]);*/
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
        $data = $request->except('branch_office_name');
        $data['branch_office_id'] = BranchOffice::where('name_branch_office', $request->branch_office_name)->first()->id;
        $data['user_id'] = Auth::id();;
        Employee::insert($data);
        return response()->json(['message'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $data = $request->except('branch_office_name');
        $data['branch_office_id'] = BranchOffice::where('name_branch_office', $request->branch_office_name)->first()->id;
        $data['user_id'] = Auth::id();;
        $data['created_at'] = null;
        $data['updated_at'] = null;
        Employee::where('id', $employee->id)->update($data);
        return response()->json(['message'=>'success']);
        /*
        Employee::where('id', $employee->id)->update($request->all());
        return response()->json(["message"=>"success"]);*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
        Employee::where('id', $employee->id)->delete();
        return response()->json(["message"=>"success"]);
    }
}
