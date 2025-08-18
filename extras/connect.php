<?php
$_loc="localhost";
$_user="root";
$_pws="";
$_db="anti-violence";

mysql_connect($_loc,$_user,$_pws,$_db);

$conn=mysql_connect($_loc,$_user,$_pws,$_db);

$db=mysqli_select_db($conn);

if($db){
    echo "successful connection";
}

else{
    echo "connection failed";
}
?>