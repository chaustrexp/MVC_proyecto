<?php 
/**
* 
*/
require_once 'conexion.php';
class Programa
{
	private $prog_codigo;
	private $prog_denominacion;
	private $titpro_id;
	private $prog_tipo;

	
	function __construct($prog_codigo, $prog_denominacion, $titpro_id, $prog_tipo)
	{
		$this->setProgCodigo($prog_codigo);
		$this->setProgDenominacion($prog_denominacion);
		$this->setTitproId($titpro_id);
		$this->setProgTipo($prog_tipo);
	}

	public function getProgCodigo(){
		return $this->prog_codigo;
	}

	public function setProgCodigo($prog_codigo){
		$this->prog_codigo = $prog_codigo;
	}

	public function getProgDenominacion(){
		return $this->prog_denominacion;
	}

	public function setProgDenominacion($prog_denominacion){
		$this->prog_denominacion = $prog_denominacion;
	}

	public function getTitproId(){
		return $this->titpro_id;
	}

	public function setTitproId($titpro_id){
		$this->titpro_id = $titpro_id;
	}

	public function getProgTipo(){
		return $this->prog_tipo;
	}

	public function setProgTipo($prog_tipo){
		$this->prog_tipo = $prog_tipo;
	}

	public static function save($programa){
		$db=Db::getConnect();
		//var_dump($programa);
		//die();
		

		$insert=$db->prepare('INSERT INTO PROGRAMA VALUES (NULL, :prog_denominacion, :titpro_id, :prog_tipo)');
		$insert->bindValue('prog_denominacion',$programa->getProgDenominacion());
		$insert->bindValue('titpro_id',$programa->getTitproId());
		$insert->bindValue('prog_tipo',$programa->getProgTipo());
		$insert->execute();
	}

	public static function all(){
		$db=Db::getConnect();
		$listaProgramas=[];

		$select=$db->query('SELECT * FROM PROGRAMA order by prog_codigo');

		foreach($select->fetchAll() as $programa){
			$listaProgramas[]=new Programa($programa['prog_codigo'],$programa['prog_denominacion'],$programa['titpro_id'],$programa['prog_tipo']);
		}
		return $listaProgramas;
	}

	public static function searchById($id){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM PROGRAMA WHERE prog_codigo=:id');
		$select->bindValue('id',$id);
		$select->execute();

		$programaDb=$select->fetch();


		$programa = new Programa ($programaDb['prog_codigo'],$programaDb['prog_denominacion'], $programaDb['titpro_id'], $programaDb['prog_tipo']);
		//var_dump($programa);
		//die();
		return $programa;

	}

	public static function update($programa){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE PROGRAMA SET prog_denominacion=:prog_denominacion, titpro_id=:titpro_id, prog_tipo=:prog_tipo WHERE prog_codigo=:id');
		$update->bindValue('prog_denominacion', $programa->getProgDenominacion());
		$update->bindValue('titpro_id',$programa->getTitproId());
		$update->bindValue('prog_tipo',$programa->getProgTipo());
		$update->bindValue('id',$programa->getProgCodigo());
		$update->execute();
	}

	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM PROGRAMA WHERE prog_codigo=:id');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}

?>