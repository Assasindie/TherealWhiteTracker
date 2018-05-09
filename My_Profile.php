
<!DOCTYPE html>
<?php 
require_once("dbconn.php");
$_SESSION['connection'] = $connection;
		
//error_reporting(0);
$sql = "SELECT * FROM `whitebagtypes` ORDER BY `WhiteBagDropLocation`";
$sqlquery = mysqli_query($connection, $sql) or die(mysqli_error($connection));
$drop = 0;
$sql2 = "SELECT * FROM `whitebags` WHERE `username` = '".$_SESSION["UserName"]."'";
$sqlquery2 = mysqli_query($connection, $sql2) or die(mysqli_error($connection));
$whitebagsdropped = mysqli_num_rows($sqlquery2);
$sqlcount = "";
$whitebagsdroppedlocation = "";

?>	
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> My Profile </title>

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
			<?php if($_SESSION["LoginFailed"] == "0"){ ?><li><a href ="Add_Drop.php">Add a new white bag drop! </a></li> <?php } ?>
			<?php if($_SESSION["LoginFailed"] == "0"){ ?><li><a href="My_Profile.php">My Profile</a></li> <?php } else { ?> <li><a href="Login.php">Log in</a></li> <?php } ?> 
            <li><a href="contact.php">Contacts</a></li>
			<li><a href ="UpdateHistory.php"> Update History </a> </li>
			<?php if($_SESSION["LoginFailed"] == "0"){ ?> <li> <a href = "logout.php"> Logout </a></li> <?php }?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

	<!-- +++++ Main +++++ -->
<?php if($_SESSION["LoginFailed"] == "0"){
?>	
	<div id="ww">
	    <div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 centered"> 
				<h1>Search For Your White Bags</h1></br> </br>
				<h4>Total White Bags = <?php echo $whitebagsdropped; ?></br></br></h4>
					<?php 
					while($result = mysqli_fetch_assoc($sqlquery)){
					$WhiteBagDropLocationVar = stripslashes($result['WhiteBagDropLocation']);
					$sqlcount = "SELECT * FROM `whitebags` WHERE `WhiteBagDropLocation` = '".$WhiteBagDropLocationVar."' AND `Username` = '".$_SESSION['UserName']."'";
					$sqlcount = mysqli_query($connection, $sqlcount) or die(mysqli_error($connection));
					$whitebagsdroppedlocation = mysqli_num_rows($sqlcount);
					if ($drop !== $result['WhiteBagDropLocation']){
					?> <h1 style = "clear: left "> <?php echo $result['WhiteBagDropLocation']?> (Total = <?php echo $whitebagsdroppedlocation ?>)</h1><?php
					}
					?>
					<form action="Whites.php" method = "GET" style="float: left" >
						<input type ="hidden" name = "WhiteBag" value ="<?php echo $result['WhiteBagType'] ?>" ></input>
						<?php 
						$numbersql = "SELECT * FROM `whitebags` WHERE `WhiteBag` = '".$result['WhiteBagType']."' AND `Username` = '".$_SESSION['UserName']."'";
						$numberquery = mysqli_query($connection, $numbersql) or die(mysqli_error($connection));
						$number = mysqli_num_rows($numberquery);
						?>
						<input type ="image" src = "<?php echo $result['ImageLink']; ?>" >  <?php echo $number ;?>
					</form> 
					<?php $drop = $result['WhiteBagDropLocation']; ?>
					<?php } ?>
				</div><!-- /col-lg-8 -->
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /ww -->

<?php 
 }else{
?>
	<div id="ww"> 
	    <div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 centered">
					<h2>
						Authentification failed </br></br>
						<a href="index.php">Return to HomePage</a>
					</h2>
				</div>
			</div>
		</div>
	</div>
<?php }?>
	
	
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
