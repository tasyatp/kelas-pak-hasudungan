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
$query_fasilitaskamartampill = "SELECT * FROM fasilitas_kamar";
$fasilitaskamartampill = mysql_query($query_fasilitaskamartampill, $hotel) or die(mysql_error());
$row_fasilitaskamartampill = mysql_fetch_assoc($fasilitaskamartampill);
$totalRows_fasilitaskamartampill = mysql_num_rows($fasilitaskamartampill);
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
	background-color: #96C;
	background-image: url();
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
<p align="center"><a href="fasilitaskamartambah.php">Tambah data</a></p>
<table border="0" width="1100">
  <tr>
    <td height="21"><div align="center">Wifi</div></td>
    <td><div align="center">Kamar_mandi</div></td>
    <td><div align="center">Tv</div></td>
    <td><div align="center">Kopi</div></td>
    <td><div align="center">Ac</div></td>
    <td><div align="center">Telepon</div></td>
    <td colspan="2"><div align="center">Tools</div></td>
  </tr>
  <?php do { ?>
    <tr>
      <td><div align="center"><?php echo $row_fasilitaskamartampill['Wifi']; ?></div></td>
      <td><div align="center"><?php echo $row_fasilitaskamartampill['Kamar_mandi']; ?></div></td>
      <td><div align="center"><?php echo $row_fasilitaskamartampill['Tv']; ?></div></td>
      <td><div align="center"><?php echo $row_fasilitaskamartampill['Kopi']; ?></div></td>
      <td><div align="center"><?php echo $row_fasilitaskamartampill['Ac']; ?></div></td>
      <td><div align="center"><?php echo $row_fasilitaskamartampill['Telepon']; ?></div></td>
      <td><div align="center"><a href="fasilitaskamaredit.php?Wifi=<?php echo $row_fasilitaskamartampill['Wifi']; ?>"><img src="download-removebg-preview (1).png" width="24" height="28" /></a></div></td>
      <td><div align="center"><a href="fasilitaskamarhapus.php?Wifi=<?php echo $row_fasilitaskamartampill['Wifi']; ?>"><img src="download-removebg-preview (2).png" width="20" height="26" /></a></div></td>
    </tr>
    <?php } while ($row_fasilitaskamartampill = mysql_fetch_assoc($fasilitaskamartampill)); ?>
</table>
<p align="center"><a href="homeadmin.php">back</a></p>
</body>
</html>
<?php
mysql_free_result($fasilitaskamartampill);
?>
