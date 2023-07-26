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
        .price,.text1{
            color:darkblue;
            font-size:24px;
        }
        .price::before{
            content:"Rs ";
        }
    </style>
</head>
<body background="order.webp" style="background-size: cover;"></body>
</html>

<?php

include_once "authguard.php";
include_once "../shared/connection.php";
include_once "menu.html";

$userid=$_SESSION['userid'];
$sql_cursor=mysqli_query($conn,"select * from orders join products on orders.pid=products.pid where userid=$userid");

while($row=mysqli_fetch_assoc($sql_cursor)){


    $pid=$row['pid'];
    $name=$row['name'];
    $price=$row['price'];
    $details=$row['details'];
    $imgpath=$row['imgpath'];

    echo "<div class='card'>
    <div class='card-body'>
        <h4 class='card-title'>$name</h4>
        <div class='price'>$price</div>
        <div class='pdtimg-container'>
            <img class='pdtimg' src='$imgpath'>
        </div>
        <div class='card-text'>$details</div>
        <div class='mt-3 d-flex justify-content-center'>
            <button class='btn btn-danger' onclick=''>Cancel Order</button>
        </div>
    </div>
    </div>";
}

$sql_cursor1=mysqli_query($conn,"select * from deliveredOrders join products on deliveredOrders.pid=products.pid where userid=$userid");

while($row=mysqli_fetch_assoc($sql_cursor1)){


    $pid=$row['pid'];
    $name=$row['name'];
    $price=$row['price'];
    $details=$row['details'];
    $imgpath=$row['imgpath'];

    echo "<div class='card'>
    <div class='card-body'>
        <h4 class='card-title'>$name</h4>
        <div class='price'>$price</div>
        <div class='pdtimg-container'>
            <img class='pdtimg' src='$imgpath'>
        </div>
        <div class='card-text'>$details</div>
        <div class='text1'>Delivered</div>
    </div>
    </div>";
}
?>