<?
date_default_timezone_set('Asia/Jakarta');
if ($_SERVER['SERVER_NAME']=="localhost"){
define("SETTING_TYPE", "production");   //setting type 'production' ==> for develop in localhost
}else{
define("SETTING_TYPE", "launching");   //setting type 'production' ==> for develop in localhost
}


if (SETTING_TYPE=="production"){
	define("DBHOST","localhost");
	define("DBNAME","lifespa_testing");
	define("DBUSER","root");
	define("DBPASS","rahasia@00");
	define("WEBROOT","http://lifespa.web.id:8089/");
}
else
{
	define("DBHOST","localhost");
	define("DBNAME","lifespa_ibm");
	define("DBUSER","root");
	define("DBPASS","rahasia@00");
	define("WEBROOT","http://lifespa.web.id:8089/");
}


	function statustrans($typetrans){
	if ($typetrans=="1"){
	$typetrans="New";
	}elseif($typetrans=="2"){
	$typetrans="Renewal";
	}else{
	$typetrans="Upgrade";
	}
	return $typetrans;
	}
	
	function cariselisihdari2typemember($typesebelumnya,$typemember,$outletid){
	$qtypeawal="select Periode from membertypes where OutletId='".$outletid."' and MemberTypeId='".$typesebelumnya."'";
	$rtypeawal=mysql_query($qtypeawal);
	$rowawal=mysql_fetch_array($rtypeawal);
	$nilai1=$rowawal["Periode"];
	
	$qtypeakhir="select Periode from membertypes where OutletId='".$outletid."' and MemberTypeId='".$typemember."'";
	$rtypeakhir=mysql_query($qtypeakhir);
	$rowakhir=mysql_fetch_array($rtypeakhir);
	$nilai2=$rowakhir["Periode"];
	
	$hasilnilai=$nilai2-$nilai1;
	return $hasilnilai;
	
	
	
	}
	
	
function post($post)
{
	return security($_POST[$post]);
}
function get($post)
{
	return security($_GET[$post]);
}

function request($post)
{
	return security($_REQUEST[$post]);
}
function security($text)
{
	return addslashes($text);
}



	$db_host=DBHOST;
	$db_name=DBNAME;
	$db_user=DBUSER;
	$db_pass=DBPASS;
	$link = mysql_connect($db_host, $db_user, $db_pass);
	if (!$link) {
		die('Could not connect Database : ' . mysql_error());
	}
	$db_selected = mysql_select_db($db_name, $link);
	if (!$db_selected) {
		die ('Database Error : ' . mysql_error());
	}
	
	


function urlseo($url){
	$urlvar=addslashes($url);
	$from = array(' ','/','+',':','*');
	return strtolower(str_replace($from,"-",$urlvar));

}

function backurl($url){
	$urlvar=addslashes($url);
	return ucfirst(str_replace('-',' ',$urlvar));

}

function summary($text,$length){
	preg_match('/^([^.!?\s]*[\.!?\s]+){0,'.$length.'}/', strip_tags($text), $abstract);
	return $abstract[0];

}

	   function is_valid_email($email) {
				  $result = TRUE;
				  if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)) {
					$result = FALSE;
				  }
				  return $result;
		}


	   function spamcheck($field){
  //filter_var() sanitizes the e-mail
  //address using FILTER_SANITIZE_EMAIL
  $field=filter_var($field, FILTER_SANITIZE_EMAIL);

  //filter_var() validates the e-mail
  //address using FILTER_VALIDATE_EMAIL
  if(filter_var($field, FILTER_VALIDATE_EMAIL)){
		return TRUE;
    }else{
		return FALSE;
    }
  }
  
  function EmailValidation($email) { 
    $email = htmlspecialchars(stripslashes(strip_tags($email))); //parse unnecessary characters to prevent exploits
    
    if ( eregi ( '[a-z||0-9]@[a-z||0-9].[a-z]', $email ) ) { //checks to make sure the email address is in a valid format
    $domain = explode( "@", $email ); //get the domain name
        
        if ( @fsockopen ($domain[1],80,$errno,$errstr,3)) {
            //if the connection can be established, the email address is probabley valid
            return true;
            /*
            
            GENERATE A VERIFICATION EMAIL
            
            */
            
        } else {
            return false; //if a connection cannot be established return false
        }
    
    } else {
        return false; //if email address is an invalid format return false
    }
}


 

 

				
function rupiah($uang)
{
$rupiah  = "";
$panjang = strlen($uang);

while ($panjang > 3){
$rupiah = "." . substr($uang, -3) . $rupiah;
$lebar = strlen($uang)-3;
$uang   = substr($uang,0,$lebar);
$panjang= strlen($uang);
}

$rupiah = "".$uang.$rupiah.",-";
return $rupiah;
}

	function checkpay($refnumber,$txid){
	$querypay="select * from bills where RefNumber='".$refnumber."' and TxId='".$txid."' and Active='1'";
	$resultpay=mysql_query($querypay);
	if (!mysql_num_rows($resultpay)){
		return FALSE;
	
	}else{
		return TRUE;
	}
	
	
	}
	
	function checkpaymembership($txid){
	$querypay="select * from bills_membership where TxId='".$txid."'";
	$resultpay=mysql_query($querypay);
	if (!mysql_num_rows($resultpay)){
		return FALSE;
	
	}else{
		return TRUE;
	}
	
	
	}
	
	function checkpaymembershipdp($txid,$billid){
	$querypay="select * from bills_membership_dp where TxId='".$txid."' and BillId='".$billid."'";
	$resultpay=mysql_query($querypay);
	if (!mysql_num_rows($resultpay)){
		return FALSE;
	
	}else{
		return TRUE;
	}
	
	
	}
	
	function checkdplunas($txid,$billid){
		$querycektotal="select sum(TotalAmount) as totalsemua from membershiptransactiondetails where TxId='".$txid."'";
		$resultcektotal=mysql_query($querycektotal);
		$rowtotal=mysql_fetch_array($resultcektotal);
		$totaltransaksi=$rowtotal["totalsemua"];
		
		$querycekpayment="select sum(HandsOnAmount-ReturnedAmount) as totalpayment from temppaymentmembership where TxId='".$txid."'";
		$resultcekpayment=mysql_query($querycekpayment);
		$rowpayment=mysql_fetch_array($resultcekpayment);
		$totalpayment=$rowpayment["totalpayment"];
		
		if (intval($totaltransaksi)==intval($totalpayment)){
			return TRUE;
		
		}else{
			return FALSE;
		}
		
	
	
	}
	
		function checkpaymf($txid){
	$querypaymf="select * from bills_managementfee where TxId='".$txid."'";
	$resultpaymf=mysql_query($querypaymf);
	if (!mysql_num_rows($resultpaymf)){
		return FALSE;
	
	}else{
		return TRUE;
	}
	
	
	}
	
	function checktransmembership($txid){
	$querytrans="select * from membershiptransactiondetails where TxId='".$txid."' and Active='1'";
	$resulttrans=mysql_query($querytrans);
	if (!mysql_num_rows($resulttrans)){
		return FALSE;
	}else{
		return TRUE;
	}
	
	
	}
	
	function checktx($refnumber,$txid){
		$querypay="select * from itemtransactions where RefNumber='".$refnumber."' and TxId='".$txid."'";
		$resultpay=mysql_query($querypay);
		if (!mysql_num_rows($resultpay)){
			return FALSE;
		
		}else{
			return TRUE;
		}	
	}
	
		function checktxlast($refnumber,$txid){
		$querypay="select * from itemtransactions where RefNumber='".$refnumber."' and TxId='".$txid."'";
		$resultpay=mysql_query($querypay);
		if (!mysql_num_rows($resultpay)){
			return FALSE;
		
		}else{
			return TRUE;
		}	
	}
	
		function checktxmembership($txid){
		$querypay="select * from membershiptransactions where TxId='".$txid."'";
		$resultpay=mysql_query($querypay);
		if (!mysql_num_rows($resultpay)){
			return FALSE;
		
		}else{
			return TRUE;
		}	
	}
	
		function checktxmanagementfee($txid){
		$querypay="select * from managementtransactions where TxId='".$txid."'";
		$resultpay=mysql_query($querypay);
		if (!mysql_num_rows($resultpay)){
			return FALSE;
		
		}else{
			return TRUE;
		}	
	}
	
	function checkspa($refnumber,$txid,$rowid){
	$queryspa="select * from itemtransactiondetails inner join items (itemtransactiondetails.ItemId=items.ItemId) where itemtransactiondetails.RefNumber='".$refnumber."' and itemtransactiondetails.TxId='".$txid."' and left(itemtransactiondetails.ItemId,3)='SPA' and itemtransactiondetails.RowId='".$rowid."'";
		$resultpay=mysql_query($querypay);
		if (!mysql_num_rows($resultpay)){
			return FALSE;
		
		}else{
			return TRUE;
		}	
	
	
	
	}
	
	function changeguestwithspa($refnumber,$txid){
	$tanggalsekarang=date("Y-m-d H:i:s");
	$inputby=$_SESSION["life_userid"];
		$querychange="select * from itemtransactiondetails where RefNumber='".$refnumber."' and TxId='".$txid."' and ItemId='O-W001'";
		$resultchange=mysql_query($querychange);
		if (mysql_num_rows($resultchange)){
		while($rowchange=mysql_fetch_array($resultchange)){
			
				$querychangeupdate="update `itemtransactiondetails` set `Active`='0',`LastUpdatedBy`='$inputby',`LastUpdatedAt`='$tanggalsekarang'  where `RefNumber`='".$rowchange["RefNumber"]."' and `RowId`='".$rowchange["RowId"]."'";
				$resultchangeupdate=mysql_query($querychangeupdate);
				if ($resultchangeupdate){
				$pesan= 'Void Walkin Fee';
				}
			
			
			
		
		
		
		}
		
		}
	return $pesan;
	}
	
	function checkclienttype($refnumber){
		$queryclienttype="select IsMember from Reservations where RefNumber='".$refnumber."'";
		$resultclientype=mysql_query($queryclienttype);
		$rowclient=mysql_fetch_array($resultclientype);
		return $rowclient["IsMember"];
	
	
	
	
	}
	
	function captureilegaluser($userid){
		$tanggalsekarang=date("Y-m-d H:i:s");
		$ip=$_SERVER["REMOTE_ADDR"];
		$url=$_SERVER['REQUEST_URI'];
		$querycapture="insert into `ilegal`(`RowId`,`IlegalDate`,`UserId`,`Url`,`Ip`) values ( NULL,'$tanggalsekarang','$userid','$url','$ip')";
		$resultcapture=mysql_query($querycapture);
		if ($resultcapture){
		return true;
		
		}else{
		return false;
		}
	
	
	}
	
	
?>
