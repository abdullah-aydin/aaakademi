
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Başlık</h5>
        <p>İçerik</p>
    </div>
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?=admin_assets_url('plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?=admin_assets_url('plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=admin_assets_url('dist/js/adminlte.min.js')?>"></script>
<!-- jQuery UI -->
<script src="<?=admin_assets_url('plugins/jquery-ui/jquery-ui.min.js')?>"></script>
<!-- chart -->
<script src="<?=admin_assets_url('plugins/Chart/chart.js')?>"></script>
<!-- SweetAlert2 -->
<script src="<?=admin_assets_url('plugins/sweetalert2-theme-bootstrap-4/sweetalert2.min.js')?>"></script>
<!-- MainJS -->
<script src="<?=admin_assets_url('dist/js/main.js')?>" ></script>


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

