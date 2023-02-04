<?php 
session_start();
include_once "../includes/setting.php";
if (!empty($_FILES)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	//$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
	$filename = $_SESSION["printcard_session"].date('Ymdhis') . '.jpg';
	if ($_SERVER['SERVER_NAME']=="localhost"){
	$targetPath ="../assets/member/";
	}else{
	$targetPath ="../../assets/member/";
	}
	//chmod($targetPath, 777); 
	$targetFile =  str_replace('//','/',$targetPath) .$filename;
	$targetFile1 =  str_replace('//','/',$targetPath) .'thumbmini-'. $filename;
	$targetFile2 =  str_replace('//','/',$targetPath) .'thumbbig-'. $filename;
	
	$tanggal=date("Y-m-d h:i");
	
	if (move_uploaded_file($tempFile, $targetFile)) {
		echo $filename;
	} else {
		echo $filename;
		
	}
	
	
			// *** Include the class
			include("resize-class.php");

			// *** 1) Initialise / load image
			$resizeObj = new resize($targetFile);

			// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
			$resizeObj -> resizeImage(100, 100, 'exact');

			// *** 3) Save image
			$resizeObj -> saveImage($targetFile1, 100);
			
			
				// *** 1) Initialise / load image
			$resizeObj2 = new resize($targetFile);

			// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
			$resizeObj2 -> resizeImage(240, 240, 'exact');

			// *** 3) Save image
			$resizeObj2 -> saveImage($targetFile2, 100);

		
			/*
			include_once "../class.image-resize.php";
			if (copy($_FILES['Filedata']['tmp_name'],$targetFile1) ) {
			
			$obj = new img_opt();
			$obj->max_width(100);
			$obj->max_height(100);
	
			$obj->image_path($targetFile1);
			$obj->image_resize();
			}
			
			if (copy($_FILES['Filedata']['tmp_name'],$targetFile2)){
		
				$objw = new img_opt();
			$objw->max_width(240);
			$objw->max_height(240);
	
			$objw->image_path($targetFile2);
			$objw->image_resize();
			
			
			}
			*/
			
			}
?>