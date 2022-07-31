<?php

$nombresest = isset($_POST['nombres']) ? $_POST['nombres'] : '';
$apelleest = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
$fechanacest = isset($_POST['fechanac']) ? $_POST['fechanac'] : '';
$correoest = isset($_POST['correo']) ? $_POST['correo'] : '';
$claveest = isset($_POST['clave']) ? $_POST['clave'] : '';

try {

    $conexion = new PDO("mysql:host=localhost;port=3306;dbname=form_db", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    $pdo = $conexion->prepare('INSERT INTO usuarios(nombres, apellidos, fechanac, correo, clave) VALUES(?, ?, ?, ?, ?)');
    $pdo->bindParam(1, $nombresest);
    $pdo->bindParam(2, $apelleest);
    $pdo->bindParam(3, $fechanacest);
	$pdo->bindParam(4, $correoest);
	$pdo->bindParam(5, $claveest);
    $pdo->execute() or die(print($pdo->errorInfo()));

    echo json_encode('true');

} catch(PDOException $error) {
    echo $error->getMessage();
    die();
}