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
$query_fasilitasumumtampil = "SELECT * FROM fasilitas_umum_hotel";
$fasilitasumumtampil = mysql_query($query_fasilitasumumtampil, $hotel) or die(mysql_error());
$row_fasilitasumumtampil = mysql_fetch_assoc($fasilitasumumtampil);
$totalRows_fasilitasumumtampil = mysql_num_rows($fasilitasumumtampil);
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
<p align="center"><strong>FASILITAS UMUM YANG TERSEDIA</strong></p>
<p align="center"><a href="fasilitasumumtambah.php">Tambah data</a></p>
<p>&nbsp;</p>
<div align="center">
  <table border="0" width="1200px">
    <tr>
      <td><div align="center">Wifi</div></td>
      <td><div align="center">Restoran</div></td>
      <td><div align="center">Parkir</div></td>
      <td><div align="center">Kolam_renang</div></td>
      <td><div align="center">Bar</div></td>
      <td><div align="center">Ac</div></td>
      <td colspan="2"><div align="center">Tools</div></td>
    </tr>
    <?php do { ?>
      <tr>
        <td><div align="center"><?php echo $row_fasilitasumumtampil['Wifi']; ?></div></td>
        <td><div align="center"><?php echo $row_fasilitasumumtampil['Restoran']; ?></div></td>
        <td><div align="center"><?php echo $row_fasilitasumumtampil['Parkir']; ?></div></td>
        <td><div align="center"><?php echo $row_fasilitasumumtampil['Kolam_renang']; ?></div></td>
        <td><div align="center"><?php echo $row_fasilitasumumtampil['Bar']; ?></div></td>
        <td><div align="center"><?php echo $row_fasilitasumumtampil['Ac']; ?></div></td>
        <td><div align="center"><a href="fasilitasumumedit.php?Wifi=<?php echo $row_fasilitasumumtampil['Wifi']; ?>"><img src="download-removebg-preview (1).png" width="25" height="29" /></a></div></td>
        <td><div align="center"><a href="fasilitasumumhapus.php?Wifi=<?php echo $row_fasilitasumumtampil['Wifi']; ?>"><img src="download-removebg-preview (2).png" width="32" height="31" /></a></div></td>
      </tr>
      <?php } while ($row_fasilitasumumtampil = mysql_fetch_assoc($fasilitasumumtampil)); ?>
  </table>
</div>
<p align="center"><a href="homeadmin.php">back</a></p>
</body>
</html>
<?php
mysql_free_result($fasilitasumumtampil);
?>
