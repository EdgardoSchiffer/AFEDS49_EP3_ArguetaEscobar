<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\PDFEmployee;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class PDFEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\PDFEmployee  $pDFEmployee
     * @return \Illuminate\Http\Response
     */
    public function show(PDFEmployee $pDFEmployee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PDFEmployee  $pDFEmployee
     * @return \Illuminate\Http\Response
     */
    public function edit(PDFEmployee $pDFEmployee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PDFEmployee  $pDFEmployee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PDFEmployee $pDFEmployee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PDFEmployee  $pDFEmployee
     * @return \Illuminate\Http\Response
     */
    public function destroy(PDFEmployee $pDFEmployee)
    {
        //
    }

    public function generateSummaryEmployee($id)
    {
        $employee = Employee::where(['id'=>$id])
        ->first();

        $pdf = PDF::loadView('PDFEmployee.summaryEmployee', compact('employee'));

        return $pdf->stream('report-'.now().'.pdf');
    }

}
