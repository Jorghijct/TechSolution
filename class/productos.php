<?php
/* @autor Jorghi Cote */
require_once 'database.php';

class Producto {
    private $db;
    private $table = "productos";

    public $id;
    public $nombre;
    public $imagen;
    public $descripcion;
    public $precio;
    public $categoria_id;

    public function __construct() {
        $this->db = new Database();
    }

    public function guardar() {
        $data = [
            'nombre' => $this->nombre,
            'imagen' => $this->imagen,
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'categoria_id' => $this->categoria_id
        ];

        if ($this->id) {
            // Actualizar
            return $this->db->update($this->table, $data, ['id' => $this->id]);
        } else {
            // Insertar
            return $this->db->insert($this->table, $data);
        }
    }

    public function eliminar() {
        return $this->db->delete($this->table, ['id' => $this->id]);
    }

    public static function listar() {
        $db = new Database();
        return $db->select("productos");
    }
}
?>