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
$query_kamar = "SELECT * FROM kamar";
$kamar = mysql_query($query_kamar, $hotel) or die(mysql_error());
$row_kamar = mysql_fetch_assoc($kamar);
$totalRows_kamar = mysql_num_rows($kamar);
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
<p align="center"><strong>KAMAR YANG TERSEDIA</strong></p>
<table border="1" align="center" width="679">
  <tr>
    <td width="174">nomor_kamar</td>
    <td width="113">lantai</td>
    <td width="105">harga</td>
    <td width="151">tipe_kamar</td>
    <td width="102">status</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_kamar['nomor_kamar']; ?></td>
      <td><?php echo $row_kamar['lantai']; ?></td>
      <td><?php echo $row_kamar['harga']; ?></td>
      <td><?php echo $row_kamar['tipe_kamar']; ?></td>
      <td><?php echo $row_kamar['status']; ?></td>
    </tr>
    <?php } while ($row_kamar = mysql_fetch_assoc($kamar)); ?>
</table>
<p align="center"><a href="home.php"><img src="download-removebg-preview (3).png" width="17" height="19" /></a></p>
<p align="center"><a href="reservasi.php"><img src="booking-ticket-order-line-icon-illustration-logo-template-suitable-for-many-purposes-free-vector-removebg-preview.png" width="138" height="125" /></a></p>
</body>
</html>
<?php
mysql_free_result($kamar);

mysql_free_result($kamartampil);
?>
