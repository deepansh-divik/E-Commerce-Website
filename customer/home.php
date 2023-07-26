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
<body background ="homeimage.png" style="background-size: cover;">
    <script>
        function confirmDelete(pid){
            res=confirm("Are you sure you want to delete the product="+pid);
            if(res){
                window.location=`deletepdt.php?pid=${pid}`;
            }
        }
    </script>
</body>
</html>

<?php

include "authguard.php";
include "menu.html";
$userid=$_SESSION['userid'];
include_once "../shared/connection.php";
$sql_cursor = mysqli_query($conn,"select * from products");

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
                <a href='addcart.php?pid=$pid'>
                    <button class='btn btn-info'>Add to cart</button>
                </a>
            </div>
        </div>
    </div>";
}