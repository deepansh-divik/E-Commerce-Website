<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .card{
            width:300px;
            display:inline-block !important;
            margin:5px;
        }
        .pdtimg-container{
            width:100%;
        }
        .pdtimg{
            width:100%;
        }
        .price,.id{
            color:darkblue;
            font-size:24px;
        }
        .price::before{
            content:"Rs ";
        }
    </style>
</head>
<body background="order.webp" style="background-size: cover;">
    <script>
        function markDelivered(pid,userid,orderid){
            window.location=`deliveredOrders.php?pid=${pid}&userid=${userid}&orderid=${orderid}`;
        }
    </script>
</body>
</html>

<?php

include "authguard.php";
include "menu.html";
include_once "../shared/connection.php";

$userid=$_SESSION['userid'];

$sql_cursor = mysqli_query($conn,"select * from orders join products on orders.pid=products.pid where uploaded_by='$userid'");
while($row=mysqli_fetch_assoc($sql_cursor)){
    
    $userid=$row['userid'];
    $pid=$row['pid'];
    $name=$row['name'];
    $price=$row['price'];
    $details=$row['details'];
    $imgpath=$row['imgpath'];
    $orderid=$row['orderid'];

    echo "<div class='card'>
        <div class='card-body'>
            <h4 class='card-title'>$name</h4>
            <div class='price'>$price</div>
            <div class='id'>userid=$userid</div>
            <div class='pdtimg-container'>
                <img class='pdtimg' src='$imgpath'>
            </div>
            <div class='card-text'>$details</div>
            <div class='mt-3 d-flex justify-content-between'>
                <button class='btn btn-warning' onclick='markDelivered($pid,$userid,$orderid)'>Mark as Delivered</button>
            </div>
        </div>
    </div>";
}

?>