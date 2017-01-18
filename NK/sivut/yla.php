<!DOCTYPE html>
<html lang="en">
<head>
  <title>VPV - PVNK</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../tyyli.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body id="ylos" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../index.php">VPV</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Etusivu</a></li>
        <li><a href="yleista.php">Yleistä</a></li>
        <li><a href="ano_arvonimi.php">Arvonimen anonta</a></li>
        <li><a href="palkitut.php">Palkitut</a></li>
    <?
    if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == true) {
    ?>
        <li><a href="anomusjono.php">Anomusjono</a></li>
      <?}?>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron text-center">
  <h1>PVNK</h1>
  <p>Puoliveristen Näyttelyiden Kermaa</p>
</div>

<div class="layout">

<!-- Container (About Section) -->
<div id="about" class="container-fluid">
  