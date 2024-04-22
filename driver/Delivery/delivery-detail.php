<?php


//database conection  file
include('../../dbconnection.php');


?>


<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/icon.png">
    <title>Delivery-Panel-Manager</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../../assets/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/libs/jquery-minicolors/jquery.minicolors.css">
    <link rel="stylesheet" type="text/css" href="../../assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/libs/quill/dist/quill.snow.css">
    <link href="../../dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../../assets/images/icon.png" alt="homepage" class="light-logo" />

                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="../../assets/images/text.png" alt="homepage" class="light-logo" />

                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <!-- <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <!--<ul class="navbar-nav float-right">
                       
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-bell font-24"></i>
                            </a>
                        </li>
                       
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="font-24 mdi mdi-comment-processing"></i>
                            </a>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                                <div class="p-l-30 p-10"><a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded">View Profile</a></div>
                            </div>
                        </li>
                       
                    </ul>-->
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../index.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">หน้าหลัก</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="delivery-report.php" aria-expanded="false"><i class="mdi mdi-truck"></i><span class="hide-menu">การจัดส่ง</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <div class="page-wrapper">
        <?php
                    $vid = $_GET['viewid'];
                    $ret = mysqli_query($con, "select * from delivery where ID =$vid");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($ret)) {
                    ?>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Job No. <span class="badge badge-success"># <?php echo $row['Job']; ?></span></h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">การจัดส่ง</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">รายละเอียดรายการ</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
               <!--<a href="delivery-edit.php?editid=<?php echo htmlentities($row['ID']); ?>" class="edit" data-toggle="tooltip"><button type="button" class="btn btn-warning"><i class="mdi mdi-pencil"></i> แก้ไขรายการ</button></a>-->
                <a href="delivery-update-status.php?updateid=<?php echo htmlentities($row['ID']); ?>" class="edit" data-toggle="tooltip"><button type="button" class="btn btn-primary"><i class="mdi mdi-truck-delivery"></i> อัปเดตสถานะ</button></a>
                    <!--<button type="button" class="btn btn-secondary"><i class="mdi mdi-printer"></i> พิมพ์รายงาน</button>-->
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">

                    
                        <div class="col-md-12">
                            <div class="card">
                                <form class="form-horizontal">
                                    <div class="card-body">
                                        <h4 class="card-title">ข้อมูลรายการ</h4>
                                        <div class="form-group row">
                                            <label for="fname" class="col-sm-2 text-right control-label col-form-label">Job No.</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php echo $row['Job']; ?>" placeholder="Job No." disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-2 text-right control-label col-form-label">วันที่ลงคิว</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" value="<?php echo $row['Queuedate']; ?>" placeholder="" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-2 text-right control-label col-form-label">วันที่นัดส่ง</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" value="<?php echo $row['Deliverydate']; ?>" placeholder="" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email1" class="col-sm-2 text-right control-label col-form-label">ประเภท</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php echo $row['Type']; ?>" placeholder="" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email1" class="col-sm-2 text-right control-label col-form-label">ผู้ลงคิว</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php echo $row['Staff']; ?>" placeholder="" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card">
                                <form class="form-horizontal">
                                    <div class="card-body">
                                        <h4 class="card-title">รายละเอียดรายการ</h4>
                                        <div class="form-group row">
                                            <label for="fname" class="col-sm-2 text-right control-label col-form-label">ชื่อลูกค้า</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php echo $row['Cname']; ?>" placeholder="ชื่อลูกค้า" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-2 text-right control-label col-form-label">เบอร์โทร</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php echo $row['Cphone']; ?>" placeholder="เบอร์โทรติดต่อ" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-2 text-right control-label col-form-label">ช่องทาง</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php echo $row['Cchanel']; ?>" placeholder="" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email1" class="col-sm-2 text-right control-label col-form-label">สถานที่</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php echo $row['Clocation']; ?>" placeholder="สถานที่จัดส่ง" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email1" class="col-sm-2 text-right control-label col-form-label">สถานะ</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php echo $row['Cstatus']; ?>" placeholder="สถานที่จัดส่ง" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card">
                                <form class="form-horizontal">
                                    <div class="card-body">
                                        <h4 class="card-title">รายละเอียดการขนส่ง</h4>
                                        <div class="form-group row">
                                            <label for="fname" class="col-sm-2 text-right control-label col-form-label">เขตพื้นที่</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php echo $row['Area']; ?>" placeholder="เส้นทางเดินรถ" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fname" class="col-sm-2 text-right control-label col-form-label">เส้นทางเดินรถ</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php echo $row['Route']; ?>" placeholder="เส้นทางเดินรถ" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fname" class="col-sm-2 text-right control-label col-form-label">Link Location</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php echo $row['Clink']; ?>" placeholder="Link Location" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fname" class="col-sm-2 text-right control-label col-form-label">รายการสินค้า</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php echo $row['Item']; ?>" placeholder="รายการสินค้า" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-2 text-right control-label col-form-label">จำนวน</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php echo $row['Qty']; ?>" placeholder="จำนวน" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-2 text-right control-label col-form-label">หมายเหตุ</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php echo $row['Other']; ?>" placeholder="" disabled>
                                            </div>
                                        </div>
                                        <h4>รูปภาพการจัดส่ง</h4>
                                        <?php
                                        foreach (json_decode($row["Image"]) as $image) : ?>
                                            <img src="../../uploads/<?php echo $image; ?>" width=200>
                                        <?php endforeach; ?>
                                    </div>
                            </div>
                        </div>
                    
                </div>
            </div>
            <?php
                        $cnt = $cnt + 1;
                    } ?>
        </div>
    </div>


    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../dist/js/custom.min.js"></script>
    <script src="../../assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="../../dist/js/pages/mask/mask.init.js"></script>
    <script src="../../assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="../../assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="../../assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
    <script src="../../assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <script src="../../assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
    <script src="../../assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
    <script src="../../assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="../../assets/libs/quill/dist/quill.min.js"></script>
    <script>
        //***********************************//
        // For select 2
        //***********************************//
        $(".select2").select2();

        /*colorpicker*/
        $('.demo').each(function() {
            //
            // Dear reader, it's actually very easy to initialize MiniColors. For example:
            //
            //  $(selector).minicolors();
            //
            // The way I've done it below is just for the demo, so don't get confused
            // by it. Also, data- attributes aren't supported at this time...they're
            // only used for this demo.
            //
            $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                position: $(this).attr('data-position') || 'bottom left',

                change: function(value, opacity) {
                    if (!value) return;
                    if (opacity) value += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(value);
                    }
                },
                theme: 'bootstrap'
            });

        });
        /*datwpicker*/
        jQuery('.mydatepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
    </script>



</body>

</html>