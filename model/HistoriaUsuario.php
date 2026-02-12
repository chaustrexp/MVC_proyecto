<?php
class HistoriaUsuario {
    private $conn;
    
    public function __construct($conexion) {
        $this->conn = $conexion;
    }
    
    // Obtener todas las historias
    public function obtenerTodas() {
        $query = "SELECT * FROM historias_usuario ORDER BY fecha_creacion DESC";
        return mysqli_query($this->conn, $query);
    }
    
    // Obtener historia por ID
    public function obtenerPorId($id) {
        $stmt = mysqli_prepare($this->conn, "SELECT * FROM historias_usuario WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($resultado);
    }
    
    // Crear nueva historia
    public function crear($datos) {
        $stmt = mysqli_prepare($this->conn, 
            "INSERT INTO historias_usuario (rol, funcionalidad, descripcion, criterios_aceptacion, prioridad, estado) 
             VALUES (?, ?, ?, ?, ?, ?)");
        
        mysqli_stmt_bind_param($stmt, "ssssss", 
            $datos['rol'], 
            $datos['funcionalidad'], 
            $datos['descripcion'], 
            $datos['criterios'], 
            $datos['prioridad'], 
            $datos['estado']
        );
        
        return mysqli_stmt_execute($stmt);
    }
    
    // Actualizar historia
    public function actualizar($id, $datos) {
        $stmt = mysqli_prepare($this->conn, 
            "UPDATE historias_usuario 
             SET rol=?, funcionalidad=?, descripcion=?, criterios_aceptacion=?, prioridad=?, estado=? 
             WHERE id=?");
        
        mysqli_stmt_bind_param($stmt, "ssssssi", 
            $datos['rol'], 
            $datos['funcionalidad'], 
            $datos['descripcion'], 
            $datos['criterios'], 
            $datos['prioridad'], 
            $datos['estado'],
            $id
        );
        
        return mysqli_stmt_execute($stmt);
    }
    
    // Eliminar historia
    public function eliminar($id) {
        $stmt = mysqli_prepare($this->conn, "DELETE FROM historias_usuario WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $id);
        return mysqli_stmt_execute($stmt);
    }
}
?>
