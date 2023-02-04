<?
session_start();
$mode=$_GET["mode"];
include "includes/setting.php";

	
	$filename = date('Ymd') . '.jpg';
	//$fileimagenew=$_SESSION["printcard_fileimage"].date('Ymdhis') . '.jpg';
	
		if ($_SERVER['SERVER_NAME']=="localhost"){
									$pathserver="";
									}else{
									$pathserver="../";
									}
									
	
	$alamatfile=DATAROOT."assets/member/".$filename;
	//if (!copy($pathserver."assets/member/".$fileimage,$pathserver."assets/member/thumbmini-".$fileimagenew)) {
   // $hasil= "failed to copy".$_FILES['userfile']['error'] ;
	//}

	
	


?>
<script type="text/javascript">
					$(function(){
							
							
						
							parent.$('#photopersonal').attr('src','<?=$alamatfile;?>');
							parent.$('#kotakimage img').attr('src','<?=$alamatfile;?>');
							parent.$('#previewphoto').attr('src','<?=$alamatfile;?>');
							parent.$('#filehidden').attr('value','<?=$filename;?>');
							parent.$('#fileimagehidden').attr('value','<?=DATAROOT;?>assets/member/<?=$filename;?>');
							parent.$('#fileimagehidden2').attr('value','<?=$filename;?>');
								parent.$.nyroModalRemove();
								
					});

</script>