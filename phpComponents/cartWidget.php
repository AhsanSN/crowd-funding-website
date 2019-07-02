<?if($logged==1){?>
<aside class="single_sidebar_widget post_category_widget">
                <h4 class="widget_title"><?translate("Your Basket","Sepetin")?> [<a href="./shop.php" style="color:#075777;"><?translate("Add More","Daha fazla")?></a>]</h4>
                <ul class="list cat-list">
                    <?
                    if ($result_inventory->num_rows > 0)
                    { 
                        while($row = $result_inventory->fetch_assoc()) 
                        { 
                            if($row['quantity']>0){
                        ?>
                            <li>
                                <a class="d-flex justify-content-between">
                                    <p><?echo $row['name']?></p>
                                    <p><?echo $row['quantity']?></p>
                                </a>
                            </li>
                        <?
                            }
                        }
                    }
                    else{
                        ?>
                        <li>
                                <a style="color:#8a721d;;text-align:center;" class="d-flex justify-content-between">
                                    <p><?translate("You dont have anything in your bucket. Head to the market to material to donate.", "Kovada hi&ccedil;bir &#351;ey yok. Ba&#287;&#305;&#351;ta bulunmak i&ccedil;in markete gidin.")?></p>
                                   
                                </a>
                              
                            </li>
                        <?
                    }
                    ?>
                    															
                </ul>
            </aside>
            <br>
            <aside class="single_sidebar_widget post_category_widget">
                <h4 class="widget_title"><?translate("Your Cart","Al&#305;&#351; veri&#351; kart&#305;n")?> [<a href="./checkout.php" style="color:#075777;"><?translate("Check out","Kontrol edin")?></a>]</h4>
                <ul class="list cat-list">
                    <?
                    if ($result_cartItems->num_rows > 0)
                    { 
                        while($row = $result_cartItems->fetch_assoc()) 
                        { 
                        ?>
                            <li>
                                <a class="d-flex justify-content-between">
                                    <p><?echo $row['name']?></p>
                                    <p><?echo $row['quantity']?></p>
                                </a>
                            </li>
                        <?
                        }
                    }
                    ?>
                    															
                </ul>
            </aside>
            <br>
            <?}
            $filenameLink = basename($_SERVER['PHP_SELF']);

            if($filenameLink!='shop.php'){
            ?>
            <aside class="single_sidebar_widget popular_post_widget">
                <h3 class="widget_title"><?translate("Popular Posts","Pop&#252;ler g&#246;nderi")?></h3>
                <?if ($result_recentPosts->num_rows > 0)
                { 
                    while($row = $result_recentPosts->fetch_assoc()) 
                    { 
                        ?>
                        <div class="media post_item">
                            <?
            							    if(substr($row['image'],-3)=="mp4"){
                                            ?>
                                            <img width="100" height="70" src="./uploads/postImages/videoIcon.png"  alt="post">
                                            <?}else{?>
                                            
                                            <img width="100" height="70" src="./uploads/postImages/<?echo $row['image']?>"  alt="post">
                                            <?}?>
                                            
                                            
                            <div class="media-body">
                                <a href="./postPage.php?id=<?echo $row['id']?>"><h3><?echo $row['title']?></h3></a>
                                <p><?echo $row['excerpt']?></p>
                            </div>
                        </div>
                        <?
                    }
                }
                ?>
            </aside>
            <?}?>
    