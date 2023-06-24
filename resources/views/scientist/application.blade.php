
@extends('layout.master')

@section('content')
<!-- Content Header (Page header) -->
<style type="text/css">
  .req:after{
    content:'*';
    color:red;
    padding-left:5px;  
  }
  
  .datetimepicker-input{position: relative;}
</style>
<section class="content-header"  >
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<div  style="display: none; color: red;" id="appl_view2" class="pull-left">
  <span id="span_appl_view2"><b> Your Application Number is </b> <span id="v1" style="font-weight: bold;"></span></span>
</div>

<div  style="display: none; float: right; padding-left: 1px;" id="view2">
  <a id="dlink" href="" class=" btn btn-warning  pull-right"   >Download Application</a>

</div>
@php
                           
                            $enddate = date('2022-12-08 16:59:00');
                            $now = date('Y-m-d H:i:s'); 
                            @endphp
                            @if($now<$enddate)
<div style="float: right; "><button type="button"   class="btn btn-info pull-left save_btn" onclick="save();"   >Save Draft</button>
</div>
@endif

<section class="content" id="printarea" >
  <div class="container-fluid">

    <div class="row">
      <div class="col-md-12" style="margin-left:20px;">
        <center><h4>Application Form for the post of  Scientists </h4></center>
      </div>
    </div>
    <div class="card-body">
      <center><div class="row col-sm-12" >


        <label for="post_code" class="col-sm-12 col-form-label" style="color: red;">POST APPLIED FOR </label>

      </div></center>
      <div class="form-group row">
        <label for="post_code" class="col-sm-6 col-form-label req">Post Code</label>
        <div class="col-sm-6 err ">
         <select id="post_code"  class="form-control " name="post_code" onchange="multiple_post_code()" >
          <option value="">--Select Post Code--</option>
          <option value="ICCS/SE1/01/22">ICCS/SE1/01/22</option>
          <option value="ICCS/SB/01/22">ICCS/SB/01/22</option>
          <option value="ICCS/SB/02/22">ICCS/SB/02/22</option>
        </select>
      </div>
    </div>
  </div>



  <form class="form-horizontal" id="scientist" enctype="multipart/form-data">
   <div class="card-body">

    <div id="post_code_working">
      <!-- personal details -->
      <center><div class="row col-sm-12" >


        <label for="title" class="col-sm-12 col-form-label" style="color: red;">PERSONAL DETAILS </label>

      </div></center>
      <div class="form-group row">
        <label for="title" class="col-sm-6 col-form-label req">Title</label>
        <div class="col-sm-6 err ">

         <select id="title" class="form-control"  name="title" >
          <option value="">--Select Title--</option>
          <option value="Dr.">Dr.</option>
          <option value="Mr.">Mr.</option>
          <option value="Ms.">Ms.</option>
          <option value="Mrs.">Mrs.</option>

        </select>



      </div>
    </div>







    <input type="hidden" name="post_code_hidden" id="post_code_hidden">
    <div class="form-group row">
      <label for="Name" class="col-sm-6 col-form-label req" >Name in Full </label>
      <div class="col-sm-6 err">
        <input type="text"  class="form-control"  id="name" name="name" placeholder="Full Name"    autocomplete="name"   >



      </div>
    </div>
    <div class="form-group row">
      <label for="Name of father" class="col-sm-6 col-form-label req" >Name of Father/Guardian </label>
      <div class="col-sm-6 err">
        <input type="text"  class="form-control"  id="fname" name="fname" placeholder="Father/Guardian Name">



      </div>
    </div>

    <div class="form-group row">
      <label for="gender" class="col-sm-6 col-form-label req">Gender</label>
      <div class="col-sm-6 err ">
       <select id="gender"  class="form-control " name="gender"  >
        <option value="">--Select Gender--</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Transgender">Transgender</option>

      </select>



    </div>
  </div>


  <div class="form-group row">
    <label for="nationality" class="col-sm-6 col-form-label req">Nationality</label>
    <div class="col-sm-6 err ">
      <input type="text"  class="form-control"  id="nationality" name="nationality" placeholder="Nationality"       >




    </div>
  </div>
  <div class="form-group row">
    <label for="category" class="col-sm-6 col-form-label req">Category</label>
    <div class="col-sm-6 err ">
     <select id="category"  class="form-control"  name="category"  >
      <option value="">--Select Category--</option>
      <option value="Open Category/General">Open Category/General </option>
      <option value="OBC">OBC</option>
      <option value="SC">SC</option>
      <option value="ST">ST</option>
    </select>


  </div>

</div>
<div class="form-group row">
  <label for="Name" class="col-sm-6 col-form-label req" id="caste_label">Caste </label>
  <div class="col-sm-6 err">
    <input type="text"  class="form-control"  id="caste" name="caste"  placeholder="Caste">



  </div>
</div>
<div class="form-group row">
 <label for="casteprooffile" class="col-sm-6 col-form-label"> Copy of Caste Certificate in proof of reservation claimed<br><i>(document must be in PDF format |maximum size 1MB.)</i>


 </label>
 <div class="col-sm-6 err ">

  <div class="custom-file">
    <input type="file"  class="custom-file-input" id="casteprooffile" name="casteprooffile" >
    <label class="custom-file-label" for="customFile">Choose file</label>
  </div>
  <div style="display: none;" id="caste_view2"><a target="_blank" id="a_caste" class=  "pull-right"  href="">View uploaded file</a></div>
</div>
</div>


<!-- new comment -->
<div class="form-group row">
  <label for="inputPassword3" class="col-sm-6 col-form-label req">Date of Birth</label>
  <div class="col-sm-6 err ">

    <input id="dob"  name="dob" type="text" class="form-control datetimepicker-input" data-target="#dob" data-toggle="datetimepicker" placeholder="Date of Birth in dd-mm-yyyy Format" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask  onblur="age_cal()" >
    <span  id="submittername" style = "color:Green"></span>

  </div>


</div>
<div class="form-group row">
  <label for="marital_status" class="col-sm-6 col-form-label req"> Marital Status</label>
  <div class="col-sm-6 err">
   <select id="marital_status"  class="form-control " name="marital_status"  >
    <option value="">--Select Marital Status--</option>
    <option value="single">Single </option>
    <option value="married">Married</option>

  </select>



</div>
</div>
<div class="form-group row">
  <label for="mobile" class="col-sm-6 col-form-label req"> Mobile</label>
  <div class="col-sm-6 err">
    <input type="text"  class="form-control " id="mobile" name="mobile"      pattern="[1-9]{1}[0-9]{9}" maxlength="10" value="{{ Auth::user()->mobile }}" readonly >



  </div>
</div>
<div class="form-group row">
  <label for="email" class="col-sm-6 col-form-label req"> E-mail</label>
  <div class="col-sm-6 err">
    <input type="text"  class="form-control" id="email" name="email" readonly value="{{ Auth::user()->email }}"     >



  </div>
</div>
<div class="form-group row">
  <label for="address1" class="col-sm-6 col-form-label req"> Permanent Address  </label>
  <div class="col-sm-6 err ">

    <textarea  class="form-control " id="address1" name="address1" placeholder=" Permanent Address" ></textarea>

  </div>
</div>

<div class="form-group row">
  <label for="address2" class="col-sm-6 col-form-label req"> Address for Communication  </label>
  <div class="col-sm-6 err ">

    <textarea  class="form-control" id="address2" name="address2" placeholder=" Communication Address" ></textarea>
    <div class="custom-control custom-checkbox"> 
     <input type="checkbox" name="same_as_above" class="custom-control-input" id="same_as_above">
     <label class="custom-control-label" for="same_as_above">Same As above</label>
   </div>
 </div>
</div>


<div class="form-group row">
  <label for="idproof" class="col-sm-6 col-form-label req">Proof of Identity (ID Showing photo & date of birth)
  </label>
  <div class="col-sm-6 err ">
   <select id="idproof"  class="form-control" name="idproof"  >
    <option value="">--Select ID Proof--</option>

    <option value="aadhar">Aadhar </option>
    <option value="voters_id">Electoral Id</option>
    <option value="licence">Driving Licence</option>
    <option value="passport">Passport</option>
  </select>


</div>
</div>
<div class="form-group row">
  <label for="dobprooffile" class="col-sm-6 col-form-label req">Attach a copy of  mentioned ID proof <br><i>(document must be in PDF format |maximum size 1MB.)</i>

  </label>
  <div class="col-sm-6 err ">
    <div class="custom-file"> <input type="file"  class="custom-file-input" id="idprooffile" name="idprooffile" >
     <label class="custom-file-label" for="customFile">Choose file</label>
     <input type="hidden" id="hid_idproof" value="">


     
     
   </div>
   <div style="display: none;" id="idproof_view2"><a target="_blank" id="a_idproof" class=  "pull-right"  href="">View uploaded file</a></div>

 </div>
</div>




<div class="form-group row">
  <label for="photo" class="col-sm-6 col-form-label req">Upload Photo<br><i>
    (JPEG format|Maximum size 30 KB|(150 W x 200 H pixel)). 
  </i></label>
  <div class="col-sm-6 err ">

    <div class="custom-file">
      <input type="file"  class="custom-file-input" id="photo" name="photo" >
      <label class="custom-file-label" for="customFile">Choose file</label>
      <input type="hidden" id="hid_photo" value="">
    </div>
    <div style="display: none;" id="photo_view2"><a target="_blank" id="a_photo" class=  "pull-right"  href="">View uploaded file</a></div>
  </div>
</div>

<div class="form-group row">
  <label for="signature" class="col-sm-6 col-form-label req">Attach a copy of Signature<br><i>
    (JPEG format|Maximum size 30 KB|(150 W x 100 H pixel)). 
  </i>
</label> 
<div class="col-sm-6 err ">

  <div class="custom-file">
    <input type="file"  class="custom-file-input" id="signature" name="signature">
    <label class="custom-file-label" for="customFile" >Choose file</label>
    <input type="hidden" id="hid_signature" value="">
  </div>
  <div style="display: none;" id="sign_view2"><a target="_blank" id="a_sign" class=  "pull-right"  href="">View uploaded file</a></div>
</div>
</div>


<div class="row">
  <div class='col-md-12'>
    <div class="card card-primary" >
      <div class="card-header" align="center"><label class="req"> Qualification Details </label></div>
      <div class="card-body " >
        <div class="table-responsive">
          <table id="bud_sum" class="table responsive  table-striped table-hover table-bordered">
            <thead style="text-align: center;">                  
              <tr>
                <th>Qualification</th>
                <th>Course</th>
                <th>Subject</th>
                <th>Name of University/Institution</th>
                <th>Year of Passing</th>
                <th>Mark/CGPA</th>

                <th>Attachments<br><i>(document must be in PDF format |maximum size 1MB.)</i> </th>


              </tr>

            </thead>
            <tbody>
              <tr><td> Graduation</td>
                <td ><input id="ug_course" name="ug_course" type="text"  class="form-control "   ></td>
                <td ><input id="ug_subject" name="ug_subject" type="text"  class="form-control "   ></td>
                <td ><input id="ug_institution" name="ug_institution" type="text"  class="form-control "  ></td>
                <td ><input id="ug_year"  name="ug_year" type="text"  class="form-control "  ></td>

                <td ><input id="ug_percentage"  name="ug_percentage" type="text"  class="form-control "  ></td>








                <td> 1.Graduation certificate <div class="custom-file">
                  <input type="file"  class="custom-file-input" id="ug_certificate" name="ug_certificate">
                  <label class="custom-file-label" for="customFile" >Choose file</label>
                  <input type="hidden" id="hid_ug1" value="">
                </div>
                <div style="display: none;" id="ug1_view2"><a target="_blank" id="a_ug1" class=  "pull-right"  href="">View uploaded file</a></div>

                <br>
                2.Final Consolidated Mark list<div class="custom-file">
                  <input type="file"  class="custom-file-input" id="ug_marklist" name="ug_marklist">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                  <input type="hidden" id="hid_ug2" value="">
                </div>
                <div style="display: none;" id="ug2_view2"><a target="_blank" id="a_ug2" class=  "pull-right"  href="">View uploaded file</a></div>
              </td>
            </tr>
            <tr><td>Post Graduation</td>
              <td ><input id="pg_course" name="pg_course" type="text"  class="form-control "   ></td>
              <td ><input id="pg_subject" name="pg_subject" type="text"  class="form-control "   ></td>
              <td ><input id="pg_institution" name="pg_institution" type="text"  class="form-control "  ></td>
              <td ><input id="pg_year"  name="pg_year" type="text"  class="form-control "  ></td>

              <td ><input id="pg_percentage"  name="pg_percentage" type="text"  class="form-control "  ></td>

              <td> 1.PG certificate <div class="custom-file">
                <input type="file"  class="custom-file-input" id="pg_certificate" name="pg_certificate">
                <label class="custom-file-label" for="customFile" >Choose file</label>
                <input type="hidden" id="hid_pg1" value="">
              </div>
              <div style="display: none;" id="pg1_view2"><a target="_blank" id="a_pg1" class=  "pull-right"  href="">View uploaded file</a></div>

              <br>
              2.Final Consolidated Mark list<div class="custom-file">
                <input type="file"  class="custom-file-input" id="pg_marklist" name="pg_marklist">
                <label class="custom-file-label" for="customFile">Choose file</label>
                <input type="hidden" id="hid_pg2" value="">
              </div>
              <div style="display: none;" id="pg2_view2"><a target="_blank" id="a_pg2" class=  "pull-right"  href="">View uploaded file</a></div>
            </td>
          </tr>


        </tbody>

      </table>
    </div>

  </div>
</div>
</div>
</div>

<div class="row">
  <div class='col-md-12'>
    <div class="card card-primary" >
      <div class="card-header" align="center">Ph.D Details(Enter the details only if you have a Ph.D) </div>
      <div class="card-body " >
        <div class="table-responsive">
          <table id="bud_sum" class="table responsive  table-striped table-hover table-bordered">
            <thead style="text-align: center;">                  
              <tr>
               <th>Name of University/Institution</th>
               <th>Topic</th>
               <th> Thesis Title</th>
               <th>Ph.D Awarded Year</th>
               <th>Attach copy of Ph.D certificate<br><i>(document must be in PDF format |maximum size 1MB.)</i></th>

               
             </tr>

           </thead>
           <tbody>
            <tr>

              <td ><input id="phd_institution" name="phd_institution" type="text"  class="form-control "  ></td>

              <td ><input id="phd_subject"  name="phd_subject" type="text"  class="form-control " ></td>
              <td ><input id="phd_title"  name="phd_title" type="text"  class="form-control " ></td>
              <td ><input id="phd_year"  name="phd_year" type="text"  class="form-control " ></td>



              <td> 1.Phd certificate <div class="custom-file">
                <input type="file"  class="custom-file-input" id="phd_certificate" name="phd_certificate">
                <label class="custom-file-label" for="customFile" >Choose file</label>
                <input type="hidden" id="hid_phd1" value="">
              </div>
              <div style="display: none;" id="phd1_view2"><a target="_blank" id="a_phd1" class=  "pull-right"  href="">View uploaded file</a></div>

              <br>
              2.One page summary of Phd<div class="custom-file">
                <input type="file"  class="custom-file-input" id="phd_summary" name="phd_summary">
                <label class="custom-file-label" for="customFile">Choose file</label>
                <input type="hidden" id="hid_phd2" value="">
              </div>
              <div style="display: none;" id="phd2_view2"><a target="_blank" id="a_phd2" class=  "pull-right"  href="">View uploaded file</a></div>
              
            </td>


          </tr>
          

        </tbody>

      </table>
    </div>

  </div>
</div>
</div>
</div>


<div class="row">
  <div class='col-md-12'>
    <div class="card card-primary" >
      <div class="card-header" align="center">List of Paper Published (Peer Reviewed Journals Only) </div>
      <div class="card-body " >
        <div class="table-responsive">
          <table id="bud_sum" class="table responsive  table-striped table-hover table-bordered">
            <thead style="text-align: center;">                  
              <tr>


               <th>List of Publications/Patent<br><i>(document must be in PDF format |maximum size 1MB.)</i></th>
               
             </tr>

           </thead>
           <tbody>
            <tr>



             <td ><div class="custom-file"><input type="file"  class="custom-file-input" id="pub_upload" name="pub_upload"   ><label   class="custom-file-label" for="customFile">Choose file</label></div>
              <div style="display: none;" id="pub_view2"><a target="_blank" id="a_pub" class=  "pull-right"  href="">View uploaded file</a></div>

            </td>
          </tr>


        </tbody>

      </table>
    </div>



    <div class="form-group row">
      <label for="scholar" class="col-sm-6 col-form-label">Google Scholar Link
      </label> 
      <div class="col-sm-6 err ">

        <div class="custom-file">
         <input id="pub_scholar" name="pub_scholar" type="text"  class="form-control "   >

       </div>

     </div>
   </div>
   <div class="form-group row">
    <label for="scholar" class="col-sm-6 col-form-label">ScopusID
    </label> 
    <div class="col-sm-6 err ">

      <div class="custom-file">
       <input id="pub_corpus" name="pub_corpus" type="text"  class="form-control "   >

     </div>

   </div>
 </div>

</div>
</div>
</div>
</div>

      <div class="row">
        <div class='col-md-12'>
          <div class="card card-primary" >
            <div class="card-header" align="center">RESEARCH/ACADAMIC EXPERIENCE  </div>
            <div class="card-body " >
              <div class="table-responsive p-0">


                <div class="form-group row">
                  <label for="curnt" class="col-sm-6 col-form-label">Are you currently employed?</label>
                  <div class="col-sm-6">


                   <select id="curnt" class="form-control"  name="curnt" onchange="show_noc(this)" >
                    <option value="">--Select--</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>


                  </select>



                </div>
              </div>
              <div class="form-group row " style="display: none;" id="div_noc">
                <label for="noc" class="col-sm-6 col-form-label"> Attach NOC from the current employer<br><i>(document must be in PDF format |maximum size 1MB.)</i>


                </label>
                <div class="col-sm-6 err ">

                  <div class="custom-file">
                    <input type="file"  class="custom-file-input" id="noc" name="noc" >
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                  <div style="display: none;" id="noc_view2"><a target="_blank" id="a_noc" class=  "pull-right"  href="">View uploaded file</a></div>
                </div>
              </div>
              <table id="bud_sum" class="table   table-striped table-hover table-bordered" >
                <thead style="text-align: center;">                  
                  <tr>

                   <th rowspan="2" style="width: 18%"   >Institution/<br>organisation</th>

                   <th rowspan="2" style="width: 18%">Designation/<br>Post held</th>
                   <th colspan="2" style="width: 28%">Period</th>
                   <th rowspan="2">Duration<br><span style="color:red">(in months)</span></th>
                   <th rowspan="2">Brief description of duties performed(maximum 300 words ) </th>
                   <th rowspan="2" style="width: 15%">Upload Experience certificate<br><i>(document must be in PDF format |maximum size 1MB.)</i></th>
                 </tr>
                 <tr>
                  <th> From date</th><th>To date</th></tr>

                </thead>
                <tbody>
                  <tr>
                    <td ><input id="exp_institute1" name="exp_institute1" type="text"  class="form-control "  ></td>
                    <td ><input id="exp_desig1" name="exp_desig1" type="text"  class="form-control "  ></td>


                    <td ><input id="exp_from1"  name="exp_from1" type="text" class="form-control datetimepicker-input" data-target="#exp_from1" data-toggle="datetimepicker" placeholder=" DD-MM-YYYY " data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask   ></td>
                    <td ><div class="col-sm-12 err "><input id="exp_to1"  name="exp_to1" type="text" class="form-control datetimepicker-input" data-target="#exp_to1" data-toggle="datetimepicker" placeholder="DD-MM-YYYY " data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask    onblur="duration1()"  ></div></td>
                    <td ><input id="exp_duration1" name="exp_duration1" type="text"  class="form-control " readonly></td>
                    <td ><textarea id="exp_duties1" name="exp_duties1" type="text"  class="form-control " onkeyup="word_count(this,300);">
                    </textarea></td>
                    <td ><div class="custom-file"><input type="file"  class="custom-file-input" id="exp_upload1" name="exp_upload1"  ><label   class="custom-file-label" for="customFile">Choose file</label></div>
                      <div style="display: none;" id="exp1_view2"><a target="_blank" id="a_exp1" class=  "pull-right"  href="">View uploaded file</a></div>
                    </td>




                  </tr>

                  <tr>
                    <td ><input id="exp_institute2" name="exp_institute2" type="text"  class="form-control "  ></td>
                    <td ><input id="exp_desig2" name="exp_desig2" type="text"  class="form-control " ></td>
                    <td ><input id="exp_from2"  name="exp_from2" type="text" class="form-control datetimepicker-input" data-target="#exp_from2" data-toggle="datetimepicker" placeholder=" DD-MM-YYYY " data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask   ></td>
                    <td ><input id="exp_to2"  name="exp_to2" type="text" class="form-control datetimepicker-input" data-target="#exp_to2" data-toggle="datetimepicker" placeholder=" DD-MM-YYYY " data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask onblur="duration2()"  ></td>
                    <td ><input id="exp_duration2" name="exp_duration2" type="text"  class="form-control "  readonly ></td>
                    <td ><textarea id="exp_duties2" name="exp_duties2" type="text"  class="form-control " onkeyup="word_count(this,300);"  ></textarea></td>
                    <td ><div class="custom-file"><input type="file"  class="custom-file-input" id="exp_upload2" name="exp_upload2"  ><label   class="custom-file-label" for="customFile">Choose file</label></div>
                     <div style="display: none;" id="exp2_view2"><a target="_blank" id="a_exp2" class=  "pull-right"  href="">View uploaded file</a></div>
                   </td>

                 </tr>
                 <tr>
                  <td ><input id="exp_institute3" name="exp_institute3" type="text"  class="form-control "  ></td>
                  <td ><input id="exp_desig3" name="exp_desig3" type="text"  class="form-control " ></td>
                  <td ><input id="exp_from3"  name="exp_from3" type="text" class="form-control datetimepicker-input" data-target="#exp_from3" data-toggle="datetimepicker" placeholder=" DD-MM-YYYY " data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask   ></td>
                  <td ><input id="exp_to3"  name="exp_to3" type="text" class="form-control datetimepicker-input" data-target="#exp_to3" data-toggle="datetimepicker" placeholder=" DD-MM-YYYY " data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask   onblur="duration3()"  ></td>
                  <td ><input id="exp_duration3" name="exp_duration3" type="text"  class="form-control "  readonly></td>
                  <td ><textarea id="exp_duties3" name="exp_duties3" type="text"  class="form-control "  onkeyup="word_count(this,300);" ></textarea></td>
                  <td ><div class="custom-file"><input type="file"  class="custom-file-input" id="exp_upload3" name="exp_upload3"  ><label   class="custom-file-label" for="customFile">Choose file</label></div>
                    <div style="display: none;" id="exp3_view2"><a target="_blank" id="a_exp3" class=  "pull-right"  href="">View uploaded file</a></div>
                  </td>

                </tr>

                <tr>
                  <td ><input id="exp_institute4" name="exp_institute4" type="text"  class="form-control "  ></td>
                  <td ><input id="exp_desig4" name="exp_desig4" type="text"  class="form-control "  ></td>


                  <td ><input id="exp_from4"  name="exp_from4" type="text" class="form-control datetimepicker-input" data-target="#exp_from4" data-toggle="datetimepicker" placeholder=" DD-MM-YYYY " data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask   ></td>
                  <td ><input id="exp_to4"  name="exp_to4" type="text" class="form-control datetimepicker-input" data-target="#exp_to4" data-toggle="datetimepicker" placeholder=" DD-MM-YYYY " data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask   onblur="duration7()"  ></td>
                  <td ><input id="exp_duration4" name="exp_duration4" type="text"  class="form-control " readonly></td>
                  <td ><textarea id="exp_duties4" name="exp_duties4" type="text"  class="form-control" onkeyup="word_count(this,300);">
                  </textarea></td>
                  <td ><div class="custom-file"><input type="file"  class="custom-file-input" id="exp_upload4" name="exp_upload4"  ><label   class="custom-file-label" for="customFile">Choose file</label></div>
                    <div style="display: none;" id="exp4_view2"><a target="_blank" id="a_exp4" class=  "pull-right"  href="">View uploaded file</a></div>
                  </td>




                </tr>
                <tr>
                  <td ><input id="exp_institute5" name="exp_institute5" type="text"  class="form-control "  ></td>
                  <td ><input id="exp_desig5" name="exp_desig5" type="text"  class="form-control "  ></td>


                  <td ><input id="exp_from5"  name="exp_from5" type="text" class="form-control datetimepicker-input" data-target="#exp_from5" data-toggle="datetimepicker" placeholder=" DD-MM-YYYY " data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask   ></td>
                  <td ><div class="col-sm-12 err "><input id="exp_to5"  name="exp_to5" type="text" class="form-control datetimepicker-input" data-target="#exp_to5" data-toggle="datetimepicker" placeholder="DD-MM-YYYY" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask    onblur="duration8()"  ></div></td>
                  <td ><input id="exp_duration5" name="exp_duration5" type="text"  class="form-control " readonly></td>
                  <td ><textarea id="exp_duties5" name="exp_duties5" type="text"  class="form-control" onkeyup="word_count(this,300);">
                  </textarea></td>
                  <td ><div class="custom-file"><input type="file"  class="custom-file-input" id="exp_upload5" name="exp_upload5"  ><label   class="custom-file-label" for="customFile">Choose file</label></div>
                    <div style="display: none;" id="exp5_view2"><a target="_blank" id="a_exp5" class=  "pull-right"  href="">View uploaded file</a></div>
                  </td>




                </tr>


              </tbody>

            </table>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class='col-md-12'>
      <div class="card card-primary" >
        <div class="card-header" align="center">Post Doctoral Experience </div>
        <div class="card-body " >
          <div class="table-responsive p-0">
            <table id="bud_sum" class="table responsive table-striped  table-hover  table-bordered"   >
              <thead style="text-align: center;">                  
                <tr>

                 <th rowspan="2" >Institution/<br>organisation</th>


                 <th rowspan="2" >Funding Agency</th>
                 <th colspan="2" style="width: 25%"  >Period</th>
                 <th rowspan="2"  style="width: 5%">Duration<br><span style="color:red">(in months)</span></th>
                 <th rowspan="2" >Brief description of the project(maximum 300 words) </th>
                 <th rowspan="2" >Upload Experience Certificate <br><i>(document must be in PDF format |maximum size 1MB.)</i></th>
               </tr>
               <tr>
                <th> From date</th><th>To date</th></tr>

              </thead>
              <tbody>
                <tr>
                  <td ><input id="post_exp_institute1" name="post_exp_institute1" type="text"  class="form-control "   ></td>

                  <td ><input id="post_exp_fund1" name="post_exp_fund1" type="text"  class="form-control " ></td>

                  <td ><input id="post_exp_from1"  name="post_exp_from1" type="text" class="form-control datetimepicker-input" data-target="#post_exp_from1" data-toggle="datetimepicker" placeholder="DD-MM-YYYY" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask    ></td>
                  <td ><input onblur="duration4()" id="post_exp_to1"  name="post_exp_to1" type="text" class="form-control datetimepicker-input" data-target="#post_exp_to1" data-toggle="datetimepicker" placeholder="DD-MM-YYYY" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask    ></td>





                  <td ><input id="post_exp_duration1" name="post_exp_duration1" type="text"  class="form-control "  readonly ></td>
                  <td ><textarea id="post_exp_duties1" name="post_exp_duties1" type="text"  class="form-control " onkeyup="word_count(this,300);"  ></textarea></td>
                  <td><div class="custom-file"><input type="file"  class="custom-file-input" id="post_exp_upload1" name="post_exp_upload1"  ><label   class="custom-file-label" for="customFile">Choose file</label></div>

                    <div style="display: none;" id="post_exp1_view2"><a target="_blank" id="a_post_exp1" class=  "pull-right"  href="">View uploaded file</a></div>
                  </td>
                </tr>



                <tr>
                  <td ><input id="post_exp_institute2" name="post_exp_institute2" type="text"  class="form-control "  ></td>

                  <td ><input id="post_exp_fund2" name="post_exp_fund2" type="text"  class="form-control " ></td>
                  <td ><input id="post_exp_from2"  name="post_exp_from2" type="text" class="form-control datetimepicker-input" data-target="#post_exp_from2" data-toggle="datetimepicker" placeholder=" DD-MM-YYYY " data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask   ></td>
                  <td ><input id="post_exp_to2"  name="post_exp_to2" type="text" class="form-control datetimepicker-input" data-target="#post_exp_to2" data-toggle="datetimepicker" placeholder=" DD-MM-YYYY " data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask onblur="duration5()"  ></td>
                  <td ><input id="post_exp_duration2" name="post_exp_duration2" type="text"  class="form-control "  readonly ></td>
                  <td ><textarea id="post_exp_duties2" name="post_exp_duties2" type="text"  class="form-control "  onkeyup="word_count(this,300);"></textarea></td>
                  <td ><div class="custom-file"><input type="file"  class="custom-file-input" id="post_exp_upload2" name="post_exp_upload2"  ><label   class="custom-file-label" for="customFile">Choose file</label></div>

                   <div style="display: none;" id="post_exp2_view2"><a target="_blank" id="a_post_exp2" class=  "pull-right"  href="">View uploaded file</a></div>
                 </td>

               </tr>


               <tr>
                <td ><input id="post_exp_institute3" name="post_exp_institute3" type="text"  class="form-control "  ></td>

                <td ><input id="post_exp_fund3" name="post_exp_fund3" type="text"  class="form-control " ></td>
                <td ><input id="post_exp_from3"  name="post_exp_from3" type="text" class="form-control datetimepicker-input" data-target="#post_exp_from3" data-toggle="datetimepicker" placeholder=" DD-MM-YYYY " data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask   ></td>
                <td ><input id="post_exp_to3"  name="post_exp_to3" type="text" class="form-control datetimepicker-input" data-target="#post_exp_to3" data-toggle="datetimepicker" placeholder=" DD-MM-YYYY " data-inputmask-alias="datetime" onblur="duration6()"data-inputmask-inputformat="dd-mm-yyyy" data-mask   ></td>
                <td ><input id="post_exp_duration3" name="post_exp_duration3" type="text"  class="form-control " readonly  ></td>
                <td ><textarea id="post_exp_duties3" name="post_exp_duties3" type="text"  class="form-control " onkeyup="word_count(this,300);"  ></textarea></td>
                <td><div class="custom-file"><input type="file"  class="custom-file-input" id="post_exp_upload3" name="post_exp_upload3"  ><label   class="custom-file-label" for="customFile">Choose file</label></div>

                  <div style="display: none;" id="post_exp3_view2"><a target="_blank" id="a_post_exp3" class=  "pull-right"  href="">View uploaded file</a></div>
                </td>

              </tr>

            </tbody>

          </table>
        </div>

      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class='col-md-12'>
    <div class="card card-primary" >
      <div class="card-header" align="center">Research Project As Principal investigator/Co-Principal Investigator</div>
      <div class="card-body " >
        <div class="table-responsive">
          <table id="bud_sum" class="table responsive  table-striped table-hover table-bordered">
           
            <tbody>
              <tr>
                <td >Download the format from the right side, fill up the details, attach Proofs and UPLOAD a single pdf <br><i>(document must be in PDF format |maximum size 3MB.)</i></td>
                <td><div class="col-sm-12 err ">

                  <div class="custom-file">
                    <input type="file"  class="custom-file-input" id="pi_copi_file" name="pi_copi_file" >
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                  <div style="display: none;" id="pi_copi_view2"><a target="_blank" id="a_pi_copi" class=  "pull-right"  href="">View uploaded file</a></div>
                </div> </td>
                <td><a style="color:blue" target="_blank" href="{{ asset('downloads/ProjectDetails.docx') }}"> Download Format</a></td>

              </tr>


            </tbody>

          </table>
        </div>

      </div>
    </div>
  </div>
</div>


 <div class="row">
  <div class='col-md-12'>
    <div class="card card-primary" >
      <div class="card-header" align="center">Awards/Achievements/Membership in Professional bodies</div>
      <div class="card-body " >
        <div class="table-responsive">
          <table id="bud_sum" class="table responsive  table-striped table-hover table-bordered">
            <tbody>
              <tr>
                <td >Download the format from the right side, fill up the details, attach Proofs and UPLOAD a single pdf <br><i>(document must be in PDF format |maximum size 3MB.)</i> </td>
                <td><div class="col-sm-12 err ">

                  <div class="custom-file">
                    <input type="file"  class="custom-file-input" id="awards_file" name="awards_file" >
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                  <div style="display: none;" id="awards_view2"><a target="_blank" id="a_awards" class=  "pull-right"  href="">View uploaded file</a></div>
                </div> </td>
                <td><a style="color:blue" target="_blank" href="{{ asset('downloads/Awards.docx') }}"> Download Format</a></td>

              </tr>


            </tbody>
            
          </table>
        </div>

      </div>
    </div>
  </div>
</div>


      <div class="row">
        <div class='col-md-12'>
          <div class="card card-primary" >

            <div class="card-header" align="center">  Paper Presented  in Conferences or Seminars(Internationl/National/Regional Input in this order) </div>
            <div class="card-body " >
              <div >
               <div class="form-group row">
                <label for="curnt" class="col-sm-6 col-form-label">Total Paper Presented</label>


                <div class="col-sm-2 ">
                  <input type="text"  class="form-control"  id="paper_count" name="paper_count"    autocomplete="paper_count"  >



                </div>



              </div>
            </div>
            <table id="bud_sum" class="table responsive  table-striped table-hover table-bordered">
              <tbody>
                <tr>
                  <td >Download the format from the right side, fill up the details, attach Proofs and UPLOAD a single pdf <br>(<i>document must be in PDF format |maximum size 3MB. )</i></td>
                  <td><div class="col-sm-12 err ">

                    <div class="custom-file">
                      <input type="file"  class="custom-file-input" id="conferences_file" name="conferences_file" >
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <div style="display: none;" id="conferences_view2"><a target="_blank" id="a_conferences" class=  "pull-right"  href="">View uploaded file</a></div>
                  </div> </td><td><a style="color:blue" target="_blank" href="{{ asset('downloads/Conference.docx') }}"> Download Format</a></td>


                </tr>


              </tbody>

            </table>
          </div>

        </div>
      </div>
    </div>







    <div class="row">
      <div class='col-md-12'>
        <div class="card card-primary" >
          <div class="card-header" align="center"><label class="req">Skills & Strength</label></div>
          <div class="card-body " >
            <div class="table-responsive">
              <table id="bud_sum" class="table responsive  table-striped table-hover table-bordered">
                <thead style="text-align: center;">                  
                  <tr>

               
             </tr>

           </thead>
           <tbody>
            <tr>

              <td ><textarea id="skill" name="skill" type="text"  class="form-control " placeholder="(maximum 200 words)" onkeyup="word_count(this,200);" ></textarea></td>

            </tr>


          </tbody>

        </table>
      </div>

    </div>
  </div>
</div>
</div>
<div class="row">
  <div class='col-md-12'>
    <div class="card card-primary" >
      <div class="card-header" align="center">Any other relevant information you would like to add apart from given above</div>
      <div class="card-body " >
        <div class="table-responsive">
          <table id="bud_sum" class="table responsive  table-striped table-hover table-bordered">
            <thead style="text-align: center;">                  
              <tr>

               <th></th>


               
             </tr>

           </thead>
           <tbody>
            <tr>

              <td ><textarea id="relevant" name="relevant" type="text"  class="form-control "  placeholder="(maximum 200 words)" onkeyup="word_count(this,200);" > </textarea></td>

            </tr>


          </tbody>

        </table>
      </div>

    </div>
  </div>
</div>
</div>


<div class="row">
  <div class='col-md-12'>
    <div class="card card-primary" >
      <div class="card-header" align="center"><label class="req">Your Vision for  ICCS</label></div>
      <div class="card-body " >
        <div class="table-responsive">
          <table id="bud_sum" class="table responsive  table-striped table-hover table-bordered">
            <thead style="text-align: center;">                  
              <tr>

               <th>IF SELECTED, HOW can you contribute to the activities of ICCS</th>


               
             </tr>

           </thead>
           <tbody>
            <tr>

              <td ><textarea id="vision" name="vision" type="text"  class="form-control "  placeholder="(maximum 200 words)"  onkeyup="word_count(this,200);"></textarea></td>

            </tr>


          </tbody>

        </table>
      </div>

    </div>
  </div>
</div>
</div>


<div class="row">
  <div class='col-md-12'>
    <div class="card card-primary" >
      <div class="card-header" align="center"><label class="req"> Details of Professional Referees</label></div>
      <div class="card-body " >
        <div class="table-responsive">
          <table id="bud_sum" class="table responsive  table-striped table-hover table-bordered">
            <thead style="text-align: center;">                  
              <tr>
                <th >Name</th>
                <th >Designation & Address</th>
                <th>Email</th>
                <th>Phone/Mobile</th>
                



              </tr>

            </thead>
            <tbody>
              <tr>
                <td ><input id="Ref_name1" name="Ref_name1" type="text"  class="form-control "   ></td>

                <td ><input id="Ref_postheld1" name="Ref_postheld1" type="text"  class="form-control "  ></td>
                <td ><input id="Ref_email1" name="Ref_email1" type="email"  class="form-control "  ></td>
                <td ><input id="Ref_phone1" name="Ref_phone1" type="text"  class="form-control "   ></td>
                

              </tr>
              <tr>
               <td ><input id="Ref_name2" name="Ref_name2" type="text"  class="form-control "   ></td>

               <td ><input id="Ref_postheld2" name="Ref_postheld2" type="text"  class="form-control "  ></td>
               <td ><input id="Ref_email2" name="Ref_email2" type="email"  class="form-control "  ></td>
               <td ><input id="Ref_phone2" name="Ref_phone2" type="text"  class="form-control "  ></td>
               

             </tr>
             <tr>
               <td ><input id="Ref_name3" name="Ref_name3" type="text"  class="form-control "   ></td>

               <td ><input id="Ref_postheld3" name="Ref_postheld3" type="text"  class="form-control "  ></td>
               <td ><input id="Ref_email3" name="Ref_email3" type="email"  class="form-control " ></td>
               <td ><input id="Ref_phone3" name="Ref_phone3" type="text"  class="form-control "  ></td>
               

             </tr>


           </tbody>

         </table>
       </div>

     </div>
   </div>
 </div>
</div>
<!-- new comment -->

<center><div class="row col-sm-12 " align="center">


  <label for="title" class="col-sm-12 col-form-label" style="color: red;">DECLARATION </label>

</div></center>

<div style="display: block;" id="view1">
 <div class="form-group">



  <div class="col-md-12"><div class="custom-control custom-checkbox"> 
   <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
   <label class="custom-control-label" for="exampleCheck1"> &nbsp;&nbsp;I 
    <label id="my_declaration" display:none >&nbsp;&nbsp;<i><u></u></i></label><label id="dash">------------&nbsp;&nbsp;</label>&nbsp;&nbsp;&nbsp;&nbsp; do hereby declare that  the information furnished in this form is true,complete and correct to the best of my knowledge and belief.If,at any  stage,they are found misleading or untrue,my candidature or appointment to the post may be rejected/cancelled.   </label>
  </div>
</div>
</div>


</div>

@php
                           
                            $enddate = date('2022-12-08 16:59:00');
                            $now = date('Y-m-d H:i:s'); 
                            @endphp
                            @if($now<$enddate)

<button type="button"   class="btn btn-info pull-left save_btn" onclick="save();">Save Draft</button>
<button type="button"  id="sub_btn" class="btn btn-success pull-right" disabled >Submit Application</button>



@endif


<!-- End Declaration --> 

<!-- /.card-body -->

<!-- /.card-footer -->
</div>
</div>
</form>

</div>
</section>


@endsection
@push('pagescripts')
<script type="text/javascript">  var APP_URL = '{{ URL::to('/') }}';
</script>

<script type="text/javascript" >

  $(document).ready(function() {
    alert("df");


    $('#exampleCheck1').click(function() {
      if ($(this).is(':checked')) {
        $('#sub_btn').removeAttr('disabled');
        var name=$('#name').val();

        $('#my_declaration').show();
        $('#dash').hide();
        $('#my_declaration').text(name);


      } else {
        $('#sub_btn').attr('disabled', 'disabled');
      }
    });

//$("#post_code").val($("#post_code_hidden").val());
if($("#post_code").val()=="")
{
  $("#post_code_working").hide();
  $(".save_btn").hide();
}
else
{
  $(".save_btn").show();
  $("#post_code_working").show();
}


$("#post_code").change(function(){
  if($("#post_code").val()=="")
  {
    $("#post_code_working").hide();
    $(".save_btn").hide();
  }
  else
  {
    $("#post_code_working").show();
    $(".save_btn").show();
  }
});


$('#user-dashboard').addClass('active');
bsCustomFileInput.init();
$('#mobile').numeric();
$('#ug_year').numeric();
$('#pg_year').numeric();
$('#phd_year').numeric();

$('#paper_count').numeric();
$('[data-mask]').inputmask();
  //Date range picker

  $('#dob').datetimepicker({

    format: 'DD-MM-YYYY'});

  $('#exp_from1').datetimepicker({

    format: 'DD-MM-YYYY'});

  $('#exp_from2').datetimepicker({

    format: 'DD-MM-YYYY'});

  $('#exp_from3').datetimepicker({

    format: 'DD-MM-YYYY'});
  $('#exp_from4').datetimepicker({

    format: 'DD-MM-YYYY'});

  $('#exp_from5').datetimepicker({

    format: 'DD-MM-YYYY'});

  $('#exp_to1').datetimepicker({

    format: 'DD-MM-YYYY'});
  $('#exp_to2').datetimepicker({

    format: 'DD-MM-YYYY'});
  $('#exp_to3').datetimepicker({

    format: 'DD-MM-YYYY'});
  $('#exp_to4').datetimepicker({

    format: 'DD-MM-YYYY'});
  $('#exp_to5').datetimepicker({

    format: 'DD-MM-YYYY'});
  $('#post_exp_to1').datetimepicker({

    format: 'DD-MM-YYYY'});
  $('#post_exp_to2').datetimepicker({

    format: 'DD-MM-YYYY'});
  $('#post_exp_to3').datetimepicker({

    format: 'DD-MM-YYYY'});
  
  $('#post_exp_from1').datetimepicker({

    format: 'DD-MM-YYYY'});

  $('#post_exp_from2').datetimepicker({

    format: 'DD-MM-YYYY'});
  $('#post_exp_from3').datetimepicker({

    format: 'DD-MM-YYYY'});
  var post=$('#post_code').val();
  $.ajax({

    url:APP_URL+'/scientist/application_details',
    type:'GET',
    data:{'post_code':post},
    dataType: "json",
    success :function(result){
      if(result.length>0)
      {

        if(result[0].post_code=="")
        {
          $("#post_code_working").hide();
          $(".save_btn").hide();
        }
        else
        {
          $(".save_btn").show();
          $("#post_code_working").show();
        }


        $("#post_code_hidden").val(result[0].post_code);




        if(result[0].category_file!="")
        {
          $('#caste_view2').show();
          var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].category_file;
          $("#a_caste").attr("href",ur);
        }
        if(result[0].id_proof_file!="")
        {
          $('#idproof_view2').show();
          var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].id_proof_file;
          $("#a_idproof").attr("href",ur);
        }
        if(result[0].photo!="")
        {
          $('#photo_view2').show();
          var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].photo;
          $("#a_photo").attr("href",ur);
        }
        if(result[0].sign!="")
        {
          $('#sign_view2').show();
          var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].sign;
          $("#a_sign").attr("href",ur);
        }
        if(result[0].pg_file1!="")
        {
          $('#pg1_view2').show();
          var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].pg_file1;
          $("#a_pg1").attr("href",ur);
        }
        if(result[0].pg_file2!="")
        {
          $('#pg2_view2').show();
          var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].pg_file2;
        // alert(ur);
        $("#a_pg2").attr("href",ur);
      }
      if(result[0].ug_file1!="")
      {
        // alert(result[0].category_file);
        $('#ug1_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].ug_file1;
        // alert(ur);
        $("#a_ug1").attr("href",ur);
      }
      if(result[0].ug_file2!="")
      {
        // alert(result[0].category_file);
        $('#ug2_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].ug_file2;
        // alert(ur);
        $("#a_ug2").attr("href",ur);
      }
      if(result[0].phd_file!="")
      {
        // alert(result[0].category_file);
        $('#phd1_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].phd_file;
        // alert(ur);
        $("#a_phd1").attr("href",ur);
      }
      if(result[0].phd_summary!="")
      {
        // alert(result[0].category_file);
        $('#phd2_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].phd_summary;
        // alert(ur);
        $("#a_phd2").attr("href",ur);
      }
      if(result[0].paper_list!="")
      {
        // alert(result[0].category_file);
        $('#pub_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].paper_list;
        // alert(ur);
        $("#a_pub").attr("href",ur);
      }
      if(result[0].exp_file1!="")
      {
        // alert(result[0].category_file);
        $('#exp1_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].exp_file1;
        // alert(ur);
        $("#a_exp1").attr("href",ur);
      }
      if(result[0].exp_file2!="")
      {
        // alert(result[0].category_file);
        $('#exp2_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].exp_file2;
        // alert(ur);
        $("#a_exp2").attr("href",ur);
      }
      if(result[0].exp_file3!="")
      {
        // alert(result[0].category_file);
        $('#exp3_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].exp_file3;
        // alert(ur);
        $("#a_exp3").attr("href",ur);
      }
      if(result[0].exp_file4!="")
      {
        // alert(result[0].category_file);
        $('#exp4_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].exp_file4;
        // alert(ur);
        $("#a_exp4").attr("href",ur);
      }
      if(result[0].exp_file5!="")
      {
        // alert(result[0].category_file);
        $('#exp5_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].exp_file5;
        // alert(ur);
        $("#a_exp5").attr("href",ur);
      }
      if(result[0].phd_exp_file1!="")
      {
        // alert(result[0].category_file);
        $('#post_exp1_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].phd_exp_file1;
        // alert(ur);
        $("#a_post_exp1").attr("href",ur);
      }
      if(result[0].phd_exp_file2!="")
      {
        // alert(result[0].category_file);
        $('#post_exp2_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].phd_exp_file2;
        // alert(ur);
        $("#a_post_exp2").attr("href",ur);
      }
      if(result[0].phd_exp_file3!="")
      {
        // alert(result[0].category_file);
        $('#post_exp3_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].phd_exp_file3;
        // alert(ur);
        $("#a_post_exp3").attr("href",ur);
      }
      if(result[0].pi_copi_file!="")
      {
        // alert(result[0].category_file);
        $('#pi_copi_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].pi_copi_file;
        // alert(ur);
        $("#a_pi_copi").attr("href",ur);
      }
      if(result[0].awards_file!="")
      {
        // alert(result[0].category_file);
        $('#awards_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].awards_file;
        // alert(ur);
        $("#a_awards").attr("href",ur);
      }
      if(result[0].conferences_file!="")
      {
        // alert(result[0].category_file);
        $('#conferences_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].conferences_file;
        // alert(ur);
        $("#a_conferences").attr("href",ur);
      }

      $('#curnt').val(result[0].curnt);
      if( $('#curnt').val()=="Yes")
      {
        $('#div_noc').show();
      }
      else
      {
        $('#div_noc').hide();
      }
      if(result[0].noc!="")
      {
        $('#noc_view2').show();
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].noc;
        $("#a_noc").attr("href",ur);
      }
      $('#post_code').val(result[0].post_code);
      $('#title').val(result[0].title);
      $('#name').val(result[0].name);
      $('#fname').val(result[0].fname);
      $('#caste').val(result[0].caste);
      if(result[0].dob!=null)
        var appl_dob1 = moment(result[0].dob).format('DD-MM-YYYY');
        else
          appl_dob1="";
      $('#dob').val(appl_dob1);
     
      $('#gender').val(result[0].gender);
      $('#nationality').val(result[0].nationality);
      $('#category').val(result[0].category);


      $('#marital_status').val(result[0].marital_status);
        //$('#mobile').val(result[0].mobile);
        // $('#email').val(result[0].email);
        $('#address1').val(result[0].p_address);
        $('#address2').val(result[0].c_address);
        if((result[0].p_address!=null) && (result[0].c_address!=null))
        {
          //alert(result[0].p_address);
          if(result[0].p_address==result[0].c_address)
          {
          //alert();
          $('#same_as_above').attr("checked",true);
        }
        else 
        {
          //alert();
          $('#same_as_above').attr("checked",false);
        }
      }
      else
      {
          //alert();
          $('#same_as_above').attr("checked",false);
        }
        $('#idproof').val(result[0].id_proof);
        $('#hid_idproof').val(result[0].id_proof_file);
        $('#hid_photo').val(result[0].photo);
        $('#hid_signature').val(result[0].sign);
        $('#hid_ug1').val(result[0].ug_file1);
        $('#hid_ug2').val(result[0].ug_file2);
        $('#hid_pg1').val(result[0].pg_file1);
        $('#hid_pg2').val(result[0].pg_file2);
        $('#hid_phd1').val(result[0].phd_file); 
        $('#hid_phd2').val(result[0].phd_summary);
        $('#ug_course').val(result[0].ug_course);
        $('#ug_subject').val(result[0].ug_subject);
        $('#ug_institution').val(result[0].ug_university);
        $('#ug_year').val(result[0].ug_year);
        $('#ug_percentage').val(result[0].ug_mark);
        $('#pg_course').val(result[0].pg_course);
        $('#pg_subject').val(result[0].pg_subject);
        $('#pg_institution').val(result[0].pg_university);
        
        $('#pg_year').val(result[0].pg_year);
        $('#pg_percentage').val(result[0].pg_mark);
        $('#phd_institution').val(result[0].phd_university);
        $('#phd_subject').val(result[0].phd_subject);
        $('#phd_title').val(result[0].phd_title);
        $('#phd_year').val(result[0].phd_year);
        $('#pub_scholar').val(result[0].scholar_link);
        $('#pub_corpus').val(result[0].corpus_id);

        $('#exp_institute1').val(result[0].exp_institute1);
        $('#exp_desig1').val(result[0].exp_designation1);
        if(result[0].exp_from1!=null)
        var exp_from1 = moment(result[0].exp_from1).format('DD-MM-YYYY');
        else
        exp_from1="";
        if(result[0].exp_to1!=null)
        var exp_to1 = moment(result[0].exp_to1).format('DD-MM-YYYY');
        else
        exp_to1="";
        $('#exp_from1').val(exp_from1);
        $('#exp_to1').val(exp_to1);
        $('#exp_duration1').val(result[0].exp_duration1);
        $('#exp_duties1').val(result[0].exp_duties1);

        $('#exp_institute2').val(result[0].exp_institute2);
        $('#exp_desig2').val(result[0].exp_designation2);
        if(result[0].exp_from2!=null)
        var exp_from2 = moment(result[0].exp_from2).format('DD-MM-YYYY');
        else
        exp_from2="";
        if(result[0].exp_to2!=null)
        var exp_to2 = moment(result[0].exp_to2).format('DD-MM-YYYY');
        else
        exp_to2="";
        $('#exp_from2').val(exp_from2);
        $('#exp_to2').val(exp_to2);
        $('#exp_duration2').val(result[0].exp_duration2);
        $('#exp_duties2').val(result[0].exp_duties2);

        $('#exp_institute3').val(result[0].exp_institute3);
        $('#exp_desig3').val(result[0].exp_designation3);
        if(result[0].exp_from3!=null)
        var exp_from3 = moment(result[0].exp_from3).format('DD-MM-YYYY');
        else
        exp_from3="";
        if(result[0].exp_to3!=null)
        var exp_to3 = moment(result[0].exp_to3).format('DD-MM-YYYY');
        else
        exp_to3="";
        $('#exp_from3').val(exp_from3);
        $('#exp_to3').val(exp_to3);
        $('#exp_duration3').val(result[0].exp_duration3);
        $('#exp_duties3').val(result[0].exp_duties3);




        $('#exp_institute4').val(result[0].exp_institute4);
        $('#exp_desig4').val(result[0].exp_designation4);
        if(result[0].exp_from4!=null)
        var exp_from4 = moment(result[0].exp_from4).format('DD-MM-YYYY');
        else
        exp_from4="";
        if(result[0].exp_to4!=null)
        var exp_to4 = moment(result[0].exp_to4).format('DD-MM-YYYY');
        else
        exp_to4="";
        $('#exp_from4').val(exp_from4);
        $('#exp_to4').val(exp_to4);
        $('#exp_duration4').val(result[0].exp_duration4);
        $('#exp_duties4').val(result[0].exp_duties4);


        $('#exp_institute5').val(result[0].exp_institute5);
        $('#exp_desig5').val(result[0].exp_designation5);
        if(result[0].exp_from5!=null)
        var exp_from5 = moment(result[0].exp_from5).format('DD-MM-YYYY');
        else
        exp_from5="";
        if(result[0].exp_to5!=null)
        var exp_to5 = moment(result[0].exp_to5).format('DD-MM-YYYY');
        else
        exp_to5="";
        $('#exp_from5').val(exp_from5);
        $('#exp_to5').val(exp_to5);
        $('#exp_duration5').val(result[0].exp_duration5);
        $('#exp_duties5').val(result[0].exp_duties5);

        $('#post_exp_institute1').val(result[0].phd_exp_institute1);
        $('#post_exp_fund1').val(result[0].phd_exp_fundagency1);
        if(result[0].phd_exp_from1!=null)
        var phd_exp_from1 = moment(result[0].phd_exp_from1).format('DD-MM-YYYY');
        else
        phd_exp_from1="";
        if(result[0].phd_exp_to1!=null)
        var phd_exp_to1 = moment(result[0].phd_exp_to1).format('DD-MM-YYYY');
        else
        phd_exp_to1="";
        $('#post_exp_from1').val(phd_exp_from1);
        $('#post_exp_to1').val(phd_exp_to1);
        $('#post_exp_duration1').val(result[0].phd_exp_duration1);
        $('#post_exp_duties1').val(result[0].phd_exp_duties1);

        $('#post_exp_institute2').val(result[0].phd_exp_institute2);
        $('#post_exp_fund2').val(result[0].phd_exp_fundagency2);
        if(result[0].phd_exp_from2!=null)
        var phd_exp_from2 = moment(result[0].phd_exp_from2).format('DD-MM-YYYY');
        else
        phd_exp_from2="";
        if(result[0].phd_exp_to2!=null)
        var phd_exp_to2 = moment(result[0].phd_exp_to2).format('DD-MM-YYYY');
        else
        phd_exp_to2="";
        $('#post_exp_from2').val(phd_exp_from2);
        $('#post_exp_to2').val(phd_exp_to2);
        $('#post_exp_duration2').val(result[0].phd_exp_duration2);
        $('#post_exp_duties2').val(result[0].phd_exp_duties2);

        $('#post_exp_institute3').val(result[0].phd_exp_institute3);
        $('#post_exp_fund3').val(result[0].phd_exp_fundagency3);
        if(result[0].phd_exp_from3!=null)
        var phd_exp_from3 = moment(result[0].phd_exp_from3).format('DD-MM-YYYY');
        else
        phd_exp_from3="";
        if(result[0].phd_exp_to3!=null)
        var phd_exp_to3 = moment(result[0].phd_exp_to3).format('DD-MM-YYYY');
        else
        phd_exp_to3="";
        $('#post_exp_from3').val(phd_exp_from3);
        $('#post_exp_to3').val(phd_exp_to3);
        $('#post_exp_duration3').val(result[0].phd_exp_duration3);
        $('#post_exp_duties3').val(result[0].phd_exp_duties3);
        $('#paper_count').val(result[0].paper_count);
        $('#skill').val(result[0].skills);
        $('#relevant').val(result[0].relevant);
        $('#vision').val(result[0].contribution);
        $('#Ref_name1').val(result[0].ref_name1);
        $('#Ref_postheld1').val(result[0].ref_addr1);
        $('#Ref_phone1').val(result[0].ref_phone1);
        $('#Ref_email1').val(result[0].ref_email1);
        //$('#Ref_mobile1').val(result[0].ref_mobile1);

        $('#Ref_name2').val(result[0].ref_name2);
        $('#Ref_postheld2').val(result[0].ref_addr2);
        $('#Ref_phone2').val(result[0].ref_phone2);
        $('#Ref_email2').val(result[0].ref_email2);
       // $('#Ref_mobile2').val(result[0].ref_mobile2);

       $('#Ref_name3').val(result[0].ref_name3);
       $('#Ref_postheld3').val(result[0].ref_addr3);
       $('#Ref_phone3').val(result[0].ref_phone3);
       $('#Ref_email3').val(result[0].ref_email3);
        //$('#Ref_mobile3').val(result[0].ref_mobile3);
        if(result[0].submit==1)
        {
          $('#exampleCheck1').attr("checked",true);
          $('#my_declaration').show();
          $('#dash').hide();
          $('#my_declaration').text(result[0].name);
          $("#scientist :input").prop("disabled", true);
          $(".save_btn").prop("disabled", true);
          $('#view2').show();
          $('#appl_view2').show();
          $('#v1').text(result[0].ref_no);
          var ur = '{{ route("generatePDF", ":pd") }}';
          ur = ur.replace(':pd', result[0].post_code);
          $("#dlink").attr("href",ur);
        }

        else
        {
          $('#exampleCheck1').attr("checked",false);
          $('#my_declaration').show();
          $('#dash').hide();
          $('#my_declaration').text("------------");
          $("#scientist :input").prop("disabled", false);
          $('#sub_btn').attr('disabled', 'disabled');

          $(".save_btn").prop("disabled", false);
          $('#view2').hide();
          $('#appl_view2').hide();
          $('#v1').text("");
          var ur="";
          $("#dlink").attr("href",ur);
          
        }
       //$('#casteprooffile').val(result[0].category_file);
       
       
     }
   }

 });
//copy paste disable in text area
$('#exp_duties1').on("cut copy paste",function(e) {
  e.preventDefault();
});
$('#exp_duties2').on("cut copy paste",function(e) {
  e.preventDefault();
});
$('#exp_duties3').on("cut copy paste",function(e) {
  e.preventDefault();
});
   // $('#post_exp_duties1').on("cut copy paste",function(e) {
   //    e.preventDefault();
   // });
   // $('#post_exp_duties2').on("cut copy paste",function(e) {
   //    e.preventDefault();
   // });
   // $('#post_exp_duties3').on("cut copy paste",function(e) {
   //    e.preventDefault();
   // });
   // $('#vision').on("cut copy paste",function(e) {
   //    e.preventDefault();
   // });
   // $('#skill').on("cut copy paste",function(e) {
   //    e.preventDefault();
   // });
   // $('#relevant').on("cut copy paste",function(e) {
   //    e.preventDefault();
   // });

//copy paste disable in text area




$('#same_as_above').click(function() {
  if ($(this).is(':checked')) {
    $('#address2').val($('#address1').val());


    // $('#my_declaration').show();
    // $('#dash').hide();
    // $('#my_declaration').text(name);


  } else {
    //alert();
    $('#address2').val("");
  }
});



$('#scientist').validate({

  rules: {
    post_code:{
     required: true,
   },

   title:{
     required: true,
   },
   name:{
     required: true,
   },
   fname:{
     required: true,
   },
   category:{
     required: true,
   },
   // caste:{
   // required: true,
   // },
   dob:{
     required: true,
   },


   marital_status:{
     required: true,
   },
   mobile:
   {
     required: true,
   },
   address1:{
     required: true,
   },
   address2:{
     required: true,
   },
   idproof:{
     required: true,
   },
   idprooffile:{
     required:'#hid_idproof[value=""]',
   },
   photo:
   {
     required: '#hid_photo[value=""]',
   },

   gender:{
     required: true,
   },
   nationality:{
     required: true,
   },
   signature:
   {
     required: '#hid_signature[value=""]',
   },
   ug_course:{
     required: true,
   },
   ug_subject:{
     required: true,
   },
   ug_institution:
   {
     required: true,
   },
   ug_year:{
     required: true,
   },
   ug_percentage:
   {
     required: true,
   },
   ug_certificate:{
     required: '#hid_ug1[value=""]',
   },
   ug_marklist:
   {
     required: '#hid_ug2[value=""]',
   },
   pg_course:{
     required: true,
   },
   pg_subject:{
     required: true,
   },
   pg_institution:
   {
     required: true,
   },
   pg_year:{
     required: true,
   },
   pg_percentage:
   {
     required: true,
   },
   pg_certificate:{
     required: '#hid_pg1[value=""]',
   },
   pg_marklist:
   {
     required: '#hid_pg2[value=""]',
   },
   email: {
    required: true,
    email: true,
  },
  
  
  
  skill:
  {
   required: true,
 },
 vision:
 {
   required: true,
 },
 Ref_name1:
 {
  required: true,

},
Ref_postheld1:
{
  required: true,

},

Ref_phone1:
{
  required: true,

},

Ref_name2:
{
  required: true,

},
Ref_postheld2:
{
  required: true,

},

Ref_phone2:
{
  required: true,

},

Ref_name3:
{
  required: true,

},
Ref_postheld3:
{
  required: true,

},

Ref_phone3:
{
  required: true,

},
Ref_email1:
{
  required: true,
  email: true,
},
Ref_email2:
{
  required: true,
  email: true,
},
Ref_email3:
{
  required: true,
  email: true,
},

terms: {
  required: true
},
curnt: {
  required: true
},
    // noc: { required: function(element){
    //   return $("#curnt option:selected").text() == "Yes";
    // }
    caste: { 
     required: function(element)

     {
      return $('select[name=category]').val() !='Open Category/General';

    }
    
  },
  phd_institution: { 
   required: function(element)

   {
    return $('select[name=post_code]').val() == 'SCC/02/2020'||$('select[name=post_code]').val() == 'SCC/03/2020'||$('select[name=post_code]').val() == 'SCC/07/2020'||$('select[name=post_code]').val() == 'SCC/08/2020'||$('select[name=post_code]').val() == 'SCC/09/2020'||$('select[name=post_code]').val() == 'SCC/10/2020';

  }

},


phd_subject: { 
 required: function(element)

 {
  return $('select[name=post_code]').val() == 'SCC/02/2020'||$('select[name=post_code]').val() == 'SCC/03/2020'||$('select[name=post_code]').val() == 'SCC/07/2020'||$('select[name=post_code]').val() == 'SCC/08/2020'||$('select[name=post_code]').val() == 'SCC/09/2020'||$('select[name=post_code]').val() == 'SCC/10/2020';

}

},

phd_title: { 
  required: function(element)

  {
    return $('select[name=post_code]').val() == 'SCC/02/2020'||$('select[name=post_code]').val() == 'SCC/03/2020'||$('select[name=post_code]').val() == 'SCC/07/2020'||$('select[name=post_code]').val() == 'SCC/08/2020'||$('select[name=post_code]').val() == 'SCC/09/2020'||$('select[name=post_code]').val() == 'SCC/10/2020';
  }
},
phd_year: { 
  required: function(element)

  {
    return $('select[name=post_code]').val() == 'SCC/02/2020'||$('select[name=post_code]').val() == 'SCC/03/2020'||$('select[name=post_code]').val() == 'SCC/07/2020'||$('select[name=post_code]').val() == 'SCC/08/2020'||$('select[name=post_code]').val() == 'SCC/09/2020'||$('select[name=post_code]').val() == 'SCC/10/2020';
  }
},
// phd_certificate:
// { 
//  required: 

//  {


//    depends: function(element) {
//     if (($('#post_code').val() == "SCC/02/2020" || $('#post_code').val() == "SCC/03/2020" || $('#post_code').val() == "SCC/07/2020" || $('#post_code').val() == "SCC/08/2020" || $('#post_code').val() == "SCC/09/2020" || $('#post_code').val() == "SCC/10/2020") &&($('#hid_phd1').val()=="")) 
//     {
//       return true;
//     } 
//     else 
//     {
//       return false;
//     }
//   }


  
// } 

// },

// phd_summary:
// { 
//   required: 

//   {


//    depends: function(element) {
//     if (($('#post_code').val() == "ICCS/SE1/01/22" || $('#post_code').val() == "ICCS/SB/01/22" || $('#post_code').val() == "ICCS/SB/02/22" ) &&($('#hid_phd2').val()=="")) 
//     {
//       return true;
//     } 
//     else 
//     {
//       return false;
//     }
//   }


  
// } 

// },
},


messages: {
  title: {
    required: "Please enter a title ",
        // email: "Please enter a vaild email address"
      },
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      Ref_email1: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      Ref_email2: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      Ref_email3: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      // noc: { 
      //   required: "Please upload NOC"
      // },
      terms: "Please accept our terms",
      curnt: "Please Select a value"

    },

    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.err').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });

$( '#category' ).change(function() {
  //alert();
  if($('#category').val() =='Open Category/General')
    $('#caste_label').removeClass('req');
  else
    $('#caste_label').addClass('req');

});
$("#sub_btn").click(function() { 
  //alert("zas");



  var formData = new FormData($('#scientist')[0]);


  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  swal({text: "Once the application is submitted it can't be edited. Do you want to submit the application form?",
   buttons: ["No", "Yes"]

 }).then((willDelete) => {
  if (willDelete) {
      // alert($("#scientist").valid());
      if( $("#scientist").valid())
      {
       $('#sub_btn').attr('disabled', 'disabled');
       $.ajax({
        url:APP_URL+"/scientist/applicationSubmit",
        type:'POST',
        dataType: "json",
        data: formData,
        processData: false,
        contentType: false,
        success :function(result){

          if(result.status==true)
          {
           swal({text: result.message}).then(function() {
             window.location.href=APP_URL+'/scientist/Application';
           });

         }
         else if(result.status==false)
         {
          if(result.message=='exception')
          {
            swal({text: "Session Expired. Please login..!"}).then(function() {
              location.reload();
            });

          }
          else
          {
           swal({text: result.message});
           $('#sub_btn').removeAttr('disabled');
         }
         

       }




     },


   });
     }
     else
     {
      swal("Please fill all the mandatory fields!!");
      $('#sub_btn').removeAttr('disabled');

    }
  }
});
});

});



     // var quali=$("input[name='quali']:checked").val()
      //alert(quali);






//age calculation with category
function age_cal()
{
    //show();
    //alert("cdf");
    var v=$('#dob').val();
    var now = moment('08-12-2022','DD-MM-YYYY');
    var birthDate = moment(v,'DD-MM-YYYY');
    var yearDiff = moment.duration(now - birthDate).as('years');
    
    var age= Math.ceil(yearDiff);
   
    var category=$('#category').val();
    var post_code=$('#post_code').val();
    //var msg1="-years old;";
    //alert(category);
    if(category=="")
    {
      swal("Please Select your Category");
      $("#dob").val("");
      age="";
      msg1="";
      msg="Select category";
      //$("#submittername").text(msg);
    }
    if(post_code=='ICCS/SB/01/22' || post_code=='ICCS/SB/02/22' )
    {
    if(category=='SC' || category=='ST')
    {
      //alert("ss/ST");
      if(age>40)
      {
       // alert("ss/ST>40");
       var msg="Ineligible";
       swal("Age over");
       $('.save_btn').hide();
       $('#sub_btn').hide();
     }
     else if(age<20)
     {
         //alert("ss/ST:eligible");
         var msg="Ineligible";
         swal("Not Eligible");
         $('.save_btn').hide();
         $('#sub_btn').hide();
       }
       else
       {
         //alert("ss/ST:eligible");
         var msg="Eligible to apply";
         $('.save_btn').show();
         $('#sub_btn').show();
       }
     }
     else if(category=='OBC')
     {
       //alert("OBC:cwrdm:yes");
       if(age>38)
       {
         // alert("OBC:cwrdm:yes>40");
         var msg="Ineligible";
         swal("Age over");
         $('.save_btn').hide();
         $('#sub_btn').hide();
       }
       else if(age<20)
       {
         //alert("ss/ST:eligible");
         var msg="Ineligible";
         swal("Not Eligible");
         $('.save_btn').hide();
         $('#sub_btn').hide();
       }
       else
       {
      //alert("OBC:cwrdm:yes<40");
      var msg="Eligible to apply";

      $('.save_btn').show();
      $('#sub_btn').show();
    }
  }


  else if(category=='Open Category/General')
  {
   //alert("Open Category/General:cwrdm:no");
   if(age>35)
   {
     //alert("Open Category/General:cwrdm:no>35");
     var msg="Ineligible";
     swal("Age over");
     $('.save_btn').hide();
     $('#sub_btn').hide();
   }
   else if(age<20)
   {
         //alert("ss/ST:eligible");
         var msg="Ineligible";
         swal("Not Eligible");
         $('.save_btn').hide();
         $('#sub_btn').hide();
       }
       else
       {
     //alert("Open Category/General:cwrdm:no<3540");
     var msg="Eligible to apply";

     $('.save_btn').show();
     $('#sub_btn').show();
   }



 }
}

else if(post_code=='ICCS/SE1/01/22' )
    {
    if(category=='SC' || category=='ST')
    {
      //alert("ss/ST");
      if(age>45)
      {
       // alert("ss/ST>40");
       var msg="Ineligible";
       swal("Age over");
       $('.save_btn').hide();
       $('#sub_btn').hide();
     }
     else if(age<20)
     {
         //alert("ss/ST:eligible");
         var msg="Ineligible";
         swal("Not Eligible");
         $('.save_btn').hide();
         $('#sub_btn').hide();
       }
       else
       {
         //alert("ss/ST:eligible");
         var msg="Eligible to apply";
         $('.save_btn').show();
         $('#sub_btn').show();
       }
     }
     else if(category=='OBC')
     {
       //alert("OBC:cwrdm:yes");
       if(age>43)
       {
         // alert("OBC:cwrdm:yes>40");
         var msg="Ineligible";
         swal("Age over");
         $('.save_btn').hide();
         $('#sub_btn').hide();
       }
       else if(age<20)
       {
         //alert("ss/ST:eligible");
         var msg="Ineligible";
         swal("Not Eligible");
         $('.save_btn').hide();
         $('#sub_btn').hide();
       }
       else
       {
      //alert("OBC:cwrdm:yes<40");
      var msg="Eligible to apply";

      $('.save_btn').show();
      $('#sub_btn').show();
    }
  }


  else if(category=='Open Category/General')
  {
   //alert("Open Category/General:cwrdm:no");
   if(age>40)
   {
     //alert("Open Category/General:cwrdm:no>35");
     var msg="Ineligible";
     swal("Age over");
     $('.save_btn').hide();
     $('#sub_btn').hide();
   }
   else if(age<20)
   {
         //alert("ss/ST:eligible");
         var msg="Ineligible";
         swal("Not Eligible");
         $('.save_btn').hide();
         $('#sub_btn').hide();
       }
       else
       {
     //alert("Open Category/General:cwrdm:no<3540");
     var msg="Eligible to apply";

     $('.save_btn').show();
     $('#sub_btn').show();
   }



 }
}
 $("#submittername").text(msg);
}





function duration1()
{


  var From_date =$("#exp_from1").val();
  var To_date = $("#exp_to1").val();

  var From_date1=moment(From_date,'DD-MM-YYYY');
  var To_date1=moment(To_date,'DD-MM-YYYY');

  var diff_date =moment.duration(To_date1 - From_date1).as('months');
  var diff_date= Math.floor(diff_date);

  $('#exp_duration1').val(diff_date);


}
function duration2()
{


  var From_date =$("#exp_from2").val();
  var To_date = $("#exp_to2").val();

  var From_date1=moment(From_date,'DD-MM-YYYY');
  var To_date1=moment(To_date,'DD-MM-YYYY');

  var diff_date =moment.duration(To_date1 - From_date1).as('months');
  var diff_date= Math.floor(diff_date);

  $('#exp_duration2').val(diff_date);


}
function duration3()
{


  var From_date =$("#exp_from3").val();
  var To_date = $("#exp_to3").val();

  var From_date1=moment(From_date,'DD-MM-YYYY');
  var To_date1=moment(To_date,'DD-MM-YYYY');

  var diff_date =moment.duration(To_date1 - From_date1).as('months');
  var diff_date= Math.floor(diff_date);

  $('#exp_duration3').val(diff_date);


}
function duration7()
{


  var From_date =$("#exp_from4").val();
  var To_date = $("#exp_to4").val();

  var From_date1=moment(From_date,'DD-MM-YYYY');
  var To_date1=moment(To_date,'DD-MM-YYYY');

  var diff_date =moment.duration(To_date1 - From_date1).as('months');
  var diff_date= Math.floor(diff_date);

  $('#exp_duration4').val(diff_date);


}
function duration8()
{


  var From_date =$("#exp_from5").val();
  var To_date = $("#exp_to5").val();

  var From_date1=moment(From_date,'DD-MM-YYYY');
  var To_date1=moment(To_date,'DD-MM-YYYY');

  var diff_date =moment.duration(To_date1 - From_date1).as('months');
  var diff_date= Math.floor(diff_date);

  $('#exp_duration5').val(diff_date);


}
function duration4()
{


  var From_date =$("#post_exp_from1").val();
  var To_date = $("#post_exp_to1").val();

  var From_date1=moment(From_date,'DD-MM-YYYY');
  var To_date1=moment(To_date,'DD-MM-YYYY');

  var diff_date =moment.duration(To_date1 - From_date1).as('months');
  var diff_date= Math.floor(diff_date);

  $('#post_exp_duration1').val(diff_date);


}
function duration5()
{


  var From_date =$("#post_exp_from2").val();
  var To_date = $("#post_exp_to2").val();

  var From_date1=moment(From_date,'DD-MM-YYYY');
  var To_date1=moment(To_date,'DD-MM-YYYY');

  var diff_date =moment.duration(To_date1 - From_date1).as('months');
  var diff_date= Math.floor(diff_date);

  $('#post_exp_duration2').val(diff_date);


}
function duration6()
{


  var From_date =$("#post_exp_from3").val();
  var To_date = $("#post_exp_to3").val();

  var From_date1=moment(From_date,'DD-MM-YYYY');
  var To_date1=moment(To_date,'DD-MM-YYYY');

  var diff_date =moment.duration(To_date1 - From_date1).as('months');
  var diff_date= Math.floor(diff_date);

  $('#post_exp_duration3').val(diff_date);


}
function word_count(field,len)
{
  // alert(field);
  var words = field.value.match(/\S+/g).length;

  if (words > len) {
      // Split the string on first 200 words and rejoin on spaces
      var trimmed = field.value.split(/\s+/, len).join(" ");
      // Add a space at the end to make sure more typing creates new words
      $('#'+field.id).val(trimmed + " ");
      swal("Maximum word limlit is "+len);
    }
    // else {
    //   $('#'+field.id+'_display_count').text(words);
    //   $('#'+field.id+'_word_left').text(len-words);
    // }
  }
  
  function multiple_post_code()
  {
// $('#scientist')[0].reset();

var post=$('#post_code').val();
// alert(post);

$.ajax({

  url:APP_URL+'/scientist/application_details1',
  type:'GET',
  data:{'post_code':post},
  dataType: "json",
  success :function(result){
    if(result.length>0)
    {
     $('#post_code_hidden').val(post);
     if(result[0].post_code=="")
     {
      $("#post_code_working").hide();
      $(".save_btn").hide();
    }
    else
    {
      $(".save_btn").show();
      $("#post_code_working").show();
    }


    if(result[0].category_file!="")
    {

      $('#caste_view2').show();

      var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].category_file;

      $("#a_caste").attr("href",ur);
    }
    else
    {
          //alert("df");

          $('#caste_view2').hide();

          var ur="";

          $("#a_caste").attr("href",ur);
        }
        if(result[0].id_proof_file!="")
        {

          $('#idproof_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].id_proof_file;
        // alert(ur);
        $("#a_idproof").attr("href",ur);
      }
      else
      {
        // alert(result[0].category_file);
        $('#idproof_view2').hide();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur="";
        // alert(ur);
        $("#a_idproof").attr("href",ur);
      }
      if(result[0].photo!="")
      {
        // alert(result[0].category_file);
        $('#photo_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].photo;
        // alert(ur);
        $("#a_photo").attr("href",ur);
      }
      else
      {
        // alert(result[0].category_file);
        $('#photo_view2').hide();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur="";
        // alert(ur);
        $("#a_photo").attr("href",ur);
      }

      if(result[0].sign!="")
      {
        // alert(result[0].category_file);
        $('#sign_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].sign;
        // alert(ur);
        $("#a_sign").attr("href",ur);
      }
      else
      {
        $('#sign_view2').hide();
        var ur="";
        $("#a_sign").attr("href",ur);
      }
      if(result[0].pg_file1!="")
      {
        // alert(result[0].category_file);
        $('#pg1_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].pg_file1;
        // alert(ur);
        $("#a_pg1").attr("href",ur);
      }
      else
      {
        $('#pg1_view2').hide();
        var ur="";
        $("#a_pg1").attr("href",ur);
      }
      if(result[0].pg_file2!="")
      {
        // alert(result[0].category_file);
        $('#pg2_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].pg_file2;
        // alert(ur);
        $("#a_pg2").attr("href",ur);
      }
      else
      {
        $('#pg2_view2').hide();
        var ur="";
        $("#a_pg2").attr("href",ur);
      }
      if(result[0].ug_file1!="")
      {

        $('#ug1_view2').show();
        
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].ug_file1;

        $("#a_ug1").attr("href",ur);
      }
      else
      {
        $('#ug1_view2').hide();
        var ur="";
        $("#a_ug1").attr("href",ur);
      }

      if(result[0].ug_file2!="")
      {

        $('#ug2_view2').show();
        
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].ug_file2;
        
        $("#a_ug2").attr("href",ur);
      }
      else
      {
        $('#ug2_view2').hide();
        var ur="";
        $("#a_ug2").attr("href",ur);
      }
      if(result[0].phd_file!="")
      {

        $('#phd1_view2').show();

        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].phd_file;

        $("#a_phd1").attr("href",ur);
      }
      else
      {
        $('#phd1_view2').hide();
        var ur="";
        $("#a_phd1").attr("href",ur);
      }
      if(result[0].phd_summary!="")
      {

        $('#phd2_view2').show();

        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].phd_summary;
        
        $("#a_phd2").attr("href",ur);
      }
      else
      {
        $('#phd2_view2').hide();
        var ur="";
        $("#a_phd2").attr("href",ur);
      }
      if(result[0].paper_list!="")
      {

        $('#pub_view2').show();
        
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].paper_list;
        
        $("#a_pub").attr("href",ur);
      }
      else
      {
        $('#pub_view2').hide();
        var ur="";
        $("#a_pub").attr("href",ur);
      }

      if(result[0].exp_file1!="")
      {
        // alert(result[0].category_file);
        $('#exp1_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].exp_file1;
        // alert(ur);
        $("#a_exp1").attr("href",ur);
      }
      else
      {
        $('#exp1_view2').hide();
        var ur="";
        $("#a_exp1").attr("href",ur);
      }
      if(result[0].exp_file2!="")
      {
        // alert(result[0].category_file);
        $('#exp2_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].exp_file2;
        // alert(ur);
        $("#a_exp2").attr("href",ur);
      }
      else
      {
        $('#exp2_view2').hide();
        var ur="";
        $("#a_exp2").attr("href",ur);
      }
      if(result[0].exp_file3!="")
      {
        // alert(result[0].category_file);
        $('#exp3_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].exp_file3;
        // alert(ur);
        $("#a_exp3").attr("href",ur);
      }
      else
      {
        $('#exp3_view2').hide();
        var ur="";
        $("#a_exp3").attr("href",ur);
      }

      if(result[0].exp_file4!="")
      {
        // alert(result[0].category_file);
        $('#exp4_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].exp_file4;
        // alert(ur);
        $("#a_exp4").attr("href",ur);
      }
      else
      {
        $('#exp4_view2').hide();
        var ur="";
        $("#a_exp4").attr("href",ur);
      }
      if(result[0].exp_file5!="")
      {
        // alert(result[0].category_file);
        $('#exp5_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].exp_file5;
        // alert(ur);
        $("#a_exp5").attr("href",ur);
      }
      else
      {
        $('#exp5_view2').hide();
        var ur="";
        $("#a_exp5").attr("href",ur);
      }
      if(result[0].phd_exp_file1!="")
      {
        // alert(result[0].category_file);
        $('#post_exp1_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].phd_exp_file1;
        // alert(ur);
        $("#a_post_exp1").attr("href",ur);
      }
      else
      {
        $('#post_exp1_view2').hide();
        var ur="";
        $("#a_post_exp1").attr("href",ur);
      }
      if(result[0].phd_exp_file2!="")
      {
        // alert(result[0].category_file);
        $('#post_exp2_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].phd_exp_file2;
        // alert(ur);
        $("#a_post_exp2").attr("href",ur);
      }
      else
      {
        $('#post_exp2_view2').hide();
        var ur="";
        $("#a_post_exp2").attr("href",ur);
      }
      if(result[0].phd_exp_file3!="")
      {
        // alert(result[0].category_file);
        $('#post_exp3_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].phd_exp_file3;
        // alert(ur);
        $("#a_post_exp3").attr("href",ur);
      }
      else
      {
        $('#post_exp3_view2').hide();
        var ur="";
        $("#a_post_exp3").attr("href",ur);
      }

      if(result[0].pi_copi_file!="")
      {
        // alert(result[0].category_file);
        $('#pi_copi_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].pi_copi_file;
        // alert(ur);
        $("#a_pi_copi").attr("href",ur);
      }
      else
      {
        $('#pi_copi_view2').hide();
        var ur="";
        $("#a_pi_copi").attr("href",ur);
      }
      

      if(result[0].awards_file!="")
      {
        // alert(result[0].category_file);
        $('#awards_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].awards_file;
        // alert(ur);
        $("#a_awards").attr("href",ur);
      }
      else
      {
        $('#awards_view2').hide();
        var ur="";
        $("#a_awards").attr("href",ur);
      }

      if(result[0].conferences_file!="")
      {
        // alert(result[0].category_file);
        $('#conferences_view2').show();
        // APP_URL.trim('public/');
        // alert(APP_URL);
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].conferences_file;
        // alert(ur);
        $("#a_conferences").attr("href",ur);
      }
      else
      {
        $('#conferes_view2').hide();
        var ur="";
        $("#a_conferences").attr("href",ur);
      }

      $('#curnt').val(result[0].curnt);
      if( $('#curnt').val()=="Yes")
      {
        $('#div_noc').show();
      }
      else
      {
        $('#div_noc').hide();
      }
      if(result[0].noc!="")
      {
        $('#noc_view2').show();
        var ur=APP_URL+"/storage/uploads/iccs/"+result[0].ref_no+"/"+result[0].noc;
        $("#a_noc").attr("href",ur);
      }
      else
      {
        $('#noc_view2').hide();
        var ur="";
        $("#a_noc").attr("href",ur);
      }

      if(result[0].dob!=null)
        var appl_dob1 = moment(result[0].dob).format('DD-MM-YYYY');
        else
          appl_dob1="";
    
      $("#post_code_hidden").val(result[0].post_code);

      $('#post_code').val(result[0].post_code);
      $('#title').val(result[0].title);
      $('#name').val(result[0].name);
      $('#fname').val(result[0].fname);
      $('#caste').val(result[0].caste);
      
      $('#dob').val(appl_dob1);
      $('#gender').val(result[0].gender);
      $('#nationality').val(result[0].nationality);
      $('#category').val(result[0].category);


      $('#marital_status').val(result[0].marital_status);
        //$('#mobile').val(result[0].mobile);
        // $('#email').val(result[0].email);
        $('#address1').val(result[0].p_address);
        $('#address2').val(result[0].c_address);
        if((result[0].p_address!=null) && (result[0].c_address!=null))
        {

          if(result[0].p_address==result[0].c_address)
          {
            $('#same_as_above').attr("checked",true);
          }
          else 
          {
          //alert();
          $('#same_as_above').attr("checked",false);
        }
      }
      else
      {
          //alert();
          $('#same_as_above').attr("checked",false);
      }
        $('#idproof').val(result[0].id_proof);
        $('#hid_idproof').val(result[0].id_proof_file);
        $('#hid_photo').val(result[0].photo);
        $('#hid_signature').val(result[0].sign);
        $('#hid_ug1').val(result[0].ug_file1);
        $('#hid_ug2').val(result[0].ug_file2);
        $('#hid_pg1').val(result[0].pg_file1);
        $('#hid_pg2').val(result[0].pg_file2);
        $('#hid_phd1').val(result[0].phd_file); 
        $('#hid_phd2').val(result[0].phd_summary);
        $('#ug_course').val(result[0].ug_course);
        $('#ug_subject').val(result[0].ug_subject);
        $('#ug_institution').val(result[0].ug_university);
        $('#ug_year').val(result[0].ug_year);
        $('#ug_percentage').val(result[0].ug_mark);
        $('#pg_course').val(result[0].pg_course);
        $('#pg_subject').val(result[0].pg_subject);
        $('#pg_institution').val(result[0].pg_university);
        
        
        
        $('#pg_year').val(result[0].pg_year);
        $('#pg_percentage').val(result[0].pg_mark);
        $('#phd_institution').val(result[0].phd_university);
        $('#phd_subject').val(result[0].phd_subject);
        $('#phd_title').val(result[0].phd_title);
        $('#phd_year').val(result[0].phd_year);
        $('#pub_scholar').val(result[0].scholar_link);
        $('#pub_corpus').val(result[0].corpus_id);

        $('#exp_institute1').val(result[0].exp_institute1);
        $('#exp_desig1').val(result[0].exp_designation1);

        if(result[0].exp_from1!=null)
        var exp_from1 = moment(result[0].exp_from1).format('DD-MM-YYYY');
        else
        exp_from1="";
        if(result[0].exp_to1!=null)
        var exp_to1 = moment(result[0].exp_to1).format('DD-MM-YYYY');
        else
        exp_to1="";
        $('#exp_from1').val(exp_from1);
        $('#exp_to1').val(exp_to1);
        $('#exp_duration1').val(result[0].exp_duration1);
        $('#exp_duties1').val(result[0].exp_duties1);

        $('#exp_institute2').val(result[0].exp_institute2);
        $('#exp_desig2').val(result[0].exp_designation2);
        if(result[0].exp_from2!=null)
        var exp_from2 = moment(result[0].exp_from2).format('DD-MM-YYYY');
        else
        exp_from2="";
        if(result[0].exp_to2!=null)
        var exp_to2 = moment(result[0].exp_to2).format('DD-MM-YYYY');
        else
        exp_to2="";
        $('#exp_from2').val(exp_from2);
        $('#exp_to2').val(exp_to2);
        $('#exp_duration2').val(result[0].exp_duration2);
        $('#exp_duties2').val(result[0].exp_duties2);

        $('#exp_institute3').val(result[0].exp_institute3);
        $('#exp_desig3').val(result[0].exp_designation3);
        if(result[0].exp_from3!=null)
        var exp_from3 = moment(result[0].exp_from3).format('DD-MM-YYYY');
        else
        exp_from3="";
        if(result[0].exp_to3!=null)
        var exp_to3 = moment(result[0].exp_to3).format('DD-MM-YYYY');
        else
        exp_to3="";
        $('#exp_from3').val(exp_from3);
        $('#exp_to3').val(exp_to3);
        $('#exp_duration3').val(result[0].exp_duration3);
        $('#exp_duties3').val(result[0].exp_duties3);




        $('#exp_institute4').val(result[0].exp_institute4);
        $('#exp_desig4').val(result[0].exp_designation4);
        if(result[0].exp_from4!=null)
        var exp_from4 = moment(result[0].exp_from4).format('DD-MM-YYYY');
        else
        exp_from4="";
        if(result[0].exp_to4!=null)
        var exp_to4 = moment(result[0].exp_to4).format('DD-MM-YYYY');
        else
        exp_to4="";
        $('#exp_from4').val(exp_from4);
        $('#exp_to4').val(exp_to4);
        $('#exp_duration4').val(result[0].exp_duration4);
        $('#exp_duties4').val(result[0].exp_duties4);


        $('#exp_institute5').val(result[0].exp_institute5);
        $('#exp_desig5').val(result[0].exp_designation5);
        if(result[0].exp_from5!=null)
        var exp_from5 = moment(result[0].exp_from5).format('DD-MM-YYYY');
        else
        exp_from5="";
        if(result[0].exp_to5!=null)
        var exp_to5 = moment(result[0].exp_to5).format('DD-MM-YYYY');
        else
        exp_to5="";
        $('#exp_from5').val(exp_from5);
        $('#exp_to5').val(exp_to5);
        $('#exp_duration5').val(result[0].exp_duration5);
        $('#exp_duties5').val(result[0].exp_duties5);

        $('#post_exp_institute1').val(result[0].phd_exp_institute1);
        $('#post_exp_fund1').val(result[0].phd_exp_fundagency1);
        if(result[0].phd_exp_from1!=null)
        var phd_exp_from1 = moment(result[0].phd_exp_from1).format('DD-MM-YYYY');
        else
        phd_exp_from1="";
        if(result[0].phd_exp_to1!=null)
        var phd_exp_to1 = moment(result[0].phd_exp_to1).format('DD-MM-YYYY');
        else
        phd_exp_to1="";
        $('#post_exp_from1').val(phd_exp_from1);
        $('#post_exp_to1').val(phd_exp_to1);
        $('#post_exp_duration1').val(result[0].phd_exp_duration1);
        $('#post_exp_duties1').val(result[0].phd_exp_duties1);

        $('#post_exp_institute2').val(result[0].phd_exp_institute2);
        $('#post_exp_fund2').val(result[0].phd_exp_fundagency2);
        if(result[0].phd_exp_from2!=null)
        var phd_exp_from2 = moment(result[0].phd_exp_from2).format('DD-MM-YYYY');
        else
        phd_exp_from2="";
        if(result[0].phd_exp_to2!=null)
        var phd_exp_to2 = moment(result[0].phd_exp_to2).format('DD-MM-YYYY');
        else
        phd_exp_to2="";
        $('#post_exp_from2').val(phd_exp_from2);
        $('#post_exp_to2').val(phd_exp_to2);
        $('#post_exp_duration2').val(result[0].phd_exp_duration2);
        $('#post_exp_duties2').val(result[0].phd_exp_duties2);

        $('#post_exp_institute3').val(result[0].phd_exp_institute3);
        $('#post_exp_fund3').val(result[0].phd_exp_fundagency3);
        if(result[0].phd_exp_from3!=null)
        var phd_exp_from3 = moment(result[0].phd_exp_from3).format('DD-MM-YYYY');
        else
        phd_exp_from3="";
        if(result[0].phd_exp_to3!=null)
        var phd_exp_to3 = moment(result[0].phd_exp_to3).format('DD-MM-YYYY');
        else
        phd_exp_to3="";
        $('#post_exp_from3').val(phd_exp_from3);
        $('#post_exp_to3').val(phd_exp_to3);
        $('#post_exp_duration3').val(result[0].phd_exp_duration3);
        $('#post_exp_duties3').val(result[0].phd_exp_duties3);
        $('#paper_count').val(result[0].paper_count);
        $('#skill').val(result[0].skills);
        $('#relevant').val(result[0].relevant);
        $('#vision').val(result[0].contribution);
        $('#Ref_name1').val(result[0].ref_name1);
        $('#Ref_postheld1').val(result[0].ref_addr1);
        $('#Ref_phone1').val(result[0].ref_phone1);
        $('#Ref_email1').val(result[0].ref_email1);
        //$('#Ref_mobile1').val(result[0].ref_mobile1);

        $('#Ref_name2').val(result[0].ref_name2);
        $('#Ref_postheld2').val(result[0].ref_addr2);
        $('#Ref_phone2').val(result[0].ref_phone2);
        $('#Ref_email2').val(result[0].ref_email2);
       // $('#Ref_mobile2').val(result[0].ref_mobile2);

       $('#Ref_name3').val(result[0].ref_name3);
       $('#Ref_postheld3').val(result[0].ref_addr3);
       $('#Ref_phone3').val(result[0].ref_phone3);
       $('#Ref_email3').val(result[0].ref_email3);
        //$('#Ref_mobile3').val(result[0].ref_mobile3);
        if(result[0].submit==1)
        {
          // alert("s");
          $('#exampleCheck1').attr("checked",true);
          $('#my_declaration').show();
          $('#dash').hide();
          $('#my_declaration').text(result[0].name);
          $("#scientist :input").prop("disabled", true);
          $(".save_btn").prop("disabled", true);
          $('#view2').show();
          $('#appl_view2').show();
          $('#v1').text(result[0].ref_no);
          // alert(result[0].post_code);

          var ur = '{{ route("generatePDF", ":pd") }}';
          ur = ur.replace(':pd', result[0].post_code);
          $("#dlink").attr("href",ur);
        }
        else
        {
          // alert("n");
          $('#exampleCheck1').attr("checked",false);
          $('#sub_btn').attr('disabled', 'disabled');
          $('#my_declaration').show();
          $('#dash').hide();
          $('#my_declaration').text("------------");
          $("#scientist :input").prop("disabled", false);
          $(".save_btn").prop("disabled", false);
          $('#view2').hide();
          var ur="";
          $("#dlink").attr("href",ur);
          $('#appl_view2').hide();
          $('#v1').text("");
        }
        
       //$('#casteprooffile').val(result[0].category_file);
       
       
     }
     else
     {
      // alert("ndata");
      $('#scientist')[0].reset();
      $('#post_code_hidden').val(post);
      // alert("n");
      $('#same_as_above').attr("checked",false);
      $('#exampleCheck1').attr("checked",false);
      $('#sub_btn').attr('disabled', 'disabled');
      $('#my_declaration').show();
      $('#dash').hide();
      $('#my_declaration').text("------------");
      $("#scientist :input").prop("disabled", false);
      $(".save_btn").prop("disabled", false);
      $('#view2').hide();
      $('#appl_view2').hide();
      $('#v1').text("");

      $('#caste_view2').hide();
      var ur="";
      $("#a_caste").attr("href",ur);

      $('#idproof_view2').hide();
      var ur="";
      $("#a_idproof").attr("href",ur);

      $('#photo_view2').hide();
      var ur="";
      $("#a_photo").attr("href",ur);

      $('#sign_view2').hide();
      var ur="";
      $("#a_sign").attr("href",ur);
      $('#pg1_view2').hide();
      var ur="";
      $("#a_pg1").attr("href",ur);
      $('#pg2_view2').hide();
      var ur="";
      $("#a_pg2").attr("href",ur);
      $('#ug1_view2').hide();
      var ur="";
      $("#a_ug1").attr("href",ur);
      $('#ug2_view2').hide();
      var ur="";
      $("#a_ug2").attr("href",ur);
      $('#phd1_view2').hide();
      var ur="";
      $("#a_phd1").attr("href",ur);
      $('#phd2_view2').hide();
      var ur="";
      $("#a_phd2").attr("href",ur);
      $('#pub_view2').hide();
      var ur="";
      $("#a_pub").attr("href",ur);
      $('#exp1_view2').hide();
      var ur="";
      $("#a_exp1").attr("href",ur);
      $('#exp2_view2').hide();
      var ur="";
      $("#a_exp2").attr("href",ur);
      $('#exp3_view2').hide();
      var ur="";
      $("#a_exp3").attr("href",ur);
      $('#exp4_view2').hide();
      var ur="";
      $("#a_exp4").attr("href",ur);
      $('#exp5_view2').hide();
      var ur="";
      $("#a_exp5").attr("href",ur);
      $('#post_exp1_view2').hide();
      var ur="";
      $("#a_post_exp1").attr("href",ur);
      $('#post_exp2_view2').hide();
      var ur="";
      $("#a_post_exp2").attr("href",ur);
      $('#post_exp3_view2').hide();
      var ur="";
      $("#a_post_exp3").attr("href",ur);
      $('#pi_copi_view2').hide();
      var ur="";
      $("#a_pi_copi").attr("href",ur);
      $('#awards_view2').hide();
      var ur="";
      $("#a_awards").attr("href",ur);
      $('#conferes_view2').hide();
      var ur="";
      $("#a_conferences").attr("href",ur);
      $('#noc_view2').hide();
      var ur="";
      $("#a_noc").attr("href",ur);
    }
  }



});
}
function save()
{

  var APP_URL = '{{ URL::to('/') }}';


  var formData = new FormData($('#scientist')[0]);
    // var formData=$('#scientist').serialize() ;
  // formData.append('_method', 'PUT');
  //     formData.append('_token', $('meta[name="csrf-token"]').attr('content'))
  for (var pair of formData.entries()) {
    console.log(pair[0]+ ', ' + pair[1]); 
  }
  $("#sub_btn").prop("disabled",true);

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    url:APP_URL+"/scientist/applicationSave",
    type:'POST',
    dataType: "json",
    data:formData,
    processData: false,
    contentType: false,
    success :function(result){

      if(result.status==true)
      {
        swal({text: result.message}).then(function() {
          $("#sub_btn").prop("disabled",false);
      // aler
      $("#post_code").val(result.pcode);
      $("#post_code_hidden").val(result.pcode);
      window.location.href=APP_URL+'/scientist/Application';

    });

     // swal({text: result.message}).then(function() {
     //   window.location.href=APP_URL+'/scientist/Application';
     // });
   }

   else if(result.status==false)
   {
    if(result.message=='exception')
    {
      swal({text: "Session Expired. Please login..!"}).then(function() {
        location.reload();
      });

    }
    else
    {
     swal({text: result.message});
     $("#sub_btn").prop("disabled",false);

   }


 }


},


});//ajax

}
// function submit_apl()
// {



//       $.ajax({
//         url:APP_URL+"/scientist/applicationSubmit",
//         type:'POST',
//         dataType: "json",
//         data: formData,
//         processData: false,
//         contentType: false,
//         success :function(result){

//           if(result.status)
//           {
//            swal({text: result.message}).then(function() {
//              window.location.href=APP_URL+'/scientist/Application';
//            });
//          }
//          else
//          {
//           swal({text: result.message});
//         }




//       },


// });//ajax
//  //    }
//  //    else
//  //    {
//  //      swal("Please fill all the mandatory fields!!");
//  //    }
//  //  }
//  //  else
//  //  {
//  //   window.location.href=APP_URL+'/student/Application';
//  // }
// }
function show_noc(field)
{

  if(field.value == 'Yes')
  {
    $('#div_noc').show();
  }
  else
  {
    $('#div_noc').hide();

  }
}
</script>
@endpush