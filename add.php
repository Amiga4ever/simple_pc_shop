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
@$kategoria =$_POST['kategoria'];
@$promocja =$_POST['promocja'];




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
				<li><a style="color:#5998ff;" href="admin.php">POWRÓT</a></li>
				<li><a style="color:#5998ff;" href="index.php">WYLOGUJ</a></li>

			
			
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
</br>
<h2 class="title_glow">Dodaj produkt: </h2>
</br>
<form method="post">
<input type="text" class="btn-primary btn-lg" name="nazwa" placeholder="Nazwa" style="text-align:center;" > </br></br>
<input type="text" class="btn-primary btn-lg" name="cena" placeholder="Cena" style="text-align:center;" > </br></br>
<input type="text" class="btn-primary btn-lg" name="ilosc" placeholder="ilość" style="text-align:center;"> </br></br>

<select class="btn-success btn-lg" name="kategoria" style="color:black;">
<option  disabled selected>Wybierz kategorię </option>
<option value="Procesory"  >Procesory</option>
<option value="Karty graficzne" >Karty graficzne</option>
<option value="memory" >Pamięci</option>
<option value="Dyski twarde" >Dyski twarde</option>
<option value="Monitory" >Monitory</option>
</select>

</br>
</br>
<select class="btn-success btn-lg" name="promocja" style="color:black;" >
<option  disabled selected>Promocja? </option>
<option value="1"  >TAK</option>
<option value="0"  >NIE</option>
</select>
</br>
</br>
<button class="btn-danger btn-lg" type="submit">Dodaj</button> 																							   
</br>
</form>

</br>
</div>


		</div> <!-- row3 -->

				



				<div class="row"> <!-- Row5 -->
			</br>
					<footer>Copyright by Marcin Krupiński</footer>

				</div> <!-- row5 -->

</div> <!-- container -->
</body>
</html>

