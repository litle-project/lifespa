<?php
session_start();
include_once "../../includes/setting.php";
if (!empty($_FILES)) {
?>
<?
	$tempFile = $_FILES['Filedata']['tmp_name'];
	//$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
	$targetPath ="../assets/employee/";
	chmod($targetPath, 777); 
	$targetFile1 =  str_replace('//','/',$targetPath) .'thumbmini-'. $_FILES['Filedata']['name'];
	$targetFile2 =  str_replace('//','/',$targetPath) .'thumbbig-'. $_FILES['Filedata']['name'];
	$filename=$_FILES['Filedata']['name'];
	$tanggal=date("Y-m-d h:i");
	$teachername=$_SESSION['loginName'];

		if (move_uploaded_file($tempFile, $targetFile)) {
		echo "File is valid, and was successfully uploaded.\n";
	} else {
		echo "Possible file upload attack!\n";
		
	}
	
		include_once "../class.image-resize.php";
			if (copy($_FILES['Filedata']['tmp_name'],$targetFile1) ) {
			
			$obj = new img_opt();
			$obj->max_width(160);
	
			$obj->image_path($targetFile1);
			$obj->image_resize();
			
		
			
			
			//move_uploaded_file($tempFile,$targetFile);
			}
			
			if (move_uploaded_file($_FILES['Filedata']['tmp_name'],$targetFile2)){
		
				$objw = new img_opt();
			$objw->max_width(600);
	
			$objw->image_path($targetFile2);
			$objw->image_resize();
			
			
			}

	//$querysave="INSERT INTO `photo_group` (`idphotogroup`, `titlephoto`, `datephoto`, `filephoto`, `postby`, `idalbum`, `whileprocess`, `detail`, `location`) VALUES (NULL, NULL, '$tanggal', '$filename', 'Admin', '', '1', '', '')";
		//$queryinput="insert into `photo_group`(`idphotogroup`,`titlephoto`,`datephoto`,`filephoto`,`postby`,`location`,`whileprocess`) values ( NULL,NULL,'$tanggal','$filename','$teachername',NULL,'1')";
 	//	$resultinput=mysql_query($querysave);
	//	if (!$resultinput){
	//	echo 'Gagal '.mysql_error();
	//	}
		

}
?>