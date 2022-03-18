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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO kamar (nomor_kamar, lantai, harga, tipe_kamar, status) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nomor_kamar'], "text"),
                       GetSQLValueString($_POST['lantai'], "text"),
                       GetSQLValueString($_POST['harga'], "text"),
                       GetSQLValueString($_POST['tipe_kamar'], "text"),
                       GetSQLValueString($_POST['status'], "text"));

  mysql_select_db($database_hotel, $hotel);
  $Result1 = mysql_query($insertSQL, $hotel) or die(mysql_error());

  $insertGoTo = "kamartampiladmin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_hotel, $hotel);
$query_kamartambah = "SELECT * FROM kamar";
$kamartambah = mysql_query($query_kamartambah, $hotel) or die(mysql_error());
$row_kamartambah = mysql_fetch_assoc($kamartambah);
$totalRows_kamartambah = mysql_num_rows($kamartambah);

$query_kamartambah = "SELECT * FROM kamar";
$kamartambah = mysql_query($query_kamartambah, $hotel) or die(mysql_error());
$row_kamartambah = mysql_fetch_assoc($kamartambah);
$totalRows_kamartambah = mysql_num_rows($kamartambah);
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
<form method="post" name="form1" id="form1">
</form>
<form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nomor_kamar:</td>
      <td><input type="text" name="nomor_kamar" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Lantai:</td>
      <td><input type="text" name="lantai" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Harga:</td>
      <td><input type="text" name="harga" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tipe_kamar:</td>
      <td><input type="text" name="tipe_kamar" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Status:</td>
      <td><input type="text" name="status" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form2" />
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align="center"><a href="home.php">back</a></p>
<p align="center">&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($kamartambah);
?>
