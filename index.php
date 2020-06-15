<?php require("./header.php");
?>
<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');"
		data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
				data-scrollax-parent="true">
				<div class="col-md-12 ftco-animate">
					<h2 class="subheading">Hello! Welcome to</h2>
					<h1 class="mb-4 mb-md-0">Creis. blog</h1>
					<div class="row">
						<div class="col-md-7">
							<div class="text">
								<p>Far far away, behind the word mountains, far from the countries Vokalia and
									Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right
									at the coast of the Semantics, a large language ocean.</p>
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
    <section class="ftco-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
				<?php
                $sqlBlogData = "SELECT * FROM `blog`";
                $queryBlogData = mysqli_query($conn,$sqlBlogData);
                while($blogData = mysqli_fetch_array($queryBlogData)){
            ?>
					<div class="case">
						<div class="row">
							<div class="col-md-6 col-lg-6 col-xl-8 d-flex">
								<a href="blog-view.php?id=<?php echo $blogData['blogID']; ?>" class="img w-100 mb-3 mb-md-0"
									style="background-image: url(<?php echo $blogData['banner']; ?>);"></a>
							</div>
							<div class="col-md-6 col-lg-6 col-xl-4 d-flex">
								<div class="text w-100 pl-md-3">
									<h2><a href="blog-view.php?id=<?php echo $blogData['blogID']; ?>"><?php echo $blogData['title']; ?></a>
									</h2>
									<ul class="media-social list-unstyled">
										<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
										<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a>
										</li>
										<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a>
										</li>
									</ul>
									<div class="meta">
										<p class="mb-0"><a><?php echo $blogData['createDate']; ?></a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
	</section>

<?php require("./footer.php");
?>