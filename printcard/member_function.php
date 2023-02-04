<?
session_start();
$action=$_REQUEST["action"];
$rowid=$_REQUEST["rowid"];
include "includes/cekhakakses.php";
?>
   <script type="text/javascript" src="js/jquery.printElement.min.js">
    </script>

    
<script src="js/jquery.Jcrop.min.js"></script>

<script src="js/jcrop_main.js"></script>


<link rel="stylesheet" href="css/jquery.Jcrop.css" type="text/css" />
<script type="text/javascript">
			function printreport(rowid) {
	

		var url='layout_membership.php?rowid='+rowid+'&mode=print';
		
   mywindow = window.open (url,  "mywindow","location=0,status=0,scrollbars=1,toolbar=0, width=750,height=500");
  mywindow.moveTo(0,0);


 } 
			
			</script>
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
				
				
  	$('#formaddref').submit(function() {
	var memberid=$('#memberidauto').val();
	
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			success: function(data) {
				$('#loadmemberref').show();
				$('#loadmemberref').html(data);
			
				
				$.get('list_member_ref.php?memberid='+memberid+'&action=<?=$action;?>', function(dataku) {
					$('#listmemberref').show();
					$('#listmemberref').html(dataku);
				
				
				});

			}
		})
		return false;
	});
	
	
	  


	$("#tabs").tabs();
	$(".tabsref").tabs();



	$(".multi input").dynDateTime({				
							button: ".next()" //next sibling
						}); 
						
	  var redirectURL = 'http://www.mysite.com/someotherpage.html';  // !!! CHANGE THIS TO YOUR URL !!! 
	$("#uploadify").uploadify({
		'uploader'       : 'uploadify/uploadify.swf',
		'script'         : 'uploadify/uploadify.php',
		'cancelImg'      : 'uploadify/cancel.png',
		'folder'         : '../../assets/member/',
		'auto'           : false,

	    'onComplete'   : function(event, queueID, fileObj, response, data) {
							
							alert("Successfull Upload Photo : "+fileObj['name'])
							var alamatfile='<?=DATAROOT;?>assets/member/thumbmini-'+response;
					<?
					if ($_SERVER['SERVER_NAME']=="localhost"){
									$pathserver="";
									}else{
									$pathserver="../";
									}
									?>
							$('#photopersonal').removeClass('cropaja');
							$('#photopersonal').attr('src',"<?=DATAROOT;?>assets/member/thumbbig-"+response);
							$('#kotakimage img').attr('src',"<?=DATAROOT;?>assets/member/thumbbig-"+response);
							$('#previewphoto').attr('src',"<?=DATAROOT;?>assets/member/thumbbig-"+response);
							$('#filehidden').attr('value',response);
							$('#fileimagehidden').attr('value',"<?=$pathserver;?>assets/member/thumbbig-"+response);
							$('#fileimagehidden2').attr('value',response);
							$('#photopersonal').addClass('cropaja');
							
							
                       },
		
		'multi'          : false
	});
	
	
});
</script>

<script type="text/javascript">

							
function yakinaddref(){
	var memberid=$('#memberidauto').val();
	var jawabaddref=confirm('Are You sure to create Ref Member id of '+memberid+'?');
	if (jawabaddref==true){
	$('#typemember').attr('disabled','disabled');
	$('#entryfee','#annualfee','#memberidauto').attr('readonly','readonly');
	$('#refmemberid').attr('value',memberid);
	$('#fieldsetref').show();
	$('#fieldsetref').focus();
	return true;
	}else{
	return false;
	}
	

}

function ubahexpired(){
var typemember=$('#typemember').val();
	if (typemember==''){
	alert ('Silakan Pilih Type Member terlebih dahulu');
	return false;
	}else{
	var explode = typemember.split('-');
	var penambahan=explode[3];
	expdate(penambahan);
	return false;
	}
}

function expdate(penambahan){
var penambahan=parseInt(penambahan);

if (!penambahan){
alert('Silakan Pilih Type Member');
return false;

}else{

var lastexpiry=$('#lastexpirydate').val();
var endrooldate=$('#endrooldate').val();
if (lastexpiry==''){
  var currDate  = new Date(endrooldate);
  var currDay   = currDate.getDate();
  var currMonth = currDate.getMonth() ;
  var currYear  = currDate.getFullYear();
  var ModMonth = parseInt(currMonth) + penambahan;
 var da=new Date(currYear, ModMonth,currDay); 
dy = da.getFullYear() 	// Get full year (as opposed to last two digits only)
dm = da.getMonth()+1 	// Get month and correct it (getMonth() returns 0 to 11)
dd = da.getDate() 	// Get date within month
if ( dy < 1970 ) dy = dy + 100; 	// We still have to fix the millennium bug
ys = new String(dy) 	// Convert year, month and date to strings
ms = new String(dm) 	 
ds = new String(dd) 	 
if ( ms.length == 1 ) ms = "0" + ms; 	// Add leading zeros to month and date if required
if ( ds.length == 1 ) ds = "0" + ds; 	 
ys = ys + "-" + ms + "-" + ds
	$('#expirydate').attr('value', ys);


}else{
  var currDate  = new Date(endrooldate);
  var currDay   = currDate.getDate();
  var currMonth = currDate.getMonth() ;
  var currYear  = currDate.getFullYear();
  var ModMonth = parseInt(currMonth) + penambahan;
 var da=new Date(currYear, ModMonth,currDay); 
dy = da.getFullYear() 	// Get full year (as opposed to last two digits only)
dm = da.getMonth()+1 	// Get month and correct it (getMonth() returns 0 to 11)
dd = da.getDate() 	// Get date within month
if ( dy < 1970 ) dy = dy + 100; 	// We still have to fix the millennium bug
ys = new String(dy) 	// Convert year, month and date to strings
ms = new String(dm) 	 
ds = new String(dd) 	 
if ( ms.length == 1 ) ms = "0" + ms; 	// Add leading zeros to month and date if required
if ( ds.length == 1 ) ds = "0" + ds; 	 
ys = ys + "-" + ms + "-" + ds
	$('#expirydate').attr('value', ys);



}
}
}

function tembakfee(){
$('#entryfee').attr('value','');
$('#annualfee').attr('value','');
var typememberhiddenbefore=$('#typememberhiddenbefore').val();
var memberidhidden=$('#memberidhidden').val();
var typemember=$('#typemember').val();
var memberidauto=$('#memberidauto').val();



var explode = typemember.split('-');
var idrow = explode[0];
var entryfee= explode[1];
var annualfee= explode[2];
var penambahan=explode[3];
var membertype=explode[4];
var lastnumber=explode[5];
var groupcard=explode[6];
var qtycard=explode[7];
var haveref=explode[8];

var action='<?=$action;?>';
if (memberidhidden!='' && action=='edit'){

}else{

	if (idrow==''){
	var memberidauto='';
	$('#lastnumberhidden').attr('value','');
	$('#typememberhidden').attr('value','');
	}else if(typememberhiddenbefore==membertype){

		var memberidauto=memberidhidden;
		var tanggalexpired=$('#lastexpirydate').val();
		 $('#expirydate').attr('value',tanggalexpired);
	}else{
	
		if (haveref==1){
		var memberidauto=membertype+'-'+lastnumber+' - '+'<?=$_SESSION["printcard_outletid"];?>';
		$('#addref').show();
		}else{
		var memberidauto=membertype+'-'+lastnumber+' - '+'<?=$_SESSION["printcard_outletid"];?>';
		$('#addref').hide();
		}
		$('#lastnumberhidden').attr('value',lastnumber);
		
	}
expdate(penambahan);
}
$('#entryfee').attr('value',entryfee);
$('#annualfee').attr('value',annualfee);
$('#typememberhidden').attr('value',membertype);
$('#memberidauto').attr('value',memberidauto);


}






</script>
		
<link type="text/css" href="js/themes/base/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery.dynDateTime-0.2/jquery.dynDateTime.js"></script>
<script type="text/javascript" src="js/jquery.dynDateTime-0.2/lang/calendar-en.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="js/jquery.dynDateTime-0.2/css/calendar-win2k-cold-1.css"  />
<link href="uploadify/uploadify.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="uploadify/swfobject.js"></script>
<script type="text/javascript" src="uploadify/jquery.uploadify.v2.0.2.min.js"></script>
<script type="text/javascript" src="js/ui/ui.tabs.js"></script>





<a href="index.php?page=home">Home</a>&nbsp;&raquo;&nbsp;<a href="index.php?page=member_manage">Member Manage </a>&nbsp;&raquo;&nbsp;<a href="index.php?page=member_function&action=<?=$action;?>&rowid=<?=$rowid;?>"><?=ucfirst($action);?> Member </a><br/><br/>



<?
if($action=="edit" and $_SESSION["printcard_level"]<>'OPERATOR'){


				$queryview="select *,members.RowId as RowId,members.MemberTypeId as MemberTypeId,members.OutletId as OutletId ,membertypes.AdminFee as typeAdminFee,membertypes.EntryFee as typeEntryFee,membertypes.AnnualFee as typeAnnualFee ,members.AdminFee as memberAdminFee,members.EntryFee as memberEntryFee,members.AnnualFee as memberAnnualFee ,members.Status as statusnyamember,members.Active as activenyamember,members.remark as remarkmember from members left join membertypes on (members.MemberTypeId=membertypes.MemberTypeid) where members.RowId='".$rowid."'";
				$resultview=mysql_query($queryview);
				$rowview=mysql_fetch_array($resultview);
				?>
<h2><img src="images/icons/member_l.png" height="40">Edit Member</h2>
				
			
				<div class="content-box column-left main">
					<div class="content-box-header"><h3>Card Process</h3></div>
					<div class="content-box-content">		
					<div id="infomember" style="border-bottom:1px solid #999;margin:20px 0px;">
					<table  width="40%" style="margin-bottom:10px;">
					<tr><td>MemberId </td><td><b><?=$rowview["MemberId"];?></b></td><td></td><td></td></tr>
						
					<tr><td>Name </td><td><b><?=$rowview["FirstName"];?> <?=$rowview["MiddleName"];?> <?=$rowview["LastName"];?></b></td>
					<td>Status </td><td>:</td><td><b>
					<?
					
								$statusmembernya=$rowview["statusnyamember"];

								switch ($statusmembernya) {
								case '1':
									$led="green";
									$statusled="Active";
									break;
								case '3':
								$led="red";
									
									$statusled="Terminated";
									break;
								case '2':
									$led="yellow";
									$statusled="Suspended";
									break;
								
								case '4':
								$led="yellow";
									
									$statusled="History";
									break;
								case '5':
									$led="green";
									$statusled="Active";
									break;
								
								}

								
								?>
								<img src="images/led<?=$led;?>.png" alt="<?=$statusled;?>" title="<?=$statusled;?>" align="left">&nbsp; <?=$statusled;?>
						
					</b></td></tr>
						<tr><td>Expired Date </td><td><b><? echo (date("Y-m-d")<date("Y-m-d",strtotime($rowview["ExpiredDate"]))) ? date("d-M-Y",strtotime($rowview["ExpiredDate"])):'<span style="color:red;">'.date("d-M-Y",strtotime($rowview["ExpiredDate"])).'</span>';?></b></td>
					
					<td>&nbsp;</td><td>&nbsp;</td><td>
					<blink>
					<B><span style="color:red;font:13px arial;font-weight:bold;">

					<?
					$expireddate=date("Y-m-d",strtotime($rowview["ExpiredDate"]));
				for ($i = 1; $i <= 7; $i++) {
				  

					$date = date("Y-m-d");
					$newdate = strtotime ( '+'.$i.' day' , strtotime ( $date ) ) ;
					$newdate = date ( 'Y-m-d' , $newdate ); 

						if ($newdate==$expireddate){
						echo $i.' Day to Expired';

						}	
					}
					?>
					</span>
					</b>
					</blink>
					</td></tr>
						</table>
						</div>
		
			
			
		
						<div class="clear"></div>
				
				<div class="clear"></div>
				<div id="divcard">
				<div id="areacard" style="float:left;border:1px dashed #999;width:241pt;height:154pt;">
				<?
				
				include_once "areacard.php";
				areacard($rowid);
				?>
				</div>
					
						<div id="layoutcardkoordinat" style="float:left;width:150px;height:auto;">
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
								<input type="hidden" name="fileimage" id="fileimagehidden" value="<?=$pathserver;?>assets/member/<? echo(file_exists($pathserver.'assets/member/thumbbig-'.$rowview["Photo"])==TRUE) ? 'thumbbig-'.$rowview["Photo"]:'noimg.gif';?>">
								<input type="hidden" name="fileimage2" id="fileimagehidden2" value="<?=$rowview["Photo"];?>">
								<input type="submit" id="tombolcrop" style="display:none;" value="Crop Image & Save Thumbnail"/>
								<input type="button" value="Print Card" onClick="printCoords();" />
								
							</div>
						</form>
						</div>
						<div class="clear"></div>
				
				
				</div>
				</div>
				
				</div>
				<form enctype="multipart/form-data" name="memberadd" id="myForm" method="post" action="proses_member.php?action=update&rowid=<?=$rowid;?>">
			
						<div class="content-box column-right  sidebar">
				<div class="content-box-header">
				<h3> Photo Process </h3>
				</div>
				<div class="content-box-content">
					
				
						<div id="kotakimage" style="width:240px;height:240px;">
						<img id="photopersonal" class="cropaja" src="<?=DATAROOT;?>assets/member/<? echo(file_exists($pathserver.'assets/member/thumbbig-'.$rowview["Photo"])==TRUE) ? 'thumbbig-'.$rowview["Photo"] :'noimg.gif';?>" width="240" height="240" alt="Photo" style="display:block;" >
					<input type="hidden" name="filehidden" id="filehidden" value="<?=$rowview["Photo"];?>">
					</div>
					<div style="width:270px;height:auto;">
								<div id="tabs" >
					<ul>
						<li><a href="#tabs-1">Browse Foto</a></li>
						<li style="display:none;"><a href="#tabs-2">Capture Webcam</a></li>						
					</ul>
					<div id="tabs-1">
							<input type="file" name="uploadify" id="uploadify"/><br/>
						
						Upload only for .JPG , Browse File max 5 Mb ,and Click Upload to Start Uploading
						<blink><a href="javascript:$('#uploadify').uploadifyUpload();"><b>[Upload]</b></a></blink> &nbsp; Or &nbsp; <a href="javascript:$('#uploadify').uploadifyClearQueue();">Cancel</a>
					</div>
					<div id="tabs-2" style="display:none;">
						<p>
						<a href="pop_capturewebcam.php" class="popmodal" target="_blank"><img src="images/webcam.png" alt="Capture Webcam" align="left"><blink>&laquo;&laquo;Capture Face From Webcam</blink></a>
						<br/><br/>
						
						</p>

					</div>
					

						</div>
					
						
				
				</div>
				</div>
					</div>
				<div class="clear"></div>
				
				<div class="content-box column-left main">
				<div class="content-box-header">
				<h3> Personality</h3>
				</div>
				<div class="content-box-content">
				
				<table class="table1" width="450">
						<tbody>
									<tr>
									<td><span>Outlet</span></td>
									<td>&nbsp;</td>
									<td>
										 <select name="outlet" class="textFieldLogin" readonly>
										
											<?
											$queryselectoutlet="select * from outlets where OutletId='".$rowview["OutletId"]."'";
											$resultoutlet=mysql_query($queryselectoutlet);
											while($rowoutlet=mysql_fetch_array($resultoutlet)){
											?>
											
											<option value="<?=$rowoutlet["OutletId"];?>" <? echo ($rowview["OutletId"]==$rowoutlet["OutletId"]) ? 'selected':'';?> ><?=$rowoutlet["OutletName"];?></option>
											<?
											}
											?>
										</select>
									</td>
									</tr>
							<tr>
								<td><span >Member Type</span>
									<span class="redmark">(*)</span></td>
								<td>&nbsp;
								</td>
								<td>
								
						
									<select name="typemember" onchange="tembakfee();" id="typemember" disabled="disabled">
									
									
											<option value="" >--Select ---</option>
										<?
										$querytype="select * from membertypes where OutletId='".$rowview["OutletId"]."'";
									
										$resulttype=mysql_query($querytype);
										while($rowtype=mysql_fetch_array($resulttype)){
										if (empty($rowtype["LastNumber"]) or $rowtype["LastNumber"]==0){
										$lastid=sprintf("%05s", 1);
										}else{
										$lastid=sprintf("%05s", ($rowtype["LastNumber"]+1));
										}
										?>
										<option <? echo ($rowview["MemberTypeId"]==$rowtype["MemberTypeId"]) ? 'selected':'';?> value="<?=$rowtype["RowId"].'-'.$rowtype["EntryFee"].'-'.$rowtype["AnnualFee"].'-'.$rowtype["Periode"].'-'.$rowtype["MemberTypeId"].'-'.$lastid.'-'.$rowtype["GroupCard"].'-'.$rowtype["QtyCard"];?>"><?=$rowtype["MemberTypeId"].' - '.$rowtype["Description"].'-'.$rowtype["MemberTypeId"].'- ('.$rowtype["Periode"].')';?></option>
										
										<?
										}
										?>
									</select>
									<input type="hidden" name="typemember" value="<?=$rowview["MemberTypeId"];?>">
									<input type="hidden" id="typememberhidden" name="typememberhidden" value="<?=$rowview["MemberTypeId"];?>" />
								</td>
							</tr>	    
							<tr>
								<td>
									<span id="ctl00_cphMaster_lblEntryNAnnualFee">Entry / Annual Fee</span> <span class="redmark">(*)</span></td>
								<td>&nbsp;
								</td>
								<td>
									<span id="ctl00_cphMaster_upFees">
								<input name="entryfee" type="text" size="12" readonly="readonly" id="entryfee" value="<? echo ($rowview["memberEntryFee"]==0 and $rowview["memberAnnualFee"]==0 ) ? $rowview["typeEntryFee"]+$rowview["typeAdminFee"]:$rowview["memberEntryFee"]+$rowview["memberAdminFee"];?>"/> <input name="annualfee" size="12"  type="text" readonly="readonly" id="annualfee" value="<? echo ($rowview["memberAnnualFee"]==0) ? $rowview["typeAnnualFee"]:$rowview["memberAnnualFee"];?>" /> 
									</span>
									
									
								<!--	<a href="pop_editannualfee.php" id="editmanager" class="nyroModal">Edit For Manager</a> !-->
								
									</td>
							</tr>
							<tr>
								<td><span id="ctl00_cphMaster_lblMemberId">Member ID</span> <span class="redmark">(*)</span></td>
								<td>&nbsp;
								</td>
								<td>
									<input name="memberid"  id="memberidauto" type="text" readonly value="<?=$rowview["MemberId"];?>" />
									<input name="lastnumberhidden" type="hidden" id="lastnumberhidden" value="" />
									<input name="memberidhidden" type="hidden" id="memberidhidden" value="<?=$rowview["MemberId"];?>" />
									<input name="typememberhiddenbefore" type="hidden" id="typememberhiddenbefore" value="<?=$rowview["MemberTypeId"];?>" />
									&nbsp;
								</td>
							</tr>
							<tr>
								<td>
									<span id="ctl00_cphMaster_lblMemberRefId">Member Card #</span></td>
								<td>&nbsp;
								</td>
								<td>
									<input name="membercard" type="text" value="<?=$rowview["RefMemberId"];?>"  />
									<input name="membercardhidden" type="hidden" value="<?=$rowview["RefMemberId"];?>"  />
								</td>
							</tr>
							<tr>
								<td><span id="ctl00_cphMaster_lblEnrollDate">Enroll Date</span></td>
								<td>&nbsp;
								</td>
								<td>
									<?echo ($_SESSION["printcard_level"]=='ADMINISTRATOR') ? '<div class="multi">':'';?>
									
									
									<input name="endrolldate" readonly type="text" ="" id="endrooldate" value="<?=date("Y-m-d",strtotime($rowview["EnrollDate"]));?>"  /> 
									<?echo ($_SESSION["printcard_level"]=='ADMINISTRATOR') ? '	<a href="javascript:"><img src="images/calendar.png"></a>':'';?>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									
									<span id="ctl00_cphMaster_lblExpiryDate">Expiry Date <span class="redmark">(*)</span></span>
								
								
								</td>
								<td>&nbsp;
								</td>
								<td>
									<?echo ($_SESSION["printcard_level"]=='ADMINISTRATOR') ? '<div class="multi">':'';?>
									<input name="expirydate" readonly id="expirydate" type="text" value="<?=date("Y-m-d",strtotime($rowview["ExpiredDate"]));?>"  />
								 <?echo ($_SESSION["printcard_level"]=='ADMINISTRATOR') ? '	<a href="javascript:"><img src="images/calendar.png"></a>':'';?>
								     </div>
									<input name="lastexpirydate" readonly id="lastexpirydate" type="hidden" value="<?=date("Y-m-d",strtotime($rowview["ExpiredDate"]));?>"  />
								
								 
								</td>
							</tr>
							<tr>
								<td><span id="ctl00_cphMaster_lblRenewalDate">Renewal Date</span></td>
								<td>&nbsp;
								</td>
								<td>
									<?echo ($_SESSION["printcard_level"]=='ADMINISTRATOR') ? '<div class="multi">':'';?>
									<input name="renewaldate" readonly type="text" value="<? echo(date("Y",strtotime($rowview["RenewalDate"]))=='1970')?'':date("Y-m-d",strtotime($rowview["RenewalDate"]));?>"  />
									<?echo ($_SESSION["printcard_level"]=='ADMINISTRATOR') ? '	<a href="javascript:"><img src="images/calendar.png"></a>':'';?>
									</div>
								</td>
							</tr>
							<tr>
								<td><span id="ctl00_cphMaster_lblMemberFirstName">First</span>
									<span class="redmark">(*)</span>
									<span id="ctl00_cphMaster_lblMemberMiddleName">/ Middle Name</span></td>
								<td>&nbsp;
								</td>
								<td>
									<input name="firstname" type="text" value="<?=$rowview["FirstName"];?>"  />
									<input name="middlename" type="text" value="<?=$rowview["MiddleName"];?>"  /></td>
							</tr>
							<tr>
								<td><span id="ctl00_cphMaster_lblLastName">Lastname</span></td>
								<td>&nbsp;
								</td>
								<td>
									<input name="lastname" type="text" value="<?=$rowview["LastName"];?>"  />
								</td>
							</tr>
							<tr>
								<td>
									<span id="ctl00_cphMaster_lblExpiryDate">Birth Date <span class="redmark">(*)</span></span>
								</td>
								<td>&nbsp;
								</td>
								<td>
								<div class="multi">
									<input name="birthdate" id="birthdate" type="text" value="<? echo (date("Y",strtotime($rowview["Birthdate"]))=="1970") ? '':date("Y-m-d",strtotime($rowview["Birthdate"]));?>"  />
								  
									<a href="javascript:"><img src="images/calendar.png"></a>
									<br/>
								</div>
								 
								</td>
							</tr>
							<tr>
								<td><span id="ctl00_cphMaster_lblNickName">Nick</span></td>
								<td>&nbsp;
								</td>
								<td>
									<input name="nickname" type="text" value="<?=$rowview["FirstName"];?>"  />
								</td>
							</tr>	
							<tr>
								<td><span id="ctl00_cphMaster_lblPrefix">Prefix</span>
									 <span class="redmark">(*)</span></td>
								<td>&nbsp;
								</td>
								<td>
									<select name="prefix"  >
										<option <? echo ($rowview["Prefix"]=="") ? 'selected':'';?> value="">Select ---</option>
										<option <? echo ($rowview["Prefix"]=="MR") ? 'selected':'';?> value="MR">Mr.</option>
										<option <? echo ($rowview["Prefix"]=="MS") ? 'selected':'';?> value="MS">Ms.</option>
										<option <? echo ($rowview["Prefix"]=="MRS") ? 'selected':'';?> value="MRS">Mrs.</option>

									</select></td>
							</tr>		    
							<tr>
								<td><span id="ctl00_cphMaster_lblTitle">Title</span></td>
								<td>&nbsp;
								</td>
								<td>
									<input name="title" type="text" value="<?=$rowview["Title"];?>"  />
								</td>
							</tr>		    
							<tr>
								<td><span id="ctl00_cphMaster_lblSex">Sex</span>
								   <span class="redmark">(*)</span></td>
								<td>&nbsp;
								</td>
								<td>
									<select name="sex" id="ctl00_cphMaster_ddlSex" class="ctlComboBox"  >
									<option <? echo ($rowview["Sex"]=="") ? 'selected':'';?> value="">Select ---</option>
									<option <? echo ($rowview["Sex"]=="M") ? 'selected':'';?> value="M">Male</option>
									<option <? echo ($rowview["Sex"]=="F") ? 'selected':'';?> value="F">Female</option>

								</select></td>
							</tr>		        
							<tr>
								<td><span id="ctl00_cphMaster_lblReligion">Religion</span>
									</td>
								<td>&nbsp;
								</td>
								<td>
									<select name="religion" id="ctl00_cphMaster_ddlReligion" class="ctlComboBox"  >
										<option <? echo ($rowview["ReligionId"]=="") ? 'selected':'';?> value="">Select ---</option>
										<option <? echo ($rowview["ReligionId"]=="BUDH") ? 'selected':'';?> value="BUDH">Budha</option>
										<option <? echo ($rowview["ReligionId"]=="CATH") ? 'selected':'';?> value="CATH">Catholic</option>
										<option <? echo ($rowview["ReligionId"]=="CHRS") ? 'selected':'';?> value="CHRS">Christian</option>
										<option <? echo ($rowview["ReligionId"]=="HIND") ? 'selected':'';?> value="HIND">Hindu</option>
										<option <? echo ($rowview["ReligionId"]=="MOSL") ? 'selected':'';?> value="MOSL">Islam</option>
										<option <? echo ($rowview["ReligionId"]=="OTHR") ? 'selected':'';?> value="OTHR">Others</option>

									</select>
								</td>
							</tr>
							<tr>
								<td><span id="ctl00_cphMaster_lblHobby">Hobby</span></td>
								<td>&nbsp;
								</td>
								<td>
									<input name="hoby" type="text" value="<?=$rowview["Hobby"];?>"  />
								</td>
							</tr>		    
							
						</tbody>
					</table>
					
					</div>
					</div>
					
					<div class="content-box column-right sidebar">
					<div class="content-box-header">
					<h3> Contact</h3>
					</div>
					<div class="content-box-content">
					<table>
					 <tr>
								<td><span id="ctl00_cphMaster_lblAddressLine1">Address Line 1</span> <span class="redmark">(*)</span></td>
								<td>&nbsp;
								</td>
								<td>
									<textarea name="address1" rows="2" cols="20" id="ctl00_cphMaster_txtAddressLine1" class="ctlTxtArea"  ><?=$rowview["AddressLine1"];?></textarea>
								</td>
							</tr>		    
							<tr>
								<td><span id="ctl00_cphMaster_lblAddressLine2">Address Line 2</span></td>
								<td>&nbsp;
								</td>
								<td>
									<textarea name="address2" rows="2" cols="20" id="ctl00_cphMaster_txtAddressLine2" class="ctlTxtArea"  ><?=$rowview["AddressLine2"];?></textarea>
								</td>
							</tr>
							<tr>
								<td><span id="ctl00_cphMaster_lblCity">City</span> </td>
								<td>&nbsp;
								</td>
								<td>
									<input name="city" type="text" id="ctl00_cphMaster_txtCity" class="ctlTxt" value="<?=$rowview["City"];?>"  />
								</td>
							</tr>		    
							<tr>
								<td><span id="ctl00_cphMaster_lblRegion">Nationality</span> <span class="redmark">(*)</span></td>
								<td>&nbsp;
								</td>
								<td>
									<select name="region" id="region" >
									
										<?
										$querytype="select * from nationalities order by Description asc";
										$resulttype=mysql_query($querytype);
										while($rowtype=mysql_fetch_array($resulttype)){
										?>
										<option  value="<?=$rowtype["RowId"];?>" <? echo ($rowview["Region"]==$rowtype["RowId"]) ? 'selected' :'';?>><?=ucfirst(strtolower($rowtype["Description"]));?></option>
										
										<?
										}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td><span id="ctl00_cphMaster_lblPostal">Postal Code</span></td>
								<td>&nbsp;
								</td>
								<td>
									<input name="postalcode" type="text" value="<?=$rowview["PostalCode"];?>"  />
								</td>
							</tr>
							<tr>
								<td><span id="ctl00_cphMaster_lblPhone">Phone #</span></td>
								<td>&nbsp;
								</td>
								<td>
									<input name="phone" type="text" value="<?=$rowview["Phone"];?>"  />
								</td>
							</tr>		    
							<tr>
								<td><span id="ctl00_cphMaster_lblMobilePhone1">Mobile 1</span><span class="redmark">(*)</span></td>
								<td>&nbsp;
								</td>
								<td>
									<input name="hp1" type="text" value="<?=$rowview["MobilePhone1"];?>"  />
								</td>
							</tr>		    
							<tr>
								<td><span id="ctl00_cphMaster_lblMobilePhone2">Mobile 2</span></td>
								<td>&nbsp;
								</td>
								<td>
									<input name="hp2" type="text" value="<?=$rowview["MobilePhone2"];?>"  />
								</td>
							</tr>
							<tr>
								<td><span id="ctl00_cphMaster_lblFax">Fax #</span></td>
								<td>&nbsp;
								</td>
								<td>
									<input name="fax" type="text" value="<?=$rowview["Phone"];?>"  />
								</td>
							</tr>		    
							<tr>
								<td><span id="ctl00_cphMaster_lblEmail">Email</span> <span class="redmark">(*)</span></td>
								<td>&nbsp;
								</td>
								<td>
									<input name="email" type="text" value="<?=$rowview["Email"];?>"  />
								</td>
							</tr>		    
							<tr>
								<td><span id="ctl00_cphMaster_lblUrl">URL</span></td>
								<td>&nbsp;
								</td>
								<td>
									<input name="url" type="text" id="ctl00_cphMaster_txtUrl" class="ctlTxt" value="<?=$rowview["Url"];?>"  />
								</td>
							</tr>		    
							<tr>
								<td><span id="ctl00_cphMaster_lblRemark">Remark</span></td>
								<td>&nbsp;
								</td>
								<td>
									<textarea   name="remark" rows="2" cols="20" ><?=$rowview["remarkmember"];?></textarea>
								</td>
							</tr>	
						
							 <tr  >
								<td><span id="ctl00_cphMaster_lblRemark">Member Status</span></td>
								<td>&nbsp;
								</td>
								<td>
								   <select name="statusaktif" >
										<option <? echo ($rowview["statusnyamember"]=="1") ? 'selected' :'';?> value="1">Active</option>
										<option <? echo ($rowview["statusnyamember"]=="2") ? 'selected' :'';?> value="2">Suspend</option>
										<option <? echo ($rowview["statusnyamember"]=="3") ? 'selected' :'';?> value="3">Terminate</option>
										<option <? echo ($rowview["statusnyamember"]=="4") ? 'selected' :'';?> value="4">History</option>
										<option <? echo ($rowview["statusnyamember"]=="5") ? 'selected' :'';?> value="5">On Leave</option>
									
									
									</select>
								</td>
							</tr>
							
					</table>
					
			
					</div>
					</div>
					<div class="clear"></div>
					<div class="content-box">
					<div class="content-box-header">
					<h3> Update Form</h3>
					</div>
					<div class="content-box-content" style="text-align:center;">
					
							
							
					<a  href="javascript:" onClick="return printreport(<?=$rowview["RowId"];?>);" title="Print">Print Membership Agrement</a><br/><br/>
							
							<select name="statusrecord">
								<option <? echo ($rowview["activenyamember"]=="1") ? 'selected':'';?> value="1">This Record is Active</option>
								<option <? echo ($rowview["activenyamember"]=="0") ? 'selected':'';?> value="0">This Record is Non-Active</option>
							
							</select>
					
							<p class="submit">
							<input type="submit" value="Save" name="submit" >
							<input type="reset" value="Reset" name="reset" >
							</p>
						<div id="loading" style="display:none;"><img src="<?=WEBROOT;?>images/ajax-loader.gif" alt="loading..." /></div>
				<div id="result" style="display:none;"></div>
					</div>
					</div>

				</form>

				<div id="fieldsetref"  class="content-box">
								<?
								$memberid=$rowview["MemberId"];
								
								?>
								<div class="content-box-header"><h3> Add Ref Member Couple/Family/ or Corporate</h3></div>
						<div class="content-box-content">
							
							<form name="formaddref" id="formaddref" action="proses_refmember.php?action=submitedit" method="post">
							<input type="hidden" name="refmemberid" id="refmemberid" value="<?=$memberid;?>">
							<table>
							<tr><td>FirstName</td><td>Middle Name</td><td>Last Name </td><td>Tgl Lahir</td><td>Telp</td><td></td></tr>
							<tr><td><input class="inputref" type="text" name="firstnameref" value=""></td><td><input class="inputref" type="text" name="middlenameref" value=""></td><td><input class="inputref" type="text" name="lastnameref" value=""></td><td><div class="multi"><input type="text" size="10" class="inputref" readonly name="birthdateref"><a href="javascript:"><img src="images/calendar.png"></a></div></td><td><input type="text" size="8" class="inputref" name="handphoneref" value=""></td><td><input type="submit" name="submit" value="Add"><input type="reset" name="reset" value="Reset"></td></tr>
							</table>
							</form>
							
								<div id="loadmemberref" style="display:none;">
								
								</div>
								<div id="listmemberref">
								<?
								include "list_member_ref.php";
								?>
								</div>
								
					</div>
					</div>	

<div id="fieldcard"  class="content-box">
			<div class="content-box-header"><h3> Add This Member to Card Processing</h3></div>
						<div class="content-box-content">
						<form name="membertocard" id="membertocard" action="proses_member_to_card.php" method="post">
							<input type="hidden" name="rowid" class="submitcard" value="<?=$rowview["RowId"];?>">
							<input type="submit" name="submit" class="submitcard" value="Submit This Member to Card Process"/>
						
						</form>
						<div id="loadmembertocard">
						
						</div>
						</div>
</div>







<?
}
?>

