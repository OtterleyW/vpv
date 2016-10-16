<?php
require('asetukset/kaynnista.php');

		$stmt = $db->prepare('SELECT * FROM vpv_rodut ORDER BY nimi');
		$stmt->execute();
		$rodut = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$stmt = $db->prepare('SELECT * FROM vpv_hevoset, vpv_arvonimet_hevoset WHERE vpv_hevoset.id = vpv_arvonimet_hevoset.hevonen_id AND vpv_arvonimet_hevoset.arvonimi_id = 1');
		$stmt->execute();
		$vir_mva_palkitut = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$stmt = $db->prepare('SELECT * FROM vpv_hevoset, vpv_arvonimet_hevoset WHERE vpv_hevoset.id = vpv_arvonimet_hevoset.hevonen_id AND vpv_arvonimet_hevoset.arvonimi_id = 2');
		$stmt->execute();
		$ch_palkitut = $stmt->fetchAll(PDO::FETCH_ASSOC);

require('sivut/palkitut.php');

var_dump($vir_mva_palkitut);  
