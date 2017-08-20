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
<link href="css/styl.css?6565"  rel="stylesheet">

<?php
session_start();
require_once "connect.php";
$polaczenie = new mysqli($host, $db_user , $db_password, $db_name);


if(isset($_POST['nazwa']))
{

$nazwa =$_POST['nazwa'];
$cena =$_POST['cena'];
$ilosc =10;
$kategoria =$_POST['kategoria'];
$promocja =$_POST['promocja'];




$sql = "INSERT INTO stock (id,category,name,amount,price,promocja) VALUES (NULL, '$kategoria', '$nazwa', '$ilosc', '$cena','$promocja')";
$polaczenie->query($sql);
}
?>

	<body>
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
				<li><a href="index.php?variable2=all">PROMOCJE</a></li>
				<li><a href="procesory.php">Procesory</a></li>
				<li><a href="pamieci.php">Pamięci</a></li>
				<li><a href="dyski.php">Dyski twarde</a></li>
				<li><a href="monitory.php">Monitory</a></li>
				<li><a href="karty.php">Karty graficzne</a></li>
	

			
			
				</ul>
				</form>
				</div>
				</nav>
				</div>	<!-- NavBar -->
		</div> <!-- row2 -->





<div class="row">	
	<div class="col-md-12">
       <div class="typewriter">
       </br>
        <h2 class="title_glow">PANEL ADMINISTRATORA</h2>
         </br>
      </div>
      </div>
	</div>
	

<div class="row box" style="background-color: white;text-align:center;" > <!-- Row3 promocje -->
<div class="col-md-12" style="color:black;text-align:center;" >

</br></br>
<button class="btn-primary btn-lg" type="submit" onclick="window.location.href='all_orders.php'">Obecne zamówienia</button>
</br></br>
<button class="btn-primary btn-lg" type="submit" onclick="window.location.href='add.php'">Dodaj produkt</button>
</br></br>
<button class="btn-primary btn-lg" type="submit" onclick="window.location.href='edit.php'">Edytyuj produkt</button>
</br></br></br></br>
<button class="btn-danger btn-lg " type="submit" onclick="window.location.href='index.php'">Wyloguj</button>
</br></br>





</div>  <!-- md 12 -->


		</div> <!-- row3 -->

				



				<div class="row"> <!-- Row5 -->
			</br>
					<footer>Copyright by Marcin Krupiński</footer>

				</div> <!-- row5 -->

</div> <!-- container -->
</body>
</html>

