<!DOCTYPE html>
<html>
<head>
    
    <title>Page title</title>
    
</head>
<body>
       
<form action="adduser.php" method = "post">
  First name:<input type="text" name="forename"><br>
  Last name:<input type="text" name="surname"><br>
  Password:<input type="text" name="password"><br>
  <!--Creates a drop down list-->
  Gender:<select name="gender">
		<option value="M">Male</option>
		<option value="F">Female</option>
	</select>
  <br>
  <!--Next 3 lines create a radio button which we can use to select the user role-->
  <input type="radio" name="role" value="User" checked> Pupil<br>
  <input type="radio" name="role" value="Librarian"> Librarian<br>
  <input type="submit" value="Add User">
</form>

<?php
echo("submitted")
?>

<br><?php
include_once('connection.php');
$stmt = $conn->prepare("SELECT * FROM TblUser");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
echo("<br>".$row["Forename"].' '.$row["Surname"]);
echo($_SESSION['name']);
}
?>

</body>
</html>