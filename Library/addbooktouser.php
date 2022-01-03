<?php
session_start();
try{
	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);

	$num=$_POST["User"];
	echo($num);
	$sur=($_SESSION['name']);
	$sttmt = $conn->prepare("SELECT UserID FROM Tbluser WHERE Surname=('$sur')");
	$sttmt->execute();
	$row = $sttmt->fetch(PDO::FETCH_ASSOC);
	#print_r($sttmt);
	var_dump($row);
	$UseID=$row["UserID"];
	echo($UseID);


	$stmt = $conn->prepare("INSERT INTO tblbookuser (BookID,UserID)VALUES ('$num','$UseID')");
	#$stmt->bindParam(':BookID', $_SESSION[name]);
	#$stmt->bindParam(':UserID', $bokname);
	$stmt->execute();
	}
    catch(PDOException $e)
    {
    echo "error".$e->getMessage();
    }
$conn=null;
?>