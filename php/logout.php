<?php

setcookie("korisnicko_ime", NULL, time() - (86400 * 30), "/"); // 1 dan

header("Location: index.php");

?>