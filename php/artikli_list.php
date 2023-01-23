<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style-artikli_list.css">
  <title>Artikli_list</title>
</head>
<body>
  
  <?php

    $conn = new mysqli("localhost", "root", "", "prodavnica");

    if (!isset($_COOKIE["korisnicko_ime"])) {
      header("Location: login.php");
      exit;
    }

    $query = "SELECT * FROM artikli";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
      echo "<table>";
      echo "<tr>";
      echo "<th>ID</th>";
      echo "<th>Naziv</th>";
      echo "<th>Sifra</th>";
      echo "<th>Opis</th>";
      echo "<th>Cijena</th>";
      echo "<th>Kolicina</th>";
      echo "<th>Izmjeni</th>";
      echo "<th>Obrisi</th>";
      echo "</tr>";

      while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['ID_Artikla'] . "</td>";
          echo "<td>" . $row['Naziv'] . "</td>";
          echo "<td>" . $row['Sifra'] . "</td>";
          echo "<td>" . $row['Opis'] . "</td>";
          echo "<td>" . $row['Cijena'] . "</td>";
          echo "<td>" . $row['Kolicina'] . "</td>";
          echo "<td><button><a href='artikli_edit.php?id=" . $row['ID_Artikla'] . "'>Izmjeni</a></button></td>";
          echo "<td><button><a href='artikli_delete.php?id=" . $row['ID_Artikla'] . "'>Obrisi</a></button></td>";
          echo "</tr>";
        }
          echo "</table>";
      } else {
        echo "NEMA ARTIKALA ZA PRIKAZ!";
        $conn->close();
    }
    
    echo "<br><button class='add'><a href='artikli_add.php'>Dodaj novi artikal</a></button>";

  ?>

  <br><br>

  <form action="logout.php" method="post">
    <input type="submit" value="Log Out">
  </form>

</body>
</html>