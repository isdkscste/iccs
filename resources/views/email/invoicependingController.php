<?php

namespace App\Http\Controllers\invoice;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Waavi\Sanitizer\Sanitizer;
use Illuminate\Support\Str;
use Validator;
use Session;
use Storage;
use DB;
use Carbon\Carbon;
use App\Helpers\OldInvoicePdf;
use URL;

class invoicependingController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    	$adminid=Session::get('user_id_admin');
    	$admin_officecode=Session::get('officecode_admin');
    	$flag=$request->flag;

    	if($flag==1)
    	{

    		$itemid=$request->itemid;
    		$unit_dtls[]=DB::table('stock.items')
    		->leftjoin('stock.units','stock.units.unitid','=','stock.items.default_unit')
    		->where('itemsid','=',$itemid)
    		->where('cmpd_id','=',null)
    		->select('unitid','unitname')
    		->first();


    		if(!empty($unit_dtls[0]))
    		{

    			$data=$unit_dtls;

    		}
    		else
    		{

    			$unit_dtls1=DB::table('stock.items')
    			->where('itemsid','=',$itemid)
    			->select('cmpd_id')
    			->first();
    			$unit_dtls1=json_decode(json_encode($unit_dtls1),TRUE);

    			$cmpd_id=$unit_dtls1['cmpd_id'];


    			$first = DB::table('stock.unit_relation')
    			->where('stock.unit_relation.cmnd_unit_id','=',$cmpd_id) 
    			->select('primary_unit as res');

    			$result  = DB::table('stock.unit_relation')
    			->where('stock.unit_relation.cmnd_unit_id','=',$cmpd_id) 
    			->select('secondary_unit as res')
    			->union($first)
    			->get();

    			$result=json_decode(json_encode($result),TRUE);

    			$cnt_relation=count($result);
    			$relation_name=array();
    			for ($k=0; $k < $cnt_relation; $k++) 
    			{ 
    				$relation_id=$result[$k]['res'];     

    				$data[]=DB::table('stock.units')
    				->where('unitid','=',$relation_id)
    				->select('unitid','unitname')
    				->first();  
    			}


    		}


    		$result_array=array($data);

    		return $result_array;
    	}

    	if($flag==2)
    	{
    		$itemid=$request->itemid;
    		$unitid=$request->unitid;
    		$indate=$request->indate;

    		$dat_arr1=explode('-', $indate);
      // dd($dat_arr1);
    		$new_indate=$dat_arr1[2].'-'.$dat_arr1[1].'-'.$dat_arr1[0];

    		$pricelist=DB::table('stock.global_price_list')
    		->where('item_id','=',$itemid)
      // ->where('unit_id','=',$unitid)

    		->where('effective_from','<=',$new_indate)
    		->where('effective_to','>=',$new_indate)
    		->select('price','unit_id')
    		->first();
    		$unitPrice=$pricelist->price;     
    		$unitTab=$pricelist->unit_id;

    		if($unitTab!=$unitid)
    		{
    			$cmpid=DB::table('stock.items')->where('itemsid',$itemid)->value('cmpd_id');
    			$unit=$unitid;
    			$storeunit=$unitTab;
    			$relId=DB::table('stock.unit_relation')
    			->orWhere(function ($query1)use ($unit,$storeunit,$cmpid) {

    				$query1->where('primary_unit','=',$unit)
    				->where('secondary_unit','=',$storeunit)
    				->where('cmnd_unit_id',$cmpid);

    			})
    			->orWhere(function ($query2)use ($unit,$storeunit,$cmpid) {

    				$query2->where('secondary_unit','=',$unit)
    				->where('primary_unit','=',$storeunit)            ->where('cmnd_unit_id',$cmpid)
    				;

    			})
    			->select('relation_id','primary_value','secondary_value','primary_unit','secondary_unit')->get();
         // dd($relId);
    			if(count($relId)>0)
    			{
    				if($unit==$relId[0]->primary_unit && $storeunit==$relId[0]->secondary_unit)
    				{

    					$convertQty= $relId[0]->secondary_value/$relId[0]->primary_value;
    				}
    				else
    				{
    					$convertQty=$relId[0]->primary_value/$relId[0]->secondary_value;


    				}
            // dd($convertQty);
    			}
    			else
    			{
    				$convertQty= 0;

    			} 
    			$unitPrice= $unitPrice*$convertQty;

    		}
    		$result_array=array($unitPrice);

    		return $unitPrice ;

    	}

    	return view('invoice.invoice_pendingAdd')->with('page_title','Invoice');

    }
    public function save_invoice(Request $request)
    {

    	DB::beginTransaction();
    	$invoice_no=$request->inv_no;

    	$exist=DB::table('stock.old_invoice')->where('invoiceno',$invoice_no)->value('invoiceid');
    	if($exist)
    	{
    		$result=2;
    		return $result;
    	}
    	else
    	{
    		$invoice_date1=$request->in_date;

    		if(isset($invoice_date1))
    		{
    			$arr_date=explode("-", $invoice_date1);
    			$invoice_date=$arr_date[2]."-".$arr_date[1]."-".$arr_date[0];
    		}
    		else
    		{
    			$invoice_date=null;
    		}

    		$officeid=Session::get('officecode_admin');
    		$item_hid=$request->item_hid;
    		$entryUser=Session::get('user_id_admin');
    		$today=date('Y-m-d H:i:s');
    		$consumer=$request->consumer_id;
    		$total=$request->total;
    		$grandTotal=$request->grand_tot;
    		$deptcharge=$request->dept_amt;
    		$deptamt=$request->tot_dept;

    		$unit=$request->unit;
    		$unit_price=$request->unit_price;
    		$qty=$request->qty;
    		$price=$request->price;

    		$data = [

    			'invoiceno'    => $invoice_no,
    			'invoicedate'    => $invoice_date,
    			'entryuser' => $entryUser,
    			'consumerid' => $consumer,
    			'modifieduser' => $entryUser,
    			'grandtotal' => $grandTotal,
    			'total' => $total,
    			'tax_perc' => $deptcharge,
    			'tax_amt' => $deptamt,
    			'officeid'=>$officeid

    		];

    		$invId=DB::table('stock.old_invoice')->insertGetId($data,'invoiceid');

    		if($invId)
    		{

    			$count_row=count($item_hid);



    			for($i=0;$i<$count_row;$i++)
    			{

    				$slno=$i+1;

    				$data1=[

    					'invoiceid'    => $invId,
    					'slno'         => $slno,
    					'itemid'       => $item_hid[$i],
    					'unitid'       => $unit[$i],
    					'qty'          => $qty[$i],
    					'unitprice'    => $unit_price[$i],
    					'qtyprice'     => $price[$i],

    				];

    				$if_save=DB::table('stock.old_invoiceSub')->insert($data1);

    			}

    		}

    		if( !$invId || !$if_save )
    		{
    			DB::rollBack();
    			$result=0;
    		} 
    		else 
    		{
    			$result=1;
    			DB::commit();
    		}


    		return $result;
    	}
    }
    public function deleteInvoice(Request $request)
    {
    	$invid = $request->invid;
    	DB::beginTransaction();
    	
    	$delete=DB::table('stock.old_invoiceSub')
    	->where('invoiceid',$invid)
    	->delete();

    	if($delete)
    	{
    		$del=DB::table('stock.old_invoice')
    		->where('invoiceid',$invid)
    		->delete();

    		DB::commit();
    		echo json_encode($del);


    	}
    	else
    	{
    		DB::rollback();
    		echo json_encode($del);

    	}
    }
    public function ItemNameSelect(Request $request)
    {

    	$term = $request->get('term');
    	$item_cnt = $request->get('item_cnt');

    	$items = DB::table('stock.items')
    	->where('standard_name','ilike',$term.'%')
    	->where('archive_flag','=','0');

    	if(count($item_cnt)>0)
    	{
    		$items =$items->whereNotIn('itemsid',$item_cnt);
    	}

    	$items =$items->select('standard_name','itemsid')
    	->orderBy('standard_name','asc')
    	->get();


    	$data=array();
    	foreach ($items as $item) 
    	{
    		$data[]=array('value'=>$item->standard_name,'id'=>$item->itemsid);
    	}
    	if(count($data))
    		return $data;
    	else
    		return ['value'=>'No Result Found','id'=>''];


    }
    public function getPendingInvoice(Request $request)
    {
    	$invoiceDetails=DB::table('stock.old_invoice')
    	->where('stock.old_invoice.officeid','=',Session::get('officecode_admin'))
    	->leftjoin('consumer.consumerdetails','stock.old_invoice.consumerid','consumer.consumerdetails.consumerid')
    	->select('invoiceid','invoiceno','invoicedate','stock.old_invoice.consumerid','grandtotal','officename')
    	->Orderby('invoicedate')
    	->get();


    	return Datatables::of($invoiceDetails)
    	->make();

    }

    public function getConsumerOffice(Request $request) {
    	$query = $request->get('term','');

    	$consumer_detials = DB::table('consumer.consumerdetails')
    	->where('officename','ilike',$query.'%')
    	->where('active_flag','=',0)
    	->where('regionid','=',Session::get('officecode_admin'))

    	->select('consumerid','officename','cardno')
    	->orderBy('cardno','asc')
        ->get();
        $data=array();
        foreach ($consumer_detials as $consumer_dtls) {
                    $name=$consumer_dtls->officename."(".$consumer_dtls->cardno.")";

          $data[]=array('value'=>$name,'id'=>$consumer_dtls->consumerid);
      }

      if(count($data))
          return $data;
      else
          return ['value'=>'No Result Found','id'=>''];
  }
  public function invoicePdf($id)
  {
   $pdf=$this->getReport($id);
   $new_pdf=new OldInvoicePdf();
   $new_pdf->preview($pdf);  
}

public function getReport($id)
{
   $pdf='<style>
   </style>';
   $invoiceid=$id;
   //dd($invoiceid);
   $invoice_basic=DB::table('stock.old_invoice')
  // ->leftjoin('consumer.consumerdetails','stock.old_invoice.consumerid','=','consumer.consumerdetails.consumerid')
   ->where('stock.old_invoice.invoiceid','=',$invoiceid)
   ->select('stock.old_invoice.invoiceid','stock.old_invoice.consumerid','invoiceno','invoicedate','stock.old_invoice.grandtotal','stock.old_invoice.officeid','total','tax_perc','tax_amt')
   ->first();

//dd($invoice_basic);

   $invoice_basic=json_decode(json_encode($invoice_basic),TRUE);



   $grandtotal=$invoice_basic['grandtotal'];


   $total=$invoice_basic['total'];

   $tax_perc=$invoice_basic['tax_perc'];

   $tax_amt=$invoice_basic['tax_amt'];


   $officeid=$invoice_basic['officeid'];
   $invoice_date=$invoice_basic['invoicedate'];



   $date = explode('-', $invoice_date);

   $month = $date[1];
   $day   = $date[2];
   $year  = $date[0];
   $invoicedate=$day.'/'.$month.'/'.$year;


   $office_name = DB::table('administration.officedetails')
   ->where('officecode',$officeid)
   ->pluck('officename')
   ->first();
   $consumerid=$invoice_basic['consumerid'];
   $cons_det=DB::table('consumer.consumerdetails')->where('consumerid','=',$consumerid)
   ->select('consumer.consumerdetails.officename')
   ->get();

   $cons_det=json_decode(json_encode($cons_det),TRUE);

   $cons_officename=$cons_det[0]['officename'];




    // $path=rtrim(URL::asset('/')."/img/kerala_govt_logo.JPG");
   $path_bar=rtrim(URL::asset('/')."/img/barcode.png");

   $path='';
   $path_bar='';
   $pdf.=' <table  nobr="true" style="width:100%" cellpadding="5">
   <tr>
   <td width="40%"><div align ="left"></div> </td>
   <td width="30%">&nbsp;&nbsp;&nbsp;&nbsp;<img src="'.$path.'" height="700%" width="900%"></td>
   <td width="30%"><div align ="right"><img src="'.$path_bar.'" height="500%" width="900%"> </div></td>
   </tr>
   <tr>

   <td  colspan="3" align="center"  style="font-size:14px;font-weight:bold"> STATIONERY DEPARTMENT
   </td>

   </tr>

   <tr>

   <td  colspan="3" align="center"  style="font-size:12px;font-weight:noraml"> '.$office_name.'
   </td>

   </tr>

   <tr>

   <td  colspan="3" align="center"  style="font-size:12px;font-weight:noraml"> <u>INVOICE</u>
   </td>

   </tr>


   <tr>
   <td align="left"  style="font-size:10px;font-weight:noraml"><b>Invoice No: '.$invoice_basic["invoiceno"].'</b></td> 
   <td     > 
   </td>
   <td align="right"  style="font-size:10px;font-weight:noraml">
   <b>Date: '.$invoicedate.'</b>
   </td>
   </tr>

   <tr>

   <td  colspan="3" align="left"  style="font-size:10px;font-weight:noraml">Bill of cost of articles of stationery supplied to the <b>'.$cons_officename.'</b>
   </td>

   </tr>


   </table>

   ';




   $pdf.='<br><br>
   <table nobr="true" style="width:100%" cellpadding="5"  border="0.1"><thead> 
   <tr style="font-size:10px;font-weight:bold;">
   <th  align="center">No</th>
   <th  align="center">Name of Articles</th>
   <th  align="center">Unit</th>
   <th align="center">Unit Price</th>
   <th  align="center">Quantity</th>
   <th  align="center">Price</th>
   </thead>
   </tr>';
   $k=1;

   $sub_detls=DB::table('stock.old_invoiceSub')
   ->leftjoin('stock.units','stock.units.unitid','=','stock.old_invoiceSub.unitid') 
   ->leftjoin('stock.items','stock.items.itemsid','=','stock.old_invoiceSub.itemid')
   ->where('invoiceid','=',$invoiceid)
   ->orderby('standard_name')
   ->get();
   $j=1;

   for ($k=0; $k < count($sub_detls); $k++) 
   { 


      $pdf.='  <tbody><tr  style="font-size:10px;font-weight:normal">
      <td align="center">'.$j.'</td>
      <td>'.$sub_detls[$k]->standard_name.'</td>
      <td>'.$sub_detls[$k]->unitname.'</td>
      <td>'.$sub_detls[$k]->unitprice.'</td>
      <td>'.$sub_detls[$k]->qty.'</td>
      <td align="right">'.$sub_detls[$k]->qtyprice.'</td>
      </tr>' ;



      $j++;

  } 

  $grandtotalw=$this->getIndianCurrency($grandtotal);

  $pdf.='<tr align="right"  style="font-size:12px;font-weight:normal" ><td colspan="5">Total</td><td>'.number_format($total,2).'</td><td></td></tr>

  <tr align="right"  style="font-size:12px;font-weight:normal" ><td colspan="5">Departmental Charge in %</td><td>'.$tax_perc.'</td><td></td></tr>

  <tr align="right"  style="font-size:12px;font-weight:normal" ><td colspan="5">Departmental Charge</td><td>'.number_format($tax_amt,2).'</td><td></td></tr>
  <tr align="right"  style="font-size:12px;font-weight:bold" ><td colspan="5">Grand Total</td><td>'.number_format($grandtotal,2).'</td><td></td></tr>


  <tr align="left"  style="font-size:12px;font-weight:bold" ><td colspan="5" align="right">Total Amount in Words</td><td colspan="2">'.$grandtotalw.'</td> </tr>

  </table><br><br>';




  return $pdf;
}


function getIndianCurrency(float $number)
{
   $decimal = round($number - ($no = floor($number)), 2) * 100;
   $hundred = null;
   $digits_length = strlen($no);
   $i = 0;
   $str = array();
   $words = array(0 => '', 1 => 'one', 2 => 'two',
      3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
      7 => 'seven', 8 => 'eight', 9 => 'nine',
      10 => 'ten', 11 => 'eleven', 12 => 'twelve',
      13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
      16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
      19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
      40 => 'forty', 50 => 'fifty', 60 => 'sixty',
      70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
   $digits = array('', 'hundred','thousand','lakh', 'crore');
   while( $i < $digits_length ) {
      $divider = ($i == 2) ? 10 : 100;
      $number = floor($no % $divider);
      $no = floor($no / $divider);
      $i += $divider == 10 ? 1 : 2;
      if ($number) {
         $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
         $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
         $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
     } else $str[] = null;
 }
 $Rupees = implode('', array_reverse($str));
 $paise = ($decimal) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
 return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function convert_number_to_words($number) {
    	$hyphen      = '-';
    	$conjunction = ' and ';
    	$separator   = ', ';
    	$negative    = 'negative ';
    	$decimal     = ' point ';
    	$dictionary  = array(
    		0                   => 'zero',
    		1                   => 'one',
    		2                   => 'two',
    		3                   => 'three',
    		4                   => 'four',
    		5                   => 'five',
    		6                   => 'six',
    		7                   => 'seven',
    		8                   => 'eight',
    		9                   => 'nine',
    		10                  => 'ten',
    		11                  => 'eleven',
    		12                  => 'twelve',
    		13                  => 'thirteen',
    		14                  => 'fourteen',
    		15                  => 'fifteen',
    		16                  => 'sixteen',
    		17                  => 'seventeen',
    		18                  => 'eighteen',
    		19                  => 'nineteen',
    		20                  => 'twenty',
    		30                  => 'thirty',
    		40                  => 'fourty',
    		50                  => 'fifty',
    		60                  => 'sixty',
    		70                  => 'seventy',
    		80                  => 'eighty',
    		90                  => 'ninety',
    		100                 => 'hundred',
    		1000                => 'thousand',
    		1000000             => 'million',
    		1000000000          => 'billion',
    		1000000000000       => 'trillion',
    		1000000000000000    => 'quadrillion',
    		1000000000000000000 => 'quintillion'
    	);
    	if (!is_numeric($number)) {
    		return false;
    	}
    	if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
    		trigger_error(
    			'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
    			E_USER_WARNING
    		);
    		return false;
    	}
    	if ($number < 0) {
    		return $negative . $this->convert_number_to_words(abs($number));
    	}
    	$string = $fraction = null;
    	if (strpos($number, '.') !== false) {
    		list($number, $fraction) = explode('.', $number);
    	}
    	switch (true) {
    		case $number < 21:
    		$string = $dictionary[$number];
    		break;
    		case $number < 100:
    		$tens   = ((int) ($number / 10)) * 10;
    		$units  = $number % 10;
    		$string = $dictionary[$tens];
    		if ($units) {
    			$string .= $hyphen . $dictionary[$units];
    		}
    		break;
    		case $number < 1000:
    		$hundreds  = $number / 100;
    		$remainder = $number % 100;
    		$string = $dictionary[$hundreds] . ' ' . $dictionary[100];
    		if ($remainder) {
    			$string .= $conjunction . $this->convert_number_to_words($remainder);
    		}
    		break;
    		default:
    		$baseUnit = pow(1000, floor(log($number, 1000)));
    		$numBaseUnits = (int) ($number / $baseUnit);
    		$remainder = $number % $baseUnit;
    		$string = $this->convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
    		if ($remainder) {
    			$string .= $remainder < 100 ? $conjunction : $separator;
    			$string .= $this->convert_number_to_words($remainder);
    		}
    		break;
    	}
    	if (null !== $fraction && is_numeric($fraction)) {
    		$string .= $decimal;
    		$words = array();
    		foreach (str_split((string) $fraction) as $number) {
    			$words[] = $dictionary[$number];
    		}
    		$string .= implode(' ', $words);
    	}
    	return $string;
    }
    //////// Initialise Seat //////

    public function show(Request $request,$id)
    {


    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {

    	$user_id=Session::get('user_id_admin');


    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {




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


    public function autoComplete(Request $request) {

    }



}