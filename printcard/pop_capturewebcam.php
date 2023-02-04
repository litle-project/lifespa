<?session_start();
	include_once "includes/setting.php";
include_once "includes/cekhakakses.php";
$mode=$_GET["mode"];
?>
	<html>
	<head>
		<style type="text/css">
		html,body{
		font:11px arial;
		text-align:center;
		
		}
		
		input {
		border:1px solid #999;
		}
		
		</style>
		    <script type="text/javascript" src="<?=WEBROOT;?>js/jquery-1.4.2.min.js"></script>
	</head>
	<body>
	<div id="titlewebcam" style="text-align:left;">
	<img src="images/webcam.png" align="left"><h2> Capture Face With Webcam </h2><br/><hr/>
	
	</div>
	<div id="webcam">
	
	
	<!-- First, include the JPEGCam JavaScript Library -->
	<script type="text/javascript" src="webcam.js"></script>
	
	<!-- Configure a few settings -->
	<script language="JavaScript">
	<?
	if ($mode=="employee"){
	?>
		webcam.set_api_url( 'savecam.php?mode=employee' );
	<?
	}else{
	?>
		webcam.set_api_url( 'savecam.php' );
	<?
	}
	?>
		webcam.set_quality( 100 ); // JPEG quality (1 - 100)
		webcam.set_shutter_sound( true ); // play shutter click sound
	</script>
	
	<!-- Next, write the movie to the page at 320x240, but request the final image at 160x120 -->
	<script language="JavaScript">
		document.write(webcam.get_html(240, 240, 240, 240));
	</script>
	
	<!-- Some buttons for controlling things -->
	<br/><br/>
	<form>
		<input type=button value="Configure..." onClick="webcam.configure()">
		&nbsp;&nbsp;
		<input type="button" value="Take Snapshot" id="butoncapture" onClick="take_snapshot()">
		<div id="silakan"> </div>
	</form>
	
	<!-- Code to handle the server response (see test.php) -->
	<script language="JavaScript">
		webcam.set_hook('onComplete', 'my_completion_handler' );
		
		function take_snapshot() {
		
			// take snapshot and upload to server
			document.getElementById('upload_results').innerHTML = 'Waiting Result.....<br/><H3><input type="button" value="Saving Capture&nbsp;&raquo;&raquo;" id="saving" onClick="saving()"> </h3>';
			webcam.snap();
		}
		
							function saving(){
							
							<?
							if ($mode=="employee"){
							?>
							
							$('#resultcam').load('savingwebcamtoform.php?mode=employee');
							<?
							}else{
							?>
							
							$('#resultcam').load('savingwebcamtoform.php');
							<?
							}
							?>
							
							
							
							}
					   
					   
		function my_completion_handler(msg) {
			// extract URL out of PHP output
				$('#butoncapture').hide();
		$('#upload_results').html('Capture Complete ....100% <br/><H3><input type="button" value="Saving Capture&nbsp;&raquo;&raquo;" id="saving" onClick="saving()"> </h3>');
		}
		
		function resetcap(){
		
		webcam.reset();
		$('#upload_results').html('');
		$('#butoncapture').show();
		$('#resultcam').load('deletecap.php?session=<?=$_SESSION["printcard_session"];?>');
		
		
		
		}
	</script>
	
	
		
	
			
	</div>
	<div id="resultcam"></div>
	<?
	echo '<a href="javascript:resetcap();">Bad Foto?Want to Delete.Click Here !!</a>';
	?>
	<div id="upload_results"></div><br/>
	
	
	
	</body>
	</html>