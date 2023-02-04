<?
session_start();
include "includes/setting.php";
$rowid=$_REQUEST["rowid"];
$requestby=$_SESSION["life_username"];

$listmember="select a.ExpiredDate as ExpiredDate,b.FirstNameRef as FirstName ,b.MiddleNameRef as MiddleName ,b.LastNameRef as LastName,b.RefMemberId as refmemberid,a.OutletId as OutletId,b.MemberIdRef as MemberId,b.Photo as Photo from memberref b inner join members a on (a.MemberId=b.RefMemberId) where b.RowId='".$rowid."'";
$resultmember=mysql_query($listmember);
$rowmember=mysql_fetch_array($resultmember);


$memberid=$rowmember["MemberId"];
$membername=$rowmember["FirstName"]." ".$rowmember["MiddleName"]." ".$rowmember["LastName"];
$outletid=$rowmember["OutletId"];
$requesttime=date("Y-m-d H:i:s");
$requestby=$requestby;
$expiredcard=$rowmember["ExpiredDate"];


$insertq="insert into `printcard_proses` (`RowId`,`MemberId`,`MemberName`,`OutletId`,`RequestTime`,`RequestBy`,`ExpiredCard`,`Status`,`MemberRef`) values
(NULL,'$memberid','$membername','$outletid','$requesttime','$requestby','$expiredcard','R','Y')";
$qinsery=mysql_query($insertq);

if (!$qinsery){
echo 'Failed to Process Card'.mysql_error();

}else{
echo "<img src='images/check.png' align='left'>Sucessfully Add to Process Card";
}
?>