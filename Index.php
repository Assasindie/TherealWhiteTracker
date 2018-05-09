
<!DOCTYPE html>
<?php require_once("dbconn.php");
$_SESSION['connection'] = $connection;

$sql = 	"SELECT * FROM `whitebags`";
$sqlquery = mysqli_query($connection, $sql) or die(mysqli_error($connection));
$totalwhitebagsdropped = mysqli_num_rows($sqlquery);

$sql2 = "SELECT `Username`, COUNT(`Username`) AS `value_occurrence` FROM `whitebags` GROUP BY `Username` ORDER BY `value_occurrence` DESC LIMIT 1";
$sqlquery2 = mysqli_query($connection,$sql2) or die (mysqli_error($connection));
$result =mysqli_fetch_assoc($sqlquery2);
$usermostwhites = $result['Username'];

$sql3 = "SELECT * FROM `whitebags` WHERE `username` = '".$result['Username']."'" ;
$sqlquery3 = mysqli_query($connection, $sql3) or die (mysqli_error($connection));
$usernumberofwhites = mysqli_num_rows($sqlquery3);

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
					
					<h1>Total White Bags Dropped : <?php echo $totalwhitebagsdropped; ?></h1>
					<p>User with the most whitebags : <?php echo $usermostwhites; ?> with <?php echo $usernumberofwhites; ?> white bags</p>
					<h2> Top 10 Most common whites :</h2><?php
					$sql4 = "SELECT `WhiteBag`, COUNT(`WhiteBag`) AS `value_occurrence` FROM `whitebags` GROUP BY `WhiteBag` ORDER BY `value_occurrence` DESC LIMIT 10";
					$sqlquery4 = mysqli_query($connection, $sql4) or die (mysqli_error($connection));
					
					while($result2 = mysqli_fetch_assoc($sqlquery4)){
					echo $result2['WhiteBag'];
					$sql5 = "SELECT * FROM `whitebags` WHERE `WhiteBag` = '".$result2['WhiteBag']."'";
					$sqlquery5 =  mysqli_query($connection, $sql5) or die (mysqli_error($connection));
					$numofwhite = mysqli_num_rows($sqlquery5) or die (mysqli_error($connection));
					echo $numofwhite; }?> </br> 
					
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
