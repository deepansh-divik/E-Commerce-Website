<?php

include_once "authguard.php";
include_once "../shared/connection.php";

$pid=$_GET['pid'];
$userid=$_SESSION['userid'];

$status=mysqli_query($conn,"insert into cart(pid,userid) values($pid,$userid)");

if($status){
    header("location:home.php");
}
else{
    echo mysqli_error($conn);
}

?>