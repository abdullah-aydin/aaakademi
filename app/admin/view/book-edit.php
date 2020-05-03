<?php require admin_view('static/header')  ?>

<?php require admin_view('static/navbar')  ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <div class="p-2">
                    <h1 class="m-0 text-dark">Kitap Düzenle</h1>
                </div>
                <div class="mr-auto p-2">
                    <a href="<?=admin_url('books')?>">
                        <button type="button" class="btn btn-sm btn-danger">< Geri Dön</button>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Kitap Bilgileri</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-8">
                                        <label for="inputClientCompany">Kitap Adı</label>
                                        <input type="text" name="book_name" class="form-control" value="<?=isset($book['book_name'])?$book['book_name']:null?>" placeholder="Örn: Küçük Ağacın Eğitimi">
                                    </div>
                                    <div class="col-4">
                                        <label for="inputClientCompany">Sayfa Sayısı</label>
                                        <input type="text" name="book_total_pages" class="form-control" disabled value="<?=isset($book['book_total_pages'])?$book['book_total_pages']:null?>" placeholder="Örn:280">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Kitap Özeti</label>
                                <textarea id="inputDescription" name="book_summary" class="form-control" rows="7" placeholder="Kitap Özeti"><?=isset($book['book_summary'])?$book['book_summary']:null?></textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="inputClientCompany">Başlangıç Tarihi</label>
                                        <input type="text" value="<?=isset($book['book_init_date'])?$book['book_init_date']:null?>" class="form-control" disabled>
                                    </div>
                                    <div class="col-6">
                                        <label for="inputClientCompany">Bitiş Tarihi</label>
                                        <input type="text" value="<?=isset($book['book_end_date'])?$book['book_end_date']:'Bu kitabı daha bitirmediniz.'?>" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputProjectLeader">Yazar</label>
                                <input type="text" name="book_author" class="form-control" value="<?=isset($book['book_author'])?$book['book_author']:null?>"
                                       placeholder="Örn: Forrest Carter">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" name="submit" value="1" class="btn btn-primary mt-3">Değişiklikleri Kaydet</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <!-- /.content -->


</div>
<!-- /.content-wrapper -->


<?php require admin_view('static/footer')  ?>


<?php require admin_view('static/footer-end')  ?>