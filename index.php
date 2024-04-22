<?php

session_start();

if (isset($_SESSION['manager_login'])) {
    header("location: manager.php");
}

if (isset($_SESSION['account_login'])) {
    header("location: account.php");
}

if (isset($_SESSION['marketing_login'])) {
    header("location: sale/marketing/index.php");
}

if (isset($_SESSION['acrepair_login'])) {
    header("location: reaccount/index.php");
}

if (isset($_SESSION['repair_login'])) {
    header("location: repair/index.php");
}

if (isset($_SESSION['engineer_login'])) {
    header("location: repair/engineer/index.php");
}

if (isset($_SESSION['smile_login'])) {
    header("location: sale/smile/index.php");
}

if (isset($_SESSION['gif_login'])) {
    header("location: sale/gif/index.php");
}

if (isset($_SESSION['purchase_login'])) {
    header("location: sale/purchase/index.php");
}

?>


<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>เข้าสู่ระบบ</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="h-100">

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->





    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="index.html">
                                    <h4>เข้าสู่ระบบ</h4>
                                </a>
                                <form action="login_db.php" method="post" class="form-horizontal my-5">
                                    <?php if (isset($_SESSION['error'])) : ?>
                                        <div class="alert alert-danger">
                                            <h3>
                                                <?php
                                                echo $_SESSION['error'];
                                                unset($_SESSION['error']);
                                                ?>
                                            </h3>
                                        </div>
                                    <?php endif ?>
                                    <div class="form-group">
                                        <input type="text" name="txt_email" class="form-control" required placeholder="อีเมล">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="txt_password" class="form-control" id="myInput" required placeholder="รหัสผ่าน"><br>
                                        <input type="checkbox" onclick="myFunction()">  แสดงรหัสผ่าน
                                    </div>
                                    <div class="form-group">
                                        <select name="txt_role" class="form-control">
                                            <option value="" selected="selected">เลือกตำแหน่ง</option>
                                            <option value="manager">Manager</option>
                                            <option value="account">Account</option>
                                            <option value="smile.sale">Smile.sale</option>
                                            <option value="gif.sale">Gif.sale</option>
                                            <option value="marketing">Marketing</option>
                                            <option value="repair">Repair</option>
                                            <option value="acrepair">Repair account</option>
                                            <option value="engineer">Engineer</option>
                                            <option value="purchase">Purchase</option>
                                        </select>
                                    </div>
                                    <button class="btn btn-info" style="width: 100%;" value="Login" type="submit" name="btn_login">เข้าสู่ระบบ</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>

    <script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

</body>

</html>