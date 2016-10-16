<?
	require('sivut/yla.php');
?>

<h1>Palkitut hevoset</h1>

<h2>Virtuaalinen muotovalio + champion (VIR MVA Ch)</h2>

<?
	foreach ($vir_mva_palkitut as $palkittu) {
		echo($palkittu['sukupuoli'].' <a href="'.$palkittu['url'].'">'.$palkittu['nimi'].'</a><br />');
	}
?>

<h2>Champion (Ch)</h2>

<?
	foreach ($ch_palkitut as $palkittu) {
		echo($palkittu['sukupuoli'].' <a href="'.$palkittu['url'].'">'.$palkittu['nimi'].'</a><br />');
	}
?>

<?php
require('sivut/ala.php');
?>