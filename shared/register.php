<?php

$uname=$_POST['username'];
$upass=$_POST['password1'];
$utype=$_POST['usertype'];

$encpass=md5($upass);

//$conn= new mysqli("localhost","root","","acmegrade_project_webd");
include_once "connection.php";
$status=mysqli_query($conn,"insert into user(username,password,user_type) values('$uname','$encpass','$utype')");

if($status){
    echo "Registration succesfull";
}
else{
    echo "Registration error";
    echo mysqli_error($conn);
}

?>