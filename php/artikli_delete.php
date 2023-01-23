<?php

$conn = new mysqli("localhost", "root", "", "prodavnica");

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $query = "DELETE FROM artikli WHERE ID_Artikla='$id'";
  $result = mysqli_query($conn, $query);

  if ($result) {
    header("Location: artikli_list.php");
  } else {
    echo "Greška: Artikal nije obrisan iz baze";
  }
  $conn->close();
}

?>