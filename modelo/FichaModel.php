<?php 
/**
* 
*/
require_once 'conexion.php';
class Ficha
{
	private $fich_id;
	private $prog_id;
	private $inst_id;
	private $fich_jornada;

	
	function __construct($fich_id, $prog_id, $inst_id, $fich_jornada)
	{
		$this->setFichId($fich_id);
		$this->setProgId($prog_id);
		$this->setInstId($inst_id);
		$this->setFichJornada($fich_jornada);
	}

	public function getFichId(){
		return $this->fich_id;
	}

	public function setFichId($fich_id){
		$this->fich_id = $fich_id;
	}

	public function getProgId(){
		return $this->prog_id;
	}

	public function setProgId($prog_id){
		$this->prog_id = $prog_id;
	}

	public function getInstId(){
		return $this->inst_id;
	}

	public function setInstId($inst_id){
		$this->inst_id = $inst_id;
	}

	public function getFichJornada(){
		return $this->fich_jornada;
	}

	public function setFichJornada($fich_jornada){
		$this->fich_jornada = $fich_jornada;
	}

	public static function save($ficha){
		$db=Db::getConnect();
		//var_dump($ficha);
		//die();
		

		$insert=$db->prepare('INSERT INTO FICHA VALUES (NULL, :prog_id, :inst_id, :fich_jornada)');
		$insert->bindValue('prog_id',$ficha->getProgId());
		$insert->bindValue('inst_id',$ficha->getInstId());
		$insert->bindValue('fich_jornada',$ficha->getFichJornada());
		$insert->execute();
	}

	public static function all(){
		$db=Db::getConnect();
		$listaFichas=[];

		$select=$db->query('SELECT * FROM FICHA order by fich_id');

		foreach($select->fetchAll() as $ficha){
			$listaFichas[]=new Ficha($ficha['fich_id'],$ficha['prog_id'],$ficha['inst_id'],$ficha['fich_jornada']);
		}
		return $listaFichas;
	}

	public static function searchById($id){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM FICHA WHERE fich_id=:id');
		$select->bindValue('id',$id);
		$select->execute();

		$fichaDb=$select->fetch();


		$ficha = new Ficha ($fichaDb['fich_id'],$fichaDb['prog_id'], $fichaDb['inst_id'], $fichaDb['fich_jornada']);
		//var_dump($ficha);
		//die();
		return $ficha;

	}

	public static function update($ficha){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE FICHA SET prog_id=:prog_id, inst_id=:inst_id, fich_jornada=:fich_jornada WHERE fich_id=:id');
		$update->bindValue('prog_id', $ficha->getProgId());
		$update->bindValue('inst_id',$ficha->getInstId());
		$update->bindValue('fich_jornada',$ficha->getFichJornada());
		$update->bindValue('id',$ficha->getFichId());
		$update->execute();
	}

	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM FICHA WHERE fich_id=:id');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}

?>