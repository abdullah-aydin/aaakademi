<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AA | Academia - Giriş Yap</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=admin_assets_url('plugins/fontawesome-free/css/all.min.css')?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?=admin_assets_url('plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=admin_assets_url('dist/css/adminlte.min.css')?>">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?=admin_assets_url('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')?>">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><a><b>AA</b> | Akademi</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Giriş yap bakalım!</p>

            <form action="#" method="post">
                <div class="input-group mb-3">
                    <input type="email" class="form-control"  value="<?=isset($user_email)?$user_email:null?>"  name="user_email" required placeholder="Emailini buraya girmelisin">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="user_password" required  placeholder="Şifreni de buraya :)">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-6">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Unutma Beni!
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                        <button type="submit" name="submit" value="1" class="btn btn-primary btn-block">Giriş Yap</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mb-1">
                <a href="<?=admin_url('forgot-pass')?>">Şifremi unuttum galiba :( </a>
            </p>
            <p class="mb-0">
                <a href="<?=admin_url('signup')?>" class="text-center">Hesabın yoksa kayıt olmak için ne duruyorsun?</a>
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
<!-- SweetAlert2 -->
<script src="<?=admin_assets_url('plugins/sweetalert2-theme-bootstrap-4/sweetalert2.min.js')?>"></script>
<script type="text/javascript">
    $(function() {
        var Error = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        var Success = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        <?php
        if( isset($error) ):?>
        Error.fire({
            icon: 'error',
            title: '&emsp;  <?= $error?>'
        })
        <?php endif; ?>
        <?php
        if( isset($success) ):?>
        Success.fire({
            icon: 'success',
            title: '&emsp;   <?= $success?>'
        })
        <?php endif; ?>
    });

</script>

</body>

</html>