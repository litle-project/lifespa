<?php
session_start();
include_once "../../includes/setting.php";
if (!empty($_FILES)) {
?>
<?
	$tempFile = $_FILES['Filedata']['tmp_name'];
	//$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
	$targetPath ="../assets/member/";
	$filename = $_SESSION["life_session"].date('Ymdhis') . '.jpg';
	chmod($targetPath, 777); 
	$targetFile =  str_replace('//','/',$targetPath) .$filename;
	$targetFile1 =  str_replace('//','/',$targetPath) .'thumbmini-'. $filename;
	$targetFile2 =  str_replace('//','/',$targetPath) .'thumbbig-'. $filename;

	$tanggal=date("Y-m-d h:i");
	$teachername=$_SESSION['loginName'];

		if (move_uploaded_file($tempFile, $targetFile)) {
		echo $filename;
	} else {
		echo $filename;
		
	}
	
	
	
	
			include("resize-class.php");
		//include_once "../class.image-resize.php";
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

	//$querysave="INSERT INTO `photo_group` (`idphotogroup`, `titlephoto`, `datephoto`, `filephoto`, `postby`, `idalbum`, `whileprocess`, `detail`, `location`) VALUES (NULL, NULL, '$tanggal', '$filename', 'Admin', '', '1', '', '')";
		//$queryinput="insert into `photo_group`(`idphotogroup`,`titlephoto`,`datephoto`,`filephoto`,`postby`,`location`,`whileprocess`) values ( NULL,NULL,'$tanggal','$filename','$teachername',NULL,'1')";
 	//	$resultinput=mysql_query($querysave);
	//	if (!$resultinput){
	//	echo 'Gagal '.mysql_error();
	//	}
		

}
?>