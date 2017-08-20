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
<link href="css/styl.css?2323"  rel="stylesheet">



<?php
session_start();

require_once "connect.php";

if(isset($_SESSION['zalogowany']))
{

$polaczenie = new mysqli($host, $db_user , $db_password, $db_name);


if(isset($_POST['del_btn']))
{
$value = $_POST['del_btn'];

$sql = $polaczenie->query("DELETE FROM shop_order WHERE id=$value");
$polaczenie->query($sql);
}





if(isset($_SESSION['zalogowany']))
{
$koszyk = "Koszyk(0)";
$konto="Wyloguj się";
@$variable = $_GET['variable'];  

$user = $_SESSION['zalogowany'];
$sql = $polaczenie ->query("SELECT * FROM `shop_order` WHERE  klient='$user'");
$basket = $sql->num_rows;	
$koszyk = "Koszyk(".$basket.")";


$polaczenie = new mysqli($host, $db_user , $db_password, $db_name);
$sql = $polaczenie->query("SELECT * FROM shop_order ORDER BY order_nr DESC LIMIT 1");
$wynik = $sql->fetch_assoc();
$nr = $wynik['order_nr'];


$nr_zamowienia = $nr+1;
$_SESSION['number'] = $nr_zamowienia;
}




$user = $_SESSION['zalogowany'];
$sql = $polaczenie ->query("SELECT * FROM `shop_order` WHERE  klient='$user'");

$row = $sql->num_rows;		
if($row==0)
$info = "Brak zamówień";
else
$info = "Posiadasz ".$row." zamówienia";
if($row==1)
$info = "Posiadasz ".$row." zamówienie";
}
else
{
header('Location: index.php');
exit();
}


if(isset($_POST['koszyk_btn']))
{

$akcja= $_POST['koszyk_btn'];
if($akcja=="pay_all")
{
$brak = "Brak";
$status = "Oczekuje";
$sql = "UPDATE shop_order SET order_nr='$nr_zamowienia' where klient='$user' AND status='$brak'";
$polaczenie->query($sql);
$sql = "UPDATE shop_order SET status='$status' where klient='$user'";
$polaczenie->query($sql);



	header('Location: order_placed.php');
	exit();


}
else if ($akcja=="del_all") 
{
	header('Location: koszyk.php');
	exit();
}



}



$sql2 = $polaczenie ->query("SELECT * FROM `shop_order` WHERE  klient='$user' AND status='Brak'");



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
		<li id="account" class="hidden-md hidden-sm"> &nbsp</li>
		<li><a href="koszyk.php"  id="basket"><?php echo $koszyk;?></a></li>
		<li><a href="login.php"><?php echo $konto;?></a></li>
		</ul>
		</div>
		</nav>
		</div>	<!-- NavBar -->
	</div> <!-- row2 -->
<div class="row">
	
<div class="col-md-12">
       <div class="typewriter">
       </br>
        <h2 class="title_glow">ZAMÓWIENIE NR <?php echo $nr_zamowienia;?></h2>
         </br>
      </div>
      </div>
</div>



			<div class="row box" style="text-align: center:"  align="center"> <!-- Row3 promocje -->
			<div class="col-md-12  black" >
				

</br></br></br></br>
<table class="table-bordered" id="tabela" style="color:black;" align="center">
<tr>
<th>&nbspProdukt&nbsp</th>
<th>&nbspIlość&nbsp</th>
<th>&nbspCena&nbsp</th>
</tr>
<?php
$suma=0;
 while($wiersz = $sql2->fetch_assoc())
      {
     $suma= $suma + $wiersz['price'];
      	$wiersz['id'];
echo<<<END
<form method="post">
<tr>
<td style="background-color:yellow;">&nbsp $wiersz[name] </td>
<td style="background-color:yellow;">&nbsp$wiersz[amount] </td>
<td style="background-color:yellow;">&nbsp$wiersz[price] zł &nbsp</td>


</tr>
</form>			
END;
}			

if($suma==0)
$hidemydiv = "none";


?>
<td style="background-color:black;color:white;"colspan="3">Suma: <?php echo  $suma; ?> zł </td>
</table>	
</br></br>
<form method="post">

<button id="pay" type="submit" name="koszyk_btn" value="pay_all" class="btn-success"  style='font-size:24px;display: <?php echo $hidemydiv ?>';">Potwierdź</button>
</br></br>
<button id="pay" type="submit" name="koszyk_btn" value="del_all" class="btn-danger" style='font-size:24px;display: <?php echo $hidemydiv ?>';">Anuluj</button>
</form>
			</div> <!-- row3 -->
</div>

			<div class="row box" > <!-- Row4 -->
			<div class="col-md-12 border black">
		
		
			</div>		
			</div> <!-- row4 -->
			<div class="row"> <!-- Row5 -->
			</br>
			<footer>Copyright by Marcin Krupiński</footer>
			</div> <!-- row5 -->
			</div> <!-- container -->
			</body>
			</html>

