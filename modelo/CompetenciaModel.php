<?php 
/**
* 
*/
require_once 'conexion.php';
class Competencia
{
	private $comp_id;
	private $comp_nombre_corto;
	private $comp_horas;
	private $comp_nombre_unidad_competencia;

	
	function __construct($comp_id, $comp_nombre_corto, $comp_horas, $comp_nombre_unidad_competencia)
	{
		$this->setCompId($comp_id);
		$this->setCompNombreCorto($comp_nombre_corto);
		$this->setCompHoras($comp_horas);
		$this->setCompNombreUnidadCompetencia($comp_nombre_unidad_competencia);
	}

	public function getCompId(){
		return $this->comp_id;
	}

	public function setCompId($comp_id){
		$this->comp_id = $comp_id;
	}

	public function getCompNombreCorto(){
		return $this->comp_nombre_corto;
	}

	public function setCompNombreCorto($comp_nombre_corto){
		$this->comp_nombre_corto = $comp_nombre_corto;
	}

	public function getCompHoras(){
		return $this->comp_horas;
	}

	public function setCompHoras($comp_horas){
		$this->comp_horas = $comp_horas;
	}

	public function getCompNombreUnidadCompetencia(){
		return $this->comp_nombre_unidad_competencia;
	}

	public function setCompNombreUnidadCompetencia($comp_nombre_unidad_competencia){
		$this->comp_nombre_unidad_competencia = $comp_nombre_unidad_competencia;
	}

	public static function save($competencia){
		$db=Db::getConnect();
		//var_dump($competencia);
		//die();
		

		$insert=$db->prepare('INSERT INTO COMPETENCIA VALUES (NULL, :comp_nombre_corto, :comp_horas, :comp_nombre_unidad_competencia)');
		$insert->bindValue('comp_nombre_corto',$competencia->getCompNombreCorto());
		$insert->bindValue('comp_horas',$competencia->getCompHoras());
		$insert->bindValue('comp_nombre_unidad_competencia',$competencia->getCompNombreUnidadCompetencia());
		$insert->execute();
	}

	public static function all(){
		$db=Db::getConnect();
		$listaCompetencias=[];

		$select=$db->query('SELECT * FROM COMPETENCIA order by comp_id');

		foreach($select->fetchAll() as $competencia){
			$listaCompetencias[]=new Competencia($competencia['comp_id'],$competencia['comp_nombre_corto'],$competencia['comp_horas'],$competencia['comp_nombre_unidad_competencia']);
		}
		return $listaCompetencias;
	}

	public static function searchById($id){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM COMPETENCIA WHERE comp_id=:id');
		$select->bindValue('id',$id);
		$select->execute();

		$competenciaDb=$select->fetch();


		$competencia = new Competencia ($competenciaDb['comp_id'],$competenciaDb['comp_nombre_corto'], $competenciaDb['comp_horas'], $competenciaDb['comp_nombre_unidad_competencia']);
		//var_dump($competencia);
		//die();
		return $competencia;

	}

	public static function update($competencia){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE COMPETENCIA SET comp_nombre_corto=:comp_nombre_corto, comp_horas=:comp_horas, comp_nombre_unidad_competencia=:comp_nombre_unidad_competencia WHERE comp_id=:id');
		$update->bindValue('comp_nombre_corto', $competencia->getCompNombreCorto());
		$update->bindValue('comp_horas',$competencia->getCompHoras());
		$update->bindValue('comp_nombre_unidad_competencia',$competencia->getCompNombreUnidadCompetencia());
		$update->bindValue('id',$competencia->getCompId());
		$update->execute();
	}

	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM COMPETENCIA WHERE comp_id=:id');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}

?>