
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
                    <label class="btn btn-secondary" style="background-color: gray" onclick="window.location='./user.php';">
                        <a>Blog của tôi</a>
                    </label>
                    <label class="btn btn-secondary" style="background-color: #222831" onclick="window.location='./add-blog.php';">
                        <input type="radio" name="options" id="option2" autocomplete="off"> Thêm blog mới
                    </label>
                    <label class="btn btn-secondary" style="background-color: #222831" onclick="window.location='./user-infor.php';">
                        <input type="radio" name="options" id="option2" autocomplete="off"> Thông tin cá nhân
                    </label>
                </div>
            </div>
        </section>
            <?php
                $userID  = $_SESSION['userID'];
                $sqlBlogData = "SELECT * FROM `blog` WHERE userID ='$userID'";
                $queryBlogData = mysqli_query($conn,$sqlBlogData);
                while($blogData = mysqli_fetch_array($queryBlogData)){
            ?>
            <div class="container px-0">
                <div class="card my-2" style="height: 100%;">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            <img style="max-height: 250px;min-height: 250px;" src="<?php echo $blogData['banner']?>"
                                class="card-img" alt="...">
                        </div>
                        <div class="col-md-7" style=>
                            <div class="card-body">
                                <h5 class="card-title"><a href="blog-view.php?id=<?php echo $blogData['blogID'] ?>" class="text-dark"><?php echo $blogData['title'] ?></a></h5>
                                <p class="card-text"><?php echo $blogData['description'] ?></p>
                                <p class="card-text"><small class="text-muted">Ngày tạo: <?php echo $blogData['createDate'] ?></small></??>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    <?php } ?>

           
        <footer class="ftco-footer ftco-bg-dark ftco-section">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md">
                        <div class="ftco-footer-widget mb-4">
                            <h2 class="logo"><a href="#">Read<span>it</span>.</a></h2>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the
                                blind texts.</p>
                            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="ftco-footer-widget mb-4">
                            <h2 class="ftco-heading-2">latest News</h2>
                            <div class="block-21 mb-4 d-flex">
                                <a class="img mr-4 rounded" style="background-image: url(images/image_1.jpg);"></a>
                                <div class="text">
                                    <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control
                                            about</a></h3>
                                    <div class="meta">
                                        <div><a href="#"></span> Oct. 16, 2019</a></div>
                                        <div><a href="#"></span> Admin</a></div>
                                        <div><a href="#"></span> 19</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-21 mb-4 d-flex">
                                <a class="img mr-4 rounded" style="background-image: url(images/image_2.jpg);"></a>
                                <div class="text">
                                    <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control
                                            about</a></h3>
                                    <div class="meta">
                                        <div><a href="#"></span> Oct. 16, 2019</a></div>
                                        <div><a href="#"></span> Admin</a></div>
                                        <div><a href="#"></span> 19</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="ftco-footer-widget mb-4 ml-md-5">
                            <h2 class="ftco-heading-2">Information</h2>
                            <ul class="list-unstyled">
                                <li><a href="#" class="py-1 d-block"><span
                                            class="ion-ios-arrow-forward mr-3"></span>Home</a></li>
                                <li><a href="#" class="py-1 d-block"><span
                                            class="ion-ios-arrow-forward mr-3"></span>About</a></li>
                                <li><a href="#" class="py-1 d-block"><span
                                            class="ion-ios-arrow-forward mr-3"></span>Articles</a></li>
                                <li><a href="#" class="py-1 d-block"><span
                                            class="ion-ios-arrow-forward mr-3"></span>Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="ftco-footer-widget mb-4">
                            <h2 class="ftco-heading-2">Have a Questions?</h2>
                            <div class="block-23 mb-3">
                                <ul>
                                    <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St.
                                            Mountain View, San
                                            Francisco, California, USA</span></li>
                                    <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929
                                                210</span></a></li>
                                    <li><a href="#"><span class="icon icon-envelope"></span><span
                                                class="text">info@yourdomain.com</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">

                        <p>
                            Copyright &copy;
                            <script>document.write(new Date().getFullYear());</script> All rights reserved | This
                            template is made with
                            <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                target="_blank">Colorlib</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>



        <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
                <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
                <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                    stroke="#F96D00" /></svg></div>


        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-migrate-3.0.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.easing.1.3.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.stellar.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/aos.js"></script>
        <script src="js/jquery.animateNumber.min.js"></script>
        <script src="js/scrollax.min.js"></script>
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
        <script src="js/google-map.js"></script>
        <script src="js/main.js"></script>

    </body>

    </html>
</body>

</html>