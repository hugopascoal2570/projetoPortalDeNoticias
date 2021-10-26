<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Projeto Portal de Notícias</title>
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{url('/assets/vendors/mdi/css/materialdesignicons.min.css')}}"/>
    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="{{url('/assets/images/favicon.png')}}" />
    <!-- inject:css -->
    <link rel="stylesheet" href="{{url('/assets/css/style.css')}}">
    <!-- endinject -->
  </head>

  <body>
    <div class="container-scroller">
      <header id="header">
        <div class="container">
          <!-- partial:../partials/_navbar.html -->
          <nav class="navbar navbar-expand-lg navbar-light">
              <div class="d-flex justify-content-between align-items-center navbar-top">
                <ul class="navbar-left">
                  <li>
                      <?php 
                      $agora = date('d/m/Y H:i');
                    echo $agora; 
                    ?>
                    </li>
                </ul>
                <div>
                  <a class="navbar-brand" href="{{route('home')}}"
                    ><img src="{{url('/assets/images/logo.svg')}}" alt=""
                  /></a>
                </div>
                <div class="d-flex">
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
                  class="navbar-collapse justify-content-center collapse"
                  id="navbarSupportedContent"
                >
                  <ul
                    class="navbar-nav d-lg-flex justify-content-between align-items-center">
                    @foreach ($categorias as $categoria)
                    <li>
                      <button class="navbar-close">
                        <i class="mdi mdi-close"></i>
                      </button>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link active" href="../index.html">{{$categoria->nome}}</a>
                    </li>
                    @endforeach
                    <li class="nav-item">
                      <a class="nav-link" href="#"><i class="mdi mdi-magnify"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>

          <!-- partial -->
        </div>
      </header>
    </div>
    
    <div class="container">
      <div class="row">
        @foreach ($noticias as $noticia)
        <div class="col-sm-12">
          <div class="news-post-wrapper">
            <div class="news-post-wrapper-sm ">
              <h1 class="text-center">
              </h1>
              <p class="fs-15 d-flex justify-content-center align-items-center m-0">
                <img src="../assets/images/dashboard/Profile_1.jpg" alt="" class="img-xs img-rounded mr-2" />
                {{$noticia->autor}}, {{date('d-m-Y', strtotime($noticia->created_at))}}
              </p>
              </div>
              <div class="news-post-wrapper-sm ">
                <p class="pt-4 pb-4 mb-4">
                  <?php echo(htmlspecialchars_decode($noticia['body']));?>
                </p>
              </div>
          </div>
        </div>
        @endforeach
      </div>
      
    </div>
    <!-- container-scroller ends -->
    <!-- partial:../partials/_footer.html -->
  
    <script src="{{url('/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{url('/assets/js/demo.js')}}"></script>
    <!-- End custom js for this page-->
  </body>
</html>
