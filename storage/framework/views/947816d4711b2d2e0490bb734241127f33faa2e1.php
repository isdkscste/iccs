<!DOCTYPE html>

<html>

<head>

  <title>Application for the post of Junior Scientist, CWRDM</title>

</head>

<body>

  <h3><center>
    Application Form for the post of Junior Scientist /Scientist B
  , CWRDM </center></h3>


  <p> <table border = 0 width = 100%>
    <tr style="height:-30px">
      <td ><b>Application No:</b></td><td><b><?php echo e($data->id); ?></b></td>
      <td width="22%" rowspan="2"><img src="<?php echo e(asset('storage/uploads/'.$data->photo)); ?>" alt="photo" width="150" height="200" /></td></tr>

    </table></p>
    <p> <div align=center><p><b>
      POST APPLIED FOR
    </b></p></div>
    <table border = 1 width = 100%>
      <tr><td>Post Code</td><td><?php echo e($data->post_code); ?></td></tr>
    </table>
  </p>
  <p> <div align=center><p><b>Personal Details</b></p></div>

  <table border = 1 width = 100%>
  <!--    <tr>

      <td> Application number:</td> <td></td>
    </tr> -->
    <tr>   <td>Title</td> <td><?php echo e($data->title); ?></td>
    </tr>
    <tr>  <td>Name in Full </td> <td><?php echo e($data->name); ?></td>
    </tr>
    <tr>  <td>Name of Father/Guardian </td> <td><?php echo e($data->fname); ?></td>
    </tr>
    <tr>   <td> Gender</td> <td><?php echo e($data->gender); ?></td>
    </tr>
     <tr>    <td> Nationality</td> <td><?php echo e($data->nationality); ?></td>
    </tr>
    <tr>    <td> Category</td> <td><?php echo e($data->category); ?></td>
    </tr>
     <tr>    <td> Caste</td> <td><?php echo e($data->caste); ?></td>
    </tr>
   
    <tr>     <td> Date of Birth</td> <td><?php echo e($data->dob); ?></td>
    </tr>
    <tr>      <td>  Marital Status</td> <td><?php echo e($data->marital_status); ?></td>
    </tr>
    <tr>       <td> Mobile</td> <td><?php echo e($data->mobile); ?></td>
    </tr>
    <tr>        <td>  E-mail</td> <td><?php echo e($data->email); ?></td>
    </tr>
    <tr>         <td>  Permanent Address </td> <td><?php echo e($data->p_address); ?></td>
    </tr>
    <tr>                  <td>  Address for Communication </td> <td><?php echo e($data->c_address); ?></td>
    </tr>
    <tr>         <td> Proof of Identity (ID Showing photo & date of birth)</td> <td><?php echo e($data->id_proof); ?></td>
    </tr>


  </table></p>
  <p> <div align=center><p><b>
    QUALIFICATION DETAILS
  </b></p></div>
  <table border = 1 width = 100%>
 

    <tr>   <td>Qualification</td> <td>Course</td><td>Subject</td><td>Name of University/Institution</td> <td>Year of Passing</td>
      <td>Mark/CGPA</td></tr>

      <tr>
        <td>Graduation</td>
        <td><?php echo e($data->ug_course); ?></td>
        <td><?php echo e($data->ug_subject); ?></td>
        <td><?php echo e($data->ug_university); ?></td>
        <td><?php echo e($data->ug_year); ?></td>
        <td><?php echo e($data->ug_mark); ?></td>
      </tr>

  
      <tr>
        <td>Post Graduation</td>
        <td><?php echo e($data->pg_course); ?></td>
        <td><?php echo e($data->pg_subject); ?></td>
        <td><?php echo e($data->pg_university); ?></td>
        <td><?php echo e($data->pg_year); ?></td>
        <td><?php echo e($data->pg_mark); ?></td>
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
          <td><?php echo e($data->phd_university); ?></td>
          <td><?php echo e($data-> phd_subject); ?></td>
          <td><?php echo e($data->phd_title); ?></td>
          <td><?php echo e($data->phd_year); ?></td>
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

        <tr>   <td>Google Scholar Link </td> <td><?php echo e($data->scholar_link); ?></td> 
          <tr>
            <td>ScopusID</td>
            <td><?php echo e($data->corpus_id); ?></td>

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
        </b></p></div>

        <table border = 1 width = 100%>
<tr><td>Are you currently working?</td><td colspan="5"><?php echo e($data->curnt); ?></td></tr>
         <tr>   <td>Institution/
         organisation</td> <td>Designation/
         Post held</td> <td>  From date</td>
         <td>To date</td>
         <td>Duration</td>
         <td>Brief description of duties performed </td>

       </tr>
       <tr>
        <td><?php echo e($data->exp_institute1); ?></td>
        <td><?php echo e($data->exp_designation1); ?></td>
        <td><?php echo e($data->exp_from1); ?></td>
        <td><?php echo e($data->exp_to1); ?></td>
        <td><?php echo e($data->exp_duration1); ?></td>
        <td><?php echo e($data->exp_duties1); ?></td>

      </tr>
      <?php
      if($data->exp_institute2!=NULL)
      {
        ?>
        <tr>
          <td><?php echo e($data->exp_institute2); ?></td>
          <td><?php echo e($data->exp_designation2); ?></td>
          <td><?php echo e($data->exp_from2); ?></td>
          <td><?php echo e($data->exp_to2); ?></td>
          <td><?php echo e($data->exp_duration2); ?></td>
          <td><?php echo e($data->exp_duties2); ?></td>

        </tr>

        <?php
      }
      ?>
      <?php
      if($data->exp_institute3!=NULL)
      {
        ?>
        <tr>
          <td><?php echo e($data->exp_institute3); ?></td>
          <td><?php echo e($data->exp_designation3); ?></td>
          <td><?php echo e($data->exp_from3); ?></td>
          <td><?php echo e($data->exp_to3); ?></td>
          <td><?php echo e($data->exp_duration3); ?></td>
          <td><?php echo e($data->exp_duties3); ?></td>

        </tr>

        <?php
      }
      ?>
          <?php
      if($data->exp_institute4!=NULL)
      {
        ?>
        <tr>
          <td><?php echo e($data->exp_institute4); ?></td>
          <td><?php echo e($data->exp_designation4); ?></td>
          <td><?php echo e($data->exp_from4); ?></td>
          <td><?php echo e($data->exp_to4); ?></td>
          <td><?php echo e($data->exp_duration4); ?></td>
          <td><?php echo e($data->exp_duties4); ?></td>

        </tr>

        <?php
      }
      ?>
          <?php
      if($data->exp_institute5!=NULL)
      {
        ?>
        <tr>
          <td><?php echo e($data->exp_institute5); ?></td>
          <td><?php echo e($data->exp_designation5); ?></td>
          <td><?php echo e($data->exp_from5); ?></td>
          <td><?php echo e($data->exp_to5); ?></td>
          <td><?php echo e($data->exp_duration5); ?></td>
          <td><?php echo e($data->exp_duties5); ?></td>

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
     organisation</td> <td>Funding Agency</td> <td>  From date</td>
     <td>To date</td>
     <td>Duration</td>
     <td>Brief description of the project </td>

   </tr>
   <tr>
    <td><?php echo e($data->phd_exp_institute1); ?></td>
    <td><?php echo e($data->phd_exp_fundagency1); ?></td>
    <td><?php echo e($data->phd_exp_from1); ?></td>
    <td><?php echo e($data->phd_exp_to1); ?></td>
    <td><?php echo e($data->phd_exp_duration1); ?></td>
    <td><?php echo e($data->phd_exp_duties1); ?></td>

  </tr>
  <?php
  if($data->phd_exp_institute2!=NULL)
  {
    ?>
    <tr>
      <td><?php echo e($data->phd_exp_institute2); ?></td>
      <td><?php echo e($data->phd_exp_fundagency2); ?></td>
      <td><?php echo e($data->phd_exp_from2); ?></td>
      <td><?php echo e($data->phd_exp_to2); ?></td>
      <td><?php echo e($data->phd_exp_duration2); ?></td>
      <td><?php echo e($data->phd_exp_duties2); ?></td>

    </tr>

    <?php
  }
  ?>
  <?php
  if($data->phd_exp_institute3!=NULL)
  {
    ?>
    <tr>
     <td><?php echo e($data->phd_exp_institute3); ?></td>
     <td><?php echo e($data->phd_exp_fundagency3); ?></td>
     <td><?php echo e($data->phd_exp_from3); ?></td>
     <td><?php echo e($data->phd_exp_to3); ?></td>
     <td><?php echo e($data->phd_exp_duration3); ?></td>
     <td><?php echo e($data->phd_exp_duties3); ?></td>

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
  <tr><td><?php echo e($data->skills); ?></td></tr>

</table></p>


<?php
if($data->relevant!=NULL)
{
 ?>
 <p> <div align=center><p><b>
 Any other Relevant Information </b></p></div>

 <table border = 1 width = 100%>
  <tr><td><?php echo e($data->relevant); ?></td></tr>

</table></p>
<?php
}
?>
<p> <div align=center><p><b>
Your Vision for CWRDM </b></p></div>

<table border = 1 width = 100%>
  <tr><td><?php echo e($data->contribution); ?></td></tr>

</table></p>

<p> <div align=center><p><b>
Reference</b></p></div>

<table border = 1 width = ref_name1 100%>
  <tr><td>Name</td><td>Designation & Address</td><td>Email</td><td>Phone</td></tr>

  <tr><td><?php echo e($data->ref_name1); ?></td><td><?php echo e($data->ref_addr1); ?></td><td><?php echo e($data->ref_email1); ?></td><td><?php echo e($data->ref_phone1); ?></td></tr>

  <tr><td><?php echo e($data->ref_name2); ?></td><td><?php echo e($data->ref_addr2); ?></td><td><?php echo e($data->ref_email2); ?></td><td><?php echo e($data->ref_phone2); ?></td></tr>

  <tr><td><?php echo e($data->ref_name3); ?></td><td><?php echo e($data->ref_addr3); ?></td><td><?php echo e($data->ref_email3); ?></td><td><?php echo e($data->ref_phone3); ?></td></tr>

</table></p>

<p> <div align=center><p><b>
List of Uploads</b></p></div>

<table border = 1 width =  100%>
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

</table></p>
</br>

<table width="100%" border="0" style="text-align: justify;" >
  <tr  ><td colspan="2">I <?php echo e($data->name); ?> hereby declare that all the statements  made in the application   is true ,complete and correct to  the best of my knowledge and belief.I understand that if any of the above data is found incorrect ,my application will be rejected. </td></tr>
  <tr><td width="52%" height="42"></td><td width="48%" height="42"><img src="<?php echo asset("storage/uploads/$data->sign")?>"></td></tr>
  
  <tr>
    <td width="52%"><b>Date: <?php echo date('d-m-Y', strtotime($data->updated_at)) ?></b></td>
    <td width="48%"><b>Name:<?php echo e($data->name); ?></b></td>
  </tr>
</table>
</body>

</html><?php /**PATH F:\xampp\htdocs\cwrdm\resources\views/scientist/myPDF.blade.php ENDPATH**/ ?>