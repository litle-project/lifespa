<?
session_start();
$message=$_GET["message"];
include_once "includes/setting.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<!-- Make IE8 behave like IE7, necessary for charts -->
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
		
<title>:: Printcard Lifespa Ver.1.1.0 -  </title>		
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/reset.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/login.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui-1.8.1.custom.css" />
		
		<!-- IE specific CSS stylesheet -->
		<!--[if IE]>
			<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css" />
		<![endif]-->
		
		<!-- This stylesheet contains advanced CSS3 features that do not validate yet -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/css3.css" />
		
		<!-- JavaScript -->
		<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="js/jquery.wysiwyg.js"></script>
		<script type="text/javascript" src="js/excanvas.js"></script>
		<script type="text/javascript" src="js/jquery.visualize.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		
	</head>

	<body>
		<div id="bokeh"><div id="container">
			
			<div id="header">
				<h1 id="logo">LifeSpa Management Login</h1>
			</div><!-- end #header -->
			
			<div id="content">
			
				<h2>&nbsp;</h2>
			
				<div id="login">
					
					<div class="content-box">
						<div class="content-box-header">
							<h3>Login PrintCard Lifespa Ver.1.1</h3>
						</div>
					
						<div class="content-box-content ">
						<div id="result">
						
							
							</div>
							<form id="loginform" action="proses_login.php" method="post">
					<input type="hidden" name="action" value="login">
					
						
						<table>
						<tr><td>Username </td><td><input id="loginName" size="20" maxlength="20" class="textFieldLogin" name="userid" type="text" value=""></td></tr>
						<tr><td>Password </td><td><input id="loginPass" size="20" maxlength="20"  class="textFieldLogin" name="password" type="password" value=""></td></tr>
					
						<tr><td colspan="2">
							<input type="submit" value="Login" />
						</td></tr>
						</table>
						</form>
						</div>
					</div><!-- end .content-box -->
				</div><!-- end #login -->
											
			</div><!-- end #content -->
			
			<div id="push"></div><!-- push footer down -->
			
		</div></div><!-- end #container -->
		
		<div id="footer">
			&copy; 2010 LifeSpa PT. Fitindo Sehat Sempurna
		</div><!-- end #footer and #bokeh -->
		
	</body>
</html>