<?php class HevonenKasittelija {
	public static function findAll($db) {
	      $hevoset = Hevonen::all($db);
	      return $hevoset;
	  }

	 public static function findOne($db, $id) {
	 	$hevonen = Hevonen::find($db, $id);
	 	return $hevonen;
	 }

	 public static function findByInformation($db, $nimi, $rotu, $sukupuoli) {
	 	$hevonen = Hevonen::findByInfo($db, $nimi, $rotu, $sukupuoli);
	 	return $hevonen;
	 }


	 public static function haeRodunPalkitutHevoset($db, $arvonimi_id, $rotu_id){
	      $hevoset = Hevonen::findByPrize($db, $arvonimi_id, $rotu_id);
	      return $hevoset;
	 }

	 public static function tallennaHevonen($db, $attributes) {
	 	$hevonen = new Hevonen($attributes);
	 	$hevonen->save($db);

	 }
}
#EOF