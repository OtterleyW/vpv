<?php
require('../../.yhdista.php');
require('sivut/yla.php');


$stmt = $db->prepare('SELECT * FROM vpv_rodut ORDER BY nimi');
$stmt->execute();
$rodut = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $db->prepare('SELECT * FROM vpv_arvonimet');
$stmt->execute();
$arvonimet = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<h2>Arvonimen anonta</h2>
  
<div class="form-group">
  <label for="nimi">Omistajan nimi:</label>
  <input type="text" class="form-control" id="nimi">
</div>
<div class="form-group">
  <label for="email">Omistajan sähköpostiosoite:</label>
  <input type="text" class="form-control" id="email">
</div>
<div class="form-group">
  <label for="hevonen_nimi">Hevosen nimi:</label>
  <input type="text" class="form-control" id="hevonen_nimi">
</div>
<div class="form-group">
  <label for="hevonen_url">Hevosen osoite:</label>
  <input type="text" class="form-control" id="hevonen_url">
</div>
<div class="form-group">
    <label for="sel1">Hevosen sukupuoli:</label>
    <select class="form-control" id="sel1">
      <option>Ori</option>
      <option>Tamma</option>
      <option>Ruuna</option>
    </select>
 </div>
<div class="form-group">
    <label for="sel1">Hevosen rotu:</label>
    <select class="form-control" id="sel1">
      <?
      foreach ($rodut as $rotu ) {
      	echo('<option>'.$rotu['nimi'].' ('.$rotu['lyhenne'].')</option>');
      }
      ?>
      
    </select>
 </div>
 <div class="form-group">
   <label for="hevonen_url">Hevosen rotu ja rotulyhenne (jos niitä ei löydy listalta):</label>
   <input type="text" class="form-control" id="hevonen_url">
 </div>

 
  <h3>Anottava arvonimi:</h3>
   <form>
     <?
     foreach ($arvonimet as $arvonimi ) {
     	echo('<label class="radio-inline">
       <input type="radio" name="optradio">'.$arvonimi['nimi'].' ('.$arvonimi['lyhenne'].')</label>');
     }
     ?>
   </form> 

	<div class="checkbox">
	  <label><input type="checkbox" value="on_aiempi_arvonimi">Hevoselle on myönnetty aiempi arvonimi</label>
	</div>

	<div class="form-group">
	  <label for="comment">Myönnetyt sertit:</label>
	  <p class="small">Jos hevosesi arvonimeen tarvittavat SERTit/maininnat löytyvät BIS-listan haulla, niitä ei tarvitse erikseen listata arvonimihakemukseen. Jos niitä ei kuitenkaan löydy haulla, ilmoitathan ne hakemuksessa vapaavalintaisessa muodossa. Mainitsethan ainakin minkä SERTin hevosesi on saanut, milloin (päivämäärä) ja keneltä (päätuomari).</p>
	  <textarea class="form-control" rows="5" id="comment"></textarea>
	</div>

	<button type="button" class="btn btn-primary btn-block">Lähetä anomus</button>


<?php
require('sivut/ala.php');
?>