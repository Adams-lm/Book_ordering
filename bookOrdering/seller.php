<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <div class="navbar navbar-duomi navbar-static-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#" id="logo">后台管理系统</a>
            </div>
            <div class="navbar-right">
                <?php
                @session_start();
                if (isset($_SESSION["userName"])) {
                    echo "<a class='navbar-brand' href='#' style='color:#fff;'>当前用户：" . $_SESSION["userName"] . "</a>";
                }
                ?>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <ul id="main-nav" class="nav nav-tabs nav-stacked">
                    <li class="active">
                        <a href="#"><i class="glyphicon glyphicon-th-large"></i>首页</a>
                    </li>
                    <li>
                        <a href="#systemSetting" class="nav-header collapsed" data-toggle="collapse">
                            <i class="glyphicon glyphicon-cog"></i>系统管理
                            <span class="pull-right glyphicon glyphicon-chevron-down"></span>
                        </a>
                        <ul id="systemSetting" class="nav nav-list collapse secondmenu" style="height: 0px;">
                            <li><a href="modify.php"><i class="glyphicon glyphicon-edit"></i>修改密码</a></li>
                            <li><a href="php/logout.php"><i class="glyphicon glyphicon-edit"></i> 退出登录 </a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="func/sellerFunc/bookManage.php" target="ctt">
                            <i class="glyphicon glyphicon-credit-card"></i>
                            书籍管理
                        </a>
                    </li>
                    <li>
                        <a href="func/sellerFunc/check.php" target="ctt">
                            <i class="glyphicon glyphicon-globe"></i>
                            订单/库存核查
                            <!-- <span class="label label-warning pull-right">5</span> -->
                        </a>
                    </li>
                    <li>
                        <a href="func/sellerFunc/distribute.php" target="ctt">
                            <i class="glyphicon glyphicon-calendar"></i>
                            发送领书单
                        </a>
                    </li>
                    <li>
                        <a href="#" id="contact">
                            <i class="glyphicon glyphicon-fire"></i>
                            联系我们
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10">
                <iframe src="func/sellerFunc/bookManage.php" name="ctt"></iframe>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#contact").click(function() {
            alert("点我也没用 你是联系不到我的:)");
        });
    </script>



</body>

</html>