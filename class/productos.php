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
    // Método requerido por listarConCategoria()
    private static function getConexion() {
    $db = new Database();
    return $db->getConnection();
}

    public static function listarConCategoria() {
         $conn = self::getConexion();
         $sql = "SELECT p.*, c.nombre AS categoria
                 FROM productos p
                 LEFT JOIN categorias c ON p.categoria_id = c.id
                 ORDER BY p.id ASC";
         $stmt = $conn->prepare($sql);
         $stmt->execute();
         return $stmt->fetchAll(PDO::FETCH_ASSOC);
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