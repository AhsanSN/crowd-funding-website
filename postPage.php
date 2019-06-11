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
        
    $query_postParticipants= "select * from fik_postParticipants where postId= '$id'"; 
    $result_postParticipants = $con->query($query_postParticipants); 
}
else{
    1;
}

?>
        <!DOCTYPE html>
        <html class="yes-js js_active js vc_desktop vc_transform gr__charity_demo1_wpdance_com" lang="en-US">
        <!--<![endif]-->
        <?php include_once("./phpComponents/header.php")?>

            <body class="single single-cause postid-6618 custom-background wpb-js-composer js-comp-ver-4.11.1 vc_responsive">

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
                                <div id="container">
                                    <div id="content" class="container single-blog">

                                        <div id="main-content" class="col-sm-18">
                                            <div class="main-content">
                                                <div class="single-content">
                                                    <div class="single-post post-6618 cause type-cause status-publish has-post-thumbnail hentry cause_category-africa cause_category-cause-slider cause_category-food cause_category-middle-east cause_category-cause-syria cause_category-urgent-cause">

                                                        <div class="item_content">
                                                            <div class="thumbnail">
                                                                <div class="image">
                                                                    <a class="thumb-image">
<img width="1170" height="870" src="./uploads/postImages/<?echo $image?>" class="thumbnail-blog wp-post-image" alt="<?echo $title?>" srcset="./uploads/postImages/<?echo $image?> 1170w, ./uploads/postImages/<?echo $image?> 300w, ./uploads/postImages/<?echo $image?>768w, ./uploads/postImages/<?echo $image?> 1024w, ./uploads/postImages/<?echo $image?> 480w, ./uploads/postImages/<?echo $image?> 150w, ./uploads/postImages/<?echo $image?> 270w" sizes="(max-width: 1170px) 100vw, 1170px" />
                                                                    </a>

                                                                </div>

                                                            </div>

                                                        </div>
                                                        <div class="post-info-content">
                                                            <div class="wd-title">
                                                                <h5><?echo $title?></h5></div>
                                                            <div class="wd-short-content">
                                                                <p><?echo $description?></p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="clear"></div>
                                                    
                                                    <h5>About us</h5>
                                                    <div class="block-cause-detail">
                                                        <?
                                                        if ($result_postParticipants->num_rows > 0)
                                                        { 
                                                            while($row = $result_postParticipants->fetch_assoc()) 
                                                            { 
                                                                ?>
                                                                <div>
                                                                    <div class="icon_circle"><i class="fa fa-user-plus"></i></div>
                                                                    <div class="detail_block">
                                                                        <h4><?echo $row['name']?></h4>
                                                                        <div class="line line-50"></div>
                                                                        <?echo $row['description']?>
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
                                                            <h3 class="widget-title heading-title">Your Wallet</h3></div>
                                                        <div class="textwidget">
                                                            <li id="woocommerce_product_categories-8" class="style-def widget-container woocommerce widget_product_categories">
                                                        
                                                        <ul class="product-categories">
                                                            <li class="cat-item cat-item-175"><a>Flour</a> <span class="count">(0)</span></li>
                                                        </ul>
                                                    </li>
                                                        </div>
                                                    </li>
                                                    <li id="causesrecent-2" class="style-def widget-container widget_causesrecent">
                                                        <div class="widget_title_wrapper">
                                                            <a class="block-control" href="void(0)"></a>
                                                            <h3 class="widget-title heading-title">Recent Causes</h3></div>
                                                        <ul class="recentcauses" id="recent-428">
                                                            <li class="item first style-1">
                                                                <div class="media">
                                                                    <div class="wd_post_thumbnail">
                                                                        <a href="http://charity.demo1.wpdance.com/turquoise/cause/actions-speak-louder-than-words-2/" class="effect_color">
                                                                            <img width="100" height="70" src="http://charity.demo1.wpdance.com/turquoise/wp-content/uploads/2015/07/img_urgent-100x70.jpg" class="attachment-tvl_wpdance_blog_recent size-tvl_wpdance_blog_recent wp-post-image" alt="img_urgent" /> </a>
                                                                    </div>
                                                                    <div class="detail">
                                                                        <div class="entry-title">
                                                                            <a href="http://charity.demo1.wpdance.com/turquoise/cause/actions-speak-louder-than-words-2/" title="Permalink to Actions speak louder than words!" rel="bookmark">
										Actions speak louder than words!									</a>
                                                                        </div>
                                                                        <p class="entry-meta">
                                                                            July 21, 2015 </p>

                                                                    </div>
                                                                    <!-- .detail -->
                                                                </div>
                                                            </li>

                                                            <li class="item style-1">
                                                                <div class="media">
                                                                    <div class="wd_post_thumbnail">
                                                                        <a href="http://charity.demo1.wpdance.com/turquoise/cause/stop-syrias-hunger/" class="effect_color">
                                                                            <img width="100" height="70" src="http://charity.demo1.wpdance.com/turquoise/wp-content/uploads/2014/08/x010-100x70.jpg" class="attachment-tvl_wpdance_blog_recent size-tvl_wpdance_blog_recent wp-post-image" alt="Integer vel accumsan est" /> </a>
                                                                    </div>
                                                                    <div class="detail">
                                                                        <div class="entry-title">
                                                                            <a href="http://charity.demo1.wpdance.com/turquoise/cause/stop-syrias-hunger/" title="Permalink to Stop Syria’s Hunger" rel="bookmark">
										Stop Syria’s Hunger									</a>
                                                                        </div>
                                                                        <p class="entry-meta">
                                                                            July 20, 2015 </p>

                                                                    </div>
                                                                    <!-- .detail -->
                                                                </div>
                                                            </li>

                                                            <li class="item style-1">
                                                                <div class="media">
                                                                    <div class="wd_post_thumbnail">
                                                                        <a href="http://charity.demo1.wpdance.com/turquoise/cause/help-100-children-for-their-education/" class="effect_color">
                                                                            <img width="100" height="70" src="./uploads/postImages/<?echo $row['image']?>" class="attachment-tvl_wpdance_blog_recent size-tvl_wpdance_blog_recent wp-post-image" alt="<?echo $title?>" /> </a>
                                                                    </div>
                                                                    <div class="detail">
                                                                        <div class="entry-title">
                                                                            <a href="http://charity.demo1.wpdance.com/turquoise/cause/help-100-children-for-their-education/" title="<?echo $title?>" rel="bookmark"><?echo $title?></a>
                                                                        </div>
                                                                        <p class="entry-meta">
                                                                            July 20, 2015 </p>

                                                                    </div>
                                                                    <!-- .detail -->
                                                                </div>
                                                            </li>

                                                            <li class="item last style-1">
                                                                <div class="media">
                                                                    <div class="wd_post_thumbnail">
                                                                        <a href="http://charity.demo1.wpdance.com/turquoise/cause/save-africas-children/" class="effect_color">
                                                                            <img width="100" height="70" src="./uploads/postImages/<?echo $row['image']?>" class="attachment-tvl_wpdance_blog_recent size-tvl_wpdance_blog_recent wp-post-image" alt="Nam porta viverra lacus et interdum" /> </a>
                                                                    </div>
                                                                    <div class="detail">
                                                                        <div class="entry-title">
                                                                            <a href="http://charity.demo1.wpdance.com/turquoise/cause/save-africas-children/" title="Permalink to Save Africa’s Children" rel="bookmark">
										Save Africa’s Children									</a>
                                                                        </div>
                                                                        <p class="entry-meta">
                                                                            July 20, 2015 </p>

                                                                    </div>
                                                                    <!-- .detail -->
                                                                </div>
                                                            </li>

                                                        </ul>
                                                    </li>
                                                    <li id="woocommerce_product_categories-8" class="style-def widget-container woocommerce widget_product_categories">
                                                        <div class="widget_title_wrapper">
                                                            <a class="block-control" href="javascript:void(0)"></a>
                                                            <h3 class="widget-title heading-title">Product Categories</h3></div>
                                                        <ul class="product-categories">
                                                            <li class="cat-item cat-item-175"><a href="http://charity.demo1.wpdance.com/turquoise/product-category/electronics/">Electronics</a> <span class="count">(0)</span></li>
                                                            <li class="cat-item cat-item-51 cat-parent"><a href="http://charity.demo1.wpdance.com/turquoise/product-category/fashion/">Fashion</a> <span class="count">(30)</span>
                                                                <ul class='children'>
                                                                    <li class="cat-item cat-item-89"><a href="http://charity.demo1.wpdance.com/turquoise/product-category/fashion/bags/">Bags</a> <span class="count">(3)</span></li>
                                                                    <li class="cat-item cat-item-88"><a href="http://charity.demo1.wpdance.com/turquoise/product-category/fashion/boys/">Boys</a> <span class="count">(10)</span></li>
                                                                    <li class="cat-item cat-item-87"><a href="http://charity.demo1.wpdance.com/turquoise/product-category/fashion/girls/">Girls</a> <span class="count">(12)</span></li>
                                                                    <li class="cat-item cat-item-85"><a href="http://charity.demo1.wpdance.com/turquoise/product-category/fashion/mens/">Men's</a> <span class="count">(12)</span></li>
                                                                    <li class="cat-item cat-item-90"><a href="http://charity.demo1.wpdance.com/turquoise/product-category/fashion/shoes/">Shoes</a> <span class="count">(4)</span></li>
                                                                    <li class="cat-item cat-item-86"><a href="http://charity.demo1.wpdance.com/turquoise/product-category/fashion/womens/">Women's</a> <span class="count">(11)</span></li>
                                                                </ul>
                                                            </li>
                                                            <li class="cat-item cat-item-177"><a href="http://charity.demo1.wpdance.com/turquoise/product-category/home-garden/">Home &amp; Garden</a> <span class="count">(0)</span></li>
                                                            <li class="cat-item cat-item-176"><a href="http://charity.demo1.wpdance.com/turquoise/product-category/laptop-computer/">Laptop &amp; Computer</a> <span class="count">(0)</span></li>
                                                            <li class="cat-item cat-item-50"><a href="http://charity.demo1.wpdance.com/turquoise/product-category/sport-game/">Sport &amp; Game</a> <span class="count">(2)</span></li>
                                                        </ul>
                                                    </li>
                                                    <li id="tag_cloud-10" class="style-def widget-container widget_tag_cloud">
                                                        <div class="widget_title_wrapper">
                                                            <a class="block-control" href="javascript:void(0)"></a>
                                                            <h3 class="widget-title heading-title">Tags</h3></div>
                                                        <div class="tagcloud"><a href='http://charity.demo1.wpdance.com/turquoise/tag/adipisicing/' class='tag-link-81 tag-link-position-1' title='7 topics' style='font-size: 20.923076923077pt;'>adipisicing</a>
                                                            <a href='http://charity.demo1.wpdance.com/turquoise/tag/amet/' class='tag-link-80 tag-link-position-2' title='6 topics' style='font-size: 19.846153846154pt;'>amet</a>
                                                            <a href='http://charity.demo1.wpdance.com/turquoise/tag/bags/' class='tag-link-203 tag-link-position-3' title='1 topic' style='font-size: 8pt;'>Bags</a>
                                                            <a href='http://charity.demo1.wpdance.com/turquoise/tag/blog/' class='tag-link-196 tag-link-position-4' title='1 topic' style='font-size: 8pt;'>blog</a>
                                                            <a href='http://charity.demo1.wpdance.com/turquoise/tag/braid-slipper/' class='tag-link-200 tag-link-position-5' title='1 topic' style='font-size: 8pt;'>Braid slipper</a>
                                                            <a href='http://charity.demo1.wpdance.com/turquoise/tag/dolorem-ipsum/' class='tag-link-76 tag-link-position-6' title='8 topics' style='font-size: 22pt;'>doLorem ipsum</a>
                                                            <a href='http://charity.demo1.wpdance.com/turquoise/tag/dolor-sit/' class='tag-link-77 tag-link-position-7' title='7 topics' style='font-size: 20.923076923077pt;'>dolor sit</a>
                                                            <a href='http://charity.demo1.wpdance.com/turquoise/tag/dungaree/' class='tag-link-199 tag-link-position-8' title='1 topic' style='font-size: 8pt;'>dungaree</a>
                                                            <a href='http://charity.demo1.wpdance.com/turquoise/tag/dungaree-silhouette/' class='tag-link-201 tag-link-position-9' title='1 topic' style='font-size: 8pt;'>dungaree silhouette</a>
                                                            <a href='http://charity.demo1.wpdance.com/turquoise/tag/eyebrows/' class='tag-link-193 tag-link-position-10' title='1 topic' style='font-size: 8pt;'>eyebrows</a>
                                                            <a href='http://charity.demo1.wpdance.com/turquoise/tag/fashion-news/' class='tag-link-197 tag-link-position-11' title='2 topics' style='font-size: 11.876923076923pt;'>fashion news</a>
                                                            <a href='http://charity.demo1.wpdance.com/turquoise/tag/hermes/' class='tag-link-195 tag-link-position-12' title='1 topic' style='font-size: 8pt;'>Hermès</a>
                                                            <a href='http://charity.demo1.wpdance.com/turquoise/tag/labore/' class='tag-link-79 tag-link-position-13' title='6 topics' style='font-size: 19.846153846154pt;'>labore</a>
                                                            <a href='http://charity.demo1.wpdance.com/turquoise/tag/lorem-2/' class='tag-link-75 tag-link-position-14' title='6 topics' style='font-size: 19.846153846154pt;'>Lorem</a>
                                                            <a href='http://charity.demo1.wpdance.com/turquoise/tag/mariniere/' class='tag-link-194 tag-link-position-15' title='1 topic' style='font-size: 8pt;'>marinière</a>
                                                            <a href='http://charity.demo1.wpdance.com/turquoise/tag/mens/' class='tag-link-198 tag-link-position-16' title='1 topic' style='font-size: 8pt;'>men&#039;s</a>
                                                            <a href='http://charity.demo1.wpdance.com/turquoise/tag/shoes/' class='tag-link-202 tag-link-position-17' title='1 topic' style='font-size: 8pt;'>shoes</a></div>
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