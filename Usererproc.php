<?php
$job=$_POST["role"];
print($job);

if (($job) == "Take"){
    header('Location:Usertakesbook.php');}
else{
    header('Location:Return.php');
}
?>
