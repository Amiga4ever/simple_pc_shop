﻿<!DOCTYPE HTML5>
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
$koszyk = "Koszyk";
$konto="Zaloguj się";

require_once "connect.php";
$polaczenie = new mysqli($host, $db_user , $db_password, $db_name);


if(isset($_SESSION['zalogowany']))  //wyświetla ile rzeczy w koszyku
{
$koszyk = "Koszyk(0)";
$konto="Wyloguj się";
@$variable = $_GET['variable'];  
echo $variable;
$user = $_SESSION['zalogowany'];
$sql = $polaczenie ->query("SELECT * FROM `shop_order` WHERE  klient='$user'");
$basket = $sql->num_rows;	
$koszyk = "Koszyk(".$basket.")";


if(isset($_GET['variable']))  //dodaje pozycje do listy zamowienia
{
$sql = $polaczenie->query("SELECT * FROM stock WHERE id='$variable'");
$row = $sql->fetch_assoc();
$name = $row['name'];
$amount = 1;
$price = $row['price'];
$sql->close();
$user = $_SESSION['zalogowany'];
$sql = "INSERT INTO shop_order (id,klient,name,price,amount) VALUES (NULL, '$user', '$name', '$price', '$amount')";
$polaczenie->query($sql);




$sql = $polaczenie ->query("SELECT * FROM `shop_order` WHERE  klient='$user'");   //aktualizuje ilosc pozycji w koszyku
$basket = $sql->num_rows;	
$koszyk = "Koszyk(".$basket.")";

unset($_GET['variable']);
unset($variable);
}
}
else
{
$koszyk = "";
$konto="Zaloguj się";	
}

/*$sql = $polaczenie->query("SELECT * FROM stock WHERE id='1'");
$amd = $sql->fetch_assoc();  
$amd_price =$amd['price'];  
$sql = $polaczenie->query("SELECT * FROM stock WHERE id='2'");
$intel = $sql->fetch_assoc();  
$intel_price =$intel['price'];  
$polaczenie->close();*/








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
		<form method="post">
		<ul class="nav navbar-nav" >
		<li><a href="index.php">PROMOCJE</a></li>
		<li><a href="procesory.php">Procesory</a></li>
		<li><a href="pamieci.php">Pamięci</a></li>
		<li><a href="dyski.php">Dyski twarde</a></li>
		<li><a href="monitory.php">Monitory</a></li>
		<li><a href="karty.php">Karty graficzne</a></li>
		<input style="margin-top: 8px;width:100px;color:black;"  name="search" placeholder="Szukaj"></input>
		<button style="margin-top: 8px;" class="btn-sm btn-primary type="submit">Szukaj</button>
		<li id="account" class="hidden-md hidden-sm"> &nbsp&nbsp&nbsp</li>
		<li><a href="koszyk.php"  id="basket"><?php echo $koszyk;?></a></li>
		<li><a href="login.php"><?php echo $konto;?></a></li>
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
        <h2 class="title_glow">CENY PROMOCYJNE</h2>
         </br>
      </div>
      </div>
</div>
<div class="row" style="background-color: white;"> <!-- Row3 promocje -->
<?php

if(isset($_POST['search']))
{
$search = $_POST['search'];
$sql_promocje = $polaczenie->query("SELECT * FROM stock WHERE name LIKE '%$search%'");
}
else
$sql_promocje = $polaczenie->query("SELECT * FROM stock WHERE promocja>=0");

while($row = $sql_promocje->fetch_assoc())
{

	$name = $row['name'];
	$id = $row['id'];
	$price = $row['price'];

echo<<<END
		
			<div class="col-md-4 border black">
			</br>
			<h1 style="color:white;" class="title_glow">$name</h1> </br>
			<img class="zoom" src="img/$id.png">
			</br>
			Cena:	$price zł <button method="post" name="item" type="submit"class="btn-primary" value="$id" onclick="window.location.href='index.php?variable=$id'">Kup
			</button>
			</div>		
				
		


END;
}
?>
		</div> <!-- row3 -->

				



				<div class="row"> <!-- Row5 -->
			</br>
					<footer>Copyright by Marcin Krupiński</footer>

				</div> <!-- row5 -->
</div> <!-- container -->
</body>
</html>

