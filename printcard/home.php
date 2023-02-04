<?
session_start();
include_once "includes/setting.php";
	include_once "includes/cekhakakses.php";



function totalmember(){
	$totalmember="select count(RowId) as totalmember from members where Active='1'";
	$resulttotal=mysql_query($totalmember);
	$rowtotal=mysql_fetch_array($resulttotal);
	$total=$rowtotal["totalmember"];
	return $total;
}

function totalmember_active(){
	$totalmember="select count(RowId) as totalmember from members where  Active='1' and Status='1'";
	$resulttotal=mysql_query($totalmember);
	$rowtotal=mysql_fetch_array($resulttotal);
	$total=$rowtotal["totalmember"];
	return $total;
}

function totalmember_expired(){
	$totalmember="select count(RowId) as totalmember from members where  (Status<>'1') and date(ExpiredDate)<date(now())";
	$resulttotal=mysql_query($totalmember);
	$rowtotal=mysql_fetch_array($resulttotal);
	$total=$rowtotal["totalmember"];
	return $total;
}

function totalmember_registeredtoday(){
	$totalmember="select count(RowId) as totalmember from members where  Active='1' and Status='1' and date(CreatedAt)=date(now())";
	$resulttotal=mysql_query($totalmember);
	$rowtotal=mysql_fetch_array($resulttotal);
	$total=$rowtotal["totalmember"];
	return $total;
}

function totalmember_goingexpired(){
	$totalmember="select count(RowId) as totalmember  from members where Active='1' and Status='1' and (date(NOW())-date(ExpiredDate))<=30 and date(ExpiredDate)<date(now())";
	$resulttotal=mysql_query($totalmember);
	$rowtotal=mysql_fetch_array($resulttotal);
	$total=$rowtotal["totalmember"];
	return $total;
}

function totalrequesttoday(){
	$totalrequest="select count(RowId) as totalrequest  from printcard_proses where date(RequestTime)=date(now())";
	$resulttotal=mysql_query($totalrequest);
	$rowtotal=mysql_fetch_array($resulttotal);
	$total=$rowtotal["totalrequest"];
	return $total;



}



function totalrequestmonth(){
	$totalrequest="select count(RowId) as totalrequest  from printcard_proses where  month(RequestTime)=month(now())";
	$resulttotal=mysql_query($totalrequest);
	$rowtotal=mysql_fetch_array($resulttotal);
	$total=$rowtotal["totalrequest"];
	return $total;



}

function totalrequestyear(){
	$totalrequest="select count(RowId) as totalrequest  from printcard_proses where  year(RequestTime)=year(now())";
	$resulttotal=mysql_query($totalrequest);
	$rowtotal=mysql_fetch_array($resulttotal);
	$total=$rowtotal["totalrequest"];
	return $total;



}

function totalcomplete(){
	$totalrequest="select count(RowId) as totalrequest  from printcard_proses where  Status='F'";
	$resulttotal=mysql_query($totalrequest);
	$rowtotal=mysql_fetch_array($resulttotal);
	$total=$rowtotal["totalrequest"];
	return $total;



}

function totalcancel(){
	$totalrequest="select count(RowId) as totalrequest  from printcard_proses where  Status='C'";
	$resulttotal=mysql_query($totalrequest);
	$rowtotal=mysql_fetch_array($resulttotal);
	$total=$rowtotal["totalrequest"];
	return $total;



}

function totalwaiting(){
	$totalrequest="select count(RowId) as totalrequest  from printcard_proses where  Status='R'";
	$resulttotal=mysql_query($totalrequest);
	$rowtotal=mysql_fetch_array($resulttotal);
	$total=$rowtotal["totalrequest"];
	return $total;



}


?>

<h2> <img src="images/icons/home.png" height="32" align="left">Home </h2>
				<div class="content-box column-left sidebar" style="margin-right:15px;">
					<div class="content-box-header">
						<h3>Info Member </h3>
					</div><!-- end .content-box-header -->					
					<div class="content-box-content">
						<table class="pagination" rel="5"><!-- add the class .pagination to dynamically create a working pagination! The rel-attribute will tell how many items there are per page -->
							<thead>
								<!--<tr>
									<th>Name</th>
									<th>Date</th>
								!-->
								</tr>
							</thead>									
							<tbody>						
						<tr><td>Total Member</td><td>:</td><td><?=totalmember();?></td></tr>
						<tr><td>Total Member Active</td><td>:</td><td><?=totalmember_active();?></td></tr>
						<tr><td style="color:#f00;font-weight:bold;">Total Member Expired</td><td>:</td><td><span class="redmark"><b><a style="color:#f00;font-weight:bold;" href="index.php?page=member_manage_criteria&criteria=expired"><?=totalmember_expired();?></a></b></span></td></tr>
						<tr><td>Total Member Registered Today</td><td>:</td><td><?=totalmember_registeredtoday();?></td></tr>
						<tr><td>Member Going Expired </td><td>:</td><td style="color:#f00;font-weight:bold;"><? echo (totalmember_goingexpired()==0) ? '0':'<blink><span class="redmark" style="color:#f00;font-weight:bold;"><a title="Click To Folow Up This Customer" href="index.php?page=member_manage_criteria&criteria=goingexpired">'.totalmember_goingexpired().'</a></span></blink>';?></td></tr>
							</tbody>
						</table>						
					</div><!-- end .content-box-content -->					
				</div><!-- end .content-box -->
				
				

					<div class="content-box column-left sidebar" style="margin-right:15px;">
					<div class="content-box-header">
						<h3>Card Request</h3>
					</div><!-- end .content-box-header -->					
					<div class="content-box-content">
						<table class="pagination" rel="5"><!-- add the class .pagination to dynamically create a working pagination! The rel-attribute will tell how many items there are per page -->
							<thead>
								<!--<tr>
									<th>Name</th>
									<th>Date</th>
								!-->
								</tr>
							</thead>									
							<tbody>		
	<tr><td>Total Request In Today</td><td>:</td><td><?=totalrequesttoday();?></td></tr>
	<tr><td>Total Request This  Month</td><td>:</td><td><?=totalrequestmonth();?></td></tr>
	<tr><td>Total Request This Year</td><td>:</td><td><?=totalrequestyear();?></td></tr>
					</tbody>
						</table>						
					</div><!-- end .content-box-content -->					
				</div><!-- end .content-box -->

				
							<div class="content-box column-right sidebar">
					<div class="content-box-header">
						<h3>Card Process </h3>
					</div><!-- end .content-box-header -->					
					<div class="content-box-content">
						<table class="pagination" rel="5"><!-- add the class .pagination to dynamically create a working pagination! The rel-attribute will tell how many items there are per page -->
							<thead>
								<!--<tr>
									<th>Name</th>
									<th>Date</th>
								!-->
								</tr>
							</thead>									
							<tbody>		
	<tr><td>Total Complete</td><td>:</td><td><?=totalcomplete();?></td></tr>
	<tr><td>Total Canceled</td><td>:</td><td><?=totalcancel();?></td></tr>
	<tr><td>Total Waiting</td><td>:</td><td><?=totalwaiting();?></td></tr>
					</tbody>
						</table>						
					</div><!-- end .content-box-content -->					
				</div><!-- end .content-box -->
				
				



<div class="clear"></div>

          <div class="content-box">
					<div class="content-box-header">
						<h3>Card Process Table</h3>
						
						<!-- You can create tabs with unordered lists -->
						<ul>						
							<li>
								<a href="#bar">Card Request</a>
							</li>
													
						
						</ul>
					</div>
					
					<div class="content-box-content">												
						<div class="tab-content" id="bar">
							<div id="charts_pendapatan" style="width: 900px; height:700px;min-height:700px;height:auto !important;margin:0 auto;">
							<?
							include_once "card_waiting.php";
							?>
							</div>
								
						</div><!-- end .tab-content -->
						
						<div class="tab-content" id="area">
						<div id="charts_member" style="width: 900px; height:700px;min-height:700px;height:auto !important;margin:0 auto;">
					
						
							</div>
						</div>
						</div><!-- end .tab-content -->
					</div><!-- end .content-box-content -->
				</div>
