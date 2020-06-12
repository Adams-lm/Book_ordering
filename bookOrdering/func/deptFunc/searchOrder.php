<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/formStyle.css" type="text/css">
    <style type="text/css">
        table{
            border:2px solid #333;
        }
        td{
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
            display: flex;
            width: 50px;
            height:30px;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #fff;
            background: #333;
            border-radius: 6px;
        }
        a:hover{
            color: orange;
        }
    </style>
</head>
<body>
    <div id="navbar" class="navbar-collapse collapse">
    <!-- action="../../php/searchOrder_db.php" method="post" -->
          <div  class="navbar-form navbar-left">
            <div class="form-group"> 
              <thead>订单查询</thead>
              <input type="text" id="order_name"name="order_name" placeholder="请输入班级名称" class="form-control">
              <button id="btn_search" type="button" class="btn btn-success">搜索</button>
            </div>
          </div><br><br><br>
          <!-- data-toggle="tooltip" -->
            <div id="search_title" ><strong>查询结果：</strong></div>
            <table id="tb_search">
                <!-- 查询结果表格 -->
            </table>
            <br>

            <!-- 展示全部订单 -->
            <table>
                <tr id="table_list">
                    <!-- <td class="title col-md-1">班级编号</td> -->
                    <td class="title col-md-2">班级</td>
                    <td class="title col-md-1">订书数量</td>
                    <td class="title col-md-2">总价格</td>
                </tr> 
                <!-- 连接数据库列表 -->
            </table>
    </div>


    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../js/searchOrder.js"></script>
    
</body>
</html>