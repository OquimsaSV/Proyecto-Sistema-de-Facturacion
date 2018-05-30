<!DOCTYPE html>
<html>
<head>
	 <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Administrar usuario</title>
  	<script src="js/jquery.js"></script>
  	<script type="text/javascript" src="js/alertify.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="css/alertify.min.css">
  <!-- Bootstrap core CSS-->
  	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  	<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  	<link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  	<link href="css/sb-admin.css" rel="stylesheet">
    <style type="text/css">
      .table{
        margin-top: 20px;
        width: auto;
        margin:auto;
      }
    </style>
</head>
<body class="fixed-nav sticky-footer" id="page-top" style="background-color: #d2b48c">
	<?php
		session_start();
    include("bd/validar_sesion.php");
		include("bd/conexion.php");
		include("navbar.php");
    include("bd/encriptar.php");
	?>
  <div class="content-wrapper" style="background-color: #d2b48c">
  <div class="container-fluid" style="background-color: #d2b48c">
    <div class="col-md-12 text-center">
      <h2 class="text-danger text-center">Realizar ventas</h2>
      <table class="table">
        <form action="" method="POST">
          <tr>
            <td>Nombre del cliente: &nbsp;</td>
            <td><select name="clientenom" class="form-control">
              <option value="opcion">[Seleccion un cliente]</option>
              <?php
                $sql=$conexion->query("SELECT * FROM cliente");
                while ($fil=$sql->fetch_assoc()) {
                  echo "<option value=".$fil['Id_Cliente'].">".$fil['Nombre']."</option>";
                }
              ?>
            </select></td>
          </tr>
          <tr>
            <?php
              $sql2=$conexion->query("SELECT * FROM usuarios WHERE nombre='".$_SESSION['user']."'");
              $sql2=$sql2->fetch_assoc();
              $sql3=$conexion->query("SELECT * FROM empleado WHERE Id_Empleado='".$sql2['Id_Empleado']."'");
              $sql3=$sql3->fetch_assoc();            ?>
            <td>Empleado: </td>
            <td><input type="text" name="empleado" value=<?php echo $sql3['Nombre']; ?> readonly class="form-control">
          </tr>
          <tr>
            <td colspan="2" align="center"><button type="submit" name="realizar" class="btn btn-success">Realizar venta</button></td>
          </tr>
        </form>
      </table>  

      <?php
        if (isset($_POST['realizar'])) {
          if ($_POST['clientenom']=="opcion") {
            echo "<script>alert('Seleccione un cliente');</script>";
          }else{
            $_SESSION['clientenom']=$_POST['clientenom'];
            $_SESSION['emplenom']=$_POST['empleado'];
            echo "<script>window.location='venta_detalle.php'</script>";
          }
        }
      ?>

    </div>
    </div>
  </div>
    <footer class="sticky-footer bg-primary">
      <div class="container">
        <div class="text-center">
          <small>Karla Castro, Jose Bolaños, Jose Villalta, Jonathan Baldomero SIS32-DAW</small>
        </div>
      </div>
    </footer>
     <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>
</body>
</html>