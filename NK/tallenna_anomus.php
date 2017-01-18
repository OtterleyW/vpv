<?
require('asetukset/kaynnista.php');		

$sisalto = json_encode($_POST);

$attributes = array(
    'arvonimi_id' => $_POST['arvonimi'],
    'sisalto'  => $sisalto,
    'tila' => "kasittelematta"
    );

AnomusKasittelija::tallennaAnomus($db, $attributes);

header('Location: lahetetty.php');    

#EOF