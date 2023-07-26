<?php

include_once "../shared/connection.php";
include_once "authguard.php";

$userid=$_SESSION['userid'];

$sql_cursor=mysqli_query($conn,"select * from cart join products on cart.pid=products.pid where userid=$userid");

while($row=mysqli_fetch_assoc($sql_cursor)){
    $pid=$row['pid'];

    $status=mysqli_query($conn,"insert into orders(pid,userid) values($pid,$userid)");

        if($status){
            header("location:vieworders.php");
        }
        else{
            echo mysqli_error($conn);
        }
}

mysqli_query($conn,"delete from cart where userid=$userid");


?>