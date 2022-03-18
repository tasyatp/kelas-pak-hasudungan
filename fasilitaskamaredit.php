<?php require_once('Connections/hotel.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE fasilitas_kamar SET Kamar_mandi=%s, Tv=%s, Kopi=%s, Ac=%s, Telepon=%s WHERE Wifi=%s",
                       GetSQLValueString($_POST['Kamar_mandi'], "text"),
                       GetSQLValueString($_POST['Tv'], "text"),
                       GetSQLValueString($_POST['Kopi'], "text"),
                       GetSQLValueString($_POST['Ac'], "text"),
                       GetSQLValueString($_POST['Telepon'], "text"),
                       GetSQLValueString($_POST['Wifi'], "text"));

  mysql_select_db($database_hotel, $hotel);
  $Result1 = mysql_query($updateSQL, $hotel) or die(mysql_error());

  $updateGoTo = "fasilitaskamartampill.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_fasilitaskamaredit = "-1";
if (isset($_GET['Wifi'])) {
  $colname_fasilitaskamaredit = $_GET['Wifi'];
}
mysql_select_db($database_hotel, $hotel);
$query_fasilitaskamaredit = sprintf("SELECT * FROM fasilitas_kamar WHERE Wifi = %s", GetSQLValueString($colname_fasilitaskamaredit, "text"));
$fasilitaskamaredit = mysql_query($query_fasilitaskamaredit, $hotel) or die(mysql_error());
$row_fasilitaskamaredit = mysql_fetch_assoc($fasilitaskamaredit);
$totalRows_fasilitaskamaredit = mysql_num_rows($fasilitaskamaredit);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
body {
	background-image: url(img/images
%20(2).jpg);
	background-repeat: no-repeat;
	background-image: url(img/download
%20(1).jpg);
	font-family: Tahoma, Geneva, sans-serif;
	background-color: #036;
	background-image: url(img/room-background-1366x768-laptop-228718.jpg);
}
.Y {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 24px;
}
.U {
	font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
}
body,td,th {
	color: #FFFFFF;
}
.T {
	font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
	font-size: 16px;
	color: #FFF;
}
.Y p {
	color: #FFF;
}
</style>
</head>

<body>
<p align="center"><strong>FASILITAS KAMAR YANG TERSEDIA</strong></p>
<p>&nbsp;</p>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Wifi:</td>
      <td><?php echo $row_fasilitaskamaredit['Wifi']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Kamar_mandi:</td>
      <td><input type="text" name="Kamar_mandi" value="<?php echo htmlentities($row_fasilitaskamaredit['Kamar_mandi'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tv:</td>
      <td><input type="text" name="Tv" value="<?php echo htmlentities($row_fasilitaskamaredit['Tv'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Kopi:</td>
      <td><input type="text" name="Kopi" value="<?php echo htmlentities($row_fasilitaskamaredit['Kopi'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Ac:</td>
      <td><input type="text" name="Ac" value="<?php echo htmlentities($row_fasilitaskamaredit['Ac'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Telepon:</td>
      <td><input type="text" name="Telepon" value="<?php echo htmlentities($row_fasilitaskamaredit['Telepon'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="Wifi" value="<?php echo $row_fasilitaskamaredit['Wifi']; ?>" />
</form>
<p>&nbsp;</p>
<p align="center">&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($fasilitaskamaredit);
?>
