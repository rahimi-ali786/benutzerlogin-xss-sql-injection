<?php
session_start();
include "db.php";

if(isset($_POST['insertBenuzter'])){
	
	$passwort=htmlspecialchars($_POST['password']);
	$sicherpasswort = password_hash($passwort, PASSWORD_DEFAULT);
	 
	  $bildpfad= "../bilder/";
			$bildtemp=$_FILES['bild']['tmp_name'];
			$bildname=$_FILES['bild']['name'];
   $bildExt=pathinfo($bildname,	PATHINFO_EXTENSION);
   $neueBildname = $_POST['username'] . "." . $bildExt; 

	$sql=$conn->prepare("INSERT INTO benutzer (benutzername, passwort, email, bildpfad) VALUES (?,?,?,?)");		
	$sql->bind_param("ssss", 
	htmlspecialchars($_POST['username']), 
	$sicherpasswort,
	htmlspecialchars($_POST['email']),
	htmlspecialchars($_POST['username'].'.'.$bildExt)
	);

	if($sql->execute()){
			move_uploaded_file($bildtemp,	$bildpfad . $neueBildname);
			 
		header("location:../login.php?register=1");
		exit();
	}
}


if(isset($_POST['einloggen'])){

	$sql=$conn->prepare("SELECT * FROM benutzer WHERE 
	benutzername=?");
	$sql->bind_param("s", htmlspecialchars($_POST['benutzer']));
	
	$sql->execute();
	$benutzer=$sql->get_result()->fetch_assoc();
	
	if($benutzer && password_verify($_POST['passwort'], $benutzer['passwort'])){
		
		if(!empty($_POST['remember'])){
			setcookie("benutzername", $benutzer['benutzername'], time()+3000);
		}
		$_SESSION['bname']=$benutzer['benutzername'];
		
		header("location:../dashboard.php");
		exit();
	} else {
		header("location:../login.php");
		exit();
	}
	
}
?>