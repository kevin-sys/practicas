<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = array(
        'nombres' => $_POST['nombres'],
        'apellidos' => $_POST['apellidos'],
        'correo' => $_POST['correo'],
        'tipoIdentificacion' => $_POST['tipoIdentificacion'],
        'identificacion' => $_POST['identificacion'],
        'celular' => $_POST['celular'],
        'idFacultad' => $_POST['idFacultad'],
        'idPrograma' => $_POST['idPrograma'],
        'idSede' => $_POST['idSede']
    );
    
    $json_data = json_encode($data);
    
    // Realizar la solicitud POST al endpoint
    $endpoint_url = 'https://project-proposal-dse9.onrender.com/proposal/postDocente';
    
    $curl = curl_init($endpoint_url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($curl);
    curl_close($curl);
    
    // Manejar la respuesta del servidor
    if ($response) {
        echo '<script type="text/javascript">';
        echo 'alert("Datos guardados correctamente.");';
        echo '  window.location = "GestionDocente.php";';
        echo '</script>';
        
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Hubo un error al guardar los datos.");';
        echo '</script>';
    }
} else {
    echo "Error: Método no permitido.";
}
?>
