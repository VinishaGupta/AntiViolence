<?php

$con=new mysqli('localhost','root','formm');

if($con)
{
    echo"Connection successful";
}

else {
    die(mysqli_error($con));
}
?>