<?php
    include("functions.php");
    include("conn.php");
    $book_id = $_GET["book_id"];
    $sql = "delete from book where book_id =$book_id";
    if(mysqli_query($conn, $sql)){
        page_redirect(1, "../func/sellerFunc/bookManage.php", "删除成功");
    }
    else{
        echo "删除失败";
    }
?>
