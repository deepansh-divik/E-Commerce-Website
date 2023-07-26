<?php

include_once "authguard.php";
include_once "menu.html";
$_SESSION['userid']=$userid;
?>


<html>

    <head>
    </head>

    <body background ="homeimage.png" style="background-size: cover;">
    <div class="d-flex justify-content-center align-items-center vh-100">
        <form action="upload.php" class="bg-success p-4" method="POST" enctype="multipart/form-data">
            <div class="text-center text-white">
                Upload Products...
            </div>
            <input type="text" placeholder="product name" class="form-control mt-3" name="name">
            <input type="number" placeholder="product price" class="form-control mt-3" name="price">
            <textarea name="details" cols="30" rows="5" class="form-control mt-3" placeholder="product details..."></textarea>
            <input type="file" name="pdtimg" class="form-control mt-3">
            <div class="text-center">
                <button class="bg-warning mt-3 btn">Upload</button>
            </div>
        </form>
    </div>
    </body>

</html>