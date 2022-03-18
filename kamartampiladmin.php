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
$query_kamartampiladmin = "SELECT * FROM kamar";
$kamartampiladmin = mysql_query($query_kamartampiladmin, $hotel) or die(mysql_error());
$row_kamartampiladmin = mysql_fetch_assoc($kamartampiladmin);
$totalRows_kamartampiladmin = mysql_num_rows($kamartampiladmin);

$query_kamartampil = "SELECT * FROM kamar";
$kamartampil = mysql_query($query_kamartampil, $hotel) or die(mysql_error());
$row_kamartampil = mysql_fetch_assoc($kamartampil);
$totalRows_kamartampil = mysql_num_rows($kamartampil);
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
	background-image: url(img/download
%20(1).jpg);
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
<p align="center"><a href="kamartambah.php">Tambah data</a></p>
<table border="0" align="center" width="1159">
  <tr>
    <td width="256" height="22">nomor_kamar</td>
    <td width="197">lantai</td>
    <td width="193">harga</td>
    <td width="232">tipe_kamar</td>
    <td width="201">status</td>
    <td colspan="2"><div align="center">tools</div></td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_kamartampiladmin['nomor_kamar']; ?></td>
      <td><?php echo $row_kamartampiladmin['lantai']; ?></td>
      <td><?php echo $row_kamartampiladmin['harga']; ?></td>
      <td><?php echo $row_kamartampiladmin['tipe_kamar']; ?></td>
      <td><?php echo $row_kamartampiladmin['status']; ?></td>
      <td width="25"><a href="kamaredit.php?nomor_kamar=<?php echo $row_kamartampiladmin['nomor_kamar']; ?>"><img src="download-removebg-preview (1).png" width="25" height="21" /></a></td>
      <td width="28"><a href="kamarhapus.php?nomor_kamar=<?php echo $row_kamartampiladmin['nomor_kamar']; ?>"><img src="download-removebg-preview (2).png" width="28" height="29" /></a></td>
    </tr>
    <?php } while ($row_kamartampiladmin = mysql_fetch_assoc($kamartampiladmin)); ?>
</table>
<p>&nbsp;</p>
<p align="center"><a href="homeadmin.php"><img src="download-removebg-preview (3).png" width="32" height="36" /></a></p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($kamartampiladmin);

mysql_free_result($kamartampil);
?>
