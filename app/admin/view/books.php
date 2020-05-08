<?php require admin_view('static/header') ?>

<style>
    @media screen and  (max-width: 600px) {
        .table thead .addPage {
            padding: 0;
        }

        .table tbody th {
            padding: 0;
            padding-left: 0.3rem;
        }
    }
</style>

<?php require admin_view('static/navbar') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- ACTIVE BOOKS SECTION-->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex">
                <div class="p-2">
                    <h1 class="m-0 text-dark">Aktif Kitaplar</h1>
                </div>
                <div class="ml-auto p-2">
                    <button type="button" id="addBook" class="btn btn-primary">Yeni Kitap Ekle</button>
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
                    <thead id="active_book_table">
                    <tr>
                        <th style="width: 2% " class="p-2"></th>
                        <th class="align-middle">Kitap Adı</th>
                        <th style="width: 40% " class="align-middle">Okunma Süreci</th>
                        <th style="width: 18% " class="align-middle addPage">
                            <div class="d-flex align-items-center justify-content-end">
                                <button id="addPage" type="button" class="btn btn-sm btn-outline-primary">Sayfa Ekle
                                </button>
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody id="active_book_tbody">
                    <?php foreach ($allBooks as $book): ?>
                        <?php if ($book['book_status'] == 0): ?>
                            <tr id="active_book_<?= $book['book_id'] ?>">
                                <td class="index">

                                </td>
                                <td class="book_name">
                                    <a>
                                        <?= $book['book_name'] ?>
                                    </a>
                                    <br>
                                    <small>
                                        <i><?= date("d.m.Y", strtotime($book['book_init_date'])) ?></i>
                                    </small>
                                </td>
                                <td id="book_progress_<?= $book['book_id'] ?>" class="book_progress">
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-yellow" role="progressbar"
                                             aria-volumenow="<?= percent_calculation($book['book_total_reads'], $book['book_total_pages']) ?>"
                                             aria-volumemin="0" aria-volumemax="100"
                                             style="width: <?= percent_calculation($book['book_total_reads'], $book['book_total_pages']) ?>%">
                                        </div>
                                    </div>
                                    <small>
                                        <?= percent_calculation($book['book_total_reads'], $book['book_total_pages']) ?>% okundu
                                    </small>
                                    &nbsp;
                                    <small>
                                        (<?= isset($book['book_total_reads'])?$book['book_total_reads']:0?>/<?=$book['book_total_pages']?>)
                                    </small>
                                </td>
                                <td class="align-middle">
                                    <div class="d-flex justify-content-end">
                                        <a class="btn btn-info btn-sm mr-1"
                                           href="<?= admin_url('book-edit?id=' . $book['book_id']) ?>">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button class="btn  btn-danger btn-sm" onclick="deleteBook(<?=$book['book_id']?>,this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
            <!-- /.card-body -->
        </div>
    </section>
    <!-- /.content -->
    <!-- /.ACTIVE BOOKS SECTION -->

    <br>
    <hr>

    <!-- COMPLETED BOOKS SECTION -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex">
                <div class="p-2">
                    <h1 class="m-0 text-dark">Tamamlanan Kitaplar</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead id="completed_book_table">
                    <tr>
                        <th style="width: 2%" class="p-2"></th>
                        <th class="align-middle">Kitap Adı</th>
                        <th style="width: 40%" class="align-middle">Okunma Süreci</th>
                        <th style="width: 18%"></th>
                    </tr>
                    </thead>
                    <tbody id="completed_book_tbody">
                    <?php foreach ($allBooks as $book): ?>
                    <?php if ($book['book_status'] == 1): ?>
                            <tr id="completed_book_<?= $book['book_id'] ?>">
                                <td class="index">

                                </td>
                                <td class="book_name">
                                    <a>
                                        <?= $book['book_name'] ?>
                                    </a>
                                    <br>
                                    <small>
                                        <i><?= date("d.m.Y", strtotime($book['book_init_date'])) ?></i>
                                    </small>
                                </td>
                                <td id="project_progress_<?= $book['book_id'] ?>" class="project_progress">
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-green" role="progressbar"
                                             aria-volumenow="100"
                                             aria-volumemin="0" aria-volumemax="100"
                                             style="width: 100%">
                                        </div>
                                    </div>
                                    <small>
                                        100%
                                    </small>
                                    <small>
                                        (<?=$book['book_total_pages']?> sayfa)
                                    </small>
                                    &nbsp;&nbsp
                                    <small>
                                            <i><?= date("d.m.Y", strtotime($book['book_end_date'])) ?></i>
                                    </small>
                                </td>
                                <td class="align-middle">
                                    <div class="d-flex justify-content-end">
                                        <a class="btn btn-info btn-sm mr-1"
                                           href="<?= admin_url('book-edit?id=' . $book['book_id']) ?>">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button class="btn  btn-danger btn-sm" onclick="deleteBook(<?=$book['book_id']?>,this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
    <!-- /.COMPLETED BOOKS SECTION -->
</div>
<!-- /.content-wrapper -->


<?php require admin_view('static/footer') ?>


<script>
    var bookUrlApi = "<?= admin_url('api-books') ?>";
    var editBookUrl = "<?=admin_url('book-edit?id=')?>"
</script>


<?php require admin_view('static/footer-end') ?>
