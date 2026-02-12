<?php
require_once 'conexion.php';
class Asignacion
{
	private $asig_id;
	private $instructor_inst_id;
	private $asig_fecha_ini;
	private $asig_fecha_fin;
	private $ficha_fich_id;
	private $ambiente_amb_id;
	private $competencia_comp_id;

	function __construct($asig_id, $instructor_inst_id, $asig_fecha_ini, $asig_fecha_fin, $ficha_fich_id, $ambiente_amb_id, $competencia_comp_id)
	{
		$this->setAsigId($asig_id);
		$this->setInstructorInstId($instructor_inst_id);
		$this->setAsigFechaIni($asig_fecha_ini);
		$this->setAsigFechaFin($asig_fecha_fin);
		$this->setFichaFichId($ficha_fich_id);
		$this->setAmbienteAmbId($ambiente_amb_id);
		$this->setCompetenciaCompId($competencia_comp_id);
	}

	public function getAsigId(){
		return $this->asig_id;
	}

	public function setAsigId($asig_id){
		$this->asig_id = $asig_id;
	}

	public function getInstructorInstId(){
		return $this->instructor_inst_id;
	}

	public function setInstructorInstId($instructor_inst_id){
		$this->instructor_inst_id = $instructor_inst_id;
	}

	public function getAsigFechaIni(){
		return $this->asig_fecha_ini;
	}

	public function setAsigFechaIni($asig_fecha_ini){
		$this->asig_fecha_ini = $asig_fecha_ini;
	}

	public function getAsigFechaFin(){
		return $this->asig_fecha_fin;
	}

	public function setAsigFechaFin($asig_fecha_fin){
		$this->asig_fecha_fin = $asig_fecha_fin;
	}

	public function getFichaFichId(){
		return $this->ficha_fich_id;
	}

	public function setFichaFichId($ficha_fich_id){
		$this->ficha_fich_id = $ficha_fich_id;
	}

	public function getAmbienteAmbId(){
		return $this->ambiente_amb_id;
	}

	public function setAmbienteAmbId($ambiente_amb_id){
		$this->ambiente_amb_id = $ambiente_amb_id;
	}

	public function getCompetenciaCompId(){
		return $this->competencia_comp_id;
	}

	public function setCompetenciaCompId($competencia_comp_id){
		$this->competencia_comp_id = $competencia_comp_id;
	}

	public static function save($asignacion){
		$db=Db::getConnect();
		$insert=$db->prepare('INSERT INTO ASIGNACION (INSTRUCTOR_inst_id, asig_fecha_ini, asig_fecha_fin, FICHA_fich_id, AMBIENTE_amb_id, COMPETENCIA_comp_id) VALUES (:instructor_inst_id, :asig_fecha_ini, :asig_fecha_fin, :ficha_fich_id, :ambiente_amb_id, :competencia_comp_id)');
		$insert->bindValue('instructor_inst_id',$asignacion->getInstructorInstId());
		$insert->bindValue('asig_fecha_ini',$asignacion->getAsigFechaIni());
		$insert->bindValue('asig_fecha_fin',$asignacion->getAsigFechaFin());
		$insert->bindValue('ficha_fich_id',$asignacion->getFichaFichId());
		$insert->bindValue('ambiente_amb_id',$asignacion->getAmbienteAmbId());
		$insert->bindValue('competencia_comp_id',$asignacion->getCompetenciaCompId());
		$insert->execute();
	}

	public static function all(){
		$db=Db::getConnect();
		$listaAsignaciones=[];

		$select=$db->query('SELECT * FROM ASIGNACION order by ASIG_ID');

		foreach($select->fetchAll() as $asignacion){
			$listaAsignaciones[]=new Asignacion($asignacion['ASIG_ID'],$asignacion['INSTRUCTOR_inst_id'],$asignacion['asig_fecha_ini'],$asignacion['asig_fecha_fin'],$asignacion['FICHA_fich_id'],$asignacion['AMBIENTE_amb_id'],$asignacion['COMPETENCIA_comp_id']);
		}
		return $listaAsignaciones;
	}

	public static function searchById($id){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM ASIGNACION WHERE ASIG_ID=:id');
		$select->bindValue('id',$id);
		$select->execute();

		$asignacionDb=$select->fetch();

		$asignacion = new Asignacion ($asignacionDb['ASIG_ID'],$asignacionDb['INSTRUCTOR_inst_id'],$asignacionDb['asig_fecha_ini'],$asignacionDb['asig_fecha_fin'],$asignacionDb['FICHA_fich_id'],$asignacionDb['AMBIENTE_amb_id'],$asignacionDb['COMPETENCIA_comp_id']);
		return $asignacion;
	}

	public static function update($asignacion){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE ASIGNACION SET INSTRUCTOR_inst_id=:instructor_inst_id, asig_fecha_ini=:asig_fecha_ini, asig_fecha_fin=:asig_fecha_fin, FICHA_fich_id=:ficha_fich_id, AMBIENTE_amb_id=:ambiente_amb_id, COMPETENCIA_comp_id=:competencia_comp_id WHERE ASIG_ID=:id');
		$update->bindValue('instructor_inst_id',$asignacion->getInstructorInstId());
		$update->bindValue('asig_fecha_ini',$asignacion->getAsigFechaIni());
		$update->bindValue('asig_fecha_fin',$asignacion->getAsigFechaFin());
		$update->bindValue('ficha_fich_id',$asignacion->getFichaFichId());
		$update->bindValue('ambiente_amb_id',$asignacion->getAmbienteAmbId());
		$update->bindValue('competencia_comp_id',$asignacion->getCompetenciaCompId());
		$update->bindValue('id',$asignacion->getAsigId());
		$update->execute();
	}

	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE FROM ASIGNACION WHERE ASIG_ID=:id');
		$delete->bindValue('id',$id);
		$delete->execute();
	}
}
?>