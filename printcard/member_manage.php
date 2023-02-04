<?
session_start();
include "includes/cekhakakses.php";
?>
<h2> <img src="images/icons/member_l.png" height="32" align="left">Member Manage </h2>
<div style="text-align:left;">
<a href="index.php?page=home">Home</a>&nbsp;&raquo;&nbsp;<a href="index.php?page=member_manage">Member Manage </a><br/><br/>
</div>

<script type="text/javascript">
function confirmdelete(rowid){


if (confirm("Are you sure you want to delete This Record?")) {
 
   $('#proses').show().html('<img src="images/ajax-loader.gif">').load('proses_member.php?rowid='+rowid+'&action=delete');
  $('.tr'+rowid).fadeOut('slow');
  $('.tr'+rowid).remove();
  $('#proses').fadeOut('slow');
  
  }else{
  alert('Cancel Delete');
  }
return false;
  }
  
  
  
function confirmactive(rowid){
	if (confirm("Are you sure you want to Activate This Record?")) {
	 
	   $('#proses').show().html('<img src="images/ajax-loader.gif">').load('proses_member.php?rowid='+rowid+'&action=activate');
	  $('.tr'+rowid).fadeOut('slow');
	  $('.tr'+rowid).remove();
	  $('#proses').fadeOut('slow');
	  
	  }else{
	  alert('Cancel Activate Record');
	  }
	return false;
  }
  

  function filterstatus(){
  var filter=$('#filter').val();
  var filteroutlet=$('#filteroutlet').val();
   var filterstatusmember=$('#filterstatusmember').val();
  document.location='index.php?page=member_manage&filter='+filter+'&filteroutlet='+filteroutlet+'&filterstatusmember='+filterstatusmember;
  
  
  }

</script>


<?
	$filter=$_REQUEST["filter"];
	if ($filter==""){
		$filter=1;
	}
	
	$filterstatusmember=$_REQUEST["filterstatusmember"];
	if ($filterstatusmember==""){
		$filterstatusmember="";
	}
	
		$filteroutlet=$_REQUEST["filteroutlet"];
	if ($filteroutlet==""){
		$filteroutlet="GT";
	}
?>

			<div class="content-box">
			<form>
					<div class="content-box-header">
						<h3>Filter Member</h3>
					</div><!-- end .content-box-header -->
					<div class="content-box-content">
					<div id="topinput_left">
					Status Recod&nbsp;:&nbsp;<select name="filter" id="filter" >
						<option <? echo($filter=="1" or $filter=="") ? 'selected':'';?> value="1">Active</option>
						<option <? echo($filter=="0") ? 'selected':'';?> value="0">Non-Active</option>
					
					
					</select>&nbsp;&nbsp;
						 Status Member&nbsp;:&nbsp;<select name="filterstatusmember" id="filterstatusmember" >
						<option <? echo($filterstatusmember=="") ? 'selected':'';?> value="">All</option>
						<option <? echo($filterstatusmember=="1") ? 'selected':'1';?> value="1">Active</option>
						<option <? echo($filterstatusmember=="2") ? 'selected':'2';?> value="2">Suspend</option>
						<option <? echo($filterstatusmember=="3") ? 'selected':'3';?> value="3">Terminate</option>
					
					
					
					</select>
				&nbsp;&nbsp;	Outlet Id&nbsp;&nbsp;:
					<select name="outlet" id="filteroutlet" class="textFieldLogin">
					<option value="ALL">--All--</option>
					<?
					$queryselectoutlet="select * from outlets where Active='1' order by RowId";
					$resultoutlet=mysql_query($queryselectoutlet);
					while($rowoutlet=mysql_fetch_array($resultoutlet)){
					?>
					
					<option value="<?=$rowoutlet["OutletId"];?>" <? echo ($filteroutlet==$rowoutlet["OutletId"]) ? 'selected':'';?>><?=$rowoutlet["OutletName"];?></option>
					<? 
					}
					?>
					</select>
				
						<a class="graybutton" onClick="filterstatus();" href="javascript:" style="float:right">Filter</a>
					</div>
	
				
					<div class="clear"></div>
					</div>
					</form>
				</div>
<br/>
<div id="proses">
</div>
<div class="content-box">
<div class="content-box-header"><h3> List Member </h3></div>
<div class="content-box-content">
<div id="boxtable">
	
			<div class="demo_jui">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">
	<thead>
		<tr>
			<th><b>Member Id </b></th>
			<th><b>Outlet Id</b></th>
			<th>Member Name</th>
		
			
			
		
			<th>Expired On</th>
			<th>Member Status</th>
			<th>&nbsp;</th>
		
		</tr>
	</thead>
	<tbody>
	<?
	if($filteroutlet=="ALL"){
		if ($filterstatusmember<>""){
		$querylistmember="select * from members where Active='".$filter."' and Status='".$filterstatusmember."'  order by RowId desc ";
		}else{
		$querylistmember="select * from members where Active='".$filter."' order by RowId desc ";
	
		}
	}else{
		if ($filterstatusmember<>""){
		$querylistmember="select * from members where Active='".$filter."' and Status='".$filterstatusmember."' and OutletId='".$filteroutlet."' order by RowId desc ";
		}else{
		$querylistmember="select * from members where Active='".$filter."' and OutletId='".$filteroutlet."' order by RowId desc ";
		
		}
	}
	
		
									if ($_SERVER['SERVER_NAME']=="localhost"){
									$pathserver="";
									}else{
									$pathserver="../";
									}
									
								
									
	$resultmember=mysql_query($querylistmember);
	while($rowmember=mysql_fetch_array($resultmember)){
	?>
		<tr class="tr<?=$rowmember["RowId"];?> gradeX">
			<td><? echo ($rowmember["MemberId"]=='') ? '<blink><span class="redmark">(Please Edit)</span></blink>':$rowmember["MemberId"];?></td>
			<td><?=$rowmember["OutletId"];?></td>
			<td><img width="30" src="<?=DATAROOT;?>assets/member/<? echo(!empty($rowmember["Photo"])) ? 'thumbmini-'.$rowmember["Photo"] :'noimg.gif';?>"><a href="index.php?page=member_function&action=edit&rowid=<?=$rowmember["RowId"];?>"><?=ucfirst($rowmember["FirstName"])." ".$rowmember["MiddleName"]." ".$rowmember["LastName"];?></a></td>
		
			
			
			
			<td class="center">
			<? if (date("Y-m-d",strtotime($rowmember["ExpiredDate"]))<date("Y-m-d")) {
				echo (date("y",strtotime($rowmember["ExpiredDate"]))=="70") ? ' ':'<b><span class="redmark">'.date("d-M-Y",strtotime($rowmember["ExpiredDate"])).'</span></b>';
				}else{
				echo date("d-M-Y",strtotime($rowmember["ExpiredDate"]));
				}
				?>
				</td>
			<td class="center">
				<? 
				$i=$rowmember["Status"];
				switch ($i) {
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
				}

				
				?>
				<img src="images/led<?=$led;?>.png" title="<?=$statusled;?>">
			</td>
			<td>
			
			
			<a href="index.php?page=member_function&action=edit&rowid=<?=$rowmember["RowId"];?>"><img src="images/icons/card-address.png" alt="Edit"></a>  &nbsp;&nbsp;
			
			
			
				
				
			
			</td>
			
			
		</tr>
	<?
	}
	?>

	</tbody>
</table>
			</div>
	
		
		<div class="clear"></div>
</div>
</div>
</div>
