<?php

$conn = new mysqli("localhost", "root", "", "prodavnica");

if (isset($_POST['naziv']) && isset($_POST['sifra']) && isset($_POST['opis']) && isset($_POST['cijena']) && isset($_POST['kolicina'])) {
  $naziv = $_POST['naziv'];
  $sifra = $_POST['sifra'];
  $opis = $_POST['opis'];
  $cijena = $_POST['cijena'];
  $kolicina = $_POST['kolicina'];


  $query = "INSERT INTO artikli (Naziv, Sifra, Opis, Cijena, Kolicina) VALUES ('$naziv', '$sifra', '$opis', '$cijena', '$kolicina')";
  $result = mysqli_query($conn, $query);

  if ($result) {
    header("Location: artikli_list.php");
  } else {
    echo "Greška: Artikal nije dodat u bazu";
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
  <link rel="stylesheet" href="css/style-artikli_add.css">
  <title>Artikli_add</title>
</head>

<body>
  <h1>Dodavanje novog artikla</h1>
  <form action="artikli_add.php" method="post">
    <label for="naziv">Naziv:</label><br>
    <input type="text" id="naziv" name="naziv" required><br>
    <label for="sifra">Sifra:</label><br>
    <input type="text" id="sifra" name="sifra" required><br>
    <label for="opis">Opis:</label><br>
    <textarea id="opis" name="opis"></textarea><br>
    <label for="cijena">Cijena:</label><br>
    <input type="number" id="cijena" name="cijena" required><br>
    <label for="kolicina">Kolicina:</label><br>
    <input type="number" id="kolicina" name="kolicina" required><br><br>
    <input type="submit" value="Dodaj artikal">
  </form>
</body>
</html>