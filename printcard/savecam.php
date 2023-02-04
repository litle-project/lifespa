<?
session_start();
$mode=$_GET["mode"];
//include_once "includes/cekhakakses.php";
		if ($_SERVER['SERVER_NAME']=="localhost"){
									$pathserver="";
									}else{
									$pathserver="../";
									}


$filename = date('Ymd') . '.jpg';




$result = file_put_contents( $pathserver.'assets/member/'.$filename, file_get_contents('php://input') );

if (!$result) {
	print "ERROR: Failed to write data to $filename, check permissions\n";
	exit();
}


$url = $pathserver.'assets/member/' . $filename;

print "$url\n";

?>
