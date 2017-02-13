<!DOCTYPE html>
<html lang="en">
<head>
  <title>VPV</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="tyyli.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#myPage">VPV</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#toiminta">Toiminta</a></li>
        <li><a href="#info">Infoa</a></li>
        <li><a href="#yhteystiedot">Yhteystiedot</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron text-center">
  <h1>VPV</h1>
  <p>Yhdistys virtuaalisille puoliverisille</p>
</div>

<div class="layout">

<!-- Container (About Section) -->
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-7">
      <h2>Mikä VPV?</h2><br>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div class="col-sm-1">
    </div>
    <div class="col-sm-4">
      <h3>Ajankohtaista</h3>
		<div class="well">
			<p>
				<b>00.00.0000</b> Laatuarvostelutilaisuus aukeaa<br />
				<b>00.00.0000</b> Laatuarvostelutilaisuus aukeaa<br />
				<b>00.00.0000</b> Laatuarvostelutilaisuus aukeaa<br />
			</p>
		</div>

    </div>
  </div>
</div>


<div id="toiminta" class="container-fluid text-center bg-grey">
  <h2>Toiminta</h2><br>
  <div class="row text-center">
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="picture.jpg" width="400" height="300">
        <h4>Laatuarvostelut</h4>
        <p>Laatuarvostelu, kasvattaja-arvostelu, varsa-arvostelu, oritesti</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="picture.jpg" width="400" height="300">
        <h4>Lajicupit</h4>
        <p>Cup-kilpailuita puoliverisille KRJ, ERJ, VVJ ja KERJ</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="picture.jpg" width="400" height="300">
        <h4>Puoliveristen NK</h4>
        <p>NJ:n alaisten arvonimien myöntäminen</p>
      </div>
    </div>
  </div><br>
  </div>


<div id="info" class="container-fluid text-center">
  <h2>Infoa</h2>
  <br>
  <div class="row">
    <div class="col-sm-3">
      <img src="icon.png" class="icon" />
      <h4>Puoliveristen jalostussääntöjä</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
    <div class="col-sm-3">
      <img src="icon.png" class="icon" />     
      <h4>Puoliveristen nimeämisohjeita</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
    <div class="col-sm-3">
      <img src="icon.png" class="icon" />
      <h4>Kasvattajalistaus</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
    <div class="col-sm-3">
	<img src="icon.png" class="icon" />
      <h4>Orikatalogi</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
  </div>
</div>
 

<div id="yhteystiedot" class="container-fluid bg-grey">
  <h2 class="text-center">Yhteystiedot</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Ylläpitäjät</p>
      <ul>
      	<li>Eepu, VRL-000000</li>
      	<li>Helo, VRL-000000</li>
      	<li>Joe, VRL-000000</li>
      	<li>Otterley, VRL-000000</li>
      </ul>
    </div>
    <div class="col-sm-7">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Nimi" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Viesti" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Ota yhteyttä</button>
        </div>
      </div>
    </div>
  </div>
</div>

</div>

<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>VPV 2016</p>
</footer>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>

</body>
</html>

