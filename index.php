<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="leaf.css">
</head>
<body>
<header>
	<nav>
	<ul>
		<li><a href="index.php">Login</a></li>
		<li><a href="inscription.php">Sign Up</a></li>
		<?php
		if(isset($_SESSION['nom']))
		{
			echo '<li><a href="logout.php">Déconnexion</a></li>';
		}
		?>
	</ul>
	</nav>
</header>
<section>
 <h1 class="titre">Welcome to LEAF : Login</h1> 
</section>
<section>

<form action="" method="post" id="flogin">
<input type="text" name="email" placeholder="Your Email" class="ch"><br>
<input type="password" name="pw" placeholder="Password" class="ch"><br>
<input type="submit" name="valider" value="Login" class="ch">

<?php
include("con.php");

if(isset($_POST['valider']))
{
	$email=$_POST['email'];
	$mp=sha1($_POST['pw']);
$res=mysqli_query($cn,"select * from utilisateur where email_user='$email'
 and pw_user='$mp'");	
$nbr=mysqli_num_rows($res);
if($nbr==0)
echo '<br><br>Incorrect email or password  ';
else
{
	$data=mysqli_fetch_assoc($res);
	$_SESSION['id_user']=$data['id_user'];
	$_SESSION['nom']=$data['nom_user'];
	$_SESSION['prenom']=$data['prenom_user'];
	$_SESSION['login']=$data['email_user'];
	$_SESSION['mp']=$data['pw_user'];
	header("location:forum.php");
} }
?>
</form>
</section>
</body>
</html>