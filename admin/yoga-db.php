<?php
include "../inc/dbconfig.php";

switch ($_REQUEST['a']) {
  case "delete":
    $query = "DELETE FROM yoga WHERE id = '" . $_GET['id'] . "'";
    break;
  case "deleteall":
    $query = "TRUNCATE TABLE yoga;";
    break;
  case "deleteexp":
    $query = "DELETE FROM yoga WHERE exported = 'on'";
    break;
  case "exported":
    // Get the current export state and toggle it
    $result = $mysqli->query("SELECT * FROM yoga WHERE id = '" . $_GET['id'] . "'");
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $exported = (empty($row['exported'])) ? "on" : "";
    
    $query = "UPDATE yoga SET exported = '" . $exported . "' WHERE id = '" . $_GET['id'] . "'";
    break;
  case "markexp":
    $query = "UPDATE yoga SET exported = 'on'";
    break;
  case "markunexp":
    $query = "UPDATE yoga SET exported = ''";
    break;
}

$mysqli->query($query);

$mysqli->close();

header( "Location: yoga-index.php" );
?>