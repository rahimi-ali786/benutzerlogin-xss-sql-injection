<?php
session_start();
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Registrierung</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h2>Registrierung</h2>
  <form action="config/funktionen.php" method="POST" enctype="multipart/form-data">
    <label>Benutzername:</label><br>
    <input type="text" name="username" required><br><br>

    <label>E-Mail:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Passwort:</label><br>
    <input type="password" name="password" required><br><br>

    <label>Bild:</label>
    <input type="file" name="bild" accept="image/*" required><br><br>
    <button type="submit" name="insertBenuzter">Registrieren</button>
  </form>
  <p>Schon registriert? <a href="login.html">Zum Login</a></p>
</body>
</html>
