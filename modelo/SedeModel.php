<?php 
/**
* 
*/
require_once 'conexion.php';
class Sede
{
	private $sede_id;
	private $sede_nombre;

	
	function __construct($sede_id, $sede_nombre)
	{
		$this->setSedeId($sede_id);
		$this->setSedeNombre($sede_nombre);
	}

	public function getSedeId(){
		return $this->sede_id;
	}

	public function setSedeId($sede_id){
		$this->sede_id = $sede_id;
	}

	public function getSedeNombre(){
		return $this->sede_nombre;
	}

	public function setSedeNombre($sede_nombre){
		$this->sede_nombre = $sede_nombre;
	}

	public static function save($sede){
		$db=Db::getConnect();
		//var_dump($sede);
		//die();
		

		$insert=$db->prepare('INSERT INTO SEDE VALUES (NULL, :sede_nombre)');
		$insert->bindValue('sede_nombre',$sede->getSedeNombre());
		$insert->execute();
	}

	public static function all(){
		$db=Db::getConnect();
		$listaSedes=[];

		$select=$db->query('SELECT * FROM SEDE order by sede_id');

		foreach($select->fetchAll() as $sede){
			$listaSedes[]=new Sede($sede['sede_id'],$sede['sede_nombre']);
		}
		return $listaSedes;
	}

	public static function searchById($id){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM SEDE WHERE sede_id=:id');
		$select->bindValue('id',$id);
		$select->execute();

		$sedeDb=$select->fetch();


		$sede = new Sede ($sedeDb['sede_id'],$sedeDb['sede_nombre']);
		//var_dump($sede);
		//die();
		return $sede;

	}

	public static function update($sede){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE SEDE SET sede_nombre=:sede_nombre WHERE sede_id=:id');
		$update->bindValue('sede_nombre', $sede->getSedeNombre());
		$update->bindValue('id',$sede->getSedeId());
		$update->execute();
	}

	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM SEDE WHERE sede_id=:id');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}

?>