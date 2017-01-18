<?
require('yla.php');
	$anomukset = AnomusKasittelija::haeKasittelemattomat($db);
?>

<div class="text-center">
	<p>
		Jonossa tällä hetkellä <strong><?= count($anomukset)?></strong> anomusta. 
	</p>
	<p>
		<a href="http://www.virtuaalihevoset.net/?kilpailut-ja-valmennukset/naeyttelykalenteri/bis-haku.html" target="_blank">BIS-lista</a> - <a href="http://virtuaali.zafiro.ws/bis/" target="_blank">vanha BIS-lista</a>
	</p>
</div>
<?
foreach ($anomukset as $anomus){
	$sisalto = json_decode($anomus->sisalto, true);
	$arvonimi_id = $sisalto['arvonimi'];
	$rotu_id = $sisalto['rotu'];

	$arvonimi = ArvonimiKasittelija::findOne($db, $arvonimi_id);
	$rotu = RotuKasittelija::findOne($db, $rotu_id);
	?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<b>#<?=$anomus->id?></b> - <small>anottu <?=muotoile_paivamaara_ja_kellonaika($anomus->anottu_aika)?></small></div>
			<div class="panel-body">

				<p>
					<b>Anottu arvonimi:</b> <?= $arvonimi->nimi ?> (<?=$arvonimi->lyhenne?>)<br />
					<b>Anoja:</b> <a href="mailto:<?=$sisalto['email']?>"><?=$sisalto['nimi']?></a><br />
					<b>Hevonen:</b> <a href="<?=$sisalto['hevonen_url']?>"><?=$sisalto['hevonen_nimi']?></a> (<?=$rotu->nimi?> <?=$sisalto['sukupuoli']?>)
				</p>

				<p>
					<?
					if($sisalto['lisatiedot'] != ""){
						?>
						<b>Lisätietoja:</b><br />
						<?=$sisalto['lisatiedot']?>
						<?}?>
					</p>

					<div class="row">
						<div class="col-sm-2">
							<form action="kasittele_anomus.php" method="post">
								<input type="hidden" name="id" value="<?=$anomus->id?>">
								<input type="hidden" name="tila" value="hyvaksytty">
								<input type="hidden" name="sisalto" value="<?=htmlspecialchars($anomus->sisalto)?>">
								<input type="submit" class="btn btn-success btn-block" value="Hyväksy">
							</form> 
						</div>
						<div class="col-sm-2">
							<form action="kasittele_anomus.php" method="post" id="hylkaa">
								<input type="hidden" name="id" value="<?=$anomus->id?>">
								<input type="hidden" name="email" value="<?=$sisalto['email']?>">
								<input type="hidden" name="tila" value="hylatty">
								<input type="submit" class="btn btn-danger btn-block" value="Hylkää">							

								<label for="hylkayssyy">Hylkäyssyy:</label>
								<input type="text" name="hylkayssyy" rows="2" id="hylkayssyy"></textarea>
							</form> 
						</div>

					</div>

				</div>
			</div>
			<?
		}
		?>


		<?
		require('ala.php');
		?>