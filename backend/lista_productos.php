<?php
/* @autor Jorghi Cote */
require_once '../class/autoload.php';

$productos = Producto::listar();
include './views/lista_productos.html'; 
?>
