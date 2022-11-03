<?php
session_start();
if(isset($_SESSION['login']) and isset($_SESSION['mp']))
{
  include("con.php");
?>
<html>
<head>
	<title></title>
 <meta charset="utf-8">
	<link rel="stylesheet" href="leaf.css">
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
      echo '<li><a href="logout.php">Logout</a></li>';
    }
    ?>
  </ul>
  </nav>
</header>
<section>
 <h1 class="titre">Welcome to LEAF</h1> 
</section>
<section id="sect1">
<?php
function changedate($dt)

{
$tab = explode("-",$dt);
$nd = $tab[2]."-".$tab[1]."-".$tab[0];
return $nd;
}

$res=mysqli_query($cn,"select * from utilisateur,message where utilisateur.id_user=message.id_user order by id_message DESC"); 
while($data=mysqli_fetch_assoc($res))
{
  echo '<div id="div1">
  <img src="images/'.$data['id_user'].'.jpg" class="photo" width="30px" height="30px">';
  echo $data['nom_user'];
  echo '<br>'.$data['prenom_user'].'</div>';
   echo '<div id="div2">Posté le : '.changedate($data['date_message']);
  echo ' à '.$data['heure_message'];
  echo '<br>'.$data['texte_message'].'</div>';
}

?>

<form action="" method="post">
<textarea name="message"  placeholder="Your message" id="zmessage"></textarea>
<input type="submit" name="envoyer" value="Post" class="btn2">
</form>
<?php
if(isset($_POST['envoyer']))
{

  $id=$_SESSION['id_user'];
  $msg=$_POST['message'];
  $date=date('Y-m-d');
  $heure=date('H:i');
  $req1=mysqli_query($cn,"insert into message values (NULL,'$msg','$date','$heure','$id')"); 
header("location:forum.php");
}

?>

</section>



</body>
</html>
<?php
}
else
header("location:index.php");
?>
