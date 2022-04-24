

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Cargar archivo</title>
</head>
<body>
    <div class="Contenedor1">
        <div class="contenedor2">
            <h3>Cargar archivo csv a nube</h3>
        </div class="contenedor2">
        <form action="cargar.php" method="post" enctype="multipart/form-data">
                <label for="file">Ingresa un archivo csv</label>
                <br>
                <input type="file" name="file" id="file" accept=".csv">
                <br>
                <br>
                <label for="carnet">Ingresa tu numero de carnet</label>
                <input type="text" name="carnet" id="carnet">
                <br>
                <br>
                <button  class="boton" type="submit">Subir archivo</button>
            
        </form>
        <div>

        </div>
    </div>
</body>
</html>