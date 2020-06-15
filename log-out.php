<!DOCTYPE html>
<html lang="en">

<head>
	<title>Readit - Free Bootstrap 4 Template by Colorlib</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

	<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/aos.css">

	<link rel="stylesheet" href="css/ionicons.min.css">

	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    session_start();
    if(isset($_SESSION['username'])){
		session_destroy();
		header('Location: index.php');

    }
    ?>
	<nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.php">C<i>reis</i>.</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
				aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
					<li class="nav-item dropdown">
						<a class=" nav-item dropdown-toggle nav-link" type="button" id="dropdownMenuButton"
							data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							News
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="#">Việt Nam</a>
							<a class="dropdown-item" href="#">Thế Giới</a>
						</div>
					</li>
					<li class="nav-item"><a href="about.html" class="nav-link">Team</a></li>
					<li class="nav-item"><a href="./index/sign-in.php" class="nav-link">Login</a></li>
				</ul>
			</div>
		</div>
	</nav>                         
    <div>   
        <div >
            <img style="width:100%" src="https://i.imgur.com/Bf1isT6.png" alt="Thank For Using Our Service">
        </div>
        <h3 class="mt-4 text-center">Bạn đã đăng xuất thành công.</h3>
        <h5 class="mt-1 mb-4 text-center"><a href="index.php" style="color:blue">Nhấn vào đây để trở về trang chủ</a></h5>
    </div>
<?php require("./footer.php");
?>