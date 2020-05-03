<?php require admin_view('static/header')  ?>

<?php require admin_view('static/navbar')  ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="d-flex align-items-center">
                    <div class="p-2">
                        <h1 class="m-0 text-dark">Hedef Düzenle</h1>
                    </div>
                    <div class="mr-auto p-2">
                        <button type="button" id="addQuestionTarget" class="btn btn-sm btn-danger">< Geri Dön</button>
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
                        <h3 class="card-title">Hedef Bilgileri</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputClientCompany">Hedef Ders</label>
                            <select class="custom-select" id="inputName2" placeholder="Sınıf">
                                <option selected>- Dersinizi Seçin -</option>
                                <option value="1">1. Sınıf</option>
                                <option value="2">2. Sınıf</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Tarih Aralığı</label>
                            <select class="custom-select" id="inputName2" placeholder="Sınıf">
                                <option selected>- Tarih Aralığı -</option>
                                <option value="1">Günlük</option>
                                <option value="2">Haftalık</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputClientCompany">Hedef Soru Sayısı</label>
                            <input type="text" id="inputClientCompany" class="form-control"  placeholder="Örn:280">
                        </div>
                        <div class="form-group">
                            <label for="inputClientCompany">Hedef Başlangıç Tarihi</label>
                            <input type="text" id="inputClientCompany" class="form-control" disabled>
                        </div>
                        <div class="form-group text-center">
                            <button type="button" id="addQuestionTarget" class="btn btn-primary mt-3">Değişiklikleri Kaydet</button>
                        </div>
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