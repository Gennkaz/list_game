<?php 
    $servername = "localhost";
    $database = "kazweb";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die ('Gagal terhubung dengan MySQL: ' . mysqli_connect_error());	
    }
?>