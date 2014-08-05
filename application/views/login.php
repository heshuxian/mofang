<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>资本魔方 | 登录</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="/public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="/public/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="/public/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">登录</div>
            <form method="post" id='loginForm'>
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="txtUsername" id="txtUsername" class="form-control" placeholder="用户名"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="txtPassword" id="txtPassword" class="form-control" placeholder="密码"/>
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">登录</button>
                </div>
            </form>
        </div>
        <!-- jQuery 2.0.2 -->
        <script src="/public/js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="/public/js/bootstrap.min.js" type="text/javascript"></script>        
		<?php echo $scriptExtra;?>
    </body>
</html>