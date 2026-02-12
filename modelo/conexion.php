<?php
/**
 * Clase de conexión a la base de datos
 */
class Db {
    private static $connection = null;
    
    /**
     * Obtiene la conexión a la base de datos
     * @return PDO
     */
    public static function getConnect() {
        if (self::$connection === null) {
            try {
                $host = 'localhost';
                $dbname = 'nombre_base_datos';
                $username = 'root';
                $password = '';
                
                self::$connection = new PDO(
                    "mysql:host=$host;dbname=$dbname;charset=utf8",
                    $username,
                    $password,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
            } catch (PDOException $e) {
                die("Error de conexión: " . $e->getMessage());
            }
        }
        return self::$connection;
    }
}
?>
