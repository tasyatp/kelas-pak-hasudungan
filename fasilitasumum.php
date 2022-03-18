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
$query_fasilitasumum = "SELECT * FROM fasilitas_umum_hotel";
$fasilitasumum = mysql_query($query_fasilitasumum, $hotel) or die(mysql_error());
$row_fasilitasumum = mysql_fetch_assoc($fasilitasumum);
$totalRows_fasilitasumum = mysql_num_rows($fasilitasumum);
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
	background-image: url(img/hotel_room_bed_furniture_luxury_70053_1366x768.jpg);
	font-family: Tahoma, Geneva, sans-serif;
	background-color: #036;
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
	font-weight: bold;
}
.T {
	font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
	font-size: 16px;
	color: #FFF;
}
.Y p {
	color: #FFF;
}
.J {
	font-weight: normal;
}
.y {
	font-weight: normal;
}
</style>
</head>

<body>
<p align="center">FASILITAS UMUM YANG TERSEDIA DI HOTEL KAMI</p>
<table border="1" align="center">
  <tr>
    <td bgcolor="#A57166"><span class="J">Wifi</span></td>
    <td bgcolor="#A57166"><span class="J">Restoran</span></td>
    <td bgcolor="#A57166"><span class="J">Parkir</span></td>
    <td bgcolor="#A57166"><span class="J">Kolam_renang</span></td>
    <td bgcolor="#A57166"><span class="J">Bar</span></td>
    <td bgcolor="#A57166"><span class="J">Ac</span></td>
  </tr>
  <?php do { ?>
    <tr>
      <td bgcolor="#A57166"><span class="J"><?php echo $row_fasilitasumum['Wifi']; ?></span></td>
      <td bgcolor="#A57166"><span class="J"><?php echo $row_fasilitasumum['Restoran']; ?></span></td>
      <td bgcolor="#A57166"><span class="J"><?php echo $row_fasilitasumum['Parkir']; ?></span></td>
      <td bgcolor="#A57166"><span class="J"><?php echo $row_fasilitasumum['Kolam_renang']; ?></span></td>
      <td bgcolor="#A57166"><span class="J"><?php echo $row_fasilitasumum['Bar']; ?></span></td>
      <td bgcolor="#A57166"><span class="J"><?php echo $row_fasilitasumum['Ac']; ?></span></td>
    </tr>
    <?php } while ($row_fasilitasumum = mysql_fetch_assoc($fasilitasumum)); ?>
</table>
<p align="center" class="y"><a href="home.php">back</a></p>
</body>
</html>
<?php
mysql_free_result($fasilitasumum);
?>
