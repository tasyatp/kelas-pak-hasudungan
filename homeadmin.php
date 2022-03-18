<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "login1.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
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
%20(3).jpg);
	font-family: Tahoma, Geneva, sans-serif;
	background-color: #036;
	background-image: url(img/273-2739414_bedroom.jpg);
}
.Y {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 24px;
}
.U {
	font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
}
body,td,th {
	color: #000000;
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
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
</head>

<body>
<p align="center">&nbsp;</p>
<ul id="MenuBar1" class="MenuBarHorizontal">
  <li><a class="MenuBarItemSubmenu" href="#">MENU</a>
    <ul>
<li><a href="fasilitaskamartampill.php">FASILITAS KAMAR</a></li>
<li><a href="fasilitasumumtampil.php">FASILITAS UMUM</a></li>
<li><a href="kamartampiladmin.php">DATA KAMAR</a></li>
    </ul>
  </li>
  <li><a href="about.php">ABOUT US</a></li>
<li><a href="<?php echo $logoutAction ?>">Log out</a></li>
</ul>
<p align="left">&nbsp;</p>
<table width="1352" height="262">
  <tr>
    <td width="208" height="256"><img src="img/Room-Type-Single-Room.jpg" width="208" height="149" /></td>
    <td width="557"><div align="left">Single Room</div>
    <p>Rp.200.000/hari</p>
    <p>Fasilitas : TV, Wifi, Kamar mandi, Kopi/teh</p></td>
    <td width="565"><img src="img/Webp.net-gifmaker.gif" width="320" height="233" align="right" /></td>
  </tr>
</table>
<table width="1349" height="195">
  <tr>
    <td width="500" height="189"><img src="img/ccb764b3a0f9b7631513a3f096f4ed74470b89c6_2_690x350.jpeg" width="264" height="152" align="right" /></td>
    <td width="427"><p>Double Room</p>
    <p>Rp.400.000/hari</p>
    <p>Fasilitas : TV, Wifi, Kamar mandi, Kopi/teh,Sarapan pagi</p>
    <p>&nbsp;</p></td>
    <td width="406"><img src="img/image_processing20210217-16671-11ezcsw.gif" width="269" height="147" align="right" /></td>
  </tr>
</table>
<table width="1345" height="179">
  <tr>
    <td width="301" height="173"><img src="img/DA-Family-Room-Bedroom-02.jpg" width="301" height="153" /></td>
    <td width="536"><p>Family Room</p>
    <p>Rp.500.000/hari</p>
    <p>Fasilitas : TV, Wifi,Kamar Mandi 2, Kopi/teh, Sarapan pagi, Meja makan</p></td>
    <td width="492"><img src="img/4Edl.gif" width="264" height="149" align="right" /></td>
  </tr>
</table>
<p align="right">&nbsp;</p>
<p align="center">Copyright 2018 My Companny All Right Reserved.</p>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
  </script>
</body>
</html>