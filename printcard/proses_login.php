<?php
session_start();
include "includes/setting.php";
//validasi
$userid=strip_tags(trim(strtoupper($_POST['userid'])));
$password=strip_tags(trim(strtolower($_POST['password'])));

function checklogin($userid,$password){
 
   $querychecklogin="select * from printcard_user where PassWord='".sha1($password)."' and UserName='".$userid."' and Status='1'";



	
	$resultlogin=mysql_query($querychecklogin);
	$totallogin=mysql_num_rows($resultlogin);
	if (!$resultlogin){
		return FALSE;	
	}else{
		
		if ($totallogin==1){
			return TRUE;
		
		}else{
			return false;		
		}	
	}
	
}

			
if (trim($userid) == '') {
	$error[] = '- User Id must fill';
}

if (trim($password) == '') {
	$error[] = '- Password must fill';
}







//dan seterusnya
 
if ($error) {
	$messageresult='<span class="notification error"><b>Error</b>: '.implode('', $error).'</span>';
} else {
								if(checklogin($userid,$password) == FALSE) {								
									$messageresult='<span class="notification error">Error: Maaf UserId atau Password Salah silakan input lagi';									
								}else{ 
									$refurl=$_GET["refurl"];
									if ($refurl=="" or !$refurl){
									$fowardurl="index.php?page=home";
									}else{
									$fowardurl=$refurl;

										}
									$messageresult='<span class="notification success">Login Sucessful, please wait .....<img src="images/loading.gif"></span> ';	
									
									 $querychecklogin="select * from printcard_user where `PassWord`='".sha1($password)."' and `UserName`='".$userid."' and Status='1'";
									$resultlogin=mysql_query($querychecklogin);
									$rowlogin=mysql_fetch_array($resultlogin);
									 $_SESSION["printcard_idlogin"]=$rowlogin["RowId"];
									 $_SESSION["printcard_userid"]=$rowlogin["UserName"];
									 $_SESSION["printcard_session"]=session_id();
								
								
									 $tanggalsekarang=date("Y-m-d H:i:s");
									 $iplogin=$_SERVER["REMOTE_ADDR"];
									
									 $updatelogin="update `printcard_user` set `LastLoginAt`='".$tanggalsekarang."' where `RowId`='".$rowlogin["printcard_idlogin"]."'";
									 $resultlogin=mysql_query($updatelogin);
										
									?>
										<script type="text/javascript">
									
										function refreshindex(){
										parent.document.location='<?=$fowardurl;?>';
										return false;
										}
										
										 setTimeout("refreshindex();", 1000); 
										</script>
									
									<?
								} 
	
}
	echo '<b>'.$messageresult.'</b>';
	echo '<br />';
	


?>