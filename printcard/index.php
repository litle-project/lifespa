<?
session_start();
require_once "includes/setting.php";
require_once "includes/session_check.php";
Header("Cache-control: private, no-cache");

Header("Pragma: no-cache");
$page=mysql_escape_string($_REQUEST["page"]);
$logout=mysql_escape_string($_REQUEST["logout"]);
$action=mysql_escape_string($_REQUEST["action"]);
$message=mysql_escape_string($_GET["message"]);

if (!isset($_SESSION["printcard_userid"]) or $_SESSION["printcard_session"]<>session_id()){
 header("location:".WEBROOT."login.php");
}

if ($logout=="true"){
	$tanggalsekarang=date("Y-m-d H:i:s");
	$iplogin=$_SERVER["REMOTE_ADDR"];
	
		
	session_unregister("printcard_userid");
	session_unregister("printcard_idlogin");
	session_unregister("printcard_username");
	session_unregister("printcard_session");

    header("location:".WEBROOT."login.php?message=".$message);						
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="en">
	<head>
	<meta http-equiv="pragma" content="no-cache" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<!-- Make IE8 behave like IE7, necessary for charts -->
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
		<title>
<?

if ($page<>'staticpage'){
echo ucfirst(str_replace("_"," ",$page)).' - Printcard System Lifespa Ver.1.0';
}else{

echo 'Printcard System Lifespa Ver.1.0';

}
?>

</title>		
		<link rel="stylesheet" type="text/css" media="screen" href="css/reset.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/main.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui-1.8.1.custom.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/dropdown.css" />
		<link type="text/css" href="css/themes/default/jx.stylesheet.css" rel="stylesheet" />
		<link type="text/css" rel="stylesheet" media="all" href="css/chat.css" />
		<link type="text/css" rel="stylesheet" media="all" href="css/nyroModal.full.css" />
			<link type="text/css" rel="stylesheet" media="all" href="media/css/demo_page.css" />
			<link type="text/css" rel="stylesheet" media="all" href="media/css/demo_table_jui.css" />
		<link type="text/css" rel="stylesheet" media="all" href="examples_support/themes/smoothness/jquery-ui-1.7.2.custom.css" />
	
		
		
		<!-- IE specific CSS stylesheet -->
		<!--[if IE]>
			<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css" />
		<![endif]-->
		
		<!-- This stylesheet contains advanced CSS3 features that do not validate yet -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/css3.css" />
		
		<!-- JavaScript -->
		<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	
		<script type="text/javascript" src="js/jquery.wysiwyg.js"></script>
		<script type="text/javascript" src="js/jquery.rounded.js"></script>
		<script type="text/javascript" src="js/excanvas.js"></script>
		<script type="text/javascript" src="js/jquery.visualize.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<script type="text/javascript" src="media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" src="js/jquery.nyroModal-1.3.1.pack.js"></script>
	
		<script type="text/javascript" src="js/jquery.alphanumeric.pack.js"></script>
		<script type="text/javascript" src="js/chat.js"></script>
		<!--[if lte IE 7]>
		<link type="text/css" rel="stylesheet" media="all" href="css/screen_ie.css" />
		<![endif]-->
		<script type="text/javascript" src="js/jixedbar-0.0.2.js"></script> 
		<script type="text/javascript" src="js/jquery.jeditable.mini.js"></script>
		<script type="text/javascript" src="js/ui/ui.core.js"></script>
			<script type="text/javascript" charset="utf-8">
			function viewrecentchat(dengan) {		
				var url='pop_recent_chat.php?dengan='+dengan;
				mywindow2 = window.open (url,  "mywindow2","location=0,status=0,scrollbars=1,toolbar=0, width=500,height=500");
				mywindow2.moveTo(0,0);
			} 
 
			var oTable;
		
			$(function() {			
				$('#myFormpop').submit(function() {
				$('#resultpop').fadeIn();
				$('#resultpop').html('<img src="images/loading.gif">');
					$.ajax({
						type: 'POST',
						url: $(this).attr('action'),
						data: $(this).serialize(),
						success: function(data) {
							
							$('#resultpop').html('<div class="notification information">'+data+'</div>');
							
						}
					});
					return false;
				});
			
	
			
				$("#demo-bar").jixedbar({
					hoverOpaque: true,
				roundedCorners: true
				});
			
			
					$('#fixedbottomchat').hide();
			
			$('#onlinechatclose').click(function(){
			$('#fixedbottomchat').hide();
			
			
			});
			
			$('#onlinechat').click(function(){
			$('#fixedbottomchat').show();
			
			
			});
			
			
			$('.numberinput').numeric({allow:"."});	

			      $('#example tr').click( function() {
					if ( $(this).hasClass('row_selected') )
						$(this).removeClass('row_selected');
					else
						$(this).addClass('row_selected');
				} );
				$('#check_all').click( function() {
					$('input', oTable.fnGetNodes()).attr('checked',this.checked);
					if ( $('#example tr').hasClass('row_selected2') )
						$('#example tr').removeClass('row_selected2 , row_selected');
					else
						$('#example tr').addClass('row_selected2');
				} );


				oTable = $('#example').dataTable({
					"bJQueryUI": true,
					"sPaginationType": "full_numbers"
					});
					
					oTable = $('#example2').dataTable({
					"bJQueryUI": true,
					"aaSorting": [  [1,'desc'] ],
					"sPaginationType": "full_numbers"
					});
					
				$('.popmodal').nyroModal({
					width: null, // default Width If null, will be calculate automatically
			  height: null, // default Height If null, will be calculate automatically
			  minWidth: 500, // Minimum width
			
			
			   bgColor:'#DFDFDF',
			   minHeight: 500, // Minimum height
			 resizable: true, // Indicate if the content is resizable. Will be set to false for swf
			  autoSizable: true // Indicate if the content is auto sizable. If not, the min size will be used
			  });
					
					
			$('.halfprintmodal').nyroModal({
			width:750, // default Width If null, will be calculate automatically
			  height: null, // default Height If null, will be calculate automatically
			  minWidth: 750, // Minimum width
			
			   bgColor:'#DFDFDF',
			   minHeight: 400, // Minimum height
			 resizable: true, // Indicate if the content is resizable. Will be set to false for swf
			  autoSizable: true // Indicate if the content is auto sizable. If not, the min size will be used
				});				
			});
		</script>
	</head>

	<body>
		<div id="bokeh">
		<div id="container">			
			<div id="header">
				<h1 id="logo">Lifespa </h1>				
				<div id="header_buttons">				
                    <span>Today's Date <?=date("d/M/Y ");?>&nbsp;<br/>Welcome <b><?=$_SESSION["printcard_username"];?></b>&nbsp;[&nbsp;<?=$_SESSION["printcard_userid"];?>&nbsp;] in Center <b><?=$_SESSION["printcard_outletid"];?></b></span>
					<!--<a href="#modal" rel="modal"><img src="images/envelope.png" alt="3 Messages" />Chat Online</a>!-->				
					<a href="#modal2" rel="modal">Change Password</a>
					<a href="index.php?logout=true">Logout</a>
					
				
				<!-- Modal box -->
				<div id="modal">	
					<div class="modalbox">
						<div class="modalhead">
							<img src="images/modaltop.png" alt="Modal arrow" />
							Mailbox
						</div>
						
						<div class="modalcontent">
							
							
							
							
						</div>
						
										<div class="modalfoot">
											Recent Chat History
										</div>
										
					</div>
				</div>
				
				<!-- Modal box 2 -->
				<div id="modal2">	
					<div class="modalbox">
						<div class="modalhead">
							<img src="images/modaltop.png" alt="Modal arrow" />
							Edit Password
						</div>
						
						<div class="modalcontent">
                                <form id="myFormpop" name="myFormpop" action="proses_editprofile.php?sessionid=<?=session_id();?>" method="post">
                                    <fieldset>
                                        <p>
                                            <label>Current Password</label>Current Password:
                                            <input id="cpass" type="password" class="medium" name="oldpassword"/><!-- add .align-right to align the input elements to the right -->
                                        </p>
                                        <p>
                                            <label>New Password</label>New Password:&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input id="npas" type="password" class="medium" name="newpassword1" /><!-- add .align-right to align the input elements to the right -->
                                        </p>
                                        <p>
                                            <label>Vreify New Password</label>Vreify Password:&nbsp;&nbsp;&nbsp;
                                            <input id="vpass" type="password" class="medium" name="newpassword2" /><!-- add .align-right to align the input elements to the right -->
                                        </p>
                                    </fieldset>
                                
                                    <input type="submit" value="Save" />
                                    <input type="reset" value="Reset" />
									
                                </form>
								<div id="resultpop"></div>
						</div>
							
						<div class="modalfoot">
							<!--img src="images/newmessage.png" alt="New message" /--> &nbsp;
						</div>
					</div>
				</div>
				</div><!-- end #header_buttons -->
				<div class="clear"></div>
				<!-- Navigation -->
				<?
				function ceknav($menu,$page){
					$lenmenu=strlen($menu);
					if (substr(strtolower($page),0,$lenmenu)==strtolower($menu)){
					return TRUE;
					}else{
					return FALSE;
					}
				
				}
				?>
				<ul id="main-nav">
					<li>
					<a href="<?=WEBROOT;?>index.php?page=home" <? echo (ceknav("home",$page)==TRUE) ? 'class="current"':'';?> >Home</a>
					</li>
						
				
						
					<li>
						<a href="#" <? echo (ceknav("member",$page)==TRUE) ? 'class="current"':'';?> >
							Member
						</a>					
						<ul>
							<li><a href="<?=WEBROOT;?>index.php?page=member_manage">Member Manage</a></li>
						
						</ul>
					</li>
						
					<li>
						<a href="#" <? echo (ceknav("report",$page)==TRUE) ? 'class="current"':'';?> >
							Printcard Process
						</a>
						
						<ul>
							<li><a href="<?=WEBROOT;?>index.php?page=card_waiting">Printcard Waiting Process</a></li>
							<li><a href="<?=WEBROOT;?>index.php?page=card_finish">Printcard Complete Process</a></li>
						</ul>
					</li>
		
					<? if ($_SESSION["printcard_level"]=="FINANCE" or $_SESSION["printcard_level"]=="ADMINISTRATOR"){?>
					<li>
						<a href="#" <? echo (ceknav("accounting",$page)==TRUE) ? 'class="current"':'';?>>
							Setting
						</a>
							<ul>
							<li><a href="<?=WEBROOT;?>index.php?page=card_waiting">Background</a></li>
							<li><a href="<?=WEBROOT;?>index.php?page=card_finish">Layout</a></li>
						</ul>
					
					</li>
					<?
					}
					?>
					
				</ul><!-- end #nav -->
				
			</div><!-- end #header -->
			
			<div id="content">
			
				<div class="notification information">
					This is an informative notification. Click me to hide me.
				</div>
                
                <!-- start icons -->
				<div class="content-box">
					<div class="content-box-content" style="text-align:center;">
                        <a href="index.php?page=home" title="Home"><img src="images/icons/home.png" title=" Home " /></a>
                  	
                        <a href="index.php?page=member_manage" title="List Member"><img src="images/icons/member_l.png" title=" Member list " /></a>
						
					 <a href="index.php?page=card_waiting" title="List Card Waiting"><img src="images/icons/card.png" title=" Card Waiting " width="64" /></a>
					 
					 	 <a href="index.php?page=card_finish" title="List Card Finish"><img src="images/icons/cardok.png" title=" Card Finish " width="64" /></a>
						
						
                  		
                    </div>
                </div>
			
					<?
			$page=strtolower($_GET["page"]);
			$filename =$page.'.php';

			if (file_exists($filename)) {
				include $filename;
			
			} else {
				echo "<center><img src='images/pagenotfound.jpg'></center>";
			}




			?>
				
							
			</div><!-- end #content -->
			
		</div></div><!-- end #bokeh and #container -->
		
		<div id="footer">
			&copy; 2010 LifeSpa PT. Fitindo Sehat Sempurna.
		</div><!-- end #footer -->

		
		<!-- fixed bar !-->
		
		
<div id="demo-bar" >

        <ul>
		  <li alt="Online Chat"><img src="<?=WEBROOT;?>icons/balloon-quotation.png"/><a id="onlinechat" href="javascript:">Online Chat </a></li>
		</ul>
		    <span class="jx-separator-left"></span>
		<ul>
            <li alt="LifeSpa Help"><a target="_blank" href="http://lifespa.web.id:8089/help"><img src="<?=WEBROOT;?>icons/book-open-bookmark.png" alt="Help" /></a></li>
        </ul>
	
        
        <span class="jx-separator-left"></span>
      
        
        <ul class="jx-bar-button-left">
         
            
        </ul>
        
        <span class="jx-separator-left"></span>        
		
        <div>
 
		</div>
        
        <span class="jx-separator-right"></span>
        
        <ul class="jx-bar-button-right">
          
			<div id="fixedbottomchat" class="modalboxchat" style="display:none;">
			<div class="modalheadchat">
			<div class="chattopleft" style="width:130px;float:left;"><B>Chat LifeSpa </B></div>
			<div class="chattopright" style="width:10px;float:left;"><a href="javascript:" id="onlinechatclose">X </a></div>
			<div class="clear"></div>
			</div>
			<div class="modalcontentchat">
			
			<?
								$tanggalstart = date("Y-m-d H:i:s",mktime(01,59,0,date("m"),date("d"),date("Y"))); 
							$tanggalend=date("Y-m-d H:i:s",mktime(01,59,0,date("m"),date("d")+1,date("Y"))); 
							
							function listonlinepergroup1($outletid,$tanggalstart,$tanggalend){							
								$querycheckonline="select * from roleregistrations left join systemusers on (roleregistrations.UserId=systemusers.UserId) left join employees on (systemusers.EmployeeId=employees.EmployeeId) where roleregistrations.IsLoggedOn='1' and systemusers.OutletId='".$outletid."' and roleregistrations.Active='1' and (roleregistrations.LoggedOnSince between '".$tanggalstart."' and '".$tanggalend."')";
								$resultcheckonline=mysql_query($querycheckonline);						
								if (mysql_num_rows($resultcheckonline)){
								while($rowonline=mysql_fetch_array($resultcheckonline)){
									if ($rowonline["UserId"]=="INDAH" or $rowonline["UserId"]=="DYAN"){									
									}else{									
															
									?>  <div class="content"><? echo ($rowonline["IsLoggedOn"]=='1') ? '<img src="'.WEBROOT.'images/onlinegreen.png" align="left">':'';?><a href="javascript:void(0)" onclick="javascript:chatWith('<?=$rowonline["UserId"];?>')"><B><?=$rowonline["UserId"];?></B></a>&nbsp;( <?=$rowonline["FirstName"];?> <?=$rowonline["MiddleName"];?>  ) </div>
										
									<?
									}								
								}
								}							
							}
							
							function checklistonlinepergroup1($outletid,$tanggalstart,$tanggalend){							
								$querycheckonline="select * from roleregistrations left join systemusers on (roleregistrations.UserId=systemusers.UserId) left join employees on (systemusers.EmployeeId=employees.EmployeeId) where roleregistrations.IsLoggedOn='1' and systemusers.OutletId='".$outletid."' and roleregistrations.Active='1' and (roleregistrations.LoggedOnSince between '".$tanggalstart."' and '".$tanggalend."')";
								$resultcheckonline=mysql_query($querycheckonline);						
								if (mysql_num_rows($resultcheckonline)){
									return TRUE;
								}							
							}
							
							$listoutlet="select * from outlets where Active='1' order by OutletId";
							$resultoutlet=mysql_query($listoutlet);
							while($rowoutlet=mysql_fetch_array($resultoutlet)){
							
								if (checklistonlinepergroup1($rowoutlet["OutletId"],$tanggalstart,$tanggalend)==TRUE){
									?>
									<div class="message">
									<b><?=$rowoutlet["OutletId"];?></b><br/>
									<?=listonlinepergroup1($rowoutlet["OutletId"],$tanggalstart,$tanggalend);?>
									</div>
									<?
								}
								
							}
							
							?>
							
			</div>
			<div id="chat-bottom" class="modalfootchat" style="border-top:1px solid #000;"><a href="javascript:" onClick="viewrecentchat('ALL');">View All Recent Chat</a></div>
			</div>
			<div id="main_container">

		
			<!-- YOUR BODY HERE -->

			</div>
        </ul>
        
        <span class="jx-separator-right">
		</span>

</div>
	



  </body>
</html>