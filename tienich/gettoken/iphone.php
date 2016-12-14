<?php
error_reporting(E_ALL & ~ E_NOTICE); 
header('Origin: https://facebook.com');
define('API_SECRET', 'c1e620fa708a1d5696fb991c1bde5662');
define('BASE_URL', 'https://api.facebook.com/restserver.php');

function sign_creator(&$data){
	$sig = "";
	foreach($data as $key => $value){
		$sig .= "$key=$value";
	}
	$sig .= API_SECRET;
	$sig = md5($sig);
	return $data['sig'] = $sig;
}
function auto($url){
   $curl = curl_init();
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_URL, $url);
   $ch = curl_exec($curl);
   curl_close($curl);
   return $ch;
   }

if(isset($_POST['u'], $_POST['p'])){
	$_GET = $_POST;
}

$data = array(
	"api_key" => "3e7c78e35a76a9299309885393b02d97",
	"email" => @$_GET['u'],
	"format" => "JSON",
	"locale" => "en_US",
	"method" => "auth.login",
	"password" => @$_GET['p'],
	"return_ssl_resources" => "0",
	"v" => "1.0"
);
sign_creator($data);
$response = auto('https://graph.facebook.com/restserver.php?api_key=3e7c78e35a76a9299309885393b02d97&email='.$_GET['u'].'&format=JSON&locale=en_US&method=auth.login&password='.$_GET['p'].'&return_ssl_resources=0&v=1.0&sig='.$data['sig'].'');
//echo $response;
exit($response);

?>