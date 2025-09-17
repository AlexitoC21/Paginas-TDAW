<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
 // Conectar a la base de datos
 $servername = "localhost";
 $username = "root"; // Usuario por defecto de XAMPP
 $password = ""; // Contraseña por defecto de XAMPP
 $dbname = "formulario_db";
 $conn = new mysqli($servername, $username, $password, $dbname);
 // Verificar la conexión
 if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
 }
 // Obtener datos del formulario
 $nombre = $_POST['nombre'];
 $email = $_POST['email'];
 $edad = $_POST['edad'];
 // Insertar datos en la base de datos
 
 if($edad >= 0){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                $sql = "INSERT INTO usuarios (nombre, email, edad) VALUES ('$nombre', '$email', $edad)";
            if ($conn->query($sql) === TRUE) {
                echo "Registro exitoso.";
            } else {
               echo "Error: " . $sql . "<br>" . $conn->error;
            }
    }else{
        echo "El correo electrónico no tiene un formato válido.";
    }
 }else{
     echo "La edad no puede ser negativa.";
 }

 // Cerrar la conexión
 $conn->close();
 
 ?>
