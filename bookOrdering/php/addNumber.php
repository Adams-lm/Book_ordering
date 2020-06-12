<?php
    include("functions.php");
    include("conn.php");
    $book_id = $_POST["book_id"];
    $addNum = $_POST["addNum"];
    echo $book_id;
    echo $addNum;    
    $sql = "update stock set number = number + ?  where book_id = ?";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"ii",$addNum,$book_id);
    mysqli_stmt_execute($stmt);
    if(mysqli_affected_rows($conn)>0){
        page_redirect(1,"../func/sellerFunc/check.php","库存增加成功！");  
    }
    else{
        page_redirect(1,"../func/sellerFunc/check.php","请输入需要增加的数量！！！");   
        die(); 
    }
?>
