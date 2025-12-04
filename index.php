<?php
require_once './class/autoload.php';

// Obtener productos con su categoría
$productos = Producto::listarConCategoria();

// Cargar vista
include './views/home.php';
?>
