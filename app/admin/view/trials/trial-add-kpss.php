<?php require admin_view('static/header')  ?>
    <style>
        @media screen and  (max-width: 600px) {
            .table td{
                padding: .5rem;
                max-width: 140px;trial-edit.php
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
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="d-flex align-items-center">
                    <div class="p-2">
                        <h1 class="m-0 text-dark">GK-GY Denemesi Ekle</h1>
                    </div>
                    <div class="mr-auto p-2">
                        <a href="<?=admin_url('trial')?>">
                            <button type="button" id="addQuestionTarget" class="btn btn-sm btn-danger">< Geri Dön</button>
                        </a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <strong>Deneme Başlığı</strong>
                            </div>
                            <div class="card-tools">
                                <cite ><?=isset($trial['trial_date'])?$trial['trial_date']:null?></cite>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="#" method="post">
                                <div class="form-group row d-flex justify-content-center align-items-center">
                                    <label>Deneme Adı</label>
                                    <div class="col">
                                        <input type="text" name="trial_name" class="form-control" required placeholder="Deneme Adını Giriniz"
                                               value="<?=isset($trial['trial_name'])?$trial['trial_name']:null?>">
                                    </div>
                                </div>
                                <label>Matematik</label>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <input type="number" min="0" max="30"  name="math_true" class="form-control" placeholder="Doğru"
                                               value="<?=isset($trial['math_true'])?$trial['math_true']:null?>">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" min="0" max="30" name="math_false" value="<?=isset($trial['math_false'])?$trial['math_false']:null?>"  class="form-control" placeholder="Yanlış">
                                    </div>
                                    <div class="col">
                                        <textarea name="math_description" class="form-control" rows="1"
                                                  placeholder="Açıklama"><?=isset($trial['math_description'])?$trial['math_description']:null?></textarea>
                                    </div>
                                </div>

                                <label>Türkçe</label>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <input type="number" min="0" max="30" name="turkish_true" value="<?=isset($trial['turkish_true'])?$trial['turkish_true']:null?>" class="form-control" placeholder="Doğru">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" min="0" max="30" name="turkish_false" value="<?=isset($trial['turkish_false'])?$trial['turkish_false']:null?>"  class="form-control" placeholder="Yanlış">
                                    </div>
                                    <div class="col">
                                        <textarea name="turkish_description" class="form-control" rows="1"
                                                  placeholder="Açıklama"><?=isset($trial['turkish_description'])?$trial['turkish_description']:null?></textarea>
                                    </div>
                                </div>

                                <label>Tarih</label>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <input type="number" min="0" max="30" name="history_true" value="<?=isset($trial['history_true'])?$trial['history_true']:null?>" class="form-control" placeholder="Doğru">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" min="0" max="30" name="history_false" value="<?=isset($trial['history_false'])?$trial['history_false']:null?>"  class="form-control" placeholder="Yanlış">
                                    </div>
                                    <div class="col">
                                        <textarea name="history_description" class="form-control" rows="1"
                                                  placeholder="Açıklama"><?=isset($trial['history_description'])?$trial['history_description']:null?></textarea>
                                    </div>
                                </div>

                                <label>Coğrafya</label>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <input type="number" min="0" max="20" name="geography_true" value="<?=isset($trial['geography_true'])?$trial['geography_true']:null?>" class="form-control" placeholder="Doğru">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" min="0" max="2trial-add-kpss.php0" name="geography_false" value="<?=isset($trial['geography_false'])?$trial['geography_false']:null?>"  class="form-control" placeholder="Yanlış">
                                    </div>
                                    <div class="col">
                                        <textarea name="geography_description" class="form-control" rows="1"
                                                  placeholder="Açıklama"><?=isset($trial['geography_description'])?$trial['geography_description']:null?></textarea>
                                    </div>
                                </div>

                                <label>Vatandaşlık</label>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <input type="number" min="0" max="10" name="citizenship_true" value="<?=isset($trial['citizenship_true'])?$trial['citizenship_true']:null?>" class="form-control" placeholder="Doğru">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" min="0" max="10" name="citizenship_false" value="<?=isset($trial['citizenship_false'])?$trial['citizenship_false']:null?>"  class="form-control" placeholder="Yanlış">
                                    </div>
                                    <div class="col">
                                        <textarea name="citizenship_description" class="form-control" rows="1"
                                                  placeholder="Açıklama"><?=isset($trial['citizenship_description'])?$trial['citizenship_description']:null?></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <button type="submit" name="submit" value="1" class="btn btn-primary m-auto">Kaydet</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php require admin_view('static/footer')  ?>

<?php require admin_view('static/footer-end')  ?>