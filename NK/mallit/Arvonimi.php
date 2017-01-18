<? 
class Arvonimi extends PohjaMalli {

	public $id, $nimi, $lyhenne, $kategoria;

	public function __construct($attributes) {
		parent::__construct($attributes);
	}

	public static function all($db) {
		$query =  $db->prepare('SELECT * FROM vpv_arvonimet');
		$query->execute();
		$rows = $query->fetchAll();

		$anomukset = array();
		foreach ($rows as $row) {
			$anomukset[] = new Arvonimi(array(
				'id' => $row['id'], 
				'nimi' => $row['arvonimi'], 
				'lyhenne' => $row['lyhenne'],
				'kategoria' => $row['kategoria']
				));
		}
		return $anomukset;
	}

	public static function find($db, $id) {
		$query = $db->prepare('SELECT * FROM vpv_arvonimet WHERE id = :id LIMIT 1');
		$query->execute(array('id' => $id));
		$row = $query->fetch();
		if ($row) {
			$arvonimi = new Arvonimi(array(
				'id' => $row['id'], 
				'nimi' => $row['arvonimi'], 
				'lyhenne' => $row['lyhenne'],
				'kategoria' => $row['kategoria']
				));

			return $arvonimi;
		}

		return null;
	}

	public function save($db) {
	    $query = $db->prepare('INSERT INTO vpv_arvonimet (arvonimi, lyhenne, kategoria) VALUES (:nimi, :lyhenne, :kategoria)');
	    $query->execute(array('nimi' => $this->nimi, 'lyhenne' => $this->lyhenne, 'kategoria' => $this->kategoria));
	}


	    public function annaArvonimi($db,$hevonen_id, $arvonimi_id) {
	    $query = $db->prepare('INSERT INTO vpv_arvonimet_hevoset (hevonen_id, arvonimi_id) VALUES (:hevonen_id, :arvonimi_id)');
	    $query->execute(array('hevonen_id' => $hevonen_id, 'arvonimi_id' => $arvonimi_id));
	}

}