<?php
    header("Content-type:text/html; charset=utf-8");
	session_start();
	
	ini_set("display_errors", "on");
	error_reporting(E_ALL|E_STRICT);

    include("functions.php");
    include("conn.php");
    $book_id = $_GET["book_id"];
    $stu_id = $_SESSION["account"];
    $sql = "insert into stu_order (stu_no, book_id) values('$stu_id', '$book_id')";
    if(mysqli_query($conn, $sql)){
        page_redirect(1, "../func/stuFunc/orderBook.php", "订购成功");
    }
    else{
        page_redirect(0, "", "订购失败");
    }
?>