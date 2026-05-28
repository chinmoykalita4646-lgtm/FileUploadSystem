<?php
    $conn = new mysqli("localhost","root","","fileuploadsystem");

    if($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
    }
?>