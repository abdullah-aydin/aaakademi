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


<!--  DATEPICKER EKLENTILERI    -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

    <script>
        $( function() {
            $( "#birthday" ).datepicker({
                dateFormat: "dd-mm-yy",
                altFormat: "yy-mm-dd",
                altField:"#birthday",
                monthNames: [ "Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık" ],
                dayNamesMin: [ "Pa", "Pt", "Sl", "Ça", "Pe", "Cu", "Ct" ],
                firstDay:1
            });
        } );
    </script>

<?php require admin_view('static/navbar')  ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex">
                <div class="p-2">
                    <h1 class="m-0 text-dark">Profilim</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="<?=admin_assets_url('dist/img/user.png')?>"
                                    alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?=$profile['user_name']?></h3>

                            <p class="text-muted text-center">Öğrenci</p>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-user-graduate mr-1"></i> Okul</strong>

                                <p class="text-muted">
                                    <span> <?=isset_value($profile['user_school'])?></span>
                                </p>

                                <hr>

                                <strong><i class="fas fa-chalkboard-teacher mr-1"></i> Sınf</strong>

                                <p class="text-muted">
                                    <span> <?=$class_lesson_name[session('user_class')]?></span>
                                </p>

                                <hr>

                                <strong><i class="fas fa-birthday-cake mr-1"></i> Doğum Tarihi</strong>

                                <p class="text-muted">
                                    <span> <?=isset_value($profile['user_birthday'])?></span>
                                </p>

                                <hr>

                                <strong><i class="fas fa-table-tennis mr-1"></i> Yeteneklerim</strong>

                                <p class="text-muted">
                                    <span> <?=isset_value($profile['user_ability'])?></span>
                                </p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header p-2" style="background-color:#007bff">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab"
                                        style="color:#fff; "><b>Bilgilerim</b></a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="settings">
                                    <form class="form-horizontal" method="post" action="#">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Ad Soyad</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName"
                                                name="user_name" 
                                                value="<?=isset_value($profile['user_name'])?>"
                                                placeholder="Ad Soyad">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail"
                                                name="user_email" disabled
                                                value="<?=isset_value($profile['user_email'])?>"
                                                    placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">Doğum
                                                Tarihi</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="birthday"
                                                name="user_birthday" placeholder="Doğum Tarihi"
                                                       value="<?=isset_value($profile['user_birthday'])?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience"
                                                class="col-sm-2 col-form-label">Yetenekler</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="inputExperience"
                                                    placeholder="Yetenekler"
                                                      name="user_ability"
                                                    style="min-height:50px; max-height:100px"><?=isset_value($profile['user_ability'])?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Okul</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName2"
                                                name="user_school"
                                                value="<?=isset_value($profile['user_school'])?>"
                                                    placeholder="Okul">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2"
                                                class="col-sm-2 col-lg-2 col-form-label">Sınıf</label>
                                            <div class="col-sm-4">
                                                <select class="custom-select" selected disabled placeholder="- Sınıfınızı seçin -">
                                                      <option><?=$class_lesson_name[session('user_class')]?></option>
                                                  </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label"
                                                style="vertical-align:middle;">Dersler</label>
                                            <div class="col-sm-10 checkbox switcher">
                                                <div class="row">
                                                <?php foreach($lessons as $key => $val): ?>
                                                    <div class="col-4 mt-2" >
                                                        <label for="<?=$key?>">
                                                            <input type="checkbox" id="<?=$key?>" 
                                                            <?=$val?'checked':null?>
                                                            value="1"  name="lessons[<?=$key?>]">
                                                            <span><small></small></span>
                                                            <?=$_lessons[$key]?>
                                                        </label>
                                                    </div>
                                                <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary">Bilgilerimi
                                                    Kaydet</button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="submit" value="1">
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<?php require admin_view('static/footer')  ?>

<?php require admin_view('static/footer-end')  ?>