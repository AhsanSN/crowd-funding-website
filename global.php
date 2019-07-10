<?
ini_set('session.cookie_lifetime', 60 * 60 * 24 * 100);
ini_set('session.gc_maxlifetime', 60 * 60 * 24 * 100);
ini_set('session.save_path', '/tmp');

session_start();

//maybe you want to precise the save path as well
include_once("database.php");


//$session_userId = 1;

//maybe you want to precise the save path as well
//cheaking
if (isset($_SESSION['email'])&&isset($_SESSION['password']))
{
        $session_password = $_SESSION['password'];
        $session_userId = $_SESSION['userId'];
        $session_email =  $_SESSION['email'];
        $query = "SELECT *  FROM fik_users WHERE email='$session_email' AND password='$session_password'";
}
$result = $con->query($query);
if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()) 
    {
    $logged=1;
    $session_userId = $row['id'];
    $session_name = $row['name'];
    $session_image = $row['userImg'];
    $session_about = $row['about'];
    $session_AgreeOption = $row['AgreeOption'];
    
    $session_country = $row['country'];
    $session_state = $row['state'];
    $session_city = $row['city'];
    $session_streetAddress = $row['streetAddress'];
    $session_identityNumber = $row['identityNumber'];
    
    
    ?>
    <script>//console.log("$session_info<?echo $session_userId, $session_name, $session_email, $session_password ?>")</script>
    <?
    
    }
    
}
else
{
        $logged=0;
}


//for translation
if(isset($_GET['lang'])){
    $lang = $_GET['lang'];
    $_SESSION['language'] = $lang;
}

if(!isset($_SESSION['language'])){
    $_SESSION['language'] = 'TK';
}
$session_language = $_SESSION['language'];

function translate($english, $turkish){
    if($_SESSION['language']=="TK"){
        echo $turkish;
    }
    else{
        echo $english;
    }
}

function translateRet($english, $turkish){
    if($_SESSION['language']=="TK"){
        return $turkish;
    }
    else{
        return $english;
    }
}





if (!function_exists('mb_internal_encoding')) {
    function mb_internal_encoding($encoding = NULL) {
        return ($from_encoding === NULL) ? iconv_get_encoding() : iconv_set_encoding($encoding);
    }
}

if (!function_exists('mb_convert_encoding')) {
    function mb_convert_encoding($str, $to_encoding, $from_encoding = NULL) {
        return iconv(($from_encoding === NULL) ? mb_internal_encoding() : $from_encoding, $to_encoding, $str);
    }
}

if (!function_exists('mb_chr')) {
    function mb_chr($ord, $encoding = 'UTF-8') {
        if ($encoding === 'UCS-4BE') {
            return pack("N", $ord);
        } else {
            return mb_convert_encoding(mb_chr($ord, 'UCS-4BE'), $encoding, 'UCS-4BE');
        }
    }
}

if (!function_exists('mb_ord')) {
    function mb_ord($char, $encoding = 'UTF-8') {
        if ($encoding === 'UCS-4BE') {
            list(, $ord) = (strlen($char) === 4) ? @unpack('N', $char) : @unpack('n', $char);
            return $ord;
        } else {
            return mb_ord(mb_convert_encoding($char, 'UCS-4BE', $encoding), 'UCS-4BE');
        }
    }
}

if (!function_exists('mb_htmlentities')) {
    function mb_htmlentities($string, $hex = true, $encoding = 'UTF-8') {
        return preg_replace_callback('/[\x{80}-\x{10FFFF}]/u', function ($match) use ($hex) {
            return sprintf($hex ? '&#x%X;' : '&#%d;', mb_ord($match[0]));
        }, $string);
    }
}

if (!function_exists('mb_html_entity_decode')) {
    function mb_html_entity_decode($string, $flags = null, $encoding = 'UTF-8') {
        return html_entity_decode($string, ($flags === NULL) ? ENT_COMPAT | ENT_HTML401 : $flags, $encoding);
    }
}



?>


