<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Mundo full Services</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?= base_url();?>/assets/css/bootstrap.css" rel="stylesheet">
    
          <meta charset="utf-8" />
      <?php 
      foreach($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
      <?php endforeach; ?>
      <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
      <?php endforeach; ?>
      <style type='text/css'>
      body
      {
        font-family: Arial;
        font-size: 14px;
      }
      a {
          color: blue;
          text-decoration: none;
          font-size: 14px;
      }
      a:hover
      {
        text-decoration: underline;
      }
      
      </style>
    <link href="<?= base_url();?>/assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Mundo Full Services</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
               <a href="<?= base_url('usuario_control/close');?>" class="navbar-link">Cerrar Sesion</a>
            </p>
            <ul class="nav">
              <li class="active"><a href="#">Inicio</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav"  style="margin-top: 41px">
            <ul class="nav nav-list">
              <li class="nav-header">Administración</li>
              <li ><a href="#"></a></li>
              <li><a href="<?= base_url('administrador/usuarios_perfil');?>">Usuarios</a></li>
              <li><a href="<?= base_url('administrador/datos_usuarios');?>">Datos usuarios</a></li>
              <li><a href="#">catalogo</a></li>
              <li><a href="#">antesala</a></li>
              <li class="nav-header">Negocio</li>
              <li><a href="<?= base_url('administrador/servicios');?>">Servicios</a></li>
              <li><a href="<?= base_url('excelController');?>">cargar</a></li>
              <li><a href="<?= base_url('administrador/estado');?>">estado</a></li>
               <li><a href="<?= base_url('administrador/zona');?>">Zonas</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">

          <div class="hero-unit">
            <h1>Administrador</h1>
          </div>
          <div class="row-fluid">
               <div>
                  <?php echo $output; ?>
              </div>
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>Agosto | 2014</p>
      </footer>
                 
    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?= base_url();?>/assets/js/jquery.js"></script>
    <script src="<?= base_url();?>/assets/js/bootstrap-transition.js"></script>
    <script src="<?= base_url();?>/assets/js/bootstrap-alert.js"></script>
    <script src="<?= base_url();?>/assets/js/bootstrap-modal.js"></script>
    <script src="<?= base_url();?>/assets/js/bootstrap-dropdown.js"></script>
    <script src="<?= base_url();?>/assets/js/bootstrap-scrollspy.js"></script>
    <script src="<?= base_url();?>/assets/js/bootstrap-tab.js"></script>
    <script src="<?= base_url();?>/assets/js/bootstrap-tooltip.js"></script>
    <script src="<?= base_url();?>/assets/js/bootstrap-popover.js"></script>
    <script src="<?= base_url();?>/assets/js/bootstrap-button.js"></script>
    <script src="<?= base_url();?>/assets/js/bootstrap-collapse.js"></script>
    <script src="<?= base_url();?>/assets/js/bootstrap-carousel.js"></script>
    <script src="<?= base_url();?>/assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>
