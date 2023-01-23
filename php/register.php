<?php
$conn = new mysqli("localhost", "root", "", "prodavnica");

if (isset($_POST['korisnicko_ime']) && isset($_POST['sifra'])) {
  $korisnicko_ime = $_POST['korisnicko_ime'];
  $sifra = $_POST['sifra'];

  $query = "INSERT INTO korisnici (Korisnicko_Ime, Password) VALUES ('$korisnicko_ime', '$sifra')";
  $result = mysqli_query($conn, $query);

  if ($result) {
    setcookie("korisnicko_ime", $korisnicko_ime, time() + (86400 * 30), "/"); // 1 dan
    header("Location: artikli_list.php");
  } else {
    echo "<h2>Došlo je do greške pri registraciji</h2>";
  }
  $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>REGISTER</title>
  <link rel="stylesheet" href="css/style-register.css">
</head>
<body>
  <div class="container">
    <h1 class="title">REGISTER</h1>
    <form action="register.php" method="post">
        <label for="korisnicko_ime">Korisničko ime:</label><br>
        <input type="text" id="korisnicko_ime" name="korisnicko_ime" required><br>
        <label for="sifra">Lozinka:</label><br>
        <input type="password" id="sifra" name="sifra" required><br><br>
        <input type="submit" value="Registruj se">
    </form>
  </div>
</body>
</html>