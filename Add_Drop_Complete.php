
<!DOCTYPE html>
<?php 

require_once("dbconn.php");
$_SESSION['connection'] = $connection;

$DungeonSelected = stripslashes($_POST["WhiteBagLink"]);
$invalidurl="";
$website = $websiteErr = "";
$matches = array();

  if (empty($DungeonSelected)) {
    $website = "";
  } else {
    $website = test_input($DungeonSelected);

    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL"; 
	  $invalidurl = "1";
    }
  }



function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
$WhiteBag = $_POST['Drop'];
$Picture = $_POST['WhiteBagLink'];
$Date = $_POST['Date'];
$Username = $_SESSION['UserName'];
$WhiteBagDropLocation = $_SESSION['DropLocation'];

?>	
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> White Bag Tracker! </title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">


    <!-- CSS -->
    <link href="css/main.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/hover.zoom.js"></script>
    <script src="js/hover.zoom.conf.js"></script>
	
	<style> 
	select {
    width: 100%;
    padding: 16px 20px;
    border: none;
    border-radius: 4px;
    background-color: #f1f1f1;
}
</style>
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
                       <?php if($_SESSION["LoginFailed"] == "0"){ ?><li><a href="My_Profile.php">My Profile</a></li><?php } else { ?> <li><a href="Login.php">Log in</a></li> <?php } ?>
            <li><a href="contact.php">Contacts</a></li>
			<li><a href ="UpdateHistory.php"> Update History </a> </li>
			<?php if($_SESSION["LoginFailed"] == "0"){ ?> <li> <a href = "logout.php"> Logout </a></li> <?php }?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>	

	<!-- +++++ Main +++++ -->
	<div id="ww">
	    <div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 centered">
						<?php if($invalidurl == "1"){ ?>
							<a href = "Add_Drop.php"> Invalid Url Click to Return to Previous Page</a> </br> </br>	
							<a href = "Help.php"> Need Help? </a> <?php
						}else{
							?> <h1> Drop Succesfully Added </h1>
							<a href = "My_Profile.php"> Click to View Profile </a>
							<?php 	$sql ="INSERT INTO `whitebags`(`WhiteBag`, `Picture`, `Date`, `Username`,`WhiteBagDropLocation`) VALUES ('$WhiteBag','$Picture','$Date','$Username','$WhiteBagDropLocation')";
							$sql = mysqli_query($connection, $sql) or die(mysqli_error($connection));
							?>
						<?php } ?>
				</div><!-- /col-lg-8 -->
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /ww -->

	
	<!-- +++++ Images +++++ -->
	
	
	
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
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
