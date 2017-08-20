<!DOCTYPE HTML5>
<html>
<head>
<meta charset="utf-8"/>
<title>Sklep internetowy</title>
<meta name="description" content="Procesory, pamięci, karty graficzne - jednym sowem wszystko czego twój komputer potrzebuje!">
<script type="text/javascript"  src="js/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link href="css/bootstrap.min.css"  rel="stylesheet">
<link href="css/styl.css?6565"  rel="stylesheet">

<script>

var xposition=0;
var yposition=0;
var posx;
var posy;
var el=[];
function load() 
{

	el = document.getElementsByClassName("btn-primary");          // dodaje event listener do klasy przycisku "KUP"
	for (var i=0;i<el.length; i++) 
	{
	el[i].addEventListener("click",  function( event ) 
	{
	posx = event.pageX;
	posy = event.pageY;
	add();               
	});
	}
	}

	function add()          //dodaje +1 podczas kliknięcie na przycisk "KUP"
	{
	document.getElementById("adding").style.left = posx+40 + "px";
	document.getElementById("adding").style.top = posy-20 + "px";
	$("#adding").fadeIn(0);
	$("#adding").animate({top: posy-40, opacity: '1'}, "slow");
	setTimeout(fade, 500);
	}

	function fade()               
	{
	$("#adding").fadeOut(200);            //zanik informacji +1 o dodaniu do koszyka
	}
</script>

<?php
session_start();
$koszyk = "Basket";
$konto="Log in";

require_once "connect.php";
$polaczenie = new mysqli($host, $db_user , $db_password, $db_name);

if(isset($_GET['variable2'])) 
unset($_SESSION['szukaj']);

if(isset($_SESSION['zalogowany'])) 
{
$hidemydiv = "none";
$konto="My account";
$user = $_SESSION['zalogowany'];
}
else
{
$koszyk = "";
$konto="Zaloguj się";	
$disable ="none";
}
?>


	<body onload="load();">
	</br></br>
	<iframe name="myframe" style="display:none;">      <!-- ramka do przesyłu formularza z dodaniem do koszyka i blokowanie odświeżania strony -->
	<?php
	if(isset($_POST['item']))
	{
	if(isset($_SESSION['zalogowany'])) 
	{
	$number=$_POST['item'];
	$sql = $polaczenie->query("SELECT * FROM stock WHERE id='$number'");
	$row = $sql->fetch_assoc();
	$sql->close();
	$name = $row['name'];
	$amount = 1;
	$price = $row['price'];
	$status="brak";
	$user = $_SESSION['zalogowany'];
	$sql = "INSERT INTO shop_order (id,klient,name,price,amount,status) VALUES (NULL,'$user','$name','$price','$amount','$status')";
	$polaczenie->query($sql);
	}
	}

	?>
	</iframe>

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
			<li><a href="index.php?variable2=all">DISCOUNTS</a></li>
		<li><a href="procesory.php">Processors </a></li>
		<li><a href="pamieci.php">Memory</a></li>
		<li><a href="dyski.php">Hard drives</a></li>
		<li><a href="monitory.php">Monitors</a></li>
		<li><a href="karty.php">Graphic cards</a></li>
		<input style="margin-top: 8px;width:100px;color:black;"  name="search" placeholder="Search"></input>
		<button style="margin-top: 8px;" class="btn-sm btn-primary type="submit">Search</button>
		<li><a href="koszyk.php"  id="basket">Basket</a></li>
		<li><a href="account.php"><?php echo $konto;?></a></li>
	
		</ul>
		</form>
		</div>
		</nav>
		</div>	<!-- NavBar -->		
	</div> <!-- row2 -->
<div class="row">
	
<div class="col-md-12">
						<div class="typewriter">
						<h2 class="title_glow">PROCESORY</h2>
						</br>
						</div>
						</div>
</div>

<form method="post" target="myframe">
<div class="row" style="background-color: white;"> <!-- Row3 promocje -->
<?php


if(isset($_SESSION['szukaj']))
{
$search = $_SESSION['szukaj'];
$sql_promocje = $polaczenie->query("SELECT * FROM stock WHERE name LIKE '%$search%'");
}
else if(isset($_POST['search']))
{	
$search = $_POST['search'];
$_SESSION['szukaj']=$search ;
$sql_promocje = $polaczenie->query("SELECT * FROM stock WHERE name LIKE '%$search%'");
unset($_SESSION['szukaj']);
}
else
$sql_promocje = $polaczenie->query("SELECT * FROM stock WHERE category='Procesory'");

while($row = $sql_promocje->fetch_assoc())
{
	$name = $row['name'];
	$id = $row['id'];
	$price = $row['price'];

echo<<<END
			
			<div class="col-md-4 border black">
			<h1 style="color:white;" class="title_glow">$name</h1> </br>
			<img class="zoom" src="img/$id.png">
			</br>
			Cena:	$price zł <button name="item" type="submit" class="btn-primary" id="$id" value="$id" >Kup</button>
			</br>	</br>
			</form>
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
			<div style="font-size:26px; position:absolute; color:blue; display:none;" id="adding" >+1</div>
			</br>
			</body>
			</html>

