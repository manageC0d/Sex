<?php
ob_start('ob_gzhandler');
include '../databasecsdl.php';
$laytoken = @mysqli_query($connection,"SELECT * FROM `Account` ORDER BY RAND() LIMIT 0,70");
while ($getpu = @mysqli_fetch_array($laytoken)){
$cookie= $getpu['cookie'];
$id_user= $getpu['user_id'];
$fb_dtsg= $getpu['fb_dtsg'];
$url = curl("https://m.facebook.com/",$cookie);
//echo $url;
//exit;
if(preg_match_all('#ft_ent_identifier=(.+?)&#is',$url, $_puaru))
{
	for($i =0; $i< count($_puaru[1]);$i++)
	{
        if(file_exists('log/'.$_puaru[1][$i].'_'.$id_user.'')){
       $chay = 1;
       }else{
            $f = fopen('log/'.$_puaru[1][$i].'_'.$id_user.'','w');
             fwrite($f,'');
             fclose($f);
        $chay = 0;
       }
if($chay == 0)
{    $noidung= $getpu['comments'];
		//echo $_puaru[1][$i].'<br>';
    echo post_data("https://m.facebook.com/ufi/reaction/?ft_ent_identifier=".$_puaru[1][$i]."&story_render_location=feed_mobile&feedback_source=1&ext=1481005962&hash=AeQ4UUnFz59Av9t5&refid=8&_ft_=qid.6359758912943651311%3Amf_story_key.-7381576517051739942%3Atop_level_post_id.1864991263733728&av=".$id_user."&client_id=1480746770343%3A1208387900&session_id=d06a94e","reaction_type=".$getpu['camxuc']."&ft_ent_identifier=".$_puaru[1][$i]."&m_sess=&fb_dtsg=".$fb_dtsg."&__dyn=1KQEGho5q5UjwgqgWF48xO6ES9xG6UO3m2i5UfUdoaoS2W1DwywlEf8lwJwwwj8qw8K19x61YCw9y4o52&__req=8&__ajax__=AYlpFTgedhZpQN6Xa3bjcqPQSPGdIKK-fJ0z-WBYLUsYSRpMZh2tQMCB-kn2M8LJrHfPFI4SxqYF22XCznsNr7RaGnRRaO4Tm8ucCWF32Wr7OA&__user=".$id_user,$cookie);
    if($getpu['battatcmt'] == '1')
    {
    post_data("https://m.facebook.com/a/comment.php?fs=8&fr=%2Fprofile.php&actionsource=13&comment_logging&ft_ent_identifier=".$_puaru[1][$i]."&gfid=AQDWVdFsGh2dPr2T&_ft_=top_level_post_id.".$_puaru[1][$i]."%3Atl_objid.".$_puaru[1][$i]."%3Athid.".$id_user."&av=".$id_user."&refid=52","fb_dtsg=".$fb_dtsg."&comment_text=".$noidung,$cookie);
    post_data("https://www.facebook.com/ajax/litestand/follow_post?dpr=1","message_id=".$_puaru[1][$i]."&follow=0&__user=".$id_user."&__a=1&__dyn=aKhoFeyfyGmaomgDxyG8EiolzkqbxqbAKGiBAyedirWo8ponUDAyoS2N6xaiaUnyUnx-2CEaUZ7yUJi2eq4EnSUWUPBKuEjKewzWxaFQEf-um4UpKq4G-FFUkgmVV8FfyEgAUlwQwzAyp9Voybx24oqyUf9VoGr_m5qQ4bBx-EqKKiagSEWdUgByECcyqKng&__af=m&__req=a2&__be=-1&__pc=PHASED%3ADEFAULT&__rev=2718923&fb_dtsg=".$fb_dtsg."&ttstamp=26581714811412077458774103102586581717510697116107548410984",$cookie);
    }
     }}
}
}










function curl($url,$cookie)
{
    $ch = @curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    $head[] = "Connection: keep-alive";
    $head[] = "Keep-Alive: 300";
    $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $head[] = "Accept-Language: en-us,en;q=0.5";
    curl_setopt($ch, CURLOPT_USERAGENT, 'Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14');
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Expect:'
    ));
    $page = curl_exec($ch);
    curl_close($ch);
    return $page;
} 
function post_data($site,$data,$cookie){
    $datapost = curl_init();
    $headers = array("Expect:");
    curl_setopt($datapost, CURLOPT_URL, $site);
    curl_setopt($datapost, CURLOPT_TIMEOUT, 40000);
    curl_setopt($datapost, CURLOPT_HEADER, TRUE);
    curl_setopt($datapost, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($datapost, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36');
    curl_setopt($datapost, CURLOPT_POST, TRUE);
    curl_setopt($datapost, CURLOPT_POSTFIELDS, $data);
    curl_setopt($datapost, CURLOPT_COOKIE,$cookie);
    ob_start();
    return curl_exec ($datapost);
    ob_end_clean();
    curl_close ($datapost);
    unset($datapost); 
}  
?>