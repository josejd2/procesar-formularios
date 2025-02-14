<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];
    $genero = isset($_POST['genero']) ? $_POST['genero'] : 'No especificado';
    $pais = $_POST['pais'];
    $comentario = $_POST['comentario'];
    
    // Crear el contenido para guardar en el archivo
    $contenido = "Nombre Completo: $nombre\n";
    $contenido .= "Correo Electrónico: $email\n";
    $contenido .= "Edad: $edad\n";
    $contenido .= "Género: $genero\n";
    $contenido .= "País: $pais\n";
    $contenido .= "Comentario: $comentario\n";
    $contenido .= "----------------------------\n"; // Separador entre envíos
    // Ruta del archivo de texto
    $archivo = "datos.txt";
    // Guardar los datos en el archivo
    if (file_put_contents($archivo, $contenido, FILE_APPEND)) {
        echo "<p>Los datos han sido guardados exitosamente en el archivo <strong>datos.txt</strong>.</p>";
    } else {
        echo "<p><strong>Error:</strong> No se pudo guardar los datos en el archivo.</p>";
    }

    header("Location: ./index.html");
    
} else {
    echo "<p>Acceso no válido al archivo de procesamiento.</p>";
}
?>