<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Projeto Portal de Notícias</title>
    <!-- plugin css for this page -->
    <link
      rel="stylesheet"
      href="{{url('/assets/vendors/mdi/css/materialdesignicons.min.css')}}"/>
    <link rel="stylesheet" href="{{url('/assets/vendors/aos/dist/aos.css/aos.css')}}" />
    <link
      rel="stylesheet"
      href="{{url('/assets/vendors/owl.carousel/dist/assets/owl.carousel.min.css')}}"
    />
    <link
      rel="stylesheet"
      href="{{url('/assets/vendors/owl.carousel/dist/assets/owl.theme.default.min.css')}}"
    />
    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="{{url('assets/images/favicon.png')}}" />
    <!-- inject:css -->
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
    <!-- endinject -->
  </head> 
  <body>
    <div class="container-scroller">
      <div class="main-panel">
        <header id="header">
          <div class="container">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar navbar-expand-lg navbar-light">
              <div class="d-flex justify-content-between align-items-center navbar-top">
                <ul class="navbar-left">
                </ul>
                <div>
                  <a class="navbar-brand" href="{{route('home')}}"><img src="assets/images/logo.svg" alt=""
                  /></a>
                </div>
                <div class="d-flex">
                </div>
              </div>
              <div class="navbar-bottom-menu">
                <button
                  class="navbar-toggler"
                  type="button"
                  data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                >
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div
                  class="navbar-collapse justify-content-center collapse"id="navbarSupportedContent">
                  <ul
                    class="navbar-nav d-lg-flex justify-content-between align-items-center">
                  </ul>
                </div>
              </div>
            </nav>
          </div>
        </header>
        <!--categoria Agora-->
        <div class="container">
          <div class="banner-top-thumb-wrap">
            <div class="d-lg-flex justify-content-between align-items-center">
              <div class="d-flex justify-content-between  mb-3 mb-lg-0">
                @foreach ($agora as $ago)
                <div>
                  <a href="{{url('/noticia/view/'.$ago->id)}}">
                    <img src="{{'/media/capas/' . $ago->image}}"  class="banner-top-thumb" />
                  </a>
                </div>
                <h5 class="m-1 font-weight-bold">
                  <h5 class="m-2 font-weight-bold">
                    {{$ago->title}}
                </h5>
                @endforeach
              </div>
              <div class="d-flex justify-content-between mb-3 mb-lg-0">
              </div>
              <div class="d-flex justify-content-between mb-3 mb-lg-0">
              </div>
              <div class="d-flex justify-content-between mb-3 mb-lg-0">
              </div>
            </div>
          </div>
          <!--local de notícias destaques-->
          <div class="row">
            <div class="col-lg-12">
              <div class="owl-carousel owl-theme" id="main-banner-carousel">
                @foreach ($destaques as $destaque)
                <div class="item">
                  <div class="carousel-content-wrapper mb-2">
                    <div class="carousel-content">
                      <h1 class="font-weight-bold">
                        {{$destaque->title}}
                      </h1>
                      <h5 class="font-weight-normal  m-0">
                        {{$destaque->subTitulo}}
                      </h5>
                      <p class="text-color m-0 pt-2 d-flex align-items-center">
                        <span class="fs-10 mr-1">{{$destaque->created_at}}</span>
                      </p>
                    </div>
                    <div class="carousel-image">
                      <a href="{{url('/noticia/view/'.$destaque->id)}}">
                      <img src="{{'/media/capas/' . $destaque->image}}" width="500" height="600" />
                      </a>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
            <!--fim dos destaque-->
          <div class="world-news">
            <div class="row">
              <div class="col-sm-12">
                <div class="d-flex position-relative  float-left">
                  <h3 class="section-title">Esportes</h3>
                </div>
              </div>
            </div>

            <!--categoria de Esportes-->
            <div class="row">
              @foreach ($esportes as $esporte)
              <div class="col-lg-3 col-sm-6 mb-5 mb-sm-2">
                <div class="position-relative image-hover">
                  <a href="{{url('/noticia/view/'.$esporte->id)}}">
                  <img  src="{{'/media/capas/' . $esporte->image}}" class="img-news" alt="world-news" />
                  </a>
                  <span class="thumb-title">{{$esporte->categoria}} </span>
                </div>
                <h5 class="font-weight-bold mt-3">
                  {{$esporte->title}}
                </h5>
                <p class="fs-15 font-weight-normal">
                  {{$esporte->subTitulo}}
                </p>
                <a href="#" class="font-weight-bold text-dark pt-2"
                  >Leia Mais</a
                >
              </div>
              @endforeach
            </div>
          </div>
          <!--Notícias gerais -->

          <div class="world-news">
            <div class="row">
              <div class="col-sm-12">
                <div class="d-flex position-relative  float-left">
                  <h3 class="section-title">Todas as Notícias</h3>
                </div>
              </div>
            </div>
          <div class="popular-news">
            <div class="row">
              @foreach ($noticias as $noticia)
              <div class="col-lg-3 col-sm-6 mb-5 mb-sm-2">
                <div class="position-relative image-hover">
                  <a href="{{url('/noticia/view/'.$noticia->id)}}">
                  <img  src="{{'/media/capas/' . $noticia->image}}" class="img-news" alt="world-news" />
                  </a>
                  <span class="thumb-title">{{$noticia->categoria}} </span>
                </div>
                <h5 class="font-weight-bold mt-3">
                  {{$noticia->title}}
                </h5>
                <p class="fs-15 font-weight-normal">
                  {{$noticia->subTitulo}}
                </p>
                <a href="#" class="font-weight-bold text-dark pt-2"
                  >Leia Mais</a
                >
              </div>
              @endforeach
            </div>
          </div>

              <div class="col-lg-3">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="d-flex position-relative float-left">
                      <h3 class="section-title">Últimas noticias</h3>
                    </div>
                  </div>
                  @foreach ($novas as $nova)
                  <div class="col-sm-12">
                    <div class="border-bottom pb-3">
                      <h5 class="font-weight-600 mt-0 mb-0">
                        <a href="{{url('/noticia/view/'.$nova->id)}}">
                        {{$nova->title}}
                        </a>
                      </h5>
                      <p class="text-color m-0 d-flex align-items-center">
                        <span class="fs-10 mr-1">{{$nova->created_at}}</span>
                        
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- main-panel ends -->
        <!-- container-scroller ends -->

        <!-- partial:partials/_footer.html -->
        <footer>
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <div class="border-top"></div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="d-flex justify-content-between">
                  <img src="assets/images/logo.svg" class="footer-logo" alt="" />

                  <div class="d-flex justify-content-end footer-social">
                    <h5 class="m-0 font-weight-600 mr-3 d-none d-lg-flex">Follow on</h5>
                    <ul class="social-media">
                      <li>
                        <a href="#">
                          <i class="mdi mdi-instagram"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-facebook"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-youtube"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-linkedin"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-twitter"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div
                  class="d-lg-flex justify-content-between align-items-center border-top mt-5 footer-bottom"
                >
                  <ul class="footer-horizontal-menu">
                    <li><a href="#">Terms of Use.</a></li>
                    <li><a href="#">Privacy Policy.</a></li>
                    <li><a href="#">Accessibility & CC.</a></li>
                    <li><a href="#">AdChoices.</a></li>
                    <li><a href="#">Advertise with us Transcripts.</a></li>
                    <li><a href="#">License.</a></li>
                    <li><a href="#">Sitemap</a></li>
                  </ul>
                  <p class="font-weight-medium">
                    © 2020 <a href="https://www.bootstrapdash.com/" target="_blank" class="text-dark">@ BootstrapDash</a>, Inc.All Rights Reserved.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </footer>

        <!-- partial -->
      </div>
    </div>
    <!-- inject:js -->
    <script src="{{url('assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{url('/assets/vendors/owl.carousel/dist/owl.carousel.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{url('/assets/js/demo.js')}}"></script>
    <!-- End custom js for this page-->
  </body>
</html>
