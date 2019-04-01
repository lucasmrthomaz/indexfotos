<?php require_once('../../Connections/conexao2.php'); ?>
<?php require_once('../../Connections/conexao2.php'); ?>
<?php require_once('../../Connections/conexao2.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "../index.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_alteracliente = 10;
$pageNum_alteracliente = 0;
if (isset($_GET['pageNum_alteracliente'])) {
  $pageNum_alteracliente = $_GET['pageNum_alteracliente'];
}
$startRow_alteracliente = $pageNum_alteracliente * $maxRows_alteracliente;

$colname_alteracliente = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_alteracliente = $_SESSION['MM_Username'];
}
mysql_select_db($database_conexao2, $conexao2);
$query_alteracliente = sprintf("SELECT * FROM cad_cliente WHERE email LIKE %s", GetSQLValueString("%" . $colname_alteracliente . "%", "text"));
$query_limit_alteracliente = sprintf("%s LIMIT %d, %d", $query_alteracliente, $startRow_alteracliente, $maxRows_alteracliente);
$alteracliente = mysql_query($query_limit_alteracliente, $conexao2) or die(mysql_error());
$row_alteracliente = mysql_fetch_assoc($alteracliente);

if (isset($_GET['totalRows_alteracliente'])) {
  $totalRows_alteracliente = $_GET['totalRows_alteracliente'];
} else {
  $all_alteracliente = mysql_query($query_alteracliente);
  $totalRows_alteracliente = mysql_num_rows($all_alteracliente);
}
$totalPages_alteracliente = ceil($totalRows_alteracliente/$maxRows_alteracliente)-1;

$maxRows_alterasenha = 10;
$pageNum_alterasenha = 0;
if (isset($_GET['pageNum_alterasenha'])) {
  $pageNum_alterasenha = $_GET['pageNum_alterasenha'];
}
$startRow_alterasenha = $pageNum_alterasenha * $maxRows_alterasenha;

$colname_alterasenha = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_alterasenha = $_SESSION['MM_Username'];
}
mysql_select_db($database_conexao2, $conexao2);
$query_alterasenha = sprintf("SELECT * FROM cad_cliente WHERE email LIKE %s", GetSQLValueString("%" . $colname_alterasenha . "%", "text"));
$query_limit_alterasenha = sprintf("%s LIMIT %d, %d", $query_alterasenha, $startRow_alterasenha, $maxRows_alterasenha);
$alterasenha = mysql_query($query_limit_alterasenha, $conexao2) or die(mysql_error());
$row_alterasenha = mysql_fetch_assoc($alterasenha);

if (isset($_GET['totalRows_alterasenha'])) {
  $totalRows_alterasenha = $_GET['totalRows_alterasenha'];
} else {
  $all_alterasenha = mysql_query($query_alterasenha);
  $totalRows_alterasenha = mysql_num_rows($all_alterasenha);
}
$totalPages_alterasenha = ceil($totalRows_alterasenha/$maxRows_alterasenha)-1;

$colname_alterasenhanovo = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_alterasenhanovo = $_SESSION['MM_Username'];
}
mysql_select_db($database_conexao2, $conexao2);
$query_alterasenhanovo = sprintf("SELECT email, senha FROM cad_cliente WHERE email LIKE %s", GetSQLValueString("%" . $colname_alterasenhanovo . "%", "text"));
$alterasenhanovo = mysql_query($query_alterasenhanovo, $conexao2) or die(mysql_error());
$row_alterasenhanovo = mysql_fetch_assoc($alterasenhanovo);
$totalRows_alterasenhanovo = mysql_num_rows($alterasenhanovo);

$queryString_alteracliente = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_alteracliente") == false && 
        stristr($param, "totalRows_alteracliente") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_alteracliente = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_alteracliente = sprintf("&totalRows_alteracliente=%d%s", $totalRows_alteracliente, $queryString_alteracliente);

$queryString_alterasenha = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_alterasenha") == false && 
        stristr($param, "totalRows_alterasenha") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_alterasenha = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_alterasenha = sprintf("&totalRows_alterasenha=%d%s", $totalRows_alterasenha, $queryString_alterasenha);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body>
<table border="1" align="center">
  <tr>
    <td>id</td>
    <td>nome</td>
    <td>sobrenome</td>
    <td>rg</td>
    <td>confirma_email</td>
    <td>cep</td>
    <td>email</td>
    <td>senha</td>
    <td>cpf</td>
    <td>data_hora</td>
    <td>fisico</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><a href="litaa.php?recordID=<?php echo $row_alteracliente['id']; ?>"> <?php echo $row_alteracliente['id']; ?>&nbsp; </a></td>
      <td><?php echo $row_alteracliente['nome']; ?>&nbsp; </td>
      <td><?php echo $row_alteracliente['sobrenome']; ?>&nbsp; </td>
      <td><?php echo $row_alteracliente['rg']; ?>&nbsp; </td>
      <td><?php echo $row_alteracliente['confirma_email']; ?>&nbsp; </td>
      <td><?php echo $row_alteracliente['cep']; ?>&nbsp; </td>
      <td><?php echo $row_alteracliente['email']; ?>&nbsp; </td>
      <td><?php echo $row_alteracliente['senha']; ?>&nbsp; </td>
      <td><?php echo $row_alteracliente['cpf']; ?>&nbsp; </td>
      <td><?php echo $row_alteracliente['data_hora']; ?>&nbsp; </td>
      <td><?php echo $row_alteracliente['fisico']; ?>&nbsp; </td>
    </tr>
    <?php } while ($row_alteracliente = mysql_fetch_assoc($alteracliente)); ?>
</table>
<br />
<table border="0">
  <tr>
    <td><?php if ($pageNum_alteracliente > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_alteracliente=%d%s", $currentPage, 0, $queryString_alteracliente); ?>">Primeiro</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_alteracliente > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_alteracliente=%d%s", $currentPage, max(0, $pageNum_alteracliente - 1), $queryString_alteracliente); ?>">Anterior</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_alteracliente < $totalPages_alteracliente) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_alteracliente=%d%s", $currentPage, min($totalPages_alteracliente, $pageNum_alteracliente + 1), $queryString_alteracliente); ?>">Próximo</a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_alteracliente < $totalPages_alteracliente) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_alteracliente=%d%s", $currentPage, $totalPages_alteracliente, $queryString_alteracliente); ?>">Último</a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
Registros <?php echo ($startRow_alteracliente + 1) ?> a <?php echo min($startRow_alteracliente + $maxRows_alteracliente, $totalRows_alteracliente) ?> de <?php echo $totalRows_alteracliente ?>
<table border="1" align="center">
  <tr>
    <td>id</td>
    <td>nome</td>
    <td>sobrenome</td>
    <td>rg</td>
    <td>confirma_email</td>
    <td>cep</td>
    <td>email</td>
    <td>senha</td>
    <td>cpf</td>
    <td>data_hora</td>
    <td>fisico</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><a href="altera_senha.php?recordID=<?php echo $row_alterasenha['id']; ?>"> <?php echo $row_alterasenha['id']; ?>&nbsp; </a></td>
      <td><?php echo $row_alterasenha['nome']; ?>&nbsp; </td>
      <td><?php echo $row_alterasenha['sobrenome']; ?>&nbsp; </td>
      <td><?php echo $row_alterasenha['rg']; ?>&nbsp; </td>
      <td><?php echo $row_alterasenha['confirma_email']; ?>&nbsp; </td>
      <td><?php echo $row_alterasenha['cep']; ?>&nbsp; </td>
      <td><?php echo $row_alterasenha['email']; ?>&nbsp; </td>
      <td><?php echo $row_alterasenha['senha']; ?>&nbsp; </td>
      <td><?php echo $row_alterasenha['cpf']; ?>&nbsp; </td>
      <td><?php echo $row_alterasenha['data_hora']; ?>&nbsp; </td>
      <td><?php echo $row_alterasenha['fisico']; ?>&nbsp; </td>
    </tr>
    <?php } while ($row_alterasenha = mysql_fetch_assoc($alterasenha)); ?>
</table>
<br />
<table border="0">
  <tr>
    <td><?php if ($pageNum_alterasenha > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_alterasenha=%d%s", $currentPage, 0, $queryString_alterasenha); ?>">Primeiro</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_alterasenha > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_alterasenha=%d%s", $currentPage, max(0, $pageNum_alterasenha - 1), $queryString_alterasenha); ?>">Anterior</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_alterasenha < $totalPages_alterasenha) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_alterasenha=%d%s", $currentPage, min($totalPages_alterasenha, $pageNum_alterasenha + 1), $queryString_alterasenha); ?>">Próximo</a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_alterasenha < $totalPages_alterasenha) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_alterasenha=%d%s", $currentPage, $totalPages_alterasenha, $queryString_alterasenha); ?>">Último</a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
<p>Registros <?php echo ($startRow_alterasenha + 1) ?> a <?php echo min($startRow_alterasenha + $maxRows_alterasenha, $totalRows_alterasenha) ?> de <?php echo $totalRows_alterasenha ?></p>
<p>&nbsp;</p>
<p>&nbsp;
<table border="1" align="center">
  <tr>
    <td>email</td>
    <td>senha</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><a href="altera_senha.php?recordID=<?php echo $row_alterasenhanovo['email']; ?>"> <?php echo $row_alterasenhanovo['email']; ?>&nbsp; </a></td>
      <td><?php echo $row_alterasenhanovo['senha']; ?>&nbsp; </td>
    </tr>
    <?php } while ($row_alterasenhanovo = mysql_fetch_assoc($alterasenhanovo)); ?>
</table>
<br />
<?php echo $totalRows_alterasenhanovo ?> Registros Total
</p>
</body>
</html>
<?php
mysql_free_result($alteracliente);

mysql_free_result($alterasenha);

mysql_free_result($alterasenhanovo);
?>
