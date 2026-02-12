<?php 
/**
* 
*/
require_once 'conexion.php';
class AsignacionDetalle
{
	private $asig_id;
	private $detasig_hora_ini;
	private $detasig_hora_fin;
	private $detasig_id;

	
	function __construct($asig_id, $detasig_hora_ini, $detasig_hora_fin, $detasig_id)
	{
		$this->setAsigId($asig_id);
		$this->setDetasigHoraIni($detasig_hora_ini);
		$this->setDetasigHoraFin($detasig_hora_fin);
		$this->setDetasigId($detasig_id);
	}

	public function getAsigId(){
		return $this->asig_id;
	}

	public function setAsigId($asig_id){
		$this->asig_id = $asig_id;
	}

	public function getDetasigHoraIni(){
		return $this->detasig_hora_ini;
	}

	public function setDetasigHoraIni($detasig_hora_ini){
		$this->detasig_hora_ini = $detasig_hora_ini;
	}

	public function getDetasigHoraFin(){
		return $this->detasig_hora_fin;
	}

	public function setDetasigHoraFin($detasig_hora_fin){
		$this->detasig_hora_fin = $detasig_hora_fin;
	}

	public function getDetasigId(){
		return $this->detasig_id;
	}

	public function setDetasigId($detasig_id){
		$this->detasig_id = $detasig_id;
	}

	public static function save($detalleAsignacion){
		$db=Db::getConnect();
		//var_dump($detalleAsignacion);
		//die();
		

		$insert=$db->prepare('INSERT INTO DETALLExASIGNACION VALUES (:asig_id, :detasig_hora_ini, :detasig_hora_fin, NULL)');
		$insert->bindValue('asig_id',$detalleAsignacion->getAsigId());
		$insert->bindValue('detasig_hora_ini',$detalleAsignacion->getDetasigHoraIni());
		$insert->bindValue('detasig_hora_fin',$detalleAsignacion->getDetasigHoraFin());
		$insert->execute();
	}

	public static function all(){
		$db=Db::getConnect();
		$listaDetallesAsignacion=[];

		$select=$db->query('SELECT * FROM DETALLExASIGNACION order by detasig_id');

		foreach($select->fetchAll() as $detalleAsignacion){
			$listaDetallesAsignacion[]=new AsignacionDetalle($detalleAsignacion['asig_id'],$detalleAsignacion['detasig_hora_ini'],$detalleAsignacion['detasig_hora_fin'],$detalleAsignacion['detasig_id']);
		}
		return $listaDetallesAsignacion;
	}

	public static function searchById($id){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM DETALLExASIGNACION WHERE detasig_id=:id');
		$select->bindValue('id',$id);
		$select->execute();

		$detalleAsignacionDb=$select->fetch();


		$detalleAsignacion = new AsignacionDetalle ($detalleAsignacionDb['asig_id'],$detalleAsignacionDb['detasig_hora_ini'], $detalleAsignacionDb['detasig_hora_fin'], $detalleAsignacionDb['detasig_id']);
		//var_dump($detalleAsignacion);
		//die();
		return $detalleAsignacion;

	}

	public static function update($detalleAsignacion){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE DETALLExASIGNACION SET asig_id=:asig_id, detasig_hora_ini=:detasig_hora_ini, detasig_hora_fin=:detasig_hora_fin WHERE detasig_id=:id');
		$update->bindValue('asig_id', $detalleAsignacion->getAsigId());
		$update->bindValue('detasig_hora_ini',$detalleAsignacion->getDetasigHoraIni());
		$update->bindValue('detasig_hora_fin',$detalleAsignacion->getDetasigHoraFin());
		$update->bindValue('id',$detalleAsignacion->getDetasigId());
		$update->execute();
	}

	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM DETALLExASIGNACION WHERE detasig_id=:id');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}

?>