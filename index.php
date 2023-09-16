<?php
//incorporamos el archivo con los datos de conexion
require_once("CONN/conn.php");



//declaramos las variables que se reciben de POST
$email   = isset( $_POST['email'] ) ? $_POST['email'] : '';
$message = isset( $_POST['message'] ) ? $_POST['message'] : ''; 
$nombre  = isset( $_POST['nombre'] ) ? $_POST['nombre'] : '';
$depto   = isset( $_POST['depto'] ) ? $_POST['depto'] : '';
$emple = isset( $_POST['emple'] ) ? $_POST['emple'] : '';

$email_error = '';
$message_error = '';
$depto_error = '';
$nombre_error = '';
$emple_error = '';

$type = '';
$nomEmp ='';
$codEmp ='';
$apeEmp ='';


//Arreglo de empleados por depto
$empleados_soporte  = array(1121156111, 1122334455, 1122334477, 1123456111, 1234567899);
$facturacion        = array(1110987611, 1112341234, 1112377234, 1118877551, 1119873456);
$atencion_cliente   = array(1145678999, 1435278123, 1564827638, 1648902347);

//Identificar el siguiente incremento
$query2 = mysqli_query($con, "SELECT MAX(id) FROM contact");
$results2 = mysqli_fetch_array($query2);
$cur_auto_id = $results2['MAX(id)']+1;

//Cuando se presione el listbox de departamentos se escoge un trabajador de Departamento de manera aleatoria
if(isset($_POST["depto"]))
{
    
    $type=$_POST["depto"];


    if ($type == 'facturacion') { 
        $codEmp = '';
        $ram = array_rand($facturacion);
        $empleado = $facturacion[$ram];

    } 

    if ($type == 'atencioncliente') { 
        $codEmp = '';
        $ram = array_rand($atencion_cliente);
        $empleado = $atencion_cliente[$ram];
    }

    if ($type == 'soportetecnico') { 
        $codEmp = '';
        $ram = array_rand($empleados_soporte);
        $empleado = $empleados_soporte[$ram];
    }

    $res = mysqli_query($con, "SELECT * FROM empleados WHERE idemp = '$empleado'");
    $row = mysqli_fetch_array($res);
    $nomEmp = $row["nombre"];
    $apeEmp = $row["apellido"];
    $codEmp = $row["idemp"];



}

//validamos que se dio clic en el boton de denvio del formulario
if(isset($_POST["reg"]))
{ 
    $errors = 0;


    if ($_POST['email'] == '')
    {
        $email_error = 'Por favor digite correo';
        $errors ++;
    }
    if ($_POST['message'] == '')
    {
        $message_error = 'Por favor digite Su mensaje';
        $errors ++;
    }
    if ($_POST['depto'] == '')
    {
        $depto_error = 'Por favor digite Su mensaje';
        $errors ++;
    }
    if ($_POST['nombre'] == '')
    {
        $nombre_error = 'Por favor digite Su nombre';
        $errors ++;
    }


    if ($errors == 0)
    {
        //convierto variables de depto a numero
        if($type == 'atencioncliente'){
            $type = 1;
        }
        if($type == 'soportetecnico'){
            $type = 2;
        }
                if($type == 'facturacion'){
            $type = 3;
        }

        //se insertan los datos de 
        $query = 'INSERT INTO contact (
                email,
                nombre,
                message,
                iddepto,
                idemp
            ) VALUES (
                "'.addslashes($_POST['email']).'",
                "'.addslashes($_POST['nombre']).'",
                "'.addslashes($_POST['message']).'",
                "'.addslashes($type).'",
                "'.addslashes($_POST['emple']).'"
            )';

            mysqli_query($con, $query);


            header("Location: thankyou.php? id=$cur_auto_id");
            die();

    }
}

?>

<!doctype html>
<html>
    <head>
        
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <script src="bootstrap/js/popper.min.js"></script>
        <script src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>

        <title>PHP Contact Form</title>
    </head>
    <body>

    <nav class="navbar navbar-dark bg-dark  justify-content-between">
            <h1 class="navbar-brand">Consultora S.A.S</h1>
            <form class="form-inline" action="login.php" method="post">
                <button class="btn btn-outline-success my-2 my-sm-0" type="">Admin solicitudes </button>
            </form>
        </nav>
        <br>
    
        <div>
            <h4 class="row justify-content-center">
                Formulario de Solicitudes
            </h4>
        </div>


        <div class=" mx-auto col-4 col-md-11 col-lg-6 border ">
            <br>
            <form class="row g-2 needs-validation" action="" name="enviar" method="post" novalidate>
                <div class="form-group col-md-2">
                            <label for="inputEmail4" class="form-label">Solicitud</label>
                            <input type="text" name="id" class="form-control" id="validationTooltip03" value="<?php echo $cur_auto_id; ?>" required disabled />
                </div>
                <div class="form-group col-md-10">
                            <label for="inputPassword4" class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="validationTooltip03" value="<?php echo $nombre; ?>" required />
                            <div class="invalid-tooltip">Por favor Escriba su nombre</div>
                </div>
                <div class="col-12">
                            <label for="inputAddress" class="form-label">Correo</label> 
                            <input type="email" name="email" class="form-control" id="validationTooltip03" value="<?php echo $email; ?>" required />
                            <div class="invalid-tooltip">Por favor Escriba correo</div>
                </div>
                <div class="col-md-6">
                    <label for="validationTooltip03" class="form-label" >departamento</label>
                        <select id="validationTooltip03" class="custom-select" method="post" name="depto" value="" onchange="this.form.submit()"> 
                                <option value="<?php echo $type ?>"><?php echo $type ?></option>
                                <option value="atencioncliente">Atencion Cliente</option>
                                <option value="soportetecnico">Soporte tecnico</option>
                                <option value="facturacion">Facturacion</option>
                        </select>
                        <div class="invalid-tooltip">Por favor digite Departamento</div>
                </div>
                <div class="col-md-6">
                    <label for="validationTooltip03" class="form-label" >El empleado que atendera su solicitud es:</label>
                    <input type="text" name="" class="form-control" id="validationTooltip03" value="<?php echo  $nomEmp; ?> <?php echo  $apeEmp; ?>" required disabled/>
                    <input type="hidden" name="emple" class="form-control" id="validationTooltip03" value="<?php echo $codEmp; ?>" required />
                    <div class="invalid-tooltip">Por favor digite Correo</div>
                </div>
                <div class="col-12">
                        <label for="validationTooltip03" class="form-label" >Mensaje</label>
                        <textarea type="text" name="message" class="form-control" id="validationTooltip03" required><?php echo $message; ?></textarea>
                        <div class="invalid-tooltip">Por favor Escriba mensaje</div>
                </div>
                
                <div class="col-12">
                <br>
                <button type="submit" name="reg" class="btn btn-primary btn-customized " onclick="document.getElementById('enviar').submit();">
                            Enviar
                        </button>
                </div>
        
            </form>
            <br>
        </div>

        <script>
                
                (function () {
                'use strict'
                var forms = document.querySelectorAll('.needs-validation')
                Array.prototype.slice.call(forms)
                    .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                    })
                })()
        </script>

    </body>
</html>
