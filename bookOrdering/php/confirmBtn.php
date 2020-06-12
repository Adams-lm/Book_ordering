<?php
header("Content-type: text/html;charset=utf-8");
include("conn.php");
include("functions.php");
$dept_id=$_GET["d_id"];
//$dept_id=1;
//更新领书单book_get表的is_get字段为1
$sql="update book_get set is_get=1 where dept_id=?";
$stmt=mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,'i',$dept_id);
mysqli_execute($stmt);
if(mysqli_affected_rows($conn)>0){
    page_redirect(1,"../func/deptFunc/confirm.php","确认成功！");
}
else{
    page_redirect(0,"../func/deptFunc/confirm.php","确认失败。");
}

?>