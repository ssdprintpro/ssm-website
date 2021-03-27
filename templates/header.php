<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>


<div class="colab d-flex d-md-none fixed-bottom">
    <button class="btn btn-warning text-white applynow">Apply now</button>
    <button onclick="window.location.href = 'paymentsselection.php';" class="btn btn-primary text-white ">Online
        Payment</button>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/applyNow.php'; ?>

<section class="sidebutton">
    <div class="buttons">
        <a href="/notes">Notes</a>
        <a href="/notes/punotes"> PU Notes</a>
        <a href="http://ssmpslive.schoenstatt.co.in/"> SSMPS LIVE</a>
    </div>
</section>

<div class="fixed-top">

    <header class="header-section" id="header" style="padding:5px 0px;background-color:white">
        <div class="container">

            <a href="index.php" class="site-logo" style="padding:0"><img src="<?php echo $logo; ?>" width="200px" alt=""
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

                <div class="hf-item butut" id="but">
                    <button class="btn btn-warning text-white applynow">Apply now</button>
                    <a href="paymentsselection.php"><button class="btn btn-primary text-white">Online
                            Payment</button></a>
                </div>
            </div>
        </div>
    </header>
    <!-- header section end-->


    <!-- navigation start  -->

    <nav class="nav-section">
        <div class="container">

            <ul class="main-menu text-right ">
                <li class="<?php if($page == 'index') echo 'active'; ?>"><a href="/index.php<?php echo $link_name; ?>">Home</a></li>
                <li class="dropdown">
                    <a href="#" onclick="event.preventDefault()" class="dropdown-toggle" data-toggle="dropdown">Institute</a>
                    <div class="dropdown-menu" id="institutemenu">
                        <a class="dropdown-item" href="/index.php?inst=ssmphs">Schoenstatt St. Mary's High School</a>
                        <a class="dropdown-item" href="/index.php?inst=ssmpu">Schoenstatt St. Mary's P U College</a>
                        <a class="dropdown-item" href="/index.php?inst=ssmps">Schoenstatt St. Mary's Public School</a>
                        <a class="dropdown-item" href="/index.php?inst=ssmns">Schoenstatt St. Mary's Nursery School</a>
                    </div>
                </li>

                <li class="<?php if($page == 'about') echo 'active'; ?>"><a href="/about.php<?php echo $link_name; ?>">About Us</a></li>
                <li class="<?php if($page == 'events') echo 'active'; ?>"><a href="/events.php<?php echo $link_id; ?>">Event</a></li>
                <?php  

                if($inst != ''){ ?>
                    <li class="<?php if($page == 'academics') echo 'active'; ?>"><a href="/index.php<?php echo $link_name; ?>" onclick = "scrollToBlock()" data-scrollto="course">Academics</a></li>
                    <li class="<?php if($page == 'faculty') echo 'active'; ?>"><a href="/faculty.php<?php echo $link_name; ?>">Faculty</a></li>
                <?php }

                ?>
                <li class="<?php if($page == 'contact') echo 'active'; ?>"><a href="/contact.php<?php echo $link_name; ?>">Contact</a></li>
                <!--<li><a href="index.php" class="btn btn-primary text-white btn-sm" id='op'> Online Payment</a></li>-->
            </ul>
        </div>
    </nav>

    <!-- navigation end -->
</div>