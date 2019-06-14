<header class="header_area">
		<div class="main_menu">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<a class="navbar-brand logo_h" href="./"><img src="img/logo.png" alt=""></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
								<li class="nav-item active"><a class="nav-link" href="./">Home</a></li> 
								<li class="nav-item"><a class="nav-link" href="allPosts.php">Projects</a>
								<li class="nav-item"><a class="nav-link" href="shop.php">Shop</a>
								<li class="nav-item"><a class="nav-link" href="allBlogs.php">Blogs</a>
								<li class="nav-item"><a class="nav-link" href="about.php">About</a>
								<?
								if($logged==1){
								    echo '<li class="nav-item" style="background-color: green; padding-right:10px;padding-left:10px;"><a class="nav-link" href="home.php">Dashboard</a>';
								}
								else{
								    echo '<li class="nav-item" style="background-color: green; padding-right:10px;padding-left:10px;"><a class="nav-link" href="signup.php">Join</a>';
								}
								?>
								
							</ul>
						</div> 
					</div>
				</nav>
			</div>
		</div>
	</header>