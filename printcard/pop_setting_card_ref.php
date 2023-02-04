<?
include_once "includes/setting.php";
Header("Cache-control: private, no-cache");
Header("Pragma: no-cache");
$rowid=$_REQUEST["rowid"];


$queryref="select * from memberref where RowId='".$rowid."'";
$resultref=mysql_query($queryref);
$rowref=mysql_fetch_array($resultref);


$pathserver="../";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>

<meta http-equiv="pragma" content="no-cache" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<!-- Make IE8 behave like IE7, necessary for charts -->
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/reset.css" />
				<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
   <script type="text/javascript" src="js/jquery.printElement.min.js">
    </script>
	
	<script src="js/jquery.Jcrop.min.js"></script>

<script src="js/jcrop_main.js"></script>
<style type="text/css">
.clear{
clear:both;
}

h1{
font:15px arial;
font-weight:bold;

}

</style>

<link rel="stylesheet" href="css/jquery.Jcrop.css" type="text/css" />
<script type="text/javascript">


$(document).ready(function(){


	$('#kotakimage').hover(function(){
	
		var alamatphoto=$('#photopersonal').attr('src');
		$('#previewphoto').attr('src',alamatphoto);
		$('#tombolcrop').show();
	
	
	
	});
	
	$('#membertocard').submit(function() {
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			success: function(data) {
			
			
			$('#loadmembertocard').html(data);
			}
		})
		return false;
	});
	
	});
</script>
</head>
<body>
<h1> Setting Print Card Member 	Ref </h1>
<hr/>
<br/>
	<div id="areacard" style="float:left;border:1px dashed #999;width:241pt;height:154pt;">
				<?
				
				include_once "areacardref.php";
				areacardref($rowid);
				?>
				</div>
					
						<div id="layoutcardkoordinat" style="float:left;width:250px;margin:0px 20px;height:300px;">
							 <form  action="prosespreview.php" id="postpreview" method="post" onsubmit=" checkCoords();">
							<div style="margin:5px;">
								<label>X1 <input type="text" readonly name="x" id="x" size="4"/></label>
								<label>Y1 <input type="text" readonly name="y" id="y" size="4"/></label>
								<label>X2 <input type="text" readonly name="x2" id="x2" size="4"/></label>
								<label>Y2 <input type="text" readonly name="y2" id="y2" size="4"/></label>
								<label>W  <input type="text" readonly name="w" id="w" size="4"/></label>
								<label>H  <input type="text" readonly name="h" id="h" size="4"/></label>
								
							</div>
							
							<div style="margin:5px;">
								<input type="hidden" name="fileimage" id="fileimagehidden" value="<?=$pathserver;?>assets/member/<? echo(file_exists($pathserver.'assets/member/thumbbig-'.$rowref["Photo"])==TRUE) ? 'thumbbig-'.$rowref["Photo"]:'noimg.gif';?>">
								<input type="hidden" name="fileimage2" id="fileimagehidden2" value="<?=$rowref["Photo"];?>">
								<input type="submit" id="tombolcrop" style="display:none;" value="Crop Image & Save Thumbnail"/>
								<input type="button" value="Print Card" onClick="printCoords();" />
								
							</div>
						</form>
						</div>
								<div id="kotakimage" style="width:240px;height:240px;float:left;">
						<img id="photopersonal" class="cropaja" src="<?=DATAROOT;?>assets/member/<? echo(file_exists($pathserver.'assets/member/thumbbig-'.$rowref["Photo"])==TRUE) ? 'thumbbig-'.$rowref["Photo"] :'noimg.gif';?>" width="240" height="240" alt="Photo" style="display:block;" >
					<input type="hidden" name="filehidden" id="filehidden" value="<?=$rowref["Photo"];?>">
					</div>
						<div class="clear"></div>
						<hr/>
							<div class="content-box-content">
						<form name="membertocard" id="membertocard" action="proses_member_to_card_ref.php" method="post">
							<input type="hidden" name="rowid" class="submitcard" value="<?=$rowref["RowId"];?>">
							<input type="submit" name="submit" class="submitcard" value="Submit This Member to Card Process"/>
						
						</form>
						<div id="loadmembertocard">
						
						</div>
						</div>
						
</body>
</html>