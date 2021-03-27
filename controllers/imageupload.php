<?php

include 'main.php';

if(validate($_POST,['upload_image'])){

    if(isset($_FILES['file1'])){


        $file = new image($_FILES['file1']);


        if(! $file->only_image()) { 
            echo alert_redirect('You have to upload an image of type jpeg/jpg only', '/imagetry.html');
            exit();
        } 


        $file->set_dest_path($_SERVER['DOCUMENT_ROOT'].'/img/new_events/');

        $upload_f_name = $file->upload_image();

        if(! $upload_f_name) {
            echo alert_redirect('Sorry your image could not be uploaded','/imagetry.html');
            exit();
        }

        echo $upload_f_name;
        
    }

}


// $filename = $_FILES['file1']['name'];
// $filetype = $_FILES['file1']['type'];
// $tempname = $_FILES['file1']['tmp_name'];
// $filesize = $_FILES['file1']['size'];
// $error = $_FILES['file1']['error'];

// if (!$tempname){
//     echo 'error select a file';
//     exit();
// }

// function upload_image($source, $destination, $quality){
//     $info = getimagesize($source);
//     if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source);
//     if(imagejpeg($image, $destination, $quality)){
//         echo 'image is uploaded';
//     }else{
//         echo 'image could not be uploaded';
//     }
    
// }

// if ($error > 0){
//     echo $error;
// }

// elseif($filetype == 'image/jpeg'){
//     $dest = '/img/new_events/'.$filename;
//     $destination =  $_SERVER['DOCUMENT_ROOT'].$dest;
//     if($filesize > 1572864){
//         $quality = 40;
//     }else $quality = 60;
//     $filena = upload_image($tempname,$destination,$quality);  
// }else{
//     echo 'upload a valid jpeg image';
// }

// if ($_SERVER['REQUEST_METHOD'] == "POST")
// {
//     $file_name = $_FILES["image_file"]["name"];
//     $file_type = $_FILES["image_file"]["type"];
//     $temp_name = $_FILES["image_file"]["tmp_name"];
//     $file_size = $_FILES["image_file"]["size"];
//     $error = $_FILES["image_file"]["error"];
//     if (!$temp_name)
//     {
//         echo "ERROR: Please browse for file before uploading";
//         exit();
//     }
//     function compress_image($source_url, $destination_url, $quality)
//     {
//         $info = getimagesize($source_url);
//         if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
//         elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
//         elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
//         imagejpeg($image, $destination_url, $quality);
//         echo "Image uploaded successfully.";
//     }
//     if ($error > 0)
//     {
//         echo $error;
//     }
//     else if (($file_type == "image/gif") || ($file_type == "image/jpeg") || ($file_type == "image/png") || ($file_type == "image/pjpeg"))
//     {
//         $filename = compress_image($temp_name, "./" . $file_name, 80);
//     }
//     else
//     {
//         echo "Uploaded image should be jpg or gif or png.";
//     }
// }

// echo 'upload';?>