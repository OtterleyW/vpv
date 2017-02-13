<?
require('asetukset/kaynnista.php');		
require('asetukset/salasanasuojattu.php');

if(isset($_POST['sisalto'])){
	$sisalto = json_decode($_POST['sisalto'], true);

	if(OmistajaKasittelija::findByNameAndEmail($db, $sisalto['nimi'], $sisalto['email']) == null){
		$attributes = array(
			'nimi' => $sisalto['nimi'],
			'email' => $sisalto['email']
			);
		OmistajaKasittelija::tallennaOmistaja($db, $attributes);
	}
	

	$omistaja = OmistajaKasittelija::findByNameAndEmail($db, $sisalto['nimi'], $sisalto['email']);

	
	$omistaja_id = $omistaja->id;

	
		if(HevonenKasittelija::findByInformation($db, $sisalto['hevonen_nimi'], $sisalto['rotu'], $sisalto['sukupuoli']) == null){
			$attributes = array(
				'nimi' => $sisalto['hevonen_nimi'],
				'rotu' => $sisalto['rotu'],
				'sukupuoli' => $sisalto['sukupuoli'],
				'url' => $sisalto['hevonen_url'],
				'omistaja_id' => $omistaja_id
				);
			HevonenKasittelija::TallennaHevonen($db,$attributes);
		}
	
	$hevonen = HevonenKasittelija::findByInformation($db, $sisalto['hevonen_nimi'], $sisalto['rotu'], $sisalto['sukupuoli']);
	
	
	ArvonimiKasittelija::myonnaArvonimi($db, $hevonen->id, $sisalto['arvonimi']);

	$viesti = "Arvonimihakemus hevoselle ".$sisalto['hevonen_nimi']." on hyväksytty!". "\r\n" ."Ongelmatilanteissa ota yhteyttä Puoliveristen NK:n ylläpitoon.". "\r\n" . "\r\n" ."PVNK". "\r\n" ."puoliverink@gmail.com";

	$to      = $sisalto['email'];
	$subject = 'Puoliveristen NK anomus hyväksytty';
	$message = $viesti;
	$headers =	'From: puoliverink@gmail.com' . "\r\n" .
	'Reply-To: puoliverink@gmail.com' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();

	mail($to, $subject, $message, $headers);

} else {


	$hylkaysviesti = "Arvonimihakemus hevoselle ".$_POST['hevonen_nimi']." on hylätty syystä:"."\r\n".$_POST['hylkayssyy']. "\r\n" ."Ongelmatilanteissa ota yhteyttä Puoliveristen NK:n ylläpitoon.". "\r\n" . "\r\n" ."PVNK". "\r\n" ."puoliverink@gmail.com";

	$to      = $_POST['email'];
	$subject = 'Puoliveristen NK anomus hylätty';
	$message = $hylkaysviesti;
	$headers =	'From: puoliverink@gmail.com' . "\r\n" .
	'Reply-To: puoliverink@gmail.com' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();

	mail($to, $subject, $message, $headers);
}

AnomusKasittelija::kasitteleAnomus($db, $_POST['id'], $_POST['tila']);
header('Location: anomusjono.php'); 
#EOF