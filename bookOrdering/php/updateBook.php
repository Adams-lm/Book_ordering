<?php
    include("conn.php");
    include("functions.php");
    $book_id=$_POST["book_id"];
    $title=$_POST["title"];
    $author=$_POST["author"];
    $version=$_POST["version"];
    $press=$_POST["press"];
    $isbn=$_POST["isbn"];
    $price=$_POST["price"];
    // echo $book_id;
    // echo $title;

    $sql="update book set title=?,author=?,version=?,press=?,isbn=?,price=? where book_id=?";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"sssssdi",$title,$author,$version,$press,$isbn,$price,$book_id);
    mysqli_stmt_execute($stmt);
    if(mysqli_affected_rows($conn)>0){
        page_redirect(1,"../func/sellerFunc/bookManage.php","书本信息修改成功!");
    }
    else{
        page_redirect(1,"../func/sellerFunc/bookManage.php","没有任何修改");   
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>
