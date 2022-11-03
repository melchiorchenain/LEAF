<?php
session_start();
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
      echo '<li><a href="logout.php">Déconnexion</a></li>';
    }
    ?>
  </ul>
  </nav>
</header>
<section>
 <h1 class="titre">Welcome to LEAF : Sign Up</h1> 
</section>
<form action="" method="post" id="inscription" enctype="multipart/form-data">
<input type="text" name="nom" placeholder="Last Name" class="ch" required="required"><br>
<input type="text" name="prenom" placeholder="Name" class="ch" required="required"><br>
<input type="email" name="email" placeholder="Email" class="ch" required="required"><br>
<input type="password" name="mp1" placeholder="Password" class="ch" required="required"><br>
<input type="password" name="mp2" placeholder="Confirm Password" class="ch" required="required"><br>
<input type="file" name="photo" class="ch">
<input type="submit" name="valider" value="Sign Up" class="ch">
<?php
include("con.php");

if(isset($_POST['valider']))
{
	$nom=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $email=$_POST['email'];
  $mp1=$_POST['mp1'];
  $mp2=$_POST['mp2'];

if($mp1==$mp2)
{
  $mp=sha1($mp1);
  $res=mysqli_query($cn,"insert into utilisateur values (NULL,'$nom','$prenom','$email','$mp')");  

$id=mysqli_insert_id($cn);
$photo="$id.jpg";

move_uploaded_file($_FILES['photo']['tmp_name'], "images/$photo");
echo 'Sign Up Succesful!!!';
}
else
  echo 'The passwords are not identical ';

}
?>



</form>
</div>
</body>

</html>