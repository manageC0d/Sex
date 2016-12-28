<?php
error_reporting(E_ALL & ~ E_NOTICE); 
header('Origin: https://facebook.com');
define('API_SECRET', '62f8ce9f74b12f84c123cc23437a4a32');
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

$data = array(
	"api_key" => "882a8490361da98702bf97a021ddc14d",
	"email" => $email,
	"format" => "JSON",
	"locale" => "en_US",
	"method" => "auth.login",
	"password" => $pass,
	"return_ssl_resources" => "0",
	"v" => "1.0"
);
sign_creator($data);
echo '<a class="btn btn-primary" class="btn btn-sm btn-primary" target="_blank" href="https://api.facebook.com/restserver.php?'.http_build_query($data).'"><i class="fa fa-sign-in"></i> Get Token</a>';

?>