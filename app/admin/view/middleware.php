<?php require admin_view('static/header')  ?>


<style>
div.checkbox.switcher label,
div.radio.switcher label {
    padding: 0;
}

div.checkbox.switcher label *,
div.radio.switcher label * {
    vertical-align: middle;
}

div.checkbox.switcher label input,
div.radio.switcher label input {
    display: none;
}

div.checkbox.switcher label input+span,
div.radio.switcher label input+span {
    position: relative;
    display: inline-block;
    margin-right: 5px;
    width: 40px;
    height: 20px;
    background: #FF9693;
    border: 1px solid #FF9693;
    border-radius: 50px;
    transition: all 0.3s ease-in-out;
    vertical-align: sub;
}

div.checkbox.switcher label input+span small,
div.radio.switcher label input+span small {
    position: absolute;
    display: block;
    width: 50%;
    height: 100%;
    background: #fff;
    border-radius: 50%;
    transition: all 0.3s ease-in-out;
    left: 0;
}

div.checkbox.switcher label input:checked+span,
div.radio.switcher label input:checked+span {
    background: #34AC00;
    border-color: #34AC00;
}

div.checkbox.switcher label input:checked+span small,
div.radio.switcher label input:checked+span small {
    left: 50%;
}
</style>


<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

</head>
<body>

<div class="container d-flex justify-content-center align-items-center" style="height:100vh">
    
    <div class="card col-md-8">
    
  <h5 class="card-header bg-primary text-center"><strong>Takip etmek istediğiniz dersleri seçiniz</strong> </h5>
 
        <div class="card-body my-4">
           <form action="#" method="post">
            <div class="col-sm-12 checkbox switcher">
                <div class="row">
                <?php foreach($lessons as $key => $lesson):?>
                    <div class="col-md-4 mt-2" >
                        <label for="<?=$key?>">
                            <input type="checkbox" id="<?=$key?>" name="<?=$key?>" value="1">
                            <span><small></small></span>
                            <?=$lesson?>
                        </label>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted ml-auto">
            <button href="#"  class="btn btn-primary ">Devam Et</button>
        </form>
    </div>
   
</div>

</div>


<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?=admin_assets_url('plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?=admin_assets_url('plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=admin_assets_url('dist/js/adminlte.min.js')?>"></script>
<!-- jQuery UI -->
<script src="<?=admin_assets_url('plugins/jquery-ui/jquery-ui.min.js')?>"></script>
<!-- SweetAlert2 -->
<script src="<?=admin_assets_url('plugins/sweetalert2-theme-bootstrap-4/sweetalert2.min.js')?>">

</script>

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