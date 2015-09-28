<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 TRansitional//EN" "http://www.w3.org/TR/html4/loose.dTD">
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

   

    <title>Signin Template oe Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url();?>assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url();?>assets/css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
<div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
    <fieldset>
<?php
$atributos = array('class' => 'form-signin',
                    'role'=>'form' );

 echo form_open('usuario_control/validar',$atributos); ?>
          <div >
           <div >

            <h2 class="form-signin-heading">Iniciar Sesión</h2>
                        <?php
            if(isset($error)){
              echo "<p>".$error."</p>";
            }
            echo form_error('user');
            ?>
            </div>
            <div >Usuario:</div>
            <div ><input type="text" class="form-control" name="user" value="<?= set_value('user'); ?>" size="25" placeholder="Usuario" required autofocus/></div>

          </div>    
          <div >
            <div >ConTRaseña:</div>
            <div ><input type="password" name="pass" class="form-control" value="<?= set_value('pass'); ?>" size="25" placeholder="Contraseña" required autofocus/></div>
            <div ><?= form_error('pass');?></div>
          </div>
          <div >
            <div><input type="submit" class="btn btn-lg btn-primary btn-block" value="Ingresar"></div>   
        </div>
        </form>
</fieldset>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
