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






if(isset($_SESSION['zalogowany']))
{
$koszyk = "Koszyk(0)";
$konto="Wyloguj się";
@$variable = $_GET['variable'];  
$konto="Moje konto";

$user = $_SESSION['zalogowany'];
}

$sql = $polaczenie ->query("SELECT * FROM `shop_order` WHERE  klient='$user' ORDER BY order_nr ASC");
$wynik = $sql->fetch_assoc();
$numerek1=$wynik['order_nr'];
	

$sql2 = $polaczenie ->query("SELECT * FROM `shop_order` WHERE  klient='$user' ");




}

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
	<li><a href="account.php"><?php echo $konto;?></a></li>
		</ul>
		</div>
		</nav>
		</div>	<!-- NavBar -->
	</div> <!-- row2 -->
<div class="row">
	
<div class="col-md-12">
       <div class="typewriter">
       </br>
        <h2 class="title_glow">KOSZYK</h2>
         </br>
      </div>
      </div>
</div>



			<div class="row box" style="text-align: center:"  align="center"> <!-- Row3 promocje -->
			<div class="col-md-12  black" >
				

</br></br></br></br>
<table class="table-bordered" id="tabela" style="color:black;" align="center">
<tr>
<th>Zamówienie</th>
<th>&nbspProdukt&nbsp</th>
<th>&nbspIlość&nbsp</th>
<th>&nbspCena&nbsp</th>
<th>STATUS&nbsp</th>

</tr>
<?php
$first_table=0;
$statusik=0;
$suma=0;
 while($wiersz = $sql2->fetch_assoc())
      {
    
     $wiersz['id'];

$numerek = $wiersz['order_nr'];

$statusik = $wiersz['status'];

//echo $numerek;
//echo "</br>";
//echo $numerek1;



if($first_table==1)
{
if($numerek1==$numerek)
$wiersz['order_nr']  = " ";
}
if($numerek1!=$numerek)
{

echo<<<END
<td>  	
<option selected >$wiersz[status]</option>

</td>
 <tr>
 <td colspan="5" style="background-color:black;color:white;"colspan="3">$suma zł</td>
 <td colspan="5">&nbsp </td>
 </tr>
<tr>
 <td colspan="5">&nbsp </td>
</tr>


END;
$suma=0;
$numerek1 = $numerek;
}

echo<<<END

<tr>
<td  style="background-color:white;width:10px;">&nbsp $wiersz[order_nr] </td>
<td  style="background-color:yellow;">&nbsp $wiersz[name] </td>
<td  style="background-color:yellow;">&nbsp$wiersz[amount] </td>
<td  style="background-color:yellow;">&nbsp$wiersz[price] zł &nbsp</td>

END;
 $suma= $suma + $wiersz['price'];
$first_table=1;
}			

if($suma==0)
$hidemydiv = "none";


?>
<td>	
<option selected ><?php echo $statusik;?></option>
</td>
<tr>

<td colspan="5" style="background-color:black;color:white;"colspan="3"><?php echo  $suma; ?> zł </td>
</tr>
</table>	
</br></br>

<button id="pay" type="submit" name="koszyk_btn" value="del_all" class="btn-danger" onclick="window.location.href='account.php'" style='font-size:24px;display: <?php echo $hidemydiv ?>';">Zamknij</button>
</br></br>

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

