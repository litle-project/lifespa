<?
if (isset($_GET["memberid"])){
$memberid=$_GET["memberid"];

}
$ajax=$_REQUEST["ajax"];


$action=$_GET["action"];
include_once "includes/setting.php";
if ($action=="edit"){
$querymemberref="select * from memberref where RefMemberId='".$memberid."' and Active='1'";
}else{
$querymemberref="select * from memberref where RefMemberId='".$memberid."'";
}
$resultmemberref=mysql_query($querymemberref);
if (mysql_num_rows($resultmemberref)){
?>
<script type="text/javascript">


<? if ($ajax=="1"){
?>	jQuery(document).ready(function(){
	jQuery(".tabsref").tabs();
	
		jQuery('.popmodal').nyroModal({
					width: null, // default Width If null, will be calculate automatically
			  height: null, // default Height If null, will be calculate automatically
			  minWidth: 500, // Minimum width
			 hideTransition: 'hideTransition',
			
			   bgColor:'#DFDFDF',
			   minHeight: 500, // Minimum height
			 resizable: true, // Indicate if the content is resizable. Will be set to false for swf
			  autoSizable: true // Indicate if the content is auto sizable. If not, the min size will be used


					});
					
	});
	<?
	}
	?>
	
	
				function popsettingcard(rowid) {
	

		var url='pop_setting_card_ref.php?rowid='+rowid+'&mode=print';
		
   mywindow = window.open (url,  "mywindow","location=0,status=0,scrollbars=1,toolbar=0, width=900,height=400");
  mywindow.moveTo(0,0);


 } 
 
		function uploadphoto(rowid) {
		alert('UNDERCONSTRUCTION');

			var url='pop_upload_photo_couple.php?rowid='+rowid;
			
	   mywindow2 = window.open (url,  "mywindow2","location=0,status=0,scrollbars=1,toolbar=0, width=750,height=400");
	  mywindow2.moveTo(0,0);


	 } 
 
 
 function updateref(rowid){
 var filehiddenref=$('#filehidden'+rowid).val();
 var rowid=rowid;

 

 
 $.post("proses_refmember.php", { filehiddenref: filehiddenref,rowid: rowid ,action:'updateref'},
   function(data) {
     alert(data);
   });
   return false;
 };
 
function confirmdelete(rowid){


if (confirm("Are you sure you want to delete This Record?")) {
 
   $('#proseslist').show().html('<img src="images/ajax-loader.gif">').load('proses_refmember.php?rowid='+rowid+'&action=delete');
  $('.tr'+rowid).fadeOut('slow');
  $('.tr'+rowid).remove();
  $('#proseslist').fadeOut('slow');
  
  }else{
  alert('Cancel Delete');
  }
return false;
  }
</script>
<div id="proseslist">


</div>
							<table >
								<tr><th>Photo</th><th>Member Id Ref# </th><th>Nama</th><th>Tgl Lahir</th><th>Telp</th><th>Option</th><th></th><th></th></tr>
								<?
								while($rowmemberref=mysql_fetch_array($resultmemberref)){
								?>
								<tr class="tr<?=$rowmemberref["RowId"];?>"><td><img width="50" src="<? echo ($rowmemberref["Photo"]=="") ? DATAROOT.'images/noimg.gif':DATAROOT.'assets/member/thumbmini-'.$rowmemberref["Photo"];?>" id="photopersonal<?=$rowmemberref["RowId"];?>">
							
								</td><td><?=$rowmemberref["MemberIdRef"];?></td><td><b><?=$rowmemberref["FirstNameRef"];?> <?=$rowmemberref["MiddleNameRef"];?> <?=$rowmemberref["LastNameRef"];?></b></td><td><?=$rowmemberref["BirthDateRef"];?></td><td><?=$rowmemberref["HandPhoneRef"];?></td><td>
								<? 
								if ($action<>"view"){
								?>
							
							
								<br/>	<div class="tabsref">
					<ul>
						<li><a href="#tabs-1-<?=$rowmemberref["RowId"];?>">Browse Foto</a></li>
						<li style="display:none;"><a href="#tabs-2-<?=$rowmemberref["RowId"];?>">Capture Webcam</a></li>						
					</ul>
					<div id="tabs-1-<?=$rowmemberref["RowId"];?>">
							<input type="file" name="uploadify" id="uploadify<?=$rowmemberref["RowId"];?>"/><br/>
						
						Browse File max 5 Mb ,and Click Upload to Start Uploading
						<blink><a href="javascript:jQuery('#uploadify<?=$rowmemberref["RowId"];?>').uploadifyUpload();"><b>Upload</b></a></blink> &nbsp; Or &nbsp; <a href="javascript:jQuery('#uploadify<?=$rowmemberref["RowId"];?>').uploadifyClearQueue();">Cancel</a>
					</div>
					<div style="display:none;" id="tabs-2-<?=$rowmemberref["RowId"];?>">
						<p>
						<a href="pop_capturewebcam.php?mode=ref&refrowid=<?=$rowmemberref["RowId"];?>" class="popmodal" target="_blank"><img src="images/webcam.png" alt="Capture Webcam" align="left"><blink>&laquo;&laquo;Capture Face From Webcam</blink></a>
						<br/><br/>
						
						</p>

					</div>
					

						</div>
						
						
							<input type="hidden" value="" name="filehidden<?=$rowmemberref["RowId"];?>" id="filehidden<?=$rowmemberref["RowId"];?>">
							<button onClick="updateref('<?=$rowmemberref["RowId"];?>');">Save</button>
							
							<?
								}
								?>
								<script type="text/javascript">
								jQuery(function() { 
										jQuery("#uploadify<?=$rowmemberref["RowId"];?>").uploadify({
									'uploader'       : '<?=WEBROOT;?>uploadify/uploadify.swf',
									'script'         : '<?=WEBROOT;?>uploadify/uploadify.php',
									'cancelImg'      : '<?=WEBROOT;?>uploadify/cancel.png',
									'folder'         : '/assets/member/',
									'auto'           : false,

									'onComplete'   : function(event, queueID, fileObj, response, data) {
												   alert("Successfull Upload Photo : "+fileObj['name'])
												   var alamatfile='<?=DATAROOT;?>assets/member/thumbmini-'+response;
														$('#photopersonal<?=$rowmemberref["RowId"];?>').attr('src',alamatfile);
														$('#filehidden<?=$rowmemberref["RowId"];?>').attr('value',response);
												   },
									
									'multi'          : false
								});
								});
								
								
								</script>
								</td>
										<td>
								<?
								if ($action<>'view' and $rowmemberref["Photo"]<>''){
								?>
								
								<b><a href="javascript:void();" onClick="return popsettingcard(<?=$rowmemberref["RowId"];?>);">[ Setting Card ]</a></b>
								<?
								}
								?>
								
								</td>
								
								<td>
								<?
								if ($action<>'view'){
								?>
								<a href="javascript:void();" onClick="confirmdelete(<?=$rowmemberref["RowId"];?>)"><img src="images/delete.gif" title="Delete" alt="Delete" >   </a>
								<?
								}
								?>
								</td>
						
								</tr>
								<?
								}
								?>
								
								
							</table>
<?
}
?>
