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
  $updateSQL = sprintf("UPDATE kamar SET lantai=%s, harga=%s, tipe_kamar=%s, status=%s WHERE nomor_kamar=%s",
                       GetSQLValueString($_POST['lantai'], "text"),
                       GetSQLValueString($_POST['harga'], "text"),
                       GetSQLValueString($_POST['tipe_kamar'], "text"),
                       GetSQLValueString($_POST['status'], "text"),
                       GetSQLValueString($_POST['nomor_kamar'], "text"));

  mysql_select_db($database_hotel, $hotel);
  $Result1 = mysql_query($updateSQL, $hotel) or die(mysql_error());

  $updateGoTo = "kamartampiladmin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_kamaredit = "-1";
if (isset($_GET['nomor_kamar'])) {
  $colname_kamaredit = $_GET['nomor_kamar'];
}
mysql_select_db($database_hotel, $hotel);
$query_kamaredit = sprintf("SELECT * FROM kamar WHERE nomor_kamar = %s", GetSQLValueString($colname_kamaredit, "text"));
$kamaredit = mysql_query($query_kamaredit, $hotel) or die(mysql_error());
$row_kamaredit = mysql_fetch_assoc($kamaredit);
$totalRows_kamaredit = mysql_num_rows($kamaredit);

$colname_kamaredit = "-1";
if (isset($_GET['nomor_kamar'])) {
  $colname_kamaredit = $_GET['nomor_kamar'];
}
mysql_select_db($database_hotel, $hotel);
$query_kamaredit = sprintf("SELECT * FROM kamar WHERE nomor_kamar = %s", GetSQLValueString($colname_kamaredit, "text"));
$kamaredit = mysql_query($query_kamaredit, $hotel) or die(mysql_error());
$row_kamaredit = mysql_fetch_assoc($kamaredit);
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
	background-image: url(img/images
%20(1).jpg);
	font-family: Tahoma, Geneva, sans-serif;
	background-color: #036;
	background-image: url(img/images
%20(1).jpg);
	background-image: url(img/download
%20(1).jpg);
	background-image: url(img/room-wallpaper-1366x768-laptop-229080.jpg);
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
<p align="center"><strong>KAMAR YANG TERSEDIA</strong></p>
<p align="center">&nbsp;</p>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nomor_kamar:</td>
      <td><?php echo $row_kamaredit['nomor_kamar']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Lantai:</td>
      <td><input type="text" name="lantai" value="<?php echo htmlentities($row_kamaredit['lantai'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Harga:</td>
      <td><input type="text" name="harga" value="<?php echo htmlentities($row_kamaredit['harga'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tipe_kamar:</td>
      <td><input type="text" name="tipe_kamar" value="<?php echo htmlentities($row_kamaredit['tipe_kamar'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Status:</td>
      <td><input type="text" name="status" value="<?php echo htmlentities($row_kamaredit['status'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="nomor_kamar" value="<?php echo $row_kamaredit['nomor_kamar']; ?>" />
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($kamaredit);
?>
