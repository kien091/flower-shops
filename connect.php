<?php
    $conn = mysqli_connect("localhost", "root", "", "flower-shop");
    if(!$conn)
        die("Connect fail to database: " . mysqli_connect_error());
?>