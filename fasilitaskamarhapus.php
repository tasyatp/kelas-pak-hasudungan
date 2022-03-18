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

if ((isset($_GET['Wifi'])) && ($_GET['Wifi'] != "")) {
  $deleteSQL = sprintf("DELETE FROM fasilitas_kamar WHERE Wifi=%s",
                       GetSQLValueString($_GET['Wifi'], "text"));

  mysql_select_db($database_hotel, $hotel);
  $Result1 = mysql_query($deleteSQL, $hotel) or die(mysql_error());

  $deleteGoTo = "fasilitaskamartampill.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$colname_fasilitaskamarhapus = "-1";
if (isset($_GET['Wifi'])) {
  $colname_fasilitaskamarhapus = $_GET['Wifi'];
}
mysql_select_db($database_hotel, $hotel);
$query_fasilitaskamarhapus = sprintf("SELECT * FROM fasilitas_kamar WHERE Wifi = %s", GetSQLValueString($colname_fasilitaskamarhapus, "text"));
$fasilitaskamarhapus = mysql_query($query_fasilitaskamarhapus, $hotel) or die(mysql_error());
$row_fasilitaskamarhapus = mysql_fetch_assoc($fasilitaskamarhapus);
$totalRows_fasilitaskamarhapus = mysql_num_rows($fasilitaskamarhapus);
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
<p align="center">&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align="center">&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($fasilitaskamarhapus);
?>
