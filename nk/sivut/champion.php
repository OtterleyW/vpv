<? $an = ArvonimiKasittelija::findOne($db, "2")?>

<h2> <?=$an->nimi?> (<?=$an->lyhenne?>)</h2>

<p>
	Listalta löytyy kaikki Champion-arvonimen ansainneet puoliveriset listattuna roduttain omissa rotukohtaisissa linkeissä. Jos rotua ei löydy listalta, yksikään rodun yksilö ei ole vielä ansainnut Ch-arvonimeä.
</p>

<?
foreach ($rodut as $rotu) {
	$arvonimi_id = $an->id;
	$rotu_id = $rotu->id;
	$hevoset = HevonenKasittelija::haeRodunPalkitutHevoset($db, $arvonimi_id, $rotu_id);
	if($hevoset != null){
		?>


		<h3><?=$rotu->nimi?></h3>

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