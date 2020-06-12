<?php
$user = 'root';
$pwd = '123456';
$db = 'book_ordering';
$host = '127.0.0.1';
$port = 3306;
$conn = mysqli_init();
$success = mysqli_real_connect(
    $conn,
    $host,
    $user,
    $pwd,
    $db,
    $port
);
if($success!=1){
    die("数据库连接失败");
}
?>