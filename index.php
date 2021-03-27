<?php 
include $_SERVER['DOCUMENT_ROOT'].'/controllers/main.php'; 

$page = 'index';
$inst = '';
if(isset($_GET['inst'])){
	if(! in_array($_GET['inst'], $inst_arr)){
		echo alert_redirect("Invalid Page", "/");
		exit();
	}
	$inst = $_GET['inst'];
}

$titles = ["SCHOENSTATT ST. MARY'S", "St. Mary's High School", "St. Mary's P U College", "St. Mary's Public School", "St. Mary's Nursery School"];


include( $_SERVER['DOCUMENT_ROOT'].'/templates/include-all.php' );
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo $titles[$id_x] ?></title>

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

include($_SERVER['DOCUMENT_ROOT'].'/templates/contents/index.php');

?>


	<!-- Main page code end -->


	<!-- Footer section -->
	<?php include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php'; ?>
	<!-- Footer section end-->
