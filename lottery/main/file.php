<?php
session_start();
if (!isset($_SESSION["user"])) {
    header ("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lottery System</title>
    <link rel="stylesheet" href="../assest/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assest/css/style.scss">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
			<nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light" id="ftco-navbar">
		    <div class="container">
		    	<a class="navbar-brand" href="../index.php"><img src="https://www.mescotrust.org/assets/img/logo.png"/></a>
		    	<div class="social-media order-lg-last">
		    		<p class="mb-0 d-flex">
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
		    		</p>
	        </div>
		      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
		        <span class="fa fa-bars"></span> Menu
		      </button>
		      <div class="collapse navbar-collapse" id="ftco-nav">
		        <ul class="navbar-nav ml-auto mr-md-3">
		        	<li class="nav-item active"><a href="#" class="nav-link">Home</a></li>
		        	<li class="nav-item"><a href="#" class="nav-link">About</a></li>
		        	<li class="nav-item"><a href="#" class="nav-link">Work</a></li>
		        	<li class="nav-item"><a href="#" class="nav-link">Blog</a></li>
		          <li class="nav-item"><a href="../logout.php" class="nav-link">Logout</a></li>
		        </ul>
		      </div>
		    </div>
		  </nav>
    <!-- END nav -->

  </div>
<div class="background">
<div class="hero">
    <form action="lottery.php" method="post" enctype="multipart/form-data">
        <label for="file">Upload CSV File:</label>
        <input type="file" name="file" id="file" accept=".csv" required>
        <br>
        <label for="scheme">Select Scheme:</label>
        <select name="scheme" id="scheme" required>
            <option value="">Select any one</option>
            <option value="Education">Education</option>
            <option value="Sewing Machine">Sewing Machine</option>
        </select>
        <br>
        <input type="submit" name="upload" value="Upload">
    </form>
 </div>

 </div>
  
</body>
</html>
