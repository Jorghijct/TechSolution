<?php
/* @autor Jorghi Cote */
require_once '../class/autoload.php';

if ($_POST) {
    $categoria = new Categoria();
    $categoria->nombre = trim($_POST['nombre']);
    $categoria->descripcion = trim($_POST['descripcion']);
    
    if ($categoria->guardar()) {
        header("Location: lista_categorias.php?success=1");
    } else {
        header("Location: lista_categorias.php?error=1");
    }
    exit;
}

include 'views/categorias.html';
?>