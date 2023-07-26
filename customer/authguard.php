<html>
    <head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head>
    <body></body>
</html>

<?php

session_start();

if(!isset($_SESSION['login_status'])){
    echo "Illegal Attempt";
    die;
}
if($_SESSION['login_status']==false){
    echo "Unauthorized attempt";
    die;
}
if($_SESSION['user_type']!='customer'){
    echo "No permission to access this resource";
    die;
}

$username=$_SESSION['username'];
$user_type=$_SESSION['user_type'];
$userid=$_SESSION['userid'];

echo "<div class='d-flex justify-content-evenly bg-info p-2'>
    <div class='fw-bold'>Username : $username</div>
    <div class='fw-bold'>$user_type</div>
    <div class='fw-bold'>Userid : $userid</div>
</div>";

?>