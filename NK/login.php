<?
require('asetukset/kaynnista.php');
require('../../.salasanatarkistus.php');

if(!empty($_POST)){
	if(sallittu_kayttajatunnus_ja_salasana($_POST['username'], $_POST['password'])){
		$_SESSION['authenticated'] = true;

		header('Location: anomusjono.php');
		die();
	}
}
require('sivut/yla.php');
?>
<h1>Kirjaudu sisään</h1>

<form action="login.php" method="post">
	<input type="text" name="username" />
	<input type="password" name="password" />
<input type="submit" value="Kirjaudu sisään" />
</form>

<?
require('sivut/ala.php');
?>
