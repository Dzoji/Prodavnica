<?php
$conn = new mysqli("localhost", "root", "", "prodavnica");

if (isset($_POST['korisnickoIme']) && isset($_POST['sifra'])) {
  $korisnicko_ime = $_POST['korisnickoIme'];
  $sifra = $_POST['sifra'];

  $query = "SELECT * FROM korisnici WHERE Korisnicko_Ime='$korisnicko_ime' AND Password='$sifra'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    setcookie("korisnicko_ime", $korisnicko_ime, time() + (86400 * 30), "/"); // 1 dan
    header("Location: artikli_list.php");
  } else {
    echo "<h2>Neispravno Korisnicko ime ili sifra</h2>";
  }
  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style-login.css">
  <title>LOG IN</title>
</head>
  <body>
    <div class="container">
        <h1 class="title">LOG IN</h1>
        <form action="login.php" method="post">
          <label for="korisnickoIme">Korisnicko ime:</label>
          <input type="text" id="korisnickoIme" name="korisnickoIme">
          <br>
          <label for="sifra">Lozinka:</label>
          <input type="password" id="sifra" name="sifra">
          <br>
          <input type="submit" class="submit-btn" value="Log In">
        </form>
    </div>
  </body>
</html>