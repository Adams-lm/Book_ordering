<?php
header("Content-type: text/html;charset=utf-8");
include("conn.php");
include("functions.php");
session_start();
if(isset($_SESSION["userNo"])){
  $dept_user_id=$_SESSION["userNo"];
}else{
  page_redirect(1, "../login.php", "请先登录！");
}
// $dept_user_id="20000";
//班级名，班级数目，班级总价，学员管理只能查询对应学院班级信息
$sql="SELECT c.class_id,c.class_name,COUNT(o.id) as totalNums,SUM(b.price) as totalPrice 
        FROM class c 
        left join department y on c.dept_id=y.dept_id
        left join dept_user x on y.dept_id=x.dept_id
        left join student s on c.class_id=s.class_id 
        left join stu_order o on s.stu_no=o.stu_no 
        left join book b on o.book_id=b.book_id 
        where x.no=?
        group by c.class_id 
        order by totalNums desc";
$stmt=mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,'i',$dept_user_id);
mysqli_stmt_execute($stmt);
$rs=mysqli_stmt_get_result($stmt);
$arrs=[];
while($row=mysqli_fetch_array($rs)){
    array_push($arrs, $row);
}
echo json_encode($arrs, JSON_UNESCAPED_UNICODE);

?>