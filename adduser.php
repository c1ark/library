<?php
try	{
	include_once("connection.php");

	array_map("htmlspecialchars", $_POST);
	#print_r($_POST);
	switch($_POST["role"]){
		case "User":
			$role=0;
			break;
		case "Librarian":
			$role=1;
			break;
	}

	echo $_POST["forename"]."<br>";
	echo $_POST["surname"]."<br>";
	echo $_POST["gender"]."<br>";
	echo $role."<br>";

	$stmt = $conn->prepare("INSERT INTO TblUser (UserID,Forename,Surname,Gender,role)VALUES (null,:forename,:surname,:gender,:role)");

	$stmt->bindParam(':forename', $_POST["forename"]);
	$stmt->bindParam(':surname', $_POST["surname"]);
	$stmt->bindParam(':gender', $_POST["gender"]);
	$stmt->bindParam(':role', $role);
	$stmt->execute();
	}
catch(PDOException $e)
	{
		echo "error".$e->getMessage();
	}

$conn=null;

?>
