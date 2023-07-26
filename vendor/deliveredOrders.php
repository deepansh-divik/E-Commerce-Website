<?php

include_once "authguard.php";
include "../shared/connection.php";
$pid=$_GET['pid'];
$userid=$_GET['userid'];
$orderid=$_GET['orderid'];


$status=mysqli_query($conn,"insert into deliveredOrders(userid,pid) values($userid,$pid)");
if($status){
    header("location:vieworders.php");
}
else{
    echo mysqli_error($conn);
}
mysqli_query($conn,"delete from orders where userid=$userid and pid=$pid and orderid=$orderid");
?>