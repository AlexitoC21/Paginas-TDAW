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
    $check = $conn->query("SELECT * FROM usuarios WHERE id = $id");
    if ($check->num_rows > 0) {
            $sql = "DELETE FROM usuarios WHERE id = $id";
            if ($conn->query($sql) === TRUE) {
                echo "Usuario eliminado.";
            } else {
                echo "Error al eliminar: " . $conn->error;
            }
        } else {
            echo "El usuario no esta registrado.";
        }
    } else {
        echo "El id es invalido";
    }

    
 $conn->close();
 ?>