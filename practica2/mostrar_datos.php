<head>
    <meta charset="UTF-8">
    <title>Usuarios Registrados</title>
    <!-- CSS AQUÍ -->
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        background-color: #f0f0f0;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    nav {
        background-color: #333;
        padding: 1em;
        align-self: stretch;
        text-align: center;
    }
    nav a {
        color: white;
        text-decoration: none;
        margin: 0 1em;
    }
    nav a:hover {
        text-decoration: underline;
    }
    table {
        width: 50%;
        border-collapse: collapse;
        margin-top: 1em;
    }
    table, th, td {
        border: 1px solid #ccc;
    }
    th, td {
        padding: 12px;
        text-align: center;
    }
    th {
        background-color: #333;
        color: white;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    tr:hover {
        background-color: #e0e0e0;
    }
</style>
</head>
<body>
    <nav> </nav>

 <?php
 // Conectar a la base de datos
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "formulario_db";
 $registros_por_pagina = 5;
 $conn = new mysqli($servername, $username, $password, $dbname);
 // Verificar la conexión
 if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
 }
 
 // Página actual
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($pagina < 1) $pagina = 1;

$offset = ($pagina - 1) * $registros_por_pagina;

$sql_total = "SELECT COUNT(*) as total FROM usuarios";
$resultado_total = $conn->query($sql_total);
$fila_total = $resultado_total->fetch_assoc();
$total_registros = $fila_total['total'];
$total_paginas = ceil($total_registros / $registros_por_pagina);
    
//Consulta datos
 $sql = "SELECT id, nombre, email, edad FROM usuarios LIMIT $registros_por_pagina OFFSET $offset";
 $result = $conn->query($sql);
    
 if ($result->num_rows > 0) {
    echo "<h1>Usuarios Registrados</h1>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Email</th><th>Edad</th></tr>";
 while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["edad"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
 } else {
    echo "No hay usuarios registrados.";
 }
 if ($total_paginas > 1) {
    echo '<div class="pagination">';
    if ($pagina > 1) {
        echo '<a href="?pagina=' . ($pagina - 1) . '">&laquo; Anterior</a>';
    }

    for ($i = 1; $i <= $total_paginas; $i++) {
        if ($i == $pagina) {
            echo '<a class="active">' . $i . '</a>';
        } else {
            echo '<a href="?pagina=' . $i . '">' . $i . '</a>';
        }
    }

    if ($pagina < $total_paginas) {
        echo '<a href="?pagina=' . ($pagina + 1) . '">Siguiente &raquo;</a>';
    }
    echo '</div>';
    }
 // Cerrar la conexión
 $conn->close();
 ?>
</body>
</html>