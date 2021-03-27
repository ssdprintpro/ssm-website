<?php 
include $_SERVER['DOCUMENT_ROOT'].'/controllers/main.php'; 

$page = 'about';
$inst = '';
if (isset($_GET['inst'])) {
    $inst = $_GET['inst'];

}
include( $_SERVER['DOCUMENT_ROOT'].'/templates/include-all.php' );

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



<?php 

include($_SERVER['DOCUMENT_ROOT'].'/templates/contents/about.php');

?>


	<!-- Main page code end -->


	<!-- Footer section -->
	<?php include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php'; ?>
	<!-- Footer section end-->
