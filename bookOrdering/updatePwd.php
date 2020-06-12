<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <style>
      label{
        text-align:end;
        margin:5px 0;
      }
      input{
        margin:5px 0;
      }
      .form-group{
        margin:30px 10px;
      }

      .form-group button{
        margin:10px 0 10px 12%;
      }

      /* .btn_c{
        display:flex;
        justify-content:flex-end;
        align-items:center;
      } */

      .card{
        margin:20px;
        border-radius:5px;
        box-shadow: 2px 2px 5px 3px rgb(212, 212, 212);
      }
    </style>
</head>
<body>
    <div class="card col-md-4">
    <form id="form_pwd" method="post" class="col-md-12">
      <div class="form-group">
        <label for="init_pwd" class="col-md-4 control-label item">原密码</label>
        <div class="col-md-8 item">
          <input type="password" class="form-control" id="init_pwd" name="init_pwd" placeholder="请输入原密码">
        </div>
      </div>
      <div class="form-group">
        <label for="new_pwd" class="col-md-4 control-label item" placeholder="请输入新密码">新密码</label>
        <div class="col-md-8 item">
          <input type="password" class="form-control" id="new_pwd" name="new_pwd" placeholder="请输入新密码">
        </div>
      </div>
      <div class="form-group">
        <label for="confirm_pwd" class="col-md-4 control-label item">确认密码</label>
        <div class="col-md-8 item">
          <input type="password" class="form-control" id="confirm_pwd" name="confirm_pwd" placeholder="请确认新密码">
        </div>
      </div>
      <div class="form-group btn_c" >
        <button id="sub_pwd" type="button" class="btn btn-primary" style='margin-left:88%'>修改</button>
      </div>
    </form>
    </div>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function(){
        
        $("#sub_pwd").click(function(){
          $("#form_pwd").attr("action","php/modifyPwd.php");
          $("#form_pwd").submit();
        });
      });
    </script>
</body>
</html>