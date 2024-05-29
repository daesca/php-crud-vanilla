<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento de prueba</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <?php 
        $name     = "Daniel";
        $lastname = "Carcamo";
    ?>

    <h1 class="text-center">Lista de vehiculos registrados</h1>
    <div>
        <form id="formCars">
            <label for="name">
                Nombre
            </label>
            <input id="name" type="text" name="name" required>
            <button>Crear carro</button>
        </form>
    </div>
    <div class="table-container">
        <table >
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="showCars">
                <!-- <tr>
                    <td>1</td>
                    <td>ZURU</td>
                    <td>2024-05-29</td>
                    <td>RUD</td>
                </tr> -->
            </tbody>
        </table>
    </div>

<script type="module" src="./js/scripts.js"></script>
</body>
</html>