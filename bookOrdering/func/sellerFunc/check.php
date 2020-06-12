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
        <table class="table table-hover table-striped tablesorter" id="tableList">
            <thead>库存管理
                <hr>
                <tr>
                    <th class="title">序列号<i class="fa fa-sort"></i></th>
                    <!-- <td class="title ">书籍id</td> -->
                    <th class="title">书籍名称<i class="fa fa-sort"></i></th>
                    <th class="title">库存数量<i class="fa fa-sort"></i></th>
                    <th class="title">订购数量<i class="fa fa-sort"></i></th>
                    <th class="title">库存状态<i class="fa fa-sort"></i></th>
                    <th class="title">操作<i class="fa fa-sort"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php
                header("Content-type: text/html;charset=utf-8");
                include "../../php/conn.php";
                $query = "SELECT * FROM book
ORDER BY(select number from stock where stock.book_id = book.book_id)-
(select count(*) from  stu_order where stu_order.book_id = book.book_id and is_get ='0') desc";
                $data = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($data)) {
                    echo '<tr>';
                    echo "<form action=\"../../php/addNumber.php\" method=\"post\">";
                    echo '<td>' . $row['book_id'] . '</td>';
                    echo '<td>' . $row['title'] . '</td>';
                    $bookId = $row['book_id'];
                    $query_totnum = "select number from stock where book_id = $bookId";
                    $num = mysqli_fetch_array(mysqli_query($conn, $query_totnum));
                    if ($num[0] == "") $num[0] = 0;
                    echo '<td>' . $num[0] . '</td>';
                    $query_order = "select count(*) from (select * from stu_order where book_id = $bookId and is_get ='0') as bb";
                    $orderNum = mysqli_fetch_array(mysqli_query($conn, $query_order));
                    echo '<td>' . $orderNum[0] . '</td>';
                    echo "<td style='display:none'><input type='hidden' name='book_id' id='book_id' value='$row[0]'/></td>"; //书籍id传参(不可见)
                    if ($num[0] <= $orderNum[0]) echo '<td style=\'color:red;\'>不足</td>';
                    else { //库存不足</td>";
                        echo '<td>充足</td>';
                    }
                    echo "<td><input type='text' size='5' name='addNum' value=''/><button type='submit' style='margin-left:5px'>增加 </button></td>";
                    echo '</tr>';
                    echo "</form>";
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>

    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/tablesorter/jquery.tablesorter.js"></script>
    <script src="../../js/tablesorter/tables.js"></script>
    <!-- <script type="text/javascript">
        $("#tableList").trigger("update");
        $(function() {
            $("#tableList").tablesorter();
        });
    </script> -->
</body>


</html>