<?php
#-----------------------------------------------------#
# BOT SIMSIMI REPLY COMMENT
# Author : Star Thiện (_Alone_Boy_)
# Date: 25/5/2016
# FB.COM/THIEN.IT.BKDN
# Vui Lòng Kính Trọng Người Làm Ra Nó. Không Nên Xóa Dòng Này
#-----------------------------------------------------#
set_time_limit(0);
require ('funcEmo.php');
require ('cnf_data.php');
$src = file_get_contents("log_token.log");
$src = explode('_', $src);
$iduser = $src[1]; // ID Người Sử Dụng Simsimi Cmt
$token = $src[0]; // Token Của Nick simsimi
$bieutuong =  $src[2];
$getID = json_decode(auto('https://graph.facebook.com/me?access_token='.$token.'&fields=id'),true);
if (!$getID[id]) 
{
	die("Token Die - Su Dung Token For iPhone De Bot Hoat Dong Lau Hon");
}
$getStt = json_decode(auto('https://graph.facebook.com/'.$iduser.'/feed?limit=1&access_token='.$token),true);
$log = json_encode(file('log.txt'));
for($i=1;$i<=count($getStt[data]);$i++)
{
	$getcmt = json_decode(auto('https://graph.facebook.com/'.$getStt[data][$i-1][id].'/comments?access_token='.$token.'&limit=1000&fields=id,from,message'),true);
	if(count($getcmt[data]) > 0)
	{
		for($c=1;$c<=count($getcmt[data]);$c++)
		{
			$log_f = explode($getcmt[data][$c-1][id],$log);
			if(count($log_f) > 1)
			{
				echo'Done! ';
			}
			else
			{
				$log_x = $getcmt[data][$c-1][id].'_';
				$log_y = fopen('log.txt','a');
				fwrite($log_y,$log_x);
				fclose($log_y);
				$cmt = trim($getcmt[data][$c-1][message]);
				$a = 'add'; // từ khóa để sim gửi kết bạn
				if(strpos($cmt, $a)===false)
				{
					$str = $getcmt[data][$c-1][from][name];
					$traloi = '#'.str_replace( ' ', '_', $str).': '; // tag
					$result = @mysql_query("SELECT * FROM sim ");
					if ($result) 
					{
						while ($row = @mysql_fetch_array($result)) 
						{
							if ($row['ask'] == $cmt) 
							{
								$traloi .= $row['ans'];
								$ok=1;
							}
						}
						if($ok !=1)
						{
							$data = file_get_contents('http://api.vina4u.pro/beta/api.php?text='.$cmt);
							$traloi .= str_replace(' ~','',$data);
						}
					}
					if($getcmt[data][$c-1][from][id] !== $getID[id]) 
					{
						if ($bieutuong==1) 
						{
							auto('https://graph.facebook.com/'.$getStt[data][$i-1][id].'/comments?access_token='.$token.'&message='.urlencode(Emo($traloi)).'&method=post');
						}
						else
						{
							auto('https://graph.facebook.com/'.$getStt[data][$i-1][id].'/comments?access_token='.$token.'&message='.urlencode($traloi).'&method=post');
						}
					}
				}
				else
				{
					if($getcmt[data][$c-1][from][id] !== $getID[id]) 
					{
						auto('https://graph.facebook.com/me/friends?uid='.$getcmt[data][$c-1][from][id].'&access_token='.$token.'&method=post');
						$str = $getcmt[data][$c-1][from][name];
						$traloi = '#'.str_replace( ' ', '_', $str).': ';
						$traloi .= 'Gửi Lời Mời Kết Bạn Rồi Nha :D';
						if ($bieutuong==1) 
						{
							auto('https://graph.facebook.com/'.$getStt[data][$i-1][id].'/comments?access_token='.$token.'&message='.urlencode(Emo($traloi)).'&method=post');
						}
						else
						{
							auto('https://graph.facebook.com/'.$getStt[data][$i-1][id].'/comments?access_token='.$token.'&message='.urlencode($traloi).'&method=post');
						}
					}
				} 
			}

		}
	}
}
