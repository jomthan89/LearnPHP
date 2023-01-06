<?php
  session_start();
  error_reporting(0);
  include('includes/dbconn.php');

  if (strlen($_SESSION['avmsaid']==0)) {
    header('location:logout.php');
    } else {
      if(isset($_POST['submit']))
    {
    $cvmsaid=$_SESSION['cvmsaid'];
    $apartmentno=$_POST['apartmentno'];
    $apartmentrent=$_POST['apartmentrent'];
    $apartmentdeposit=$_POST['apartmentdeposit'];
    $buildingno=$_POST['buildingno'];
    $apartmentstatus=$_POST['apartmentstatus'];
    $typestatus=$_POST['typestatus'];
    $fileupload=(isset($_POST['fileupload'])?$_POST['fileupload'] :'');
  
    date_default_timezone_set('Asia/Bangkok');
    //สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
    $date = date("Ymd");
    //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
    $numrand = (mt_rand());

      //img
      $upload=$_FILES['fileupload'];
      if($upload !='') {
    
          //โฟลเดอร์ที่เก็บไฟล์
          $path="fileupload/";
          //ตัวขื่อกับนามสกุลภาพออกจากกัน
          $type = strrchr($_FILES['fileupload']['name'],".");
          //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
          $newname =$date.$numrand.$type;
          $path_copy=$path.$newname;
          $path_link="fileupload/".$newname;
          //คัดลอกไฟล์ไปยังโฟลเดอร์
          move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy);
      }  

    $query=mysqli_query($con,"INSERT into apartment (fileupload, apartment_number, apartment_rent, apartment_deposit, type_status, building_number, apartment_status) value ('$newname','$apartmentno','$apartmentrent', '$apartmentdeposit', '$typestatus','$buildingno','$apartmentstatus')");
        

      if ($query) {
      $msg="Apartment Details Added!";
    } else {
        $msg="Something Went Wrong";
      }
  }
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

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php include 'includes/header.php'?>
  
    <?php $page='apartment1'; include 'includes/sidebar.php'?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        เพิ่มห้องพัก
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
        <li class="active">จัดการห้องพัก</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      
      <?php if($msg){ echo "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-info-circle'></i> Alert!</h4>
                $msg
    </div>";}  ?>

         <!-- Forms -->
     
      
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">กรุณากรอกรายละเอียดด้านล่าง</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
          </div>
          <!-- /.box-header -->
          

            <div class="box-body">
              <div class="row">
                <form action="add-apartment.php" method="post" enctype="multipart/form-data">
                  <div class="col-md-6">

                    <!-- /.form-group -->
                    <div class="form-group">
                      <label>ห้อง</label>
                    <input type="text" class="form-control" name="apartmentno" style="width: 100%;" required>
                  </div>

                  <!-- /.form-group -->
                  <div class="form-group">
                      <label>ค่าเช่า/เดือน</label>
                    <input type="text" class="form-control" name="apartmentrent" style="width: 100%;" required>
                  </div>
                   
                     <!-- /.form-group -->
                     <div class="form-group">
                      <label>มัดจำ</label>
                    <input type="text" class="form-control" name="apartmentdeposit" style="width: 100%;" required>
                  </div>

                

                  <!-- /.form-group -->
                  <div class="form-group">
                      <label> ภาพถ่ายในห้อง </label>
                        <input type="file" name="fileupload" id = "fileupload" class="form-control">
                  </div>

                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label>โซน</label>
                    <select class="form-control select2" name="buildingno" style="width: 100%;" required>
                      <option selected="">เลือกตึก</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="T">T</option>
                    </select>
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>ประเภทห้อง</label>
                    <select class="form-control select2" name="typestatus" style="width: 100%;" required>
                      <option selected="">เลือกประเภท</option>
                      <option value="พัดลม">พัดลม</option>
                      <option value="เเอร์">เเอร์</option>
                    </select>
                  </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                    <label>สถานะห้อง</label>
                    <select class="form-control select2" name="apartmentstatus" style="width: 100%;" required>
                      <option selected="">เลือก</option>
                      <option value="มีผู้เช่า">มีผู้เช่า</option>
                      <option value="ว่างอยู่">ว่างอยู่</option>
                    </select>
                  </div>

                </div>
                <!-- /.col -->
              </div>

              
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-block btn-primary btn-lg" name="submit">ยืนยัน</button>
            </div>
        </div>
          </form>
      
      <!-- /Form -->
        
    
	  
      <!-- Main row -->
      
      <!-- / Main row -->

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
</body>
</html>

<?php } ?>
