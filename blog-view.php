<?php require("./header.php");
?>
<?php 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$sql = "SELECT * FROM blog WHERE blogID = ".$id;
$query = mysqli_query($conn,$sql);
$data = mysqli_fetch_array($query); 
$userID = $data['userID'];
$sql2 = "SELECT * FROM `user` WHERE userID='$userID'";
            $query2 = mysqli_query($conn,$sql2);
            $data2 = mysqli_fetch_array($query2); 
?>
<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-12 ftco-animate">
          	<h2 class="subheading">Hello! Welcome to</h2>
          	<h1 class="mb-4 mb-md-0">Readit blog</h1>
          	<div class="row">
          		<div class="col-md-7">
          			<div class="text">
	          			<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
	          			<div class="mouse">
										<a href="#" class="mouse-icon">
											<div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
										</a>
									</div>
								</div>
          	            	</div>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <p class="mt-4 mb-1"><?php echo $data['createDate'] ?></p>
            <h1 class="font-weight-bold" style="font-size:50px" ><?php echo $data['title'] ?></h1>
            <p>Create by: <a href="#"><?php echo $data2['fullName']; ?></a></p>
        </div>

        <div class="container">
        <?php echo $data['content'] ?>
        </div>

        <?php 
            if(isset($_SESSION['userID'])){
            if($data['userID']=$_SESSION['userID']){
        ?>
        <div class="container mb-3">
            <hr>
            <a class="btn btn-primary" href="edit-blog.php?id=<?php echo $data['blogID']; ?>" role="button">Chỉnh sửa</a>
            <a class="btn btn-primary" href="delete-blog.php?id=<?php echo $data['blogID']; ?>" role="button">Xóa</a>
        </div>
            <?php }} ?>
<?php require("./footer.php");
?>