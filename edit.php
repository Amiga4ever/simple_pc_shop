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
$edit=array();
require_once "connect.php";
$polaczenie = new mysqli($host, $db_user , $db_password, $db_name);
	
	if(isset($_POST['btn']))
	{
	$id=$_POST['btn'];

	$name = $_POST['name'.$id];
	$name = $_POST['name'.$id];
	$amount = $_POST['amount'.$id];
	$price =$_POST['price'.$id];
	$promocja =$_POST['promocja'.$id];
	$category =$_POST['category'.$id];
	$sql = "UPDATE stock SET name='$name', amount='$amount', price='$price', promocja='$promocja', category='$category' WHERE id='$id'"; 
	$polaczenie->query($sql);
	}

?>

	<body>
		</br></br>
	<iframe name="myframe" style="display:none;">
	<?php
	if(isset($_POST['btn']))
	{
	$id=$_POST['btn'];

	$name = $_POST['name'.$id];
	$name = $_POST['name'.$id];
	$amount = $_POST['amount'.$id];
	$price =$_POST['price'.$id];
	$promocja =$_POST['promocja'.$id];
	$category =$_POST['category'.$id];
	$sql = "UPDATE stock SET name='$name', amount='$amount', price='$price', promocja='$promocja', category='$category' WHERE id='$id'"; 
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
        <h2 class="title_glow">EDYCJA POZYCJI</h2>
         </br>
      </div>
      </div>
	</div>
	
<form method="post" target="myframe">
<div class="row box" style="background-color: white;text-align:center;" > <!-- Row3 promocje -->

<?php

$sql = $polaczenie->query("SELECT * FROM stock");
while($row = $sql->fetch_assoc())
{
$id =$row['id'];
$kategoria =$row['category'];
$nazwa =$row['name'];
$amount =$row['amount'];
$cena =$row['price'];
$promocja =$row['promocja'];

if($promocja==1)
	$cena_promocyjna ="W promocji";
else
	$cena_promocyjna = "Bez promocji";

echo<<<END

<div class="col-sm-3 border black" style="color:black;text-align:center;" >


</br>
<select class="btn-info btn-md" name="category$id" style="color:black;">
<option  selected value="$kategoria" >$kategoria  </option>
<option value="Procesory"  >Procesory</option>
<option value="Karty graficzne" >Karty graficzne</option>
<option value="memory" >Pamięci</option>
<option value="Dyski twarde" >Dyski twarde</option>
<option value="Monitory" >Monitory</option>
</select>

</br>
<input style="width:150px;" value="$nazwa" name="name$id"></<input> 
</br>
<input style="width:50px; text-align:center;" name="amount$id" value="$amount"></<input>szt
</br>
<input style="width:50px;text-align:center" name="price$id" value="$cena "></<input>&nbsp&nbspzł
</br>

<select class="btn-info btn-md" name="promocja$id" value="1" style="color:black;" >	
<option selected value="$promocja"  >$cena_promocyjna</option>
<option value="1"  >Promocja</option>
<option  value="0"  >Bez promocji</option>
</select>
</br>
<button type="submit" value = "$id" name="btn" class="btn-success btn-xs" >Zatwierdź</button>
</br>
</form>
</br></br>
</div>  <!-- md 12 -->

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

