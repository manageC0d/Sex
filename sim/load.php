<?php

include '../databasecsdl.php';
if($hoi == 'sim học được gì rồi')
 {
$data = mysqli_query($connection,"SELECT * FROM Simi ");
$tong = mysqli_num_rows($data);

$dap = 'Em đã học được: '.$tong.' từ rồi ạ.
mọi người dạy em thêm đi';
 }
 else{
$data = mysqli_query($connection,"SELECT * FROM Simi WHERE `ask` ='".$hoi."' ");
$tong = mysqli_num_rows($data);
$dulieu = array();
$i = 0;
while ($load = mysqli_fetch_array($data))
{	
	$dulieu[$i] = $load[ans];
	$i++;
}

$random = rand(0,count($dulieu)-1);
$dap = $dulieu[$random];

//include '../search_arr/search.php';
 
if($i <1)
{
	$bot= json_decode(auto("http://api.simsimi.com/request.p?key=your_paid_key&lc=vn&ft=1.0&text=".urlencode($hoi)),true);
	$bot = $bot[response];
	
	//$dap = 'Câu này em chưa được chụy hiệp dạy! bạn dạy tui được hơm :). Trả lời láo thì là: '.$bot;
	$dap = $bot;
	
	//exit;
}
}
$response = $dap;//khoi tao sim cmt

function auto($url){
$data = curl_init();
curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($data, CURLOPT_URL, $url);
$hasil = curl_exec($data);
curl_close($data);
return $hasil;
}
?>