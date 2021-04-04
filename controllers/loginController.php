<?php

include './main.php';

if(validate($_POST, ['user-name', 'password', 'admin-login'])){
    $username = $_POST['user-name'];
    $passs = $_POST['password'];
    print_r($_POST);
    $passs = md5($passs);

    $con = getCon();
    $stmt = $con->prepare("SELECT * FROM `users` WHERE username = ? AND password = ?");
    $stmt->bind_param('ss',$username, $passs);
    $stmt->execute();
    $res =$stmt->get_result();

    if($res->num_rows == 1){

        $_SESSION['user'] = 'admin';
        echo '<script> window.location = "/admin/admin-pannel.php"; </script>';

    }else{  
        echo '<script> window.alert(" Username or password in wrong "); </script>';
        echo '<script> window.location = "/admin/login.php"; </script>';

    }

    exit();
}

elseif(validate($_GET,['target'])){
    if($_GET['target'] == 'logout'){
        unset($_SESSION['user']);
        session_destroy();
        echo alert_redirect('You have Logged Out','/admin/login.php');
    }

    exit();
}





else{echo '<h1 style="text-align:center;margin-top:100px"> 404 Page Not Found Error </h1>';}
