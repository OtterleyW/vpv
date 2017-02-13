<?
require('asetukset/kaynnista.php');		

print_r ($_POST);
$sisalto = json_encode($_POST);
echo($sisalto);
$arvonimi_id = json_decode($sisalto, true)['arvonimi'];

$attributes = array(
    'arvonimi_id' => $arvonimi_id,
    'sisalto'  => $sisalto,
    'tila' => "kasittelematta"
    );

AnomusKasittelija::tallennaAnomus($db, $attributes);

header('Location: lahetetty.php');    

#EOF