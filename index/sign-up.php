<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>





    <div class="main">
        <section class="signup">
            <div class="container">
                    <!-- PHP -->
    <?php
		require_once("../connection.php");
		if (isset($_POST["signUpBtn"])) {
  			$fullName = $_POST["fullName"];
            $userName = $_POST["userName"];  			
            $password = $_POST["password"];
            $rePassword =$_POST["rePassword"];
			if ($fullName == "" || $userName == "" || $password == "" || $rePassword == "") {
				   echo "Vui lòng nhập đầy đủ thông tin";
            }else if( $password !=  $rePassword ){
                    echo "Vui lòng kiểm tra lại mật khẩu";
            }else{
  					// Kiểm tra tài khoản đã tồn tại chưa
  					$sql="select * from user where username='$userName'";
					$kt=mysqli_query($conn, $sql);

					if(mysqli_num_rows($kt)  > 0){
						echo "Tài khoản đã tồn tại";
					}else{
                        $userPassword = md5($password);
                        $sql = "INSERT INTO `user`(`username`, `password`, `fullName`, `role`) VALUES ('$userName' , '$userPassword','$fullName','user')
                        ";
   						mysqli_query($conn,$sql);
				   		echo "Chúc mừng bạn đã đăng ký thành công";
					}
									    
					
			  }
	}
	?>
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" action="sign-up.php">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="fullName" id="fullName" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="userName"><i class="zmdi zmdi-account-box"></i></label>
                                <input type="text" name="userName" id="userName" placeholder="User Name"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="rePassword" id="rePassword" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signUpBtn" id="signUpBtn" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="../index/sign-in.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>               
            </div>
        </section>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</html>