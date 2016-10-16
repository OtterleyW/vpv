<? 
class Hevonen extends PohjaMalli {

	public $id, $nimi, $rotu_id, $sukupuoli, $url, $omistaja_id;

	public function __construct($attributes) {
		parent::__construct($attributes);
	}

}