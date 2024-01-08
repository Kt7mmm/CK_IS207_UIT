<?php
$servername = "127.0.0.1";
$username = "root";
$password = "12345678";
$dbname = "QLCachLy";

// Tạo kết nối đến cơ sở dữ liệu
$connect = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
?>