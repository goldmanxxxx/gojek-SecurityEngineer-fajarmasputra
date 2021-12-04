<?php

define('BOT_TOKEN', '5046315551:AAHacM7T4PQImM_t1qZyfzp0hP0ImEi7IeA');
define('CHAT_ID','582791660');
date_default_timezone_set('Australia/Melbourne');
$query_string=strval(getenv('QUERY_STRING'));
$http_user_agent=strval(getenv('HTTP_USER_AGENT'));
$HTTP_RAW_POST_DATA=strval(getenv('HTTP_RAW_POST_DATA'));
$HTTP_REFERER=strval(getenv('HTTP_REFERER'));
$HTTP_CLIENT_IP=strval(getenv('HTTP_CLIENT_IP')?:
getenv('HTTP_X_FORWARDED_FOR')?:
getenv('HTTP_X_FORWARDED')?:
getenv('HTTP_FORWARDED_FOR')?:
getenv('HTTP_FORWARDED')?:
getenv('REMOTE_ADDR'));
$HTTP_FORWARDER=strval(getenv('HTTP_X_FORWARDED_FOR'));
$now = new DateTime();
$datetime = strval($now->format('Y-m-d H:i:s'));    // MySQL datetime format

/* nama server kita */
$servername = "localhost";

/* nama database kita */
$database = "noob"; 

/* nama user yang terdaftar pada database (default: root) */
$username = "root";

/* password yang terdaftar pada database (default : "") */ 
$password = ""; 

/* membuat koneksi */
$conn = mysqli_connect($servername, $username, $password, $database);

/* mengecek koneksi */
if (!$conn) {
    die("Maaf koneksi anda gagal : " . mysqli_connect_error());
}else{
   //echo "<h1>Yes! Koneksi Berhasil..</h1>";

}
?>

<html>

	<form action="search.php" method="GET">
		<input type="text" name="q" />
		<input type="submit" value="Search" />
	</form>

<form action="index.php" method="post">
    <input type="text" name="username" placeholder="username">
    <input type="password" name="password" placeholder="password">
    <button type="submit" name="submit">Login</button>
    
</form>

<?php

$user   = $_POST['username'];
$pass   = $_POST['password'];

if (strpos($user,'//') !== false || strpos($user,'" OR 1 = 1 -- -') !== false || strpos($user,',') !== false || strpos($user,'<') !== false|| strpos($user,'""') !== false|| strpos($user,'` AND id IS NULL; --') !== false || strpos($user,'ORDER BY') !== false || strpos($user,'LIKE') !== false || strpos($user,'GROUP BY 1,2,--+') !== false || strpos($user,'--  ') !== false) {
    $attack="SQL Injection Payloads Detection";
    $msg ="Date:' '$datetime' 'Attack:' '$attack' '$query_string' '$http_user_agent' '$HTTP_RAW_POST_DATA' '$HTTP_REFERER' 'IP:' '$HTTP_CLIENT_IP' '$HTTP_FORWARDER'";
    //var_dump($msg);
    kirimTelegram($msg);
  }

$usercheck = mysqli_query($conn,"select * from users where username='$user' and password='$pass'");
//var_dump($usercheck);
$chek = mysqli_num_rows($usercheck);
if($chek>0)
{
    header("location:welcome.php");
   // echo("password benar");
}else
{
    //echo("password salah \n");
}



require_once("waf.php");
$sec = new SimpleWAF();
$sec->secureMe(true);

//var_dump($query_string);

function kirimTelegram($pesan) {
    $pesan = json_encode($pesan);
    $API = "https://api.telegram.org/bot".BOT_TOKEN."/sendmessage?chat_id=".CHAT_ID."&text=$pesan";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_URL, $API);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;

}
?>