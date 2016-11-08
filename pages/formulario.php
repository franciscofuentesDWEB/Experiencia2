<?php
/*====================================================================+
|| # Formulario PHP - Desarrollo Web 2016 - Universidad de Valparaíso
|+====================================================================+
|| # Copyright © 2016 Miguel González Aravena. All rights reserved.
|| # https://github.com/MiguelGonzalezAravena/FormularioPHP
|+====================================================================*/
// Función para evitar inyecciones
function Filtro($texto) {
  return htmlspecialchars(trim($texto), ENT_QUOTES);
}
// Variables
$directorio = '/Applications/XAMPP/htdocs/Experiencia1';
$enviado = isset($_POST['enviado']) ? (int) $_POST['enviado'] : 0;
$anio = isset($_POST['anio']) ? (int) $_POST['anio'] : 0;
$region = isset($_POST['region']) ? Filtro($_POST['region']) : '';
$area= isset($_POST['area']) ? Filtro($_POST['area']) : '';
$nombre = isset($_POST['nombre']) ? Filtro($_POST['nombre']) : '';
$color = isset($_POST['color']) ? Filtro($_POST['color']) : '';
$apellido = isset($_POST['apellido']) ? Filtro($_POST['apellido']) : '';
$fechNaci = isset($_POST['fechNaci']) ? Filtro($_POST['fechNaci']) : '';
$correo = isset($_POST['correo']) ? Filtro($_POST['correo']) : '';
$comuna = isset($_POST['comuna']) ? Filtro($_POST['comuna']) : '';
$sexo = isset($_POST['sexo']) ? Filtro($_POST['sexo']) : '';
$error = '';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Proyecto para enseñar el funcionamiento de un formulario en PHP">
  <meta name="keywords" content="html, bootstrap, php, formulario, desarrollo, web">
  <meta name="author" content="Nolazko">
  <title>Formulario enviado</title>
  <!-- CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">



    
</head>
<body>
<div class="container">
  <span style="padding-top: 10px;"></span>
<?php
// Mostrar contenido
if($enviado == 1 && $contenido == 1) {
  echo '<pre>';
  print_r($_POST);
  echo '</pre>';
  exit;
} else if(empty($nombre)) {
  $error = 'Por favor, ingrese su nombre.';
} else if(empty($apellido)) {
  $error = 'Por favor, seleccione su apellido';
}else if(empty($sexo)) {
  $error = 'Por favor, ingrese su sexo.';
} else if(empty($region)) {
  $error = 'Por favor, seleccione su región de procedencia.';
} else if(empty($fechNaci)) {
  $error = 'Por favor, ingrese su fecha de nacimineto.';
} else if(empty($correo)){
  $error = 'Por favor, ingrese su correo electrónico';
} else if(empty($area)){
  $error = 'Por favor, marque su(s) áreas de interés.';
}
// Vista de error
if(!empty($error)) {
?>
<div class="alert alert-info">
  <i class="glyphicon glyphicon-info-sign"></i>
  <?php echo $error; ?>
</div>
<a href="./" class="btn btn-warning">
  <i class="glyphicon glyphicon-chevron-left"></i>
  Volver
</a>
<?php
// Vista de éxito
} else {
  // Subir imagen
  
?>
  <h3>¡Formulario enviado satisfactoriamente!</h3>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Datos enviados</h3>
    </div>
    <div class="panel-body">
      <p>Muchas gracias <b><?php echo $nombre; ?> <?php echo $apellido; ?></b>,</p>   
      <p>
        Fecha de nacimiento: <b><?php echo $fechNaci; ?></b>
      </p>
      <p>
        Región: <b><?php echo $region; ?></b>
      </p>
      <p>
        Sexo: <b><?php if($sexo == 'option1'){
                                echo "Femenino";
                             } elseif ($sexo == 'option2'){
                                echo "Masculino";
                             } 
                             ?></b>
      </p>
      <p>
        Area de interés: <b><?php if($area == '1'){
                                echo "Ciencia";
                             } elseif ($area == '2'){
                                echo "Deporte";
                             } elseif($area == '3'){
                                echo "Pintura Rupestre";
                             } elseif($area == '4'){
                                echo "Videos de gatos";
                             }
                             ?></b>
      </p>
      <p>
        Correo electrónico: <b><?php echo $correo; ?></b>
      </p>
      <p>
        Color favorito: <b><?php echo $color; ?></b>
      </p>
    </div>
    <div class="panel-footer">
      <div class="text-right">
        <a href="./" class="btn btn-primary">
          <i class="glyphicon glyphicon-chevron-left"></i>
          Volver
        </a>
      </div>
    </div>
  </div>
<?php } ?>
  <!-- Pie de página -->
  <footer>
    <div class="text-center">
      <i class="glyphicon glyphicon-leaf"></i>
      Desarrollado por <a href="https://github.com/franciscofuentesDWEB" target="_blank">Francisco Fuentes Schreiber</a>
    </div>
  </footer>
</div>
</body>
</html>