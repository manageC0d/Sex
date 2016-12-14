<?php
	if (isset($_REQUEST['image_data'])){
		if (file_exists($_REQUEST['image_data'])){
			header('Content-Type: image/png');
			header('Content-Disposition: attachment; filename="'.basename($_REQUEST['image_data']).'"');
			header("Content-Transfer-Encoding: binary");
			header('Expires: 0');
			header('Pragma: no-cache');
			if (readfile($_REQUEST['image_data'])){
				unlink($_REQUEST['image_data']);
			}
		} else {
			echo 'File Not Found !';
		}
	} else {
		echo 'Opps ! Contact : BMN.2312@Gmail.Com';
	}
?>