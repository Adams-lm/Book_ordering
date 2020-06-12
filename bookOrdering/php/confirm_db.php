<?php
header("Content-type: text/html;charset=utf-8");
include("conn.php");
include("functions.php");
session_start();
if(isset($_SESSION["userNo"])){
    $userno=$_SESSION["userNo"];
}else{
    page_redirect(1, "../login.php", "请先登录！");
}
// $userno="2";
// 查询全部领书单及对应书籍数量，按is_get排序，0没确认显示在前面；1确认过了显示在后面
//只显示本院情况
// $sql="SELECT b.dept_id,d.dept_name,tmp.book_nums,b.date,b.is_get
//         from book_get b
//         natural join department d
//         natural join (select c.dept_id as dept_id,count(c.class_id) as book_nums
//             FROM stu_order o
//             natural join student s
//             natural join class c
//             where o.is_get=1
//         group by c.dept_id
//         having c.dept_id=?) tmp
// order by b.is_get asc";
$sql="select * from book_get natural join department natural join dept_user where no=? order by is_get asc";
$stmt=mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,'i',$userno);
mysqli_execute($stmt);
$rs=mysqli_stmt_get_result($stmt);

$arr=array();
while($row=mysqli_fetch_assoc($rs)){
    array_push($arr,$row);
}
echo json_encode($arr);
?>