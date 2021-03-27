
<?php

define('EVENT_MAIN_IMAGE_FOLDER','/images/events/');
define('EVENT_GALLERY_FOLDER','/images/event-gallery/');

$inst_arr = ['ssmpu', 'ssmphs', 'ssmns', 'ssmps'];

include $_SERVER['DOCUMENT_ROOT'].'/controllers/connection.php';

function validate($post, $required)
{
    foreach ($required as $key) {
        if (!(isset($post[$key]) && $post[$key] != '')) {
            return false;
        }

    }
    return true;
}

function adminlogin($username, $password)
{

    $con = getCon();
    $password = md5($password);
    $stmt = $con->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows == 1) {
        return true;
    } else {
        return false;
    }

}

function alert_redirect($alert, $redirect_url)
{
    return "<script>
                window.alert('$alert');
                window.location = '$redirect_url';
            </script>";
}

function redirect($redirect_url)
{
    return "<script>
                window.location = '$redirect_url';
            </script>";
}

class image
{

    public $file_name, $file_size, $file_tmp_name, $file_error, $file_type;
    private $destination_path;

    public function __construct($file)
    {
        $this->file_name = $file['name'];
        $this->file_size = $file['size'];
        $this->file_tmp_name = $file['tmp_name'];
        $this->file_error = $file['error'];
        $this->file_type = $file['type'];
        $this->destination_path = $_SERVER['DOCUMENT_ROOT'] . '/img/new_events/';
    }

    public function only_image()
    {
        if ($this->file_type == 'image/jpeg') {
            return true;
        } else {
            return false;
        }

    }

    public function set_dest_path($path)
    {
        $this->destination_path = $path;
    }

    public function get_dest_path()
    {
        return $this->destination_path;
    }

    public function compress_upload($source, $destination, $quality)
    {
        $info = getimagesize($source);
        if ($info['mime'] == 'image/jpeg') {
            $image = imagecreatefromjpeg($source);
        }

        if (imagejpeg($image, $destination, $quality)) {
            return true;
        } else {
            return false;
        }

    }

    public function upload_image()
    {
        // if ($this->file_size > 1572864) {
        //     $quality = 30;
        // } else {
        //     $quality = 60;
        // }
        $quality = 50;

        $extension = @end(explode('.', $this->file_name));
        $fname = time() . uniqid(rand()) . '.' . $extension;

        $destination = $this->destination_path . $fname;
        $upload = $this->compress_upload($this->file_tmp_name, $destination, $quality);

        if ($upload) {
            return $fname;
        } else {
            return false;
        }

    }

    public function validate_image($redirect_path)
    {
        if ($this->file_size > 2097152 || $this->file_error == 1) {
            return alert_redirect('You have to upload the image of size less than 2MB Please try again', $redirect_path);
        }

        if (!$this->only_image()) {
            return alert_redirect('You have to upload a jpeg/ jpg image only please try again', $redirect_path);
        }

        return false;
    }

}
