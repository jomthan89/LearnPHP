<?php
  session_start();
  error_reporting(0);
  include('includes/dbconn.php');

  if (strlen($_SESSION['avmsaid']==0)) {
    header('location:logout.php');
    } else {
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Apartment Visitor Management System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->

  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php include 'includes/header.php'?>
  
    <?php $page='apartment3'; include 'includes/sidebar.php'?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ห้องพักมีผู้เช่า
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
        <li class="active">ห้องพักมีผู้เช่า</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
    <div class="row">
        <div class="col-xs-10">
          
          <div class="box">

            <!-- <div class="box-header">
              <h3 class="box-title"><a href="add-apartment.php"><button type="button" class="btn btn-block btn-primary btn-sm">เพิ่มห้องพัก</button></a></h3>
            </div> -->

            <div class="box-header">
                <h5 class="box-title">จำนวนห้องที่ถูกเช่า</button></a></h5>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>
                <tr bgcolor=CFF4FC>
                  <!-- <th>ไอดี</th> -->
                  <th>ห้อง</th>
                  <th>รูปภาพ</th>                 
                  <th>ประเภทห้อง</th>
                  <th>ค่าเช่า/เดือน</th>
                  <th>มัดจำ</th>
                  <th>ตึก</th>
                  <th>สถานะห้อง</th>
                  <th>การจัดการ</th>
                </tr>
                </thead>
                <?php
                $ret=mysqli_query($con,"SELECT * from apartment WHERE apartment_status = 'เช่าเเล้ว'");
                $cnt=1;
                while ($row=mysqli_fetch_array($ret)) {

                ?>
                <tbody>
                <tr>
                <!-- <td align=center><?php echo $cnt;?></td> -->

                  <td align=center><?php  echo $row['apartment_number'];?></td>

                  <td><img src="fileupload/<?php echo $row['fileupload'];?>"  width='100'></td>                  

                  <td align=left><?php  echo $row['type_status'];?></td>

                  <td align=left><?php  echo $row['apartment_rent'];?></td>

                  <td align=left><?php  echo $row['apartment_deposit'];?></td>

                  <td align=left><?php  echo $row['building_number'];?></td>

                  <td align=left><?php  echo $row['apartment_status'];?></td>

                  <td>

                  <a href="edit-apartment.php?editid=<?php echo $row['ID'];?>" title="เเก้ไข" class='btn btn-warning btn-xs'>เเก้ไข</a>&nbsp;
                  <a href="remove-apartment.php?editid=<?php echo $row['ID'];?>" title="ลบ" class='btn btn-danger btn-xs'>ลบ</a></td>
                
                </tr>
                <?php 
                $cnt=$cnt+1;
                }?>
            
                </tbody>
              
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php include 'includes/footer.php'?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark" style="display: none;">
    <!-- Create the tabs -->
    
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->

      <div class="tab-pane" id="control-sidebar-home-tab">
       
      </div>
 
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<!-- <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script> -->

<script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
        $('#example1').DataTable( {
        "aaSorting" :[[0,'desc']],  
        "oLanguage": {
        "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
        "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
        "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
        "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
        "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
        "sSearch": "ค้นหา :",
        "aaSorting" :[[0,'desc']],
        "oPaginate": {
        "sFirst":    "หน้าแรก",
        "sPrevious": "ก่อนหน้า",
        "sNext":     "ถัดไป",
        "sLast":     "หน้าสุดท้าย"
        },
        }
        } );
        } );
</script>

</body>
</html>

<?php } ?>
