<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="../../bootstrap/css/bootstrap-theme.min.css" /> -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/formStyle.css" type="text/css">
    <style type="text/css">
        table{
            border:2px solid #333;
        }
        td{
            display: flex;
            justify-content: center;
            width:30%;
            border-bottom: 1px dotted #333;
            text-align: center;
        }
        .title{
            text-align: center;
            border-bottom: 1px solid #333;
            font-weight:bold;
        }
        a{
            margin:0 auto;
            text-align:center;
            width: 80px;
            height:30px;
            text-decoration: none;
            border-radius: 6px;
        }
        a:hover{
            color: lightgray;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <table>
        <caption>确认领书</caption>
        <thead>
            <tr>
                <!-- <th class="title col-md-2">学院编号</th> -->
                <th class="title col-md-3">学院名称</th>
                <th class="title col-md-2">总数目</th>
                <th class="title col-md-2">总价格</th>
                <th class="title col-md-3">领书日期</th>
                <th class="title col-md-2">操作</th>
            </tr>
        </thead>
        <!-- 全部领书单 -->
        <tbody id="confirm_list">
        </tbody>
    </table>
    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../js/confirm.js"> </script>
</body>
</html>