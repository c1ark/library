<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form action="returnbook.php" method="post">

<select name = "User">
<?php       

session_start(); 
if (!isset($_SESSION['name']))
{   
    header("Location:login.php");
}



include_once('connection.php');
$stmt = $conn->prepare("SELECT * FROM TblBookUser ORDER BY Bookname ASC");
$stmt->execute();
{echo($row);}
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
	echo('<option value='.$row["BookID"].'  x>'.$row["Bookname"].', '.$row["Bookauthor"].'</option>');
}
?> 

<input type="submit" value="Return Book">
</form>
</select>

</form>
</body>
</html