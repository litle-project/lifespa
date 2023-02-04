<html>
<head>

	<meta charset="utf-8">

	<title>Lifespa Information Screen</title>

	<!-- jQuery (required) & jQuery UI (for this demo only) -->
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

	<!-- Anything Slider optional plugins -->
	<script src="js/jquery.easing.1.2.js"></script>
	<script src="js/swfobject.js"></script> <!-- http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js -->

	<!-- Anything Slider -->

	<script src="js/jquery.anythingslider.js"></script>

	<link rel="stylesheet" href="css/anythingslider.css">
	<link rel="stylesheet" href="css/theme-metallic.css" media="screen">
	<link rel="stylesheet" href="demos/css/page.css">
	<link rel="stylesheet" href="demos/colorbox/colorbox.css">
		<link rel="stylesheet" type="text/css" href="css/layout.css" media="all">
		<link rel="stylesheet" type="text/css" href="css/li-scroller.css" media="all">
		   <link rel="stylesheet" type="text/css" href="css/jquery.jdigiclock.css" />
		
	<!-- Older IE stylesheet, to reposition navigation arrows, added AFTER the theme stylesheet above -->
	<!--[if lte IE 7]>
	<link rel="stylesheet" href="css/anythingslider-ie.css" type="text/css" media="screen" />
	<![endif]-->

	<!-- AnythingSlider optional FX extension -->
	<script src="js/jquery.anythingslider.fx.js"></script>


	<script src="demos/js/demo.js"></script>
	<script src="demos/colorbox/jquery.colorbox-min.js"></script>
	<script type="text/javascript" src="js/jquery.cycle.all.2.74.js"></script>
		<script type="text/javascript" src="js/jquery.li-scroller.1.0.js"></script>
 <script type="text/javascript" src="js/jquery.jdigiclock.js"></script>
	<script type="text/javascript">
	
$(document).ready(function() {
    $('.slideshow').cycle({
		fx: 'fade' // choose your transition type, ex: fade, scrollUp, shuffle, etc...
	});
	
	$("ul#ticker02").liScroll({travelocity: 0.06}); 
	   $('#digiclock').jdigiclock({
            // Configuration goes here
			am_pm:false,
        });


	
});
</script>

</head>
<body>


	<div id="wrapper">
		<div id="container">
			<div id="content">
			<img src="images/Lifespa_logo.jpg" height="50" style="margin-left:25px;" align="middle">
				<span style="margin-left:10px;padding-top:20px;font:30px verdana;color:#fff;"> Lifespa Information Screen</span></h1>
				   <!-- AnythingSlider #2 -->
				   <ul id="slider2">
					<li class="panel1">
					 <div class="textSlide">
					  <img src="assets/p05.gif" alt="tomato sandwich" style="float: right; margin: 0 0 2px 10px;" />
					  <h3>Lifespa Sultan</h3>
					  <h4>Fitness Class:</h4>
					  <ul>
					   <li>Group Exercise Classes</li>
					   <li>Fitness Assessment</li>
					   <li>Fitness Appraisal</li>
					   <li>Personal Trainers</li>
					   <li>Cardiovascular Equipment</li>
					  </ul>
					 </div>
					</li>
					<li class="panel2">
					 <div class="quoteSlide">
					  <blockquote>In awe I watched the waxing moon ride across the zenith of the heavens like an ambered chariot towards the ebon void of infinite space wherein the tethered belts of Jupiter and Mars hang forever festooned in their orbital majesty. And as I looked at all this I thought... I must put a roof on this lavatory.<p>~ Les Dawson</p></blockquote>
					 </div>
					</li>
					<li class="panel3">
					 <img class="expand" src="http://www.primaironline.com/images_content/20090702Hotel%20Sultan.jpg" alt="" />
					</li>
					<li class="panel4">
					 <div class="quoteSlide">
					  <blockquote>Life is conversational. Web design should be the same way. On the web, you're talking to someone you&#8217;ve probably never met – so it's important to be clear and precise. Thus, well structured navigation and content organization goes hand in hand with having a good conversation.</blockquote>
					  <p> - <a id='perma' href='http://quotesondesign.com/chikezie-ejiasi/'>Chikezie Ejiasi</a></p>
					 </div>
					</li>
					<li class="panel5">
					 <img class="fade" src="demos/images/schedule_sultan.jpg" alt="" />
					</li>
					
					
				   </ul>
				   <!-- END AnythingSlider #2 -->
			</div>
			<div id="right">
			
				<img src="assets/membercards.gif" align="center"/><br/><br/>
				<div class="slideshow">
					<img src="assets/juicebar2.gif" width="200" height="200" />
					<img src="assets/facilities02.gif" width="200" height="200" />
					<img src="assets/bodymask.jpg" width="200" height="200" />
					<img src="assets/ladygettingmassage.jpg" width="200" height="200" />
				</div>
				<h3>Promo May 2011</h3>
				
- Get Discount 10% New &nbsp;&nbsp;&nbsp;Membership <br/>
				 - Get Free Juice for Gold Member 
		
			
			
			</div>
			<div class="clear"></div>
		
		<div id="footer">
			<ul id="ticker02">
				<li><span>10:30 </span><a href="#">Welcome to Lifespa Fitness</a></li>
				<li><span>15:10 </span><a href="#">Promo 50% Juice Bar selama 01 Mei s/d 01 Juni 2011 </a></li>
				<li><span>20:05 </span><a href="#">Class Fitness Monday ditiadakan Karena Libur Nasional  </a></li>
				<li><span>15:10 </span><a href="#">Get Special Promo for New Membership in May 2011 </a></li>
				<li>- For further information please contact Lifespa Hotline : Tel. 57891062-3</li>
				<!-- eccetera -->
			</ul>

		</div>
		
		</div>
		
	
	</div>
</body>
</html>