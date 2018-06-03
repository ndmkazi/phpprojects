<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Book shop management</title>	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="content">
			<header><h2>Book shop management</h2></header>
			<section>
				<div class="btnGroup">
					<button type="button" class="btn btn-primary pull-left" data-toggle="modal" data-target="#add">Add book</button>
					<form action="operations/action.php?action=showAll" method="post" class="pull-left">
						<button type="submit" class="btn btn-primary" >View all</button>
					</form>					
				</div>
				<?php session_start(); ?>
				<div class="search">
					<form action="program2.php?action=search" method="post">
						<input type="text" class="form-control" name="booknm" placeholder="Search by book name"/>
						<button type="submit" class="btn btn-primary">Search</button>
					</form>
				</div>
				<?php
					if(isset($_SESSION['msg'])) {
					$msg = $_SESSION['msg'];
				?>
					<div class="alert alert-success" >
						<div class="media">
							<div class="media-left media-middle">
								<i class="glyphicon glyphicon-ok pull-left"></i>
							</div>
							<div class="media-body">
							<?php							
								if(strcmp($msg,"success") == 0) { 
								echo '<p class="media-heading">Book added successfully..!!!</p>';
							 } ?>
							<?php 							
							if(strcmp($msg,"updated") == 0) { 
								echo '<p class="media-heading">Book updated successfully..!!!</p>';
							 } ?>
							<?php 							
							if(strcmp($msg,"deleted") == 0) { 
								echo '<p class="media-heading">Book details deleted successfully..!!!</p>';
							 } ?>
							</div>
						</div>
					</div>
				<?php
					}
				?>
				<div class="clear"></div>
				<h4>Books list</h4>
				<?php include('operations/connection.php'); ?>
				<div class="tableCont">
				<table class="table table-responsive">
					<tr><th>Sr. No.</th><th>Name</th><th>Author</th><th>Status</th><th>Issue</th><th>Return</th><th>Delete</th></tr>
					<?php
					//code to search book name
					if(isset($_GET['action'])) {
						$action = $_GET['action'];
						if($action == "search") {
							$bnm = $_POST['booknm'];
							$qry = "select * FROM `book_details` WHERE `bknm` LIKE '%".$bnm."%'"; //query for search 
							$result = $conn->query($qry);
						
						//if(isset($_GET['bid'])) {
						//	$rowToHighlight = $_GET['bid'];
						//}
						$cnt = 1;
						if ($result->num_rows > 0) {
							// output data of each row
							$op ="";
							while($row = $result->fetch_assoc()) {
								$bid = $row["bkid"];
							
								$op .= "<tr><td>" . $cnt . "</td><td>" . $row["bknm"]. "</td><td>" . $row["bkauthor"]."</td><td class='text-center'>";
								
								$stat = $row["bkstatus"]; 
								
								//to display availability checking status field  
								if($stat == 1) { $statTxt = "Available"; $disableReturn = "disabled"; $disableIssue = ""; } 
								else { $statTxt = "NA"; $disableIssue = "disabled";$disableReturn = ""; }
								
								$op .=  $statTxt."</td><td><a href='operations/action.php?action=update&bid=".$bid."&bstat=".$stat."' ><button type='submit'".$disableIssue."><i class='glyphicon glyphicon-pencil'></i></button></a></td><td><a href='operations/action.php?action=update&bid=".$bid."&bstat=".$stat."' ><button type='submit' ".$disableReturn."><i class='glyphicon glyphicon-retweet'></i></button></a></td><td><a href='operations/action.php?action=delete&bid=".$bid."'><button type='submit'><i class='glyphicon glyphicon-trash'></i></button></a></td></tr>";
								$cnt++;
							}
							echo $op; //displays searched book list in table format
						} else {
							echo "0 results";
						}
						$conn->close();
						}
					}
					?>
					<?php
						//code to fetch all book list
						if(!(isset($_GET['action']))) {
						$qry = "SELECT * FROM `book_details`";
						$result = $conn->query($qry);
						if(isset($_SESSION['bid'])) {
							$rowToHighlight = $_SESSION['bid'];
						}
						$cnt = 1;
						if ($result->num_rows > 0) {
							// output data of each row
							$op ="";
							while($row = $result->fetch_assoc()) {
								$bid = $row["bkid"];
							
							if(isset($_SESSION['bid'])) {	//to display the updated row applying class 
								if($rowToHighlight == $bid){ $class="updatedRow"; session_unset($_SESSION['bid']);}
								else {$class="";}
							}
							else {$class="";}
								$op .= "<tr class=".$class."><td>" . $cnt . "</td><td>" . $row["bknm"]. "</td><td>" . $row["bkauthor"]."</td><td class='text-center'>";
								
								$stat = $row["bkstatus"]; 
								
								if($stat == 1) { $statTxt = "Available"; $disableReturn = "disabled"; $disableIssue = ""; } 
								else { $statTxt = "NA"; $disableIssue = "disabled";$disableReturn = ""; }
								
								$op .=  $statTxt."</td><td><a href='operations/action.php?action=update&bid=".$bid."&bstat=".$stat."' ><button type='submit'".$disableIssue."><i class='glyphicon glyphicon-pencil'></i></button></a></td><td><a href='operations/action.php?action=update&bid=".$bid."&bstat=".$stat."' ><button type='submit' ".$disableReturn."><i class='glyphicon glyphicon-retweet'></i></button></a></td><td><a href='operations/action.php?action=delete&bid=".$bid."'><button type='submit'><i class='glyphicon glyphicon-trash'></i></button></a></td></tr>";
								$cnt++;
							}
							echo $op; //displays book list in table format
						} else {
							echo "0 results";
						}
						$conn->close();
					}
					?>
				<table>
				</div>
			</section>
		</div>
	</div>
	<!-- Modal -->
	<div id="add" class="modal fade" role="dialog">
	  <div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Add book</h4>
		  </div>
		  <div class="modal-body">
		  <div class="container">
			<div class="row">
				<div class="col-sm-6 no-padding">
					<form action="operations/action.php?action=add" method="post">
						<div class="form-group">
							<label for="bnm">Enter name</label>
							<input class="form-control" type="text" size="100" name="bnm" required/>
						</div>
						<div class="form-group">
							<label for="bnm">Enter author name</label>
							<input class="form-control" type="text" size="100" name="bauth"  required/>
						</div>
						<div class="form-group">
							<label for="bnm">Book status</label>
							<select class="form-control" name="bstatus"  required>
								<option value="1">Available</option>
								<option value="0">Issued</option>
							</select>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
					</div>
				</div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
	<!-- Modal -->
	<?php session_unset(); ?>
	<!-- Latest compiled and minified JavaScript -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			setTimeout(function(){ $(".alert").slideUp(); }, 4000);	//to hide the alert message after 4 sec
		});
	</script>
	
</body>
</html>