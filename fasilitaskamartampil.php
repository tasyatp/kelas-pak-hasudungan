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

mysql_select_db($database_hotel, $hotel);
$query_fasilitaskamar = "SELECT * FROM fasilitas_kamar";
$fasilitaskamar = mysql_query($query_fasilitaskamar, $hotel) or die(mysql_error());
$row_fasilitaskamar = mysql_fetch_assoc($fasilitaskamar);
$totalRows_fasilitaskamar = mysql_num_rows($fasilitaskamar);
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
<table width="200" border="1" align="center">
  <tr>
    <td>Wifi</td>
    <td>Kamar_mandi</td>
    <td>Tv</td>
    <td>Kopi</td>
    <td>Ac</td>
    <td>Telepon</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_fasilitaskamar['Wifi']; ?></td>
      <td><?php echo $row_fasilitaskamar['Kamar_mandi']; ?></td>
      <td><?php echo $row_fasilitaskamar['Tv']; ?></td>
      <td><?php echo $row_fasilitaskamar['Kopi']; ?></td>
      <td><?php echo $row_fasilitaskamar['Ac']; ?></td>
      <td><?php echo $row_fasilitaskamar['Telepon']; ?></td>
    </tr>
    <?php } while ($row_fasilitaskamar = mysql_fetch_assoc($fasilitaskamar)); ?>
</table>
<p align="center"><a href="home.php">back</a></p>
</body>
</html>
<?php
mysql_free_result($fasilitaskamar);
?>
