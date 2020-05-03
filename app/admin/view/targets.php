<?php require admin_view('static/header')  ?>

<?php require admin_view('static/navbar')  ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- QUESTION TARGET SECTION -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex">
                <div class="p-2">
                    <h1 class="m-0 text-dark">Soru Hedefleri</h1>
                </div>
                <div class="ml-auto p-2">
                    <button type="button" id="addQuestionTarget" class="btn btn-primary">Soru Hedefi Ekle</button>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead id="question_target_table">
                        <tr>
                            <th style="width: 2%" class="p-2"></th>
                            <th class="align-middle">Hedef Tanımı</th>
                            <th style="width: 45%" class="align-middle">Hedef Başarı Oranı</th>
                            <th style="width: 18%"></th>
                        </tr>
                    </thead>
                    <tbody id="question_target_tbody">
                        <?php foreach ($questionTargets as $questionTargetKey => $questionTargetValue) : ?>
                            <?php

                            if (isset($question_total_solved[$questionTargetKey])) {
                                $q_total_solved = $question_total_solved[$questionTargetKey]['total_solved'];
                            } else {
                                $q_total_solved = 0;
                            }
                            ?>
                            <tr id="question_target_<?= $questionTargetValue['id'] ?>">
                                <td class="p-2"></td>
                                <td><a><?= $_lessons[$questionTargetValue['lesson_name']] ?> dersinden <?= $questionTargetValue['target'] ?> soru</a><br /><small><?= $questionTargetValue['init_date'] ?></small></td>
                                <td class="project_progress">
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-<?= percent_progresbar_color(percent_calculation($q_total_solved, $questionTargetValue['target'])); ?>" role="progressbar" aria-volumenow="<?= percent_calculation($q_total_solved, $questionTargetValue['target']); ?>" aria-volumemin="0" aria-volumemax="100" style="width: <?= percent_calculation($q_total_solved, $questionTargetValue['target']); ?>%">
                                        </div>
                                    </div>
                                    <small><?= percent_calculation($q_total_solved, $questionTargetValue['target']); ?>%</small><small> (<?= (isset($question_total_solved[$questionTargetKey]) ? $q_total_solved : '0') ?>/<?= $questionTargetValue['target'] ?>)</small>
                                </td>
                                <td class="align-middle">
                                    <div class="d-flex justify-content-end">
                                        <button class="btn  btn-danger btn-sm" onclick="deleteQuestionTarget(<?= $questionTargetValue['id'] ?>,this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
    <!-- /.content -->
    <!-- /. QUESTION TARGET SECTION -->
    <br>
    <hr>
    <!-- BOOK TARGET SECTION -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex" id="book_targets_container">
                <?php if (!$bookTargets) : ?>
                    <div class="p-2">
                        <h1 class="m-0 text-dark">Kitap Okuma Hedefi</h1>
                    </div>
                    <div class="ml-auto p-2">
                        <button type="button" id="addBookTarget" class="btn btn-primary">Okuma Hedefi Ekle</button>
                    </div>
                <?php else : ?>
                    <div class="p-2">
                        <h1 class="m-0 text-dark">Kitap Okuma Hedefi</h1>
                    </div>
                <?php endif; ?>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead id="book_targets_table">
                        <tr>
                            <th style="width: 2%" class="p-2"></th>
                            <th class="align-middle">Hedef Tanımı</th>
                            <th style="width: 45%" class="align-middle">Hedef Başarı Oranı</th>
                            <th style="width: 18%"></th>
                        </tr>
                    </thead>
                    <tbody id="book_targets_tbody">
                        <?php foreach ($bookTargets as $bookTarget) : ?>
                            <tr id="book_target_<?= $bookTarget['id'] ?>">
                                <td class="p-2">1</td>
                                <td><a>Günlük kitap okuma hedefiniz <?= $bookTarget['target'] ?> sayfa</a><br /><small><?= $bookTarget['init_date'] ?></small></td>
                                <td class="project_progress">
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-yellow" role="progressbar" aria-volumenow="<?= percent_calculation($reads_total, $bookTarget['target']) ?>" aria-volumemin="0" aria-volumemax="100" style="width: <?= percent_calculation($reads_total, $bookTarget['target']) ?>%">
                                        </div>
                                    </div>
                                    <small><?= percent_calculation($reads_total, $bookTarget['target']) ?> %</small><small> (<?= $reads_total ?> /<?= $bookTarget['target'] ?>)</small>
                                </td>
                                <td class="align-middle">
                                    <div class="d-flex justify-content-end">
                                        <button class="btn  btn-danger btn-sm" onclick="deleteBookTarget(<?= $bookTarget['id'] ?>,this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
    <!-- /.content -->
    <!-- /. BOOK TARGET SECTION -->
</div>
<!-- /.content-wrapper -->


<!--


-->

<?php require admin_view('static/footer')  ?>

<script>
    var targetsUrlApi = "<?= admin_url('api-targets') ?>";
</script>

<?php require admin_view('static/footer-end')  ?>