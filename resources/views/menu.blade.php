<div id="main-menu" class="main-menu collapse navbar-collapse">
    <ul class="nav navbar-nav">
        <li class="active">
            <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Inicio </a>
        </li>
        <li class="active">
            <a href="{{asset('index.php/Tramite/Mi/tramite')}}"> <i class="menu-icon fa fa-search"></i>Mi Tramite </a>
        </li>
        <h3 class="menu-title">Sistema</h3><!-- /.menu-title -->
        <li class="select">
            <a href="{{asset('index.php/Menu')}}"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Factura</a>
        </li>
        <li class="select">
            <a href="{{asset('index.php/Menu')}}"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Pedido</a>
        </li>
        <li class="select">
            <a href="{{asset('index.php/Menu')}}"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Mapa</a>
        </li>


        <li class="select">
            <a href="{{asset('index.php/Menu')}}"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Menu</a>
        </li>
        <li class="">
            <a href="{{asset('index.php/Bien')}}"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Bienes</a>
        </li>
        <li class="">
            <a href="{{asset('index.php/Cliente')}}"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Clientes</a>
        </li>
        <li class="">
            <a href="{{asset('index.php/Empleado')}}"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Empleados</a>
        </li>
        <li class="">
            <a href="{{asset('index.php/Inventario')}}"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Inventarios</a>
        </li>

        <li class="">
            <a href="{{asset('index.php/Proveedor')}}"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Proveedores</a>
        </li>
        <li class="">
            <a href="{{asset('index.php/Unidad')}}"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Unidades</a>
        </li>


        @if(true)
        <h3 class="menu-title">Administrador</h3><!-- /.menu-title -->
           <li class="menu-item-has-children dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Usuario</a>
               <ul class="sub-menu children dropdown-menu">
                   <li><i class="menu-icon fa fa-list"></i><a href="{{asset('index.php/Usuario')}}">Listar Usuarios</a></li>
                   <li><i class="menu-icon fa fa-file-pdf-o"></i><a href="{{asset('index.php/Usuario/TodoLosUsuarios/')}}">Reporte Diario Usuarios</a></li>
               </ul>
           </li><!--
           <li class="menu-item-has-children dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Bitacora</a>
               <ul class="sub-menu children dropdown-menu">
                   <li><i class="menu-icon fa fa-list"></i><a href="{{asset('index.php/BitacoraSistema')}}">              Listar Bitacora Sistema</a></li>
                   <li><i class="menu-icon fa fa-file-excel-o"></i><a href="{{asset('index.php/BitacoraSistema/excel')}}">    Excel Bitacora Sistema</a></li>
                   <li><i class="menu-icon fa fa-file-pdf-o"></i><a href="{{asset('index.php/BitacoraSistema/pdf')}}">      Pdf Bitacora Sistema</a></li>
                   <li><i class="menu-icon  fa fa-trash"></i><a href="{{asset('index.php/BitacoraSistema/descargar')}}" id="borrarSistema">    Borrar y Descargar Bitacora Sistema</a></li>
               </ul>
           </li>
           <li class="menu-item-has-children dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-list"></i>Listar Bitacora Login</a>
               <ul class="sub-menu children dropdown-menu">
                   <li><i class="menu-icon fa fa-file-excel-o"></i><a href="{{asset('index.php/BitacoraLogin/excel')}}">    Excel Bitacora Login</a></li>
                   <li><i class="menu-icon fa fa-file-pdf-o"></i><a href="{{asset('index.php/BitacoraLogin/pdf')}}">      Pdf Bitacora Login</a></li>
               </ul>
           </li>-->
        @endif

        <h3 class="menu-title">Extras</h3><!-- /.menu-title -->
        <li><a href="{{asset('index.php/Reporte/')}}"><i class="menu-icon fa fa-file-pdf-o"></i> Reporte Diario</a></li>


    </ul>
</div><!-- /.navbar-collapse -->
