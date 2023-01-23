<?php

$conn = new mysqli("localhost", "root", "", "prodavnica");

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $query = "SELECT * FROM artikli WHERE ID_Artikla='$id'";
  $result = mysqli_query($conn, $query);
  $artikal = mysqli_fetch_assoc($result);
}

if (isset($_POST['naziv']) && isset($_POST['sifra']) && isset($_POST['opis']) && isset($_POST['cijena']) && isset($_POST['kolicina'])) {
  $naziv = $_POST['naziv'];
  $sifra = $_POST['sifra'];
  $opis = $_POST['opis'];
  $cijena = $_POST['cijena'];
  $kolicina = $_POST['kolicina'];

  $query = "UPDATE artikli SET Naziv='$naziv', Sifra='$sifra', Opis='$opis', Cijena='$cijena', Kolicina='$kolicina' WHERE ID_Artikla='$id'";
  $result = mysqli_query($conn, $query);

  if ($result) {
    header("Location: artikli_list.php");
  } else {
    echo "Došlo je do greške pri ažuriranju artikla";
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
  <link rel="stylesheet" href="css/style-artikli_edit.css">
  <title>Artikli_edit</title>
</head>
<body>
  <h1>Izmjena artikla</h1>
  <form action="artikli_edit.php?id=<?php echo $id; ?>" method="post">
    <label for="naziv">Naziv:</label><br>
    <input type="text" id="naziv" name="naziv" value="<?php echo $artikal['Naziv']; ?>"><br>
    <label for="sifra">Sifra:</label><br>
    <input type="text" id="sifra" name="sifra" value="<?php echo $artikal['Sifra']; ?>"><br>
    <label for="opis">Opis:</label><br>
    <textarea id="opis" name="opis"><?php echo $artikal['Opis']; ?></textarea><br>
    <label for="cijena">Cijena:</label><br>
    <input type="number" id="cijena" name="cijena" value="<?php echo $artikal['Cijena']; ?>"><br>
    <label for="kolicina">Kolicina:</label><br>
    <input type="number" id="kolicina" name="kolicina" value="<?php echo $artikal['Kolicina']; ?>"><br><br>
    <input type="submit" value="Ažuriraj artikal">
  </form>
</body>
</html>