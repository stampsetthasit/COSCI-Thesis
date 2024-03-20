<?php
    // SERVER
    $servername = "";
    $username = "";
    $password = "";
    $dbname = "";

    /* localhost */
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "ยังไม่ได้สร้าง";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("DB Connection failed: " . mysqli_connect_error());
    }
    // else {
    //     echo "OK!!! DB Connect...";
    // }

    mysqli_set_charset($conn, "utf8");
?>
