<?php
include "Modelo/conexion.php";
include "controlador/registro_de_personas.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <h1 class="text-center p-3">hola mundo</h1>
    <div class="container-fluid row">
        <form class="col-4 p-3" method="post">
            <h3 class="text-center tex-secondary">Registro de personas</h3>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre </label>
                <input type="text" class="form-control" name="nombre" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Cedula</label>
                <input type="text" class="form-control" name="ci" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Numero telefonico</label>
                <input type="text" class="form-control" name="telf" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" name="data" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Confirmar</label>
            </div>
            <?php if ($btn==null) { ?>
                 <input type="submit" class="btn btn-primary" name="btn" value="registrar"/>
            <?php }?>
            <?php if ($btn=="editar") { ?>
                <input type="submit" class="btn btn-success" name="btn" value="actualizar"/>
                <input type="reset" class="btn btn-success" name="btn" value="cancelar"/>
            <?php } ?>   
            </form>
        <div class="col-8 p-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Cedula</th>
                        <th scope="col">Numero telefonico</th>
                        <th scope="col">Fecha_nac</th>


                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Consulta a la tabla "personas"
                    $sql = "SELECT nombres,apellidos,cedula,fecha_nac, telefono FROM personas where 1";
                    $resultado = mysqli_query($conexión, $sql);

                    ?>
                    <?php
                    // Mostrar los datos en la tabla
                    if (mysqli_num_rows($resultado) > 0) {
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            echo "<form action='index.php' method='POST'>";
                            
                                echo "<tr>";
                                    echo "<td>" . $fila["nombres"] . "</td>";
                                    echo "<td>" . $fila["apellidos"] . "</td>";
                                    echo "<td>" . $fila["cedula"] . "</td>";
                                    echo "<td>" . $fila["telefono"] . "</td>";
                                    echo "<td>" . $fila["fecha_nac"] . "</td>";
                                    echo "<td>";
                                        echo "<input type='submit' name='btn' value='editar' class='btn btn-small btn-warning'/>";
                                        echo "<input type='submit' name='btn' value='eliminar' class='btn btn-small btn-danger'/>";
                                        echo "<input type='hidden' name='cedula' value='".$fila["cedula"]."'>"; 
                                    echo "</td>";
                                echo "</tr>";
                            echo "</form>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No se encontraron registros</td></tr>";
                    }
                    ?>


                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>