<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../css/formStyle.css" type="text/css">
    <link rel="stylesheet" href="../../fonts/font-awesome/css/font-awesome.min.css">
    <style type="text/css">
        table {
            border: 2px solid #333;
        }

        td {
            width: 10%;
            border-bottom: 1px dotted #333;
            text-align: center;
        }

        .title {
            text-align: center;
            border-bottom: 1px solid #333;
            font-weight: bold;
        }

        td>a {
            margin-left: 30px;
            display: flex;
            width: 50px;
            height: 30px;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #fff;
            background: #333;
            border-radius: 6px;
        }
        a:hover {
            color: orange;
        }
    </style>
</head>

<body>
<div class="table-responsive">
    <table  class="table table-hover table-striped tablesorter">
        <thead>发送领书单
        <hr>
        <tr>
            <th class="title">学院 <i class="fa fa-sort"></th>
            <th class="title">订单教材数量 <i class="fa fa-sort"></th>
            <th class="title">价格 <i class="fa fa-sort"></th>
            <th class="title">缺少书籍 <i class="fa fa-sort"></th>
            <th class="title">书籍领取时间 <i class="fa fa-sort"></th>
            <th class="title colspan='2'">操作 <i class="fa fa-sort"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        header("Content-type: text/html;charset=utf-8");
        include("../../php/conn.php");
        $is_get = 0;

        //分学院查询订单中未被领取的书
        $sql = "SELECT COUNT(*) as num,dept_name,dept_id
                FROM stu_order NATURAL JOIN student NATURAL JOIN class NATURAL JOIN department
                WHERE is_get=?
                GROUP BY dept_id
                order by num desc";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $is_get);
        mysqli_stmt_execute($stmt);
        $rs = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_array($rs)) {
            echo "<tr>";
            echo "<form action=\"../../php/send.php\" method=\"post\">";
            echo "<td >$row[1]</td>";
            echo "<td >$row[0]</td>";
            echo "<input type='hidden' name='num' value='$row[0]'/>"; //数量传参
            $dept_id = $row[2];
            $is_get = 0;

            $Sqlprice = "select sum(price) as price from (SELECT book_id from stu_order WHERE is_get=? and stu_no in
                        (SELECT stu_no from	student WHERE class_id in (SELECT class_id FROM class where dept_id =?))) AS a
                        NATURAL JOIN book";
            $stmt1 = mysqli_prepare($conn, $Sqlprice);
            mysqli_stmt_bind_param($stmt1, "ii", $is_get, $dept_id);
            mysqli_stmt_execute($stmt1);
            $rs1 = mysqli_stmt_get_result($stmt1);

            if ($row1 = mysqli_fetch_array($rs1)) {
                echo "<td>$row1[0]元</td>";
                echo "<input type='hidden' name='total_price' value='$row1[0]'/>"; //价格传参
            }

            //查询相应学院订书具体情况
            $sql2 = "SELECT COUNT(*)-number as lack,title,dept_name
                        from stu_order NATURAL join student NATURAL JOIN class NATURAL JOIN department NATURAL JOIN book NATURAL JOIN stock
                        WHERE is_get=? and dept_id=? 
                        GROUP BY dept_id,book_id
                        ";

            $stmt2 = mysqli_prepare($conn, $sql2);
            mysqli_stmt_bind_param($stmt2, "ii", $is_get, $dept_id);
            mysqli_stmt_execute($stmt2);
            $rs2 = mysqli_stmt_get_result($stmt2);
            $str = "";
            while ($row2 = mysqli_fetch_array($rs2)) {
                if ($row2[0] > 0)
                    $str = $str . $row2[1] . "缺少" . $row2[0] . "本" . '<br>';
            }

            $flagSend = 0; //默认无法发送领书单，若库存充足才能发送
            if ($str == '') {
                $str = "库存充足";
                echo "<td>$str</td>";
                $flagSend = 1;
            } else {
                echo "<td style='color:red;'>$str</td>";
            }

            if ($flagSend == 1) { //库存充足
                echo "<td><input type='date' name='date' value=''></td>";
                echo "<input type='hidden' name='dept_id' value='$dept_id'/>"; //部门id传参(不可见)
                echo "<td><button type='submit'>发送领书单</button></td>";
            } else { //库存不足
                echo "<td>请先增加库存</td>";
                echo "<td>无</td>";
            }
            echo "</tr>";
            echo "</form>";
        }
        ?>
        </tbody>
    </table>
    </div>

    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/tablesorter/jquery.tablesorter.js"></script>
    <script src="../../js/tablesorter/tables.js"></script>
</body>

</html>