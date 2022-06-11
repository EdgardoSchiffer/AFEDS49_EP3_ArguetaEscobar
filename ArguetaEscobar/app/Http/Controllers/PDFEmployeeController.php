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
        $employees = Employee::all();

        $pdf = PDF::loadView('PDFEmployee.summary', compact('employees'));

        return $pdf->stream('report-'.now().'.pdf');
    }

}
