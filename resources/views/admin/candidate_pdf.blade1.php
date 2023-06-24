<!DOCTYPE html>

<html>

<head>

  <title>Application for the post of Junior Scientist, KSCSTE</title>

</head>

<body>


  <h3><center>Application for the post of Junior Scientist, KSCSTE </center></h3>


  <p> <table border =0 width = 100%>
    <tr style="height:-30px">
      <td ><b>Application No:</b></td>
      <td width="55%"><b>{{$datas->appl_no}}</b></td>
      <td width="22%" rowspan="2"><img src="{{ asset('storage/uploads/'.$datas->photo) }}" alt="photo" width="150" height="200" /></td></tr>

    </table></p>
  <p> <div align=center><p><b>Personal Details</b></p></div>

    <table border = 1 width = 100%>
    <!--  <tr>

      <td> Application number:</td> <td>{{$datas->appl_no}}</td>
    </tr> -->
      <tr>   <td>Title</td> <td>{{$datas->title}}</td>
      </tr>
      <tr>  <td>Name in Full </td> <td>{{$datas->name }}</td>
      </tr>
      <tr>   <td> Gender</td> <td>{{$datas->gender}}</td>
      </tr>
      <tr>    <td> Category</td> <td>{{$datas->category }}</td>
      </tr>
      <tr>     <td> Date of Birth</td> <td>{{$datas->dob}}</td>
      </tr>
      <tr>      <td>  Marital Status</td> <td>{{$datas->marital_status }}</td>
      </tr>
      <tr>       <td> Mobile</td> <td>{{$datas->mobile }}</td>
      </tr>
      <tr>        <td>  E-mail</td> <td>{{$datas->email }}</td>
      </tr>
      <tr>         <td>  Permanent Address </td> <td>{{$datas->p_address }}</td>
      </tr>
      <tr>                  <td>  Address for Communication </td> <td>{{$datas->c_address}}</td>
      </tr>
      <tr>         <td> Proof of Identity (ID Showing photo & date of birth)</td> <td>{{$datas->id_proof }}</td>
      </tr>


    </table></p>
    <p> <div align=center><p><b>
      QUALIFICATION DETAILS
    </b></p></div>
    <table border = 1 width = 100%>
     <tr>

      <td colspan="4">PG Qualification: {{$datas->qualification}}</td></tr>

      <tr>   <td>Subject</td> <td>Name of University/Institution</td> <td>Year of Passing</td>
        <td>Mark/CGPA</td></tr>
        <tr>
          <td>{{$datas->pg_subject }}</td>
          <td>{{$datas-> pg_university }}</td>
          <td>{{$datas->pg_year}}</td>
          <td>{{$datas->pg_mark }}</td>
        </tr>




      </table></p>
     
      
</body>

</html>