<?php
	include 'config.php';
	$img = $_POST['data'];
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$file = $config['temp_dir'].md5(time()).'.png';
	if (file_put_contents($file, $data)){
		require "watermark.php";
		$wm = new watermark();
		$wm->setImage(array('file' => $file, 'quality' => 100));
		$wm->setWatermark(array('file' => $config['wtm_image'], 'position' => 'bottom right'));
		$wm->applyWatermark();
		$wm->generate($file);
	}
	$re['image'] = $_POST['data'];
	$re['file'] = $file;
	echo json_encode($re);
?>