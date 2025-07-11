<?php
session_start();
if(isset($_GET['register'])){
	echo "<h1> Register elfolgreich!</h1>";
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h2>Login</h2>
  <form action="config/funktionen.php" method="POST">
	<label>Benutzer Name:</label><br>
    <input type="text" name="benutzer" required><br><br>

    <label>Passwort:</label><br>
    <input type="password" name="passwort" required><br><br>

    <label>
      <input type="checkbox" name="remember" value="1"> Angemeldet bleiben
    </label><br><br>

    <button type="submit" name="einloggen" >Einloggen</button>
  </form>
  <p>Noch kein Konto? <a href="register.php">Jetzt registrieren</a></p>
</body>
</html>
