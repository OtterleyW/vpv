<? 
class Omistaja extends PohjaMalli {

	public $id, $nimi, $email;

	public function __construct($attributes) {
		parent::__construct($attributes);
	}

	public static function all($db) {
		$query =  $db->prepare('SELECT * FROM vpv_omistajat');
		$query->execute();
		$rows = $query->fetchAll();

		$omistajat = array();
		foreach ($rows as $row) {
			$omistajat[] = new Omistaja(array(
				'id' => $row['id'], 
				'nimi' => $row['o_nimi'], 
				'email' => $row['email']
				));
		}
		return $omistajat;
	}

	public static function find($db, $id) {
		$query = $db->prepare('SELECT * FROM vpv_omistajat WHERE id = :id LIMIT 1');
		$query->execute(array('id' => $id));
		$row = $query->fetch();
		if ($row) {
			$omistaja = new Omistaja(array(
				'id' => $row['id'], 
				'nimi' => $row['o_nimi'], 
				'email' => $row['email']
				));

			return $omistaja;
		}

		return null;
	}

	public static function findByInfo($db, $nimi, $email) {
		$query = $db->prepare('SELECT * FROM vpv_omistajat WHERE o_nimi = :nimi AND email = :email LIMIT 1');
		$query->execute(array('nimi' => $nimi, 'email' => $email));
		$row = $query->fetch();
		if ($row) {
			$omistaja = new Omistaja(array(
				'id' => $row['id'], 
				'nimi' => $row['o_nimi'], 
				'email' => $row['email']
				));

			return $omistaja;
		}

		return null;
	}

	public function save($db) {
	    $query = $db->prepare('INSERT INTO vpv_omistajat (o_nimi, email) VALUES (:nimi, :email)');
	    $query->execute(array('nimi' => $this->nimi, 'email' => $this->email));
	}


}