<?
$filenameLink = basename($_SERVER['PHP_SELF']);
?>
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
								<li class="nav-item <?if($filenameLink=='index.php'){echo'active';}?>"><a class="nav-link" href="./"><?translate("Home","Ana sayfa")?></a></li> 
								<li class="nav-item <?if($filenameLink=='allPosts.php'){echo'active';}?>"><a class="nav-link" href="allPosts.php"><?translate("Projects","Projeler")?></a></li> 
								<li class="nav-item <?if($filenameLink=='shop.php'){echo'active';}?>"><a class="nav-link" href="shop.php"><?translate("Shop","Market")?></a></li> 
								<li class="nav-item  <?if($filenameLink=='allBlogs.php'){echo'active';}?>"><a class="nav-link" href="allBlogs.php"><?translate("Blogs","Bloglar")?></a></li> 
								<li class="nav-item  <?if($filenameLink=='about.php'){echo'active';}?>"><a class="nav-link" href="about.php"><?translate("About","Hakkımızda")?></a></li> 
								<?
								if($logged==1){
								    if($filenameLink=='newProject.php' ||($filenameLink=='newBlog.php')){
								       echo '<li class="nav-item active" style="padding-right:10px;padding-left:10px;"><a class="nav-link" href="home.php"><?translate("Dashboard","Gösterge paneli")?></a>';
								    }
								    else{
								       echo '<li class="nav-item" style="background-color: #60bc0f; padding-right:10px;padding-left:10px;"><a class="nav-link" href="home.php">'.translateRet("Dashboard","Gösterge paneli").'</a>';
								    }
								}
								else{
								    echo '<li class="nav-item" style="background-color: #60bc0f; padding-right:10px;padding-left:10px;"><a class="nav-link" href="signup.php">'.translateRet("Join","katılmak").'</a>';
								}
								?>
								<?
								if($filenameLink=='newProject.php' ||($filenameLink=='newBlog.php')){}else{
								?>
								<li class="nav-item submenu dropdown">
                                    <a href="<?if($session_language=='EN'){echo "?lang=TK";}else{echo "?lang=EN";}?>" class="nav-link">
                                        <img height="15" width="25" src="./img/<?if($session_language=='TK'){echo 'turkishFlag.png';}else{echo 'englishFlag.jpg';}?>" style="margin-right:5px;">
                                        <?echo $session_language?>
                                    </a>
                                </li>
                                <?}?>
							</ul>
						</div> 
					</div>
				</nav>
			</div>
		</div>
	</header>