<?php

include_once "authguard.php";

$name=$_POST['name'];
$price=$_POST['price'];
$details=$_POST['details'];
$pid=$_SESSION['pid'];

print_r($_POST);
echo "<br>";

print_r($_FILES);
echo "<br>";

print_r($_FILES['pdtimg']['tmp_name']);
echo "<br>";

$location=$_FILES['pdtimg']['tmp_name'];

if($location == NULL){
    $status_location = 1;
}

if($name == NULL){
    $status_name = 1;
}

if($price == NULL){
    $status_price = 1;
}

if($details == NULL){
    $status_details = 1;
}

if($status_location != 1){
    $dest_file_path="../shared/images/".$_FILES['pdtimg']['name'];
    move_uploaded_file($_FILES['pdtimg']['tmp_name'],$dest_file_path);
}


include_once "../shared/connection.php";

if($status_location != 1){
    $status1=mysqli_query($conn,"update products set imgpath='$dest_file_path' where pid=$pid");
    if(!$status1){
        echo mysqli_error($conn);
    }
}


if($status_name != 1){
    $status2=mysqli_query($conn,"update products set name='$name where pid=$pid'");
    if(!$status2){
        echo mysqli_error($conn);
    }
}


if($status_price != 1){
    $status3=mysqli_query($conn,"update products set price=$price where pid=$pid");
    if(!$status3){
        echo mysqli_error($conn);
    }
}


if($status_details != 1){
    $status4=mysqli_query($conn,"update products set details='$details' where pid=$pid");
    if(!$status4){
        echo mysqli_error($conn);
    }
}

header("location:view.php");
?>