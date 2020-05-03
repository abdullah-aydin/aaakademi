<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AA | Academia - Kayıt Ol</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=admin_assets_url('plugins/fontawesome-free/css/all.min.css')?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?=admin_assets_url('plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=admin_assets_url('dist/css/adminlte.min.css')?>">  <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a><b>AA</b> | Academia</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Şifreni mi unuttun? Yeni bir şifre için mailini yaz ve gelen kutuna bak!</p>

            <form action="#" method="post">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Şifremi yenile!</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mt-3 mb-1">
                <a href="<?=admin_url('signin')?>">Giriş Yap</a>
            </p>
            <p class="mb-0">
                <a href="<?=admin_url('signup')?>" class="text-center">Kayıt ol</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->


<!-- jQuery -->
<script src="<?=admin_assets_url('plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?=admin_assets_url('plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=admin_assets_url('dist/js/adminlte.min.js')?>"></script>
</body>
</html>