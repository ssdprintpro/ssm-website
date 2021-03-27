<?php

include $_SERVER['DOCUMENT_ROOT'].'/controllers/main.php';

if( ! isset($_SESSION['user']) || $_SESSION['user'] != 'admin'){ 
    echo alert_redirect('You have to login to access this page','/admin/login.php');
    exit();
};


$con = getCon();
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
                    <li><a href="/admin/admin-pannel.php?target=institute-gallery">Gallery</a></li>
                    <li><a href="/admin/admin-pannel.php?target=event">Events</a></li>
                    <li><a href="/admin/admin-pannel.php?target=event-gallery">Events Gallery</a></li>
                    <li><a href="/admin/responces-view.php" class="active" style="margin-left:20px">Responces</a>
                    </li>

                    <li><a href="/admin/applications-view.php" style="margin-left:20px">Application Requests</a>
                    </li>

                    <li><a href="/controllers/logincontroller.php?target=logout" id="logout"
                            style="margin-left:20px">Logout</a></li>

                </ul>
            </div>
        </nav>

        <!-- navigation end -->
    </div>

    <main>


        <!-- Event section -->
        <section class="contact-page spad pt-0">
            <div class="container">

                <div class="contact-form spad pb-0">
                    <div class="section-title text-center">
                        <h3>Responces</h3>

                        <form method="GET" class="comment-form --contact">
                            <input type="date" calss="form-control" name="date" />
                            <input type="submit" class="btn btn-success" value="Submit" />
                        </form> 
                        <br>

                            <?php 
                                if(isset($_GET['date']) && $_GET['date'] != ''){
                                    $date = $_GET['date'];
                                    $stmt = $con->prepare("SELECT * FROM responces WHERE date =?");
                                    $stmt->bind_param('s',$date);
                                    $stmt->execute();
                                    $res = $stmt->get_result();
                                }else{
                                    $stmt = $con->prepare("SELECT * FROM responces LIMIT 5");
                                    $stmt->execute();
                                    $res = $stmt->get_result();
                                }
                            ?>

                            <table class="table" style="text-align:center;">

                                <thead>
                                    <tr> 
                                        <th> Name </th>
                                        <th> Email </th>
                                        <th> Phno </th>
                                        <th> Message </th>
                                        <th> Date </th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php 
                                    if($res->num_rows == 0) echo "<tr> <th colspan=5> No messages found on this day </th> </tr>";

                                    else    while ($row = $res->fetch_assoc()) {

                                            $name = $row['name'];
                                            $email = $row['email'];
                                            $phno = $row['phno'];
                                            $message = str_replace("\n", "<br>",$row['message']);
                                            $date = $row['date'];

                                            echo "<tr> 
                                                <td> $name </td>
                                                <td> $email </td>
                                                <td> $phno </td>
                                                <td> $message </td>
                                                <td> $date </td>
                                                
                                                </tr>";
                                        }
                                    
                                     ?>

                                </tbody>

                            </table>

                    </div>
                  
                </div>
            </div>
        </section>
        <!-- Event section end-->



    </main>

    <!-- Footer section -->
    <?php include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php'; ?>
    <!-- Footer section end-->