<head>
    <?
$filenameLink = basename($_SERVER['PHP_SELF']);
?>
    <meta http-equiv="Content-Type" charset="UTF-8">
        <!-- Required meta tags -->
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/icon.png" type="image/png">
        
        <?
        $authorHeader = "Fikir Bah&#231;&#305;van&#305;";
        if($filenameLink=='allPosts.php'){
            $titleHeader = 'Projeler - Fikir Bah&#231;&#305;van&#305;';
            $keywords = 't&#252;m projeler, Fikir Bah&#231;&#305;van&#305;, fikirler, ba&#351;lamak, ba&#287;&#305;&#351;lamak, projeler, Ba&#287;&#305;&#351;, Kitle fonlamas&#305;';
            $descriptionHeader = "&#199;evrenizdeki t&#252;m harika projeleri bulun ve ba&#351;ar&#305;l&#305; olmalar&#305; i&#199;in ba&#287;&#305;&#351; yap&#305;n.";
        }
        else if($filenameLink=='index.php'){
            $titleHeader = 'Fikir Bah&#231;&#305;van&#305;- Gelece&#287;e Dokunmak &#304;&ccedil;in El Ele!';
            $keywords = 'Fikir Bah&#231;&#305;van&#305;, fikirler, ba&#351;lamak, ba&#287;&#305;&#351;lamak, projeler, Ba&#287;&#305;&#351;, Kitle fonlamas&#305;';
            $descriptionHeader = "&#199;evrenizdeki t&#252;m harika projeleri bulun ve ba&#351;ar&#305;l&#305; olmalar&#305; i&#199;in ba&#287;&#305;&#351; yap&#305;n.";
            
        }
        else if($filenameLink=='shop.php'){
            $titleHeader = 'Manav - Fikir Bah&#231;&#305;van&#305;';
            $keywords = "D&#252;kkan, Market, ba&#287;&#305;&#351;, Fikir Bah&#231;&#305;van&#305;";
            $descriptionHeader = "&#351;ehirdeki en iyi fikirlerden baz&#305;lar&#305;na ba&#287;&#305;&#351; yapmak i&#199;in pazardan &#199;evrimi&#199;i sat&#305;n al&#305;n.";
        }
        else if($filenameLink=='allBlogs.php'){
            $titleHeader = 'Bah&#231;e - Fikir Bah&#231;&#305;van&#305;';
            $keywords = "t&#252;m bloglar, bloglar, fikirler, ba&#351;lamak, yaz&#305;, Fikir Bah&#231;&#305;van&#305;";
            $descriptionHeader = "fikirlerini sizinle payla&#351;mak isteyen, sizin gibi insanlar&#305;n yazd&#305;&#287;&#305; t&#252;m bloglar&#305; bulun.";
            
        }
        else if($filenameLink=='about.php'){
            $titleHeader = 'Hakk&#305;m&#305;zda - Fikir Bah&#231;&#305;van&#305;';
            $keywords = "Hakk&#305;nda, Hakk&#305;m&#305;zda, Kitle fonlamas&#305;, Ba&#287;&#305;&#351;, Fikir Bah&#231;&#305;van&#305; ";
            $descriptionHeader = "Ba&#351;lang&#305;&#199; fikirlerini ba&#351;ar&#305;l&#305; k&#305;lmak i&#199;in t&#252;rkiye'deki en h&#305;zl&#305; b&#252;y&#252;yen ba&#287;&#305;&#351; platformlar&#305;ndan birine kat&#305;l&#305;n.";
            
        }
        else if($filenameLink=='home.php'){
            $titleHeader = 'Profil - Fikir Bah&#231;&#305;van&#305;';
            $keywords = "ev, g&#246;sterge paneli, Kontrol Paneli, Fikir Bah&#231;&#305;van&#305;";
            $descriptionHeader = "Kontrol paneliniz, her &#351;eyinizi en uygun &#351;ekilde y&#246;netebilece&#287;iniz yerdir.";
            
        }
        else if($filenameLink=='donationHistory.php'){
            $titleHeader = 'Ba&#287;&#305;&#351; de&#287;er - Fikir Bah&#231;&#305;van&#305;';
            $keywords = "ev, g&#246;sterge paneli, Kontrol Paneli, Fikir Bah&#231;&#305;van&#305;";
            $descriptionHeader = "&Ouml;nceki t&uuml;m ba&#287;&#305;&#351;lar&#305;na eri&#351;.";
            
        }
        else if($filenameLink=='donateUs.php'){
            $titleHeader = 'Bize ba&#287;&#305;&#351; yap&#305;n - Fikir Bah&#231;&#305;van&#305;';
            $keywords = "ev, g&#246;sterge paneli, Kontrol Paneli, Fikir Bah&#231;&#305;van&#305;";
            $descriptionHeader = "Bizi ba&#287;&#305;&#351;lay&#305;n ve size daha iyi hizmet etmemize yard&#305;mc&#305; olun.";
            
        }
        else if($filenameLink=='signup.php'){
            $titleHeader = 'Giri&#351; Yap - Fikir Bah&#231;&#305;van&#305;';
            $keywords = "ev, g&#246;sterge paneli, Kontrol Paneli, Fikir Bah&#231;&#305;van&#305;";
            $descriptionHeader = "Bizi ba&#287;&#305;&#351;lay&#305;n ve size daha iyi hizmet etmemize yard&#305;mc&#305; olun.";
            
        }
        else if($filenameLink=='postPage.php'){
            if(isset($_GET['id'])){
                $idHeader = htmlspecialchars($_GET['id']);
                $query_selectedPostHeader= "
                select p.views, u.userImg as pImg, u.about, p.id, p.title, p.excerpt, p.goal,p.aboutMe, p.image ,p.description, p.category, p.datePosted ,COUNT(c.postId) as nContributors, sum(c.quantity*s.price) as amountEarned , u.name from fik_posts p left outer join fik_contributions c on p.id=c.postId inner join fik_users u on u.id = p.userId left outer join fik_shopItems s on s.id = c.contribution where p.id='$idHeader' group by c.postId
                "; 
                $result_selectedPostHeader = $con->query($query_selectedPostHeader); 
                if ($result_selectedPostHeader->num_rows > 0)
                { 
                    while($row = $result_selectedPostHeader->fetch_assoc()) 
                    { 
                        $titleHeaderTemp = $row['title'];
                        $descriptionHeader = $row['excerpt'];
                        $imageHeader = $row['image'];
                        $categoryHeader = $row['category'];
                        $authorHeader = $row['name'];
                    }
                }
            }
            else{
                1;
            }
            $titleHeader = $titleHeaderTemp.' - Fikir Bah&#231;&#305;van&#305;';
            $keywords = $categoryHeader.", ".$titleHeader.", t&#252;m projeler, Fikir Bah&#231;&#305;van&#305;, fikirler, ba&#351;lamak, ba&#287;&#305;&#351;lamak, projeler, Ba&#287;&#305;&#351;, Kitle fonlamas&#305;";
        }
        else if($filenameLink=='blogPage.php'){
            if(isset($_GET['id'])){
                $idHeader = htmlspecialchars($_GET['id']);
                $query_selectedPost= "
                select p.views, u.userImg as pImg, u.about, p.id, p.title, p.excerpt,p.aboutMe, p.image ,p.description, p.category, p.datePosted , u.name from fik_blogs p inner join fik_users u on u.id = p.userId where p.id='$idHeader' 
                "; 
                $result_selectedPost = $con->query($query_selectedPost); 
                if ($result_selectedPost->num_rows > 0)
                { 
                    while($row = $result_selectedPost->fetch_assoc()) 
                    { 
                        $titleHeaderTemp = $row['title'];
                        $descriptionHeader = $row['excerpt'];
                        $imageHeader = $row['image'];
                        $categoryHeader = $row['category'];
                        $authorHeader = $row['name'];
                    }
                }
            }
            $titleHeader = $titleHeaderTemp.' - Fikir Bah&#231;&#305;van&#305;';
            $keywords = $categoryHeader.", ".$titleHeader.", t&#252;m projeler, Fikir Bah&#231;&#305;van&#305;, bloglar, fikirler, ba&#351;lamak, yaz&#305;";
        }
        else if($filenameLink=='newBlog.php'){
            $titleHeader = 'Blog yaz - Fikir Bah&#231;&#305;van&#305;';
            $keywords = "blog yaz, yeni blog, yaratmak, fikirleri Payla&#351;, Fikir Bah&#231;&#305;van&#305;";
            $descriptionHeader = "Yeni bir blog yazmaya ba&#351;la ve fikirlerini etraf&#305;ndaki k&#252;resel toplulukla payla&#351;.";
            
        }
        else if($filenameLink=='newProject.php'){
            $titleHeader = 'Proje g&#246;nder - Fikir Bah&#231;&#305;van&#305;';
            $keywords = "fikirleri Payla&#351;, proje, yeni proje, Kitle fonlamas&#305;, &#351;irket kurmak, Ba&#287;&#305;&#351;, Fikir Bah&#231;&#305;van&#305;";
            $descriptionHeader = "Bir proje g&#246;nderin ve fikirlerinizi etraf&#305;n&#305;zdaki global toplulukla payla&#351;maya ba&#351;lay&#305;n.";
            
        }
        else if($filenameLink=='settings.php'){
            $titleHeader = 'Ayarlar - Proje g&#246;nder - Fikir Bah&#231;&#305;van&#305;';
            $keywords = "ayarlar, seçenekleri, şifre değiştir, ismini değiştir, resmi değiştir";
            $descriptionHeader = "Change your account settings. Change your name, password, picture or anything you want.";
            
        }
        else{
            $titleHeader = 'En iyi fikirlere ba&#287;&#305;&#351; yap&#305;n - Fikir Bah&#231;&#305;van&#305;';
            $keywords = 'Fikir Bah&#231;&#305;van&#305;, fikirler, ba&#351;lamak, ba&#287;&#305;&#351;lamak, projeler, Ba&#287;&#305;&#351;, Kitle fonlamas&#305;';
            $descriptionHeader = "&#199;evrenizdeki t&#252;m harika projeleri bulun ve ba&#351;ar&#305;l&#305; olmalar&#305; i&#199;in ba&#287;&#305;&#351; yap&#305;n.";
        }
        $actual_linkHeader = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        ?>
        <meta name="title" content="<?echo $titleHeader?>">
        <title><?echo $titleHeader?></title>
        <meta name="description" content="<?echo $descriptionHeader?>">
        <meta name="keywords" content="<?echo $keywords?>">
        <meta name="author" content="<?echo $authorHeader?>">
        <meta name="language" content="Turkish">
        
        <meta property="og:title" content="<?echo $titleHeader?>">
        <meta property="og:description" content="<?echo $descriptionHeader?>">
        <meta property="og:image" content="https://1sowv82zxs703aps2323q73z-wpengine.netdna-ssl.com/wp-content/uploads/Brand-Cover.jpg">
        <meta property="og:url" content="<?echo $actual_linkHeader?>">
        <meta property="og:site_name" content="Fikir Bah&#231;&#305;van&#305;">
        
        <meta name="twitter:title" content="<?echo $titleHeader?>">
        <meta name="twitter:description" content="<?echo $descriptionHeader?>">
        <meta name="twitter:image" content="https://1sowv82zxs703aps2323q73z-wpengine.netdna-ssl.com/wp-content/uploads/Brand-Cover.jpg">
        <meta name="twitter:card" content="<?echo $descriptionHeader?>">
        
        <!-- 
    	Developed by Anomoz Softwares. (Anomoz.com).
    	Please dont remove any watermarks from the website, because this is what helps me get bread on my table.
    	-->

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
    </head>