<?php 
$conn=mysql_connect("localhost","","");
$m=mysql_select_db("fir",$conn);
if($conn)
{
echo "cc";
}
else{
echo "nit";
}


