<? class AnomusKasittelija{

    public static function findAll($db) {
        $anomukset = Anomus::all($db);
        return $anomukset;
    }
    public static function findOne($db, $id) {
        $anomus = Anomus::find($db, $id);
        return $anomus;
    }

    public static function haeKasittelemattomat($db) {
        $anomukset = Anomus::haeKasittelemattomat($db);
        return $anomukset;
    }

    public static function tallennaAnomus($db, $attributes) {
        $anomus = new Anomus($attributes);
        $anomus->save($db);

    }

    public static function kasitteleAnomus($db, $id, $tila){
        $attributes = array(
            'id' => $id,
            'tila' => $tila
            );
        $anomus = new Anomus($attributes);
        $anomus->update($db);

    }

}