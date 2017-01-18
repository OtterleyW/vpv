<? class RotuKasittelija{


	public static function findAll($db) {
		$rodut = Rotu::all($db);
		return $rodut;
	}

	public static function findOne($db, $id) {
		$rotu = Rotu::find($db, $id);
		return $rotu;
	}


	public static function tallennaRotu($db, $attributes) {
		$rotu = new Rotu($attributes);
		$rotu->save($db);

	}
}