<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    //
    public function downloadReport(){
    	$pdf = PDF::loadView('report.report');
    	return @$pdf->stream();
    }
}

