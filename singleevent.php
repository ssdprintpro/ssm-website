<?php 
include $_SERVER['DOCUMENT_ROOT'].'/controllers/main.php'; 


$con = getCon();
$page = 'events';
$inst = '';
include( $_SERVER['DOCUMENT_ROOT'].'/templates/include-all.php' );
if(isset($_GET['id']) && isset($_GET['inst'])){

    $id = $_GET['id'];
    $inst = $_GET['inst'];
    if(is_int($id)){
        echo alert_redirect('select a valid event',$_SERVER['HTTP_REFERER']);
        exit();
    }

    $event_queried = $con->query("SELECT * FROM events WHERE id = $id AND institute_id = $inst");
    $event_detains = $event_queried->fetch_assoc();
    $events = $con->query("SELECT id, description, image_url, title, date FROM events WHERE id != $id AND institute_id = $inst ORDER BY date DESC LIMIT 5 ");
    $images = $con->query("SELECT * FROM event_gallery WHERE event_id = $id");

}
elseif(isset($_GET['id'])){

    $id = $_GET['id'];
    if(is_int($id)){
        echo alert_redirect('select a valid event',$_SERVER['HTTP_REFERER']);
        exit();
    }
    
    $event_queried = $con->query("SELECT * FROM events WHERE id = $id");
    $event_detains = $event_queried->fetch_assoc();
    $events = $con->query("SELECT id, description, image_url, title, date FROM events WHERE id != $id ORDER BY date DESC LIMIT 5 ");
    $images = $con->query("SELECT * FROM event_gallery WHERE event_id = $id");

    
}
elseif(isset($_GET['inst'])){

    $inst = $_GET['inst'];
    
    $event_queried = $con->query("SELECT * FROM events WHERE institute_id=$inst ORDER BY date DESC LIMIT 1");
    if($event_queried->num_rows == 0){
        echo alert_redirect('Event Not found',$_SERVER['HTTP_REFERER']);
        exit();
    }

    $event_detains = $event_queried->fetch_assoc();
    $id = $event_detains['id'];
    $events = $con->query("SELECT id, description, image_url, title, date FROM events WHERE id != $id AND institute_id = $inst ORDER BY date DESC LIMIT 5 ");
    $images = $con->query("SELECT * FROM event_gallery WHERE event_id = $id");

    
}else{
    
    $event_queried = $con->query("SELECT * FROM events ORDER BY date DESC LIMIT 1");
    if($event_queried->num_rows == 0){
        echo alert_redirect('Event Not found','/index.php');
        exit();
    }

    $event_detains = $event_queried->fetch_assoc();
    $id = $event_detains['id'];
    $events = $con->query("SELECT id, description, image_url, title, date FROM events WHERE id != $id ORDER BY date DESC LIMIT 5 ");
    $images = $con->query("SELECT * FROM event_gallery WHERE event_id = $id");

}

if($event_queried->num_rows == 0){
    echo alert_redirect('Event Not found',$_SERVER['HTTP_REFERER']);
    exit();
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>SCHOENSTATT ST. MARY'S</title>

    <meta name="description" content="">
    <meta name="keywords" content="Schoenstatt, Best school in Bengalore, School Bengalore, top school in Bengalore">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include $_SERVER['DOCUMENT_ROOT'].'/templates/link-files.html'; ?>

</head>

<body>

    <!-- header section start -->
    <?php include $_SERVER['DOCUMENT_ROOT'].'/templates/header.php'; ?>

    <!-- end of header section -->



    <main>

        <!-- Breadcrumb section -->
        <div class="site-breadcrumb">
            <div class="container">
                <a href="#"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
                <span>Event Details</span>
            </div>
        </div>
        <!-- Breadcrumb section end -->

        <!-- Blog page section  -->
        <section class="blog-page-section spad pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="post-item post-details">
                            <img src="<?php echo EVENT_MAIN_IMAGE_FOLDER.$event_detains['image_url'] ?>"
                                class="post-thumb-full" alt="" style="margin:20px auto;display:block;margin-top:0;width:100%;">
                            <div class="post-content">
                                <h3 style="text-align:center"><a><?php echo $event_detains['title'] ?></a></h3>
                                <div class="post-meta">
                                    <span><i class="fa fa-calendar-o"></i> <?php $dat = new DateTime($event_detains['date']); echo $dat->format('d-m-Y'); ?></span>
                                    
                                </div>
                                <p class="text-justify">
                                    <?php echo str_replace("\n","<br>",$event_detains['description']) ?></p>
                                <!--<div class="tag"><i class="fa fa-tag"></i> EDUCATION, MARKETING</div>-->
                            </div>

                        </div>
                    </div>
                    <!-- sidebar -->
                    <div class="col-sm-8 col-md-5 col-lg-4 col-xl-3 offset-xl-1 offset-0 pl-xl-0 sidebar">

                        <!-- widget -->
                        <div class="widget" style="max-height: 600px;overflow: auto">
                            <h5 class="widget-title">Recent News</h5>
                            <div class="recent-post-widget">
                                <?php
									
									
									while($row = mysqli_fetch_assoc($events)){ ?>

                                <!-- recent post -->
                                <div class="rp-item">
                                    <a href="singleEvent.php?id=<?php echo $row['id']; ?>">
                                        <div class="rp-thumb set-bg"
                                            data-setbg="<?php echo EVENT_MAIN_IMAGE_FOLDER.$row['image_url'] ?>"></div>
                                    </a>
                                    <div class="rp-content">
                                        <h6><?php echo $row['title'] ?></h6>
                                        <p><i class="fa fa-calendar-o"></i> <?php $dat = new DateTime($row['date']); echo $dat->format('d-m-Y');?></p>
                                    </div>
                                </div>
                                <?php  } ?>
                                <!-- recent post -->


                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>
        <!-- Blog page section end -->

        <?php 
		
			
			if($images->num_rows > 0){

		?>
        <!-- Gallery section -->
        <section class="event-section spad" style="padding-top:0px" id="event">
            <div class="section-title text-center">
                <h3>OUR Event </h3>
                <p>Colours of Dreams</p>
            </div>
            <div class="gallery-section" id="gallery">
                <div class="gallery">
                    <div class="grid-sizer"></div>
                    <?php 
						while($row = $images->fetch_assoc()){
					?>
                    <div class="gallery-item gi-long set-bg" style="height:200px"
                        data-setbg="<?php echo EVENT_GALLERY_FOLDER.$row['image_url']; ?>">
                        <a class="img-popup" href="<?php echo EVENT_GALLERY_FOLDER.$row['image_url']; ?>"><i class="ti-plus"></i></a>
                    </div>
                    <?php 
						} 
					?>

                </div>
            </div>
        </section>
        <!-- Gallery section -->

        <?php } ?>

    </main>


    <!-- Footer section -->
    <?php include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php'; ?>
    <!-- Footer section end-->