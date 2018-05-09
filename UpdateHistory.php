
<!DOCTYPE html>
<?php 
require_once("dbconn.php");
$_SESSION['connection'] = $connection;

$UpdateHistorySQL = "Select * From `updatehistory` ORDER BY Date DESC";
$UpdateHistory = mysqli_query($connection, $UpdateHistorySQL) or die (mysqli_error($connection));			
?>	
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Main Thingy </title>

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
          <a class="navbar-brand" href="index.php">Text</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="Login.php">Admin Log in</a></li>
            <li><a href="contact.php">Contacts</a></li>
			<li><a href="UpdateHistory.php">Update History</a></li>
			<?php if($_SESSION["LoginFailed"] == "0"){ ?> <li> <a href = "logout.php"> Logout </a></li> <?php }?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

	<div id="ww">
	    <div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 centered">
					<h1>Updates!</h1>
					<form action = "UpdateHistory_Search.php" method = "POST"> 
					Search Update By Date: <input type = "Date" name = "Search_Blog" required> </input>
					<input type = "submit" Value = "Search"> </input>
					</form>
				</div><!-- /col-lg-8 -->
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /ww -->
	
<?php
	
		while($Result = mysqli_fetch_assoc($UpdateHistory)){
	?>
	<table class="table-fill">
	<thead>
	<tr>
	<th class="text-left"> <?php echo $Result['Date'] ."'s" ?> Update</th>
	</tr>
	</thead>	
	<tbody class="table-hover">
<?php 
	echo "<tr> <td>" . $Result['Text']."</td> </tr>";
?>
</tbody>
</table>
</br> </br> </br>
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
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
