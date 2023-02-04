<?

function areacard($rowid){


$queryview="select *,members.RowId as RowId,members.MemberTypeId as MemberTypeId,members.OutletId as OutletId ,membertypes.AdminFee as typeAdminFee,membertypes.EntryFee as typeEntryFee,membertypes.AnnualFee as typeAnnualFee ,members.AdminFee as memberAdminFee,members.EntryFee as memberEntryFee,members.AnnualFee as memberAnnualFee ,members.Status as statusnyamember,members.Active as activenyamember,members.remark as remarkmember from members left join membertypes on (members.MemberTypeId=membertypes.MemberTypeid) where members.RowId='".$rowid."'";
				$resultview=mysql_query($queryview);
				$rowview=mysql_fetch_array($resultview);


					
				

					if ($rowview["OutletId"]=="GT"){
					
					
				
					//for GREEN CARD
					
					if (substr($rowview["MemberId"],1,2)=="AH" and $rowview["OutletId"]=="GT"){
					?>
					
		
					
						<div id="layoutcard" style="float:left;width:240pt;height:153pt;background:url(images/card/card_green.jpg) no-repeat;">
						
							<div style="margin-bottom:19.842519685pt;margin-top:9.921259843pt;margin-left:14.173228346pt;margin-right:7.5pt;width:45.354330709pt;height:56.692913386pt;">
									<div style="overflow: hidden; width: 45.354330709pt; height:56.692913386pt;">
									<?
									if ($_SERVER['SERVER_NAME']=="localhost"){
									$pathserver="";
									}else{
									$pathserver="../";
									}
									
									?>
									<img width="60.472440945" height="75.590551181" id="previewphoto" src="<?=DATAROOT;?>assets/member/<? echo(file_exists($pathserver.'assets/member/thumbmini-'.$rowview["Photo"])==TRUE) ? 'thumbmini-'.$rowview["Photo"] :'noimg.gif';?>"/>
								</div>
							</div>
							<div id="textcard" style="margin-left:14.173228346pt;color:#000;font:13px arial;line-height:12pt;">
							<?
							$querylihatoutlet="select * from outlets where OutletId='".$rowview["OutletId"]."'";
							$resultoutlet=mysql_query($querylihatoutlet);
							$rowoutlet=mysql_fetch_array($resultoutlet);							
							?>
							<b><?=$rowoutlet["OutletName"];?></b><br/>
							<b><?=$rowview["MemberId"];?></b><br/>
							<b><?=strtoupper($rowview["FirstName"]);?> <?=strtoupper($rowview["MiddleName"]);?> <?=strtoupper($rowview["LastName"]);?></b><br/>
							<br/>
							<b><?=date("d / m / Y",strtotime($rowview["ExpiredDate"]));?></b>							
							</div>
					
					</div>
					<?
					//platinum card
					}elseif (substr($rowview["MemberId"],1,2)<>"AH" and $rowview["OutletId"]=="GT"){
					?>
							<div id="layoutcard" style="float:left;width:240pt;height:153pt;;font:13px arial;color:white;background:#fff url(images/card/card_platinum.jpg) no-repeat;">
							
							<!-- <div style="margin-bottom:19.842519685pt;margin-top:18.425196851pt;margin-left:14.173228346pt;margin-right:7.5pt;width:45.354330708pt;height:51.023622047pt;"> 
							!-->
							
							<div style="margin-bottom:18.897637795pt;margin-top:11.338582677pt;margin-left:14.173228346pt;margin-right:7.5pt;width:45.354330709pt;height:56.692913386pt;"> 
							
									<div style="overflow: hidden; width: 45.354330709pt; height:56.692913386pt;">
									<?
									if ($_SERVER['SERVER_NAME']=="localhost"){
									$pathserver="";
									}else{
									$pathserver="../";
									}
									
									?>
									<img width="60.472440945" height="75.590551181" id="previewphoto" src="<?=DATAROOT;?>assets/member/<? echo(file_exists($pathserver.'assets/member/thumbmini-'.$rowview["Photo"])==TRUE) ? 'thumbmini-'.$rowview["Photo"] :'noimg.gif';?>"/>
								</div>
							</div>
							<div id="textcard"  style="margin-left:14.173228346pt;font:13px arial;color:white;line-height:12pt;">
							<?
							$querylihatoutlet="select * from outlets where OutletId='".$rowview["OutletId"]."'";
							$resultoutlet=mysql_query($querylihatoutlet);
							$rowoutlet=mysql_fetch_array($resultoutlet);							
							?>
							
							<img src="txt2img.php?card_center=<?=$rowoutlet["OutletName"];?>&card_memberid=<?=$rowview["MemberId"];?>&card_expired=<?=date("d / M / Y",strtotime($rowview["ExpiredDate"]));?>&card_name=<?=strtoupper($rowview["FirstName"]);?> <?=strtoupper($rowview["MiddleName"]);?> <?=strtoupper($rowview["LastName"]);?>"  >
							
										
							</div>
					
					</div>
					
					
					
					<?
					}
					
					//for gold Card
					}elseif ((is_numeric(substr($rowview["MemberId"],0,1)) and ($rowview["OutletId"]=="KR" or $rowview["OutletId"]=="PI") and (substr($rowview["MemberId"],0,1)>=0 and substr($rowview["MemberId"],0,1)<8) ) or (substr($rowview["MemberId"],0,3)=="1P3")){
					
					?>
						<div id="layoutcard" style="float:left;width:240pt;height:153pt;background:url(images/card/card_gold.jpg) no-repeat;">
							<div style="margin-bottom:19.842519685pt;margin-top:18.425196851pt;margin-left:14.173228346pt;margin-right:7.5pt;width:45.354330708pt;height:51.023622047pt;">
									<div style="overflow: hidden; width: 45.354330708pt; height:51.023622047pt;">
									<?
									if ($_SERVER['SERVER_NAME']=="localhost"){
									$pathserver="";
									}else{
									$pathserver="../";
									}
									
									?>
									<img width="56.692913386" height="68.031496063" id="previewphoto" src="<?=DATAROOT;?>assets/member/<? echo(file_exists($pathserver.'assets/member/thumbmini-'.$rowview["Photo"])==TRUE) ? 'thumbmini-'.$rowview["Photo"] :'noimg.gif';?>"/>
								</div>
							</div>
							<div id="textcard" style="margin-left:14.1pt;color:#000;font:13px arial;line-height:12pt;">
							<?
							$querylihatoutlet="select * from outlets where OutletId='".$rowview["OutletId"]."'";
							$resultoutlet=mysql_query($querylihatoutlet);
							$rowoutlet=mysql_fetch_array($resultoutlet);							
							?>
							<b><?=$rowoutlet["OutletName"];?></b><br/>
							<b><?=$rowview["MemberId"];?></b><br/>
							<b><?=strtoupper($rowview["FirstName"]);?> <?=strtoupper($rowview["MiddleName"]);?> <?=strtoupper($rowview["LastName"]);?></b><br/>
							<br/>
							<b><?=date("d / m / y",strtotime($rowview["ExpiredDate"]));?></b>							
							</div>
					
					</div>
					
					<?				
					}else{
						//silver
					?>
					<div id="layoutcard" style="float:left;width:240pt;height:153pt;background:url(images/card/card_silver.jpg) no-repeat;">
							<div style="float:right;margin-top:77.952755905pt;margin-right:6.082677165pt;width:49.596614174pt;height:65.193937008pt;">
									<div style="overflow: hidden; width: 49.596614174pt; height:65.193937008pt;">
									<?
									if ($_SERVER['SERVER_NAME']=="localhost"){
									$pathserver="";
									}else{
									$pathserver="../";
									}
									//width="64.251968504" height="83.149606299"
									?>
									
									<img  style="width: 49.596614174pt; height:65.193937008pt;" id="previewphoto" src="<?=DATAROOT;?>assets/member/<? echo(file_exists($pathserver.'assets/member/thumbmini-'.$rowview["Photo"])==TRUE) ? 'thumbmini-'.$rowview["Photo"] :'noimg.gif';?>"/>
								</div>
							</div>
							<div id="textcard" style="float:left;margin-top:87.874015749pt;width:170pt;height:auto;margin-left:10.33464567pt;color:#000;font:13px arial;line-height:12pt;">
							<?
							$querylihatoutlet="select * from outlets where OutletId='".$rowview["OutletId"]."'";
							$resultoutlet=mysql_query($querylihatoutlet);
							$rowoutlet=mysql_fetch_array($resultoutlet);							
							?>
							<b><?=$rowoutlet["OutletName"];?></b><br/>
							<b><?=$rowview["MemberId"];?></b><br/>
							<b><?=strtoupper($rowview["FirstName"]);?> <?=strtoupper($rowview["MiddleName"]);?> <?=strtoupper($rowview["LastName"]);?></b><br/>
							<br/>
							<b><?=date("d / m / y",strtotime($rowview["ExpiredDate"]));?></b>							
							</div>
							<div class="clear"></div>
					
					</div>
					
					
					
					
					<?
					}
					?>
				
<?

mysql_free_result($resultview);
}


?>