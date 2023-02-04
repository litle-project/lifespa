<?
session_start();
include "includes/cekhakakses.php";
if ($_SESSION["printcard_session"]<>''){
	function fileDelete($filepath,$filename) {
	$success = FALSE;
	if (file_exists($filepath.$filename)&&$filename!=""&&$filename!="n/a") {
		unlink ($filepath.$filename);
		$success = TRUE;
	}
	return $success;	
	}
	$fileimage=date("Ymd").".jpg";
	fileDelete("assets/member/",$_SESSION["printcard_session"].$fileimage);
}
?>