<?
session_start();
include "includes/setting.php";
$rowid=$_REQUEST["rowid"];
$requestby=$_SESSION["printcard_userid"];

$listmember="select * from members where RowId='".$rowid."'";
$resultmember=mysql_query($listmember);
$rowmember=mysql_fetch_array($resultmember);


$memberid=$rowmember["MemberId"];
$membername=$rowmember["FirstName"]." ".$rowmember["MiddleName"]." ".$rowmember["LastName"];
$outletid=$rowmember["OutletId"];
$requesttime=date("Y-m-d H:i:s");
$requestby=$requestby;
$expiredcard=$rowmember["ExpiredDate"];


$insertq="insert into `printcard_proses` (`RowId`,`MemberId`,`MemberName`,`OutletId`,`RequestTime`,`RequestBy`,`ExpiredCard`,`Status`) values
(NULL,'$memberid','$membername','$outletid','$requesttime','$requestby','$expiredcard','R')";
$qinsery=mysql_query($insertq);

if (!$qinsery){
echo 'Failed to Process Card'.mysql_error();

}else{
echo "<img src='images/check.png' align='left'>Sucessfully Add to Process Card";
}
?>