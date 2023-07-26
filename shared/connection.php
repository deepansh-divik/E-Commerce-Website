<?php

$conn= new mysqli("localhost","root","","acmegrade_project_webd");
if($conn->connect_error){
    echo "Error in sql connection";
    die;
}

?>