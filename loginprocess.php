<?php
include_once ("connection.php");
array_map("htmlspecialchars", $_POST);
$stmt = $conn->prepare("SELECT * FROM tbluser WHERE Surname =:username ;" );
$stmt->bindParam(':username', $_POST['Username']);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{ 
    if($row['Password']== $_POST['Pword']){
        session_start();
        $_SESSION['name']=$row["Surname"];
        echo($_SESSION['name']);
        if($row['Role']== 0){
            header('Location:Userer.php'); 
        }else{
            header('Location:librarian.php');
        }   
        #header('Location: Usertakesbook.php'); 
    }else{

        header('Location: login.php');
    }   
}

$conn=null;
?>
