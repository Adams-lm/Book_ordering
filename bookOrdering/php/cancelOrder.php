<?php
    header("Content-type:text/html; charset=utf-8");
	session_start();
	
	ini_set("display_errors", "on");
	error_reporting(E_ALL|E_STRICT);

    include("functions.php");
    include("conn.php");
    $book_id = $_GET["book_id"];
    $stu_id = $_SESSION["account"];
    $sql = "delete from stu_order where stu_no ='".$stu_id."' and book_id ='".$book_id."'";
    if(mysqli_query($conn, $sql)){
        page_redirect(1, "../func/stuFunc/checkOrder.php", "取消成功");
    }
?>