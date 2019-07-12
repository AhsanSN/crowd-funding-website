<?
$filenameLink = basename($_SERVER['PHP_SELF']);
?>
<link rel="stylesheet" href="https://use.typekit.net/feh8sou.css">
<!--style="background-color:#438c00"-->
<header class="header_area" style="background-color:#008c7d">
		<div class="main_menu" style="background-color:#008c7d">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container">
					    <style>
					    @font-face {
                           font-family: "myFirstFont";
                           src: url(BebasNeue-Regular.ttf));
                        }
                        
					        .titleHeading{
					            float:right;
					            margin-top:4px;
					            margin-left:7px;
					            font-size: 35px;
					            font-family: bebas-neue, sans-serif; 
					            letter-spacing: 1px;
					            color: white;
					        }
					    </style>
						<!-- Brand and toggle get grouped for better mobile display -->
						<a class="navbar-brand logo_h" href="./"><img height="50" width="50" src="img/icon.png" alt="Fikir Bahcivani"><h2 class="titleHeading">F&#304;K&#304;R BAH&#199;IVANI</h2></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- 
                    	Developed by Anomoz Softwares. (Anomoz.com).
                    	Please dont remove any watermarks from the website, because this is what helps me get bread on my table.
                    	-->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent" style="background-color:#008c7d;max-height: 350px;">
							<ul class="nav navbar-nav menu_nav ml-auto">
								<li class="nav-item <?if($filenameLink=='index.php'){echo'active';}?>"><a class="nav-link" href="./"><?translate("Home","Ana sayfa")?></a></li> 
								<li class="nav-item <?if($filenameLink=='allPosts.php'){echo'active';}?>"><a class="nav-link" href="allPosts.php"><?translate("Projects","Projeler")?></a></li> 
								<li class="nav-item <?if($filenameLink=='shop.php'){echo'active';}?>"><a class="nav-link" href="shop.php"><?translate("Shop","Manav")?></a></li> 
								<li class="nav-item  <?if($filenameLink=='allBlogs.php'){echo'active';}?>"><a class="nav-link" href="allBlogs.php"><?translate("Garden","Bah&#231;e")?></a></li> 
								<li class="nav-item  <?if($filenameLink=='about.php'){echo'active';}?>"><a class="nav-link" href="about.php"><?translate("About","Hakk&#305;m&#305;zda")?></a></li> 
								<?
								if($logged==1){
								    if($filenameLink=='newProject.php' ||($filenameLink=='newBlog.php')){
								       echo '<li class="nav-item active" style="padding-right:10px;padding-left:10px;"><a class="nav-link" href="home.php"><?translate("Dashboard","Prof&#304;l")?></a>';
								    }
								    else{
								       echo '<li class="nav-item" style="background-color: #60bc0f; padding-right:10px;padding-left:10px;"><a class="nav-link" href="home.php">'.translateRet("Dashboard","Prof&#304;l").'</a>';
								    }
								}
								else{
								    echo '<li class="nav-item" style="background-color: #60bc0f; padding-right:10px;padding-left:10px;"><a class="nav-link" href="signup.php">'.translateRet("Join","G&#304;R&#304;&#350; YAP").'</a>';
								}
								?>
								<?
								if($filenameLink=='newProject.php' ||($filenameLink=='newBlog.php')){}else{
								?>
								<li class="nav-item submenu dropdown">
                                    <a href="<?if($session_language=='EN'){echo "?lang=TK";}else{echo "?lang=EN";}?>" class="nav-link">
                                        <img height="15" width="25" src="./img/<?if($session_language=='TK'){echo 'world1.png';}else{echo 'turkishFlag.png';}?>" style="margin-right:5px;">
                                        <?
                                        if($session_language=="TK"){
                                            echo 'EN';
                                        }
                                        else{
                                            echo 'TR';
                                        }
                                        ?>
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