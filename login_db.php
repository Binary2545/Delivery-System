<?php 

    require_once 'dbconnection.php';

    session_start();

    if (isset($_POST['btn_login'])) {
        $email = $_POST['txt_email']; // textbox name 
        $password = $_POST['txt_password']; // password
        $role = $_POST['txt_role']; // select option role
  
        if (empty($email)) {
            $errorMsg[] = "Please enter email";
        } else if (empty($password)) {
            $errorMsg[] = "Please enter password";
        } else if (empty($role)) {
            $errorMsg[] = "Please select role";
        } else if ($email AND $password AND $role) {
            try {
                $select_stmt = $db->prepare("SELECT email, password, role FROM masterlogin WHERE email = :uemail AND password = :upassword AND role = :urole");
                $select_stmt->bindParam(":uemail", $email);
                $select_stmt->bindParam(":upassword", $password);
                $select_stmt->bindParam(":urole", $role);
                $select_stmt->execute(); 

                while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                    $dbemail = $row['email'];
                    $dbpassword = $row['password'];
                    $dbrole = $row['role'];
                }
                if ($email != null AND $password != null AND $role != null) {
                    if ($select_stmt->rowCount() > 0) {
                        if ($email == $dbemail AND $password == $dbpassword AND $role == $dbrole) {
                            switch($dbrole) {
                                case 'manager':
                                    $_SESSION['manager_login'] = $email;
                                    header("location: manager.php");
                                break;
                                case 'account':
                                    $_SESSION['account_login'] = $email;
                                    header("location: account.php");
                                break;
                                case 'marketing':
                                    $_SESSION['marketing_login'] = $email;
                                    header("location: sale/marketing/index.php");
                                break;
                                case 'acrepair':
                                    $_SESSION['acrepair_login'] = $email;
                                    header("location: reaccount/index.php");
                                break;
                                case 'repair':
                                    $_SESSION['repair_login'] = $email;
                                    header("location: repair/index.php");
                                break;
                                case 'engineer':
                                    $_SESSION['engineer_login'] = $email;
                                    header("location: repair/engineer/index.php");
                                break;
                                case 'smile.sale':
                                    $_SESSION['smile_login'] = $email;
                                    header("location: sale/smile/index.php");
                                break;
                                case 'gif.sale':
                                    $_SESSION['gif_login'] = $email;
                                    header("location: sale/gif/index.php");
                                break;
                                case 'purchase':
                                    $_SESSION['purchase_login'] = $email;
                                    header("location: sale/purchase/index.php");
                                break;
                                default:
                                    $_SESSION['error'] = "ข้อมูลหรือตำแหน่งไม่ถูกต้อง!!";
                                    header("location: index.php");
                            }
                        }
                    } else {
                        $_SESSION['error'] = "ข้อมูลหรือตำแหน่งไม่ถูกต้อง!!";
                        header("location: index.php");
                    }
                }
            } catch(PDOException $e) {
                $e->getMessage();
            }
        }
    }

?>