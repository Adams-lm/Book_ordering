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

        a {
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
    <div id="navbar" class="navbar-collapse collapse">
        <form class="navbar-form navbar-left">
            <div class="form-group">
                <thead>书籍查询</thead>
                <select name="" id="searchAttr">
                    <option value=""></option>
                    <option value="book_id">序列号</option>
                    <option value="title">书籍名称</option>
                    <option value="author">书籍作者</option>
                    <option value="press">书籍出版商</option>
                    <option value="书籍isbn">isbn</option>
                </select>
                <input type="text" id="searchCtt" placeholder="搜索" class="form-control">
                <button type="button" id="searchBtn" class="btn btn-success">搜索</button>
            </div>
        </form>
    </div>
    <hr>
    <div class="table-responsive">
        <table class="table table-hover table-striped tablesorter" id='tableList'>
            <thead>
                <tr>
                    <th class="title ">序列号<i class="fa fa-sort"></th>
                    <th class="title ">书籍名称<i class="fa fa-sort"></th>
                    <th class="title ">书籍作者<i class="fa fa-sort"></th>
                    <th class="title ">书籍版本号<i class="fa fa-sort"></th>
                    <th class="title ">书籍出版商<i class="fa fa-sort"></th>
                    <th class="title ">书籍isbn<i class="fa fa-sort"></th>
                    <th class="title ">书籍价格<i class="fa fa-sort"></th>
                    <th class="title ">操作<i class="fa fa-sort"></th>
                </tr>
            </thead>
            <tbody id="list">
            </tbody>
        </table>
    </div>
    <div id="pages" style="display:flex; flex-wrap:nowrap; justify-content:center; margin-top:5px">
    </div>

    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/tablesorter/jquery.tablesorter.js"></script>
    <script src="../../js/tablesorter/tables.js"></script>
    <script language="javascript" type="text/javascript">
        function xieyi() {
            $("#searchBtn").trigger("click");
        }
        $(document).ready(function() {

            window.onload = xieyi;
        });
    </script>

    <script type="text/javascript">
        $("#searchBtn").click(function() {
            const PAGE_SIZE = 10;
            var iCount = 0;
            var curPage = 1;
            var iSum = 0;
            var originData = "";
            var str = "";
            var result = "";
            $.post("../../php/searchBook.php", {
                searchAttr: $("#searchAttr").val(),
                searchCtt: $("#searchCtt").val()
            }, function(data) {
                // console.log(data);
                str = "";
                iCount = (curPage - 1) * PAGE_SIZE;
                result = $.parseJSON(data);
                originData = result;
                $.each(result, function(i, item) {
                    if (iCount < curPage * PAGE_SIZE) {
                        str += "<tr>";
                        str += "<td>" + item.book_id + "</td>";
                        str += "<td>" + item.title + "</td>";
                        str += "<td>" + item.author + "</td>";
                        str += "<td>" + item.version + "</td>";
                        str += "<td>" + item.press + "</td>";
                        str += "<td>" + item.isbn + "</td>";
                        str += "<td>￥" + item.price + "</td>";
                        str += "<td><a style='margin-left: 33%;' href='../../php/createOrder.php?book_id=" + item.book_id + "'>订购</a></td>";
                        str += "</tr>";
                        iCount++;
                    }
                    iSum++;
                });
                $("#list").html(str);
                $("#tableList").trigger("update");
                str = "";
                if (iSum % PAGE_SIZE == 0) {
                    pages = iSum / PAGE_SIZE;
                } else {
                    pages = iSum / PAGE_SIZE + 1;
                }
                for (var i = 1; i <= pages; i++) {
                    str += "<a style='margin-right:3px' href='#' data-id=" + i + " class='page_link'>" + i + "</a>";
                }
                $("#pages").html(str);
            });
            $(function() {
                $("#tableList").tablesorter();
            });
            $(document).on("click", "a.page_link", function(e) {
                curPage = $(this).attr("data-id");
                iCount = (curPage - 1) * PAGE_SIZE;
                str = "";
                $.each(originData, function(i, item) {
                    if (i == iCount && iCount < curPage * PAGE_SIZE) {
                        str += "<tr>";
                        str += "<td>" + item.book_id + "</td>";
                        str += "<td>" + item.title + "</td>";
                        str += "<td>" + item.author + "</td>";
                        str += "<td>" + item.version + "</td>";
                        str += "<td>" + item.press + "</td>";
                        str += "<td>" + item.isbn + "</td>";
                        str += "<td>￥" + item.price + "</td>";
                        str += "<td><a style='margin-left: 33%;' href='../../php/createOrder.php?book_id=" + item.book_id + "'>订购</a></td>";
                        str += "</tr>";
                        iCount++;
                    }
                });
                $("#list").html(str);
                $("#tableList").trigger("update");
                return false;
            });
            $(function() {
                $("#tableList").tablesorter();
            });
        });
    </script>
</body>

</html>