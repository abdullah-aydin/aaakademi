<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" href="img/favicon.png" type="image/png" />
    <title>AA | AKADEMİ</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=theme_assets_url('css/bootstrap.css')?>" />
    <link rel="stylesheet" type="text/css" href="<?=theme_assets_url('css/flaticon.css')?>">
    <link rel="stylesheet" href="<?=theme_assets_url('css/themify-icons.css')?>" /><!--SOSYAL MEDYA ICONLARI-->
    <!-- main css -->
    <link rel="stylesheet" href="<?=theme_assets_url('css/style.css')?>" />
  </head>

  <body>
    <!--================ Start Header Menu Area =================-->
    <header class="header_area">
      <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="index.php"
              ><img src="" alt=""
            />AA | AKADEMİ</a>
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="icon-bar"></span> <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div
              class="collapse navbar-collapse offset"
              id="navbarSupportedContent"
            >
              <ul class="nav navbar-nav menu_nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Anasayfa</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="">İletişim</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!--================ End Header Menu Area =================-->

    <!--================ Start Home Banner Area =================-->
    <section class="home_banner_area">
      <div class="banner_inner">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="banner_content text-center">
                <p class="text-uppercase">
                  AA | AKADEMİ'YE HOŞGELDİN!
                </p>
                <h2 class="text-uppercase mt-4 mb-5">
                  EĞİTİMDE YENİ DÖNEM BAŞLIYOR!
                </h2>
                <div>
                  <a href="<?=admin_url('signin')?>" class="primary-btn2 mb-3 mb-sm-0">Giriş Yap</a>
                  <a href="<?=admin_url('signup')?>" class="primary-btn ml-sm-3 ml-0">Kayıt Ol</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ End Home Banner Area =================-->

    <!--================ Start Feature Area =================-->
    <section class="feature_area section_gap_top">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="main_title">
              <h2 class="mb-3">
                <i>
                  "Dünyayı değiştirmek için kullanabileceğiniz en güçlü silah eğitimdir."
                </i>
              </h2>
              <p>
                Nelson Mandela
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="single_feature">
              <div class="icon"><span class="flaticon-education"></span></div>
              <div class="desc">
                <h4 class="mt-3 mb-2">Planlı Ders Çalışma</h4>
                <p>
                  Hedeflerinizi oluşturarak kendinize uygun bir ders planı çıkarabilirsiniz.
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="single_feature">
              <div class="icon"><span class="flaticon-bars-chart"></span></div>
              <div class="desc">
                <h4 class="mt-3 mb-2">Gelişim</h4>
                <p>
                  Gelişiminizi günlük-haftalık-aylık olarak takip edip analizleri inceleyeceksiniz.
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="single_feature">
              <div class="icon"><span class="flaticon-education-1"></span></span></div>
              <div class="desc">
                <h4 class="mt-3 mb-2">Akademik Başarı</h4>
                <p>
                  Düzenli çalışmanın sonunda akademik başarı mutlaka gelecektir.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ End Feature Area =================-->


    <!--================ Start footer Area  =================-->
    <footer class="footer-area section_gap">
      <div class="container">
        <div class="row footer-bottom d-flex">
          <div class="col-lg-12 col-sm-12 footer-social" style="margin: 15px">
            <a href="#"><i class="ti-facebook"></i></a>
            <a href="#"><i class="ti-twitter"></i></a>
            <a href="#"><i class="ti-linkedin"></i></a>
          </div>
          <p class="col-lg-12 col-sm-12 footer-text m-0 text-white" style="text-align: center">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>

        </div>
      </div>
    </footer>
    <!--================ End footer Area  =================-->

    <script src="<?=theme_assets_url('js/jquery-3.2.1.min.js')?>"></script>
    <script src="<?=theme_assets_url('js/bootstrap.min.js')?>"></script>

  </body>
</html>
