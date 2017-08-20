<!DOCTYPE HTML5>
<html>
<head>
<meta charset="utf-8"/>
<title>Sklep internetowy</title>
 <meta name="description" content="Procesory, pamięci, karty graficzne - jednym sowem wszystko czego twój komputer potrzebuje!">

<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link href="css/bootstrap.min.css"  rel="stylesheet">
<link href="css/styl.css"  rel="stylesheet">



<?php
session_start();
require_once "connect.php";


$polaczenie = new mysqli($host, $db_user , $db_password, $db_name);
$polaczenie -> query ('SET NAMES utf8');
$polaczenie -> query ('SET CHARACTER_SET utf8_unicode_ci');

$sql = $polaczenie ->query("SELECT * FROM shop_order ORDER BY order_nr ASC LIMIT 1");
$wynik = $sql->fetch_assoc();
$numerek1=$wynik['order_nr'];
	
$sql2 = $polaczenie ->query("SELECT * FROM shop_order WHERE status='Send' OR status='Oczekuje'"); 
?>


<body>
<iframe name="myframe" src="iframe.php" style="display:none;">
<?php
	if(isset($_POST['update']))
	{

	$id=$_POST['update'];
	$status = $_POST['order'.$id];
	$sql = "UPDATE shop_order SET status='$status' WHERE order_nr='$id'";
	$polaczenie->query($sql);

}
?>
</iframe>

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
						<li><a style="color:#5998ff;" href="admin.php">POWRÓT</a></li>
				<li><a style="color:#5998ff;" href="index.php">WYLOGUJ</a></li>
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

@$wartosc= 0;
@$test=0;
@$test_status =0;
$first_table=0;
$statusik=0;
$suma=0;
 while($wiersz = $sql2->fetch_assoc())
      {
    
$id =  $wiersz['order_nr'];
$numerek = $wiersz['order_nr'];
$statusik = $wiersz['status'];


//echo $numerek;
//echo "</br>";
//echo $numerek1;

$nazwa = "order".$numerek;

if($first_table==1)
{
if($numerek1==$numerek)
$wiersz['order_nr']  = " ";
}
if($numerek1!=$numerek)
{

echo<<<END


<form method="post" target="myframe">
<td>
<select name="$test" style="background-color:green;">  
<option selected value="$statusik">$test_status</option>
<option value="Oczekuje">Oczekuje</option>
<option value="Send">Send</option>
</select>	
 <button type="submit"class="btn-primary" value="$wartosc" name="update">Zmień </button>
 </form>
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
@$wartosc= $numerek;
@$test= "order".$wartosc;
@$test_status = $statusik;

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
if($statusik==0)
$hidemydiv1 = "none";

?>


<form method="post" target="myframe">
<td style='display: <?php echo $hidemydiv ?>;"''>
<select name="<?php echo $test;?>" style="background-color:green;"">  	
<option selected value="<?php echo $statusik;?>"><?php echo $test_status;?></option>
<option value="Send">Send </option>
<option value="Oczekuje">Oczekuje </option>

 </select>	
 <button class="btn-primary" value= "<?php echo $numerek;?>"name="update">Zmień </button>
 </form>
</td>
<tr>

<td colspan="5" style="background-color:black;color:white;"colspan="3"><?php echo $suma; ?> zł </td>
</tr>
</table>	
</br></br>


<button  onclick="window.location.href='admin.php'" style="font-size:24px;display: <?php echo $hidemydiv1 ?>';">Zamknij</button>
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

