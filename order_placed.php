<!DOCTYPE HTML5>
<html>
<head>
<meta charset="utf-8"/>
<title>Sklep internetowy</title>
 <meta name="description" content="Procesory, pamięci, karty graficzne - jednym sowem wszystko czego twój komputer potrzebuje!">

<script type="text/javascript"  src="js/jquery.min.js"></script>
<script type="text/javascript"  src="js/prototype.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link href="css/bootstrap.min.css"  rel="stylesheet">
<link href="css/styl.css"  rel="stylesheet">



<?php
session_start();

require_once "connect.php";

if(!isset($_SESSION['zalogowany']))
{
unset($_SESSION['zalogowany']);
header('Location: index.php');
exit();

}

$zamowienie = $_SESSION['number'];

?>










<body onload="load();">
</br></br>
<div class="container text-center">
	<div class="row" id="logo" text-center> <!-- Row1 -->
	<p class="shine" id="napis">~ HARDWARE MADNESS ~ </p>
	</div>  <!-- row1 -->
	<div class="row" id="navbar"> <!-- Row2 -->
		<div ><!-- Navbar -->
		<nav class="navbar navbar-inverse" >
		<div class="container-fluid">
		<div class="navbar-header">
		<div class="navbar-brand active" ></div>
		</div>
		<ul class="nav navbar-nav" >
		<li><a href="index.php">Strona główna</a></li>
		<li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</li>
		<li><a href="procesory.php">Procesory</a></li>
		<li><a href="pamieci.php">Pamięci</a></li>
		<li><a href="dyski.php">Dyski twarde</a></li>
		<li><a href="monitory.php">Monitory</a></li>
		<li><a href="karty.php">Karty graficzne</a></li>
		<li id="account"> &nbsp</li>
		<li><a href="#"  id="basket">Koszyk(0)</a></li>
		<li><a href="account.php">Moje konto</a></li>
		</ul>
		</div>
		</nav>
		</div>	<!-- NavBar -->
	</div> <!-- row2 -->
<div class="row">
	
<div class="col-md-12">
       <div class="typewriter">
       </br>
      <h2 class="title_glow">PODSUMOWANIE</h2>
         </br>
      </div>
      </div>
</div>



			<div class="row box" > <!-- Row3 promocje -->
			<div class="col-md-12  black" >
					
					</br></br></br></br>	 </br>
					<h1 class="title_glow"> ZAMÓWIENIE NR <?php echo $zamowienie; ?> ZŁOŻONE POMYŚLNIE</h1>	
					</br>

				     <div class="typewriter">
       </br>

        <h2 >DZIĘKUJEMY...</h2>
         </br>
      </div>
					</br></br>
					<button class="btn-danger " ONCLICK="window.location.href='account.php'" >POWRÓT</button>
					</div>
				
			
			</div> <!-- row3 -->
			<div class="row box" > <!-- Row4 -->
			<div class="col-md-12 border black">
			<div style="height:43px;"></div>
			</br>
			</div>		
			</div> <!-- row4 -->
			<div class="row"> <!-- Row5 -->
			</br>
			<footer>Copyright by Marcin Krupiński</footer>
			</div> <!-- row5 -->
			</div> <!-- container -->
			</body>
			</html>

