<?php
	session_start();
	if(($_SESSION['role'] == 'MemberLeader' || $_SESSION['role'] == 'Member') && isset($_SESSION['authenticated']))
       {
          //authenicated
       }
       else
       {
            header('Location: ../index.php');
            exit;
       }
	ob_start();
	include '../includes/connection.inc.php';
	//
	$link = connectTo();
	$groupid = $_GET["groupid"];
        $userID = $_SESSION['userId'];
	$table = "Dealers";
	// check if form has been submitted
	if(isset($_POST['submit'])){
	   // list expected fields
	     $expected = array('groupName','address1','address2','city','state','zip','setup_person','websiteURL','paypalID','facebookURL','twitterURL','groupID');
	   // set required fields
	     $required = array('groupName','setup_person', 'groupID');
	   require('processForm.php');
	   $groupName = mysqli_real_escape_string($link, $groupName);
	
	   $query = "UPDATE $table SET
  				Dealer = '$groupName',
  				Address1 = '$address1',
  				Address2 = '$address2',
  				City = '$city',
  				State = '$state',
  				Zip = '$zip',
  				setuppersonid = '$setup_person',
  				website = '$websiteURL',
  				PaypalEmail = '$paypalID',
  				facebook  = '$facebookURL',
  				twitter	= '$twitterURL'
  				WHERE loginid = '$groupID'";
  				$result = mysqli_query($link, $query)or die("MySQL ERROR: ".mysqli_error($link)); 
  	if($result){
  	    $redirect = "Location:reasons.php?groupid=$groupid";
  	    header("$redirect");
  	}			
  				
	
	}// end if(isset($_POST['submit']))
	
	$query = "SELECT * FROM $table WHERE loginid='$groupid'";
	$result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error());
	$row = mysqli_fetch_assoc($result);
	$fundraiserid = $row['loginid'];
	$group_name = $row['Dealer'];
	$address1 = $row['Address1'];
	$address2 = $row['Address2'];
	$city = $row['City'];
	$zip = $row['Zip'];
        $state = $row['State'];
        $url = $row['website'];
       $twit = $row['twitter']; 
        $face = $row['facebook'];
        $pal = $row['PaypalEmail'];
        $about = $row['about'];
        $reasons = $row['FundraiserReasons'];
        $goal = $row['FundraiserGoal'];
        $about = $row['About'];
        $start = $row['FundraiserStartDate'];
        $end = $row['FundraiserEndDate'];
        
        
        	
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8" />
	<title>GreatMoods | Setup/Edit Website - General Information</title>
	<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript">
	function validate(form) {
		var pass1 = form['loginPass'].value;
		var pass2 = form['confirmPass'].value;
		if(pass1 == "" || pass1 == null) {
			alert("please enter a valid password");
			return false;
		}
		if(pass1 != pass2) {
			alert("passwords do not match");
			return false;
		}
		return true;
	}
	</script>
	<link href="../css/mainRecruitingStyles.css" rel="stylesheet" type="text/css" />
	<link href="../css/setupFormStyles.css" rel="stylesheet" type="text/css" />
	<link href="../css/headerSampleWebsiteStyles.css" rel="stylesheet" type="text/css">
	<link href="../css/leftSidebarNav.css" rel="stylesheet" type="text/css">
	</head>
	<body id="info">
<div id="container">
      <div id="headerMain"> <img id="banner" src="../<?php echo $_SESSION['banner'];?>" width="1024" height="150" alt="banner placeholder" /> 
				<div id="menuWrapper"> </div>
				<div id="login">
					<?php
						if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == "FALSE") {
							echo '<form id="log" action="../includes/logInUser.php" method="post">';
							echo '<label class="user" id="user">Username: </label>
								<input type="text" name="email" id="user" value="">';
							echo '<label class="user" id="user"> Password: </label>
								<input type="password" name="password" id="password" value="" >';
							echo '<input class="user" id="user" name="login" type="submit" value="login" />';
							echo '</form>';
							echo '<div id="register">';
							echo '<p class="forgotpw"><a href="">Forgot Password?</a><br />';
							echo '<a href="">Register Now</a></p>';
							echo '</div>';   
						} 
						elseif($_SESSION['LOGIN'] == "TRUE") {
							include('../includes/logout.inc.php');
						}
					?>
				</div> <!--end login--> 
				<div id="mainNav">
					<ul id="menuSample">
						<li><a href="../index.php">GreatMoods <br/>Homepage</a></li>
						<li><a href="" class="drop">GreatMoods<br>Mall Directory</a>
          						<?php include '../includes/menu_mall_directory_site.php'; ?>
						 <?php
					         if(isset($_SESSION['authenticated']))
					        {
					        ?>
					          <!--<li><a href="gettingstarted.php?group=<? echo $_SESSION['fundid'];?>">Getting<br>Started</a></li>-->
					          <li><a href="memberHome.php?group=<? echo $_SESSION['fundid'];?>">Setup/Edit<br>Website</a></li>
					          <li><a href="emails.php?group=<? echo $_SESSION['fundid'];?>">Setup/Edit<br>Emails</a></li>
					          <!--<li><a href="membersitehelp.php?group=<? echo $_SESSION['fundid'];?>">Help</a></li>-->
					        <?php }?>
					</ul>
				</div> <!--end mainNav-->
			</div> <!--end headerMain-->
      		<br>
      		<br>
     <link href="../css/leftSidebarNav.css" rel="stylesheet" type="text/css">
			<div id="leftSideBarSample">
				<ul id="sideNavSample">
					<li><a href="../fundSite.php?groupid=<? echo $_SESSION['fundid'];?>">View Website</a></li>
					<li>About Our Fundraiser</li>
					<li>Gift Baskets & Products<br>Order Now!</li>
					<li>Fundraising Contacts</li>
					<li>Help<br>Training Tips,<br>Tools & Forms</li>
					<li><a href="#">My Account</a></li>
				</ul>
			</div>
      <div id="contentMain858">
    <div class="nav2">
        <ul class="setupNav">
        <li><a href="coordhome.php" class="infonav">Account Home</a></li>
        <li>|</li>
        <li id="current"><a href="information.php" class="infonav">Information</a></li>
        <li>|</li>
        <li><a href="reasons.php?groupid=<?echo $groupid;?>" class="reasonsnav">Reasons</a></li>
        <li>|</li>
        <li><a href="contacts.php?groupid=<?echo $groupid;?>" class="contactsnav">Contacts</a></li>
        <li>|</li>
        <li><a href="photos.php?groupid=<?echo $groupid;?>" class="photosnav">Photos</a></li>
        <li>|</li>
        <li><a href="goals.php?groupid=<?echo $groupid;?>" class="goalsnav">Goals</a></li>
        <li>|</li>
        <li><a href="members.php?groupid=<?echo $groupid;?>" class="goalsnav">Add Members</a></li>
        <li>|</li>
        <li><a href="emails.php?groupid=<?echo $groupid;?>" class="goalsnav">Send Emails</a></li>
      </ul>
        </div>
    <!--end nav2--> 

   <p style="font-size: 24px;">Edit Account</p>
   
    <div class="setupLeft">
    <h3>Fundraising Group Information</h3>
    <p>Required fields are marked with <span class="required">*</span></p>
    <?php if ($_POST && $suspect){ ?>
    <p class="warning">Sorry, your mail could not be sent. Please try later.</p>
    <?php } elseif ($missing || $errors) { ?>
    <p class ="warning">Please fix the item(s) indicated.</p>
    <?php } ?>
    <form class="distributor1" action="information.php" method="POST" name="addOrg" enctype="multipart/form-data" id="addOrg" onSubmit="return validate(this);">
          <table class="genInfo1">
        <tr>
              <td colspan="3"><label for="groupName"> Fundraising Group Name<span class="required">*</span></label></td>
            </tr>
        <tr>
              <td colspan="3"><input type="text" id="groupName" name="groupName" maxlength="40" value="<? echo  $group_name;?>" required/></td>
            </tr>
        <tr>
              <td colspan="3"><label for="address1"> Address 1<span class="required">*</span></label></td>
            </tr>
        <tr>
              <td colspan="3"><input type="text" id="address1" name="address1" maxlength="40" value="<? echo $address1; ?>"/></td>
            </tr>
        <tr>
              <td colspan="3"><label for="address2"> Address 2</label></td>
            </tr>
        <tr>
              <td colspan="3"><input type="text" id="address2" name="address2" maxlength="40" value="<? echo $address2; ?>" required/></td>
            </tr>
        <tr>
              <td><label for="city"> City<span class="required">*</span></label></td>
              <td><label for="state"> State<span class="required">*</span></label></td>
              <td><label for="zip"> ZIP<span class="required">*</span></label></td>
            </tr>
        <tr>
              <td><input id="city" type="text" maxlength="30" name="city" value="<? echo $city; ?>"/></td>
              <td><select id="state" name="state" size="1" required>
                  <option value="<?php echo $state; ?>"><?php echo $state; ?></option>
                  <option value="AL">Alabama</option>
                  <option value="AK">Alaska</option>
                  <option value="AZ">Arizona</option>
                  <option value="AR">Arkansas</option>
                  <option value="CA">California</option>
                  <option value="CO">Colorado</option>
                  <option value="CT">Connecticut</option>
                  <option value="DE">Delaware</option>
                  <option value="FL">Florida</option>
                  <option value="GA">Georgia</option>
                  <option value="HI">Hawaii</option>
                  <option value="ID">Idaho</option>
                  <option value="IL">Illinois</option>
                  <option value="IN">Indiana</option>
                  <option value="IA">Iowa</option>
                  <option value="KS">Kansas</option>
                  <option value="KY">Kentucky</option>
                  <option value="LA">Louisiana</option>
                  <option value="ME">Maine</option>
                  <option value="MD">Maryland</option>
                  <option value="MA">Massachusetts</option>
                  <option value="MI">Michigan</option>
                  <option value="MN">Minnesota</option>
                  <option value="MS">Mississippi</option>
                  <option value="MO">Missouri</option>
                  <option value="MT">Montana</option>
                  <option value="NE">Nebraska</option>
                  <option value="NV">Nevada</option>
                  <option value="NH">New Hampshire</option>
                  <option value="NJ">New Jersey</option>
                  <option value="NM">New Mexico</option>
                  <option value="NY">New York</option>
                  <option value="NC">North Carolina</option>
                  <option value="ND">North Dakota</option>
                  <option value="OH">Ohio</option>
                  <option value="OK">Oklahoma</option>
                  <option value="OR">Oregon</option>
                  <option value="PA">Pennsylvania</option>
                  <option value="RI">Rhode Island</option>
                  <option value="SC">South Carolina</option>
                  <option value="SD">South Dakota</option>
                  <option value="TN">Tennessee</option>
                  <option value="TX">Texas</option>
                  <option value="UT">Utah</option>
                  <option value="VT">Vermont</option>
                  <option value="VA">Virginia</option>
                  <option value="WA">Washington</option>
                  <option value="WV">West Virginia</option>
                  <option value="WI">Wisconsin</option>
                  <option value="WY">Wyoming</option>
                </select></td>
              <td><input id="zip" name="zip" type="text" maxlength="10" size="8" value="<? echo $zip; ?>" /></td>
            </tr>
        <tr>
              <td colspan="3"><label for="websiteURL">URL of Your Existing Website<span class="required">*</span></label></td>
            </tr>
        <tr>
              <td colspan="3"><input id="websiteURL" name="websiteURL" type="text" maxlength="20" value="<? echo $url; ?>" /></td>
            </tr>
        <tr>
              <td colspan="3"><label for="facebookURL">URL of Your Facebook Page</label></td>
            </tr>
        <tr>
              <td colspan="3"><input id="facebookURL" name="facebookURL" type="text" maxlength="20" value="<? echo $face; ?>" /></td>
            </tr>
        <tr>
              <td colspan="3"><label for="twitterURL">URL of Your Twitter Page</label></td>
            </tr>
        <tr>
              <td colspan="3"><input id="twitterURL" name="twitterURL" type="text" maxlength="20" value="<? echo $twitter; ?>" /></td>
            </tr>
            
                    <tr>
          <td><label for="paypalID" class="formSelect">Paypal ID (Email address)<br>
            <input type="text" name="paypalID" value="<? echo $pal ?>">
          </label></td>
        </tr>
        <tr>
          <td><label for="createPaypalPass" class="formSelect">Create Login Password<br>
            <input type="password" name="createPaypalPass">
          </label></td>
        </tr>
  <td><label for="confirmPaypalPass" class="formSelect">Confirm Password<br>
    <input type="password" name="confirmPaypalPass">
  </label></td>
      </table>
          <br  class="clearfloat">
          <br>
          <a href="reasons.php?groupid=<?echo $fundraiserid;?>">
         <input name="setup_person" type="hidden" value="<?php echo $userID;?>">
         <input name="groupID" type="hidden" value="<?php echo $fundraiserid;?>"> 
         <input name="submit" type="submit" value="Save and Continue">
         </a>
          <br />
          </div>
          <!--end setupLeft-->
 
          <br class="clearfloat">

        </form>
        
    <p>&nbsp;</p>
    <div class="nav3">
      <ul class="setupNav">
        <li><a href="editacct.php"><<&nbsp;Previous</a></li>
        <li>|</li>
        <li><a href="reasons.php?groupid=<?echo $fundraiserid;?>">Next&nbsp;>></a></li></ul>
    <p>&nbsp;</p>
    </div>
    <!--end nav3--> 
  </div>
    </div>
<!--end contentMain858-->
<?php include '../includes/footer.php' ; ?>
</div>
<!--end container-->

</body>
</html>
<pre>
<?php if ($_POST && $mailSent){
	echo htmlentities($message, ENT_COMPAT, 'UTF-8')."\n";
	echo 'Headers: '.htmlentities($headers, ENT_COMPAT, 'UTF-8');
} ?>
</pre>
<?php
   ob_end_flush();
?>