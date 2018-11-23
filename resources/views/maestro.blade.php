<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>SISTEMA</title>

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{asset('assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('assets/scss/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/lib/vector-map/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.min.css')}}">


</head>
<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>
            @include('menu')
        </nav>
    </aside><!-- /#left-panel -->
    <!-- Left Panel -->


    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                        @include('notificacion')
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-epanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                            {{Session::get('nombres', '')}} {{Session::get('apellidos', '') }}
                        </a>
                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="{{asset('index.php/Usuario/')}}/{{Session::get('id', '')}}/edit"><i class="fa fa- user"></i>Mi cuenta</a>
                                <a class="nav-link" href="{{asset('index.php/cerrarsession')}}"><i class="fa fa-power -off"></i>Cerrar Sesion</a>



                        </div>
                    </div>
                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language" >
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </header><!-- /header -->
        <!-- Header-->

        <div class="content mt-3">
            <div class="col-xl-12">
                <div class="card" >
                  <div class="card-header">
                    <h4>@yield('card-header')</h4>
                  </div>
                  <div class="card-body">
                    @yield('cuerpo')
                  </div>
                </div>
                <!-- /# card -->
            </div>
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    @yield('modal0')
    @yield('modal1')
    @yield('modal2')
    @yield('modal3')
    @yield('modal4')

    <script src="{{asset('assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/lib/chart-js/Chart.bundle.js')}}"></script>
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
    <script src="{{asset('assets/js/widgets.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/jquery.vmap.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/country/jquery.vmap.world.js')}}"></script>

    @yield('js')

    <script type="text/javascript">
      jQuery('.numeros').keydown(function(e){
          var key = e.keyCode;
          return ((key >= 48 && key <= 57) || key == 8 || (key == 32) || (key >= 35 && key <= 39) || $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1);
      });

      jQuery('.letras').keydown(function(e){
        var key = e.keyCode;
        return ((key >= 65 && key <= 90) || key == 8 || (key == 32) || (key >= 35 && key <= 39) || $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1);
      });
    </script>
</body>
</html>
