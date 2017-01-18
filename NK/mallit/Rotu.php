<? 
class Rotu extends PohjaMalli {

	public $id, $nimi, $lyhenne;

	public function __construct($attributes) {
		parent::__construct($attributes);
	}

	public static function all($db) {
		$query =  $db->prepare('SELECT * FROM vpv_rodut ORDER BY r_nimi');
		$query->execute();
		$rows = $query->fetchAll();

		$rodut = array();
		foreach ($rows as $row) {
			$rodut[] = new Rotu(array(
				'id' => $row['id'], 
				'nimi' => $row['r_nimi'], 
				'lyhenne' => $row['r_lyhenne']
				));
		}
		return $rodut;
	}

	public static function find($db, $id) {
		$query = $db->prepare('SELECT * FROM vpv_rodut WHERE id = :id LIMIT 1');
		$query->execute(array('id' => $id));
		$row = $query->fetch();
		if ($row) {
			$rotu = new Rotu(array(
				'id' => $row['id'], 
				'nimi' => $row['r_nimi'], 
				'lyhenne' => $row['r_lyhenne']
				));

			return $rotu;
		}

		return null;
	}

	public function save($db) {
	    $query = $db->prepare('INSERT INTO vpv_rodut (r_nimi, r_lyhenne) VALUES (:nimi, :lyhenne)');
	    $query->execute(array('nimi' => $this->nimi, 'lyhenne' => $this->lyhenne));
	}


}