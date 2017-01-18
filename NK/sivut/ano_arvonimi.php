<?
$valid = "";

$h_nimi_e = $h_url_e = $nimi_e = $email_e = $an_e = "";
$hevonen_nimi = $hevonen_url =  $nimi = $email = $arvonimi =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if (empty($_POST["hevonen_nimi"])) {
       $h_nimi_e = "Hevosen nimi on pakollinen";
     } else {
       $hevonen_nimi = test_input($_POST["hevonen_nimi"]);
     }

     if(empty($_POST['hevonen_url'])){
      $h_url_e = "Hevosen osoite on pakollinen!";
    } 
    else{
      $hevonen_url = test_input($_POST['hevonen_url']);
      if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$hevonen_url)) {
        $h_url_e = "Osoite on virheellinen!"; 
      }
    }

    if(empty($_POST['nimi'])){
      $nimi_e = "Omistajan nimi on pakollinen!";
    } 
    else{
      $nimi = test_input($_POST['nimi']);
    }
    if(empty($_POST['email'])){
      $email_e = "Omistajan email on pakollinen!";
    } 
    else{
      $email = test_input($_POST['email']);
    }
    if(empty($_POST['arvonimi'])){
      $an_e = "Anottava arvonimi on pakollinen!";
    } 
    else{
      $arvonimi = test_input($_POST['arvonimi']);
    }

    if(empty($h_nimi_e) && empty($h_url_e) && empty($nimi_e) && empty($email_e) && empty($an_e)){
      $valid = true;
    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if($valid){
  $sisalto = json_encode($_POST);

  $attributes = array(
    'arvonimi_id' => $_POST['arvonimi'],
    'sisalto'  => $sisalto,
    'tila' => "kasittelematta"
    );

  AnomusKasittelija::tallennaAnomus($db, $attributes);

  header('Location: lahetetty.php');    
  die();
}


require('sivut/yla.php');
?>
<h2>Arvonimen anonta</h2>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <div class="form-group">
    <label for="hevonen_nimi">Hevosen nimi:</label>
    <input type="text" class="form-control" id="hevonen_nimi" name="hevonen_nimi">
    <?php
      if(!empty($h_nimi_e)){echo '<div class="alert alert-danger">' . $h_nimi_e . '</div>';}
    ?>
  </div>
  <div class="form-group">
    <label for="hevonen_url">Hevosen osoite:</label>
    <input type="text" class="form-control" id="hevonen_url" name="hevonen_url">
    <?php
      if(!empty($h_url_e)){ echo '<div class="alert alert-danger">' . $h_url_e . '</div>';}
    ?>
  </div>
  <div class="form-group">
    <label for="sukupuoli">Hevosen sukupuoli:</label>
    <select class="form-control" id="sukupuoli" name="sukupuoli">
      <option>ori</option>
      <option>tamma</option>
      <option>ruuna</option>
    </select>
  </div>
  <div class="form-group">
    <label for="rotu">Hevosen rotu:</label>
    <select class="form-control" id="rotu" name="rotu">
      <?
      foreach ($rodut as $rotu ) {
      	?>
        <option value="<?=$rotu->id?>"><?=$rotu->nimi?> (<?=$rotu->lyhenne?>)</option>
        <?
      }
      ?>
      
    </select>
  </div>
  <!--
  <div class="form-group">
   <label for="hevonen_rotu_uusi">Hevosen rotu ja rotulyhenne (jos niitä ei löydy listalta):</label>
   <input type="text" class="form-control" id="hevonen_rotu_uusi" name="hevonen_rotu_uusi">
 </div>
-->
 <div class="form-group">
   <label for="nimi">Omistajan nimi:</label>
   <input type="text" class="form-control" id="nimi" name="nimi">
   <?php
     if(!empty($nimi_e)){ echo '<div class="alert alert-danger">' . $nimi_e . '</div>';}
  ?>
 </div>
 <div class="form-group">
   <label for="email">Omistajan sähköpostiosoite:</label>
   <input type="text" class="form-control" id="email" name="email">
   <?php
     if(!empty($email_e)){ echo '<div class="alert alert-danger">' . $email_e . '</div>';}
  ?>
 </div>

 
 <h3>Anottava arvonimi:</h3>
 <div class="radio">
   <?
   foreach ($arvonimet as $arvonimi ) {
     ?>
     <label class="radio-inline" for="arvonimi<?=$arvonimi->id?>">
       <input type="radio" value="<?=$arvonimi->id?>" id="arvonimi<?=$arvonimi->id?>" name="arvonimi">
       <?=$arvonimi->nimi?> (<?=$arvonimi->lyhenne?>)
     </label>
     <?
   }
   ?>
   <?php
     if(!empty($an_e)){ echo '<div class="alert alert-danger">' . $an_e . '</div>';}
  ?>
 </div>

 <div class="checkbox">
   <label>
    <input type="checkbox" value="true" id="on_aiempi_arvonimi" name="on_aiempi_arvonimi">Hevoselle on myönnetty aiempi arvonimi
  </label>
</div>

<div class="form-group">
 <label for="lisatiedot">Myönnetyt sertit:</label>
 <p class="small">Jos hevosesi arvonimeen tarvittavat SERTit/maininnat löytyvät BIS-listan haulla, niitä ei tarvitse erikseen listata arvonimihakemukseen. Jos niitä ei kuitenkaan löydy haulla, ilmoitathan ne hakemuksessa vapaavalintaisessa muodossa. Mainitsethan ainakin minkä SERTin hevosesi on saanut, milloin (päivämäärä) ja keneltä (päätuomari).</p>
 <textarea class="form-control" rows="5" id="lisatiedot" name="lisatiedot"></textarea>
</div>

<input type="submit" class="btn btn-primary btn-block" value="Lähetä anomus">



</form>

<?php
require('sivut/ala.php');
?>