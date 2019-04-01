<?php require_once('../../Connections/conexao2.php'); ?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO testedrop (categoria) VALUES (%s)",
                       GetSQLValueString($_POST['categoria'], "text"));

  mysql_select_db($database_conexao2, $conexao2);
  $Result1 = mysql_query($insertSQL, $conexao2) or die(mysql_error());

  $insertGoTo = "teste drop.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <label for="teste ">um</label>
  <select name="teste " id="teste ">
    <option value="joão">item 1 joão</option>
    <option value="rodrigo">item 2 rodrigo1</option>
    <option value="rodrigo1">item 2 rodrigo2</option>
    <option value="rodrigo2"><form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
  
     <input type="text" name="categoria" value="" size="32" />
     <input type="submit" value="Inserir registro" />
 
 <input type="hidden" name="MM_insert" value="form2" /></form></option>
  </select>
</form>

<p>&nbsp;</p>
</body>
</html>