<? class ArvonimiKasittelija{


	public static function findAll($db) {
		$arvonimet = Arvonimi::all($db);
		return $arvonimet;
	}

	public static function findOne($db, $id) {
		$arvonimi = Arvonimi::find($db, $id);
		return $arvonimi;
	}

	public static function viimeksiKasitelty($db) {
		$arvonimi = Arvonimi::findLatest($db);
		return $arvonimi;
	}


	public static function tallennaArvonimi($db, $attributes) {
		$arvonimi = new Arvonimi($attributes);
		$arvonimi->save($db);

	}

	public static function myonnaArvonimi($db, $hevonen_id, $arvonimi_id) {
		$arvonimi = Arvonimi::find($db, $arvonimi_id);
		$arvonimi->annaArvonimi($db, $hevonen_id, $arvonimi_id);

	}


}