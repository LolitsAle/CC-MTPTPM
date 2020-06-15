<!DOCTYPE html>
<html lang="en">

<head>
	<title>Creis.</title>
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
		require_once("connection.php");
        session_start();
        if(isset($_SESSION['username'])){
			$username= $_SESSION['username'];
            $sql = "SELECT * FROM `user` WHERE username ='$username'";
            $query = mysqli_query($conn,$sql);
            $data = mysqli_fetch_array($query);
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
					<?php if(isset($_SESSION["username"])){?>
						<li class="nav-item"><a href="user.php" class="nav-link"><img style="width: 30px; height: 30px; border-radius: 50%; margin-right:10px ;" src="<?php echo $data["avatarImg"];?>"/><span><?php echo $data["fullName"]; ?></span></a></li>
					<?php } else{
						$homeLink = '<li class="nav-item"><a href="index.php	" class="nav-link">Home</a></li>';
						echo "$homeLink";
					} ?>
					
					
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
					<?php
						if(isset($_SESSION['username'])){
							$my_var3='<li class="nav-item"><a href="log-out.php" class="nav-link">Logout</a></li>';
							echo "$my_var3";
						}else{
							$my_var4='<li class="nav-item"><a href="./index/sign-in.php" class="nav-link">Login</a></li>';
							echo "$my_var4";
						}
					?>
				</ul>
			</div>
		</div>
	</nav>                        