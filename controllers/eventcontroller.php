<?php

// print_r($_FILES);
// exit();

include $_SERVER['DOCUMENT_ROOT'].'/controllers/main.php';

$admin_pannel_path = '/admin/admin-pannel.php';
$back_uri = $_SERVER['HTTP_REFERER'];

if (validate($_POST, ['institute', 'title', 'description', 'date', 'time', 'upload_event'])) {
    $admin_event_path = '/admin/admin-pannel.php?target=event';
    $institute = $_POST['institute'];
    $title = $_POST['title'];
    $description = $_REQUEST['description'];
    $date = $_POST['date'];
    $time = $_POST['time'];


    if (!isset($_FILES['main_image'])) {
        echo alert_redirect('You hae to select and upload a jpeg/jpg Image', $admin_event_path);
        exit();
    }

    $image = new image($_FILES['main_image']);

    $error = $image->validate_image($admin_event_path);
    if ($error) {
        echo $error;
        exit();
    }


$event_upload_img_src = $_SERVER['DOCUMENT_ROOT'] . EVENT_MAIN_IMAGE_FOLDER;

    if(! file_exists($event_upload_img_src)) {
        mkdir($event_upload_img_src, 0777, true);
    }

    $image->set_dest_path($event_upload_img_src);

    $upload_fname = $image->upload_image();

    if (!$upload_fname) {
        // echo alert_redirect('Your image could not be uploaded please try again after some time', $admin_event_path);
        exit();
    }
    $con = getCon();
    $stmt = $con->prepare("INSERT INTO events(`institute_id`, `title`, `description`, `date`, `time`, `image_url`) VALUES(?,?,?,?,?,?)");
    $stmt->bind_param('isssss', $institute, $title, $description, $date, $time, $upload_fname);
    if ($stmt->execute()) {
        echo alert_redirect('The event has been uploaded successfully', $admin_event_path);
        exit();
    } else {
        $uploded_image_path = $image->get_dest_path() . '$upload_fname';
        unlink($uploded_image_path);
        // echo alert_redirect('Your event could not be uploaded please try again', $admin_event_path);
        exit();
    }

}




if (validate($_POST, ['upload_event_gallery','event_id'])) {

    $event_id = $_POST['event_id'];

    $admin_event_gallery_path = '/admin/admin-pannel.php?target=event-gallery';

    if (! validate($_FILES, ['gallery_image'])) {
        echo alert_redirect('Please upload the images', $admin_event_gallery_path);
        exit();
    }

    $error_count = 0;
    $success_count = 0;

    foreach ($_FILES['gallery_image']['tmp_name'] as $key => $file) {

        $con = getCon();

        $arr['name'] = $_FILES['gallery_image']['name'][$key];
        $arr['tmp_name'] = $_FILES['gallery_image']['tmp_name'][$key];
        $arr['size'] = $_FILES['gallery_image']['size'][$key];
        $arr['error'] = $_FILES['gallery_image']['error'][$key];
        $arr['type'] = $_FILES['gallery_image']['type'][$key];

        $image = new image($arr);

        $error = $image->validate_image($admin_event_gallery_path);
        
        if ($error) {
            $error_count++;
            continue;
        }


        
$event_gallery_upload_img_src = $_SERVER['DOCUMENT_ROOT'] . EVENT_GALLERY_FOLDER;

if(! file_exists($event_gallery_upload_img_src)) {
    mkdir($event_gallery_upload_img_src, 0777, true);
}


        $image->set_dest_path($event_gallery_upload_img_src);

        
        $upload_fname = $image->upload_image();
        if (!$upload_fname) {
            $error_count++;
            continue;
        }

        
        $stmt = $con->prepare("INSERT INTO event_gallery(`event_id`, `image_url`) VALUES(?,?)");
        $stmt->bind_param('is', $event_id, $upload_fname);
        if ($stmt->execute()) {
            $success_count++;
        } else {
            $uploded_image_path = $image->get_dest_path() . '$upload_fname';
            unlink($uploded_image_path);
            $error_count++;
            continue;
        }

    
    }


    if($error_count > 0 && $success_count>0) echo alert_redirect('Some images have been uploaded, Some are not uploded "Please Check Them And Upload Them" ', $admin_event_gallery_path);
    else echo alert_redirect('Your images for the event has been updated', $admin_event_gallery_path);
    
    exit();
}


if(validate($_POST,['delete_evnt'])){

    $con = getCon();

    $back_uri = $_SERVER['HTTP_REFERER'];

    $event_id = $_POST['delete_evnt'];
    $path = $_SERVER['DOCUMENT_ROOT'] . '/images/events/';
    $event_gallery_path = $_SERVER['DOCUMENT_ROOT'] . EVENT_GALLERY_FOLDER;

    $stmt = $con->prepare("SELECT * FROM events WHERE id = ?");
    $stmt->bind_param('i',$event_id);
    $stmt->execute();
    $res = $stmt->get_result();
   
    $event_details = $res->fetch_assoc();

    if($res->num_rows == 0){
        echo alert_redirect('You have to select an existing event', $back_uri);
        exit();
    }
    
    
    $image_name = $event_details['image_url'];
    $image_path = $path.$image_name;
    if(file_exists($image_path)){unlink($image_path);}

    $res = $con->query("SELECT * FROM event_gallery WHERE event_id = $event_id");
    while ($row=$res->fetch_assoc()) {
        $pth = $event_gallery_path.$row['image_url'];
        if(file_exists($pth)){unlink($pth);}
    }

    $res = $con->query("DELETE FROM events WHERE id = $event_id");
    if($res) echo alert_redirect('event deleted completed', $back_uri); 
    else echo alert_redirect('event could not be deleted completed', $back_uri);

    exit();
}

echo alert_redirect('Not authorised to access this page', $back_uri);

