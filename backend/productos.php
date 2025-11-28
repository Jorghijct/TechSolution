<?php
/* @autor Jorghi Cote */
require_once '../class/autoload.php';

if ($_POST) {
    $productos = new Producto();
    $productos->nombre = trim($_POST['nombre']);
    $productos->imagen = trim($_POST['imagen']);
    $productos->descripcion = trim($_POST['descripcion']); 
    $productos->precio = trim($_POST['precio']);
    $productos->categoria_id = trim($_POST['categoria_id']);
    
    if ($productos->guardar()) {
        header("Location: lista_productos.php?success=1"); 
    } else {
        header("Location: lista_productos.php?error=1"); 
    }
    exit;
}

include './views/productos.html'; 
?>