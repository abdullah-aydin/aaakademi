<?php require admin_view('static/header')  ?>
    <style>
        @media screen and  (max-width: 600px) {
            .table td{
                padding: .5rem;
                max-width: 140px;
            }
            .table tbody th{
                padding: 0;
                padding-left: 0.4rem;
            }
        }
    </style>
<?php require admin_view('static/navbar')  ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- TYT DENENEMESİ  -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex">
                <div class="p-2">
                    <h1 class="m-0 text-dark">TYT Denemeleri</h1>
                </div>
                <div class="ml-auto p-2">
                    <a href="<?=admin_url('trial-add')?>">
                    <button type="button" id="addQuestionTarget" class="btn btn-primary">Deneme Ekle</button>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->

        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead class="bg-white">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Deneme Adı</th>
                        <th scope="col" >Tarih</th>
                        <th scope="col">Net</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody >
                    <?php foreach ($trials as $index=> $trial ): ?>
                        <tr>
                            <th scope="row" class="align-middle"><?=$index+1?></th>
                            <td class="align-middle"><?=$trial['trial_name']?></td>
                            <td class="align-middle tdDate"><?=$trial['trial_date']?></td>
                            <td class="align-middle"><?=lgs_puan_hesaplama($index)?></td>
                            <td class="align-middle">
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-info btn-sm mr-1" href="<?=admin_url('trial-edit?id='.$trial['id'])?>">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn  btn-danger btn-sm" onclick="deleteTrial(<?=$trial['id']?>,this)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- /.content -->
    <!-- /. TYT DENENEMESİ  -->
    <br>
    <hr>
    <!-- AYT DENENEMESİ  -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex">
                <div class="p-2">
                    <h1 class="m-0 text-dark">AYT Denemeleri</h1>
                </div>
                <div class="ml-auto p-2">
                    <a href="<?=admin_url('trial-add')?>">
                        <button type="button" id="addQuestionTarget" class="btn btn-primary">Deneme Ekle</button>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->

        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead class="bg-white">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Deneme Adı</th>
                        <th scope="col" >Tarih</th>
                        <th scope="col">Net</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody >
                    <?php foreach ($trials as $index=> $trial ): ?>
                        <tr>
                            <th scope="row" class="align-middle"><?=$index+1?></th>
                            <td class="align-middle"><?=$trial['trial_name']?></td>
                            <td class="align-middle tdDate"><?=$trial['trial_date']?></td>
                            <td class="align-middle"><?=lgs_puan_hesaplama($index)?></td>
                            <td class="align-middle">
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-info btn-sm mr-1" href="<?=admin_url('trial-edit?id='.$trial['id'])?>">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn  btn-danger btn-sm" onclick="deleteTrial(<?=$trial['id']?>,this)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- /.content -->
    <!-- /. AYT DENENEMESİ  -->

</div>
<!-- /.content-wrapper -->

<?php require admin_view('static/footer')  ?>

    <script>
        var deleteTrialApi = "<?= admin_url('api-trial') ?>";
    </script>

<?php require admin_view('static/footer-end')  ?>