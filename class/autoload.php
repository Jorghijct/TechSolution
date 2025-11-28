<?php
/* @autor Jorghi Cote */
spl_autoload_register(function ($class_name) {

    // Rutas posibles
    $paths = [
        __DIR__ . '/' . $class_name . '.php',      // Ej: Categoria.php
        __DIR__ . '/' . $class_name . 's.php',     // Ej: Categorias.php
    ];

    foreach ($paths as $file) {
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

?>