<?php

$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crud_app";

    // إنشاء الاتصال
    $conn =  new mysqli($servername, $username, $password, $dbname);

    // التحقق من الاتصال
    if ($conn->connect_error) {
        die("فشل الاتصال: " . $conn->connect_error);
    }

    return $conn;