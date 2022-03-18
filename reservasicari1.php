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

$colname_reservasitampil = "-1";
if (isset($_POST['search'])) {
  $colname_reservasitampil = $_POST['search'];
}
mysql_select_db($database_hotel, $hotel);
$query_reservasitampil = sprintf("SELECT * FROM reservasi WHERE nama_tamu = %s", GetSQLValueString($colname_reservasitampil, "text"));
$reservasitampil = mysql_query($query_reservasitampil, $hotel) or die(mysql_error());
$row_reservasitampil = mysql_fetch_assoc($reservasitampil);
$totalRows_reservasitampil = mysql_num_rows($reservasitampil);

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
	background-color: #396;
	background-image: url(img/images
%20(1).jpg);
	background-image: url(img/download
%20(1).jpg);
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
<p align="center"><strong>DATA RESERVASI</strong></p>
<p align="center">&nbsp;</p>
<form id="form1" name="form1" method="post" action="reservasicari1.php">
  search 
  <label for="search"></label>
  <input type="text" name="search" id="search" />
  <input type="submit" name="search2" id="search2" value="Submit" />
</form>
<p align="center">&nbsp;</p>
<div align="center">
  <table border="1">
    <tr>
      <td>id_reservasi</td>
      <td>nama_tamu</td>
      <td>jumlah_tamu</td>
      <td>jumlah_hari</td>
      <td>tipe_kamar</td>
      <td>tgl_reservasi</td>
      <td>tgl_check_in</td>
      <td>tgl_check_out</td>
      <td>id_tamu</td>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_reservasitampil['id_reservasi']; ?></td>
        <td><?php echo $row_reservasitampil['nama_tamu']; ?></td>
        <td><?php echo $row_reservasitampil['jumlah_tamu']; ?></td>
        <td><?php echo $row_reservasitampil['jumlah_hari']; ?></td>
        <td><?php echo $row_reservasitampil['tipe_kamar']; ?></td>
        <td><?php echo $row_reservasitampil['tgl_reservasi']; ?></td>
        <td><?php echo $row_reservasitampil['tgl_check_in']; ?></td>
        <td><?php echo $row_reservasitampil['tgl_check_out']; ?></td>
        <td><?php echo $row_reservasitampil['id_tamu']; ?></td>
      </tr>
      <?php } while ($row_reservasitampil = mysql_fetch_assoc($reservasitampil)); ?>
  </table>
</div>
</body>
</html>
<?php
mysql_free_result($reservasitampil);

mysql_free_result($kamartampil);
?>
