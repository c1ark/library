<?php
header('Location:book.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
try{
	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);
    print_r($_POST);
	
	$stmt = $conn->prepare("INSERT INTO Tblbook (BookID,Bookname,Bookauthor)VALUES (NULL,:Bookname,:Bookauthor)");
	$stmt->bindParam(':Bookname', $_POST["bookname"]);
	$stmt->bindParam(':Bookauthor', $_POST["Author"]);

	$stmt->execute();
	}
    catch(PDOException $e)
    {
    echo "error".$e->getMessage();
    }
$conn=null;
?>