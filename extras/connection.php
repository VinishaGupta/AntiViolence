$_loc="localhost";
$_user="root";
$_pws="";
$_db="anti-violence";

mysql_connect($_loc,$_user,$_pws,$_db);

$conn=mysql_connect($_loc,$_user,$_pws,$_db);

if(conn){
    echo "successful connection";
}

else{
    echo "connection failed";
}
