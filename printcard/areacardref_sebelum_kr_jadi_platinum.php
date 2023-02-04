<?

function areacardref($rowid){


$queryview="select a.ExpiredDate as ExpiredDate,b.FirstNameRef as FirstName ,b.MiddleNameRef as MiddleName ,b.LastNameRef as LastName,b.RefMemberId as refmemberid,a.OutletId as OutletId,b.MemberIdRef as MemberId,b.Photo as Photo from memberref b inner join members a on (a.MemberId=b.RefMemberId) where b.RowId='".$rowid."'";

				$resultview=mysql_query($queryview);
				$rowview=mysql_fetch_array($resultview);


					
				

					if ($rowview["OutletId"]=="GT"){
				
					if (substr($rowview["MemberId"],1,2)=="AH" and $rowview["OutletId"]=="GT"){
					//for GREEN CARD AH
					?>
				
					
						<div id="layoutcard" style="float:left;width:240pt;height:153pt;background:url(images/card/card_green.jpg) no-repeat;">
							<div style="margin-bottom:18.897637795pt;margin-top:9.921259843pt;margin-left:14.173228346pt;margin-right:7.5pt;width:45.354330709pt;height:56.692913386pt;">
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
					
					//platinum CARD
						}elseif (substr($rowview["MemberId"],1,2)<>"AH" and $rowview["OutletId"]=="GT"){
						?>
						
						<div id="layoutcard" style="float:left;width:240pt;height:153pt;font:13px arial;color:#000;background:url(images/card/card_platinum.jpg) no-repeat;">
							<div style="margin-bottom:19.842519685pt;margin-top:11.338582677pt;margin-left:14.173228346pt;margin-right:7.5pt;width:45.354330708pt;height:51.023622047pt;">
									<div style="overflow: hidden; width: 45.354330708pt; height:56.692913386pt;">
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
							<b><?=date("d / m / y",strtotime($rowview["ExpiredDate"]));?></b>							
							</div>
					
					</div>
						<?
						
						
						}
					//for gold Card
					}elseif (is_numeric(substr($rowview["MemberId"],0,1)) and ($rowview["OutletId"]=="KR" or $rowview["OutletId"]=="PI") and (substr($rowview["MemberId"],0,1)>=0 and substr($rowview["MemberId"],0,1)<8)){
					
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


function areacardrefprint($rowid,$realexpired){

$dateexpired=date("Y-m-d",$realexpired);
$queryview="select a.ExpiredCard as ExpiredDate,b.FirstNameRef as FirstName ,b.MiddleNameRef as MiddleName ,b.LastNameRef as LastName,b.RefMemberId as refmemberid,a.OutletId as OutletId,b.MemberIdRef as MemberId,b.Photo as Photo from printcard_proses a inner join memberref b on (a.MemberId=b.MemberIdRef) where b.RowId='".$rowid."' and date(a.ExpiredCard)='".$dateexpired."'";
				$resultview=mysql_query($queryview);
				$rowview=mysql_fetch_array($resultview);


					
				

					if ($rowview["OutletId"]=="GT"){
							if (substr($rowview["MemberId"],1,2)=="AH" and $rowview["OutletId"]=="GT"){
							//for GREEN CARD AH
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
					
					//platinum CARD
						}elseif (substr($rowview["MemberId"],1,2)<>"AH" and $rowview["OutletId"]=="GT"){
						?>
						
						<div id="layoutcard" style="float:left;width:240pt;height:153pt;font:13px arial;color:#000;background:url(images/card/card_platinum.jpg) no-repeat;">
							<div style="margin-bottom:18.897637795pt;margin-top:11.338582677pt;margin-left:14.173228346pt;margin-right:7.5pt;width:45.354330708pt;height:51.023622047pt;">
									<div style="overflow: hidden; width: 45.354330708pt; height:56.692913386pt;">
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
						
						
						}
					
					//for gold Card
					}elseif (is_numeric(substr($rowview["MemberId"],0,1)) and ( $rowview["OutletId"]=="KR" or $rowview["OutletId"]=="PI") and (substr($rowview["MemberId"],0,1)>=0 and substr($rowview["MemberId"],0,1)<8)){
					
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
							<b><?=date("d / m / Y",strtotime($rowview["ExpiredDate"]));?></b>							
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