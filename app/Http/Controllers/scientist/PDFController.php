<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

use PDF;

use DB;

class PDFController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */
  public function __construct()
    {
      $this->middleware('auth');
    }
    public function generatePDF()

    {

        $userid=\Auth::user()->id;
        $data = DB::table("application_form")->where('user_id',$userid)->first();
        // $data1=json_encode(json_decode($data));
     // dd($data1);
        // $d="yg";
        $pdf = PDF::loadView('scientist.myPDF', compact('data'));

        return $pdf->download('application.pdf');

    }

}