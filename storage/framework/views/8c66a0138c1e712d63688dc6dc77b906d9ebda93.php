<?php $__env->startSection('content'); ?>

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
<section class="content" id="printarea" >
  <div class="container-fluid">
  
<!--             <div class="col-md-12">
-->             <div class="card">
              <div class="card-header">
                <h3 class="card-title">Application Details</h3>
              </div>
             <b> <h4>Total Application  :<?php echo e($Application_count); ?>&nbsp;&nbsp;&nbsp;&nbsp;
              Submitted Application :<?php echo e($submit_count); ?>&nbsp;&nbsp;&nbsp;&nbsp;
             Total Registration :<?php echo e($registration_count); ?></h4></b>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
  
    <tr>

      
      <th>Application Number</th>
      <th>Post Code</th>
      <th>Name</th>

     <!--  <th>Category</th> -->
      <th>Email</th>
      <th>Mobile</th>
      <th>DOB</th>
      <th>Ug</th>
      <th>Pg</th>
      <th>View Details</th>
       <th>Download</th> 
    </tr>
  </thead>
  <tbody id="scientist-table">


  </tbody>
  <tfoot>
  <tr>
       <th>Application Number</th>
      <th>Post Code</th>
      <th>Name</th>

      <!-- <th>Category</th> -->
      <th>Email</th>
      <th>Mobile</th>
      <th>DOB</th>
      <th>Ug</th>
      <th>Pg</th>
      <th>View Details</th>
     <th>Download</th> 
  </tr>
  </tfoot>

</table>
<!-- </div> -->
</div>
</div>
</div>
</section>
<!-- /.content -->
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startPush('pagescripts'); ?>
<script type="text/javascript"> 
 var APP_URL = '<?php echo e(URL::to('/')); ?>';
</script>
  <script type="text/javascript">

$(document).ready(function(){

 $('#example1').DataTable({
  "processing": true,
    "serverSide": true,
  "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
  
   //url: APP_URL+"/admin/Admin-Dashboard",
    ajax: "<?php echo e(url('/admin/Admin-Dashboard')); ?>",

  columns: [
  {
    data: 'ref_no',
    name: 'ref_no'
   },
   {
    data: 'post_code',
    name: 'post_code'
   },
   {
    data: 'name',
    name: 'name'
   },
   // {
   //  data: 'category',
   //  name: 'category'
   // },
   {
    data: 'email',
    name: 'email'
   },
   {
    data: 'mobile',
    name: 'mobile'
   },
   {
    data: 'dob',
    name: 'dob',
             "render":function (data,type,row,meta) {

                  var dt =moment(row['dob']).format('DD-MM-YYYY')
                  return dt;
                 
                }
   },
   {
    "defaultContent": "null",
    //name: 'ug_course'
      "render": function(data,type,row,meta) {
                   return row['ug_course']+" " +row['ug_subject']+"";
                },
   },
   {
    "defaultContent": "null",
    //name: 'ug_course'
      "render": function(data,type,row,meta) {
                   return row['pg_course']+" " +row['pg_subject']+"";
                },
   },
   
   {"defaultContent": "null", 
    "render": function(data,type,row,meta) {
       //console.log(row);
      return  '<a class="item_edit_btn btn"   target="_blank" title="View Details"  href="<?php echo e(url("/admin/view-details/")); ?>/'+row['id']+'"><i class="fa fa-eye" style="color:green"></i></a>';


      ;

    },
  },
  {"defaultContent": "null", 
    "render": function(data,type,row,meta) {
       //console.log(row);
      return  '<a class="item_edit_btn btn"   target="_blank" title="Download file"  href="<?php echo e(url("admin/generate-pdf")); ?>/'+row['id']+'"><i class="fa fa-download" style="color:green"></i>&nbsp;</a>';


      ;

    }
  }
  ]

  // "fnRowCallback" : function(nRow, aData, iDisplayIndex)
  // {

  //   var oSettings = table_dashboard.fnSettings();
  //   $("td:first", nRow).html(oSettings._iDisplayStart+iDisplayIndex +1);

  //   return nRow;

  // },

 });
});


</script>
<?php $__env->stopPush(); ?>
<!-- <script type="text/javascript">

  $(document).keypress(function (e) {
    if (e.which == 13 || event.keyCode == 13) {
                // alert('enter key is pressed');
                $("#sub_btn").click();
              }
            });
          </script> -->

<?php echo $__env->make('layout.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\iccs\resources\views/admin/admin_dashboard.blade.php ENDPATH**/ ?>