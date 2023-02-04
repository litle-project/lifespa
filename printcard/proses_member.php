<?php
session_start();
include_once "includes/setting.php";

$action=$_REQUEST["action"];
$rowid=$_REQUEST["rowid"];
$outlet=$_POST["outlet"];
$typemember=$_POST["typemember"];
$typememberhidden=$_POST["typememberhidden"];
$typememberhiddenbefore=$_POST["typememberhiddenbefore"];
$entryfee=$_POST["entryfee"];
$annualfee=$_POST["annualfee"];
$memberid=strtoupper($_POST["memberid"]);
$memberidhidden=strtoupper($_POST["memberidhidden"]);
$membercard=strtoupper($_POST["membercard"]);
$membercardhidden=strtoupper($_POST["membercardhidden"]);
$endrolldate=date("Y-m-d",strtotime($_POST["endrolldate"]));
$expirydate=date("Y-m-d",strtotime($_POST["expirydate"]));
$renewaldate=date("Y-m-d",strtotime($_POST["renewaldate"]));
$firstname=$_POST["firstname"];
$middlename=$_POST["middlename"];
$lastname=$_POST["lastname"];
$nickname=$_POST["nickname"];
$prefix=$_POST["prefix"];
$title=$_POST["title"];
$birthdate=$_POST["birthdate"];
$sex=$_POST["sex"];
$religion=$_POST["religion"];
$hoby=$_POST["hoby"];
$address1=$_POST["address1"];
$address2=$_POST["address2"];
$city=$_POST["city"];
$region=$_POST["region"];
$postalcode=$_POST["postalcode"];
$phone=$_POST["phone"];
$hp1=$_POST["hp1"];
$hp2=$_POST["hp2"];
$fax=$_POST["fax"];
$email=$_POST["email"];
$url=$_POST["url"];
$remark=$_POST["remark"];
$statusrecord=$_POST["statusrecord"];
$statusaktif=$_POST["statusaktif"];
$uploadifyname=$_FILES['uploadify']['name'];
$filehidden=$_POST["filehidden"];
$lastnumberhidden=$_POST["lastnumberhidden"];



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
								
		function checkId($memberid){
			$querycheckid="select MemberId from members where MemberId='".$memberid."'";
			$resultcheckid=mysql_query($querycheckid);
			$totalcheckid=mysql_num_rows($resultcheckid);
			if ($totalcheckid==0){
				return TRUE;
			}else{
				return FALSE;
			}	
		}
		
			function checkcard($membercard){
			$querycheckcard="select MemberId from members where RefMemberId='".$membercard."'";
			$resultcheckcard=mysql_query($querycheckcard);
			$totalcheckcard=mysql_num_rows($resultcheckcard);
			if ($totalcheckcard==0){
				return TRUE;
			}else{
				return FALSE;
			}	
			}	
								
	if ($action=="submit" and trim($typememberhidden) == '') {
		$error[] = '- Type Member must fill';
	}
	
		if ($action=="update" and trim($typemember) == '') {
		$error[] = '- Type Member must fill';
	}


		if (trim($memberid) == '') {
		$error[] = '- MemberID must fill';
		}
		
			if (trim($hp1) == '') {
		$error[] = '- Handphone Number must fill';
		}
		
		//	if (trim($birthdate) == '') {
		//$error[] = '- Birthdate must fill';
		//}
	
	if ($action=="submit" and $memberid<>''){
		if (checkId($memberid) == FALSE) {
			$error[] = '- Member Id Already Exist';
		}
	}elseif($action=="update" and $memberid<>$memberidhidden){
		if (checkId($memberid) == FALSE) {
			$error[] = '- Member Id Already Exist';
		}
	
	}
	
	if ($action=="submit" and $membercard<>''){
		if (checkcard($membercard) == FALSE) {
			$error[] = '- Member Card Already Exist';
		}
	}elseif($action=="update" and $membercard<>$membercardhidden){
		if (checkcard($membercard) == FALSE) {
			$error[] = '- Member Card Already Exist';
		}
	
	}

	if (trim($entryfee) == '') {
		$error[] = '- Entryfee must fill';
	}

	if (trim($annualfee) == '') {
		$error[] = '- Annualfee must fill';
	}



	if (trim($expirydate) == '') {
		$error[] = '- Expirydate must fill';
	}

	if (trim($firstname) == '') {
		$error[] = '- Firstname must fill';
	}
/*
	if (trim($prefix) == '') {
		$error[] = '- Prefix must fill';
	}

	if (trim($sex) == '') {
		$error[] = '- Sex must fill';
	}

	*/
	//if (trim($religion) == '') {
	//	$error[] = '- Religion must fill';
	//}

	if (trim($address1) == '') {
		$error[] = '- Address must fill';
	}

	//if (trim($city) == '') {
	//	$error[] = '- City must fill';
	//}

	//if (checkEmail($email)==FALSE) {
	//	$error[] = '- Email not valid';
	//}
	
	$lifeuserid=$_SESSION["printcard_userid"];
									
	$lifeusername=$_SESSION["printcard_username"];
	

	$lifelastupdate=date("Y-m-d H:i:s");
									
									
if ($action=="submit"){
	




	//dan seterusnya
	 
	if ($error) {

		echo '<b>Error</b>: <br />'.implode('<br /><img src="images/cancel.png" align="center">', $error);

	} else {

							
								$tanggalsekarang=date("Y-m-d H:i:s");
								$inputby=$_SESSION["life_userid"];
								$photo=strtolower($filehidden);
								$memberidbaru=$memberid;
								$queryinsert="insert into `members`(`RowId`,`MemberId`,`OutletId`,`RefMemberId`,`MemberTypeId`,`EnrollDate`,`ExpiredDate`,`BirthDate`,`RenewalDate`,`FirstName`,`MiddleName`,`LastName`,`NickName`,`Photo`,`Prefix`,`Title`,`Sex`,`ReligionId`,`Hobby`,`AddressLine1`,`AddressLine2`,`City`,`Region`,`PostalCode`,`Phone`,`MobilePhone1`,`MobilePhone2`,`Fax`,`Email`,`Url`,`Remark`,`Status`,`Active`,`LastUpdatedBy`,`LastUpdatedAt`,`CreatedBy`,`CreatedAt`,`EntryFee`,`AnnualFee`) 
								values                              ( NULL,'$memberidbaru','$outlet','$membercard', '$typememberhidden','$tanggalsekarang','$expirydate','$birthdate',NULL       ,'$firstname','$middlename','$lastname','$nickname','$photo','$prefix','$title','$sex','$religion','$hoby','$address1','$address2','$city','$region','$postalcode','$phone','$hp1','$hp2','$fax','$email','$url','$remark','$statusaktif','$statusrecord','$inputby','$tanggalsekarang','$inputby','$tanggalsekarang','$entryfee','$annualfee')";
								$resultinsert=mysql_query($queryinsert);
								if ($resultinsert){
								$updateref="update `memberref` set `Active`='1' where `Active`='0' and `Status`='0' and `RefMemberId`='$memberidbaru'";
								$resultupdate=mysql_query($updateref);
								
								if ($typememberhidden<>''){
								$queryupdate1=" update `membertypes` set `LastNumber`=`LastNumber`+1 where `MemberTypeId`='$typememberhidden' and `OutletId`='".$_SESSION["life_outletid"]."'";
								$resultupdate1=mysql_query($queryupdate1);
								
								
								
								}
								$messageresult=" <img src='images/check.png' align='left'>Data successfully added into database!.Thanks<br/><br/><a href='index.php?page=membership_transaction_function&typetrans=1&action=add&addauto=1&memberid=".$memberidbaru."&lastexpired=".$expirydate."'><button id='nextpayment'> Next To Payment New Member Registration &nbsp;&raquo;&raquo;</button></a>";
								?>
								<script type="text/javascript">
								
								$('input,select,textarea').attr('disabled','disabled');
								$('.skinned-select').css('background-color','#efefef');
								
								
								</script>
								<?
								}else{
								$messageresult=" Failed to Added into database".mysql_error();
								}
								
									
		/*
		jika data mau dimasukkan ke database,
		maka perintah SQL INSERT bisa ditulis di sini
		*/
	 
		echo '<b>'.$messageresult.'</b>';
		echo '<br />';
		//foreach ($_POST as $k => $v) {
		//	$data .= "$k : $v<br />";
		//}
		//echo $data;
	}
	die();
	
}elseif ($action=="delete"){
							$querydelete="update `members` set `Active`='0',`LastUpdatedBy`='$lifeuserid',`LastUpdatedAt`='$lifelastupdate' where `RowId`='".$rowid."'";
							$resultdelete=mysql_query($querydelete);
							if ($resultdelete){
								echo 'Succesfull Delete..........';
							}else{
								echo 'Failed Delete..........';
							}



}elseif ($action=="activate"){
							$querydelete="update `members` set `Active`='1',`LastUpdatedBy`='$lifeuserid',`LastUpdatedAt`='$lifelastupdate' where `RowId`='".$rowid."'";
							$resultdelete=mysql_query($querydelete);
							if ($resultdelete){
								echo 'Succesfull Activation';
							}else{
								echo 'Failed Activation..........';
							}



}elseif ($action=="update"){

	if ($error) {

		echo '<b>Error</b>: <br />'.implode('<br /><img src="images/cancel.png" align="center">', $error);

	} else {
	
							
										
							$queryupdate="update `members` set `MemberId`='$memberid',`OutletId`='$outlet',`RefMemberId`='$membercard',`MemberTypeId`='$typememberhidden',`EnrollDate`='$endrolldate',`ExpiredDate`='$expirydate',`RenewalDate`='$renewaldate',`BirthDate`='$birthdate',`FirstName`='$firstname',`MiddleName`='$middlename',`LastName`='$lastname',`NickName`='$nickname',`Photo`='$filehidden',`Prefix`='$prefix',`Title`='$title',`Sex`='$sex',`ReligionId`='$religion',`Hobby`='$hoby',`AddressLine1`='$address1',`AddressLine2`='$address2',`City`='$city',`Region`='$region',`PostalCode`='$postalcode',`Phone`='$phone',`MobilePhone1`='$hp1',`MobilePhone2`='$hp2',`Fax`='$fax',`Email`='$email',`Url`='$url',`Remark`='$remark',`Status`='$statusaktif',`Active`='$statusrecord',`LastUpdatedBy`='$lifeuserid',`LastUpdatedAt`='$lifelastupdate',`EntryFee`='$entryfee',`AnnualFee`='$annualfee' where `RowId`='".$rowid."'";
							
							
							$resultupdate=mysql_query($queryupdate);
							
								
							
								
								
							
							if ($resultupdate){
							
								echo "<img src='images/check.png' align='left'>Update Successfull";
							?>
								<script type="text/javascript">
								$('input,select,textarea').attr('disabled','disabled');
								$('.submitcard').removeAttr('disabled');
								$('.skinned-select').css('background-color','#efefef');
								
								</script>
								<?
							}else{
							echo 'Failed Update'.mysql_error();
							}
		}
}
?>