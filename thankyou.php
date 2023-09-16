<?php

require_once("CONN/conn.php");
$idtq =  htmlspecialchars($_GET["id"]);
// consulta de la informacion del ticket



$qry=mysqli_query($con,"SELECT contact.id AS id, contact.nombre AS nombreCL, empleados.nombre AS nombreEmp, empleados.apellido AS apellEmp, departamentos.nombreDepto AS nDepto FROM contact
                          INNER JOIN empleados 
                            ON empleados.idemp = contact.idemp
                          INNER JOIN departamentos
                            ON departamentos.iddepto = contact.iddepto  
                          WHERE contact.id = $idtq ");


$result=mysqli_fetch_array($qry);
$pqId = $result['id'];
$empnom = $result['nombreEmp'];
$tqnom = $result['nombreCL'];
$tqdepto = $result['nDepto'];
$apeEmp = $result['apellEmp'];

?>

<!doctype html>
<html>
    <head>
        
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/js/popper.min.js"></script>
        <script src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>

        <title>Gracias</title>
    </head>
    <body>

        <nav class="navbar navbar-dark bg-dark  justify-content-between">
            <h1 class="navbar-brand">Consultora S.A.S</h1>
            <form class="form-inline">
                <button class="btn btn-outline-success my-2 my-sm-0" type="">Solicitudes </button>
            </form>
        </nav>
        <br>

        <div class="mx-auto col-6 col-md-2 col-lg-8 row justify-content-center">
            <div class="card border-success mb-5" style="max-width: 38rem;">
            <div class="card-header bg-transparent border-success">Buenas tardes seño@ : <?php echo $tqnom; ?></div>
            <div class="card-body text-success">
                <h5 class="card-title"></h5>
                <p class="card-text">
                Gracias por confiar en CONSULTORA SAS. Su Solicitud ha sido recibida
                y se ha abierto un ticket con id "<?php echo $pqId; ?>" desde el departamento de <?php echo $tqdepto; ?> 
                y será atendido por <?php echo $empnom;?> <?php echo $apeEmp; ?>
                </p>
            </div>
            <div class="card-footer bg-transparent border-success">Gracias por utilizar nuestro servicio</div>
            </div>
        </div>




    </body>
</html>
