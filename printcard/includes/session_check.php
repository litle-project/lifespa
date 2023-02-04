<?
/*
// set timeout period in seconds
$inactive = 900;

// check to see if $_SESSION['timeout'] is set
if(isset($_SESSION['timeout']) ) {
   $session_life = time() - $_SESSION['timeout'];
   if($session_life > $inactive)
        { 
      // go to login page when idle
      $tanggalsekarang=date("Y-m-d H:i:s");
	 $updatelogin="update `roleregistrations` set `LoggedOffAt`='".$tanggalsekarang."',`IsLoggedOn`='0' where `RowId`='".$_SESSION["life_idlogin"]."'";
	 $resultlogin=mysql_query($updatelogin);
	session_unregister("life_userid");
	session_unregister("life_idlogin");
	session_unregister("life_username");
	session_unregister("life_session");
	session_unregister("life_outletid");
	session_unregister("life_level");
	
	
    header("location:".WEBROOT."login.php?message=".$message);
   }
}
$_SESSION['timeout'] = time();
*/
?>