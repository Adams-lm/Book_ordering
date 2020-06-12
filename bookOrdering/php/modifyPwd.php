<?php
header("Content-type: text/html;charset=utf-8");
include("conn.php");
include("functions.php");
session_start();
//用户号
// $userno="10000";
if(isset($_SESSION["userNo"])){
  $userno=$_SESSION["userNo"];
}else{
  page_redirect(1, "../login.php", "请先登录！");
}
//传参
if(isset($_POST["init_pwd"]) && isset($_POST["new_pwd"]) && isset($_POST["confirm_pwd"])){
  $user_init_pwd=$_POST["init_pwd"];
  $user_new_pwd=$_POST["new_pwd"];
  $user_confirm_pwd=$_POST["confirm_pwd"];
}else{
  page_redirect(0, "../login.php", "修改失败!");
}
//两次新密码是否一致
if($user_new_pwd!=$user_confirm_pwd){
  page_redirect(0, "", "前后新密码不一致！");
}

$sql="select password from student where stu_no=?";
$stmt=mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,'i',$userno);
mysqli_execute($stmt);
$rs=mysqli_stmt_get_result($stmt);
$row=mysqli_fetch_assoc($rs);

//原密码是否一致
if($row["password"]!=hash("sha256", $user_init_pwd)){
  page_redirect(0, "", "原密码输入错误!");
}else{
  $user_new_pwd=hash("sha256", $user_new_pwd);
  $sql2="update student set password=? where stu_no=?";
  $stmt2=mysqli_prepare($conn,$sql2);
  mysqli_stmt_bind_param($stmt2,'si',$user_new_pwd,$userno);
  mysqli_execute($stmt2);
  if(mysqli_affected_rows($conn)>0){
    page_redirect(1, "../stu.php", "修改成功!");
  }else{
    page_redirect(0, "", "密码没有变化");
  }
}

?>
