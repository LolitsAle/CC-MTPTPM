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

<?php
session_start();
?>




    <div class="main">
    <section class="sign-in">
            <div class="container">
            <?php
                //Gọi file connection.php ở bài trước
                require_once("../connection.php");
                // Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
                if (isset($_POST["btnSignIn"])) {
                    // lấy thông tin người dùng
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
                    //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
                    $username = strip_tags($username);
                    $username = addslashes($username);
                    $password = strip_tags($password);
                    $password = addslashes($password);
                    if ($username == "" || $password =="") {
                        echo "Bạn không được để trống User Name hoặc PassWord";
                    }else{
                        $sql = "SELECT * FROM `user` WHERE username ='$username' AND password='$password'";
                        $query = mysqli_query($conn,$sql);
                        $num_rows = mysqli_num_rows($query);
                        if ($num_rows==0) {
                            echo "tên đăng nhập hoặc mật khẩu không đúng !";
                        }else{
                            //tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
                            echo " đăng nhập thành công";
                            while ( $data = mysqli_fetch_array($query) ) {
                                $_SESSION["userID"] = $data["userID"];
                                $_SESSION['username'] = $data["username"];
                                $_SESSION["email"] = $data["email"];
                                $_SESSION["	fullName"] = $data["fullName"];
                            }
                            header('Location: ../user.php');
                        }
                    }
                }
            ?>
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="../index/sign-up.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <form method="POST" class="register-form" id="login-form" action="sign-in.php">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="User Name"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="btnSignIn" id="btnSignIn" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</html>