<?php
    header("Content-type:text/html; charset=utf-8");
	session_start();
	
	ini_set("display_errors", "on");
	error_reporting(E_ALL|E_STRICT);

    include("functions.php");
    include("conn.php");
    $sql = "select * from book where book_id in (select book_id from stu_order where stu_no ='".$_SESSION["account"]."')";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_execute($stmt);
    $rs=mysqli_stmt_get_result($stmt);
    $arrs=[];
    while($row=mysqli_fetch_array($rs)){
        array_push($arrs, $row);
    }
    echo json_encode($arrs, JSON_UNESCAPED_UNICODE);
?>