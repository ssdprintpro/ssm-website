<?php

include $_SERVER['DOCUMENT_ROOT'].'/controllers/main.php';

if( ! isset($_SESSION['user']) || $_SESSION['user'] != 'admin'){ 
    echo alert_redirect('You have to login to access this page','/admin/login.php');
    exit();
};


$arr = ['institute-gallery', 'event', 'event-gallery'];

if(! isset($_GET['target']) || ! in_array($_GET['target'], $arr)) {
    echo redirect('/admin/admin-pannel.php?target=institute-gallery');
    exit();
}

$instituteGallery = "institute-gallery";
$eventUpload = "event";
$eventGallery = "event-gallery";



$con = getCon();

$institutes = $con->query("SELECT * FROM `institutes`");
$eventscon = $con->query('SELECT id, title FROM `events`');
$event_details = $con->query("SELECT events.id as id, title, institutes.name as name FROM events,institutes WHERE events.institute_id = institutes.id");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>SCHOENSTATT ST. MARY'S</title>

    <meta name="description" content="Unica University Template">
    <meta name="keywords" content="event, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include $_SERVER['DOCUMENT_ROOT'].'/templates/link-files.html'; ?>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <div class="fixed-top">

        <header class="header-section" id="header" style="padding:5px 0px;background-color:white">
            <div class="container">

                <a href="#" class="site-logo" style="padding:0"><img src="/assets/logo/SSM.png" width="200px" alt=""
                        srcset=""></a>
                <div class="nav-switch">
                    <i class="fa fa-bars"></i>
                </div>
                <div class="header-info" id='cn'>
                    <div class="hf-item" id="cnt">
                        <p><span>Email:</span>info@schoenstatt.co.in</p>
                    </div>
                    <div class=" hf-item" id="cnt">
                        <p><span>Contact:</span>+91 97427 84706</p>
                    </div>
                </div>
            </div>
        </header>
        <!-- header section end-->


        <!-- navigation start  -->

        <nav class="nav-section">
            <div class="container">

                <ul class="main-menu text-right ">
                    <li <?php if($instituteGallery == $_GET['target']) echo "class='active'"; ?>><a
                            href="/admin/admin-pannel.php?target=institute-gallery">Gallery</a></li>
                    <li <?php if($eventUpload == $_GET['target']) echo "class='active'"; ?>><a
                            href="/admin/admin-pannel.php?target=event">Events</a></li>
                    <li <?php if($eventGallery == $_GET['target']) echo "class='active'"; ?>><a
                            href="/admin/admin-pannel.php?target=event-gallery">Events Gallery</a></li>
                    <li><a href="/admin/responces-view.php" style="margin-left:20px">Responces</a>
                    </li>

                    <li><a href="/admin/applications-view.php" class="active" style="margin-left:20px">Application Requests</a>
                    </li>


                    <li><a href="/controllers/logincontroller.php?target=logout" id="logout"
                            style="margin-left:20px">Logout</a></li>
                </ul>
            </div>
        </nav>

        <!-- navigation end -->
    </div>

    <main>


        <?php if ($_GET['target'] == $eventUpload) {?>

        <!-- Event section -->
        <section class="contact-page spad pt-0">
            <div class="container">

                <div class="contact-form spad pb-0">
                    <div class="section-title text-center">
                        <h3>Upload Event </h3>
                    </div>
                    <form class="comment-form --contact" method="POST" action="/controllers/eventcontroller.php"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                <select name="institute" id="" class="form-control" required>
                                    <option value="" disabled selected hidden>Please Choose Institute</option>
                                    <?php
										while ($row=$institutes->fetch_assoc()) {
											$id = $row['id']; $title = $row['name'];
											echo "<option value=$id > $title </option>";
										}
   									?>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Event Title" name="title" required>
                            </div>

                            <div class="col-lg-4">
                                <input type="date" class="datetimebox form-control" data-date-format="dd mm yyyy"
                                    required placeholder="Event Date" name="date">
                            </div>
                            <div class="col-lg-4">
                                <input type="time" class="datetimebox form-control" placeholder="Event Time" required
                                    name="time">
                            </div>
                            <div class="col-lg-4">
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" id="customFile" name="main_image"
                                        required>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <textarea placeholder="Event Discription" name="description" required></textarea>
                                <div>
                                    <input type="submit" class="site-btn" value="Upload" name="upload_event"
                                        style="margin:0 auto;display:block;">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- Event section end-->


        <!-- Event section -->
        <section class="contact-page spad pt-0" id="deleteEvent">
            <div class="container">

                <div class="contact-form spad pb-0">
                    <div class="section-title text-center">
                        <h3> Event Action </h3>
                    </div>

                    <form class="comment-form --contact" method="POST" action="/controllers/eventcontroller.php">
                        <div class="row">
                            <div class="col-12">
                                <table class="table" style="text-align:center;">
                                    <tr>
                                        <th>Institute</th>
                                        <th>Event Name</th>
                                        <th>Action</th>
                                    </tr>

                                    <?php 
                                    // print_r($event_details->fetch_assoc());

                                        while ($row = $event_details->fetch_assoc()) {
                                            echo "
                                                <tr>
                                                    <td> ".$row['name']." </td>
                                                    <td> ".$row['title']." </td>
                                                    <td> <button type='submit' name='delete_evnt' value='".$row['id']."' > DELETE </button> </td>
                                                </tr>
                                            ";
                                        }
                                        
                                    ?>

                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- Event section end-->


        <?php } elseif ($_GET['target'] == $instituteGallery) {?>

        <!-- Gallery section -->
        <section id="gallery" class="contact-page spad pt-0">
            <div class="container">

                <div class="contact-form spad pb-0">
                    <div class="section-title text-center">
                        <h3>Upload Gallery </h3>
                    </div>
                    <form class="comment-form --contact" action="/controllers/gallerycontroller.php" method="POST"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                <select name="institute_id" id="" class="form-control" required>
                                    <?php
										while ($row=$institutes->fetch_assoc()) {
											$id = $row['id']; $title = $row['name'];
											echo "<option value=$id > $title </option>";
										}
   									?>
                                </select>

                                <br>

                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" id="customFile" name="gallery_image[]"
                                        required multiple="multiple">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>

                            </div>

                            <div class="col-lg-12">
                                <div>
                                    <input type="submit" class="site-btn" value="Upload" required
                                        name="upload_institute_gallery_images" style="margin:0 auto;display:block;">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- Gallery section end-->



        <?php } elseif ($_GET['target'] == $eventGallery) {?>

        <!-- Event Gallery section -->
        <section id="eventGallery" class="contact-page spad pt-0">
            <div class="container">

                <div class="contact-form spad pb-0">
                    <div class="section-title text-center">
                        <h3>Upload Event Gallery </h3>
                    </div>
                    <form class="comment-form --contact" method="POST" action="/controllers/eventcontroller.php"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                <select name="event_id" id="" class="form-control" required>
                                    <option value="" disabled selected hidden>Please Choose Event</option>
                                    <?php
										while ($row=$eventscon->fetch_assoc()) {
											$id = $row['id']; $title = $row['title'];
											echo "<option value=$id > $title </option>";
										}
   									?>
                                </select>

                                <br>

                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" id="customFile" name="gallery_image[]"
                                        multiple="multiple" required>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div>
                                    <input type="submit" class="site-btn" value="Upload" required
                                        name="upload_event_gallery" style="margin:0 auto;display:block;">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- Event Gallery  section end-->

        <?php }?>

        <!-- Event section -->

    </main>

    <!-- Footer section -->
    <?php include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php'; ?>
    <!-- Footer section end-->