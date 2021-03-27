

<main>

<!-- Hero section -->
<section class="hero-section mesm">
		<div class="hero-slider owl-carousel" >
			<div class="hs-item set-bg" style="padding:20px 0px" data-setbg="/assets/slider-img/<?php echo $slide_images[0] ?>">
				<div class="hs-text">
					<div class="container">
						<div class="row">
							<div class="col-lg-8">
								<h2 class="hs-title">WELCOME TO <br>  SCHOENSTATT ST. MARY'S</h2>
								<p class="hs-des">Educators are people who love and never relinquish their love.<br> My educational work is a daughter of love.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="hs-item set-bg" style="padding:20px 0px" data-setbg="/assets/slider-img/<?php echo $slide_images[1] ?>">
				<div class="hs-text">
					<div class="container">
						<div class="row">
							<div class="col-lg-8">
								<h2 class="hs-title">WELCOME TO <br> SCHOENSTATT ST. MARY'S</h2>
								<p class="hs-des">Educators are people who love and never relinquish their love.<br> My educational work is a daughter of love.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="hs-item set-bg" style="padding:20px 0px" data-setbg="/assets/slider-img/<?php echo $slide_images[2] ?>">
				<div class="hs-text">
					<div class="container">
						<div class="row">
							<div class="col-lg-8">
								<h2 class="hs-title">WELCOME TO <br> SCHOENSTATT ST. MARY'S</h2>
								<p class="hs-des">Educators are people who love and never relinquish their love.<br> My educational work is a daughter of love.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end -->


<!-- Counter section  -->

<!-- Services section -->
<section class="service-section spad">
    <div class="container services">
        <div class="section-title text-center">
            <h3>OUR FACILITY</h3>
            <p>We provides the opportunity to prepare for life</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-6 service-item">
                <div class="service-icon">
                    <!-- <img src="/assets/icons/SVG/1.svg" alt="1"> -->
                    <span class="icon icon-book"></span>
                </div>
                <div class="service-content">
                    <h4>Library</h4>
                    <p>We own a spacious library with audio visual facilities, large collection of books and CDs
                        for wide range of subjects and has a full – fledged reference section.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 service-item">
                <div class="service-icon">
                    <!-- <img src="img/services-icons/2.png" alt="1"> -->
                    <span class="icon icon-lab"></span>
                </div>
                <div class="service-content">
                    <h4>Labs</h4>
                    <p>The laboratories are furnished with equipments and instruments, which equip the students
                        for their syllabus in practicals.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 service-item">
                <div class="service-icon">
                    <!-- <img src="img/services-icons/3.png" alt="1"> -->
                    <span class="icon icon-hub"></span>
                </div>
                <div class="service-content">
                    <h4>Activity Hub</h4>
                    <p>It enables the students to acquire mastery over their inherent potentials and enable them
                        to face the challenges of life with ease and confidence.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 service-item">
                <div class="service-icon">
                    <!-- <img src="img/services-icons/4.png" alt="1"> -->
                    <span class="icon icon-smart-class"></span>
                </div>
                <div class="service-content">
                    <h4>Smart Class</h4>
                    <p>New software, hardware and infrastructures that enhance the spirit of innovative thinking
                        and application of their knowledge in their day to day life.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 service-item">
                <div class="service-icon">
                    <!-- <img src="img/services-icons/5.png" alt="1"> -->
                    <span class="icon icon-education"></span>
                </div>
                <div class="service-content">
                    <h4>Fully Qualified</h4>
                    <p>The backbone of our educational institution is its faculty with infinite caliber,
                        inexhaustible enthusiasm and honest commitment in their carrier.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 service-item">
                <div class="service-icon">
                    <!-- <img src="img/services-icons/6.png" alt="1"> -->
                    <span class="icon icon-skill"></span>
                </div>
                <div class="service-content">
                    <h4>Life Skills & Value Education</h4>
                    <p>Value based and morally and emotionally balanced individuals are todays modern day
                        society’s need. In order to prepare them for a better tomorrow the institution gives
                        emphasis on life skill and values based, holistic education.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services section end -->


<!-- Counter section end -->




<!-- Enroll section -->
<section class="enroll-section spad set-bg" style="margin-top:50px" data-setbg="/assets/images/enroll-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-title text-white">
                    <h3>ENROLLMENT</h3>
                    <p>Get started with us to explore the exciting</p>
                </div>
                <div class="enroll-list text-white">
                    <div class="enroll-list-item">
                        <span>1</span>
                        <h5>Contact</h5>
                        <p>Contact is first step of your Global life</p>
                    </div>
                    <div class="enroll-list-item">
                        <span>2</span>
                        <h5>Consulting</h5>
                        <p>Take guide from Expert</p>
                    </div>
                    <div class="enroll-list-item">
                        <span>3</span>
                        <h5>Register</h5>
                        <p>Start your life journey</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1 p-lg-0 p-4">
                <img src="/assets/images/enroll-img.jpg" alt="">
            </div>
        </div>
    </div>
</section>

<!-- Enroll section end -->


<?php

if ($inst != '') {
    include $_SERVER['DOCUMENT_ROOT'].$course;
}

?>

    <?php
    $con = getCon();
    
    if($inst != '') {
        $event = $con->query("SELECT id, description, image_url, title, date, time FROM events WHERE institute_id = $id_x ORDER BY date DESC LIMIT 5");
    }else {
        $event = $con->query("SELECT id, description, image_url, title, date, time FROM events ORDER BY date DESC LIMIT 5");

    }

    if($event->num_rows > 0) {
        $one_event = $event->fetch_assoc();

    $da = date('d-m-Y', strtotime($one_event['date']));

    ?>
<!-- Event section  -->
<section id="event">
    <div>


        <br>
        <div class="container">
            <div class="section-title text-center">
                <h3>OUR EVENTS</h3>
                <p>Our department initiated a series of events</p>
            </div>

            <div class="row">
                <div class="col-md-8 scrollmenu">



                    <div class="col-md-12 event-item" style="display: inline-block;">
                        <div class="event-thumb"  >
                            <a href="singleEvent.php?id=<?php echo $one_event['id']; ?>" style="margin: 0 auto;display:block;width:fit-content"><img
                                    src="<?php echo EVENT_MAIN_IMAGE_FOLDER . $one_event['image_url']; ?>" width="360px" height="250px" alt=""></a>
                            <div class="event-date">
                                <span>
                                    <?php echo $da; ?>
                                </span>
                            </div>
                        </div>
                        <div class="event-info">
                            <h4 style="white-space: nowrap;width: 100%;overflow: hidden; text-overflow: ellipsis;text-align:center">
                                <?php echo $one_event['title']; ?><br>
                            </h4>
                            <!--<p style="white-space: nowrap;width: 100%;overflow: hidden; text-overflow: ellipsis;" > <?php //echo  $row['discription']; ?></p> -->
                            <p><i class="fa fa-clock-o"></i>
                                <span class="mr-2"> <?php echo date('h:m A', strtotime($one_event['time'])) ?> </span>
                                <a href="singleEvent.php?id=<?php echo $one_event['id']; ?>" class="know-more" style="color: white;"> Know More</a>
                            </p>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 event-item scrolling-events" style="max-height:390px;overflow:auto">
                    <div class="widget">
                        <h5 class="widget-title"> &nbsp;&nbsp;&nbsp; Recent Events</h5>
                        <div class="recent-post-widget">
                            <!-- recent post -->
                            <?php
while ($row = $event->fetch_assoc()) {
    $da = date('d-m-Y ', strtotime($row['date']));
    ?>
                            <div class="rp-item" style="margin-left:10px">
                                <div class="rp-content pl-0">
                                    <a href="singleEvent.php?id=<?php echo $row['id']; ?>">
                                        <div class="rp-thumb set-bg" data-setbg="<?php echo EVENT_MAIN_IMAGE_FOLDER . $row['image_url']; ?>">
                                        </div>
                                    </a>
                                    <h6>
                                        <?php echo $row['title']; ?>
                                    </h6>
                                    <h6><i class="fa fa-calendar-o"></i>
                                        <?php echo $da; ?>
                                    </h6>
                                </div>
                            </div>
                            <hr>
                            <?php }?>
                            <!-- recent post -->

                        </div>
                    </div>
                </div>


            </div>

        </div>


    </div>
    </div>

    </div>
</section>
<!-- Event section end -->

    <?php } ?>

<!-- Courses section -->

<!-- Fact section -->
<section class="fact-section spad set-bg" data-setbg="/assets/images/fact-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3 fact">
                <div class="fact-icon">
                    <i class="ti-crown"></i>
                </div>
                <div class="fact-text">
                    <h2>50</h2>
                    <p>YEARS</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 fact">
                <div class="fact-icon">
                    <i class="ti-briefcase"></i>
                </div>
                <div class="fact-text">
                    <h2>80</h2>
                    <p>TEACHERS</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 fact">
                <div class="fact-icon">
                    <i class="ti-user"></i>
                </div>
                <div class="fact-text">
                    <h2>500</h2>
                    <p>STUDENTS</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 fact">
                <div class="fact-icon">
                    <i class="ti-pencil-alt"></i>
                </div>
                <div class="fact-text">
                    <h2>800+</h2>
                    <p>LESSONS</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Fact section end-->


<!-- Gallery section -->
<section class="event-section spad" style="padding-top:0px;margin-top:50px" id="gallery">
    <div class="section-title text-center">
        <h3>OUR Gallery</h3>
    </div>
    <?php
    include $_SERVER['DOCUMENT_ROOT'].'/templates/contents/gallery.php';

    ?>
</section>
<!-- Gallery section -->


<br>
</main>