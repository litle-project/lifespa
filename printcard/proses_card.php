<?
session_start();
include "includes/setting.php";


$rowid=$_REQUEST["rowid"];
$action=$_REQUEST["action"];


if (!empty($rowid) and $action=="finish"){
$queryupdate="update printcard_proses set `Status`='F',`CompleteTime`=now() where RowId='".$rowid."'";
$resultupdate=mysql_query($queryupdate);
if (!$resultupdate){
	echo 'Error : Failed Update Status'.mysql_error();
}else{
	
	echo 'Successfully Update Change';	
}


}

if (!empty($rowid) and $action=="cancel"){
$queryupdatec="update printcard_proses set `Status`='C',`CompleteTime`=now() where RowId='".$rowid."'";
$resultupdatec=mysql_query($queryupdatec);
if (!$resultupdatec){
	echo 'Error : Failed Update Status'.mysql_error();
}else{
	
	echo 'Successfully Canceled Card';	
}


}

?>