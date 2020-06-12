<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>modify</title>
</head>
<body>
<?php
    include("functions.php");
    include("conn.php");
    $dept_id=$_POST["dept_id"];
    $date=$_POST["date"];
    $num=$_POST["num"];
    $total_price=$_POST["total_price"];
    $is_get=1;

    //若时间选择有误
    if($date==""){
        page_redirect(1,"../func/sellerFunc/distribute.php","请选择领取时间！");   
        die();
    }

    // 先在stu_order中标记对应学院订单get
    $sql2="UPDATE stu_order SET is_get=?
    WHERE stu_no in
    (SELECT stu_no
    from student NATURAL JOIN class NATURAL JOIN department
    WHERE dept_id=?)";
    $stmt2=mysqli_prepare($conn,$sql2);
    mysqli_stmt_bind_param($stmt2,"ii",$is_get,$dept_id);
    mysqli_stmt_execute($stmt2);

    //stock中对应书籍number的减少在触发器stock_reduce中同时出发

    //最后在book_get表中插入领书数据

    $sql="insert into book_get (dept_id,date,num,total_price) VALUES(?,?,?,?);";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"isid",$dept_id,$date,$num,$total_price);
    mysqli_stmt_execute($stmt);
    if(mysqli_affected_rows($conn)>0){
        page_redirect(1,"../func/sellerFunc/distribute.php","领书单发送成功！");  
    }
    else{
        page_redirect(0,"","领书单发送失败！！！");   
        die(); 
    }

?> 

</body>
</html>