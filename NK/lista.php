<?php
require('../../.yhdista.php');
require('sivut/yla.php');

		$stmt = $db->prepare('SELECT * FROM vpv_hevoset');
		$stmt->execute();
		$hevoset = $stmt->fetchAll(PDO::FETCH_ASSOC);

		var_dump($hevoset);
?>
  



<?php
require('sivut/ala.php');
?>