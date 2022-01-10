</head>
<body>
   <form action="addbook.php" method="post">
  Book name:<input type="text" name="bookname"><br>
  Author:<input type="text" name="Author"><br>
  
  <input type="submit" value="Add Book">
</form>

<?php
echo("submitted")
?>

<br><?php
	include_once('connection.php');
	$stmt = $conn->prepare("SELECT * FROM TblBook");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			echo("<br>".$row["Bookname"].' '.$row["Bookauthor"]);
		}
?>   
</body>
</html>
