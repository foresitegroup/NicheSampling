<?php
include "../inc/dbconfig.php";

switch ($_REQUEST['a']) {
  case "delete":
    $query = "DELETE FROM yogafit WHERE id = '" . $_GET['id'] . "'";
    break;
  case "deleteall":
    $query = "TRUNCATE TABLE yogafit;";
    break;
  case "deleteexp":
    $query = "DELETE FROM yogafit WHERE exported = 'on'";
    break;
  case "exported":
    // Get the current export state and toggle it
    $result = mysql_query("SELECT * FROM yogafit WHERE id = '" . $_GET['id'] . "'");
    $row = mysql_fetch_array($result);
    $exported = (empty($row['exported'])) ? "on" : "";
    
    $query = "UPDATE yogafit SET exported = '" . $exported . "' WHERE id = '" . $_GET['id'] . "'";
    break;
  case "markexp":
    $query = "UPDATE yogafit SET exported = 'on'";
    break;
  case "markunexp":
    $query = "UPDATE yogafit SET exported = ''";
    break;
}

mysql_query($query);

mysql_close();

header( "Location: yogafit-index.php" );
?>