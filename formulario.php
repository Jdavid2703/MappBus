<?php

include "conectarBD.php";

$query =  mysqli_query($conectar,"SELECT * FROM categoria");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="/MappBus/imagenes/faviconBus.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>MappBus | Formulario </title>



    <!-- ESTILOS FORMULARIO -->
    <style>
        @font-face {
            font-family: oswaldBold;
            src: url(fuentes/Oswald-SemiBold.ttf);
        }
        @font-face {
            font-family: oswald;
            src: url(fuentes/Oswald-Regular.ttf);
        }

        body{
            background-color: #151f29;
        }

        form {
            width: 49%;
            margin-left: 25vw;
            margin-top: 3vw;
            padding: 1vw;
            border: 2px solid #eaad9a;
            border-radius: 22px;
            background: #0B2239;

        }

        #formularioRegistroEmpresa input{
            position: relative;
            width: 100%;
            margin-bottom: 13px;
            height: 49px;
            padding-left: 10px;
            border-radius: 7px;
            border: 1px solid  #f7f7f757;
            color: #ff9032;
            font-family: oswald;
            background-color: #0b2239;
        }
        #formularioRegistroEmpresa input::placeholder{
            position: relative;
            width: 100%;
            color: rgba(96, 96, 96, 0.5);
            font-family: oswald;
            font-size: 16px;
        }

        #formularioRegistroEmpresa select{
            background-color: #ffffff00;
            font-family: oswald;
            height: 3.5vw;
            color: #ff9032;
            border-color: #f7f7f757;
            cursor: pointer;
        }
        #formularioRegistroEmpresa select>option{
            background-color: #151f29;
            color: white;
            cursor: pointer;

        }

        #selecc{
            color: #5a372c !important;
        }
        #formularioRegistroEmpresa input[type="file" i]{
            cursor:pointer;

        }

        h1{
            width: 94%;
            margin-left: 9vw;
            color: #5a372c;
            font-family: oswaldBold;
        }

        label{
            color: #5a372c;
            font-family: oswaldBold;
        }

        button{
            margin-left: 20vw;
        }

        img{
            width: 10%;
        }

        .btnEnviar{
            background: #ff5722;
            border-color: #ff5722;
        }


        .btnEnviar:hover{

            background-color: #e04f21;
            border: 1px solid white;

        }


        .mensaje{
            display: none;
            width: 80%;
            height: 2.8vw;
            margin-left: 4.5vw;
            margin-top: 2vw;
            background-color: #fdfdfd00;
            border-top: 1px solid #1c9d39;
            border-bottom: 1px solid #1c9d39
        }

        #answerExito{
            margin-left: 4.5vw;
            color: #9bf00b;
            font-family: oswaldBold;
            font-size: 1.5vw;
        }

        .obligatorio{
            color: red;
        }

    </style>



</head>
<body>


<!-- FORMULARIO -->
<form id="formularioRegistroEmpresa" name="formularioRegistroEmpresa" method="post" ectype ="multipart/form-data">
    <h1> DATOS DE LA EMPRESA <img src="/MappBus/imagenes/faviconBus.png" alt=""></h1>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputName">Nombre<span class="obligatorio">*</span></label>
            <input type="text" class="form-control" value="" onkeyup ="validarCampos('form')" name="inputName" id="inputName" placeholder="Ejemplo: MappBus" required autofocus>
        </div>

        <div class="form-group col-md-6">
            <label for="inputType">Categoria<span class="obligatorio">*</span></label>
            <!--   <input type="text" class="form-control" value=""  onkeyup ="validarCampos('form')" name="inputType" required> -->
            <select id="inputType" name="inputType" class="form-control" onkeyup ="validarCampos('form')" required>
                <option selected disabled="disabled" value="0" id="selecc">Seleccionar</option>
                <?php
                while ($categoria= mysqli_fetch_array($query)) {

                    ?>

                    <option value="<?php echo $categoria['idCategoria'] ?>"><?php echo $categoria['nombreCategoria']?></option>
                    <?php

                }
                ?>
            </select>
        </div>



    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputLat">Latitud<span class="obligatorio">*</span></label>
            <input type="text" class="form-control" value=""  onkeyup ="validarCampos('form')" name="inputLat" id="inputLat" placeholder="Ejemplo: 6.254809" required>
        </div>

        <div class="form-group col-md-6">
            <label for="inputLng">Longitud<span class="obligatorio">*</span></label>
            <input type="text" class="form-control" value="" onkeyup ="validarCampos('form')" name="inputLng" id="inputLng" placeholder="Ejemplo: -75.573577" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputDireccion">Dirección<span class="obligatorio">*</span></label>
            <input type="text" class="form-control" value=""  onkeyup ="validarCampos('form')" name="inputDireccion" id="inputDireccion" placeholder="Ejemplo: Cr 68 #53-65" required>
        </div>

        <div class="form-group col-md-6">
            <label for="inputLogo">Logo<span class="obligatorio">*</span></label>
            <input type="file" class="form-control" id="inputLogo" name="inputLogo" accept="image/png, .jpeg, .jpg" required>
        </div>
    </div>


    <button type="button" id="enviarDatos" disabled="disabled" class="btn btn-primary btnEnviar">Enviar</button>


    <!-- MENSAJE EXITO -->
    <div class="mensaje">

        <span id="answerExito"> </span> <!-- <button class="btn btn-default">Ver</button> -->
    </div>
</form>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="/MappBus/javaScript.js"></script>

</body>
</html>