<?php
if ($_POST) 
{
	require('cnf_data.php');
	if ($_POST['type'] == "day") 
	{
		$ask = $_POST['ask'];
		$ans = $_POST['ans'];
		if (!$ask) 
		{
			die("Bạn Đang Để Trống Câu Hỏi");
		}
		if (!$ans) 
		{
			die("Bạn Đang Để Trống Câu Trả Lời");
		}
		$result = @mysqli_query($connection,"SELECT * FROM Simi ");
		if ($result) 
		{
			while ($row = @mysqli_fetch_array($result)) 
			{
				if ($row['ask'] == $ask) 
				{
					die('Câu Hỏi Đã Có. Vui Lòng Hỏi Câu Khác');
				}
			}
			@mysqli_query($connection,"INSERT INTO Simi SET ask = '".addslashes($ask)."', ans = '".addslashes($ans)."'");
			die("Sim Đã Ghi Nhớ <br /> Hỏi: ".$ask." <br /> Đáp: ".$ans);
		}
	}
	else
	{
		$hoi = $_POST['hoi'];
		if (!$hoi) 
		{
			die("Bạn Chưa Nhập Câu Hỏi");
		}
		$result = @mysqli_query($connection,"SELECT * FROM sim ");
		if ($result) 
		{
			while ($row = @mysqli_fetch_array($result)) 
			{
				if ($row['ask'] == $hoi) 
				{
					die("<font color='#00FF00'>".$row['ans']."</font>");
					$ok =1;
				}
			}
		} 
		if ($ok !=1) 
		{
			$data = file_get_contents('http://api.vina4u.pro/beta/api.php?text='.$hoi);
			$data = str_replace(' ~','',$data);
		{	
			$check = mysqli_num_rows(mysqli_query($connection,"SELECT * from Simi WHERE `ask` = '".$hoi."' AND `ans` = '".$data."' "));
			if($check == "0")
		{
			mysqli_query($connection,
			"INSERT INTO
			Simi
			SET
			`ask` = '".addslashes($hoi)."',
			`ans` = '".addslashes($data)."',
			`by` = '".addslashes($by)."',
			`time` = '".date('H:i')."' ");
		}
		}
			die($data);
		}	
	}

}
else
{
	echo 'WELCOME TO VIETNAM';
}