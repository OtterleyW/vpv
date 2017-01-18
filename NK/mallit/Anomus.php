<? 
class Anomus extends PohjaMalli {

	public $id, $anottu_aika, $arvonimi_id, $sisalto, $tila;

	public function __construct($attributes) {
		parent::__construct($attributes);
	}

	public static function all($db) {
		$query =  $db->prepare('SELECT * FROM vpv_arvonimet INNER JOIN vpv_nk_anomukset ON vpv_nk_anomukset.arvonimi_id=vpv_arvonimet.id ORDER BY anottu_aika');
		$query->execute();
		$rows = $query->fetchAll();

		$anomukset = array();
		foreach ($rows as $row) {
			$anomukset[] = new Anomus(array(
				'id' => $row['id'], 
				'anottu_aika' => $row['anottu_aika'], 
				'arvonimi_id' => $row['arvonimi_id'], 
				'sisalto' => $row['sisalto'], 
				'tila' => $row['tila']
				));
		}
		return $anomukset;
	}

	public static function find($db, $id) {
		$query = $db->prepare('SELECT * FROM vpv_nk_anomukset INNER JOIN vpv_arvonimet ON vpv_nk_anomukset.arvonimi_id=vpv_arvonimet.id WHERE vpv_nk_anomukset.id = :id LIMIT 1');
		$query->execute(array('id' => $id));
		$rows = $query->fetch();
		if ($row) {
			$anomus = new Anomus(array(
				'id' => $row['id'], 
				'anottu_aika' => $row['anottu_aika'], 
				'arvonimi_id' => $row['arvonimi_id'], 
				'sisalto' => $row['sisalto'], 
				'tila' => $row['tila']
				));

			return $anomus;
		}

		return null;
	}



	public static function haeKasittelemattomat($db) {
		$query =  $db->prepare('SELECT * FROM vpv_arvonimet INNER JOIN vpv_nk_anomukset ON vpv_nk_anomukset.arvonimi_id=vpv_arvonimet.id WHERE tila="kasittelematta" ORDER BY anottu_aika');
		$query->execute();
		$rows = $query->fetchAll();

		$anomukset = array();
		foreach ($rows as $row) {
			$anomukset[] = new Anomus(array(
				'id' => $row['id'], 
				'anottu_aika' => $row['anottu_aika'], 
				'arvonimi_id' => $row['arvonimi_id'], 
				'sisalto' => $row['sisalto'], 
				'tila' => $row['tila']
				));
		}
		return $anomukset;
	}

	public function save($db) {
	    $query = $db->prepare('INSERT INTO vpv_nk_anomukset (anottu_aika, arvonimi_id, sisalto, tila) VALUES (NOW(), :arvonimi_id, :sisalto, :tila)');
	    $query->execute(array('arvonimi_id' => $this->arvonimi_id, 'sisalto' => $this->sisalto, 'tila' => $this->tila));
	}

	public function update($db) {
	      $query = $db->prepare('UPDATE vpv_nk_anomukset SET tila=:tila WHERE id= :id');
	      $query->execute(array('id' => $this->id, 'tila' => $this->tila));
	  }


}