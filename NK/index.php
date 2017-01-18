<?php
require('asetukset/kaynnista.php');
require('sivut/yla.php');

$anomus = ArvonimiKasittelija::viimeksiKasitelty($db);
$viimeksi_kasitelty = muotoile_paivamaara_ja_kellonaika($anomus->myonnetty_aika);
?>
 
  <div class="row">
    <div class="col-sm-7">
     <h2>Tervetuloa!</h2>

<p>Näyttelyiden Kermaa Puoliveriset -sivusto myöntää Virtuaalisen Näyttelyjaoksen (NJ) alaisia arvonimiä niitä ansainneille puoliverisille. Aikaisemmin Näyttelyiden Kermaa -sivusto kattoi kaikki 
rodut, mutta vuonna 2007 NK jaettiin eri alajaoksiin; kylmäverisiin, lämminverisiin, 
poneihin, suomen(pien)hevosiin sekä täysiverisiin puoliveristen lisäksi. 
PVNK jakaa VIR MVA, Ch, Ch-M, Ch-NV ja Ch-R -arvonimiä, kuten muutkin alajaokset.</p>

<p>Puoliveristen Näyttelyiden Kermaa siirtyi sen ylläpitämisen vuonna 2008 aloittaneelta Ceryltä Diamontelle vuoden 2011 syyskuussa, häneltä Tuirelle kesäkuussa 2013 ja Tuirelta Lauralle maaliskuussa 2014. Aikaisemmin jaosta on ylläpitänyt myös cirith ja Linnea, jotka ottivat PVNK:n kontoilleen Näyttelyiden Kermaa -sivuston jakautuessa osiin toukokuussa 2007. Vuoden 2017 alussa NK siirtyi toimimaan VPV sivuston yhteydessä.</p>

<p>Puoliveristen Näyttelyiden Kermaa -sivuston ylläpito pyrkii parhaansa mukaan takaamaan jatkuvan toimivuuden. 
Ylläpitoon saa parhaiten yhteyttä Puoliveristen Näyttelyiden Kermaa -sivuston sähköpostista, <b>puoliverink[at]gmail.com</b>. PVNK 
toimii <a href="http://romanssi.org/nj/">Virtuaalisen Näyttelyjaoksen</a> eli NJ:n alaisuudessa.</p>

          <p>Terveisin,<br />
          &nbsp;&nbsp;<a href="mailto:nk[at]sokerihiiri.net"><strong>Evelina K.</strong></a></p>
    </div>
    <div class="col-sm-1">
    </div>
    <div class="col-sm-4">
		<div class="well">
		<h3>Ajankohtaista</h3>
			<p>
				Jonoa tyhjennetty <?=$viimeksi_kasitelty?>
			</p>

			<p>
				<small>
					<b>18.01.2017</b> Uudet sivut viilausta vaille valmiit
				</small>
			</p>
		</div>

		<div class="well">
		<h3>Vieraile myös</h3>
		<ul>
			<li><a href="http://kulovalkea.net/nk_kv/">Kylmäveristen NK</a></li>
			<li><a href="http://kulovalkea.net/nk_lv/">Lämminveristen NK</a></li>
			<li><a href="http://joeles.net/pnk/">Ponien NK</a></li>
			<li><a href="http://www.hoppana.net/vsr/nk/">Suomenhevosten NK</a></li>
			<li><a href="http://satulapset.net/nk/">Täysveristen NK</a></li>
		</ul>
		</div>


    </div>
  </div>



          

<?php
require('sivut/ala.php');
?>