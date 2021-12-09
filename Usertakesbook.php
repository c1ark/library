<!DOCTYPE html>
<html>
<head>
</head>
<body>

<select name = "User">
<?php
session_start(); 
<?php
session_start(); 
if (!isset($_SESSION['name']))
{   
    header("Location:login.php");
}
?>



include_once('connection.php');
$stmt = $conn->prepare("SELECT * FROM TblBook WHERE Role = 0 ORDER BY Bookname ASC");
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
	echo('<option value='.$row["UserID"].'>'.$row["Surname"].', '.$row["Forename"].'</option>');
}
?>
</select>
       
</body>
</html