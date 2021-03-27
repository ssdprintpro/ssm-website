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

    <div class="fixed-top">

        <header class="header-section" id="header" style="padding:5px 0px;background-color:white">
            <div class="container">

                <a href="index.php" class="site-logo" style="padding:0"><img src="/assets/logo/SSM.png" width="200px"
                        alt="" srcset=""></a>
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
                    <li class="active"><a href="/">Home</a></li>
                </ul>
            </div>
        </nav>

        <!-- navigation end -->
    </div>



    <main>
        <section class="content">
            <div class="container text-center">
                <div class="row mt-10">
                    <div class="col-lg-3 col-md-4 col-sm-12"></div>
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <div class="card card-primary" style="margin-top:20%">
                            <div class="card-header">
                                <h2 class="card-title">Login</h2>
                            </div>
                            <div class="card-body">

                                <form action="/controllers/loginController.php" method="post">
                                    <div class="form-group text-left">
                                        <label for="exampleInputEmail1">User Name</label>
                                        <input type="text" class="form-control" name="user-name" placeholder="User Name">
                                    </div>
                                    <div class="form-group text-left">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" name="password"
                                            id="exampleInputPassword1" placeholder="Password">
                                    </div>

                                    <button type="submit" name="admin-login"
                                        class="btn btn-primary btn-lg btn-block" value="login">Submit</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

	<!-- Footer section -->
	<?php include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php'; ?>
	<!-- Footer section end-->
