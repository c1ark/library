<?php
session_start();
try{
	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);

	$num=$_POST["User"];
	#echo($num);
	$sur=($_SESSION['name']);
	$sttmt = $conn->prepare("SELECT UserID FROM Tbluser WHERE Surname=('$sur')");
	$sttmt->execute();
	$row = $sttmt->fetch(PDO::FETCH_ASSOC);
	$UseID=$row["UserID"];

	$stttmt = $conn->prepare("SELECT Bookname FROM Tblbook WHERE BookID=('$num')");
	$stttmt->execute();
	$roww = $stttmt->fetch(PDO::FETCH_ASSOC);
	$Bokname=$roww["Bookname"];
	
	$stttmt = $conn->prepare("SELECT Bookauthor FROM Tblbook WHERE BookID=('$num')");
	$stttmt->execute();
	$roww = $stttmt->fetch(PDO::FETCH_ASSOC);
	$Bokaut=$roww["Bookauthor"];



	$stmt = $conn->prepare("INSERT INTO tblbookuser (BookID,UserID,Bookname,Bookauthor)VALUES ('$num','$UseID','$Bokname','$Bokaut')");
	#$stmt->bindParam(':BookID', $_SESSION[name]);
	#$stmt->bindParam(':UserID', $bokname);
	$stmt->execute();
	}
    catch(PDOException $e)
    {
    echo "error".$e->getMessage();
    }
	header('Location:Userer.php'); 
$conn=null;
?>