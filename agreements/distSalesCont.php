<?require("../global.php");


//get item in cart and total cost
$query_cartItemsCheckout= "select s.id, c.userId,c.object,c.quantity,s.name,s.price,s.image,s.description,(s.price*c.quantity)as total from fik_cart c inner join fik_shopItems s on c.object=s.id where userId='$session_userId' order by c.id desc"; //for now
$result_cartItemsCheckout = $con->query($query_cartItemsCheckout); 

if ($result_cartItemsCheckout->num_rows > 0)
{ 
    while($row = $result_cartItemsCheckout->fetch_assoc()) 
    { 
        $itemName = $row['name'];
        $total = $row['total'];
    }
}

//get rewards
$postRefId = $_SESSION['inCheckout_postRefId'];
$itemId = $_SESSION['inCheckout_itemId'];

//echo $postRefId."--".$itemId."--";  

$query_cartItemsCheckout= "select r.reward from fik_posts p inner join fik_rewards r on p.postRewardId=r.postRewardId where p.id='$postRefId' and r.object='$itemId'"; //for now
$result_cartItemsCheckout = $con->query($query_cartItemsCheckout); 

if ($result_cartItemsCheckout->num_rows > 0)
{ 
    while($row = $result_cartItemsCheckout->fetch_assoc()) 
    { 
        $reward = $row['reward'];
    }
}


?>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
        <title>Distant Sales Contract</title>
    </head>
    <body style="margin-left:10%;margin-right:20%">
<p align="center">
	<strong>
		F&#304;K&#304;R BAH&#199;IVANI MANAV MESAFEL&#304; SATI&#350;
		S&#214;ZLE&#350;MES&#304;
	</strong>
</p>
<p>
	T&#220;M MADDELER&#304; L&#220;TFEN D&#304;KKATL&#304;CE OKUYUN.
	F&#304;K&#304;R BAH&#199;IVANI MANAV MESAFEL&#304; SATI&#350;
	S&#214;ZLE&#350;MES&#304;'N&#304; ("S&#214;ZLE&#350;ME") &#304;NTERNET
	&#220;ZER&#304;NDEN KABUL ETT&#304;&#286;&#304;N&#304;ZDE
	S&#214;ZLE&#350;ME'DEK&#304; T&#220;M H&#220;K&#220;MLER&#304;N HER
	B&#304;R SATIRINI OKUDU&#286;UNUZU, DE&#286;ERLEND&#304;REREK TAMAMEN
	ANLADI&#286;INIZI, H&#220;K&#220;MLERE VAKIF OLDU&#286;UNUZU, BU
	H&#220;K&#220;MLERLE BA&#286;LI OLMAYI VE &#214;DEME YAPMANIZ
	GEREKECE&#286;&#304;N&#304; KABUL, BEYAN VE TAAHH&#220;T ETM&#304;&#350;
	OLACAKSINIZ.
	<strong>
		&#220;R&#220;N'&#220; ALMAK &#304;STEM&#304;YORSANIZ VE BUNA G&#214;RE
		&#214;DEME YAPMAK &#304;STEM&#304;YORSANIZ L&#220;TFEN BU FORMU VE
		MESAFEL&#304; SATI&#350; S&#214;ZLE&#350;MES&#304;N&#304; ONAYLAMAYIN.
	</strong>
	ONAYLAMAMANIZ DURUMUNDA TARAFINIZA HERHANG&#304; B&#304;R &#220;R&#220;N
	VEYA H&#304;ZMET SA&#286;LANMAYACAKTIR.
</p>
<p>
	<strong>MADDE 1: TARAFLAR</strong>
</p>
<p>
	<strong>1.1 SATICI</strong>
</p>
<p>
	&#304;sim/Unvan:
	<strong>
		Fikir Bah&#231;&#305;van&#305; Bili&#351;im Bilgisayar
		Yaz&#305;l&#305;m Teknolojileri Reklam Dan&#305;&#351;manl&#305;k
		Ticaret Limited
	</strong>
	<strong> </strong>
	<strong>&#350;irketi</strong>
	<strong></strong>
</p>
<p>
	A&#231;&#305;k Adres:
	<strong>
		Esentepe Mah. Talat Pa&#351;a Cad. No:5 &#304;&#231; Kap&#305; No:1
		&#350;i&#351;li/&#304;stanbul (Kolektif House Levent)
	</strong>
	<strong></strong>
</p>
<p>
	Telefon:
	<a
		href="https://www.google.com/search?q=kolektif+house+levent&amp;oq=kolektif+house+levent&amp;aqs=chrome..69i57.6911j0j7&amp;sourceid=chrome&amp;ie=UTF-8"
		title="Hangout üzerinden ara"
	>
		<strong>(0212) 924 24 10</strong>
	</a>
</p>
<p>
	Mersis No: <strong>0387107935600001</strong>
</p>
<p>
E-Posta:<a href="mailto:info@fikirbahcivani.com">info@fikirbahcivani.com</a>	<strong></strong>
</p>
<p>
	<strong> </strong>
</p>
<p>
	ALICI'n&#305;n &#304;ade Halinde &#220;r&#252;n'&#252; SATICI'ya
	G&#246;nderece&#287;i Kargo &#350;irketi: SATICI'n&#305; g&#246;nderim
	yapt&#305;&#287;&#305; kargo &#351;irketi.
</p>
<p>
	<strong>1.1 </strong>
	<strong>ALICI</strong>
</p>
<p>
	TCKN:
	<strong>
		<?echo $session_identityNumber;?>
	</strong>
</p>
<p>
	Ad Soyad:
	<strong>
		<?echo $session_name;?>
	</strong>
</p>
<p>
	A&#231;&#305;k Adres:
	<strong>
		<?echo $session_streetAddress;?>, <?echo $session_city;?>, <?echo $session_state;?>, <?echo $session_country;?>.
	</strong>
</p>
<p>
	Telefon:
	<strong>
		<?echo $session_phoneNumber?>
	</strong>
</p>
<p>
	E-Posta:
	<strong>
		<?echo $session_email?>
	</strong>
</p>
<p>
	<strong> </strong>
</p>
<p>
	
</p>
<p>
Fikir bah&#231;&#305;van&#305; manav uygulamas&#305; veya "<u><a href="https://www.fikirbahcivani.com">www.fikirbahcivani.com</a></u>" web adresi veya "	<u><a href="https://www.fikirbahcivani.com">www.fikirbahcivani.com</a> sitesindeki 'manav sekmesi' &#252;zerinden</u>"
	(Bundan sonra hepsi birden<strong>"Platform" </strong>
	an&#305;lacakt&#305;r.) i&#351;bu S&#246;zle&#351;me'ye konu
	mal/hizmet/sanal i&#231;erik <strong>("&#220;r&#252;n")</strong>
	&#252;zerinde al&#305;m yapan ki&#351;i "ALICI" olarak
	an&#305;lacakt&#305;r
</p>
<p>
&#304;&#351;bu S&#246;zle&#351;me'de ALICI ve SATICI birlikte	<strong>"Taraflar"</strong> olarak an&#305;lacakt&#305;r.
</p>
<p>
	F&#304;K&#304;R BAH&#199;IVANI, i&#351;bu S&#246;zle&#351;me konusu
	&#220;r&#252;n'&#252;n sat&#305;&#351;&#305;n&#305;n
	yap&#305;ld&#305;&#287;&#305; Platform'un sahibidir.
</p>
<p>
	<strong>PLATFORM SAH&#304;B&#304; : </strong>
	<strong>
		Fikir Bah&#231;&#305;van&#305; Bili&#351;im Bilgisayar
		Yaz&#305;l&#305;m Teknolojileri Reklam Dan&#305;&#351;manl&#305;k
		Ticaret Limited &#350;irketi
	</strong>
	("F&#304;K&#304;R BAH&#199;IVANI")
</p>
<p>
	<strong>Adres :</strong>
	<strong>
		Esentepe Mah. Talat Pa&#351;a Cad. No:5 &#304;&#231; Kap&#305; No:1
		&#350;i&#351;li/&#304;stanbul (Kolektif House Levent) adresinde
	</strong>
</p>
<p>
	<strong>Internet Sitesi : </strong>
	<a href="https://www.fikirbahcivani.com">www.fikirbahcivani.com</a>
</p>
<p>
	<strong>E-posta : </strong>
	<a href="mailto:info@fikirbahcivani.com">info@fikirbahcivani.com</a>
</p>
<p>
	<strong>Telefon : </strong>
	+ 90 531 686 10 93
</p>
<p>
	<strong>MADDE 2: S&#214;ZLE&#350;ME'N&#304;N KONUSU VE KAPSAMI</strong>
</p>
<p>
	&#304;&#351;bu S&#246;zle&#351;me, 6502 Say&#305;l&#305; Tu&#776;keticinin
	Korunmas&#305; Hakk&#305;nda Kanun <strong>("Kanun")</strong> ve Mesafeli
S&#246;zle&#351;meler Y&#246;netmeli&#287;i'ne	<strong>("Y&#246;netmelik")</strong> uygun olarak
	du&#776;zenlenmi&#351;tir. &#304;&#351;bu S&#246;zle&#351;me'nin t&#252;m
	taraflar&#305; i&#351;bu S&#246;zle&#351;me taht&#305;nda Kanun'dan ve
	Mesafeli S&#246;zle&#351;meler Y&#246;netmeli&#287;i'nden kaynaklanan
	yu&#776;ku&#776;mlu&#776;lu&#776;k ve sorumluluklar&#305;n&#305;
	bildiklerini ve anlad&#305;klar&#305;n&#305; kabul ve beyan ederler.
</p>
<p>
	&#304;&#351;bu S&#246;zle&#351;me'nin konusunu&#894; ALICI'n&#305;n
	Platform &#252;zerinden, SATICI'ya ait &#220;r&#252;n'&#252;n sat&#305;n
	al&#305;nmas&#305;na y&#246;nelik elektronik olarak sipari&#351; vermesi,
	S&#246;zle&#351;me'de belirtilen niteliklere sahip &#220;r&#252;n'&#252;n
	sat&#305;&#351;&#305; ve teslimi ile ilgili olarak Kanun ve Y&#246;netmelik
	hu&#776;ku&#776;mleri gere&#287;ince Taraflar'&#305;n hak ve
	yu&#776;ku&#776;mlu&#776;lu&#776;klerinin belirlenmesi olu&#351;turur.
</p>
<p>
	&#304;&#351;bu S&#246;zle&#351;me'nin akdedilmesi, ALICI'n&#305;n
	F&#304;K&#304;R BAH&#199;IVANI ile akdetmi&#351; olduklar&#305; &#220;yelik
	ve Destek S&#246;zle&#351;mesi'nin h&#252;k&#252;mlerini kabul ve beyan
	ederler.
</p>
<p>
	<strong>
		MADDE 3: S&#214;ZLE&#350;ME KONUSU &#220;R&#220;N'&#220;N TEMEL
		N&#304;TEL&#304;KLER&#304; VE F&#304;YATI
	</strong>
</p>
<p>
	Platform &#252;zerinden ilan edilen fiyatlar ve vaatler, yine Platform
	&#252;zerinde gu&#776;ncelleme yap&#305;lana veya de&#287;i&#351;tirilene
	kadar ge&#231;erlidir. S&#252;reli olarak ilan edilen fiyatlar ise
	belirtilen su&#776;re sonuna kadar ge&#231;erlidir. Fiyatlara KDV dahildir.
</p>
<p>
	S&#246;zle&#351;me konusu &#220;r&#252;n:
	<strong>
		<?echo $itemName?>
	</strong>
</p>
<p>
	S&#246;zle&#351;me konusu &#220;r&#252;n a&#231;&#305;klamas&#305;:
	<strong>
	    <?echo $reward?>
	</strong>
</p>
<p>
	Kargo Dahil &#220;r&#252;n Bedeli:
	<strong>
		<?echo $total;?> TL
	</strong>
</p>
<p>
	<strong> </strong>
</p>
<p>
	
</p>
<p>
	<strong>MADDE 4: &#214;DEME &#350;EKL&#304;</strong>
</p>
<p>
	Al&#305;c&#305; &#220;r&#252;n'&#252; sat&#305;n almak i&#231;in kredi
	kart&#305; ile tek seferlik &#246;deme yapacakt&#305;r.
</p>
<p>
	<u>
		S&#214;Z KONUSU &#220;R&#220;N BEDEL&#304;, &#214;DEME KORUMA
		S&#304;STEM&#304; KAPSAMINDA SATICI ADINA, &#214;DEME KURULU&#350;U
		TARAFINDAN ALICI'DAN TAHS&#304;L ED&#304;LMEKTED&#304;R. ALICI
		&#220;R&#220;N'&#220;N BEDEL&#304;N&#304; &#214;DEME KURULU&#350;U'NA
		&#214;DEMEKLE, &#220;R&#220;N BEDEL&#304;N&#304; SATICI'YA
		&#214;DEM&#304;&#350; SAYILACAKTIR.
	</u>
</p>
<p>
	<strong>MADDE 5: TESL&#304;MAT ADRES&#304;</strong>
</p>
<p>
	Adres:
	<strong>
		<?echo $session_streetAddress;?>, <?echo $session_city;?>, <?echo $session_state;?>, <?echo $session_country;?>.
	</strong>
</p>
<p>
	Teslim Edilecek Ki&#351;i(ler):
	<strong>
		<?echo $session_name;?>
	</strong>
</p>
<p>
	Fatura Adresi:
	<strong>
		<?echo $session_streetAddress;?>, <?echo $session_city;?>, <?echo $session_state;?>, <?echo $session_country;?>.
	</strong>
</p>
<p>
	<strong> </strong>
</p>
<p>
	
</p>
<p>
	<strong>
		MADDE 6: &#220;R&#220;N'&#220;N TESL&#304;M&#304; VE TESL&#304;M
		&#350;EKL&#304;
	</strong>
</p>
<p>
	&#220;r&#252;n'&#252;n sevkiyat&#305;na, ALICI taraf&#305;ndan
	&#220;r&#252;n'&#252;n sipari&#351; edilmesini takiben 90 (doksan) i&#351;
	g&#252;n&#252; i&#231;inde ba&#351;lanacakt&#305;r. 
	<strong>
	E&#287;er
	ALICI'n&#305;n alm&#305;&#351; oldu&#287;u sanal i&#231;erik
	kar&#351;&#305;l&#305;&#287;&#305; olan &#252;r&#252;n 10 (on) TL nin
	&#252;zerinde olursa fiziki sevkiyat ge&#231;erlidir. E&#287;er
	ALICI'n&#305;n alm&#305;&#351; oldu&#287;u sanal i&#231;erik
	kar&#351;&#305;l&#305;&#287;&#305; olan &#252;r&#252;n 10 (on) TL ve 10
	(on) TL nin alt&#305;nda olursa herhangi bir fiziki sevkiyat ge&#231;erli
	olmaz, yaln&#305;zca kendisinin belirlemi&#351; oldu&#287;u e-mail adresine
<span style="color:red;">'TE&#350;EKK&#220;R E-MA&#304;L&#304;'</span> veya "	<a href="http://www.fikirbahcivani.com">www.fikirbahcivani.com</a><u>"</u>
	web adresinde yaz&#305;l&#305; olan <span style="color:red;">'S&#304;Z&#304;NLE B&#304;R
	K&#304;&#350;&#304; DAHA G&#220;&#199;L&#220;Y&#220;Z B&#304;Z&#304;
	DESTEKLED&#304;&#286;&#304;N&#304;Z &#304;&#199;&#304;N TE&#350;EKK&#220;R
	EDER&#304;Z'</span> s&#246;zc&#252;&#287;&#252; ge&#231;erli olacakt&#305;r.
	Ayr&#305;ca ALICI, platformu veya platformda yay&#305;nlanan projelerden
	herhangi birini &#246;d&#252;l kar&#351;&#305;l&#305;&#287;&#305;nda
	desteklemek i&#231;in, sat&#305;n ald&#305;&#287;&#305; hi&#231;bir sanal
	i&#231;eri&#287;in kar&#351;&#305;l&#305;&#287;&#305; olan paran&#305;n
	iadesini, sat&#305;n ald&#305;&#287;&#305; g&#252;nden itibaren en az 3
	(&#252;&#231;) ay i&#231;erisinde talep edemez. ALICI'n&#305;n &#246;deme
	sayfas&#305;ndaki se&#231;eneklerden <span style="color:red;">'E&#286;ER DESTEKLEM&#304;&#350;
	OLDU&#286;UM PROJE/LER HEDEF TUTARA VEYA HEDEF TUTARIN %75'&#304;NE
	ULA&#350;AMAZSA, ALMI&#350; OLDU&#286;UM MATERYELLER F&#304;K&#304;R
	BAH&#199;IVANI'NA DESTEK OLARAK G&#304;TS&#304;N'</span> kutucu&#287;unu
	i&#351;aretlerse, projenin olumsuz sonu&#231;land&#305;&#287;&#305;
	g&#252;n ALICI'ya otomatik olarak e-ar&#351;iv faturas&#305; kesilip,
	destekledi&#287;i bedel kar&#351;&#305;l&#305;&#287;&#305;nda
	F&#304;K&#304;R BAH&#199;IVANI'n&#305;n belirlemi&#351; oldu&#287;u 10 (on)
	TL nin &#252;zerindeki &#246;d&#252;ller i&#231;in &#246;d&#252;l teslim
	s&#252;reci ba&#351;lar, ancak <span style="color:red;">'E&#286;ER DESTEKLEM&#304;&#350;
	OLDU&#286;UM PROJE/LER HEDEF TUTARA VEYA HEDEF TUTARIN %75'&#304;NE
	ULA&#350;MAZSA, ALMI&#350; OLDU&#286;UM MATERYELLER SAKSIMA GER&#304;
	G&#304;TS&#304;N'</span> kutucu&#287;unu i&#351;aretlerse, projenin olumsuz
	sonu&#231;land&#305;&#287;&#305; g&#252;n ALICI'n&#305;n
	saks&#305;s&#305;na alm&#305;&#351; oldu&#287;u materyaller aynen iade
	edilir ve 1 (bir) y&#305;l boyunca kullanmas&#305; i&#231;in beklenir. 1
	(bir) y&#305;l&#305;n sonunda kullan&#305;lmayan materyallerin maddi
	kar&#351;&#305;l&#305;&#287;&#305;, o esnada platform da bulunan sosyal
	sorumluluk projelerine e&#351;it miktarda
	da&#287;&#305;t&#305;lacakt&#305;r ayr&#305;ca ki&#351;inin ismi o
	projelerde destek&#231;i olarak ge&#231;ecek ve e&#287;er
	kar&#351;&#305;l&#305;&#287;&#305;nda belirlenmi&#351; &#246;d&#252;l
	kazan&#305;lm&#305;&#351;sa proje sahipleri taraf&#305;ndan kendisine
	&#246;d&#252;lleri yollanacakt&#305;r.
	</strong>
</p>
<p>
	S&#246;zle&#351;me, ALICI taraf&#305;ndan, elektronik ortamda onaylanmakla
	y&#252;r&#252;rl&#252;&#287;e girmi&#351; olup, ALICI'n&#305;n SATICI'dan
	sat&#305;n alm&#305;&#351; oldu&#287;u &#220;r&#252;n'&#252;n &#252;st
	paragraftaki ko&#351;ul sakl&#305; olmak kayd&#305;yla, ALICI'ya teslim
	edilmesiyle ifa edilmi&#351; olur. &#220;r&#252;n, ALICI'n&#305;n
	sipari&#351; formunda ve i&#351;bu S&#246;zle&#351;me'de belirtmi&#351;
	oldu&#287;u adrese ve belirtilen ki&#351;i/ki&#351;ilere teslim
	edilecektir.
</p>
<p>
	<strong>MADDE 7: TESL&#304;MAT MASRAFLARI VE &#304;FASI</strong>
</p>
<p>
	SATICI, Platform'da teslimat u&#776;cretinin kendisince
	kar&#351;&#305;lanaca&#287;&#305;n&#305; beyan etmi&#351;se, teslimat
	masraflar&#305; SATICI'ya ait olacakt&#305;r.
</p>
<p>
	&#220;r&#252;n'&#252;n teslimat&#305;&#894; &#246;demenin
	ba&#351;ar&#305;l&#305; bir &#351;ekilde ger&#231;ekle&#351;mesinden sonra
	''E&#287;er ALICI'n&#305;n alm&#305;&#351; oldu&#287;u sanal i&#231;erik
	kar&#351;&#305;l&#305;&#287;&#305; olan &#252;r&#252;n 10 (on) TL nin
	&#252;zerinde olursa fiziki sevkiyat ge&#231;erlidir. E&#287;er
	ALICI'n&#305;n alm&#305;&#351; oldu&#287;u sanal i&#231;erik
	kar&#351;&#305;l&#305;&#287;&#305; olan &#252;r&#252;n 10 (on) TL nin
	alt&#305;nda olursa herhangi bir fiziki sevkiyat ge&#231;erli olmaz,
	yaln&#305;zca kendisinin belirlemi&#351; oldu&#287;u e-mail adresine
'TE&#350;EKK&#220;R E-MA&#304;L&#304;' veya "	<a href="http://www.fikirbahcivani.com">www.fikirbahcivani.com</a><u>"</u>
	web adresinde yaz&#305;l&#305; olan 'S&#304;Z&#304;NLE B&#304;R
	K&#304;&#350;&#304; DAHA G&#220;&#199;L&#220;Y&#220;Z B&#304;Z&#304;
	DESTEKLED&#304;&#286;&#304;N&#304;Z &#304;&#199;&#304;N TE&#350;EKK&#220;R
	EDER&#304;Z' s&#246;zc&#252;&#287;&#252; ge&#231;erli olacakt&#305;r.
	Ayr&#305;ca ALICI, platformu veya platformda yay&#305;nlanan projelerden
	herhangi birini &#246;d&#252;l kar&#351;&#305;l&#305;&#287;&#305;nda
	desteklemek i&#231;in, sat&#305;n ald&#305;&#287;&#305; hi&#231;bir sanal
	i&#231;eri&#287;in kar&#351;&#305;l&#305;&#287;&#305; olan paran&#305;n
	iadesini, sat&#305;n ald&#305;&#287;&#305; g&#252;nden itibaren en az 3
	(&#252;&#231;) ay i&#231;erisinde talep edemez. ALICI'n&#305;n &#246;deme
	sayfas&#305;ndaki se&#231;eneklerden 'E&#286;ER DESTEKLEM&#304;&#350;
	OLDU&#286;UM PROJE/LER HEDEF TUTARA VEYA HEDEF TUTARIN %75'&#304;NE
	ULA&#350;AMAZSA, ALMI&#350; OLDU&#286;UM MATERYELLER F&#304;K&#304;R
	BAH&#199;IVANI'NA DESTEK OLARAK G&#304;TS&#304;N' kutucu&#287;unu
	i&#351;aretlerse, projenin olumsuz sonu&#231;land&#305;&#287;&#305;
	g&#252;n ALICI'ya otomatik olarak e-ar&#351;iv faturas&#305; kesilip,
	destekledi&#287;i bedel kar&#351;&#305;l&#305;&#287;&#305;nda
	F&#304;K&#304;R BAH&#199;IVANI'n&#305;n belirlemi&#351; oldu&#287;u 10 (on)
	TL nin &#252;zerindeki &#246;d&#252;ller i&#231;in &#246;d&#252;l teslim
	s&#252;reci ba&#351;lar, ancak 'E&#286;ER DESTEKLEM&#304;&#350;
	OLDU&#286;UM PROJE/LER HEDEF TUTARA VEYA HEDEF TUTARIN %75'&#304;NE
	ULA&#350;MAZSA, ALMI&#350; OLDU&#286;UM MATERYELLER SAKSIMA GER&#304;
	G&#304;TS&#304;N' kutucu&#287;unu i&#351;aretlerse, projenin olumsuz
	sonu&#231;land&#305;&#287;&#305; g&#252;n ALICI'n&#305;n
	saks&#305;s&#305;na alm&#305;&#351; oldu&#287;u materyaller aynen iade
	edilir ve 1 (bir) y&#305;l boyunca kullanmas&#305; i&#231;in beklenir. 1
	(bir) y&#305;l&#305;n sonunda kullan&#305;lmayan materyallerin maddi
	kar&#351;&#305;l&#305;&#287;&#305;, o esnada platform da bulunan sosyal
	sorumluluk projelerine e&#351;it miktarda
	da&#287;&#305;t&#305;lacakt&#305;r ayr&#305;ca ki&#351;inin ismi o
	projelerde destek&#231;i olarak ge&#231;ecek ve e&#287;er
	kar&#351;&#305;l&#305;&#287;&#305;nda belirlenmi&#351; &#246;d&#252;l
	kazan&#305;lm&#305;&#351;sa proje sahipleri taraf&#305;ndan kendisine
	&#246;d&#252;lleri yollanacakt&#305;r.'' Ko&#351;ulu sakl&#305; olmak
	kayd&#305;yla, taahh&#252;t edilen s&#252;rede yap&#305;l&#305;r. SATICI,
	sipari&#351; konusu &#220;r&#252;n'&#252;n temin ve teslim edilmesinin
	imkans&#305;zla&#351;t&#305;&#287;&#305; haller sakl&#305; kalmak
	kayd&#305;yla, &#220;r&#252;n'&#252;, ALICI taraf&#305;ndan
	&#220;r&#252;n'&#252;n sipari&#351; edilmesinden itibaren 90 (doksan)
	g&#252;n i&#231;inde teslim eder. Sipari&#351; konusu
	&#220;r&#252;n'&#252;n temin ve teslim edilmesinin
	imkans&#305;zla&#351;t&#305;&#287;&#305; hallerde, SATICI, bu durumu
	&#246;&#287;rendi&#287;i tarihten itibaren 30 (otuz) g&#252;n i&#231;inde
	ALICI'y&#305; elektronik posta ile bilgilendirecek ve varsa teslimat
	masraflar&#305; da d&#226;hil olmak &#252;zere tahsil edilen tu&#776;m
	&#246;demeleri bildirim tarihinden itibaren en ge&#231; 14 (on d&#246;rt)
	g&#252;n i&#231;inde ALICI'ya iade edecektir.
</p>
<p>
	Herhangi bir nedenle, ALICI taraf&#305;ndan &#220;r&#252;n'&#252;n bedeli
	&#246;denmez veya yap&#305;lan &#246;deme banka kay&#305;tlar&#305;nda
	iptal edilir ise, SATICI, &#220;r&#252;n'&#252;n teslimi
	y&#252;k&#252;ml&#252;l&#252;&#287;&#252;nden kurtulmu&#351; kabul edilir.
</p>
<p>
	&#220;r&#252;n'&#252;n SATICI taraf&#305;ndan kargoya verilmesinden sonra
	ve fakat ALICI taraf&#305;ndan teslim al&#305;nmas&#305;ndan &#246;nce,
	ALICI taraf&#305;ndan yap&#305;lan sipari&#351; iptallerinde kargo
	bedelinden, her hal&#252;karda, ALICI sorumludur.
</p>
<p>
	ALICI, i&#351;bu S&#246;zle&#351;me'de belirtilen kendilerine ait
	bilgilerin internet sitesine/ mobil uygulamaya girdikleri bilgiler
	oldu&#287;unu, bu bilgileri herhangi bir sebeple yanl&#305;&#351; veya
	eksik girmeleri halinde dahi bu S&#246;zle&#351;me'nin kendileri
	taraf&#305;ndan sa&#287;lanan bilgilerle ge&#231;erli
	olaca&#287;&#305;n&#305;, F&#304;K&#304;R BAH&#199;IVANI'n&#305;n ALICI
	taraf&#305;ndan verilen bilgilerin do&#287;rulu&#287;unu ve
	ge&#231;erlili&#287;ini kontrol etme
	y&#252;k&#252;ml&#252;l&#252;&#287;&#252; bulunmad&#305;&#287;&#305;n&#305;
	ve ALICI'n&#305;n i&#351;bu S&#246;zle&#351;me'nin ifa edilebilmesi
	i&#231;in aktard&#305;&#287;&#305; ki&#351;isel verileri ile sair
	bilgilerinin, S&#246;zle&#351;me'nin ifas&#305; kapsam&#305;yla
	s&#305;n&#305;rl&#305; olmak &#252;zere ve S&#246;zle&#351;me konusu
	&#220;r&#252;n'&#252;n g&#246;nderilebilmesi i&#231;in posta hizmet
	sa&#287;lay&#305;c&#305;lara aktar&#305;laca&#287;&#305;n&#305; kabul,
	beyan ve taahh&#252;t ederler.
</p>
<p>
	<strong>MADDE 8: ALICI'NIN BEYAN VE TAAHH&#220;TLER&#304;</strong>
</p>
<p>
	ALICI i&#351;bu S&#246;zle&#351;me uyar&#305;nca, hizmetin gere&#287;i gibi
	ifa edilebilmesi i&#231;in Platform &#252;zerinden girece&#287;i ve SATICI
	taraf&#305;ndan ayr&#305;ca talep edilecek bilgileri eksiksiz ve
	ger&#231;e&#287;i yans&#305;tacak &#351;ekilde
	payla&#351;aca&#287;&#305;n&#305;, bu bilgilerde bir hata olmas&#305;ndan
	kaynaklanan gecikme vb. gibi durumlardan F&#304;K&#304;R
	BAH&#199;IVANI'n&#305;n sorumlu olmad&#305;&#287;&#305;n&#305; kabul ve
	taahh&#252;t eder.
</p>
<p>
	ALICI, Platform'da yer alan S&#246;zle&#351;me konusu
	&#220;r&#252;n'&#252;n temel nitelikleri, sat&#305;&#351; fiyat&#305; ve
	&#246;deme &#351;ekli ile teslimat ve kargo bedeline ili&#351;kin olarak
	SATICI taraf&#305;ndan yu&#776;klenen &#246;n bilgileri okuyup bilgi sahibi
	oldu&#287;unu ve gerekli bilgilendirmelerin yap&#305;ld&#305;&#287;&#305;na
	dair elektronik ortamda gerekli teyidi verdi&#287;ini beyan eder.
</p>
<p>
	ALICI, t&#252;ketici s&#305;fat&#305;yla, talep ve &#351;ikayetlerini
	yukar&#305;da yer alan SATICI ileti&#351;im bilgilerini kullanarak ve/veya
	Platform'da yer alan "<u>destek@fikirbahcivani.com</u>'' &#252;zerinden
	ula&#351;t&#305;rabilir.<strong><u></u></strong>
</p>
<p>
	ALICI, i&#351;bu S&#246;zle&#351;me'yi ve &#214;n Bilgilendirme Formu'nu
	elektronik ortamda teyit etmekle, mesafeli s&#246;zle&#351;melerin akdinden
	&#246;nce SATICI taraf&#305;ndan ALICI'ya verilmesi gereken adres,
	sipari&#351;i verilen &#220;r&#252;n'e ait temel &#246;zellikler,
	&#220;r&#252;n'&#252;n vergiler dahil fiyat&#305;, &#246;deme ve teslimat
	ile teslimat fiyat&#305; gibi ek &#246;deme
	y&#252;k&#252;ml&#252;l&#252;kleri ve cayma hakk&#305;n&#305;n
	kullan&#305;lmas&#305;na ili&#351;kin gerekli t&#252;m bilgileri de
	do&#287;ru ve eksiksiz olarak edindi&#287;ini teyit etmi&#351; olur.
</p>
<p>
	ALICI, teslimat s&#305;ras&#305;nda &#252;r&#252;n&#252; muayene ettikten
	sonra teslim tutana&#287;&#305;n&#305; imzalayacakt&#305;r. ALICI veya
	ALICI ad&#305;na &#252;r&#252;n&#252; teslim alan ki&#351;i, teslim
	tutana&#287;&#305;n&#305; imzalamakla, &#252;r&#252;n&#252; tam, eksiksiz
	ve hasars&#305;z olarak teslim ald&#305;&#287;&#305;n&#305; beyan
	etmi&#351; olacakt&#305;r. ALICI'n&#305;n veya ALICI ad&#305;na
	&#220;r&#252;n'&#252; ''E&#287;er ALICI'n&#305;n alm&#305;&#351;
	oldu&#287;u sanal i&#231;erik kar&#351;&#305;l&#305;&#287;&#305; olan
	&#252;r&#252;n 10 (on) TL nin &#252;zerinde olursa fiziki sevkiyat
	ge&#231;erlidir. E&#287;er ALICI'n&#305;n alm&#305;&#351; oldu&#287;u sanal
	i&#231;erik kar&#351;&#305;l&#305;&#287;&#305; olan &#252;r&#252;n 10 (on)
	TL nin alt&#305;nda olursa herhangi bir fiziki sevkiyat ge&#231;erli olmaz,
	yaln&#305;zca kendisinin belirlemi&#351; oldu&#287;u e-mail adresine
'TE&#350;EKK&#220;R E-MA&#304;L&#304;' veya "	<a href="http://www.fikirbahcivani.com">www.fikirbahcivani.com</a><u>"</u>
	web adresinde yaz&#305;l&#305; olan 'S&#304;Z&#304;NLE B&#304;R
	K&#304;&#350;&#304; DAHA G&#220;&#199;L&#220;Y&#220;Z B&#304;Z&#304;
	DESTEKLED&#304;&#286;&#304;N&#304;Z &#304;&#199;&#304;N TE&#350;EKK&#220;R
	EDER&#304;Z' s&#246;zc&#252;&#287;&#252; ge&#231;erli olacakt&#305;r.
	Ayr&#305;ca ALICI, platformu veya platformda yay&#305;nlanan projelerden
	herhangi birini &#246;d&#252;l kar&#351;&#305;l&#305;&#287;&#305;nda
	desteklemek i&#231;in, sat&#305;n ald&#305;&#287;&#305; hi&#231;bir sanal
	i&#231;eri&#287;in kar&#351;&#305;l&#305;&#287;&#305; olan paran&#305;n
	iadesini, sat&#305;n ald&#305;&#287;&#305; g&#252;nden itibaren en az 3
	(&#252;&#231;) ay i&#231;erisinde talep edemez. ALICI'n&#305;n &#246;deme
	sayfas&#305;ndaki se&#231;eneklerden 'E&#286;ER DESTEKLEM&#304;&#350;
	OLDU&#286;UM PROJE/LER HEDEF TUTARA VEYA HEDEF TUTARIN %75'&#304;NE
	ULA&#350;AMAZSA, ALMI&#350; OLDU&#286;UM MATERYELLER F&#304;K&#304;R
	BAH&#199;IVANI'NA DESTEK OLARAK G&#304;TS&#304;N' kutucu&#287;unu
	i&#351;aretlerse, projenin olumsuz sonu&#231;land&#305;&#287;&#305;
	g&#252;n ALICI'ya otomatik olarak e-ar&#351;iv faturas&#305; kesilip,
	destekledi&#287;i bedel kar&#351;&#305;l&#305;&#287;&#305;nda
	F&#304;K&#304;R BAH&#199;IVANI'n&#305;n belirlemi&#351; oldu&#287;u 10 (on)
	TL nin &#252;zerindeki &#246;d&#252;ller i&#231;in &#246;d&#252;l teslim
	s&#252;reci ba&#351;lar, ancak 'E&#286;ER DESTEKLEM&#304;&#350;
	OLDU&#286;UM PROJE/LER HEDEF TUTARA VEYA HEDEF TUTARIN %75'&#304;NE
	ULA&#350;MAZSA, ALMI&#350; OLDU&#286;UM MATERYELLER SAKSIMA GER&#304;
	G&#304;TS&#304;N' kutucu&#287;unu i&#351;aretlerse, projenin olumsuz
	sonu&#231;land&#305;&#287;&#305; g&#252;n ALICI'n&#305;n
	saks&#305;s&#305;na alm&#305;&#351; oldu&#287;u materyaller aynen iade
	edilir ve 1 (bir) y&#305;l boyunca kullanmas&#305; i&#231;in beklenir. 1
	(bir) y&#305;l&#305;n sonunda kullan&#305;lmayan materyallerin maddi
	kar&#351;&#305;l&#305;&#287;&#305;, o esnada platform da bulunan sosyal
	sorumluluk projelerine e&#351;it miktarda
	da&#287;&#305;t&#305;lacakt&#305;r ayr&#305;ca ki&#351;inin ismi o
	projelerde destek&#231;i olarak ge&#231;ecek ve e&#287;er
	kar&#351;&#305;l&#305;&#287;&#305;nda belirlenmi&#351; &#246;d&#252;l
	kazan&#305;lm&#305;&#351;sa proje sahipleri taraf&#305;ndan kendisine
	&#246;d&#252;lleri yollanacakt&#305;r.'' Ko&#351;ulu sakl&#305; olmak
	kayd&#305;yla, teslim alan ki&#351;inin teslim edildi&#287;i esnada tahrip
	olmu&#351;, k&#305;r&#305;k, ambalaj&#305; y&#305;rt&#305;lm&#305;&#351;
	vb. hasarl&#305; ve ay&#305;pl&#305; oldu&#287;u a&#231;&#305;k&#231;a
	belli olan S&#246;zle&#351;me konusu &#220;r&#252;n'&#252; kargo
	&#351;irketinden teslim almas&#305; halinde sorumluluk tamamen ALICI'ya
	aittir.
</p>
<p>
	&#220;r&#252;n'&#252;n tesliminden sonra, ALICI'ya ait kredi
	kart&#305;n&#305;n ALICI'n&#305;n kusurundan kaynaklanmayan bir
	&#351;ekilde yetkisiz ki&#351;ilerce haks&#305;z veya hukuka
	ayk&#305;r&#305; olarak kullan&#305;lmas&#305; nedeni ile ilgili banka veya
	finans kurulu&#351;unun &#220;r&#252;n'&#252;n bedelini SATICI'ya
	&#246;dememesi halinde, ALICI kendisine teslim edilmi&#351; olmas&#305;
	kayd&#305;yla &#220;r&#252;n'&#252; 3 (&#252;&#231;) g&#252;n i&#231;inde
	SATICI'ya iade etmekle yahut F&#304;K&#304;R BAH&#199;IVANI ile
	ileti&#351;ime ge&#231;erek &#220;r&#252;n'&#252;n &#246;demesini 3
	(&#252;&#231;) g&#252;n i&#231;erisinde yapmakla
	y&#252;k&#252;ml&#252;d&#252;r. ALICI, bu madde uyar&#305;nca
	&#220;r&#252;n'&#252;n iadesini talep etmeyi se&#231;erse teslimat
	giderleri kendisine ait olacakt&#305;r.
</p>
<p>
	<strong>MADDE 9: SATICI'NIN BEYAN VE TAAHH&#220;TLER&#304;</strong>
</p>
<p>
	<strong> </strong>
</p>
<p>
	SATICI, S&#246;zle&#351;me konusu &#220;r&#252;n'&#252;n ''E&#287;er
	ALICI'n&#305;n alm&#305;&#351; oldu&#287;u sanal i&#231;erik
	kar&#351;&#305;l&#305;&#287;&#305; olan &#252;r&#252;n 10 (on) TL nin
	&#252;zerinde olursa fiziki sevkiyat ge&#231;erlidir. E&#287;er
	ALICI'n&#305;n alm&#305;&#351; oldu&#287;u sanal i&#231;erik
	kar&#351;&#305;l&#305;&#287;&#305; olan &#252;r&#252;n 10 (on) TL nin
	alt&#305;nda olursa herhangi bir fiziki sevkiyat ge&#231;erli olmaz,
	yaln&#305;zca kendisinin belirlemi&#351; oldu&#287;u e-mail adresine
'TE&#350;EKK&#220;R E-MA&#304;L&#304;' veya "	<a href="http://www.fikirbahcivani.com">www.fikirbahcivani.com</a><u>"</u>
	web adresinde yaz&#305;l&#305; olan 'S&#304;Z&#304;NLE B&#304;R
	K&#304;&#350;&#304; DAHA G&#220;&#199;L&#220;Y&#220;Z B&#304;Z&#304;
	DESTEKLED&#304;&#286;&#304;N&#304;Z &#304;&#199;&#304;N TE&#350;EKK&#220;R
	EDER&#304;Z' s&#246;zc&#252;&#287;&#252; ge&#231;erli olacakt&#305;r.
	Ayr&#305;ca ALICI, platformu veya platformda yay&#305;nlanan projelerden
	herhangi birini &#246;d&#252;l kar&#351;&#305;l&#305;&#287;&#305;nda
	desteklemek i&#231;in, sat&#305;n ald&#305;&#287;&#305; hi&#231;bir sanal
	i&#231;eri&#287;in kar&#351;&#305;l&#305;&#287;&#305; olan paran&#305;n
	iadesini, sat&#305;n ald&#305;&#287;&#305; g&#252;nden itibaren en az 3
	(&#252;&#231;) ay i&#231;erisinde talep edemez. ALICI'n&#305;n &#246;deme
	sayfas&#305;ndaki se&#231;eneklerden 'E&#286;ER DESTEKLEM&#304;&#350;
	OLDU&#286;UM PROJE/LER HEDEF TUTARA VEYA HEDEF TUTARIN %75'&#304;NE
	ULA&#350;AMAZSA, ALMI&#350; OLDU&#286;UM MATERYELLER F&#304;K&#304;R
	BAH&#199;IVANI'NA DESTEK OLARAK G&#304;TS&#304;N' kutucu&#287;unu
	i&#351;aretlerse, projenin olumsuz sonu&#231;land&#305;&#287;&#305;
	g&#252;n ALICI'ya otomatik olarak e-ar&#351;iv faturas&#305; kesilip,
	destekledi&#287;i bedel kar&#351;&#305;l&#305;&#287;&#305;nda
	F&#304;K&#304;R BAH&#199;IVANI'n&#305;n belirlemi&#351; oldu&#287;u 10 (on)
	TL nin &#252;zerindeki &#246;d&#252;ller i&#231;in &#246;d&#252;l teslim
	s&#252;reci ba&#351;lar, ancak 'E&#286;ER DESTEKLEM&#304;&#350;
	OLDU&#286;UM PROJE/LER HEDEF TUTARA VEYA HEDEF TUTARIN %75'&#304;NE
	ULA&#350;MAZSA, ALMI&#350; OLDU&#286;UM MATERYELLER SAKSIMA GER&#304;
	G&#304;TS&#304;N' kutucu&#287;unu i&#351;aretlerse, projenin olumsuz
	sonu&#231;land&#305;&#287;&#305; g&#252;n ALICI'n&#305;n
	saks&#305;s&#305;na alm&#305;&#351; oldu&#287;u materyaller aynen iade
	edilir ve 1 (bir) y&#305;l boyunca kullanmas&#305; i&#231;in beklenir. 1
	(bir) y&#305;l&#305;n sonunda kullan&#305;lmayan materyallerin maddi
	kar&#351;&#305;l&#305;&#287;&#305;, o esnada platform da bulunan sosyal
	sorumluluk projelerine e&#351;it miktarda
	da&#287;&#305;t&#305;lacakt&#305;r ayr&#305;ca ki&#351;inin ismi o
	projelerde destek&#231;i olarak ge&#231;ecek ve e&#287;er
	kar&#351;&#305;l&#305;&#287;&#305;nda belirlenmi&#351; &#246;d&#252;l
	kazan&#305;lm&#305;&#351;sa proje sahipleri taraf&#305;ndan kendisine
	&#246;d&#252;lleri yollanacakt&#305;r.'' Ko&#351;ulu sakl&#305; olmak
	kayd&#305;yla, Kanun'a uygun olarak, sa&#287;lam, eksiksiz, sipari&#351;te
	belirtilen niteliklere uygun ve varsa garanti belgeleri ve kullan&#305;m
	k&#305;lavuzlar&#305; ile ALICI'ya teslim edilmesinden sorumludur.
</p>
<p>
	SATICI, m&#252;cbir sebepler veya nakliyeyi engelleyen
	ola&#287;an&#252;st&#252; durumlar nedeni ile S&#246;zle&#351;me konusu
	&#220;r&#252;n'&#252; s&#252;resi i&#231;inde teslim edemez ise, durumu
	&#246;&#287;rendi&#287;i tarihten itibaren 3 (&#252;&#231;) g&#252;n
	i&#231;inde ALICI'y&#305; bilgilendirmekle
	yu&#776;ku&#776;mlu&#776;du&#776;r. S&#246;z konusu
	ola&#287;an&#252;st&#252; durumlar&#305;n ortadan kalkmas&#305; ile
	birlikte SATICI ALICI'ya yeni bir teslimat tarihi verip, s&#246;z konusu
	tarihte &#220;r&#252;n'&#252; ALICI'ya teslim etmekle
	y&#252;k&#252;ml&#252; olacakt&#305;r.
</p>
<p>
	S&#246;zle&#351;me konusu &#220;r&#252;n, ALICI'n&#305;n kendisinden
	ba&#351;ka bir ki&#351;iye teslim edilecek ise, teslim edilecek
	ki&#351;inin teslimat&#305; kabul etmemesinden SATICI sorumlu tutulamaz. Bu
	durumda ALICI, &#220;r&#252;n'&#252;n kendisine teslim edilmesi i&#231;in
	masraflar&#305; kendisine ait olmak &#252;zere gerekli
	ba&#351;vurular&#305;, "<u>destek@fikirbahcivani.com</u>'' adresine mail
	atarak yapacakt&#305;r.
</p>
<p>
	Sipari&#351;e ili&#351;kin verilen belge ve bilgilerin eksik, sahte ve/veya
	yanl&#305;&#351; oldu&#287;unun saptanmas&#305; veya sipari&#351;in
	k&#246;t&#252; niyetle/veya ticari ve/veya kazan&#231; elde etmek
	amac&#305;yla yap&#305;lm&#305;&#351; oldu&#287;una dair &#351;&#252;phenin
	varl&#305;&#287;&#305; ya da tespiti halinde, herhangi bir zamanda, SATICI,
	ALICI'y&#305; bilgilendirmek ko&#351;uluyla sipari&#351; ba&#351;vurusunu,
	gerekli incelemelerin yap&#305;lmas&#305;n&#305; teminen durdurma ve/veya
	iptal etme hakk&#305;n&#305; sakl&#305; tutar. &#304;ptal halinde,
	&#246;deme i&#231;in iade s&#252;reci yine ALICI'ya bildirilmek
	kayd&#305;yla yap&#305;l&#305;r.
</p>
<p>
	<strong>MADDE 10: CAYMA HAKKI</strong>
</p>
<p>
	ALICI, hi&#231;bir hukuki ve cezai sorumluluk u&#776;stlenmeksizin ve
	hi&#231;bir gerek&#231;e g&#246;stermeksizin, fiziki teslimat tarihinden
	itibaren, 14 (ond&#246;rt) g&#252;n i&#231;erisinde cayma hakk&#305;n&#305;
	kullanabilir. ALICI, &#220;r&#252;n'&#252;n teslimine kadar olan su&#776;re
	i&#231;inde de ayn&#305; &#351;ekilde cayma hakk&#305;n&#305; kullanabilir.
</p>
<p>
	ALICI, cayma hakk&#305;n&#305; "<a href="mailto:destek@fikirbahcivani.com">destek@fikirbahcivani.com</a>'' adresine
	mail atarak kullanabilir. ALICI'n&#305;n, cayma hakk&#305;n&#305; kullanmak
	i&#231;in "<a href="mailto:destek@fikirbahcivani.com">destek@fikirbahcivani.com</a>'' adresine mail
	att&#305;&#287;&#305; tarihten itibaren 10 (on) g&#252;n i&#231;inde iade
	etmek istedi&#287;i &#220;r&#252;n'&#252; ''E&#287;er ALICI'n&#305;n
	alm&#305;&#351; oldu&#287;u sanal i&#231;erik
	kar&#351;&#305;l&#305;&#287;&#305; olan &#252;r&#252;n 10 (on) TL nin
	&#252;zerinde olursa fiziki sevkiyat ge&#231;erlidir. E&#287;er
	ALICI'n&#305;n alm&#305;&#351; oldu&#287;u sanal i&#231;erik
	kar&#351;&#305;l&#305;&#287;&#305; olan &#252;r&#252;n 10 (on) TL nin
	alt&#305;nda olursa herhangi bir fiziki sevkiyat ge&#231;erli olmaz,
	yaln&#305;zca kendisinin belirlemi&#351; oldu&#287;u e-mail adresine
'TE&#350;EKK&#220;R E-MA&#304;L&#304;' veya "	<a href="http://www.fikirbahcivani.com">www.fikirbahcivani.com</a><u>"</u>
	web adresinde yaz&#305;l&#305; olan 'S&#304;Z&#304;NLE B&#304;R
	K&#304;&#350;&#304; DAHA G&#220;&#199;L&#220;Y&#220;Z B&#304;Z&#304;
	DESTEKLED&#304;&#286;&#304;N&#304;Z &#304;&#199;&#304;N TE&#350;EKK&#220;R
	EDER&#304;Z' s&#246;zc&#252;&#287;&#252; ge&#231;erli olacakt&#305;r.
	Ayr&#305;ca ALICI, platformu veya platformda yay&#305;nlanan projelerden
	herhangi birini &#246;d&#252;l kar&#351;&#305;l&#305;&#287;&#305;nda
	desteklemek i&#231;in, sat&#305;n ald&#305;&#287;&#305; hi&#231;bir sanal
	i&#231;eri&#287;in kar&#351;&#305;l&#305;&#287;&#305; olan paran&#305;n
	iadesini, sat&#305;n ald&#305;&#287;&#305; g&#252;nden itibaren en az 3
	(&#252;&#231;) ay i&#231;erisinde talep edemez. ALICI'n&#305;n &#246;deme
	sayfas&#305;ndaki se&#231;eneklerden 'E&#286;ER DESTEKLEM&#304;&#350;
	OLDU&#286;UM PROJE/LER HEDEF TUTARA VEYA HEDEF TUTARIN %75'&#304;NE
	ULA&#350;AMAZSA, ALMI&#350; OLDU&#286;UM MATERYELLER F&#304;K&#304;R
	BAH&#199;IVANI'NA DESTEK OLARAK G&#304;TS&#304;N' kutucu&#287;unu
	i&#351;aretlerse, projenin olumsuz sonu&#231;land&#305;&#287;&#305;
	g&#252;n ALICI'ya otomatik olarak e-ar&#351;iv faturas&#305; kesilip,
	destekledi&#287;i bedel kar&#351;&#305;l&#305;&#287;&#305;nda
	F&#304;K&#304;R BAH&#199;IVANI'n&#305;n belirlemi&#351; oldu&#287;u 10 (on)
	TL nin &#252;zerindeki &#246;d&#252;ller i&#231;in &#246;d&#252;l teslim
	s&#252;reci ba&#351;lar, ancak 'E&#286;ER DESTEKLEM&#304;&#350;
	OLDU&#286;UM PROJE/LER HEDEF TUTARA VEYA HEDEF TUTARIN %75'&#304;NE
	ULA&#350;MAZSA, ALMI&#350; OLDU&#286;UM MATERYELLER SAKSIMA GER&#304;
	G&#304;TS&#304;N' kutucu&#287;unu i&#351;aretlerse, projenin olumsuz
	sonu&#231;land&#305;&#287;&#305; g&#252;n ALICI'n&#305;n
	saks&#305;s&#305;na alm&#305;&#351; oldu&#287;u materyaller aynen iade
	edilir ve 1 (bir) y&#305;l boyunca kullanmas&#305; i&#231;in beklenir. 1
	(bir) y&#305;l&#305;n sonunda kullan&#305;lmayan materyallerin maddi
	kar&#351;&#305;l&#305;&#287;&#305;, o esnada platform da bulunan sosyal
	sorumluluk projelerine e&#351;it miktarda
	da&#287;&#305;t&#305;lacakt&#305;r ayr&#305;ca ki&#351;inin ismi o
	projelerde destek&#231;i olarak ge&#231;ecek ve e&#287;er
	kar&#351;&#305;l&#305;&#287;&#305;nda belirlenmi&#351; &#246;d&#252;l
	kazan&#305;lm&#305;&#351;sa proje sahipleri taraf&#305;ndan kendisine
	&#246;d&#252;lleri yollanacakt&#305;r.'' Ko&#351;ulu sakl&#305; olmak
	kayd&#305;yla, SATICI'n&#305;n adresine geri g&#246;ndermesi gerekmektedir.
	&#220;r&#252;n'&#252;n kendisi ile beraber sevk irsaliyesinin, kutusunun,
	ambalaj&#305;n&#305;n, varsa standart aksesuarlar&#305;n&#305;n, varsa
	&#220;r&#252;n ile birlikte hediye edilen di&#287;er &#252;r&#252;nlerin de
	eksiksiz ve hasars&#305;z olarak iade edilmesi gerekmektedir. ALICI, cayma
	su&#776;resi i&#231;inde &#220;r&#252;n'&#252;, i&#351;leyi&#351;ine,
	teknik &#246;zelliklerine ve kullan&#305;m talimatlar&#305;na uygun bir
	&#351;ekilde kulland&#305;&#287;&#305; takdirde; olu&#351;abilecek
	de&#287;i&#351;iklik ve/veya bozulmalardan sorumlu de&#287;ildir.
</p>
<p>
	ALICI, cayma hakk&#305; kapsam&#305;nda iade edece&#287;i
	&#220;r&#252;n'&#252;, ''E&#287;er ALICI'n&#305;n alm&#305;&#351;
	oldu&#287;u sanal i&#231;erik kar&#351;&#305;l&#305;&#287;&#305; olan
	&#252;r&#252;n 10 (on) TL nin &#252;zerinde olursa fiziki sevkiyat
	ge&#231;erlidir. E&#287;er ALICI'n&#305;n alm&#305;&#351; oldu&#287;u sanal
	i&#231;erik kar&#351;&#305;l&#305;&#287;&#305; olan &#252;r&#252;n 10 (on)
	TL nin alt&#305;nda olursa herhangi bir fiziki sevkiyat ge&#231;erli olmaz,
	yaln&#305;zca kendisinin belirlemi&#351; oldu&#287;u e-mail adresine
'TE&#350;EKK&#220;R E-MA&#304;L&#304;' veya "	<a href="http://www.fikirbahcivani.com">www.fikirbahcivani.com</a><u>"</u>
	web adresinde yaz&#305;l&#305; olan 'S&#304;Z&#304;NLE B&#304;R
	K&#304;&#350;&#304; DAHA G&#220;&#199;L&#220;Y&#220;Z B&#304;Z&#304;
	DESTEKLED&#304;&#286;&#304;N&#304;Z &#304;&#199;&#304;N TE&#350;EKK&#220;R
	EDER&#304;Z' s&#246;zc&#252;&#287;&#252; ge&#231;erli olacakt&#305;r.
	Ayr&#305;ca ALICI, platformu veya platformda yay&#305;nlanan projelerden
	herhangi birini &#246;d&#252;l kar&#351;&#305;l&#305;&#287;&#305;nda
	desteklemek i&#231;in, sat&#305;n ald&#305;&#287;&#305; hi&#231;bir sanal
	i&#231;eri&#287;in kar&#351;&#305;l&#305;&#287;&#305; olan paran&#305;n
	iadesini, sat&#305;n ald&#305;&#287;&#305; g&#252;nden itibaren en az 3
	(&#252;&#231;) ay i&#231;erisinde talep edemez. ALICI'n&#305;n &#246;deme
	sayfas&#305;ndaki se&#231;eneklerden 'E&#286;ER DESTEKLEM&#304;&#350;
	OLDU&#286;UM PROJE/LER HEDEF TUTARA VEYA HEDEF TUTARIN %75'&#304;NE
	ULA&#350;AMAZSA, ALMI&#350; OLDU&#286;UM MATERYELLER F&#304;K&#304;R
	BAH&#199;IVANI'NA DESTEK OLARAK G&#304;TS&#304;N' kutucu&#287;unu
	i&#351;aretlerse, projenin olumsuz sonu&#231;land&#305;&#287;&#305;
	g&#252;n ALICI'ya otomatik olarak e-ar&#351;iv faturas&#305; kesilip,
	destekledi&#287;i bedel kar&#351;&#305;l&#305;&#287;&#305;nda
	F&#304;K&#304;R BAH&#199;IVANI'n&#305;n belirlemi&#351; oldu&#287;u 10 (on)
	TL nin &#252;zerindeki &#246;d&#252;ller i&#231;in &#246;d&#252;l teslim
	s&#252;reci ba&#351;lar, ancak 'E&#286;ER DESTEKLEM&#304;&#350;
	OLDU&#286;UM PROJE/LER HEDEF TUTARA VEYA HEDEF TUTARIN %75'&#304;NE
	ULA&#350;MAZSA, ALMI&#350; OLDU&#286;UM MATERYELLER SAKSIMA GER&#304;
	G&#304;TS&#304;N' kutucu&#287;unu i&#351;aretlerse, projenin olumsuz
	sonu&#231;land&#305;&#287;&#305; g&#252;n ALICI'n&#305;n
	saks&#305;s&#305;na alm&#305;&#351; oldu&#287;u materyaller aynen iade
	edilir ve 1 (bir) y&#305;l boyunca kullanmas&#305; i&#231;in beklenir. 1
	(bir) y&#305;l&#305;n sonunda kullan&#305;lmayan materyallerin maddi
	kar&#351;&#305;l&#305;&#287;&#305;, o esnada platform da bulunan sosyal
	sorumluluk projelerine e&#351;it miktarda
	da&#287;&#305;t&#305;lacakt&#305;r ayr&#305;ca ki&#351;inin ismi o
	projelerde destek&#231;i olarak ge&#231;ecek ve e&#287;er
	kar&#351;&#305;l&#305;&#287;&#305;nda belirlenmi&#351; &#246;d&#252;l
	kazan&#305;lm&#305;&#351;sa proje sahipleri taraf&#305;ndan kendisine
	&#246;d&#252;lleri yollanacakt&#305;r.'' Ko&#351;ulu sakl&#305; olmak
	kayd&#305;yla, SATICI'ya yukar&#305;da ve &#214;n Bilgilendirme Formu'nda
	belirtilen, SATICI'n&#305;n anla&#351;mal&#305; kargo &#351;irketi ile
	g&#246;nderdi&#287;i s&#252;rece, iade kargo bedeli SATICI'ya aittir.
	ALICI'n&#305;n iade edece&#287;i &#220;r&#252;n'&#252; SATICI'n&#305;n
	anla&#351;mal&#305; kargo &#351;irketi d&#305;&#351;&#305;nda bir kargo
	&#351;irketi ile g&#246;ndermesi halinde, iade kargo bedeli ALICI'ya ait
	olup, &#220;r&#252;n'n&#252;n kargo su&#776;recinde
	u&#287;rayabilece&#287;i hasardan SATICI sorumlu de&#287;ildir.
</p>
<p>
	ALICI'n&#305;n cayma hakk&#305;n&#305; kullanmas&#305;ndan itibaren 10 (on)
	g&#252;n i&#231;erisinde (&#220;r&#252;n'&#252;n SATICI'n&#305;n &#214;n
	Bilgilendirme Formu'nda iade i&#231;in belirtti&#287;i kargo &#351;irketi
	arac&#305;l&#305;&#287;&#305;yla geri g&#246;nderilmesi kayd&#305;yla),
	ALICI'n&#305;n ilgili &#220;r&#252;n'e ili&#351;kin F&#304;K&#304;R
	BAH&#199;IVANI'na yapm&#305;&#351; oldu&#287;u t&#252;m &#246;demeler
	ALICI'ya, &#220;r&#252;n'&#252; sat&#305;n al&#305;rken
	kulland&#305;&#287;&#305; &#246;deme arac&#305;na uygun bir &#351;ekilde ve
	t&#252;keticiye herhangi bir masraf veya y&#252;k&#252;ml&#252;l&#252;k
	getirmeden ve tek seferde iade edilecektir.
</p>
<p>
	<u>
		ALICI, CAYMA HAKKI, BEDEL &#304;ADES&#304; VEYA &#220;R&#220;N
		DE&#286;&#304;&#350;&#304;M&#304; HAKLARINI SATICIYA KAR&#350;I
		&#214;NE S&#220;REB&#304;L&#304;R.
	</u>
</p>
<p>
	<strong>MADDE 11: CAYMA HAKKININ KULLANILAMAYACA&#286;I HALLER</strong>
</p>
<p>
	Mevzuat uyar&#305;nca Al&#305;c&#305; a&#351;a&#287;&#305;daki hallerde
	cayma hakk&#305;n&#305; kullanamaz:
</p>
<p>
	''E&#287;er ALICI'n&#305;n alm&#305;&#351; oldu&#287;u sanal i&#231;erik
	kar&#351;&#305;l&#305;&#287;&#305; olan &#252;r&#252;n 10 (on) TL nin
	&#252;zerinde olursa fiziki sevkiyat ge&#231;erlidir. E&#287;er
	ALICI'n&#305;n alm&#305;&#351; oldu&#287;u sanal i&#231;erik
	kar&#351;&#305;l&#305;&#287;&#305; olan &#252;r&#252;n 10 (on) TL nin
	alt&#305;nda olursa herhangi bir fiziki sevkiyat ge&#231;erli olmaz,
	yaln&#305;zca kendisinin belirlemi&#351; oldu&#287;u e-mail adresine
'TE&#350;EKK&#220;R E-MA&#304;L&#304;' veya "	<a href="http://www.fikirbahcivani.com">www.fikirbahcivani.com</a><u>"</u>
	web adresinde yaz&#305;l&#305; olan 'S&#304;Z&#304;NLE B&#304;R
	K&#304;&#350;&#304; DAHA G&#220;&#199;L&#220;Y&#220;Z B&#304;Z&#304;
	DESTEKLED&#304;&#286;&#304;N&#304;Z &#304;&#199;&#304;N TE&#350;EKK&#220;R
	EDER&#304;Z' s&#246;zc&#252;&#287;&#252; ge&#231;erli olacakt&#305;r.
	Ayr&#305;ca ALICI, platformu veya platformda yay&#305;nlanan projelerden
	herhangi birini &#246;d&#252;l kar&#351;&#305;l&#305;&#287;&#305;nda
	desteklemek i&#231;in, sat&#305;n ald&#305;&#287;&#305; hi&#231;bir sanal
	i&#231;eri&#287;in kar&#351;&#305;l&#305;&#287;&#305; olan paran&#305;n
	iadesini, sat&#305;n ald&#305;&#287;&#305; g&#252;nden itibaren en az 3
	(&#252;&#231;) ay i&#231;erisinde talep edemez. ALICI'n&#305;n &#246;deme
	sayfas&#305;ndaki se&#231;eneklerden 'E&#286;ER DESTEKLEM&#304;&#350;
	OLDU&#286;UM PROJE/LER HEDEF TUTARA VEYA HEDEF TUTARIN %75'&#304;NE
	ULA&#350;AMAZSA, ALMI&#350; OLDU&#286;UM MATERYELLER F&#304;K&#304;R
	BAH&#199;IVANI'NA DESTEK OLARAK G&#304;TS&#304;N' kutucu&#287;unu
	i&#351;aretlerse, projenin olumsuz sonu&#231;land&#305;&#287;&#305;
	g&#252;n ALICI'ya otomatik olarak e-ar&#351;iv faturas&#305; kesilip,
	destekledi&#287;i bedel kar&#351;&#305;l&#305;&#287;&#305;nda
	F&#304;K&#304;R BAH&#199;IVANI'n&#305;n belirlemi&#351; oldu&#287;u 10 (on)
	TL nin &#252;zerindeki &#246;d&#252;ller i&#231;in &#246;d&#252;l teslim
	s&#252;reci ba&#351;lar, ancak 'E&#286;ER DESTEKLEM&#304;&#350;
	OLDU&#286;UM PROJE/LER HEDEF TUTARA VEYA HEDEF TUTARIN %75'&#304;NE
	ULA&#350;MAZSA, ALMI&#350; OLDU&#286;UM MATERYELLER SAKSIMA GER&#304;
	G&#304;TS&#304;N' kutucu&#287;unu i&#351;aretlerse, projenin olumsuz
	sonu&#231;land&#305;&#287;&#305; g&#252;n ALICI'n&#305;n
	saks&#305;s&#305;na alm&#305;&#351; oldu&#287;u materyaller aynen iade
	edilir ve 1 (bir) y&#305;l boyunca kullanmas&#305; i&#231;in beklenir. 1
	(bir) y&#305;l&#305;n sonunda kullan&#305;lmayan materyallerin maddi
	kar&#351;&#305;l&#305;&#287;&#305;, o esnada platform da bulunan sosyal
	sorumluluk projelerine e&#351;it miktarda
	da&#287;&#305;t&#305;lacakt&#305;r ayr&#305;ca ki&#351;inin ismi o
	projelerde destek&#231;i olarak ge&#231;ecek ve e&#287;er
	kar&#351;&#305;l&#305;&#287;&#305;nda belirlenmi&#351; &#246;d&#252;l
	kazan&#305;lm&#305;&#351;sa proje sahipleri taraf&#305;ndan kendisine
	&#246;d&#252;lleri yollanacakt&#305;r.'' Ko&#351;ulu sakl&#305; olmak
	kayd&#305;yla,
</p>
<p>
	1. Fiyat&#305; finansal piyasalardaki dalgalanmalara ba&#287;l&#305; olarak
	de&#287;i&#351;en ve SATICI'n&#305;n kontrolu&#776;nde olmayan mal veya
	hizmetlere ili&#351;kin s&#246;zle&#351;melerde (&#246;rn. ziynet,
	alt&#305;n ve g&#252;m&#252;&#351; kategorisindeki &#252;r&#252;nler)&#894;
</p>
<p>
	2. ALICI'n&#305;n istekleri veya a&#231;&#305;k&#231;a onun ki&#351;isel
	ihtiya&#231;lar&#305; do&#287;rultusunda haz&#305;rlanan, niteli&#287;i
	itibariyle geri g&#246;nderilmeye elveri&#351;li olmayan ve &#231;abuk
	bozulma tehlikesi olan veya son kullanma tarihi ge&#231;me ihtimali olan
	mallar&#305;n teslimine ili&#351;kin s&#246;zle&#351;melerde&#894;
</p>
<p>
	3. Tesliminden sonra ambalaj, bant, m&#252;h&#252;r, paket gibi koruyucu
	unsurlar&#305; a&#231;&#305;lm&#305;&#351; olan mallardan&#894; iadesi
	sa&#287;l&#305;k ve hijyen a&#231;&#305;s&#305;ndan uygun olmayanlar&#305;n
	teslimine ili&#351;kin s&#246;zle&#351;melerde&#894;
</p>
<p>
	4. Tesliminden sonra ba&#351;ka &#252;r&#252;nlerle kar&#305;&#351;an ve
	do&#287;as&#305; gere&#287;i ayr&#305;&#351;t&#305;r&#305;lmas&#305;
	m&#252;mk&#252;n olmayan mallara ili&#351;kin s&#246;zle&#351;melerde&#894;
</p>
<p>
	5. ALICI taraf&#305;ndan ambalaj, bant, m&#252;h&#252;r, paket gibi
	koruyucu unsurlar&#305; a&#231;&#305;lm&#305;&#351; olmas&#305;
	&#351;art&#305;yla maddi ortamda sunulan kitap, ses veya
	g&#246;r&#252;nt&#252; kay&#305;tlar&#305;na, yaz&#305;l&#305;m
	programlar&#305;na ve bilgisayar sarf malzemelerine ili&#351;kin
	s&#246;zle&#351;melerde&#894;
</p>
<p>
	6. Abonelik s&#246;zle&#351;mesi kapsam&#305;nda sa&#287;lananlar
	d&#305;&#351;&#305;nda gazete, dergi gibi s&#252;reli yay&#305;nlar&#305;n
	teslimine ili&#351;kin s&#246;zle&#351;melerde&#894;
</p>
<p>
	7. Belirli bir tarihte veya d&#246;nemde yap&#305;lmas&#305; gereken,
	konaklama, e&#351;ya ta&#351;&#305;ma, araba kiralama, yiyecek i&#231;ecek
	tedariki ve e&#287;lence veya dinlenme amac&#305;yla yap&#305;lan bo&#351;
	zaman&#305;n de&#287;erlendirilmesine ili&#351;kin
	s&#246;zle&#351;melerde&#894;
</p>
<p>
	8. Yar&#305;&#351;ma ve &#231;ekili&#351;lere ili&#351;kin hizmetlerin
	ifas&#305;na ili&#351;kin s&#246;zle&#351;melerde&#894;
</p>
<p>
	9. Cayma hakk&#305; s&#252;resi sona ermeden &#246;nce, t&#252;keticinin
	onay&#305; ile ifas&#305;na ba&#351;lanan hizmetlere ili&#351;kin
	s&#246;zle&#351;melerde&#894; ve Elektronik ortamda an&#305;nda ifa edilen
	hizmetler ile tu&#776;keticiye an&#305;nda teslim edilen gayri maddi
	mallara ili&#351;kin s&#246;zle&#351;melerde (hediye kart&#305;, hediye
	&#231;eki, para yerine ge&#231;en kupon ve benzeri)
</p>
<p>
	Mesafeli S&#246;zle&#351;meler Y&#246;netmeli&#287;i'nin kapsam&#305;
	d&#305;&#351;&#305;nda b&#305;rak&#305;lm&#305;&#351; olan mal veya
	hizmetler (SATICI'n&#305;n d&#252;zenli teslimatlar&#305; ile
	ALICI'n&#305;n meskenine teslim edilen g&#305;da maddelerinin,
	i&#231;eceklerin ya da di&#287;er g&#252;nl&#252;k t&#252;ketim maddeleri
	ile seyahat, konaklama, lokantac&#305;l&#305;k, e&#287;lence
	sekt&#246;r&#252; gibi alanlarda hizmetler) bak&#305;m&#305;ndan cayma
	hakk&#305; kullan&#305;lamayacakt&#305;r.
</p>
<p>
	Tatil kategorisinde sat&#305;&#351;a sunulan bu t&#252;r mal ve hizmetlerin
	iptal ve iade &#351;artlar&#305; SATICI'n&#305;n uygulama ve
	kurallar&#305;na tabidir.
</p>
<p>
	<strong>MADDE 12: UYU&#350;MAZLIKLARIN &#199;&#214;Z&#220;M&#220;</strong>
</p>
<p>
	Kanun ve Y&#246;netmelik kapsam&#305;nda sat&#305;lan mal veya hizmete
	ili&#351;kin sorumluluk bizzat SATICI'ya aittir. Bununla birlikte ALICI,
	sat&#305;n ald&#305;&#287;&#305; mal ve hizmetlerle ilgili
	&#351;ik&#226;yetlerini ''E&#287;er ALICI'n&#305;n alm&#305;&#351;
	oldu&#287;u sanal i&#231;erik kar&#351;&#305;l&#305;&#287;&#305; olan
	&#252;r&#252;n 10 (on) TL nin &#252;zerinde olursa fiziki sevkiyat
	ge&#231;erlidir. E&#287;er ALICI'n&#305;n alm&#305;&#351; oldu&#287;u sanal
	i&#231;erik kar&#351;&#305;l&#305;&#287;&#305; olan &#252;r&#252;n 10 (on)
	TL nin alt&#305;nda olursa herhangi bir fiziki sevkiyat ge&#231;erli olmaz,
	yaln&#305;zca kendisinin belirlemi&#351; oldu&#287;u e-mail adresine
'TE&#350;EKK&#220;R E-MA&#304;L&#304;' veya "	<a href="http://www.fikirbahcivani.com">www.fikirbahcivani.com</a><u>"</u>
	web adresinde yaz&#305;l&#305; olan 'S&#304;Z&#304;NLE B&#304;R
	K&#304;&#350;&#304; DAHA G&#220;&#199;L&#220;Y&#220;Z B&#304;Z&#304;
	DESTEKLED&#304;&#286;&#304;N&#304;Z &#304;&#199;&#304;N TE&#350;EKK&#220;R
	EDER&#304;Z' s&#246;zc&#252;&#287;&#252; ge&#231;erli olacakt&#305;r.
	Ayr&#305;ca ALICI, platformu veya platformda yay&#305;nlanan projelerden
	herhangi birini &#246;d&#252;l kar&#351;&#305;l&#305;&#287;&#305;nda
	desteklemek i&#231;in, sat&#305;n ald&#305;&#287;&#305; hi&#231;bir sanal
	i&#231;eri&#287;in kar&#351;&#305;l&#305;&#287;&#305; olan paran&#305;n
	iadesini, sat&#305;n ald&#305;&#287;&#305; g&#252;nden itibaren en az 3
	(&#252;&#231;) ay i&#231;erisinde talep edemez. ALICI'n&#305;n &#246;deme
	sayfas&#305;ndaki se&#231;eneklerden 'E&#286;ER DESTEKLEM&#304;&#350;
	OLDU&#286;UM PROJE/LER HEDEF TUTARA VEYA HEDEF TUTARIN %75'&#304;NE
	ULA&#350;AMAZSA, ALMI&#350; OLDU&#286;UM MATERYELLER F&#304;K&#304;R
	BAH&#199;IVANI'NA DESTEK OLARAK G&#304;TS&#304;N' kutucu&#287;unu
	i&#351;aretlerse, projenin olumsuz sonu&#231;land&#305;&#287;&#305;
	g&#252;n ALICI'ya otomatik olarak e-ar&#351;iv faturas&#305; kesilip,
	destekledi&#287;i bedel kar&#351;&#305;l&#305;&#287;&#305;nda
	F&#304;K&#304;R BAH&#199;IVANI'n&#305;n belirlemi&#351; oldu&#287;u 10 (on)
	TL nin &#252;zerindeki &#246;d&#252;ller i&#231;in &#246;d&#252;l teslim
	s&#252;reci ba&#351;lar, ancak 'E&#286;ER DESTEKLEM&#304;&#350;
	OLDU&#286;UM PROJE/LER HEDEF TUTARA VEYA HEDEF TUTARIN %75'&#304;NE
	ULA&#350;MAZSA, ALMI&#350; OLDU&#286;UM MATERYELLER SAKSIMA GER&#304;
	G&#304;TS&#304;N' kutucu&#287;unu i&#351;aretlerse, projenin olumsuz
	sonu&#231;land&#305;&#287;&#305; g&#252;n ALICI'n&#305;n
	saks&#305;s&#305;na alm&#305;&#351; oldu&#287;u materyaller aynen iade
	edilir ve 1 (bir) y&#305;l boyunca kullanmas&#305; i&#231;in beklenir. 1
	(bir) y&#305;l&#305;n sonunda kullan&#305;lmayan materyallerin maddi
	kar&#351;&#305;l&#305;&#287;&#305;, o esnada platform da bulunan sosyal
	sorumluluk projelerine e&#351;it miktarda
	da&#287;&#305;t&#305;lacakt&#305;r ayr&#305;ca ki&#351;inin ismi o
	projelerde destek&#231;i olarak ge&#231;ecek ve e&#287;er
	kar&#351;&#305;l&#305;&#287;&#305;nda belirlenmi&#351; &#246;d&#252;l
	kazan&#305;lm&#305;&#351;sa proje sahipleri taraf&#305;ndan kendisine
	&#246;d&#252;lleri yollanacakt&#305;r.'' ''E&#287;er ALICI'n&#305;n
	alm&#305;&#351; oldu&#287;u sanal i&#231;erik
	kar&#351;&#305;l&#305;&#287;&#305; olan &#252;r&#252;n 10 (on) TL nin
	&#252;zerinde olursa fiziki sevkiyat ge&#231;erlidir. E&#287;er
	ALICI'n&#305;n alm&#305;&#351; oldu&#287;u sanal i&#231;erik
	kar&#351;&#305;l&#305;&#287;&#305; olan &#252;r&#252;n 10 (on) TL nin
	alt&#305;nda olursa herhangi bir fiziki sevkiyat ge&#231;erli olmaz,
	yaln&#305;zca kendisinin belirlemi&#351; oldu&#287;u e-mail adresine
'TE&#350;EKK&#220;R E-MA&#304;L&#304;' veya "	<a href="http://www.fikirbahcivani.com">www.fikirbahcivani.com</a><u>"</u>
	web adresinde yaz&#305;l&#305; olan 'S&#304;Z&#304;NLE B&#304;R
	K&#304;&#350;&#304; DAHA G&#220;&#199;L&#220;Y&#220;Z B&#304;Z&#304;
	DESTEKLED&#304;&#286;&#304;N&#304;Z &#304;&#199;&#304;N TE&#350;EKK&#220;R
	EDER&#304;Z' s&#246;zc&#252;&#287;&#252; ge&#231;erli olacakt&#305;r.
	Ayr&#305;ca ALICI, platformu veya platformda yay&#305;nlanan projelerden
	herhangi birini &#246;d&#252;l kar&#351;&#305;l&#305;&#287;&#305;nda
	desteklemek i&#231;in, sat&#305;n ald&#305;&#287;&#305; hi&#231;bir sanal
	i&#231;eri&#287;in kar&#351;&#305;l&#305;&#287;&#305; olan paran&#305;n
	iadesini, sat&#305;n ald&#305;&#287;&#305; g&#252;nden itibaren en az 3
	(&#252;&#231;) ay i&#231;erisinde talep edemez. ALICI'n&#305;n &#246;deme
	sayfas&#305;ndaki se&#231;eneklerden 'E&#286;ER DESTEKLEM&#304;&#350;
	OLDU&#286;UM PROJE/LER HEDEF TUTARA VEYA HEDEF TUTARIN %75'&#304;NE
	ULA&#350;AMAZSA, ALMI&#350; OLDU&#286;UM MATERYELLER F&#304;K&#304;R
	BAH&#199;IVANI'NA DESTEK OLARAK G&#304;TS&#304;N' kutucu&#287;unu
	i&#351;aretlerse, projenin olumsuz sonu&#231;land&#305;&#287;&#305;
	g&#252;n ALICI'ya otomatik olarak e-ar&#351;iv faturas&#305; kesilip,
	destekledi&#287;i bedel kar&#351;&#305;l&#305;&#287;&#305;nda
	F&#304;K&#304;R BAH&#199;IVANI'n&#305;n belirlemi&#351; oldu&#287;u 10 (on)
	TL nin &#252;zerindeki &#246;d&#252;ller i&#231;in &#246;d&#252;l teslim
	s&#252;reci ba&#351;lar, ancak 'E&#286;ER DESTEKLEM&#304;&#350;
	OLDU&#286;UM PROJE/LER HEDEF TUTARA VEYA HEDEF TUTARIN %75'&#304;NE
	ULA&#350;MAZSA, ALMI&#350; OLDU&#286;UM MATERYELLER SAKSIMA GER&#304;
	G&#304;TS&#304;N' kutucu&#287;unu i&#351;aretlerse, projenin olumsuz
	sonu&#231;land&#305;&#287;&#305; g&#252;n ALICI'n&#305;n
	saks&#305;s&#305;na alm&#305;&#351; oldu&#287;u materyaller aynen iade
	edilir ve 1 (bir) y&#305;l boyunca kullanmas&#305; i&#231;in beklenir. 1
	(bir) y&#305;l&#305;n sonunda kullan&#305;lmayan materyallerin maddi
	kar&#351;&#305;l&#305;&#287;&#305;, o esnada platform da bulunan sosyal
	sorumluluk projelerine e&#351;it miktarda
	da&#287;&#305;t&#305;lacakt&#305;r ayr&#305;ca ki&#351;inin ismi o
	projelerde destek&#231;i olarak ge&#231;ecek ve e&#287;er
	kar&#351;&#305;l&#305;&#287;&#305;nda belirlenmi&#351; &#246;d&#252;l
	kazan&#305;lm&#305;&#351;sa proje sahipleri taraf&#305;ndan kendisine
	&#246;d&#252;lleri yollanacakt&#305;r.'' SATICI'ya Platform &#252;zerinden
	iletebileceklerdir.
</p>
<p>
	<u>
		&#304;&#351;bu S&#246;zle&#351;me ile ilgili &#231;&#305;kacak
		ihtilaflarda&#894; her y&#305;l Ticaret Bakanl&#305;&#287;&#305;
		taraf&#305;ndan ilan edilen de&#287;ere kadar ALICI'n&#305;n
		&#220;r&#252;n'&#252; sat&#305;n ald&#305;&#287;&#305; veya
		ikametg&#226;h&#305;n&#305;n bulundu&#287;u yerdeki &#304;l veya
		&#304;l&#231;e T&#252;ketici Sorunlar&#305; Hakem Heyetleri, s&#246;z
		konusu de&#287;erin &#252;zerindeki ihtilaflarda ise T&#252;ketici
		Mahkemeleri yetkilidir.
	</u>
</p>
<p>
	<strong>
		MADDE 13: TEMERR&#220;T HAL&#304; VE HUKUK&#304; SONU&#199;LARI
	</strong>
</p>
<p>
	ALICI'n&#305;n, kredi kart&#305; ile yapm&#305;&#351; oldu&#287;u
	i&#351;lemlerde temerr&#252;de d&#252;&#351;mesi halinde kart sahibi,
	bankan&#305;n kendisi ile yapm&#305;&#351; oldu&#287;u kredi kart&#305;
	s&#246;zle&#351;mesi &#231;er&#231;evesinde gecikme cezas&#305;
	&#246;deyecek ve bankaya kar&#351;&#305; sorumlu olacakt&#305;r. Bu durumda
	ilgili banka hukuki yollara ba&#351;vurabilir&#894; do&#287;acak
	masraflar&#305; ve vek&#226;let u&#776;cretini ALICI'dan talep edebilir ve
	her ko&#351;ulda ALICI'n&#305;n borcundan dolay&#305; temerr&#252;de
	d&#252;&#351;mesi halinde, ALICI'n&#305;n borcu gecikmeli ifas&#305;ndan
	dolay&#305; SATICI'n&#305;n u&#287;rad&#305;&#287;&#305; zarar ve ziyandan
	ALICI sorumlu olacakt&#305;r.
</p>
<p>
	<strong>
		MADDE 14: B&#304;LD&#304;R&#304;MLER VE DEL&#304;L
		S&#214;ZLE&#350;MES&#304;
	</strong>
</p>
<p>
	&#304;&#351;bu S&#246;zle&#351;me taht&#305;nda taraflar aras&#305;nda
	yap&#305;lacak her t&#252;rl&#252; yaz&#305;&#351;ma, mevzuatta
say&#305;lan zorunlu haller d&#305;&#351;&#305;nda, Platform'da yer alan "	<a href="mailto:destek@fikirbahcivani.com">destek@fikirbahcivani.com</a>''
</p>
<p>
	elektronik posta arac&#305;l&#305;&#287;&#305;yla yap&#305;lacakt&#305;r.
	ALICI, i&#351;bu S&#246;zle&#351;me'den do&#287;abilecek ihtilaflarda
	SATICI'n&#305;n ve F&#304;K&#304;R BAH&#199;IVANI'n&#305;n resmi defter ve
	ticari kay&#305;tlar&#305;yla, kendi veri taban&#305;nda,
	sunucular&#305;nda tuttu&#287;u elektronik bilgilerin ve bilgisayar
	kay&#305;tlar&#305;n&#305;n, ba&#287;lay&#305;c&#305;, kesin ve
	mu&#776;nhas&#305;r delil te&#351;kil edece&#287;ini, bu maddenin Hukuk
	Muhakemeleri Kanunu'nun 193. maddesi anlam&#305;nda delil
	s&#246;zle&#351;mesi niteli&#287;inde oldu&#287;unu kabul, beyan ve
	taahhu&#776;t eder.
</p>
<p>
	<strong>MADDE 15: Y&#220;R&#220;RL&#220;K</strong>
</p>
<p>
	15 (onbe&#351;) maddeden ibaret i&#351;bu S&#246;zle&#351;me, Taraflarca
	okunarak, <?echo (date("Y-m-d",time()));?>
	
</p>
<p>
	tarihinde, ALICI taraf&#305;ndan elektronik ortamda onaylanmak suretiyle
	akdedilmi&#351; ve y&#252;r&#252;rl&#252;&#287;e girmi&#351;tir.
</p>
<p>
    <div>
        <strong style="float:left;">
            SATICI
        </strong>
        <strong style="float:right;">
            ALICI
        </strong>
    </div>
</p>
<br><br><br><br>

    </body>
</html>