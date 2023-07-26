<?php

session_start();
$_SESSION['login_status']=false;

$uname=$_POST['username'];
$upass=$_POST['password'];

$encpass=md5($upass);

//$conn= new mysqli("localhost","root","","acmegrade_project_webd");
include_once "connection.php";
$sql_cursor=mysqli_query($conn,"select * from user where username='$uname' and password='$encpass'");

$matched_row_count=mysqli_num_rows($sql_cursor);

if($matched_row_count==0){
    echo "Invalid credentials";
}
else{
    echo "Login Successfull";
    $row=mysqli_fetch_assoc($sql_cursor);
    $user_type=$row['user_type'];
    $userid=$row['userid'];
    $username=$row['username'];

    if($user_type=="vendor"){
        $_SESSION['login_status']=true;
        $_SESSION["user_type"]=$user_type;
        $_SESSION["userid"]=$userid;
        $_SESSION["username"]=$username;
        header("location:../vendor/home.php");
    }
    else if($user_type=="customer"){
        $_SESSION['login_status']=true;
        $_SESSION["user_type"]=$user_type;
        $_SESSION["userid"]=$userid;
        $_SESSION["username"]=$username;
        header("location:../customer/home.php");
    }
}

?>