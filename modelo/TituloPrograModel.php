<?php 
/**
 * Modelo TituloPrograma
 */
require_once 'conexion.php';
class TituloPrograma
{
	private $titpro_id;
	private $titpro_nombre;

	
	function __construct($titpro_id, $titpro_nombre)
	{
		$this->setTitproId($titpro_id);
		$this->setTitproNombre($titpro_nombre);
	}

	public function getTitproId(){
		return $this->titpro_id;
	}

	public function setTitproId($titpro_id){
		$this->titpro_id = $titpro_id;
	}

	public function getTitproNombre(){
		return $this->titpro_nombre;
	}

	public function setTitproNombre($titpro_nombre){
		$this->titpro_nombre = $titpro_nombre;
	}

	public static function save($tituloPrograma){
		$db = Db::getConnect();
		
		$insert = $db->prepare('INSERT INTO TITULO_PROGRAMA VALUES (NULL, :titpro_nombre)');
		$insert->bindValue('titpro_nombre', $tituloPrograma->getTitproNombre());
		$insert->execute();
	}

	public static function all(){
		$db = Db::getConnect();
		$listaTitulosPrograma = [];

		$select = $db->query('SELECT * FROM TITULO_PROGRAMA ORDER BY titpro_id');

		foreach($select->fetchAll() as $titpro){
			$listaTitulosPrograma[] = new TituloPrograma($titpro['titpro_id'], $titpro['titpro_nombre']);
		}
		return $listaTitulosPrograma;
	}

	public static function searchById($id){
		$db = Db::getConnect();
		$select = $db->prepare('SELECT * FROM TITULO_PROGRAMA WHERE titpro_id = :id');
		$select->bindValue('id', $id);
		$select->execute();

		$titproDb = $select->fetch();

		$tituloPrograma = new TituloPrograma($titproDb['titpro_id'], $titproDb['titpro_nombre']);
		return $tituloPrograma;
	}

	public static function update($tituloPrograma){
		$db = Db::getConnect();
		$update = $db->prepare('UPDATE TITULO_PROGRAMA SET titpro_nombre = :titpro_nombre WHERE titpro_id = :id');
		$update->bindValue('titpro_nombre', $tituloPrograma->getTitproNombre());
		$update->bindValue('id', $tituloPrograma->getTitproId());
		$update->execute();
	}

	public static function delete($id){
		$db = Db::getConnect();
		$delete = $db->prepare('DELETE FROM TITULO_PROGRAMA WHERE titpro_id = :id');
		$delete->bindValue('id', $id);
		$delete->execute();		
	}
}

?>
