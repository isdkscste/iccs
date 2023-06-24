<!DOCTYPE html>

<html>

<head>

  <title>Application for the post of Scientist,ICCS</title>
  <style>
    table{  
      border-left: 0;
      border-right: 0;
      border-top: 0;
      border-bottom: 0;
      border-collapse: collapse;
    }
   table tr,table td {
    border-left: 0;
    border-right: 0;
    border-top: 0;
    border-bottom: 0;
}
  </style>

</head>

<body>

  <h3><center>
    Application Form for the post of  Scientist 
  , ICCS </center></h3>


  <p> <table border = 0 width = 100%>
    <tr style="height:-30px">
      <td ><b>Application No:</b></td><td><b>{{$data->ref_no}}</b></td>
      <td width="22%" rowspan="2"><img src="{{asset('storage/uploads/iccs/'.$data->ref_no.'/'.$data->photo) }}" alt="photo" width="150" height="200" /></td></tr>

    </table></p>
    <p> <div align=center><p><b>
         Post Applied For
        </b></div></p>
    <div style="border: 1px solid black">
    <table border = 0 width = 100%>
      <tr><td>Post Code</td><td>{{$data->post_code}}</td></tr>
    </table>
</div>
  <p> <div align=center><p><b>Personal Details</b></p></div>
  <div style="border: 1px solid black">
  <table border = 0 width = 100%>
  <!--    <tr>

      <td> Application number:</td> <td></td>
    </tr> -->
    <tr class="trstyle">   <td>Title</td> <td>{{$data->title}}</td>
    </tr>
    <tr>  <td>Name in Full </td> <td>{{$data->name }}</td>
    </tr>
    <tr>  <td>Name of Father/Guardian </td> <td>{{$data->fname }}</td>
    </tr>
    <tr>   <td> Gender</td> <td>{{$data->gender}}</td>
    </tr>
     <tr>    <td> Nationality</td> <td>{{$data->nationality }}</td>
    </tr>
    <tr>    <td> Category</td> <td>{{$data->category }}</td>
    </tr>
     <tr>    <td> Caste</td> <td>{{$data->caste }}</td>
    </tr>
   
    <tr>     <td> Date of Birth</td> <td>@if(is_null($data->dob)) 
      {{$data->dob}}
        @else
      {{date('d-m-Y',strtotime($data->dob))}}
      @endif</td>
    </tr>
    <tr>      <td>  Marital Status</td> <td>{{$data->marital_status }}</td>
    </tr>
    <tr>       <td> Mobile</td> <td>{{$data->mobile }}</td>
    </tr>
    <tr>        <td>  E-mail</td> <td>{{$data->email }}</td>
    </tr>
    <tr>         <td>  Permanent Address </td> <td>{{$data->p_address }}</td>
    </tr>
    <tr>                  <td>  Address for Communication </td> <td>{{$data->c_address}}</td>
    </tr>
    <tr>         <td> Proof of Identity (ID Showing photo & date of birth)</td> <td>{{$data->id_proof }}</td>
    </tr>


  </table></div>
  <p> <div align=center><p><b>
    QUALIFICATION DETAILS
  </b></p></div>
  <table border = 1 width = 100%>
 

    <tr>   <td>Qualification</td> <td>Course</td><td>Subject</td><td>Name of University/Institution</td> <td>Year of Passing</td>
      <td>Mark/CGPA</td></tr>

      <tr>
        <td>Graduation</td>
        <td>{{$data->ug_course  }}</td>
        <td>{{$data->ug_subject }}</td>
        <td>{{$data->ug_university  }}</td>
        <td>{{$data->ug_year}}</td>
        <td>{{$data->ug_mark }}</td>
      </tr>

  
      <tr>
        <td>Post Graduation</td>
        <td>{{$data->pg_course }}</td>
        <td>{{$data->pg_subject }}</td>
        <td>{{$data->pg_university }}</td>
        <td>{{$data->pg_year}}</td>
        <td>{{$data->pg_mark }}</td>
      </tr>


    </table></p>
    <?php
    if($data->phd_university != NULL)
    {
      ?>

      <p> <div align=center><p><b>
       Ph.D Details 
     </b></p></div>
     <table border = 1 width = 100%>

      <tr>   <td>Name of University/Institution</td> <td>Topic</td> <td> Thesis Title</td>
        <td>Ph.D Awarded Year</td></tr>
        <tr>
          <td>{{$data->phd_university  }}</td>
          <td>{{$data-> phd_subject  }}</td>
          <td>{{$data->phd_title }}</td>
          <td>{{$data->phd_year  }}</td>
        </tr>




      </table></p>
      <?php
    }
    ?>
    <?php
    if($data->scholar_link != NULL || $data->corpus_id !=NULL )
    {
      ?>
      <p> <div align=center><p><b>
        Publication Details
      </b></p></div>

      <table border = 1 width = 100%>

        <tr>   <td>Google Scholar Link </td> <td>{{$data->scholar_link}}</td> 
          <tr>
            <td>ScopusID</td>
            <td>{{$data->corpus_id}}</td>

          </tr>




        </table></p>
        <?php
      }
      ?>



      <?php
      if($data->exp_institute1  != NULL )
      {
        ?>
        <p> <div align=center><p><b>
          RESEARCH/ACADAMIC EXPERIENCE 
        </b></div></p>

        <table border = 1 width = 100%>
<tr><td>Are you currently working?</td><td colspan="5">{{$data->curnt   }}</td></tr>
         <tr>   <td>Institution/
         organisation</td> <td>Designation/
         Post held</td> <td style="width: 12%">  From date</td>
         <td style="width: 12%">To date</td>
         <td>Duration</td>
         <td>Brief description of duties performed </td>

       </tr>
       <tr>
        <td>{{$data->exp_institute1   }}</td>
        <td>{{$data->exp_designation1  }}</td>
        <td>@if(is_null($data->exp_from1)) 
      {{$data->exp_from1}}
        @else
      {{date('d-m-Y',strtotime($data->exp_from1))}}
      @endif</td>
        <td>@if(is_null($data->exp_to1)) 
      {{$data->exp_to1}}
        @else
      {{date('d-m-Y',strtotime($data->exp_to1))}}
      @endif</td>
        <td>{{$data->exp_duration1   }}</td>
        <td>{{$data->exp_duties1   }}</td>

      </tr>
      <?php
      if($data->exp_institute2!=NULL)
      {
        ?>
        <tr>
          <td>{{$data->exp_institute2   }}</td>
          <td>{{$data->exp_designation2  }}</td>
          <td>@if(is_null($data->exp_from2)) 
      {{$data->exp_from2}}
        @else
      {{date('d-m-Y',strtotime($data->exp_from2))}}
      @endif</td>
        <td>@if(is_null($data->exp_to2)) 
      {{$data->exp_to2}}
        @else
      {{date('d-m-Y',strtotime($data->exp_to2))}}
      @endif</td>
          <td>{{$data->exp_duration2   }}</td>
          <td>{{$data->exp_duties2   }}</td>

        </tr>

        <?php
      }
      ?>
      <?php
      if($data->exp_institute3!=NULL)
      {
        ?>
        <tr>
          <td>{{$data->exp_institute3   }}</td>
          <td>{{$data->exp_designation3  }}</td>
          <td>@if(is_null($data->exp_from3)) 
      {{$data->exp_from3}}
        @else
      {{date('d-m-Y',strtotime($data->exp_from3))}}
      @endif</td>
        <td>@if(is_null($data->exp_to3)) 
      {{$data->exp_to3}}
        @else
      {{date('d-m-Y',strtotime($data->exp_to3))}}
      @endif</td>
          <td>{{$data->exp_duration3   }}</td>
          <td>{{$data->exp_duties3  }}</td>

        </tr>

        <?php
      }
      ?>
          <?php
      if($data->exp_institute4!=NULL)
      {
        ?>
        <tr>
          <td>{{$data->exp_institute4   }}</td>
          <td>{{$data->exp_designation4  }}</td>
          <td>@if(is_null($data->exp_from2)) 
      {{$data->exp_from4}}
        @else
      {{date('d-m-Y',strtotime($data->exp_from4))}}
      @endif</td>
        <td>@if(is_null($data->exp_to4)) 
      {{$data->exp_to4}}
        @else
      {{date('d-m-Y',strtotime($data->exp_to4))}}
      @endif</td>
          <td>{{$data->exp_duration4   }}</td>
          <td>{{$data->exp_duties4  }}</td>

        </tr>

        <?php
      }
      ?>
          <?php
      if($data->exp_institute5!=NULL)
      {
        ?>
        <tr>
          <td>{{$data->exp_institute5   }}</td>
          <td>{{$data->exp_designation5  }}</td>
          <td>@if(is_null($data->exp_from2)) 
      {{$data->exp_from5}}
        @else
      {{date('d-m-Y',strtotime($data->exp_from5))}}
      @endif</td>
        <td>@if(is_null($data->exp_to5)) 
      {{$data->exp_to5}}
        @else
      {{date('d-m-Y',strtotime($data->exp_to5))}}
      @endif</td>
          <td>{{$data->exp_duration5   }}</td>
          <td>{{$data->exp_duties5  }}</td>

        </tr>

        <?php
      }
      ?>
    </table></p>
    <?php
  }
  ?>




  <?php
  if($data->phd_exp_institute1  != NULL )
  {
    ?>
    <p> <div align=center><p><b>
    Post Doctoral Experience         </b></p></div>

    <table border = 1 width = 100%>

     <tr>   <td>Institution/
     organisation</td> <td>Funding Agency</td> <td style="width: 12%">  From date</td>
     <td style="width: 12%">To date</td>
     <td>Duration</td>
     <td>Brief description of the project </td>

   </tr>
   <tr>
    <td>{{$data->phd_exp_institute1   }}</td>
    <td>{{$data->phd_exp_fundagency1  }}</td>

    <td>@if(is_null($data->phd_exp_from1)) 
      {{$data->phd_exp_from1}}
        @else
      {{date('d-m-Y',strtotime($data->phd_exp_from1))}}
      @endif</td>
        <td>@if(is_null($data->phd_exp_to1)) 
      {{$data->phd_exp_to1}}
        @else
      {{date('d-m-Y',strtotime($data->phd_exp_to1))}}
      @endif</td>
    
    <td>{{$data->phd_exp_duration1    }}</td>
    <td>{{$data->phd_exp_duties1   }}</td>

  </tr>
  <?php
  if($data->phd_exp_institute2!=NULL)
  {
    ?>
    <tr>
      <td>{{$data->phd_exp_institute2   }}</td>
      <td>{{$data->phd_exp_fundagency2  }}</td>
      <td>@if(is_null($data->phd_exp_from1)) 
      {{$data->phd_exp_from2}}
        @else
      {{date('d-m-Y',strtotime($data->phd_exp_from2))}}
      @endif</td>
        <td>@if(is_null($data->phd_exp_to2)) 
      {{$data->phd_exp_to2}}
        @else
      {{date('d-m-Y',strtotime($data->phd_exp_to2))}}
      @endif</td>
      <td>{{$data->phd_exp_duration2    }}</td>
      <td>{{$data->phd_exp_duties2  }}</td>

    </tr>

    <?php
  }
  ?>
  <?php
  if($data->phd_exp_institute3!=NULL)
  {
    ?>
    <tr>
     <td>{{$data->phd_exp_institute3   }}</td>
     <td>{{$data->phd_exp_fundagency3  }}</td>
     <td>@if(is_null($data->phd_exp_from3)) 
      {{$data->phd_exp_from3}}
        @else
      {{date('d-m-Y',strtotime($data->phd_exp_from3))}}
      @endif</td>
        <td>@if(is_null($data->phd_exp_to3)) 
      {{$data->phd_exp_to3}}
        @else
      {{date('d-m-Y',strtotime($data->phd_exp_to3))}}
      @endif</td>
     <td>{{$data->phd_exp_duration3    }}</td>
     <td>{{$data->phd_exp_duties3  }}</td>

   </tr>

   <?php
 }
 ?>
</table></p>
<?php
}
?>











<p> <div align=center><p><b>
Skills & Strength </b></p></div>

<table border = 1 width = 100%>
  <tr><td>{{$data->skills }}</td></tr>

</table></p>


<?php
if($data->relevant!=NULL)
{
 ?>
 <p> <div align=center><p><b>
 Any other Relevant Information </b></p></div>

 <table border = 1 width = 100%>
  <tr><td>{{$data->relevant }}</td></tr>

</table></p>
<?php
}
?>
<p> <div align=center><p><b>
Your Vision for ICCS </b></p></div>

<table border = 1 width = 100%>
  <tr><td>{{$data->contribution }}</td></tr>

</table></p>

<p> <div align=center><p><b>
Reference</b></p></div>

<table border = 1 width = ref_name1 100%>
  <tr><td>Name</td><td>Designation & Address</td><td>Email</td><td>Phone</td></tr>

  <tr><td>{{$data->ref_name1  }}</td><td>{{$data->ref_addr1  }}</td><td>{{$data->ref_email1  }}</td><td>{{$data->ref_phone1  }}</td></tr>

  <tr><td>{{$data->ref_name2  }}</td><td>{{$data->ref_addr2  }}</td><td>{{$data->ref_email2  }}</td><td>{{$data->ref_phone2  }}</td></tr>

  <tr><td>{{$data->ref_name3  }}</td><td>{{$data->ref_addr3  }}</td><td>{{$data->ref_email3  }}</td><td>{{$data->ref_phone3  }}</td></tr>

</table></p>

<p> <div align=center><p><b>
List of Uploads</b></p></div>
<div style="border: 1px solid black">
<table border = 0 width =  100%>
  <tr><td>Caste Certificate</td><td><?php
if($data->category_file!=NULL) {echo "Yes";} else {echo "No";}?></td></tr>
  <tr><td>ID Proof</td><td><?php
if($data->id_proof_file!=NULL) {echo "Yes";} else {echo "No";}?></td></tr>
  <tr><td>Photo</td><td><?php
if($data->photo!=NULL) {echo "Yes";} else {echo "No";}?></td></tr>
  <tr><td>Signature</td><td><?php
if($data->sign!=NULL) {echo "Yes";} else {echo "No";}?></td></tr>
  <tr><td>Graduation Certificate </td><td><?php
if($data->ug_file1!=NULL) {echo "Yes";} else {echo "No";}?></td></tr>
  <tr><td>Final Consolidated Mark list (Graduation)</td><td><?php
if($data->ug_file2!=NULL) {echo "Yes";} else {echo "No";}?></td></tr>
  <tr><td>PG certificate</td><td><?php
if($data->pg_file1!=NULL) {echo "Yes";} else {echo "No";}?></td></tr>
  <tr><td>Final Consolidated Mark list (PG)</td><td><?php
if($data->pg_file2!=NULL) {echo "Yes";} else {echo "No";}?></td></tr>
  <tr><td>Phd certificate </td><td><?php
if($data->phd_file!=NULL) {echo "Yes";} else {echo "No";}?></td></tr>
  <tr><td>One page summary of Phd</td><td><?php
if($data->phd_summary!=NULL) {echo "Yes";} else {echo "No";}?></td></tr>
  <tr><td>List of Publications/Patent</td><td><?php
if($data->paper_list!=NULL) {echo "Yes";} else {echo "No";}?></td></tr>
  <tr><td>NOC</td><td><?php
if($data->noc!=NULL) {echo "Yes";} else {echo "No";}?></td></tr>
  <tr><td>Research/Academic Experience 1</td><td><?php
if($data->exp_file1!=NULL) {echo "Yes";} else {echo "No";}?></td></tr>
  <tr><td>Research/Academic Experience 2</td><td><?php
if($data->exp_file2!=NULL) {echo "Yes";} else {echo "No";}?></td></tr>
  <tr><td>Research/Academic Experience 3</td><td><?php
if($data->exp_file3!=NULL) {echo "Yes";} else {echo "No";}?></td></tr>
  <tr><td>Research/Academic Experience 4</td><td><?php
if($data->exp_file4!=NULL) {echo "Yes";} else {echo "No";}?></td></tr>
  <tr><td>Research/Academic Experience 5</td><td><?php
if($data->exp_file5!=NULL) {echo "Yes";} else {echo "No";}?></td></tr>
  <tr><td>Post Doctoral Experience 1</td><td><?php
if($data->phd_exp_file1!=NULL) {echo "Yes";} else {echo "No";}?></td></tr>
  <tr><td>Post Doctoral Experience 2</td><td><?php
if($data->phd_exp_file2!=NULL) {echo "Yes";} else {echo "No";}?></td></tr>
  <tr><td>Post Doctoral Experience 3</td><td><?php
if($data->phd_exp_file3!=NULL) {echo "Yes";} else {echo "No";}?></td></tr>
  <tr><td>Research Project As Principal investigator/Co-Principal Investigator</td><td><?php
if($data->pi_copi_file!=NULL) {echo "Yes";} else {echo "No";}?></td></tr>
  <tr><td>Awards/Achievements/Membership in Professional bodies</td><td><?php
if($data->awards_file!=NULL) {echo "Yes";} else {echo "No";}?></td></tr>
  <tr><td>Paper Presented in Conferences or Seminars</td><td><?php
if($data->conferences_file!=NULL) {echo "Yes";} else {echo "No";}?></td></tr>

</table></div>
</br>
<br>
<br>

<table width="100%" border="0" style="text-align: justify;" >
  <tr  ><td colspan="2">I {{$data->name}} hereby declare that all the statements  made in the application   is true ,complete and correct to  the best of my knowledge and belief.I understand that if any of the above data is found incorrect ,my application will be rejected. </td></tr>
  <tr><td width="52%" height="42"></td><td width="48%" height="42"><img src="{{asset('storage/uploads/iccs/'.$data->ref_no.'/'.$data->sign)}}"></td></tr>
  
  <tr>
    <td width="52%"><b>Date: <?php echo date('d-m-Y', strtotime($data->updated_at)) ?></b></td>
    <td width="48%"><b>Name:{{$data->name}}</b></td>
  </tr>
</table>
</body>

</html>