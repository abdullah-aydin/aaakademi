<?php require admin_view('static/header')  ?>



<?php require admin_view('static/navbar')  ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex">
                <div class="p-2">
                    <h1 class="m-0 text-dark">
                        <?php
                        foreach ($menus as $menu) {
                            echo $menu['url'] == $menu_active ?  $menu['title'] : null;
                        }
                        ?>
                    </h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <?php foreach ($lessons as $lesson_key => $lesson_val) : ?>
                        <div class="card card-<?= $theme_color[$themeIndex] ?>
                        <?= $lesson_key == post('lesson_name') ? null : 'collapsed-card' ?>">
                            <div class=" card-header">
                                <h3 class="card-title"><?= $_lessons[$lesson_key] ?></h3>
                                <div class="card-tools">
                                    <cite style="font-size: .8rem">
                                    <?= isset($question_targets[$lesson_key])? 'Hedefiniz günlük '. $question_targets[$lesson_key]. ' soru':'Hedef belirtmediniz.' ?></cite>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <form class="form-row " method="post" action="#">
                                    <div class="form-group col-md-4">
                                        <label for="lecture_id">Ders Konusu</label>
                                        <select id="lecture_id" name="lecture_id" class="form-control">
                                            <option disabled selected>Ders Konusu</option>
                                            <?php foreach ($_lectures[$lesson_key] as $key => $val) : ?>
                                                <option value="<?= $key ?>"><?= $val ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-1">
                                        <label for="question_true">Doğru</label>
                                        <input type="number" name="question_true" class="form-control" min="0" id="question_true">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label for="question_false">Yanlış</label>
                                        <input type="number" min="0" name="question_false" class="form-control" id="question_false">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label for="question_empty">Boş</label>
                                        <input type="number" min="0" name="question_empty" class="form-control" id="question_empty">
                                    </div>
                                    <div class="form-group col-md-2 d-flex align-items-end ml-auto">
                                        <button type="submit" class="btn btn-<?= $theme_color[$themeIndex] ?> form-control">Ekle</button>
                                    </div>
                                    <?php if (!isset($question_total_solved[$lesson_key])) : ?>
                                        <div class="form-group col-md-1 d-flex align-items-center justify-content-end ml-auto text-danger">
                                            <i class="far fa-times-circle align-self-center"></i>
                                            <cite style="font-size: .8rem">Hiç soru çözmediniz.</cite>
                                        </div>
                                    <?php elseif (isset($question_targets[$lesson_key])&&($question_total_solved[$lesson_key]['total_solved'] >= $question_targets[$lesson_key])) : ?>
                                        <div class="form-group col-md-1 d-flex align-items-center justify-content-end ml-auto text-success">
                                            <i class="far fa-check-circle align-self-center"></i>
                                            <cite style="font-size: .8rem">Toplam
                                                <?= $question_total_solved[$lesson_key]['total_solved'] ?>
                                                soru çözdünüz.</cite>
                                        </div>
                                    <?php else : ?>
                                        <div class="form-group col-md-1 d-flex align-items-center justify-content-end ml-auto text-secondary">

                                            <cite style="font-size: .8rem">Toplam
                                                <?= $question_total_solved[$lesson_key]['total_solved'] ?>
                                                soru çözdünüz.</cite>
                                        </div>
                                    <?php endif; ?>

                                    <input type="hidden" name="lesson_name" value="<?= $lesson_key ?>">
                                </form>
                                <table class="table table-sm">
                                    <thead>
                                        <tr class="table-<?= $theme_color[$themeIndex] ?>">
                                            <th scope="col">Ders Konusu</th>
                                            <th scope="col">Doğru</th>
                                            <th scope="col">Yanlış</th>
                                            <th scope="col">Boş</th>
                                            <th scope="col">Net</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($questions as $question) : ?>
                                            <?php if ($question['lesson_name'] == $lesson_key) : ?>
                                                <tr>
                                                    <td><?= ($_lectures[$lesson_key][$question['lecture_id']]) ?></td>
                                                    <td><?= $question['question_true'] ?></td>
                                                    <td><?= $question['question_false'] ?></td>
                                                    <td><?= $question['question_empty'] ?></td>
                                                    <td><?= net_hesaplama($question['question_true'], $question['question_false']) ?></td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <?php $themeIndex++ ?>
                    <?php endforeach; ?>
                    <!-- /.card -->
                    <!-- <div class="card card-warning collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Matematik</h3>
                    <div class="card-tools">
                        <cite style="font-size: .8rem">Hedefiniz günlük 20 soru</cite>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-row ">
                        <div class="form-group col-md-4">
                            <label for="inputState">Ders Konusu</label>
                            <select id="inputState" class="form-control">
                                <option disabled selected>Ders Konusu</option>
                                <option>Üslü Sayılar</option>
                            </select>
                        </div>
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-1">
                            <label for="inputCity">Doğru</label>
                            <input type="number" class="form-control" id="inputCity">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="inputCity">Yanlış</label>
                            <input type="number" class="form-control" id="inputCity">
                        </div>
                        <div class="form-group col-md-2 d-flex align-items-end ml-auto">
                            <button type="submit" class="btn btn-warning form-control">Ekle</button>
                        </div>
                        <div class="form-group col-md-1 d-flex align-items-center justify-content-end ml-auto" style="color:red">
                            <i class="far fa-times-circle align-self-center"></i>
                            <cite style="font-size: .8rem">Toplam 10 soru çözdünüz.</cite>
                        </div>
                    </div>
                </div>
               
            </div> -->
            <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php require admin_view('static/footer')  ?>

<?php require admin_view('static/footer-end')  ?>