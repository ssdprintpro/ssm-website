<?php
include $_SERVER['DOCUMENT_ROOT'].'/controllers/main.php';
$back_uri = $_SERVER['HTTP_REFERER'];

if(validate($_POST,['add-responce','name','email','phno','message'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phno = $_POST['phno'];
    $msg = $_POST['message'];
    $date = Date("Y-m-d");

    $con = getCon();

    $stmt = $con->prepare("INSERT INTO `responces`(`name`, `email`, `phno`, `message`, `date`) VALUES (?,?,?,?,?)");
    $stmt->bind_param('ssiss',$name,$email,$phno,$msg,$date);

    if($stmt->execute()){
        if($stmt->affected_rows>0){
            echo alert_redirect("Your responce is recorded",$back_uri);
        }else{
            echo alert_redirect("Your responce could not recorded, Try again",$back_uri);
        }
    }
    exit();
}

if(validate($_POST,['applyNow','name','phno','email','inst','message'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phno = $_POST['phno'];
    $msg = $_POST['message'];
    $institute = $_POST['inst'];
    $date = Date("Y-m-d");

    $con = getCon();

    $stmt = $con->prepare("INSERT INTO `apply_now`(`name`, `phno`, `email`, `institute_id`, `message`, `date`) VALUES (?,?,?,?,?,?)");

    $stmt->bind_param('sisiss',$name,$phno,$email,$institute,$msg,$date);

    if($stmt->execute()){
        if($stmt->affected_rows>0){
            echo true;
        }else{
            echo false;
        }
    }
    // exit();
}

// print_r($_POST);

// echo alert_redirect('All fields are mandatory', $back_uri);
