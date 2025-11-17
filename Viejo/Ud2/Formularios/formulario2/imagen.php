<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Imagen:</label>
        <input type="file" name="imagen">
    </form>
    <?php
        if(is_uploaded_file($imagen)){
            $nombreDirectorio = "img/";
            $idUnico = time();
            $nombreFichero = $idUnico . "-" . $_FILES["imagen"]["name"];
            move_uploaded_file($_FILES["imagen"]["tmp_name"], $nombreDirectorio . $nombreFichero);

        }else{
            echo "No hay archivo";
        }
    ?>
</body>
</html>