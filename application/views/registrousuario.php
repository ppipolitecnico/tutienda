<!doctype html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tu Tienda</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?= base_url();?>assets/css/plugins/metisMenu/metisMenu.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url();?>assets/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= base_url();?>assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        var baseurl="<?= base_url();?>";
    </script>
</head>

<body>

<div class="container">
    <div class="row">
         <?php 
            $atributos = array('role'=>'form' );
             echo form_open('usuario_control/InsertarUsuario',$atributos); ?>    
        <div class="col-md-5 col-md-offset-2">
                <div class="login-panel panel panel-default">
                <div class="panel-body">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Campos Requeridos</strong></div>
                <div class="form-group">
                    <label for="InputName">Nombres</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="nombres" id="InputName" placeholder="Nombres Completos" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputName">Apellidos</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="apellidos" id="InputName" placeholder="Apellidos Completos" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputName">Direccion</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="direccion" id="InputName" placeholder="Direccion Residencia" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputName">Teléfono</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="telefono" id="InputName" placeholder="Número Teléfonico" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="InputName">Celular</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="celular" id="InputName" placeholder="Número Celular" >
                        <span class="input-group-addon"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Correo Electronico</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="InputEmailFirst" name="email" placeholder="Correo" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Confirmar Correo Electronico</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="InputEmailSecond" name="confirmaremail" placeholder="Confirmar Correo" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                 <div class="jumbotron">
                <div class="form-group">
                    <label for="InputName">Usuario</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="Usuario"  placeholder="Usuario" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputName">Contraseña</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="Contrasena" id="InputName" placeholder="Contraseña" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputName">Confirmar Contraseña</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="Contrasena" id="InputName" placeholder="Confirmar Contraseña" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
            <label for="sel1">Tipo Usuario:</label>
              <select class="form-control" id="sel1" name="tipousuario">
                <option id="2" value="2">Cliente</option>
                <option id="3" value="3">Tienda</option>
              </select>
                </div>
                <input type="submit" name="submit" id="submit" value="Crear Usuario" class="btn btn-info pull-right">
            </div>
            </div>
            </div>
        </form>
        
    </div>
</div>
    <!-- jQuery Version 1.11.0 -->
    <script src="<?= base_url();?>assets/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url();?>assets/js/bootstrap.min.js"></script>
    

</body>

</html>
