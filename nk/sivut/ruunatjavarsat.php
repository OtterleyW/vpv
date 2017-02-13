<? $an = ArvonimiKasittelija::findOne($db, "3")?>

<h2>Palkitut ruunat ja varsat</h2>

<p>Listalta löytyy kaikki arvonimen ansainneet puoliverivarsat ja -ruunat listattuna.</p>

<h3> <?=$an->nimi?> (<?=$an->lyhenne?>)</h3>
<?
foreach ($rodut as $rotu) {
	$arvonimi_id = $an->id;
	$rotu_id = $rotu->id;
	$hevoset = HevonenKasittelija::haeRodunPalkitutHevoset($db, $arvonimi_id, $rotu_id);
	if($hevoset != null){
		?>


		<h4><?=$rotu->nimi?></h4>

		<?
		foreach ($hevoset as $hevonen) {
			if($hevonen->rotu_id==$rotu->id && $hevonen->arvonimi==$an->nimi){
				?>
				<?=$hevonen->sukupuoli?> <a href="<?=$hevonen->url?>"><?=$hevonen->nimi?></a>, om. <a href="mailto:<?=$hevonen->omistaja_email?>"><?=$hevonen->omistaja_nimi?></a>, myönnetty <?=muotoile_paivamaara($hevonen->arvonimi_myonnetty)?><br />

				<?
			}
		}
	}
}

$an = ArvonimiKasittelija::findOne($db, "4")?>

<h3> <?=$an->nimi?> (<?=$an->lyhenne?>)</h3>
<?
foreach ($rodut as $rotu) {
	$arvonimi_id = $an->id;
	$rotu_id = $rotu->id;
	$hevoset = HevonenKasittelija::haeRodunPalkitutHevoset($db, $arvonimi_id, $rotu_id);
	if($hevoset != null){
		?>


		<h4><?=$rotu->nimi?></h4>

		<?
		foreach ($hevoset as $hevonen) {
			if($hevonen->rotu_id==$rotu->id && $hevonen->arvonimi==$an->nimi){
				?>
				<?=$hevonen->sukupuoli?> <a href="<?=$hevonen->url?>"><?=$hevonen->nimi?></a>, om. <a href="mailto:<?=$hevonen->omistaja_email?>"><?=$hevonen->omistaja_nimi?></a>, myönnetty <?=muotoile_paivamaara($hevonen->arvonimi_myonnetty)?><br />

				<?
			}
		}
	}
}

 $an = ArvonimiKasittelija::findOne($db, "5")?>

<h3> <?=$an->nimi?> (<?=$an->lyhenne?>)</h3>
<?
foreach ($rodut as $rotu) {
	$arvonimi_id = $an->id;
	$rotu_id = $rotu->id;
	$hevoset = HevonenKasittelija::haeRodunPalkitutHevoset($db, $arvonimi_id, $rotu_id);
	if($hevoset != null){
		?>


		<h4><?=$rotu->nimi?></h4>

		<?
		foreach ($hevoset as $hevonen) {
			if($hevonen->rotu_id==$rotu->id && $hevonen->arvonimi==$an->nimi){
				?>
				<?=$hevonen->sukupuoli?> <a href="<?=$hevonen->url?>"><?=$hevonen->nimi?></a>, om. <a href="mailto:<?=$hevonen->omistaja_email?>"><?=$hevonen->omistaja_nimi?></a>, myönnetty <?=muotoile_paivamaara($hevonen->arvonimi_myonnetty)?><br />

				<?
			}
		}
	}
}