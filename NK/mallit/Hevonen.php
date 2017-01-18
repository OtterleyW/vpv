<? 
class Hevonen extends PohjaMalli {

	public $id, $nimi, $rotu_id, $rotu, $rotulyhenne, $sukupuoli, $url, $omistaja_id, $omistaja_email, $omistaja_nimi, $arvonimi, $arvonimi_lyhenne, $arvonimi_myonnetty;

	public function __construct($attributes) {
		parent::__construct($attributes);
	}

	public static function all($db) {
		$query =  $db->prepare('SELECT h.id as id, h.h_nimi, h.rotu_id, r.r_nimi, r.r_lyhenne, h.sukupuoli, h.url, h.omistaja_id, o.email, o.o_nimi, an.arvonimi, an.lyhenne, anh.myonnetty_aika FROM vpv_hevoset as h LEFT JOIN vpv_arvonimet_hevoset as anh ON h.id = anh.hevonen_id LEFT JOIN  vpv_arvonimet as an ON anh.arvonimi_id=an.id  LEFT JOIN vpv_omistajat as o ON h.omistaja_id = o.id LEFT JOIN vpv_rodut as r ON h.rotu_id = r.id');
		$query->execute();
		$rows = $query->fetchAll();

		$hevoset = array();
		foreach ($rows as $row) {
			$hevoset[] = new Hevonen(array(
				'id'=> $row['id'],
				'nimi'=> $row['h_nimi'],
				'rotu_id'=> $row['rotu_id'],
				'rotu'=> $row['r_nimi'],
				'rotulyhenne'=> $row['r_lyhenne'],
				'sukupuoli'=> $row['sukupuoli'],
				'url'=> $row['url'],
				'omistaja_id'=> $row['omistaja_id'],
				'omistaja_email'=> $row['email'],
				'omistaja_nimi'=> $row['o_nimi'],
				'arvonimi'=> $row['arvonimi'],
				'arvonimi_lyhenne'=> $row['lyhenne'],
				'arvonimi_myonnetty'=> $row['myonnetty_aika']
				));
		}
		return $hevoset;
	}

	public static function find($db, $id) {
		$query =  $db->prepare('SELECT h.id as id, h.h_nimi, h.rotu_id, r.r_nimi, r.r_lyhenne, h.sukupuoli, h.url, h.omistaja_id, o.email, o.o_nimi, an.arvonimi, an.lyhenne, anh.myonnetty_aika FROM vpv_hevoset as h LEFT JOIN vpv_arvonimet_hevoset as anh ON h.id = anh.hevonen_id LEFT JOIN  vpv_arvonimet as an ON anh.arvonimi_id=an.id  LEFT JOIN vpv_omistajat as o ON h.omistaja_id = o.id LEFT JOIN vpv_rodut as r ON h.rotu_id = r.id WHERE h.id=:id LIMIT 1');
		$query->execute(array('id' => $id));
		$row = $query->fetch();
		if ($row) {
			$hevonen = new Hevonen(array(
				'id'=> $row['id'],
				'nimi'=> $row['h_nimi'],
				'rotu_id'=> $row['rotu_id'],
				'rotu'=> $row['r_nimi'],
				'rotulyhenne'=> $row['r_lyhenne'],
				'sukupuoli'=> $row['sukupuoli'],
				'url'=> $row['url'],
				'omistaja_id'=> $row['omistaja_id'],
				'omistaja_email'=> $row['email'],
				'omistaja_nimi'=> $row['o_nimi'],
				'arvonimi'=> $row['arvonimi'],
				'arvonimi_lyhenne'=> $row['lyhenne'],
				'arvonimi_myonnetty'=> $row['myonnetty_aika']
				));

			return $hevonen;
		}

		return null;
	}

	public static function findByPrize($db, $arvonimi_id, $rotu_id) {
		$query =  $db->prepare('SELECT h.id as id, h.h_nimi, h.rotu_id, r.r_nimi, r.r_lyhenne, h.sukupuoli, h.url, h.omistaja_id, o.email, o.o_nimi, an.id as arvonimi_id, an.arvonimi, an.lyhenne, anh.myonnetty_aika FROM vpv_hevoset as h LEFT JOIN vpv_arvonimet_hevoset as anh ON h.id = anh.hevonen_id LEFT JOIN  vpv_arvonimet as an ON anh.arvonimi_id=an.id  LEFT JOIN vpv_omistajat as o ON h.omistaja_id = o.id LEFT JOIN vpv_rodut as r ON h.rotu_id = r.id WHERE arvonimi_id = :arvonimi_id AND h.rotu_id = :rotu_id');
		$query->execute(array('arvonimi_id' => $arvonimi_id, 'rotu_id' => $rotu_id));
		$rows = $query->fetchAll();

		$hevoset = array();
		foreach ($rows as $row) {
			$hevoset[] = new Hevonen(array(
				'id'=> $row['id'],
				'nimi'=> $row['h_nimi'],
				'rotu_id'=> $row['rotu_id'],
				'rotu'=> $row['r_nimi'],
				'rotulyhenne'=> $row['r_lyhenne'],
				'sukupuoli'=> $row['sukupuoli'],
				'url'=> $row['url'],
				'omistaja_id'=> $row['omistaja_id'],
				'omistaja_email'=> $row['email'],
				'omistaja_nimi'=> $row['o_nimi'],
				'arvonimi'=> $row['arvonimi'],
				'arvonimi_lyhenne'=> $row['lyhenne'],
				'arvonimi_myonnetty'=> $row['myonnetty_aika']
				));
		}
		return $hevoset;
	}

	public static function findByInfo($db, $nimi, $rotu, $sukupuoli){
		$query =  $db->prepare('SELECT h.id as id, h.h_nimi, h.rotu_id, r.r_nimi, r.r_lyhenne, h.sukupuoli, h.url, h.omistaja_id, o.email, o.o_nimi, an.arvonimi, an.lyhenne, anh.myonnetty_aika FROM vpv_hevoset as h LEFT JOIN vpv_arvonimet_hevoset as anh ON h.id = anh.hevonen_id LEFT JOIN  vpv_arvonimet as an ON anh.arvonimi_id=an.id  LEFT JOIN vpv_omistajat as o ON h.omistaja_id = o.id LEFT JOIN vpv_rodut as r ON h.rotu_id = r.id WHERE h.h_nimi=:nimi AND h.rotu_id =:rotu AND h.sukupuoli=:sukupuoli LIMIT 1');
		$query->execute(array(
				'nimi' => $nimi, 
				'rotu' => $rotu, 
				'sukupuoli' => $sukupuoli, 
			));
		$row = $query->fetch();
		if ($row) {
			$hevonen = new Hevonen(array(
				'id'=> $row['id'],
				'nimi'=> $row['h_nimi'],
				'rotu_id'=> $row['rotu_id'],
				'rotu'=> $row['r_nimi'],
				'rotulyhenne'=> $row['r_lyhenne'],
				'sukupuoli'=> $row['sukupuoli'],
				'url'=> $row['url'],
				'omistaja_id'=> $row['omistaja_id'],
				'omistaja_email'=> $row['email'],
				'omistaja_nimi'=> $row['o_nimi'],
				'arvonimi'=> $row['arvonimi'],
				'arvonimi_lyhenne'=> $row['lyhenne'],
				'arvonimi_myonnetty'=> $row['myonnetty_aika']
				));

			return $hevonen;
		}

		return null;
	}

	public function save($db) {
		$query = $db->prepare('INSERT INTO vpv_hevoset (h_nimi, rotu_id, sukupuoli, url, omistaja_id) VALUES (:nimi, :rotu, :sukupuoli, :url, :omistaja_id)');
		$query->execute(array(
			'nimi' => $this->nimi,
			'rotu' => $this->rotu,
			'sukupuoli' => $this->sukupuoli,
			'url' => $this->url,
			'omistaja_id' => $this->omistaja_id
			));
	}


}