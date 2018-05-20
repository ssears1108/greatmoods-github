<?php 

?>

<head>
	<meta charset="UTF-8">
	<meta name="wot-verification" content="afd275378407e34df6ec"/>
	
	<link rel="shortcut icon" href="../images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="../css/global_styles.css">
	<link rel="stylesheet" type="text/css" href="../css/allforms_styles.css">
	<link rel="stylesheet" href="../images/font-awesome-4.6.3/css/font-awesome.min.css">
		
	<script type="text/javascript" src="../jquery-ui-1.10.3/jquery-1.9.1.js"></script>
	<script> $(document).ready(function(){ $("button").click(function(){ $("show").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button1").click(function(){ $("show1").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button2").click(function(){ $("show2").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button3").click(function(){ $("show3").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button4").click(function(){ $("show4").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button5").click(function(){ $("show5").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button6").click(function(){ $("show6").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button7").click(function(){ $("show7").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button8").click(function(){ $("show8").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button9").click(function(){ $("show9").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button10").click(function(){ $("show10").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button11").click(function(){ $("show11").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button12").click(function(){ $("show12").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button13").click(function(){ $("show13").toggle(); }); }); </script>
	<script> $(document).ready(function(){ $("button14").click(function(){ $("show14").toggle(); }); }); </script>
	
	<script>
		function calculateSchool(orgType) {
		        var price = 35; 
		        var commission = .35;
			//elementary schools
			//var num7 = Number(document.getElementById("Enum").value);
			//var fund7 = Number(document.getElementById("Efund").value);
			var people7 = Number(document.getElementById("Epeople").value);
			var percent7 = (Number(document.getElementById("Epercent").value))/100;
			var active7 = people7 * percent7;
			active7 = Number(active7);
			//document.getElementById("Eactive").innerHTML = active7;
			var baskets7 = Number(document.getElementById("Ebaskets").value);
			var numPerYear7 = Number(document.getElementById("EnumPerYear").value);
			var total7 = baskets7 * numPerYear7 * price * commission * active7;
			var result7 =  format(total7,2);
			document.getElementById("Etotal").innerHTML = result7;			
		}
		function format(num, dec) {
	        	return Math.round(num*Math.pow(10,dec))/Math.pow(10,dec);
	        }
	</script>
	
	<!-- jQuery (required) -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	
	<!-- Optional plugins -->
	<script src="../CSS-Tricks-AnythingSlider/js/jquery.easing.1.2.js"></script>
	<script src="../CSS-Tricks-AnythingSlider/js/swfobject.js"></script>
	
	<!-- Anything Slider -->
	<link rel="stylesheet" href="../CSS-Tricks-AnythingSlider/css/anythingslider.css">
	<script src="../CSS-Tricks-AnythingSlider/js/jquery.anythingslider.js"></script>
	
	<!-- Add the stylesheet(s) you are going to use here. -->
	<link rel="stylesheet" href="../CSS-Tricks-AnythingSlider/css/theme-cs-portfolio.css">
	
	<!-- AnythingSlider optional extensions -->
	<script src="../CSS-Tricks-AnythingSlider/js/jquery.anythingslider.fx.js"></script>
	<script src="../CSS-Tricks-AnythingSlider/js/jquery.anythingslider.video.js"></script>
	
	<!-- Required -->
	<script>
		$(function(){
		 $('#slider')
		   .anythingSlider() // add any non-default options here
		});
	</script>
</head>

<div id="container">
  <div id="headerMain">
  	<div id="bannerwrap"><a href="#"><img id="logo2" src="../images/whitelogo.png" alt="GreatMoods Logo"></a>
  		<img id="banner" src="../<?php echo $banner;?>" width="1024" height="150" alt="banner placeholder" /></div>
  	
    <div id="menuWrapper"> </div> <!--end menuWrapper-->
	<ul class="nav">
    	<li><a href="#">My Account Login</a>
    		<div class="newlogin">
		        <?php
		            if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
		                echo '<form id="newlogin" action="../logInUser.php" method="post">';
		                echo '<label class="userlogin">Username:</label>
		                      <input id="loginemail" type="text" name="email" value="">';
		                echo '<br>';
		                echo '<label class="userlogin">Password:</label>
		                      <input id="loginpassword" type="password" name="password" value="" >';
		                echo '<br>';
		                echo '<input id="redbutton" class="user" name="login" type="submit" value="Login" />';
		                echo '</form>';
		                
		            } elseif($_SESSION['LOGIN'] == "TRUE") {
		                echo '<div class="mallmenu">
		         		<div class="nav-column">';
		         	echo '<h4><a href="memberLogin.php" title="Choose a Different Group Account">Login Home</a></h4>';
		                echo '<h4><a href="memberHome.php">Account Home</a></h4>';
		                echo '<h4><a href="reset.php">Change My Password</a></h4>';
		         	include('../includes/logout.inc.php');
		         	echo '</div>
		         		</div>';
		              }
		         ?>
 
      		</div> <!--end login-->
    	</li>
    	
     <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Womens/c/18159169/offset=0&sort=priceAsc">Women</a>
        <?php include 'menu_women.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Accessories/c/18195523/offset=0&sort=priceAsc">Accessories</a>
        <?php include 'menu_accessories.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Mens/c/18159150/offset=0&sort=priceAsc">Men</a>
        <?php include 'menu_men.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Juniors/c/18195671/offset=0&sort=priceAsc">Juniors</a>
        <?php include 'menu_juniors.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Kids/c/18209039/offset=0&sort=priceAsc">Kids</a>
        <?php include 'menu_kids.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Baby/c/18209573/offset=0&sort=priceAsc">Baby</a>
        <?php include 'menu_baby.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Fitness/c/18209624/offset=0&sort=priceAsc">Fitness</a>
        <?php include 'menu_fitness.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Food/c/18209702/offset=0&sort=priceAsc">Food</a>
        <?php include 'menu_food.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Entertainment/c/18209743/offset=0&sort=priceAsc">Entertainment</a>
        <?php include 'menu_entertainment.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Houseware/c/18209794/offset=0&sort=priceAsc">Housewares</a>
        <?php include 'menu_housewares.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Health/c/18209818/offset=0&sort=priceAsc">Health</a>
        <?php include 'menu_health.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Inspirational/c/18209845/offset=0&sort=priceAsc">Inspirational</a>
        <?php include 'menu_inspirational.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Holiday/c/18209901/offset=0&sort=priceAsc">Holiday</a>
        <?php include 'menu_holiday.php'; ?>
    </li>
    <li><a href="greatmoodsMall.php?group=<?php echo $_GET['group']; ?>&storeid=900#!/Business/c/18209939/offset=0&sort=priceAsc">Business</a>
        <?php include 'menu_business.php'; ?>
    </li>
   <li><a href="#">Education Examples</a>
    	<?php include 'menu_education_examples.php'; ?>
    </li>
    <li><a href="#">Organizations</a>
    	<?php include 'menu_organization_examples.php'; ?>
    </li>
</ul>
</div> <!--end headerMain-->  