<?php
session_start();
$url="http://localhost/restauranteV5.0/"
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema Ventas Laravel Vue Js- IncanatoIT">
    <meta name="author" content="Incanatoit.com">
    <meta name="keyword" content="Sistema ventas Laravel Vue Js, Sistema compras Laravel Vue Js">
   <!--  <link rel="shortcut icon" href="../Recursos/vendors/img/favicon.png"> -->
    <title>Sistema de Restaurante</title>
    <!-- Icons -->
    <link href="<?php echo $url;?>Recursos/vendors/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $url;?>Recursos/vendors/css/simple-line-icons.min.css" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="<?php echo $url;?>Recursos/vendors/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>Recursos/vendors/select2/css/select2.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>Recursos/vendors/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>Recursos/vendors/alertifyjs/css/themes/default.css">
     <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $url;?>Recursos/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css">
   <link rel="stylesheet" href="<?php echo $url;?>Recursos/vendors/datatables.net-bs/css/responsive.bootstrap.min.css">
  <script src="<?php echo $url;?>Recursos/plugins/sweetalert2/sweetalert2.all.js" ></script>
    <!--=====================================
    =           plugin para el grafico      =
    ======================================-->   
   <link rel="stylesheet" href="<?php echo $url;?>Recursos/plugins/morris/morris.css">
   <link rel="stylesheet" href="<?php echo $url;?>Recursos/plugins/package/dist/Chart.css">
    
    
 <!--   <link rel="stylesheet" type="text/css" href="<?php echo $url;?>Recursos/plugins/fullcalendar/bootstrap.min.css"> -->
   <link rel="stylesheet" type="text/css" href="<?php echo $url;?>Recursos/plugins/fullcalendar/fullcalendar.min.css">
     <!-- Daterange picker -->
   <link rel="stylesheet" href="<?php echo $url;?>Recursos/plugins/bootstrap-daterangepicker/daterangepicker.css">


    


   
<link href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/build/css/bootstrap-datetimepicker.css" rel="stylesheet"/>

  <!--s  -->


<!-- Bootstrap and necessary plugins -->
     <!-- <script src="../Recursos/plugins/fullcalendar/jquery.js"></script>  -->
     <script src="<?php echo $url;?>Recursos/vendors/js/jquery.min.js"></script>
    
    <script src="<?php echo $url;?>Recursos/vendors/js/popper.min.js"></script>
    <script src="<?php echo $url;?>Recursos/vendors/js/bootstrap.min.js"></script>
    <script src="<?php echo $url;?>Recursos/vendors/js/pace.min.js"></script>
    <!-- Plugins and scripts required by all views -->
    <script src="<?php echo $url;?>Recursos/vendors/js/Chart.min.js"></script>  
    <!-- GenesisUI main scripts -->
     <script src="<?php echo $url;?>Recursos/vendors/js/template.js"></script>
  <!-- <script src="<?php echo $url;?>Recursos/plugins/fullcalendar/jquery.js"></script> -->
        <script src="<?php echo $url;?>Recursos/vendors/alertifyjs/alertify.js"></script>
     <script src="<?php echo $url;?>Recursos/vendors/select2/js/select2.js"></script>
     <script src="<?php echo $url;?>Recursos/plugins/raphael/raphael.min.js"></script>
     <script  src="<?php echo $url;?>Recursos/plugins/morris/morris.min.js"></script>
     <script src="<?php echo $url;?>Recursos/plugins/package/dist/Chart.min.js"> </script>
    
     <!-- Daterange picker -->
      <script src="<?php echo $url;?>Recursos/plugins/moment/min/moment.min.js"></script> 
     <script src="<?php echo $url;?>Recursos/plugins/bootstrap-daterangepicker/daterangepicker.js"></script> 

         <script src="<?php echo $url;?>Recursos/plugins/fullcalendar/es.js"></script>


</head>

<!--=====================================
CUERPO DOCUMENTO
======================================-->

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden"> 
  <?php

  if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok")
  {

   echo '<div>';

    /*=============================================
    CABEZOTE
    =============================================*/

    include "modulos/frmCabezote.php";

    /*=============================================
    MENU
    =============================================*/

    include "modulos/frmMenu.php";

    /*=============================================
    CONTENIDO
    =============================================*/

      if(isset($_GET["ruta"]))
      {

        if($_GET["ruta"] == "frmInicio" ||
          $_GET["ruta"] == "frmUsuario" ||
          $_GET["ruta"] == "frmCategoria" ||
          $_GET["ruta"] == "frmProductos" ||
          $_GET["ruta"] == "frmCliente" ||
          $_GET["ruta"] == "frmRol" ||
          $_GET["ruta"] == "frmBitacora" ||
          $_GET["ruta"] == "frmMesa" ||
          $_GET["ruta"] == "frmVenta" ||
          $_GET["ruta"] == "frmListaMenu" ||
          $_GET["ruta"] == "frmOrdenServicio" ||
          $_GET["ruta"] == "salir"
          )
          {

          include "modulos/".$_GET["ruta"].".php";

          }
          else
          {

              include "modulos/404.php";

          }

      }
      else
      {

        include "modulos/frmInicio.php";

      }

      /*=============================================
      FOOTER
      =============================================*/

     

      echo '</div>';

  }
  else{

    include "modulos/frmLogin.php";

  }

  ?>

</body>
</html>
