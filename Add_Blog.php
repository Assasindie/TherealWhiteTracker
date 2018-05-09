<?php require_once("dbconn.php");
$_SESSION['connection'] = $connection;
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

    <title> Add Blog </title>

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
            <li><a href="Donators.php">Donators</a></li>
			<?php if($_SESSION["LoginFailed"] == "0"){?> <li><a href = "Add_Drop.php" >Add a new white bag drop! </a></li> <?php } ?>
                       <?php if($_SESSION["LoginFailed"] == "0"){ ?><li><a href="My_Profile.php">My Profile</a></li><?php } else { ?> <li><a href="Login.php">Log in</a></li> <?php } ?>
            <li><a href="contact.php">Contacts</a></li>
			<li><a href ="UpdateHistory.php"> Update History </a> </li>
			<?php if($_SESSION["LoginFailed"] == "0"){ ?> <li> <a href = "logout.php"> Logout </a></li> <?php }?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
	<?php	
	if($_SESSION["LoginFailed"] == "0"){
	?>
	<!-- +++++ Main +++++ -->
	<div id="ww">
	    <div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 centered">
					<h1>Blog Create</h1>
				</div><!-- /col-lg-8 -->
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /ww -->
	<!-- +++ PHP login verification -->

	<form action = "Add_Blog	_Complete.php" method = "post">
		<div id="ww">
	    <div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 centered">
					Blog Text <input type = "text" name = "Blog_Text" style = "width : 200px" required> </input> </br> </br>
					Blog Date <input type = "Date" name = "Blog_Date" style="width : 200px" required >  </input> </br> </br>
							<input type = "submit" name = "submit" value = "Enter"/> 
				</div><!-- /col-lg-8 -->
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /ww -->
	
	</form>
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
