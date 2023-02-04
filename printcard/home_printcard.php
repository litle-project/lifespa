<?
session_start();
include_once "includes/setting.php";
	include_once "includes/cekhakakses.php";



function totalmember($outlet){
	$totalmember="select count(RowId) as totalmember from members where OutletId='".$outlet."'";
	$resulttotal=mysql_query($totalmember);
	$rowtotal=mysql_fetch_array($resulttotal);
	$total=$rowtotal["totalmember"];
	return $total;
}

function totalmember_active($outlet){
	$totalmember="select count(RowId) as totalmember from members where OutletId='".$outlet."' and Active='1' and Status='1'";
	$resulttotal=mysql_query($totalmember);
	$rowtotal=mysql_fetch_array($resulttotal);
	$total=$rowtotal["totalmember"];
	return $total;
}

function totalmember_expired($outlet){
	$totalmember="select count(RowId) as totalmember from members where OutletId='".$outlet."' and (Status<>'1') and date(ExpiredDate)<date(now())";
	$resulttotal=mysql_query($totalmember);
	$rowtotal=mysql_fetch_array($resulttotal);
	$total=$rowtotal["totalmember"];
	return $total;
}

function totalmember_registeredtoday($outlet){
	$totalmember="select count(RowId) as totalmember from members where OutletId='".$outlet."' and Active='1' and Status='1' and date(CreatedAt)=date(now())";
	$resulttotal=mysql_query($totalmember);
	$rowtotal=mysql_fetch_array($resulttotal);
	$total=$rowtotal["totalmember"];
	return $total;
}

function totalmember_goingexpired($outlet){
	$totalmember="select count(RowId) as totalmember  from members where OutletId='".$outlet."' and Active='1' and Status='1' and (date(NOW())-date(ExpiredDate))<=7 and date(ExpiredDate)<date(now())";
	$resulttotal=mysql_query($totalmember);
	$rowtotal=mysql_fetch_array($resulttotal);
	$total=$rowtotal["totalmember"];
	return $total;
}

function totalcheckintoday($outlet){
	$totalcheckin="select count(RowId) as totalcheckin  from reservations where OutletId='".$outlet."' and Active='1' and date(CheckedInAt)=date(now())";
	$resulttotal=mysql_query($totalcheckin);
	$rowtotal=mysql_fetch_array($resulttotal);
	$total=$rowtotal["totalcheckin"];
	return $total;



}

function totalmembercheckintoday($outlet){
	$totalcheckin="select count(RowId) as totalcheckin  from reservations where OutletId='".$outlet."' and Active='1' and IsMember='1' and date(CheckedInAt)=date(now())";
	$resulttotal=mysql_query($totalcheckin);
	$rowtotal=mysql_fetch_array($resulttotal);
	$total=$rowtotal["totalcheckin"];
	return $total;



}

function totalguestcheckintoday($outlet){
	$totalcheckin="select count(RowId) as totalcheckin  from reservations where OutletId='".$outlet."' and Active='1' and IsMember<>'1' and date(CheckedInAt)=date(now())";
	$resulttotal=mysql_query($totalcheckin);
	$rowtotal=mysql_fetch_array($resulttotal);
	$total=$rowtotal["totalcheckin"];
	return $total;



}

function totalcheckinmonth($outlet){
	$totalcheckin="select count(RowId) as totalcheckin  from reservations where OutletId='".$outlet."' and Active='1' and month(CheckedInAt)=month(now())";
	$resulttotal=mysql_query($totalcheckin);
	$rowtotal=mysql_fetch_array($resulttotal);
	$total=$rowtotal["totalcheckin"];
	return $total;



}

function totalmembercheckinmonth($outlet){
	$totalcheckin="select count(RowId) as totalcheckin  from reservations where OutletId='".$outlet."' and IsMember='1' and Active='1' and month(CheckedInAt)=month(now())";
	$resulttotal=mysql_query($totalcheckin);
	$rowtotal=mysql_fetch_array($resulttotal);
	$total=$rowtotal["totalcheckin"];
	return $total;



}

function totalguestcheckinmonth($outlet){
	$totalcheckin="select count(RowId) as totalcheckin  from reservations where OutletId='".$outlet."' and IsMember<>'1' and Active='1' and month(CheckedInAt)=month(now())";
	$resulttotal=mysql_query($totalcheckin);
	$rowtotal=mysql_fetch_array($resulttotal);
	$total=$rowtotal["totalcheckin"];
	return $total;



}
?>


				<div class="content-box column-left sidebar" style="margin-right:15px;">
					<div class="content-box-header">
						<h3>Info Member <?=$_SESSION["life_outletid"];?></h3>
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
						<tr><td>Total Member</td><td>:</td><td><b><?=totalmember($_SESSION["life_outletid"]);?></b></td></tr>
						<tr><td>Total Member Active</td><td>:</td><td><?=totalmember_active($_SESSION["life_outletid"]);?></td></tr>
						<tr><td style="color:#f00;font-weight:bold;">Total Member Expired</td><td>:</td><td><span class="redmark"><b><a style="color:#f00;font-weight:bold;" href="index.php?page=member_manage_criteria&criteria=expired"><?=totalmember_expired($_SESSION["life_outletid"]);?></a></b></span></td></tr>
						<tr><td>Total Member Today</td><td>:</td><td><?=totalmember_registeredtoday($_SESSION["life_outletid"]);?></td></tr>
						<tr><td colspan="3"></td></tr>
						<tr><td>Member Going Expired </td><td>:</td><td style="color:#f00;font-weight:bold;"><? echo (totalmember_goingexpired($_SESSION["life_outletid"])==0) ? '0':'<blink><span class="redmark" style="color:#f00;font-weight:bold;"><a title="Click To Folow Up This Customer" href="index.php?page=member_manage_criteria&criteria=goingexpired">'.totalmember_goingexpired($_SESSION["life_outletid"]).'</a></span></blink>';?></td></tr>
							</tbody>
						</table>						
					</div><!-- end .content-box-content -->					
				</div><!-- end .content-box -->
				
				

					<div class="content-box column-left sidebar" style="margin-right:15px;">
					<div class="content-box-header">
						<h3>Card Request <?=$_SESSION["life_outletid"];?></h3>
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
	<tr><td>Total Request In Today</td><td>:</td><td><?=totalcheckintoday($_SESSION["life_outletid"]);?></td></tr>
	<tr><td>Total Request This  Month</td><td>:</td><td><?=totalmembercheckintoday($_SESSION["life_outletid"]);?></td></tr>
	<tr><td>Total Request This Year</td><td>:</td><td><?=totalguestcheckintoday($_SESSION["life_outletid"]);?></td></tr>
					</tbody>
						</table>						
					</div><!-- end .content-box-content -->					
				</div><!-- end .content-box -->

				
							<div class="content-box column-right sidebar">
					<div class="content-box-header">
						<h3>Check In/Out This Month <?=$_SESSION["life_outletid"];?></h3>
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
	<tr><td>Total Check In This Month</td><td>:</td><td><?=totalcheckinmonth($_SESSION["life_outletid"]);?></td></tr>
	<tr><td>Member Check In This Month</td><td>:</td><td><?=totalmembercheckinmonth($_SESSION["life_outletid"]);?></td></tr>
	<tr><td>Guest Check In This Month</td><td>:</td><td><?=totalguestcheckinmonth($_SESSION["life_outletid"]);?></td></tr>
					</tbody>
						</table>						
					</div><!-- end .content-box-content -->					
				</div><!-- end .content-box -->
				
				



<div class="clear"></div>

          <div class="content-box">
					<div class="content-box-header">
						<h3>Statistics</h3>
						
						<!-- You can create tabs with unordered lists -->
						<ul>						
							<li>
								<a href="#bar">Income Per Month</a>
							</li>
													
							<li>
								<a href="#area">Member per Month</a>
							</li>
						</ul>
					</div>
					
					<div class="content-box-content">												
						<div class="tab-content" id="bar">
							<div id="charts_pendapatan" style="width: 900px; height:700px;margin:0 auto;">
							<iframe src="charts_pendapatan.php" width="900" height="700" scrolling="no" border="none" style="border:none;">
							</iframe>
							</div>
								
						</div><!-- end .tab-content -->
						
						<div class="tab-content" id="area">
						<div id="charts_member" style="width: 900px; height:700px;margin:0 auto;">
						<iframe src="charts_member.php" width="900" height="700" scrolling="no" border="none" style="border:none;">
						</iframe>
						</div>
						</div><!-- end .tab-content -->
					</div><!-- end .content-box-content -->
				</div>
<?
$menu=array();
		for ($im = 1; $im <= 12; $im++) {
			$menu[] = date("M Y",strtotime(date("Y").'-'.$im.'-01'));
			
		}
		
	$aray="'".join("','",$menu)."'";
?>
	<script type="text/javascript">
	var chart = new Highcharts.Chart({
				chart: {
					renderTo: 'chart1',
					defaultSeriesType: 'areaspline'
				},
				title: {
					text: 'Transaction Amount this week Outlet <?=$_SESSION["life_outletid"];?>'
				},
				legend: {
					layout: 'vertical',
					style: {
						position: 'absolute',
						bottom: 'auto',
						left: '150px',
						top: '100px'
					},
					borderWidth: 1,
					backgroundColor: '#FFFFFF'
				},
				xAxis: {
					categories: [
						'Monday', 
						'Tuesday', 
						'Wednesday', 
						'Thursday', 
						'Friday', 
						'Saturday', 
						'Sunday'
					],
					plotBands: [{ // visualize the weekend
						from: 4.5,
						to: 6.5,
						color: 'rgba(68, 170, 213, .2)'
					}]
				},
				yAxis: {
					title: {
						text: 'Income '
					}
				},
				tooltip: {
					formatter: function() {
			                return '<b>'+ this.series.name +'</b><br/>'+
							this.x +': '+ this.y +' Thousand Rupiah';
					}
				},
				credits: {
					enabled: false
				},
				plotOptions: {
					areaspline: {
						fillOpacity: 0.5
					}
				},
				series: [{
					name: '<?=$_SESSION["life_outletid"];?>',
					data: [5000, 4000, 3400, 5500, 4300, 1100, 8000]
				}]
			});

			
							var chart = new Highcharts.Chart({
				   chart: {
					  renderTo: 'containerbar',
					  defaultSeriesType: 'bar'
				   },
				   title: {
					  text: 'Sales Target Outlet <?=$_SESSION["life_outletid"];?>'
				   },
				   subtitle: {
					  text: 'Source: Life Spa Fitnes'
				   },
				   xAxis: {
					  categories: [
					  <?
					  echo "'Apr 2010', 'Mei 2010', 'June 2010', 'Jul 2010', 'Aug 2010'";
					  ?>
					  ],
					  title: {
						 text: null
					  }
				   },
				   yAxis: {
					  min: 0,
					  title: {
						 text: 'Money Thousand Rupiah',
						 align: 'high'
					  }
				   },
				   tooltip: {
					  formatter: function() {
						 return '<b>'+ this.x +'</b><br/>'+
							 this.series.name +': Rp.'+ this.y +' ';
					  }
				   },
				   plotOptions: {
					  bar: {
						 dataLabels: {
							enabled: true,
							color: 'auto'
							
						 }
					  }
				   },
				   legend: {
					  layout: 'vertical',
					  style: {
						 left: 'auto',
						
						 bottom: 'auto',
						 right: '100px',
						 top: '100px'
					  },
					  borderWidth: 1,
					  backgroundColor: '#FFFFFF'
				   },
				   credits: {
					  enabled: false
				   },
						series: <?php
									$querylistoutlet="select OutletId,OutletName from outlets where Active='1' and OutletId='".$_SESSION["life_outletid"]."'";
									$resultlistoutlet=mysql_query($querylistoutlet);
									function totalsales($outletid,$month,$year){
										$querytotaltransaction="select sum(PriceAfterTax) as totalsales from bills where  month(CreatedAt)='03' and year(CreatedAt)='2010' and OutletId='".$rowoutlet["OutletId"]."'";
										$resulttotaltransasction=mysql_query($querytotaltransaction);
										$rowsales=mysql_fetch_array($resultlistoutlet);
										return $rowsales["totalsales"];
									
									}
									$monthnow=date("n");
									$totalmonthview=5;
									$startmonth=$monthnow-$totalmonthview;
									if ($startmonth<0){
									$startmonth=12+$startmonth;
									}
									
									while($rowoutlet=mysql_fetch_array($resultlistoutlet)){
									
									
												$data[] = array("name"=>" ".$rowoutlet["OutletId"]."-(".$rowoutlet["OutletName"].")","data"=>array(
												
													9000000,1000000,3300000,4200000,5200000
														
												
												));
																		
									}		
									print json_encode($data);
									?> 
									
				});


			
			
	

			
					var chart = new Highcharts.Chart({
				chart: {
					renderTo: 'containerpie',
					margin: [50, 200, 60, 170]
				},
				title: {
					text: 'Browser market shares at a specific website, 2008'
				},
				plotArea: {
					shadow: null,
					borderWidth: null,
					backgroundColor: null
				},
				tooltip: {
					formatter: function() {
						return '<b>'+ this.point.name +'</b>: '+ this.y +' %';
					}
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						dataLabels: {
							enabled: true,
							formatter: function() {
								if (this.y > 5) return this.point.name;
							},
							color: 'white',
							style: {
								font: '13px Trebuchet MS, Verdana, sans-serif'
							}
						}
					}
				},
				legend: {
					layout: 'vertical',
					style: {
						left: 'auto',
						bottom: 'auto',
						right: '50px',
						top: '100px'
					}
				},
			        series: [{
					type: 'pie',
					name: 'Browser share',
					data: [
						['Firefox',   44.2],
						['IE7',       26.6],
						{
							name: 'IE6',
							y: 20,
							sliced: true,
							selected: true
						},
						['Chrome',    3.1],
						['Safari',    2.7],
						['Opera',     2.3],
						['Mozilla',   0.4]
					]
					//data: [3.40, 1.05, 2.90, 1.65, 1.35, 2.59, 1.39, 3.07, 2.82]
				}]
			});
			


			
		</script>
		<!-- 1a) Optional: the exporting module -->
		
		
