<?php

include_once "authguard.php";

$name=$_POST['name'];
$price=$_POST['price'];
$details=$_POST['details'];
$userid=$_SESSION['userid'];

print_r($_POST);
echo "<br>";

print_r($_FILES);
echo "<br>";

print_r($_FILES['pdtimg']['tmp_name']);
echo "<br>";

$dest_file_path="../shared/images/".$_FILES['pdtimg']['name'];
move_uploaded_file($_FILES['pdtimg']['tmp_name'],$dest_file_path);

include_once "../shared/connection.php";
$status=mysqli_query($conn,"insert into products(name,price,details,imgpath,uploaded_by) values('$name',$price,'$details','$dest_file_path',$userid)");

if($status){
    echo "product uploaded successfully";
    header("location:view.php");
}
else{
    echo "error, product not uploaded";
    echo mysqli_error($conn);
}
?>