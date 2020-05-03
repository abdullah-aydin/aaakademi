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
    <link rel="stylesheet" href="<?=admin_assets_url('dist/css/adminlte.min.css')?>">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?=admin_assets_url('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')?>">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a><b>AA</b> | Akademi</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Hemen aramıza katılmak için yeni bir üyelik oluştur! </p>

                <form action="#" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="<?=isset($user_name)?$user_name:null?>"  name="user_name" required placeholder="Adın ve soyadını buraya girmelisin">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control"  value="<?=isset($user_email)?$user_email:null?>"  name="user_email" required placeholder="Emailini de buraya :)">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <select class="form-control" id="inputState" name="user_class" required placeholder="Sınıfınızı seçin">
                            <option disabled selected>Sınıfınızı seçin</option>
                            <?php foreach ($class_lesson_name as $key => $val): ?>
                                <option value="<?=$key?>" <?=(isset($user_class) && $user_class==$key)?'selected':null?>><?=$val?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-chalkboard-teacher"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="user_password" required  placeholder="Şimdide sıra şifrende!">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="user_password_again" required placeholder="Şifreni tekrar et bakalım!">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col my-2">
                            <button type="submit" value="1" name="submit"  class="btn btn-primary btn-block center">Olalım bakalım.. Üye</button>

                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <div class="text-center">
                    <a href="<?=admin_url('signin')?>" class="text-center">Zaten üye isen tıkla!</a>
                </div>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

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