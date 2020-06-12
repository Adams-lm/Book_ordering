<?php
header("Content-type: text/html;charset=utf-8");
include("conn.php");
include("functions.php");
session_start();
if(isset($_SESSION["userNo"])){
  $dept_user_no=$_SESSION["userNo"];
}else{
  page_redirect(1,"../login.php","请先登录！");
  die();
}
//测试
// $dept_user_no="20000";
// $search_name="计算机184";
if(isset($_POST["className"])){
    $search_name=$_POST["className"];
}else{
    page_redirect(0,"../func/deptFunc/searchOrder.php","请输入班级名称！");
    die();
}

$search_name="%".$search_name."%";
// 根据班级编号查询结果
$sql="SELECT c.class_id,c.class_name,COUNT(o.id) as totalNums,SUM(b.price) as totalPrice 
        FROM class c 
        left join department y on c.dept_id=y.dept_id
        left join dept_user x on y.dept_id=x.dept_id
        left join student s on c.class_id=s.class_id 
        left join stu_order o on s.stu_no=o.stu_no 
        left join book b on o.book_id=b.book_id 
        where x.no=? and c.class_name like ?
        group by c.class_id 
        order by totalNums desc";
// showAlert($search_name);
$stmt=mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,'is',$dept_user_no,$search_name);
mysqli_execute($stmt);
$rs=mysqli_stmt_get_result($stmt);

$arr=array();
while($row=mysqli_fetch_assoc($rs)){
    array_push($arr,$row);
}
echo json_encode($arr);
?>