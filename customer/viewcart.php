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
        .price{
            color:darkblue;
            font-size:24px;
        }
        .price::before{
            content:"Rs ";
        }
    </style>
</head>
<body background="view.jpg" style="background-size: cover;">
    <script>
        function confirmDelete(cartid){
            res=confirm("Remove item from cart");
            if(res){
                window.location=`deletecart.php?cartid=${cartid}`;
            }
        }

        function confirmOrder(){
            window.location="confirmOrder.php";
        }
    </script>
</body>
</html>

<?php

include_once "authguard.php";
include_once "../shared/connection.php";
include_once "menu.html";

$userid=$_SESSION['userid'];
$_SESSION['userid']=$userid;

$sql_cursor=mysqli_query($conn,"select * from cart join products on cart.pid=products.pid where userid=$userid");

$total=0;
while($row=mysqli_fetch_assoc($sql_cursor)){

 
    $cartid=$row['cartid'];
    $pid=$row['pid'];
    $name=$row['name'];
    $price=$row['price'];
    $details=$row['details'];
    $imgpath=$row['imgpath'];

    $total+=$price;

    echo "<div class='card'>
    <div class='card-body'>
        <h4 class='card-title'>$name</h4>
        <div class='price'>$price</div>
        <div class='pdtimg-container'>
            <img class='pdtimg' src='$imgpath'>
        </div>
        <div class='card-text'>$details</div>
        <div class='mt-3 d-flex justify-content-center'>
            <button class='btn btn-danger' onclick='confirmDelete($cartid)'>Remove from Cart</button>
        </div>
    </div>
    </div>";
}

echo "<div>
    <div style='color:white' class='display-4 mt-2'>Rs $total</div>
    <button class='btn btn-warning m-3' onclick='confirmOrder()'> Place Order </button>
</div>";
?>