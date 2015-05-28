<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="UTF-8">
  <title>@yield('titulo') | Administración</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.4 -->
  <link href="{{ url('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- Font Awesome Icons -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Ionicons -->
  <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="{{ url('dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ url('css/bootstrap.dataTables.css') }}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter

          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
        -->
        <link href="{{ url('dist/css/skins/skin-blue.min.css') }}" rel="stylesheet" type="text/css" />
        @yield('js')

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
      </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
-->
<body class="skin-blue sidebar-mini">
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>DM</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>istración</span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="{{ url("/images/profiles/".Auth::user()->imagen_perfil) }}" class="user-image" alt="User Image"/>
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"> {{ Auth::user()->nombre ,  Auth::user()->apellidos }} <i class="fa fa-caret-down"></i></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src='{{ url("/images/profiles/".Auth::user()->imagen_perfil) }}' class="img-circle" alt="User Image" />
                  <p>
                    {{ Auth::user()->nombre ,  Auth::user()->apellidos }}
                    <small>Administrador desde {{ Auth::user()->created_at }}</small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="{{  url('/usuario') }}" class="btn btn-default btn-flat">Perfil</a>
                  </div>
                  <div class="pull-right">
                    <a href="{{ url('/auth/logout') }}" class="btn btn-default btn-flat">Cerrar Sessión</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-info-circle"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
          {{--*/ $activeURL = explode('/', Request::url());  /*--}}   
          <li class="treeview">
            <a href=""><i class="fa fa-tachometer"></i> <span>Administración</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu"  {{ isset($activeURL[3]) & !isset($activeURL[4]) ? 'style=display:block;' : 'Style="display:none;"' }}>
              <li><a href="{{ url('administracion') }}">Backend</a></li>  
              <li><a href="{{ url('') }}">Frontend</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="{{ url('administracion/estadisticas') }}"><i class="fa fa-bar-chart"></i> <span>Estadísticas</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu" {{ isset($activeURL[3]) & isset($activeURL[4]) ? $activeURL[4]=="estadisticas" ? 'style=display:block;' : '' : '' }}>
              <li><a href="{{ url('administracion/estadisticas/usuarios') }}">Usuarios</a></li>  
              <li><a href="{{ url('administracion/estadisticas/categorias') }}">Categorías</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="{{ url('administracion/subastas') }}"><i class="fa fa-cart-arrow-down"></i> <span>Subastas</span> </a>
          </li>
          <li class="treeview">
            <a href="{{ url('administracion/media') }}"><i class="fa fa-picture-o"></i> <span>Media</span> </a>
          </li>
          <li class="treeview">
            <a href="{{ url('administracion/usuarios') }}"><i class="fa fa-users"></i> <span>Usuarios</span> </a>
          </li>
          <li class="treeview">
            <a href="{{ url('administracion/categorias') }}"><i class="fa fa-cube"></i> <span>Categorías</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu" {{ isset($activeURL[3]) & isset($activeURL[4]) ? $activeURL[4]=="categorias" ? 'style=display:block;' : '' : '' }}>
              <li><a href="{{ url('administracion/categorias') }}">Listar</a></li>  
              <li><a href="{{ url('administracion/categorias/crear') }}">Crear</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="{{ url('administracion/subcategorias') }}"><i class="fa fa-cubes"></i> <span>Subcategorías</span>  <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu" {{ isset($activeURL[3]) & isset($activeURL[4]) ? $activeURL[4]=="subcategorias" ? 'style=display:block;' : '' : '' }}>
              <li><a href="{{ url('administracion/subcategorias') }}">Listar</a></li>
              <li><a href="{{ url('administracion/subcategorias/crear') }}">Crear</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="{{ url('administracion/facturas') }}"><i class="fa fa-credit-card"></i> <span>Facturas</span> </a>
          </li>
          <li class="treeview">
            <a href=""><i class="fa fa-cog"></i> <span>Ajustes</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu" {{ isset($activeURL[3]) & isset($activeURL[4]) ? $activeURL[4]=="configuracion" ? 'style=display:block;' : '' : '' }}>
              <li><a href="{{ url('administracion/configuracion') }}">Configuración</a></li>
              <li><a href="{{ url('administracion/limpiar_cache') }}">Limpiar cache</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href=""><i class="fa fa-wrench"></i> <span>Herramientas</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="{{ url('') }}">Link in level 2</a></li>
              <li><a href="{{ url('') }}">Link in level 2</a></li>
            </ul>
          </li>
        </ul><!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          @yield('nombre_pagina')
          <small>@yield('descripcion_pagina')</small>
        </h1>
        <ol class="breadcrumb">
          {{--*/ 
          $segmentos = explode('/', Request::url());
          $url = ""; /*--}}
          @for ($a = 3; $a < count($segmentos); $a++)
          {{--*/ 
          $url .= $segmentos[$a]."/";
          /*--}}
          @if(count($segmentos)==$a)
          <li class="active">Actual</li>
          @elseif($a==3)
          <li><a href="{{ url('/'.$url) }}"><i class="fa fa-dashboard"></i>{{ $segmentos[$a] }}</a></li>
          @else
          <li><a href="{{ url('/'.$url) }}"></i>{{ $segmentos[$a] }}</a></li>
          @endif

          @endfor
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">


        <!-- TODA LA COSA AQUÍ -->
        <!-- TODA LA COSA AQUÍ -->
        <!-- TODA LA COSA AQUÍ -->


        @yield('contenido')


        <!-- TODA LA COSA AQUÍ -->
        <!-- TODA LA COSA AQUÍ -->
        <!-- TODA LA COSA AQUÍ -->



      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="pull-right hidden-xs">
        Tu panel de administración.
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2015 <a href="{{ url('administracion') }}">99PUJAS</a>.</strong> Todos los derechos reservados.
    </footer>

    <!-- Control Sidebar -->      
    <aside class="control-sidebar control-sidebar-dark">                
      <!-- Tab panes -->
      <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane active" id="control-sidebar-home-tab">
          <h3 class="control-sidebar-heading">Notas de ayuda</h3>
          <h4 class="control-sidebar-heading">Cache</h4>
          <p>Si tienes problemas con la pagina, intenta utilizar la 
            opción de limpiar cache, puede ser que queden residuos
            temporales, que pueden impedir el buen funcionamiento
            de la página.</p>
            <h4 class="control-sidebar-heading">Editar/Crear</h4>
            <p>Cuando edites un perfil, este una vez guardado, te redirigirá
              nuevamente a la misma página de edición, con la información actualizada.</p>
            </div>
          </div>
        </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ url('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ url('bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- HTML5 Canvas CHARTS -->
    <script src="{{ url('js/charts.min.js') }}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('dist/js/app.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('jQuery/dataTable.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/bootstrap.dataTables.min.js') }}" type="text/javascript"></script>
    <!-- SCRIPTS EXTRAS SEGUN VIEW -->
    @yield('scripts_extra')

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience. Slimscroll is required when using the
          fixed layout. -->
        </body>
        </html>