<?
session_start();
include "includes/setting.php";
include "includes/cekhakakses.php";
Header("Cache-control: private, no-cache");
Header("Pragma: no-cache");
?>
<html>
<head>
  <title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
<meta http-equiv="pragma" content="no-cache" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<!-- Make IE8 behave like IE7, necessary for charts -->
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
   <!--                       Styles                       -->
	<?
	$mode=$_GET["mode"];
	?>
	

  <style type="text/css" media="print,screen">
 
*{
font-size: 9pt;
font-family: sans-serif;
margin:0px;
padding:0px;
}
@page {
 margin-left:3cm 2cm 2cm 2cm;
 
}
table.grid{
font-size: 9pt;
border-collapse:collapse;
}
table.grid th{
padding-top:1mm;
padding-bottom:1mm;
}
table.grid th{
background: #F0F0F0;
border-top: 0.2mm solid #000;
border-bottom: 0.2mm solid #000;
text-align:left;
padding-left:0.2cm;
}
table tr td{
padding:2pt;

font-size: 9pt;
}
h1{
font-size: 20pt;
}
h2{
font-size: 13pt;
}
.header{
display: block;

margin-bottom: 5px;
width:600px;
}
.attr{
font-size:9pt;
width: 100%;
padding-top:2pt;
padding-bottom:2pt;

}
.pagebreak {
page-break-after: always;
}
.clear{
clear:both;
}

 body {background: white;
 
 size:'B5';}
	    #nyroModalContent { overflow: visible; }
		

fieldset{
background:none;
border:1px solid #000;
font:9pt sans-serif;
}



fieldset table {
font:9pt sans-serif;
}

.paymentlist{
width:200px;
height:auto;
float:right;
font:9pt sans-serif;
}

.popcontainer{
	width:800pt;
	height:auto !important;
	height:150pt;
	min-height:150pt;
	margin-left:50pt;
	
	padding:7pt;



}

.bordertop{
border-top:1pt solid #000;

}

.borderbottom{
border-bottom:1pt solid #000;

}

.borderleft{
border-left:1pt solid #000;
}
.borderright{
border-right:1pt solid #000;
}

@print{
#logo{
display:none;
}
}

	
</style>
	<link rel="stylesheet" type="text/css" media="screen" href="css/printcardnormal.css" />
		<link rel="stylesheet" type="text/css" media="print" href="css/printcardprint.css" />
</head>
<body>

<?			
$mode=$_REQUEST["mode"];
$checkprint=$_POST["checkprint"];
$realexpired=$_POST["realexpired"];
if (!isset($checkprint)){
echo 'Maaf Anda Belum Memilih ID Member yang akan Cetak';
exit();
}else{

include_once "areacard.php";
include_once "areacardref.php";


while (list($key, $val) = each($checkprint)) {




if (substr($val,0,1)=="R"){

$pieces = explode("-", $val);
$valnew=substr($pieces[0],1); // piece1
$realexpired=$pieces[1]; // piece2

$valnew=substr($val,1);
areacardrefprint($valnew,$realexpired);
}else{

areacard($val,$realexpired);
}

?>
					<div class="clear"></div>


<div style="page-break-after:always"></div>
<?

}
}


$mode=$_GET["mode"];
if ($mode=="print"){
	?>
	<script type="text/javascript">
	
	window.print();
	</script>
	<?
}
?>
</body>
</html>


