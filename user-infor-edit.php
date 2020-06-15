
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

    <body class="bg-dark">
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
					<li class="nav-item"><a href="about.html" class="nav-link">Team</a></li>
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
        <section>
            <div class="container px-0" style="background-color: #222831; border-radius: 10px;">
            <div>
                    <img style=" width:100%;" src="<?php  echo  $data["coverImg"]; ?>" alt="">
                    <img style="position: relative; width:20%; height: auto; border-radius: 50%; margin-top: -15%; margin-left:40% ;"
                        src="<?php  echo  $data["avatarImg"]; ?>" alt="">
                </div>
                <h1 class="text-center mt-3 text-light"> <?php  echo  $data["fullName"]; ?> </h1>
                <h5 class="text-center text-light ">" <?php  echo  $data["userDecription"]; ?> "</h5>
                <div style="width: 100%;" class="btn-group btn-group-toggle bg-dark" data-toggle="buttons">
                    <label class="btn btn-secondary" style="background-color: #222831" onclick="window.location='./user.php';">
                        <a>Blog của tôi</a>
                    </label>
                    <label class="btn btn-secondary" style="background-color: #222831  " onclick="window.location='./add-blog.php';">
                        <input type="radio" name="options" id="option2" autocomplete="off"> Thêm blog mới
                    </label>
                    <label class="btn btn-secondary" style="background-color:gray " onclick="window.location='./user-infor.php';">
                        <input type="radio" name="options" id="option2" autocomplete="off">Thông tin cá nhân
                    </label>
                </div>
            </div>
        </section>
        
  <div class="my-5" style="width: 36%;margin-left: 32%;">
    <div >
      <div class="row my-3">
        <a style="font-weight: bold;" class="col-4 text-light">Địa chỉ:</a>
        <input type="text" style="height:40px; border-radius:5px" class=" col-8" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $data["address"]?>"> 
      </div>
      <div class="row my-3">
        <a style="font-weight: bold;" class="col-4 text-light">Số điện thoại:</a>
        <input type="text" style="height:40px; border-radius:5px" class=" col-8" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $data["phoneNumber"]?>"> 

      </div>
      <div class="row my-3">
        <a style="font-weight: bold;" class="col-4 text-light">Email:</a>
        <input type="text" style="height:40px; border-radius:5px" class=" col-8" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $data["email"]?>"> 

      </div>
      <div class="row my-3">
        <a style="font-weight: bold;" class="col-4 text-light">Ngày sinh:</a>
        <input type="text" style="height:40px; border-radius:5px" class=" col-8" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $data["dateOfBirth"]?>"> 

      </div>
      <div class="row my-3">
        <a style="font-weight: bold;" class="col-4 text-light">Giới tính:</a>
        <input type="text" style="height:40px; border-radius:5px" class=" col-8" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $data["gender"]?>"> 

      </div>
      <a class="btn btn-primary" style="width: 30%; margin-left: 35%;" href="#" role="button">Thay đổi thông tin</a>
    </div>
  </div>



        <?php require('./footer.php') ?>