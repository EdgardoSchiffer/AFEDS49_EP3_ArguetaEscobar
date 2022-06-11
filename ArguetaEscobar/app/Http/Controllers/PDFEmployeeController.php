<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\PDFEmployee;
use PDF;
use Illuminate\Http\Request;

class PDFEmployeeController extends Controller
{

    public function generateSummaryEmployee($id)
    {
        //Date::setLocale('es');
        $employee = Employee::where(['id'=>$id])->first();

        $pdf = PDF::loadView('PDFEmployee.summary', compact('employees'));

        return $pdf->stream('report-'.now().'.pdf');
    }

}
