<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <title>登陆</title>
</head>
<body>
<main class="main" role="main">
    <div class="container">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <form class="form-container" action="php/chklogin.php" method="post">
                    <h2>教材订购系统-登陆</h2>
                    <div class="form-group">
                        <label for="exampleInputEmail1">用户名</label>
                        <input type="text" class="form-control" name="account" id="account" placeholder="请输入用户名">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">密码</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="请输入密码">
                    </div>
                    <div class="form-group" id="choice">
                        <input type="radio" name="identity" value="student">学生
                        <input type="radio" name="identity" value="dept_user">学院管理员
                        <input type="radio" name="identity" value="admin">商家管理员
                    </div>
                    <button type="submit" class="btn btn-success btn-block">登陆</button>
                </form>
            </div>
        </div>
    </div>
</main>


</body>
</html>