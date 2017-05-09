<?php
include "login.php";
$PageTitle = "YogaFit Sign-Up";
include "header.php";
?>

<table width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td>
      <form action="yogafit-export.php" method="POST">
        <strong>Export</strong>
        <select name="a">
          <option value="allrec">All Records</option>
          <option value="unexprec">All Unexported Records</option>
          <option value="allemail">All Email Addresses</option>
          <option value="unexpemail">All Unexported Email Addresses</option>
        </select>
        <input type="submit" name="submit" value="Go">
      </form>
    </td>
    <td style="text-align: center;">
      <form action="yogafit-db.php" method="POST">
        <strong>Mark All As</strong>
        <select name="a">
          <option value="markexp">Exported</option>
          <option value="markunexp">Unexported</option>
        </select>
        <input type="submit" name="submit" value="Go">
      </form>
    </td>
    <td style="text-align: right;">
      <form action="yogafit-db.php" method="POST">
        <strong>Delete</strong>
        <select name="a">
          <option value="deleteall">All</option>
          <option value="deleteexp">Exported</option>
        </select>
        <input type="submit" name="submit" value="Go" onClick="return(confirm('Are you sure you want to delete these records?'));">
      </form>
    </td>
  </tr>
</table>

<br>

<table cellspacing="0">
  <tr style="background: #2C8C91; height: 20px; line-height: 20px;">
    <td width="20%" style="color: #EAEAEA; padding-left: 4px;"><strong>Name</strong></td>
    <td width="30%" style="color: #EAEAEA; padding-left: 4px;"><strong>E-mail</strong></td>
    <td width="35%" style="color: #EAEAEA; padding-left: 4px;"><strong>Full Information</strong></td>
    <td width="5%" style="color: #EAEAEA; padding: 0 5px; text-align: center;"><strong>Delete</strong></td>
    <td width="5%" style="color: #EAEAEA; padding: 0 5px; text-align: center;"><strong>Exported</strong></td>
  </tr>
<?php
$result = mysql_query("SELECT * FROM yogafit ORDER BY lastname ASC");

while ($row = mysql_fetch_array($result)) {
  $Message = $row['firstname'] . " " . $row['lastname'] . "<br>";
  if (!empty($row['businessname'])) $Message .= $row['businessname'] . "<br>";
  if (!empty($row['addresstype'])) $Message .= $row['addresstype'] . "<br>";
  if (!empty($row['address'])) $Message .= $row['address'] . "<br>";
  if (!empty($row['address2'])) $Message .= $row['address2'] . "<br>";
  if (!empty($row['city'])) $Message .= $row['city'];
  if (!empty($row['city']) && !empty($row['state'])) $Message .= ", ";
  if (!empty($row['state'])) $Message .= $row['state'];
  if (!empty($row['city']) || !empty($row['state']) && !empty($row['zip'])) $Message .= " ";
  if (!empty($row['zip'])) $Message .= $row['zip'];
  if (!empty($row['city']) || !empty($row['state']) || !empty($row['zip'])) $Message .= "<br>";
  $Message .= "<br>";
  if (!empty($row['phone'])) $Message .= $row['phone'] . "<br>";
  if (!empty($row['email'])) $Message .= $row['email'] . "<br>";
  $Message .= "<br>";
  if (!empty($row['numberstudents'])) $Message .= "Total number of YogaFit, Yoga and Pilates students: " . $row['numberstudents'] . "<br>";
  if (!empty($row['instructor'])) $Message .= "Active YogaFit, Yoga and/or Pilates instructor? " . $row['instructor'] . "<br>";
  if (!empty($row['hear'])) $Message .= "How did you hear about the YogaFit Gift Packs? " . $row['hear'] . "<br>";
?>
  <tr<?php echo $bg; ?>>
    <td style="padding: 0 15px 0 4px;"><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
    <td style="padding: 0 15px 0 4px;"><?php echo $row['email']; ?></td>
    <td style="padding: 0 15px 0 4px; display: block; height: 24px; line-height: 24px; overflow: hidden;"><a style="color: #455D7B;" title="<?php echo $Message; ?>"><em>Mouse over to see full information</em></a></td>
    <td style="text-align: center; height: 24px; line-height: 24px;">
      <a href="yogafit-db.php?a=delete&id=<?php echo $row['id']; ?>" onClick="return(confirm('Are you sure you want to delete this record?'));"><img src="images/delete.png" alt="Delete" title="Delete" style="vertical-align: middle;"></a>
    </td>
    <td style="text-align: center;">
      <a href="yogafit-db.php?a=exported&id=<?php echo $row['id']; ?>">
      <?php
      echo (empty($row['exported'])) ? "<img src=\"images/publish-n.png\" alt=\"N\" title=\"Not exported\" style=\"vertical-align: middle;\">" : "<img src=\"images/publish-y.png\" alt=\"Y\" title=\"Exported\" style=\"vertical-align: middle;\">";
      ?>
      </a>
    </td>
  </tr>
<?php
  $bg = ($bg == "") ? " style=\"background: #C3F6F8;\"" : "";
}
?>
</table>

<?php include "footer.php"; ?>