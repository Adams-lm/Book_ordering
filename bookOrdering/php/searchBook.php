<?php
    header("Content-type:text/html; charset=utf-8");
	session_start();
	
	ini_set("display_errors", "on");
	error_reporting(E_ALL|E_STRICT);

    include("functions.php");
    include("conn.php");
    $searchAttr = $_POST["searchAttr"];
    $searchCtt = $_POST["searchCtt"];
    if($searchAttr == ""){
        $sql = "select * from book";
        $stmt=mysqli_prepare($conn, $sql);
    }else{
        if($searchAttr == "book_id"){
            $sql = "select * from book where ".$searchAttr."=?";
            $stmt=mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "i", $searchCtt);
        }else{
            $searchCtt="%".$searchCtt."%";
            $sql = "select * from book where ".$searchAttr." like ?";
            $stmt=mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "s", $searchCtt);
        }
    }
    mysqli_stmt_execute($stmt);
    $rs=mysqli_stmt_get_result($stmt);
    $arrs=[];
    while($row=mysqli_fetch_assoc($rs)){
        array_push($arrs, $row);
    }
    echo json_encode($arrs, JSON_UNESCAPED_UNICODE);
?>