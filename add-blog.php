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
        <script src="ckeditor/ckeditor.js"></script>
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
            $userID= $_SESSION['userID'];
            
            if (isset($_POST["addBlog"])) {
                $blogTitle = $_POST["blogTitle"];
                $blogDescription = $_POST["blogDescription"];  			
                $blogBanner = $_POST["blogBanner"];
                $blogContent =$_POST["blogContent"];
                if ($blogTitle == "" || $blogDescription == "" || $blogBanner == "" || $blogContent == "") {
                    echo "Vui lòng nhập đầy đủ thông tin";
                }else{
                        $sql = "INSERT INTO `blog`(`userID`, `title`, `description`, `banner`, `content`,`createDate`) VALUES (' $userID','$blogTitle','$blogDescription','$blogBanner',' $blogContent',CURRENT_TIMESTAMP())";
                        mysqli_query($conn,$sql);
                        header('Location: ./user.php');
             }
            }
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
                    <label class="btn btn-secondary" style="background-color:#222831 " onclick="window.location='./user.php';">
                        <a>Blog của tôi</a>
                    </label>
                    <label class="btn btn-secondary" style="background-color:gray " onclick="window.location='./add-blog.php';">
                        <input type="radio" name="options" id="option2" autocomplete="off"> Thêm blog mới
                    </label>
                    <label class="btn btn-secondary" style="background-color: #222831" onclick="window.location='./user-infor.php';">
                        <input type="radio" name="options" id="option2" autocomplete="off"> Thông tin cá nhân
                </div>
            </div>
        </section>
        <form action="#" method="POST" class="mt-3 mb-4">
            <h1 class="text-center text-light" style="font-weight:bold; ">Blog</h1>
            <div class="container"> 
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"> <i class="oi oi-pencil"></i> </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Title" id="blogTitle" name="blogTitle"
                        aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"> <i class="oi oi-book"></i> </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Description" id="blogDescription" name="blogDescription"
                        aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"> <i class="oi oi-image"></i> </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Blog Banner"  id="blogBanner" name="blogBanner"
                        aria-describedby="basic-addon1">
                </div>
                <textarea id="myeditor" name="blogContent" id="blogContent"></textarea> </textarea>
                <button class="btn btn-primary mt-4" type="submit" id="addBlog" name="addBlog" style="width:20%;margin-left:80%;">Tạo Blog</button>
            </div>
        </form>
        <?php 
            require('footer.php');
        ?>
