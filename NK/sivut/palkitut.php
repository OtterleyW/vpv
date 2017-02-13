<?
require('sivut/yla.php');
?>

<h2>Palkitut hevoset</h2>


<ul class="pagination pagination-lg">
	<li><a href="palkitut.php?palkinto=virmvach">VIR MVA Ch -palkitut</a></li>
	<li><a href="palkitut.php?palkinto=ch">Champion -palkitut</a></li>
	<li><a href="palkitut.php?palkinto=muu">Palkitut ruunat ja varsat</a></li>
	<li><a href="palkitut.php?palkinto=muisto">Muistolista</a></li>
</ul>

<?
if(isset($_GET['palkinto'])){
	if($_GET['palkinto'] == "virmvach"){
		include('virmvach.php');
	}
	elseif($_GET['palkinto'] == "ch"){
		include('champion.php');
	}elseif($_GET['palkinto'] == "muu"){
		include('ruunatjavarsat.php');
	}elseif($_GET['palkinto'] == "muisto"){
		include('muistolista.php');
	}
}
?>

<?php
require('sivut/ala.php');
?>