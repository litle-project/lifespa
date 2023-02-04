<?php
session_start();


include "includes/setting.php";
include "includes/cekhakakses.php";
$action=$_REQUEST["action"];
$rowid=$_REQUEST["rowid"];
$outlet=$_POST["outlet"];
$refmemberid=$_POST["refmemberid"];
$firstnameref=$_POST["firstnameref"];
$middlenameref=$_POST["middlenameref"];
$lastnameref=$_POST["lastnameref"];
$filehiddenref=$_POST["filehiddenref"];
$birthdateref=$_POST["birthdateref"];
$handphoneref=$_POST["handphoneref"];


 function checkEmail($email) {
								   if(eregi("^[a-zA-Z0-9_]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$]", $email)) 
								   {
									  return FALSE;
								   }

								   list($Username, $Domain) = split("@",$email);

								  
									  if (!$Domain){
									  return FALSE;
									  }
									  else{
									  //$cekemailactive=fsockopen($Domain, 25, $errno, $errstr, 30); 
									  //if(!$cekemailactive)
									  //{
									  //	 Echo "email anda salah ATAU TIDAK AKTIF ";
									  // return FALSE; 
									  //}
									  //else 
									  //{
										return TRUE;
									   }
								   
								}
								
		function checkId($refmemberid){
			$querycheckid="select MemberId from members where MemberId='".$refmemberid."'";
			$resultcheckid=mysql_query($querycheckid);
			$totalcheckid=mysql_num_rows($resultcheckid);
			if ($totalcheckid==0){
				return TRUE;
			}else{
				return FALSE;
			}	
		}
		
		
$queryceklastmemberid="select max(MemberIdRef) as lastmemberid,OutletIdRef from memberref where RefMemberId='".$refmemberid."' and Active='1' group by OutletIdRef";
$resultcekmemberid=mysql_query($queryceklastmemberid);



if(mysql_num_rows($resultcekmemberid)){



$rowmemberid=mysql_fetch_array($resultcekmemberid);
$lastmemberid=$rowmemberid["lastmemberid"];
$outletidref=$rowmemberid["OutletIdRef"];
$searchtext=" - ".$outletidref;
$panjanglastmemberid=strlen($lastmemberid);
$panjangchr=6;




$digit1=substr($lastmemberid,-7,1);
$digit2=substr($lastmemberid,-6,1);


function myGetType($var)
    {
        if (is_array($var)) return "array";
        if (is_bool($var)) return "boolean";
        if (is_float($var)) return "float";
        if (is_int($var)) return "integer";
        if (is_null($var)) return "NULL";
        if (is_numeric($var)) return "numeric";
        if (is_object($var)) return "object";
        if (is_resource($var)) return "resource";
        if (is_string($var)) return "string";
        return "unknown type";
    }
	
if ((myGetType($digit1)=="numeric") and (myGetType($digit2)=="string") and (ord($digit2)<90)){
	$chrdepan="";
	$karaktersebelumnya=$digit2;
}else{
	$chrdepan="A";
	$karaktersebelumnya=$digit2;
	$panjangchr=7;
}

$target=$panjanglastmemberid-$panjangchr;
$converttexttoval=ord($karaktersebelumnya);
if ($converttexttoval==90){
$converttexttoval=64;
$penambahanbaru=$converttexttoval+1;
}else{

$penambahanbaru=$converttexttoval+1;
}

$convert=$chrdepan.chr($penambahanbaru);


	$memberidrp=substr_replace($lastmemberid, $convert, $target);
	$newmemberid=$memberidrp.$searchtext;
}else{
	$lastid= substr($refmemberid, 0, -5); 
	$center=substr($refmemberid, -2); 
	$newmemberid=$lastid.'A'.' - '.$center;

}





								

		if ($action<>"updateref"){

			if (trim($refmemberid) == '') {
			$error[] = '- MemberID must fill';
			}
			
			if (trim($handphoneref) == '') {
			$error[] = '- Handphone Number must fill';
			}
			
			if (trim($firstnameref) == '') {
				$error[] = '- Firstnameref must fill';
			}

		}else{
		
			if (trim($filehiddenref) == '') {
			$error[] = '- Photo Not Found .Please Upload or Use Webcam';
			}
		
		
		}
	
	
	$lifeuserid=$_SESSION["life_userid"];
									
	$lifeusername=$_SESSION["life_username"];
	
	$lifeoutletid= $_SESSION["life_outletid"];
	$lifelastupdate=date("Y-m-d H:i:s");
									
									
if ($action=="submit"){
	//dan seterusnya
	if ($error) {

		echo '<b>Error</b>: <br />'.implode('<br /><img src="images/cancel.png" align="center">', $error);

	} else {

								$outlet=$_SESSION["life_outletid"];
								$tanggalsekarang=date("Y-m-d H:i:s");
								$inputby=$_SESSION["life_userid"];
								$photo=strtolower($filehidden);
								$statusrecord=1;
								$statusaktif=0;
								$queryinsert="insert into `memberref`(`RowId`,`RefMemberId`,`OutletIdRef`,`MemberIdRef`,`FirstNameRef`,`MiddleNameRef`,`LastNameRef`,`BirthDateRef`,`HandPhoneRef`,`Remark`,`Status`,`Active`,`LastUpdatedBy`,`LastUpdatedAt`,`CreatedBy`,`CreatedAt`) 
								values ( NULL,'$refmemberid','$outlet','$newmemberid','$firstnameref','$middlenameref','$lastnameref','$birthdateref','$handphoneref','$remark','$statusaktif','$statusrecord','$inputby','$tanggalsekarang','$inputby','$tanggalsekarang')";
								$resultinsert=mysql_query($queryinsert);
								if ($resultinsert){
								
							
								$messageresult="Data successfully added into database!.Thanks";
								?>
								<script type="text/javascript">
								
								$('.inputref').attr('value','');
								
								
								</script>
								<?
								}else{
								$messageresult=" Failed to Added into database".mysql_error();
								}
								
									
		/*
		jika data mau dimasukkan ke database,
		maka perintah SQL INSERT bisa ditulis di sini
		*/
	 
		echo $messageresult.'<br/>';
	
		//foreach ($_POST as $k => $v) {
		//	$data .= "$k : $v<br />";
		//}
		//echo $data;
	}
	die();
	
}elseif ($action=="submitedit"){
	//dan seterusnya
	if ($error) {

		echo '<b>Error</b>: <br />'.implode('<br /><img src="images/cancel.png" align="center">', $error);

	} else {

								$outlet=$_SESSION["life_outletid"];
								$tanggalsekarang=date("Y-m-d H:i:s");
								$inputby=$_SESSION["life_userid"];
								$photo=strtolower($filehidden);
								$statusrecord=1;
								$statusaktif=1;
								$queryinsert="insert into `memberref`(`RowId`,`RefMemberId`,`OutletIdRef`,`MemberIdRef`,`FirstNameRef`,`MiddleNameRef`,`LastNameRef`,`BirthDateRef`,`HandPhoneRef`,`Remark`,`Status`,`Active`,`LastUpdatedBy`,`LastUpdatedAt`,`CreatedBy`,`CreatedAt`) 
								values ( NULL,'$refmemberid','$outlet','$newmemberid','$firstnameref','$middlenameref','$lastnameref','$birthdateref','$handphoneref','$remark','$statusaktif','$statusrecord','$inputby','$tanggalsekarang','$inputby','$tanggalsekarang')";
								$resultinsert=mysql_query($queryinsert);
								if ($resultinsert){
								
							
								$messageresult="Data successfully added into database!.Thanks";
								?>
								<script type="text/javascript">
								
								$('.inputref').attr('value','');
								
								
								</script>
								<?
								}else{
								$messageresult=" Failed to Added into database".mysql_error();
								}
								
									
		/*
		jika data mau dimasukkan ke database,
		maka perintah SQL INSERT bisa ditulis di sini
		*/
	 
		echo $messageresult.'<br/>';
	
		//foreach ($_POST as $k => $v) {
		//	$data .= "$k : $v<br />";
		//}
		//echo $data;
	}
	die();
	
}elseif ($action=="delete"){
							$querydelete="update `memberref` set `Active`='0',`Status`=NULL,`LastUpdatedBy`='$lifeuserid',`LastUpdatedAt`='$lifelastupdate' where `RowId`='".$rowid."'";
							$resultdelete=mysql_query($querydelete);
							if ($resultdelete){
								echo 'Succesfull Delete..........';
							}else{
								echo 'Failed Delete..........';
							}



}elseif ($action=="updateref"){

	if ($error) {

		echo '<b>Error</b>: <br />'.implode('<br /><img src="images/cancel.png" align="center">', $error);

	} else {
	
							
										
							$queryupdate="update `memberref` set `Photo`='$filehiddenref',`LastUpdatedBy`='$lifeuserid',`LastUpdatedAt`='$lifelastupdate' where `RowId`='".$rowid."'";
							
							
							$resultupdate=mysql_query($queryupdate);
							
								
							
								
								
							
							if ($resultupdate){
								
							echo "Update Successfull";
							
							}else{
							echo 'Failed Update'.mysql_error();
							}
		}
}
?>