<?php
include ("config/db.php");
session_start();

if(!empty($_COOKIE['benutzername'])){
	$_SESSION['bname']=$_COOKIE['benutzername'];
}


if(empty($_SESSION['bname'])){
	header("location:login.php");
	exit();
}

	$sql=$conn->prepare("SELECT * FROM benutzer WHERE 
	benutzername=?");
	$sql->bind_param("s", $_SESSION['bname']);
  $sql->execute();
  $benutzer=$sql->get_result()->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h2>Willkommen, [<?php echo $_SESSION['bname'];?>] 🙋‍♂️</h2>
  <img src="bilder/<?=$benutzer['bildpfad'];?>" width="100" height="100">
  <p>Du bist eingeloggt.</p>
  <a href="login.php">Logout</a>
</body>
</html>
