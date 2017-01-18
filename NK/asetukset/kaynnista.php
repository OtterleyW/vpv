<?
require('../../.yhdista.php');

// MALLIT
require('mallit/PohjaMalli.php');
require('mallit/Hevonen.php');
require('mallit/Anomus.php');
require('mallit/Rotu.php');
require('mallit/Arvonimi.php');
require('mallit/Omistaja.php');

//KÄSITTELIJÄT
require('kasittelijat/HevonenKasittelija.php');
require('kasittelijat/AnomusKasittelija.php');
require('kasittelijat/RotuKasittelija.php');
require('kasittelijat/ArvonimiKasittelija.php');
require('kasittelijat/OmistajaKasittelija.php');

$rodut = RotuKasittelija::findAll($db);
$arvonimet = ArvonimiKasittelija::findAll($db);

function muotoile_paivamaara_ja_kellonaika($paivamaara_merkkijono){
	try {
		$date = new DateTime($paivamaara_merkkijono);
	} catch (Exception $e) {
		return $e->getMessage();
	}

	return $date->format('d.m.Y G:i:s');
}

function muotoile_paivamaara($paivamaara_merkkijono){
	try {
		$date = new DateTime($paivamaara_merkkijono);
	} catch (Exception $e) {
		return $e->getMessage();
	}

	return $date->format('d.m.Y');
}

session_start();