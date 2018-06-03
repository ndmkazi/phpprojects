<?php
	include("connection.php");
	
	$action = $_GET['action'];
	session_start();

	if($action == "showAll") {
		unset($_GET['action']);		
		header("Location: ../program2.php");
	}
	
	//to add the book details in DB
	if($action == "add") {
		$name = $_POST['bnm'];
		$author = $_POST['bauth'];
		$status = $_POST['bstatus'];
		
		$qry = "INSERT INTO `book_details`(`bknm`, `bkauthor`, `bkstatus`)	VALUES ('$name', '$author', $status)";

		if ($conn->query($qry) === TRUE) {
			echo "New record added successfully";
			$_SESSION['msg'] = "success"; //created session to display success message at front end
		} else {
			echo "Error: " . $qry . "<br>" . $conn->error;
		}

		$conn->close();
		header("Location: ../program2.php");
	}
	
	//to update the status of book in DB
	if($action == "update") {
		$bid = $_GET['bid'];
		$status = $_GET['bstat'];
		if ($status) {
			$status = 0;
		}
		else {
			$status = 1;
		}
		$qry = "UPDATE `book_details` SET `bkstatus`='$status' WHERE `bkid`='$bid'";

		if ($conn->query($qry) === TRUE) {
			echo "Record updated successfully";
			$_SESSION['msg'] = "updated";
			$_SESSION['bid'] = $bid;
		//	echo $_SESSION['bid'];
		//	exit();
		} else {
			echo "Error: " . $qry . "<br>" . $conn->error;
		}

		$conn->close();
		header("Location: ../program2.php");
	}
	
	//to delete book details from DB
	if($action == "delete") {
		$bid = $_GET['bid'];
		$qry = "DELETE FROM `book_details` WHERE `bkid`='$bid'";

		if ($conn->query($qry) === TRUE) {
			echo "Record deleted successfully";
			$_SESSION['msg'] = "deleted";
		} else {
			echo "Error: " . $qry . "<br>" . $conn->error;
		}

		$conn->close();
		header("Location: ../program2.php");
	}
	
	
	
?>