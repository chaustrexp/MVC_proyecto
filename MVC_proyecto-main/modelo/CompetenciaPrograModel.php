<?php 
/**
* 
*/
require_once 'conexion.php';
class CompetenciaPrograma
{
	private $prog_id;
	private $comp_id;

	
	function __construct($prog_id, $comp_id)
	{
		$this->setProgId($prog_id);
		$this->setCompId($comp_id);
	}

	public function getProgId(){
		return $this->prog_id;
	}

	public function setProgId($prog_id){
		$this->prog_id = $prog_id;
	}

	public function getCompId(){
		return $this->comp_id;
	}

	public function setCompId($comp_id){
		$this->comp_id = $comp_id;
	}

	public static function save($competenciaPrograma){
		$db=Db::getConnect();
		//var_dump($competenciaPrograma);
		//die();
		

		$insert=$db->prepare('INSERT INTO COMPETxPROGRAMA VALUES (:prog_id, :comp_id)');
		$insert->bindValue('prog_id',$competenciaPrograma->getProgId());
		$insert->bindValue('comp_id',$competenciaPrograma->getCompId());
		$insert->execute();
	}

	public static function all(){
		$db=Db::getConnect();
		$listaCompetenciasPrograma=[];

		$select=$db->query('SELECT * FROM COMPETxPROGRAMA order by prog_id, comp_id');

		foreach($select->fetchAll() as $competenciaPrograma){
			$listaCompetenciasPrograma[]=new CompetenciaPrograma($competenciaPrograma['prog_id'],$competenciaPrograma['comp_id']);
		}
		return $listaCompetenciasPrograma;
	}

	public static function searchById($prog_id, $comp_id){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM COMPETxPROGRAMA WHERE prog_id=:prog_id AND comp_id=:comp_id');
		$select->bindValue('prog_id',$prog_id);
		$select->bindValue('comp_id',$comp_id);
		$select->execute();

		$competenciaProgramaDb=$select->fetch();


		$competenciaPrograma = new CompetenciaPrograma ($competenciaProgramaDb['prog_id'],$competenciaProgramaDb['comp_id']);
		//var_dump($competenciaPrograma);
		//die();
		return $competenciaPrograma;

	}

	public static function update($competenciaPrograma, $old_prog_id, $old_comp_id){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE COMPETxPROGRAMA SET prog_id=:prog_id, comp_id=:comp_id WHERE prog_id=:old_prog_id AND comp_id=:old_comp_id');
		$update->bindValue('prog_id', $competenciaPrograma->getProgId());
		$update->bindValue('comp_id',$competenciaPrograma->getCompId());
		$update->bindValue('old_prog_id',$old_prog_id);
		$update->bindValue('old_comp_id',$old_comp_id);
		$update->execute();
	}

	public static function delete($prog_id, $comp_id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM COMPETxPROGRAMA WHERE prog_id=:prog_id AND comp_id=:comp_id');
		$delete->bindValue('prog_id',$prog_id);
		$delete->bindValue('comp_id',$comp_id);
		$delete->execute();		
	}
}

?>