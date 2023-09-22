<?php
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : null;
$ci = isset($_POST['ci']) ? $_POST['ci'] : null;
$telf = isset($_POST['telf']) ? $_POST['telf'] : null;
$data = isset($_POST['data']) ? $_POST['data'] : null;
$btn = isset($_POST['btn']) ? $_POST['btn'] : null;


if ($btn=="registrar") {
        try {
            if (empty($ci)){
                throw new Exception("Este campo no puede estar vacio", 1);    
            }    
            if  (!is_numeric($ci)){
                throw new Exception("Este campo debe ser numerico ejem: 1.111.111", 1);    
            }    
            if (empty($nombre)){
                throw new Exception("Este campo no puede estar vacio", 1);
            }  
            $sql="INSERT INTO personas (cedula, nombres, apellidos, telefono, fecha_nac) VALUES ('$ci', '$nombre', '$apellido', '$telf', '$data')";
            $resultado = $conexión->query($sql);
            if ($resultado) {
                echo '<div class="alert alert-success">persona registrada correctamente</div>';
            } else {
                throw new Exception("Error al registrar personas", 1);
            }
        } catch (\Exception $Error) {
            echo '<div class="alert alert-danger">'.$Error->getMessage().'</div>';
        }   
}
if ($btn=="actualizar") {
   echo "estoy actualizando";
}
?>