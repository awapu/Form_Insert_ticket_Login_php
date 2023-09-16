<?php      
    include('CONN/conn.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select * from admin where correo = '$username' and pass = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $usr = $row["Nombre"];
        $count = mysqli_num_rows($result);  
          
     
?>  

<!DOCTYPE html>
<html lang="en">
<head>

        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/js/popper.min.js"></script>
        <script src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
</head>
<body>

        <nav class="navbar navbar-dark bg-dark  justify-content-between">
            <h1 class="navbar-brand">Consultora S.A.S: <br>  Bienvenido <?php echo $usr; ?> </h1>
            <form class="form-inline" action="logout.php" method="post">
                <button class="btn btn-danger my-2 my-sm-0" type="">Salir </button>
            </form>
            
        </nav>
        <br>
        <div>
            <h4 class="row justify-content-center">
                Listado de solicitudes por atender
            </h4>
        </div>

        
        <?php

        $qry=mysqli_query($con,"SELECT contact.id AS id, contact.nombre AS nombreCL, empleados.nombre 
                                    AS nombreEmp, empleados.apellido AS apellEmp, departamentos.nombreDepto
                                    AS nDepto, contact.email AS mailtq FROM contact
                                INNER JOIN empleados 
                                    ON empleados.idemp = contact.idemp
                                INNER JOIN departamentos
                                    ON departamentos.iddepto = contact.iddepto ");


        echo "
        <div class='mx-auto col-6 col-md-2 col-lg-8 row justify-content-center'>
            <table class='table'>
                 <thead class='thead-dark'>
                    <tr>
                        <th>ID Ticket</th>
                        <th>Nombre Usuario</th>
                        <th>Correo</th>
                        <th>Departamento</th>
                        <th>Empleado Asigando</th>
                    </tr>
                </thead>"
                ;
                    while($result=mysqli_fetch_array($qry)){
                        echo "
                            <tr>
                                <td>".$result[0]."</td>
                                <td>".$result[1]."</td>
                                <td>".$result[5]."</td>
                                <td>".$result[4]."</td>
                                <td>".$result[2]."  ".$result[3]."</td>
                            </tr>";
                    }
        echo "</table>
        </div>";
?>
     
    
</body>
</html>