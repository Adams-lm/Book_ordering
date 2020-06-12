<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" type="text/css">
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

        #addBook {
            margin-left: 1050px;
            /*display: flex;*/
            width: 50px;
            height: 30px;
            /*align-items: flex-end;*/
            /*justify-content: center;*/
            text-decoration: none;
            /*            color: #fff;
            background: #333;
            border-radius: 6px;*/
        }

        table.tablesorter thead {
            cursor: pointer;
        }

        table.tablesorter thead tr th:hover {
            background-color: #f5f5f5;
        }

        a:hover {
            color: orange;
        }
    </style>
</head>

<body>
    <div class="table-responsive">
        <table class="table table-hover table-striped tablesorter">
            <thead>书籍管理
                <a href="../../php/addBook.php" title="" id="addBook" class="btn btn-success" style="width:150px">点击此处添加新书籍</a>
                <hr>
                <tr>
                    <th class="title ">序列号<i class="fa fa-sort"></th>
                    <th class="title ">书籍名称<i class="fa fa-sort"></th>
                    <th class="title ">书籍作者<i class="fa fa-sort"></th>
                    <th class="title ">书籍版本号<i class="fa fa-sort"></th>
                    <th class="title ">书籍出版商<i class="fa fa-sort"></th>
                    <th class="title ">书籍isbn<i class="fa fa-sort"></th>
                    <th class="title ">书籍价格<i class="fa fa-sort"></th>
                    <th class="title " colspan="2">操作<i class="fa fa-sort"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                header("Content-type: text/html;charset=utf-8");
                include "../../php/conn.php";
                $query = "SELECT * FROM book";
                $data = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($data)) {
                    echo '<tr>';
                    echo '<td>' . $row['book_id'] . '</td>';
                    echo '<td>' . $row['title'] . '</td>';
                    echo '<td>' . $row['author'] . '</td>';
                    echo '<td>' . $row['version'] . '</td>';
                    echo '<td>' . $row['press'] . '</td>';
                    echo '<td>' . $row['isbn'] . '</td>';
                    echo '<td>' . $row['price'] . '</td>';
                    echo '<td style=\'display:none\'>' . $row['book_id'] . '</td>';
                    echo "<td><a href='../../php/modifyBook.php?book_id=$row[0]'>修改</a></td>";
                    echo "<td><a href='../../php/deleteBook.php?book_id=$row[0]'>删除</a></td>";
                    echo '</tr>';
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/tablesorter/jquery.tablesorter.js"></script>
    <script src="../../js/tablesorter/tables.js"></script>
</body>

</html>