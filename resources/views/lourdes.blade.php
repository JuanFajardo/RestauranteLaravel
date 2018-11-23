<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title> Tesoreria 1.0 - @yield('titulo') </title>

  <link rel="stylesheet" href="{{ URL::asset('asset/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('asset/DataTables/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('asset/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('asset/fontawesome/web-fonts-with-css/css/fontawesome.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('asset/theme/css/sb-admin.css') }}">
  <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}"/>
</head>

<!--<body class="fixed-nav sticky-footer bg-dark" id="page-top">-->
<body>

  <div class="content-wrapper">
    <div class="container-fluid">

        <div class="col-xl-12 col-sm-12">
          <div class="panel text-black ">
            <div class="panel-body">
              @yield('cuerpo')
            </div>
          </div>
        </div>
      </div>

    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Gobierno Autonomo Municipal de Potosi  2018</small>
        </div>
      </div>
    </footer>



    @yield('modal0')
    @yield('modal1')
    @yield('modal2')
    @yield('modal3')
    @yield('modal4')

    <script src="{{ URL::asset('asset/DataTables/jQuery-3.2.1/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('asset/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('asset/DataTables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('asset/jquery-easing/jquery.easing.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('asset/theme/js/sb-admin.min.js') }}" type="text/javascript"></script>
  </div>
  @yield('js')

  <script type="text/javascript">
    $('.numeros').keydown(function(e){ /*
      if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl/+A
            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/+C
            (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/+X
            (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
        */
        var key = e.keyCode;
        return ((key >= 48 && key <= 57) || key == 8 || (key == 32) || (key >= 35 && key <= 39) || $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1);
    });

    $('.letras').keydown(function(e){
      var key = e.keyCode;
      return ((key >= 65 && key <= 90) || key == 8 || (key == 32) || (key >= 35 && key <= 39) || $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1);
    });
  </script>
</body>
</html>
