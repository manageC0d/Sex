<?php
// Htpps://Fb.Me/Bn2002.NNT
error_reporting(E_ALL);
@set_time_limit(0);
if(isset($_POST['app_token'],$_POST['username'],$_POST['password']))
{
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	if($_POST['app_token'] == 'iphone')
	{
		$token = json_decode(auto('https://xn--bt-5ja.vn/tienich/gettoken/iphone.php?u='.$username.'&p='.urlencode($password).''),true);  
				 if(isset($token['error_msg'])) 
				 {
					 $data = json_decode($token['error_data'], true);
					 $doanhdz['error_msg'] = $data['error_message'];
					 echo json_encode($doanhdz);
				 }   
						 else if(isset($token['access_token']))  
						 {
							$doanhdz['access_token'] = $token['access_token'];
							 Echo json_encode($doanhdz);		
						 }
	}
	else if($_POST['app_token'] == 'android')
    {
		$token = json_decode(auto('https://xn--bt-5ja.vn/tienich/gettoken/android.php?u='.$username.'&p='.urlencode($password).''),true);  
	             if(isset($token['error_msg'])) 
				 {
					 $data = json_decode($token['error_data'], true);
					 $doanhdz['error_msg'] = $data['error_message'];
					 echo json_encode($doanhdz);
				 }   
						else if(isset($token['access_token']))  
						 {
							$doanhdz['access_token'] = $token['access_token'];
							 Echo json_encode($doanhdz);		
						 }
	}
}
function auto($url){
   $curl = curl_init();
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_URL, $url);
   $ch = curl_exec($curl);
   curl_close($curl);
   return $ch;
   }

?>