<?php
session_start();
include_once "../../includes/setting.php";
if (!empty($_FILES)) {
?>
<?
	$tempFile = $_FILES['Filedata']['tmp_name'];
	//$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
	$targetPath ="../../../assets/slideshow/";
	chmod($targetPath, 777); 
	$targetFile =  str_replace('//','/',$targetPath) . $_FILES['Filedata']['name'];
	$filename=$_FILES['Filedata']['name'];
	$tanggal=date("Y-m-d h:i");
	$teachername=$_SESSION['loginName'];
	// $fileTypes  = str_replace('*.','',$_REQUEST['fileext']);
	// $fileTypes  = str_replace(';','|',$fileTypes);
	// $typesArray = split('\|',$fileTypes);
	// $fileParts  = pathinfo($_FILES['Filedata']['name']);
	
	// if (in_array($fileParts['extension'],$typesArray)) {
		// Uncomment the following line if you want to make the directory if it doesn't exist
		// mkdir(str_replace('//','/',$targetPath), 0755, true);
		if (move_uploaded_file($tempFile, $targetFile)) {
		echo "File is valid, and was successfully uploaded.\n";
	} else {
		echo "Possible file upload attack!\n";
		
	}

	$querysave="INSERT INTO `photo_group` (`idphotogroup`, `titlephoto`, `datephoto`, `filephoto`, `postby`, `idalbum`, `whileprocess`, `detail`, `location`) VALUES (NULL, NULL, '$tanggal', '$filename', 'Admin', '', '1', '', '')";
		//$queryinput="insert into `photo_group`(`idphotogroup`,`titlephoto`,`datephoto`,`filephoto`,`postby`,`location`,`whileprocess`) values ( NULL,NULL,'$tanggal','$filename','$teachername',NULL,'1')";
 		$resultinput=mysql_query($querysave);
		if (!$resultinput){
		echo 'Gagal '.mysql_error();
		}
		

}
?>