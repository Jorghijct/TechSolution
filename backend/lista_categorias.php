<?php
/* @autor Jorghi Cote */
require_once '../class/autoload.php';

$categorias = Categoria::listar();
include './views/lista_categorias.html';
?>