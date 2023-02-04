<?php
session_start();
include_once "../../includes/setting.php";
/*
Uploadify v2.0.2
Release Date: July 29, 2009

Copyright (c) 2009 Ronnie Garcia, Travis Nickels

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/
if (!empty($_FILES)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$idalbum=$_REQUEST["idalbum"];
	//$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
	$targetPath ="../../../assets/slideshow/";
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
		
		move_uploaded_file($tempFile,$targetFile);
		echo "1";
		$queryinput="insert into `photo_group`(`idphotogroup`,`titlephoto`,`datephoto`,`filephoto`,`postby`,`idalbum`,`location`,`whileprocess`) values ( NULL,NULL,'$tanggal','$filename','$teachername','$idalbum',NULL,'1')";
      	$resultinput=mysql_query($queryinput);
		if (!$resultinput){
		echo 'Gagal '.mysql_error();
		
		}
		
	// } else {
	// 	echo 'Invalid file type.';
	// }
}
?>