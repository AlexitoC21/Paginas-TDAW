 <?php
 // Conectar a la base de datos
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "formulario_db";
 $conn = new mysqli($servername, $username, $password, $dbname);
 // Verificar la conexión
 if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
 }
 // Consultar datos
 $sql = "SELECT id FROM usuarios";
 $result = $conn->query($sql);

 if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $edad = intval($_POST['edad']);
    
    $check = $conn->query("SELECT * FROM usuarios WHERE id = $id");
    if($check->num_rows > 0){
        if($edad > 0){
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                $sql = "UPDATE usuarios 
                        SET nombre='$nombre', email='$email', edad=$edad 
                        WHERE id=$id";

                if($conn->query($sql) === TRUE){
                    echo "Usuario actualizado.";
                }else{
                    echo "Error al actualizar: " . $conn->error;
                }
            } else {
                echo "El correo electrónico no tiene un formato válido.";
            }
        } else {
            echo "La edad debe ser mayor a 0.";
        }
    } else {
        echo "Usuario inexistente.";
    }
}
    
    
    $conn->close();
?>