<?php 
/**
* 
*/
require_once 'conexion.php';
class Instructor
{
	private $inst_id;
	private $inst_nombres;
	private $inst_apellidos;
	private $inst_correo;
	private $inst_telefono;

	
	function __construct($inst_id, $inst_nombres, $inst_apellidos, $inst_correo, $inst_telefono)
	{
		$this->setInstId($inst_id);
		$this->setInstNombres($inst_nombres);
		$this->setInstApellidos($inst_apellidos);
		$this->setInstCorreo($inst_correo);
		$this->setInstTelefono($inst_telefono);
	}

	public function getInstId(){
		return $this->inst_id;
	}

	public function setInstId($inst_id){
		$this->inst_id = $inst_id;
	}

	public function getInstNombres(){
		return $this->inst_nombres;
	}

	public function setInstNombres($inst_nombres){
		$this->inst_nombres = $inst_nombres;
	}

	public function getInstApellidos(){
		return $this->inst_apellidos;
	}

	public function setInstApellidos($inst_apellidos){
		$this->inst_apellidos = $inst_apellidos;
	}

	public function getInstCorreo(){
		return $this->inst_correo;
	}

	public function setInstCorreo($inst_correo){
		$this->inst_correo = $inst_correo;
	}

	public function getInstTelefono(){
		return $this->inst_telefono;
	}

	public function setInstTelefono($inst_telefono){
		$this->inst_telefono = $inst_telefono;
	}

	public static function save($instructor){
		$db=Db::getConnect();
		//var_dump($instructor);
		//die();
		

		$insert=$db->prepare('INSERT INTO INSTRUCTOR VALUES (NULL, :inst_nombres, :inst_apellidos, :inst_correo, :inst_telefono)');
		$insert->bindValue('inst_nombres',$instructor->getInstNombres());
		$insert->bindValue('inst_apellidos',$instructor->getInstApellidos());
		$insert->bindValue('inst_correo',$instructor->getInstCorreo());
		$insert->bindValue('inst_telefono',$instructor->getInstTelefono());
		$insert->execute();
	}

	public static function all(){
		$db=Db::getConnect();
		$listaInstructores=[];

		$select=$db->query('SELECT * FROM INSTRUCTOR order by inst_id');

		foreach($select->fetchAll() as $instructor){
			$listaInstructores[]=new Instructor($instructor['inst_id'],$instructor['inst_nombres'],$instructor['inst_apellidos'],$instructor['inst_correo'],$instructor['inst_telefono']);
		}
		return $listaInstructores;
	}

	public static function searchById($id){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM INSTRUCTOR WHERE inst_id=:id');
		$select->bindValue('id',$id);
		$select->execute();

		$instructorDb=$select->fetch();


		$instructor = new Instructor ($instructorDb['inst_id'],$instructorDb['inst_nombres'], $instructorDb['inst_apellidos'], $instructorDb['inst_correo'], $instructorDb['inst_telefono']);
		//var_dump($instructor);
		//die();
		return $instructor;

	}

	public static function update($instructor){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE INSTRUCTOR SET inst_nombres=:inst_nombres, inst_apellidos=:inst_apellidos, inst_correo=:inst_correo, inst_telefono=:inst_telefono WHERE inst_id=:id');
		$update->bindValue('inst_nombres', $instructor->getInstNombres());
		$update->bindValue('inst_apellidos',$instructor->getInstApellidos());
		$update->bindValue('inst_correo',$instructor->getInstCorreo());
		$update->bindValue('inst_telefono',$instructor->getInstTelefono());
		$update->bindValue('id',$instructor->getInstId());
		$update->execute();
	}

	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM INSTRUCTOR WHERE inst_id=:id');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}

?>