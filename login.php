<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = array(
        'correo' => $_POST['correo'],
        'password' => $_POST['password']
    );

    $json_data = json_encode($data);

    // Realizar la solicitud POST al endpoint para generar el token
    $token_endpoint_url = 'https://mslogin-devops.onrender.com/generar-token';

    $token_curl = curl_init($token_endpoint_url);
    curl_setopt($token_curl, CURLOPT_POST, true);
    curl_setopt($token_curl, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($token_curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($token_curl, CURLOPT_RETURNTRANSFER, true);

    $token_response = curl_exec($token_curl);
    curl_close($token_curl);

    // Manejar la respuesta del servidor para obtener el token JWT
    $jwt_token = '';

    if ($token_response) {
        $token_data = json_decode($token_response, true);
        
        // Verificar si la respuesta contiene la clave "token"
        if (isset($token_data['token'])) {
            $jwt_token = $token_data['token'];
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Error: Credenciales incorrectas. Intente nuevamente.");';
            echo 'window.history.back();'; // Volver a la página anterior si hay un error en la contraseña o la respuesta del servidor
            echo '</script>';
            exit;
        }
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Error al obtener el token. Intente nuevamente.");';
        echo 'window.history.back();'; // Volver a la página anterior si no se puede obtener el token
        echo '</script>';
        exit;
    }

    // Si se obtiene el token JWT, redirigir al menú principal mostrando un modal antes
    if (!empty($jwt_token)) {
        // Mostrar el modal con el mensaje y el token
        echo '<script type="text/javascript">';
        echo 'window.onload = function() {';
        echo '  const token = "' . $jwt_token . '";'; // Obtiene el token JWT
        echo '  alert("Bienvenido al sistema. Se ha generado un token:\n" + token);'; // Muestra un mensaje con el token generado
        echo '  window.location = "GestionDocente.php";'; // Redirige a la página de gestión después del mensaje
        echo '}';
        echo '</script>';
    }
} else {
    echo "Error: Método no permitido.";
}
?>
