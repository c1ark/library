<?php
$job=$_POST["role"];
print($job);

if (($job) == "User"){
    header('Location:user.php');}
else{
    header('Location:book.php');
}
?>
