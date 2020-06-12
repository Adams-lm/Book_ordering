<?php
    header("Content-type:text/html; charset=utf-8");
	session_start();
	
	ini_set("display_errors", "on");
	error_reporting(E_ALL|E_STRICT);

    include("functions.php");
    include("conn.php");

    $account=$_POST["account"];
    //$password=$_POST["password"];
    $password=hash("sha256", $_POST["password"]);
    $identity=$_POST["identity"];
    if(empty($account)||empty($password)||empty($identity)){
        page_redirect(1, "../login.php", "用户名/密码/身份选择不得为空");
    }
    $_SESSION["account"] = $account;
    if($identity == 'admin'){
        $sql = "select * from ".$identity." where admin_no ='".$account."'"." and password ='".$password."'";
        $rs = mysqli_query($conn, $sql);
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_execute($stmt);
        $rs=mysqli_stmt_get_result($stmt);
        if($row=mysqli_fetch_array($rs)){
            $_SESSION["userNo"]=$row[0];
            $_SESSION["userName"]=$row[1];
            page_redirect(1, "../seller.php", "登录成功");
        }else{
            page_redirect(1, "../login.php", "用户名或密码不正确");
        }
    }else if($identity == 'dept_user'){
        $sql = "select * from ".$identity." where no ='".$account."'"." and password ='".$password."'";
        $rs = mysqli_query($conn, $sql);
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_execute($stmt);
        $rs=mysqli_stmt_get_result($stmt);
        if($row=mysqli_fetch_array($rs)){
            $_SESSION["userNo"]=$row[0];
            $_SESSION["userName"]=$row[1];
            page_redirect(1, "../dept.php", "登录成功");
        }else{
            page_redirect(1, "../login.php", "用户名或密码不正确");
        }
    }else if($identity == 'student'){
         $sql = "select * from ".$identity." where stu_no ='".$account."'"." and password ='".$password."'";
         $rs = mysqli_query($conn, $sql);
         $stmt = mysqli_prepare($conn, $sql);
         mysqli_stmt_execute($stmt);
         $rs=mysqli_stmt_get_result($stmt);
         if($row=mysqli_fetch_array($rs)){
             $_SESSION["userNo"]=$row[0];
             $_SESSION["userName"]=$row[1];
             page_redirect(1, "../stu.php", "登录成功");
         }else{
             page_redirect(1, "../login.php", "用户名或密码不正确");
         }
    }   
?>