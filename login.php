<html>  
<head>  
    <title>Login</title>  

        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/js/popper.min.js"></script>
        <script src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
</head>  
<body>  

    <nav class="navbar navbar-dark bg-dark  justify-content-center">
            <h1 class="navbar-brand">Consultora S.A.S</h1>
            <form class="form-inline" action="index.php" method="post">
                <button class="btn btn btn-warning my-2 my-sm-0" type="">Menu Principal </button>
            </form>

    </nav>
    <br>
    <div class="mx-auto col-6 col-md-2 col-lg-8 row justify-content-center border rounded">
        <div id = "frm">  
            <h1>Login</h1>  
            <p>Inicie sesion para ver los tiquet por gestionar</p>
            <form name="f1" action = "auth.php" onsubmit = "return validation()" method = "POST">  
                <p>  
                    <label> Usuario: </label>  
                    <input class="form-control" type = "text" id ="user" name  = "user" value="full-y@hotmail.com"/>  
                </p>  
                <p>  
                    <label> Contraseña: </label>  
                    <input class="form-control" type = "password" id ="pass" name  = "pass" value="12345678"/>  
                </p> 
                <button type =  "submit" id = "btn" value = "Login" class="btn btn-success " >Login</button>
            </form>  
        </div>  
    </div>  

    <!-- validacion de campos -->
    <script>  
            function validation()  
            {  
                var id=document.f1.user.value;  
                var ps=document.f1.pass.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("User Name and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("User Name is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }  
        </script>  
</body>     
</html>  