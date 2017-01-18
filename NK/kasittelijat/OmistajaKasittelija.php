<? class OmistajaKasittelija{


	public static function findAll($db) {
		$omistajat = Omistaja::all($db);
		return $omistajat;
	}

	public static function findOne($db, $id) {
		$omistaja = Omistaja::find($db, $id);
		return $omistaja;
	}

	public static function findByNameAndEmail($db, $nimi, $email) {
		$omistaja = Omistaja::findByInfo($db, $nimi, $email);
		return $omistaja;
	}

	public static function tallennaOmistaja($db, $attributes) {
		$omistaja = new Omistaja($attributes);
		$omistaja->save($db);
	}
}