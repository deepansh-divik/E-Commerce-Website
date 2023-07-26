<?php

include_once "authguard.php";
include_once "menu.html";
include_once "../shared/connection.php";
$pid=$_GET['pid'];
$_SESSION['pid']=$pid;

$sql_cursor=mysqli_query($conn,"select * from products where pid=$pid");
$row=mysqli_fetch_assoc($sql_cursor);
$name= $row['name'];
$price= $row['price'];
$details= $row['details'];
$imgpath= $row['imgpath'];

echo " <div class='d-flex justify-content-center align-items-center vh-100'>
        <form action='updatedetails.php' class='bg-success p-4' method='POST' enctype='multipart/form-data'>
            <div class='text-center text-white'>
                Update Product Details...
            </div>
            <input type='text' placeholder='Name : ${name}' class='form-control mt-3' name='name'>
            <input type='number' placeholder='Price : ${price}' class='form-control mt-3' name='price'>
            <textarea name='details' cols='30' rows='5' class='form-control mt-3' placeholder='Details : ${details}'></textarea>
            <input type='file' name='pdtimg' class='form-control mt-3'>
            <div class='text-center'>
                <button class='bg-warning mt-3 btn'>Update Details</button>
            </div>
        </form>
    </div>"

?>

