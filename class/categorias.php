<?php
/* @autor: Jorghi Cote */
require_once 'database.php';

class Categoria {
    private $db;
    private $table = "categorias";

    public $id;
    public $nombre;
    public $descripcion;

    public function __construct() {
        $this->db = new Database();
    }

    public function guardar() {
        $data = [
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion
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
        return $db->select("categorias");
    }
}
?>