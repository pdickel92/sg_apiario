<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <!--FORMULARIO-->
    <form class="form-group " method="post" name="cadAPIARIO" action="valida_cad/SALVARcad_img.php" enctype="multipart/form-data">
        <input type="file" class="form-control mt-3 " accept="image/*" type="file" id="formFile" name="imagem"> <br>

        <br><label class="form-text "><b>Localização do Apiário</b></label>        

        <a href="apiario.php"><button type="button" class="btn btn-secondary btn-sm ">Cancelar</button></a>
        <button type="submit" class="btn btn-primary btn-sm" name="enviar">Adicionar</button>

    </form>

</body>

</html>