<?include_once("global.php");?>
    <?

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query_selectedPost= "select * from fik_posts where id= '$id'"; 
    $result_selectedPost = $con->query($query_selectedPost); 
    if ($result_selectedPost->num_rows > 0)
    { 
        while($row = $result_selectedPost->fetch_assoc()) 
        { 
            $title = $row['title'];
            $description = $row['description'];
            $image = $row['image'];
        }
    }
  
}
else{
    1;
}

//contributed posts
$query_supportedProjects= "SELECT c.postId,	c.userId,	c.contribution,	c.quantity,	p.title,s.name,	p.excerpt,	p.description	,p.goal	,p.image	,p.category,	p.datePosted FROM `fik_contributions` c inner join fik_posts p on c.postId = p.id inner join fik_shopItems s on c.contribution=s.id where c.userId='$session_userId' order by c.id desc"; 
$result_supportedProjects = $con->query($query_supportedProjects);
    
//your created posts
$query_createdPosts= "SELECT * FROM `fik_posts` p where p.userId='$session_userId' order by p.id desc"; 
$result_createdPosts = $con->query($query_createdPosts);

//recent posts
$query_recentPosts= "select * from fik_posts order by id desc limit 4"; 
$result_recentPosts = $con->query($query_recentPosts); 

//cart items
$query_cartItems= "select * from fik_cart c inner join fik_shopItems s on c.object=s.id where userId='$session_userId' order by c.id desc"; //for now
$result_cartItems = $con->query($query_cartItems); 

//bucket items
$query_inventory= "select * from fik_inventory c inner join fik_shopItems s on c.object=s.id where userId='$session_userId' order by c.id desc"; //for now
$result_inventory = $con->query($query_inventory); 
?>
        <!DOCTYPE html>
        <html class="yes-js js_active js vc_desktop vc_transform gr__charity_demo1_wpdance_com" lang="en-US">
        <!--<![endif]-->
        <?php include_once("./phpComponents/header.php")?>

            <body class="single single-cause postid-6618 custom-background wpb-js-composer js-comp-ver-4.11.1 vc_responsive">

                <div class="body-wrapper">
                    <div class="page-gray-box"></div>

                    <?php include_once("./phpComponents/navbarMobile.php")?>

                    <div id="template-wrapper" class="hfeed site" style="">
                        <div class="wd-control-panel-gray"></div>

                        <div id="sticket-scroll-header-point"></div>
                        <?php include_once("./phpComponents/navbar.php")?>

                            <div id="main-module-container" class="site-main ">
                                <br><br>
                                <div id="container">
                                    <div id="content" class="container single-blog">

                                        <div id="main-content" class="col-sm-18">
                                            <div class="main-content">
                                                <div class="single-content">
                                                    <div class="single-post post-6618 cause type-cause status-publish has-post-thumbnail hentry cause_category-africa cause_category-cause-slider cause_category-food cause_category-middle-east cause_category-cause-syria cause_category-urgent-cause">

                                                        <div class="post-info-content">
                                                            <div class="wd-title">
                                                                <h3>Dashboard</h3></div>
                                                            <div class="wd-short-content">
                                                                <p>Hey <?echo $session_name?>! This is your personal dashboard where you can manage your projects and donations in the best possible way.</p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="clear"></div>
                                                    
                                                    <h5>Your Supported Projects</h5>
                                                    <div class="block-cause-detail" style="padding-top:10px;margin-top:10px;padding-bottom:10px;margin-bottom:10px;">
                                                        <?
                                                        if ($result_supportedProjects->num_rows > 0)
                                                        { 
                                                            while($row = $result_supportedProjects->fetch_assoc()) 
                                                            { 
                                                                ?>
                                                                <div>
                                                                    <div class="icon_circle"><img class="thumbnail-effect-1 wp-post-image" src="./uploads/postImages/<?echo $row['image']?>" style="height:100%; width:100%"></div>
                                                                    <div class="detail_block">
                                                                        <h4><?echo $row['title']?></h4>
                                                                        <div class="line line-50"></div>
                                                                        <?echo $row['excerpt']?>
                                                                        <br>
                                                                        <p style="color:green;">You donated: <?echo $row['name']?> (<?echo $row['quantity']?>)</p>
                                                                    </div>
                                                                </div>
                                                                <?
                                                            }
                                                        }
                                                        ?>

                                                    </div>
                                                    
                                                    
                                                    <h5>Your Projects</h5>
                                                    <div class="block-cause-detail" style="padding-top:10px;margin-top:10px;padding-bottom:10px;margin-bottom:10px;">
                                                        <?
                                                        if ($result_createdPosts->num_rows > 0)
                                                        { 
                                                            while($row = $result_createdPosts->fetch_assoc()) 
                                                            { 
                                                                ?>
                                                                <div>
                                                                    <div class="icon_circle"><img class="thumbnail-effect-1 wp-post-image" src="./uploads/postImages/<?echo $row['image']?>" style="height:100%; width:100%"></div>
                                                                    <div class="detail_block">
                                                                        <h4><?echo $row['title']?></h4>
                                                                        <div class="line line-50"></div>
                                                                        <?echo $row['excerpt']?>
                                                                        <br>
                                                                        <p style="color:green;">You donated: <?echo $row['name']?> (<?echo $row['quantity']?>)</p>
                                                                    </div>
                                                                </div>
                                                                <?
                                                            }
                                                        }
                                                        ?>

                                                    </div>
                                                    
                                                    <h5>Contributors</h5>
                                                                <table class="detail_table">
                                                                    <thead>
                                                                        <tr>
                                                                            <td>consectetur</td>
                                                                            <td>adipiscing</td>
                                                                            <td>consectetur</td>
                                                                            <td>natoque</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Pharetra</td>
                                                                            <td>Malesuada</td>
                                                                            <td>Cursus</td>
                                                                            <td>Euismod</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Pharetra</td>
                                                                            <td>Malesuada</td>
                                                                            <td>Cursus</td>
                                                                            <td>Euismod</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Pharetra</td>
                                                                            <td>Malesuada</td>
                                                                            <td>Cursus</td>
                                                                            <td>Euismod</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Pharetra</td>
                                                                            <td>Malesuada</td>
                                                                            <td>Cursus</td>
                                                                            <td>Euismod</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Pharetra</td>
                                                                            <td>Malesuada</td>
                                                                            <td>Cursus</td>
                                                                            <td>Euismod</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>

                                                    <div class="tags_social">

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <div id="right-content" class="col-sm-6">
                                            <div class="sidebar-content wd-sidebar">
                                                <ul class="xoxo">
                                                  <li id="text-29" class="style-def widget-container widget_text">
                                                        <div class="widget_title_wrapper">
                                                            <a class="block-control" href="javascript:void(0)"></a>
                                                            <h3 class="widget-title heading-title">Your Cart</h3></div>
                                                        <div class="textwidget">
                                                            <ul>
                                                                <li id="woocommerce_product_categories-8" class="style-def widget-container woocommerce widget_product_categories">
                                                                <ul class="product-categories">
                                                                    <?
                                                                        if ($result_cartItems->num_rows > 0)
                                                                        { 
                                                                            while($row = $result_cartItems->fetch_assoc()) 
                                                                            { 
                                                                                ?>
                                                                                    <li class="cat-item cat-item-175"><a><?echo $row['name']?></a> <span class="count">(<?echo $row['quantity']?>)</span></li>
                                                                                <?
                                                                            }
                                                                        }
                                                                    ?>
                                                                </ul>
                                                            </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    
                                                    <li id="text-29" class="style-def widget-container widget_text">
                                                        <div class="widget_title_wrapper">
                                                            <a class="block-control" href="javascript:void(0)"></a>
                                                            <h3 class="widget-title heading-title">Your Bucket</h3></div>
                                                        <div class="textwidget">
                                                            <ul>
                                                                <li id="woocommerce_product_categories-8" class="style-def widget-container woocommerce widget_product_categories">
                                                                <ul class="product-categories">
                                                                    <?
                                                                        if ($result_inventory->num_rows > 0)
                                                                        { 
                                                                            while($row = $result_inventory->fetch_assoc()) 
                                                                            { 
                                                                                ?>
                                                                                    <li class="cat-item cat-item-175"><a><?echo $row['name']?></a> <span class="count">(<?echo $row['quantity']?>)</span></li>
                                                                                <?
                                                                            }
                                                                        }
                                                                    ?>
                                                                </ul>
                                                            </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    
                                                    <li id="causesrecent-2" class="style-def widget-container widget_causesrecent">
                                                        <div class="widget_title_wrapper">
                                                            <a class="block-control" href="void(0)"></a>
                                                            <h3 class="widget-title heading-title">Recent Causes</h3></div>
                                                        <ul class="recentcauses" id="recent-428">
                                                            
                                                            <?
                                                            if ($result_recentPosts->num_rows > 0)
                                                            { 
                                                                while($row = $result_recentPosts->fetch_assoc()) 
                                                                { 
                                                                    ?>
                                                                    <li class="item style-1">
                                                                        <div class="media">
                                                                            <div class="wd_post_thumbnail">
                                                                                <a href="./postPage.php?id=<?echo $row['id']?>" class="effect_color">
                                                                                    <img width="100" height="70" src="./uploads/postImages/<?echo $row['image']?>" class="attachment-tvl_wpdance_blog_recent size-tvl_wpdance_blog_recent wp-post-image" alt="Integer vel accumsan est" /> </a>
                                                                            </div>
                                                                            <div class="detail">
                                                                                <div class="entry-title">
                                                                                    <a href="./postPage.php?id=<?echo $row['id']?>" title=" <?echo $row['title']?>" rel="bookmark">
        										                                    <?echo $row['title']?>								</a>
                                                                                </div>
                                                                                <p class="entry-meta">
                                                                                     <?echo $row['datePosted']?></p>
        
                                                                            </div>
                                                                            <!-- .detail -->
                                                                        </div>
                                                                    </li>
                                                                    <?
                                                                }
                                                            }
                                                            
                                                            ?>
                                                        </ul>
                                                    </li>
                                                   
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- end right sidebar -->

                                    </div>
                                    <!-- #content -->

                                </div>
                                <!-- #container -->

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