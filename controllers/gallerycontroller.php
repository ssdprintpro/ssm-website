<?php
include $_SERVER['DOCUMENT_ROOT'].'/controllers/main.php';

$con = getCon();

if (validate($_POST, ['upload_institute_gallery_images', 'institute_id'])) {

    $institute_id = $_POST['institute_id'];

    $admin_institute_gallery_path = '/admin/admin-pannel.php?target=institute-gallery';

    if (!validate($_FILES, ['gallery_image'])) {
        echo alert_redirect('Please upload the images', $admin_institute_gallery_path);
        exit();
    }

    $error_count = 0;
    $success_count = 0;

    foreach ($_FILES['gallery_image']['tmp_name'] as $key => $file) {

        $arr['name'] = $_FILES['gallery_image']['name'][$key];
        $arr['tmp_name'] = $_FILES['gallery_image']['tmp_name'][$key];
        $arr['size'] = $_FILES['gallery_image']['size'][$key];
        $arr['error'] = $_FILES['gallery_image']['error'][$key];
        $arr['type'] = $_FILES['gallery_image']['type'][$key];

        $image = new image($arr);

        $error = $image->validate_image($admin_institute_gallery_path);
        if ($error) {
            $error_count++;
            continue;
        }

        $gallery_images_url = INSTITUTE_GALLERY_PATH.$institute_id."/";

        if(! file_exists($gallery_images_url)) {
            mkdir($gallery_images_url, 0777, true);
        }

        $image->set_dest_path($gallery_images_url);

        $upload_fname = $image->upload_image();
        if (!$upload_fname) {
            $error_count++;
            continue;
        }

        $stmt = $con->prepare("INSERT INTO gallery(`institute_id`, `image_url`) VALUES(?,?)");
        $stmt->bind_param('is', $institute_id, $upload_fname);
        if ($stmt->execute()) {
            $success_count++;
        } else {
            $uploded_image_path = $image->get_dest_path() . $upload_fname;
            unlink($uploded_image_path);
            $error_count++;
            continue;
        }
    }

    if ($error_count > 0 && $error_count > 0) {
        echo alert_redirect('Some images have been uploaded, Some are not uploded "Please Check Them And Upload Them" ', $admin_institute_gallery_path);
    } else {
        echo alert_redirect('Your images for the Gallery has been updated', $admin_institute_gallery_path);
    }

}
