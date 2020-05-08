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
                        <h1 class="m-0 text-dark">Eğitim Denemesi Düzenle</h1>
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
                                <cite ><?=isset($trial['trial_date'])?date("d.m.Y", strtotime($trial['trial_date'])):null?></cite>
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
                                <label>Gelişim Psikolojisi</label>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <input type="number" min="0" max="20"  name="developmental_psychology_true" class="form-control" placeholder="Doğru"
                                               value="<?=isset($trial['developmental_psychology_true'])?$trial['developmental_psychology_true']:null?>">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" min="0" max="20" name="developmental_psychology_false" value="<?=isset($trial['developmental_psychology_false'])?$trial['developmental_psychology_false']:null?>"  class="form-control" placeholder="Yanlış">
                                    </div>
                                    <div class="col">
                                        <textarea name="developmental_psychology_description" class="form-control" rows="1"
                                                  placeholder="Açıklama"><?=isset($trial['developmental_psychology_description'])?$trial['developmental_psychology_description']:null?></textarea>
                                    </div>
                                </div>

                                <label>Öğrenme Psikolojisi</label>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <input type="number" min="0" max="20" name="learning_psychology_true" value="<?=isset($trial['learning_psychology_true'])?$trial['learning_psychology_true']:null?>" class="form-control" placeholder="Doğru">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" min="0" max="20" name="learning_psychology_false" value="<?=isset($trial['learning_psychology_false'])?$trial['learning_psychology_false']:null?>"  class="form-control" placeholder="Yanlış">
                                    </div>
                                    <div class="col">
                                        <textarea name="learning_psychology_description" class="form-control" rows="1"
                                                  placeholder="Açıklama"><?=isset($trial['learning_psychology_description'])?$trial['learning_psychology_description']:null?></textarea>
                                    </div>
                                </div>

                                <label>Program Geliştirme</label>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <input type="number" min="0" max="20" name="program_development_true" value="<?=isset($trial['program_development_true'])?$trial['program_development_true']:null?>" class="form-control" placeholder="Doğru">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" min="0" max="20" name="program_development_false" value="<?=isset($trial['program_development_false'])?$trial['program_development_false']:null?>"  class="form-control" placeholder="Yanlış">
                                    </div>
                                    <div class="col">
                                        <textarea name="program_development_description" class="form-control" rows="1"
                                                  placeholder="Açıklama"><?=isset($trial['program_development_description'])?$trial['program_development_description']:null?></textarea>
                                    </div>
                                </div>

                                <label>Rehberlik</label>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <input type="number" min="0" max="10" name="guidance_true" value="<?=isset($trial['guidance_true'])?$trial['guidance_true']:null?>" class="form-control" placeholder="Doğru">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" min="0" max="10" name="guidance_false" value="<?=isset($trial['guidance_false'])?$trial['guidance_false']:null?>"  class="form-control" placeholder="Yanlış">
                                    </div>
                                    <div class="col">
                                        <textarea name="guidance_description" class="form-control" rows="1"
                                                  placeholder="Açıklama"><?=isset($trial['guidance_description'])?$trial['guidance_description']:null?></textarea>
                                    </div>
                                </div>

                                <label>Ölçme ve Değerlendirme</label>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <input type="number" min="0" max="10" name="measurement_and_evaluation_true" value="<?=isset($trial['measurement_and_evaluation_true'])?$trial['measurement_and_evaluation_true']:null?>" class="form-control" placeholder="Doğru">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" min="0" max="10" name="measurement_and_evaluation_false" value="<?=isset($trial['measurement_and_evaluation_false'])?$trial['measurement_and_evaluation_false']:null?>"  class="form-control" placeholder="Yanlış">
                                    </div>
                                    <div class="col">
                                        <textarea name="measurement_and_evaluation_description" class="form-control" rows="1"
                                                  placeholder="Açıklama"><?=isset($trial['measurement_and_evaluation_description'])?$trial['measurement_and_evaluation_description']:null?></textarea>
                                    </div>
                                </div>

                                <label>Öğretim İlke ve Yöntemleri</label>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <input type="number" min="0" max="10" name="teaching_principles_and_methods_true" value="<?=isset($trial['teaching_principles_and_methods_true'])?$trial['teaching_principles_and_methods_true']:null?>" class="form-control" placeholder="Doğru">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" min="0" max="10" name="teaching_principles_and_methods_false" value="<?=isset($trial['teaching_principles_and_methods_false'])?$trial['teaching_principles_and_methods_false']:null?>"  class="form-control" placeholder="Yanlış">
                                    </div>
                                    <div class="col">
                                        <textarea name="teaching_principles_and_methods_description" class="form-control" rows="1"
                                                  placeholder="Açıklama"><?=isset($trial['teaching_principles_and_methods_description'])?$trial['teaching_principles_and_methods_description']:null?></textarea>
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