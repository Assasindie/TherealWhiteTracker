<?php 
	require_once("dbconn.php");
	$_SESSION['connection'] = $connection;
	
	global $_New_User;
	global $_New_Pass;	
	
	
	$_New_User = $_POST['UserName'];
	$_New_Pass = $_POST['Password'];
	
	$_New_User  = stripslashes($_New_User );
	$_New_Pass = stripslashes($_New_Pass);
	$_New_User  = mysqli_real_escape_string($connection, $_New_User );
	$_New_Pass = mysqli_real_escape_string($connection, $_New_Pass);
	
	global $_New_Fname;
	global $_New_Lname;	
	
	
	
	$NewPassHash = password_hash($_New_Pass, PASSWORD_DEFAULT);
	
	
	
	$sql2= "SELECT `User_Name` FROM `normal_login` WHERE User_Name= '".$_New_User."'";
	$result2=mysqli_query($connection, $sql2) or die (mysqli_error($connection)); 
	$count2=mysqli_num_rows($result2);
	if($count2>=1){
	$_SESSION["Account_Exists"] = "yes";
	}else{
	$_SESSION["Account_Exists"] = "no";
	$sql= "INSERT INTO `normal_login`(User_Name, Pass_word) VALUES ('$_New_User', '$NewPassHash')";
	mysqli_query($connection, $sql) or die (mysqli_error($connection));
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">
	<?php if ($_SESSION["Account_Exists"] == "yes") { ?> <meta http-equiv="refresh" content="0; url=Create_Account.php" /><?php }?>
    <title> Added User </title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">


    <!-- CSS -->
    <link href="css/main.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/hover.zoom.js"></script>
    <script src="js/hover.zoom.conf.js"></script>

  </head>

  <body>

    <!-- Static navbar -->
    <div class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">White Bag Tracker</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
<?php if($_SESSION["LoginFailed"] == "0"){?> <li><a href = "Add_Drop.php" >Add a new white bag drop! </a></li> <?php } ?>
            
                       <?php if($_SESSION["LoginFailed"] == "0"){ ?><li><a href="My_Profile.php">My Profile</a></li><?php } else { ?> <li><a href="Login.php">Log in</a></li> <?php } ?>
            <li><a href="contact.php">Contacts</a></li>
			<li><a href ="UpdateHistory.php"> Update History </a> </li>
			<?php if($_SESSION["LoginFailed"] == "0"){ ?> <li> <a href = "logout.php"> Logout </a></li> <?php } ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
	<!-- +++++ Main +++++ -->
	<?php if($_SESSION["Account_Exists"] == "yes") {?>
		<form action = "Create_Account_Complete.php" method = "post">
		<div id="ww">
	    <div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 centered">
					Keep Your Username and Password secure</br> </br> Do not use the same passwords for multiple sites!</br> </br>
					Username already exists, please try a new one </br> </br>
					UserName <input type = "text" name = "UserName" style = "width : 200px" required> </input> </br> </br>
					Password <input type = "password" name = "Password" style="width : 200px" required >  </input> </br> </br>
							<input type = "submit" name = "submit" value = "Enter"/> 
				</div><!-- /col-lg-8 --> 
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /ww -->
	</form>
	<?php }else{ ?>
	<div id="ww">
	    <div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 centered">
					<h1>Account Created!</h1>
				</div><!-- /col-lg-8 -->
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /ww -->
	
	<div id="ww">
	    <div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 centered">
				<a href = "Login.php"> Click to login </a>
			
				</div><!-- /col-lg-8 -->
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /ww -->
	<?php } ?>
	<!-- Bottom Footer -->
	
	<div id="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<a href = "Contact.php"> Contact Us </a><br/>
				</br>
				</br>
				</br>
				</br>
				</div><!-- /col-lg-4 -->
				
			</div>
		
		</div>
	</div>
	

    <!-- Bootstrap core JavaScript
    < -- ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
