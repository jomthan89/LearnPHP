<?php
  $adminid=$_SESSION['avmsaid'];
  $ret=mysqli_query($con,"SELECT AdminName from tbladmin where ID='$adminid'");
  $row=mysqli_fetch_array($ret);
  $name=$row['AdminName']; ?>
 
 
 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/img-ad.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $name; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> ออนไลน์</a>
        </div>
      </div>

      <!-- search form -->
      <form action="search-result.php" method="POST" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="searchdata" id="searchdata" class="form-control" placeholder="ค้นหา">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"></li>

        <li class="<?php if($page=='dashboard') { echo 'active'; }?>">
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>หน้าหลัก</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li class="treeview <?php if($page != '' && $page=='apartment1' || $page == 'apartment2'|| $page == 'apartment3' || $page == 'apartment4') { echo 'active'; }?>">
          <a href="#"> <i class="fa fa-building-o"></i> 
            <span>จัดการห้องพัก</span>
            <span class="pull-right-container"></span>
            <i class="fa fa-angle-left pull-right"></i> </a>
          </a>
          <ul class="treeview-menu">
          <li class="<?php if($page != '' && $page=='apartment1'){echo 'active';}?>"><a href= "add-apartment.php"><span class="pull-right-container"></span><i class="fa fa-chevron-circle-right"></i>เพิ่มห้องพัก</a></li>
            <li class="<?php if($page != '' && $page=='apartment2'){echo 'active';}?>"><a href= "manage-apartment.php"><span class="pull-right-container"></span><i class="fa fa-chevron-circle-right"></i>ห้องพักทั้งหมด</a></li>
            <li class="<?php if($page != '' && $page=='apartment3'){echo 'active';}?>"><a href= "manage-apartment2.php"><span class="pull-right-container"></span><i class="fa fa-chevron-circle-right"></i>ห้องมีผู้เช่า</a></li>
            <li class="<?php if($page != '' && $page=='apartment4'){echo 'active';}?>"><a href= "manage-apartment3.php"><span class="pull-right-container"></span><i class="fa fa-chevron-circle-right"></i>ห้องว่าง</a></li>
          </ul>
        </li>

        <li class="<?php if($page=='visitors') { echo 'active'; }?>">
          <a href="visitor-entry.php">
            <i class="fa fa-plus"></i> <span>กรอกข้อมูลผู้เช่า</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li>

        <li class="<?php if($page=='checkout_visitors') { echo 'active'; }?>">
          <a href="checkout_visitor.php">
            <i class="fa fa-sign-out"></i> <span>รอย้ายออก</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"><?php include './counters/checkout-visitor.php'?></small>
            </span>
          </a>
        </li>


        <li class="<?php if($page=='visitor-management') { echo 'active'; }?>">
          <a href="visitor-mgmt.php">
            <i class="fa fa-address-card"></i> <span>รายชื่อผู้เช่าทั้งหมด</span>
            <span class="pull-right-container">
            <small class="label pull-right bg-green"><?php include './counters/todays-visitor-count.php'?></small>
            </span>
          </a>
        </li>

        <li class="<?php if($page=='reports') { echo 'active'; }?>">
          <a href="report.php">
            <i class="fa fa-file-pdf-o"></i> <span>รายงาน</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>