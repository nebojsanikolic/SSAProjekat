<?php
require_once 'db.php';

class DAO {
	private $db;

	// ADMIN
	private $GETADMIN = "SELECT * FROM `admins` WHERE username = ? && password = ?;";
	private $GETADMINBYID ="SELECT * FROM `admins` WHERE id = ?";
	
	//PARKING
	private $GETPARKING = "SELECT * FROM `lot1`;";
	private $INSERTPARKING = "INSERT INTO `lot1` (`id`, `MaxCap`, `Occupied`) VALUES (?, ?, ?);";
	private $GETPARKINGBYID = "SELECT * FROM `lot1` WHERE id=?;";

	// INSERT INTO `lot1` (`id`, `MaxCap`, `Occupied`) VALUES ('1', '75', '66')
	
	public function __construct()
	{
		$this->db = DB::createInstance();
	}
// ADMIN
	public function GetAdmin($username,$password)
	{
		
		$statement = $this->db->prepare($this->GETADMIN);
		$statement->bindValue(1, $username, PDO::PARAM_INT);
		$statement->bindValue(2, $password, PDO::PARAM_INT);
		
		$statement->execute();
		
		$result = $statement->fetch();
		return $result;
	}
	public function GetAdminByID($id)
	{
		
		$statement = $this->db->prepare($this->GETADMINBYID);
		$statement->bindValue(1, $id, PDO::PARAM_INT);
		
		$statement->execute();
		
		$result = $statement->fetch();
		return $result;
	}

// PARKING
	public function GetParkingById($id)
	{
		
		$statement = $this->db->prepare($this->GETPARKINGBYID);
		$statement->bindValue(1, $id, PDO::PARAM_INT);

		$statement->execute();
		
		$result = $statement->fetch();
		return $result;
	}
	public function GetAllParking()
	{
		
		$statement = $this->db->prepare($this->GETPARKING);

		$statement->execute();
		
		$result = $statement->fetchAll();
		return $result;
	}
	public function InsertParking($id, $MaxCap, $Occupied)
	{
		
		$statement = $this->db->prepare($this->INSERTPARKING);
		$statement->bindValue(1, $id);
		$statement->bindValue(2, $MaxCap);
		$statement->bindValue(3, $Occupied);
		
		$statement->execute();
	}


// OSTALO
	public function insertOsoba($ime, $prezime, $JMBG)
	{
		// 1. nacin
		/*
		$statement = $this->db->prepare("INSERT INTO osoba (ime, prezime, JMBG, vremeUpisa) VALUES (:ime, :prezime, :JMBG, CURRENT_TIMESTAMP)");
		$statement->execute(array(':ime'=>$ime, ':prezime'=> $prezime, ':JMBG'=>$JMBG));
		*/
		
		// 2. nacin
		$statement = $this->db->prepare($this->INSERTOSOBA);
		$statement->bindValue(1, $ime);
		$statement->bindValue(2, $prezime);
		$statement->bindValue(3, $JMBG);
		
		$statement->execute();
	}

	public function deleteOsoba($idosoba)
	{
		// 1. nacin
		/*
		$statement = $this->db->prepare("DELETE  FROM osoba WHERE idosoba = :idosoba");
		$statement->execute(array(':idosoba' => $idosoba));
		*/
		
		// 2. nacin
		$statement = $this->db->prepare($this->DELETEOSOBA);
		$statement->bindValue(1, $idosoba);
		
		$statement->execute();
	}

	public function getOsobaById($idosoba)
	{
		// 1. nacin
		/*
		$statement = $this->db->prepare("SELECT * FROM osoba WHERE idosoba = :idosoba");
		$statement->execute(array(':idosoba' => $idosoba));
		
		$result = $statement->fetch();
		return $result;
		*/
		
		// 2. nacin
		$statement = $this->db->prepare($this->SELECTBYID);
		$statement->bindValue(1, $idosoba);
		
		$statement->execute();
		
		$result = $statement->fetch();
		return $result;
	}
}
?>
