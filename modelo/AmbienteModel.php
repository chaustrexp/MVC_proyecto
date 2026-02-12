<?php 
/**
* 
*/
require_once 'conexion.php';
class Ambiente
{
	private $amb_id;
	private $amb_nombre;
	private $sede_id;

	
	function __construct($amb_id, $amb_nombre, $sede_id)
	{
		$this->setAmbId($amb_id);
		$this->setAmbNombre($amb_nombre);
		$this->setSedeId($sede_id);
	}

	public function getAmbId(){
		return $this->amb_id;
	}

	public function setAmbId($amb_id){
		$this->amb_id = $amb_id;
	}

	public function getAmbNombre(){
		return $this->amb_nombre;
	}

	public function setAmbNombre($amb_nombre){
		$this->amb_nombre = $amb_nombre;
	}

	public function getSedeId(){
		return $this->sede_id;
	}

	public function setSedeId($sede_id){
		$this->sede_id = $sede_id;
	}

	public static function save($ambiente){
		$db=Db::getConnect();
		//var_dump($ambiente);
		//die();
		

		$insert=$db->prepare('INSERT INTO AMBIENTE VALUES (NULL, :amb_nombre, :sede_id)');
		$insert->bindValue('amb_nombre',$ambiente->getAmbNombre());
		$insert->bindValue('sede_id',$ambiente->getSedeId());
		$insert->execute();
	}

	public static function all(){
		$db=Db::getConnect();
		$listaAmbientes=[];

		$select=$db->query('SELECT * FROM AMBIENTE order by amb_id');

		foreach($select->fetchAll() as $ambiente){
			$listaAmbientes[]=new Ambiente($ambiente['amb_id'],$ambiente['amb_nombre'],$ambiente['sede_id']);
		}
		return $listaAmbientes;
	}

	public static function searchById($id){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM AMBIENTE WHERE amb_id=:id');
		$select->bindValue('id',$id);
		$select->execute();

		$ambienteDb=$select->fetch();


		$ambiente = new Ambiente ($ambienteDb['amb_id'],$ambienteDb['amb_nombre'], $ambienteDb['sede_id']);
		//var_dump($ambiente);
		//die();
		return $ambiente;

	}

	public static function update($ambiente){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE AMBIENTE SET amb_nombre=:amb_nombre, sede_id=:sede_id WHERE amb_id=:id');
		$update->bindValue('amb_nombre', $ambiente->getAmbNombre());
		$update->bindValue('sede_id',$ambiente->getSedeId());
		$update->bindValue('id',$ambiente->getAmbId());
		$update->execute();
	}

	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM AMBIENTE WHERE amb_id=:id');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}

?>