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
$info = " ";
require_once "connect.php";

if(isset($_SESSION['zalogowany']))
{
unset($_SESSION['zalogowany']);
header('Location: index.php');
exit();

}



$polaczenie = new mysqli($host, $db_user , $db_password, $db_name);

if(isset($_POST['login']))
{

$login = $_POST['login'];
$pass = $_POST['pass'];


$sql=$polaczenie->query("SELECT id FROM shop_customer WHERE login='$login' AND pass='$pass'");
$wynik = $sql->num_rows;

if($wynik==0)
$info = "Błędne dane logowania";
else
{
$sql=$polaczenie->query("SELECT id FROM shop_customer WHERE login='$login' AND pass='$pass'");
$row= $sql->fetch_assoc();	

if(($login=="admin")&&($pass=="root"))
{
	header('Location: admin.php');
	exit();
}

$_SESSION['zalogowany']=$row['id'];
header('Location: account.php');
exit();
}	


}
unset($_POST['login']);




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


		</ul>
		</div>
		</nav>
		</div>	<!-- NavBar -->
	</div> <!-- row2 -->
<div class="row">
	
<div class="col-md-12">
       <div class="typewriter">
       </br>
        <h2 class="title_glow">LOGOWANIE</h2>
         </br>
      </div>
      </div>
</div>



			<div class="row box" > <!-- Row3 promocje -->
			<div class="col-md-12  black" >
					<form method="post">
					</br></br></br></br>	 </br></br></br></br>
					<input class="btn-success"type="text" name="login" placeholder="Login">
					</br></br>
					<input class="btn-success"type="password" name="pass" placeholder="Hasło">
					</br></br></br>
					<button class="btn-primary" type="submit" class="form-control" name="msg">ZALOGUJ</button>
					</div>
					</form>
					<spam style="color:red;">&nbsp<?php echo " ".$info;?></spam>	
			</div> <!-- row3 -->
			<div class="row box" > <!-- Row4 -->
			<div class="col-md-12 border black">
			<div style="height:243px;"></div>
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

