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
$query_login2 = "SELECT * FROM resepsionis";
$login2 = mysql_query($query_login2, $hotel) or die(mysql_error());
$row_login2 = mysql_fetch_assoc($login2);
$totalRows_login2 = mysql_num_rows($login2);
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "homeresepsionis.php";
  $MM_redirectLoginFailed = "logingagal1.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_hotel, $hotel);
  
  $LoginRS__query=sprintf("SELECT id_resepsionis, password FROM resepsionis WHERE id_resepsionis=%s AND password=%s",
    GetSQLValueString($loginUsername, "int"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $hotel) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
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
	background-image: url(img/house-wallpaper-1366x768-laptop-490271.jpg);
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
</head>

<body>
<div align="center" class="Y">
  <p>&nbsp;</p>
  <p>S<span class="U">ELAMAT DATANG DI WEBSITE KAMI! </span></p>
</div>
<p align="center">&nbsp;</p>
<form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
  <table width="360" height="80" align="center">
    <tr>
      <td colspan="2" rowspan="3"><img src="img/png-transparent-padlock-computer-icons-padlock-cdr-technic-logo-removebg-preview.png" width="100" height="72" /></td>
      <td width="96" height="23" style="color: #FFFFFF">Id_rersepsionis</td>
      <td width="140"><label for="textfield"></label>
      <input type="text" name="username" id="username" /></td>
    </tr>
    <tr>
      <td height="23" style="color: #FFFFFF">password</td>
      <td><label for="password"></label>
      <input type="text" name="password" id="password" /></td>
    </tr>
    <tr>
      <td height="24"><input type="submit" name="submit" id="submit" value="Submit" /></td>
      <td><input type="reset" name="cancel" id="cancel" value="Reset" /></td>
    </tr>
  </table>
</form>
<p align="center" class="T"><a href="index.php"><img src="file:///C|/Users/PC/Downloads/download-removebg-preview (3).png" width="31" height="25" /></a></p>
</body>
</html>
<?php
mysql_free_result($login2);
?>
