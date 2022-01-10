<!DOCTYPE html>
<html>
<head>
    
    <title>Page title</title>
    
</head>
<body>
       
<form action="Usererproc.php" method = "post">
  
  <!--Next 2 lines create a radio button which we can use to select the user role-->
  <input type="radio" name="role" value="Take" checked> Take books<br>
  <input type="radio" name="role" value="Return"> Return books<br>
  <input type="submit" value="Choose">
</form>

<?php
echo("Your current books taken out are:"."<br>")
?>
<select name = "User">
<?php
include_once('connection.php');
$stmt = $conn->prepare("SELECT * FROM TblBookUser ORDER BY Bookname ASC");
$stmt->execute();
{echo($row);}
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
	echo('<option value='.$row["BookID"].'  x>'.$row["Bookname"].', '.$row["Bookauthor"].'</option>');
}
?> 
</select>


</body>
</html>