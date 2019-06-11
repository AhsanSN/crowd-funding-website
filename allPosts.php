<?include_once("global.php");?>
    <?

//recent posts
$query_allPosts= "select * from fik_posts order by id desc"; 
$result_allPosts = $con->query($query_allPosts); 

?>
        <!DOCTYPE html>
        <html class="yes-js js_active js vc_desktop vc_transform gr__charity_demo1_wpdance_com" lang="en-US">
        <!--<![endif]-->
        <?php include_once("./phpComponents/header.php")?>

            <body class="archive post-type-archive post-type-archive-cause custom-background wpb-js-composer js-comp-ver-4.11.1 vc_responsive">

                <div class="body-wrapper">
                    <div class="page-gray-box"></div>

                    <div class="phone-header visible-xs">

                        <div class="toggle-menu-wrapper visible-xs" style="background: #3d3b48;">
                            <!--div class="toggle-menu-control-close"><span></span></div-->
                            <ul class="my-account">
                                <li>
                                    <a href="http://charity.demo1.wpdance.com/turquoise/my-account/?action=login">
                                        <i class="fa fa-sign-in"></i>
                                        <br />
                                        <span>Sign in</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="http://charity.demo1.wpdance.com/turquoise/my-account/?action=register">
                                        <i class="fa fa-hand-o-up"></i>
                                        <br />
                                        <span>Join for free</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="mobile-main-menu toggle-menu">
                                <ul id="menu-mobile_menu" class="menu">
                                    <li id="menu-item-4651" class="fa fa-home menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-4651"><a href="http://charity.demo1.wpdance.com/turquoise/">Home page</a>
                                        <ul class="sub-menu">
                                            <li id="menu-item-5869" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5869"><a href="http://demo2.wpdance.com/charity/">Home Default</a></li>
                                            <li id="menu-item-5870" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5870"><a href="http://demo2.wpdance.com/charity_blue/">Home Blue</a></li>
                                            <li id="menu-item-5871" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5871"><a href="http://demo2.wpdance.com/charity_turquoise/">Home Turquoise</a></li>
                                        </ul>
                                    </li>
                                    <li id="menu-item-4653" class="fa fa-star menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-4653"><a href="http://charity.demo1.wpdance.com/turquoise/shop/">Shop</a>
                                        <ul class="sub-menu">
                                            <li id="menu-item-4658" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4658"><a href="http://charity.demo1.wpdance.com/turquoise/cart/">Cart</a></li>
                                            <li id="menu-item-4659" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4659"><a href="http://charity.demo1.wpdance.com/turquoise/checkout/">Checkout</a></li>
                                            <li id="menu-item-4660" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4660"><a href="http://charity.demo1.wpdance.com/turquoise/my-account/">My Account</a></li>
                                        </ul>
                                    </li>
                                    <li id="menu-item-6027" class="fa fa-location-arrow menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-6027"><a href="#">Pages</a>
                                        <ul class="sub-menu">
                                            <li id="menu-item-6036" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6036"><a href="http://charity.demo1.wpdance.com/turquoise/about-us/">Our Story</a></li>
                                            <li id="menu-item-7064" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7064"><a href="http://charity.demo1.wpdance.com/turquoise/what-we-do/">What we do</a></li>
                                            <li id="menu-item-7065" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7065"><a href="http://charity.demo1.wpdance.com/turquoise/be-a-volunteer/">Be a Volunteer</a></li>
                                        </ul>
                                    </li>
                                    <li id="menu-item-4952" class="fa fa-pencil menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-4952"><a href="http://charity.demo1.wpdance.com/turquoise/blog/">Blog</a>
                                        <ul class="sub-menu">
                                            <li id="menu-item-6032" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-6032"><a href="http://charity.demo1.wpdance.com/turquoise/braid-slipper-dress-dungaree-silhouette-2/">Blog detail &#8211; Default</a></li>
                                            <li id="menu-item-6031" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-6031"><a href="http://charity.demo1.wpdance.com/turquoise/crop-strong-eyebrows-la-mariniere-hermes-4/">Blog detail &#8211; Gallery</a></li>
                                            <li id="menu-item-6033" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-6033"><a href="http://charity.demo1.wpdance.com/turquoise/indigo-skirt-skirt-braid-vintage-2/">Blog detail &#8211; Slider</a></li>
                                            <li id="menu-item-6034" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-6034"><a href="http://charity.demo1.wpdance.com/turquoise/plaited-leather-flats-chunky-2/">Blog detail &#8211; Fullwidth</a></li>
                                        </ul>
                                    </li>
                                    <li id="menu-item-5875" class="fa fa-cog menu-item menu-item-type-post_type menu-item-object-page menu-item-5875"><a href="http://charity.demo1.wpdance.com/turquoise/wpdance-shortcode/">Shortcode</a></li>
                                    <li id="menu-item-6039" class="fa fa-comments menu-item menu-item-type-post_type menu-item-object-page menu-item-6039"><a href="http://charity.demo1.wpdance.com/turquoise/forum/">Forum</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="phone-header-bar-wrapper visible-xs">
                            <div class="toggle-menu-control-open"><i class="fa fa-bars"></i></div>
                            <div class="logo heading-title">
                                <a href="http://charity.demo1.wpdance.com/turquoise/"><img src="http://charity.demo1.wpdance.com/turquoise/wp-content/themes/wp_charity/images/logo.png" alt="Default" title="Default" /></a>

                            </div>
                            <div class="wd_mobile_header_act_box">
                                <div class="wd_mobile_account">

                                    <a class="sign-in-form-control" href="http://charity.demo1.wpdance.com/turquoise/my-account/" title="Log in/Sign up">
                                        <i class="fa fa-user"></i>
                                    </a>
                                    <span class="visible-xs login-drop-icon"></span>
                                </div>
                            </div>
                            <div class="wd_woo_search_box">
                                <form role="search" method="get" action="http://charity.demo1.wpdance.com/turquoise/">
                                    <input type="text" placeholder="Search here..." name="s" id="wd_s" />
                                    <div class="button_search">
                                        <button type="submit" title="Search"><i class="fa fa-search"></i></button>
                                    </div>
                                    <input type="hidden" name="post_type" value="product" />
                                </form>
                            </div>

                            <div style="clear:both"></div>
                        </div>

                        <div style="clear:both"></div>
                    </div>

                    <div id="template-wrapper" class="hfeed site" style="">
                        <div class="wd-control-panel-gray"></div>

                        <div id="sticket-scroll-header-point"></div>
                        <?php include_once("./phpComponents/navbar.php")?>

                        <div id="main-module-container" class="site-main ">
                            
                            <br><br>
                            <div id="wd-container" class="content-wrapper cause-template container">

                                <div id="content-inner" class="row">

                                    <div id="main-content" class="col-sm-24">
                                        <div class="main-content">
                                            <h1 class="heading-title">All Posts</h1>

                                            <ul class="list-posts list-causes ">
                                                
                                                <?
                                                $i=0;
                                                if ($result_allPosts->num_rows > 0)
                                                { 
                                                    while($row = $result_allPosts->fetch_assoc()) 
                                                    {
                                                        ?>
                                                            <li class="home-features-item col-sm-8 first post-6628 cause type-cause status-publish has-post-thumbnail hentry cause_category-africa cause_category-cause-slider cause_category-food cause_category-middle-east cause_category-urgent-cause" style="margin-bottom:30px;">
                                                                <div class="item-content">
                                                                    <div class="post-info-thumbnail">
            
                                                                        <div class="thumbnail-content">
                                                                            <div class="post-icon-box">
            
                                                                            </div>
            
                                                                            <a class="thumbnail effect_color"  href="./postPage.php?id=<?echo $row['id']?>">
                                                                                    <img src="./uploads/postImages/<?echo $row['image']?>" class="thumbnail-effect-1 wp-post-image" alt="<?echo $row['title']?>" width="370" height="300">
                                                                                    <!--div class="effect_hover_image"></div-->
                                                                                </a>
            
                                                                        </div>
            
                                                                    </div>
                                                                    <?php
                                                                        $percentCollected = (10000/($row['goal']))*100;
                                                                    ?>
                                                                    <div class="donate-detail">
                                                                        <div class="vc_progress_bar wpb_content_element wd-small">
                                                                            <div class="vc_single_bar">
                                                                                <span class="vc_label"></span>
                                                                                <span class="vc_bar" data-percentage-value="<?echo $percentCollected?>" data-value="<?echo $percentCollected?>" style="background-color: #00a99d"> <span class="vc_label_units"><?echo $percentCollected?>%</span></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="donate-value">
                                                                            <span class="current-funding">Collected: <span class="amount">&#36;14,080.00</span></span>
                                                                            <span class="goal-donation">Goal: <span class="amount">&#36;<?echo $row['goal']?></span></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="post-info-content">
                                                                        <div class="post-title">
                                                                            <h2 class="heading-title"><a class="post-title heading-title" href="./postPage.php?id=<?echo $row['id']?>"><?echo $row['title']?></a></h2>
            
                                                                        </div>
                                                                        <div class="post-info-meta">
            
                                                                            <div class="entry-date">July 21, 2015</div>
            
                                                                            <div class="comments-count">0 Comment</div>
            
                                                                        </div>
                                                                        <div class="short-content"><?echo $row['description']?></div>
            
                                                                        <div class="btn-donate"><a class="button normal wd-fancybox" href="./postPage.php?id=<?echo $row['id']?>" id="6628">Donate</a></div>
                                                                    </div>
                                                                </div>
                                                                <!-- end post ... -->
                                                            </li>

                                                        <?
                                                        $i+=1;
                                                    }
                                                }
                                                
                                                ?>
                                                
                                                
                                            
                                            </ul>
                                            <div class="page_navi">
                                                <div class="nav-content">
                                                    <div class='wp-pagenavi'>
                                                        <span class='current'>1</span><a class="page larger" href="http://charity.demo1.wpdance.com/turquoise/cause/page/2/">2</a><a class="nextpostslink" rel="next" href="http://charity.demo1.wpdance.com/turquoise/cause/page/2/">Next »</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- #content -->

                                </div>
                                <!-- #container-inner -->
                            </div>
                            <!-- #wd-container -->

                            <div class="container">
                                <div class="body-end-widget-area">

                                </div>
                                <!-- end #footer-first-area -->
                            </div>

                        </div>
                        <!-- #main -->

                        <footer id="footer" style="background: url('http://charity.demo1.wpdance.com/turquoise/wp-content/themes/wp_charity/images/footer_bottom_bkg.png') no-repeat center bottom">

                            <div class="footer-container">

                                <div class="fourth-footer-area">
                                    <div class="container">
                                        <div class="row">
                                            <div id="copy-right" class="copy-right">
                                                <div class="copyright col-sm-12">
                                                    © 2015 Charity Store . All Rights Reserved. </div>

                                                <div class="menu-footer col-sm-12">
                                                    <div class="menu-footer-page-container">
                                                        <ul id="menu-footer-page" class="menu">
                                                            <li id="menu-item-6347" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6347"><a href="http://charity.demo1.wpdance.com/turquoise/shortcode-faq/">FAQ</a></li>
                                                            <li id="menu-item-6601" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6601"><a href="http://charity.demo1.wpdance.com/turquoise/about-us/">Our Story</a></li>
                                                            <li id="menu-item-6560" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6560"><a href="http://charity.demo1.wpdance.com/turquoise/be-a-volunteer/">Be a Volunteer</a></li>
                                                            <li id="menu-item-6559" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6559"><a href="http://charity.demo1.wpdance.com/turquoise/what-we-do/">What we do</a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- end #copyright -->
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </footer>
                        <!-- #colophon -->

                        <div id="to-top" class="scroll-button">
                            <a class="scroll-button" href="javascript:void(0)" title="Back to Top"></a>
                        </div>

                        <!--<div class="loading-mark-up">
			<span class="loading-image"></span>
		</div>
		<span class="loading-text"></span>-->

                    </div>
                    <!-- #page -->

                </div>
                <!-- #body-wrapper -->

            </body>

            <?php include_once("./phpComponents/footerJs.php")?>

        </html>
        <!-- Performance optimized by W3 Total Cache. Learn more: http://www.w3-edge.com/wordpress-plugins/

Page Caching using disk: enhanced
Database Caching 92/159 queries in 0.303 seconds using disk
Object Caching 7919/8037 objects using disk

 Served from: charity.demo1.wpdance.com @ 2019-06-11 07:37:01 by W3 Total Cache -->