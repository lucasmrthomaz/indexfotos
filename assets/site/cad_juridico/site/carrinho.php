<?php require_once('Connections/conexao2.php'); ?>
<?php require_once('Connections/conexao.php'); ?>
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

$MM_restrictGoTo = "../../index.PHP";
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

$colname_Recordset1 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset1 = $_GET['id'];
}
mysql_select_db($database_conexao2, $conexao2);
$query_Recordset1 = sprintf("SELECT * FROM cad_evento WHERE id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $conexao2) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_conexao2, $conexao2);
$query_Recordset2 = "SELECT * FROM aside_dos_eventos ORDER BY id DESC";
$Recordset2 = mysql_query($query_Recordset2, $conexao2) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

$colname_Recordset3 = "-1";
if (isset($_GET['MM_Username'])) {
  $colname_Recordset3 = $_GET['MM_Username'];
}
mysql_select_db($database_conexao2, $conexao2);
$query_Recordset3 = sprintf("SELECT * FROM cad_cliente WHERE email = %s", GetSQLValueString($colname_Recordset3, "text"));
$Recordset3 = mysql_query($query_Recordset3, $conexao2) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);

$colname_Recordset4 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset4 = $_SESSION['MM_Username'];
}
mysql_select_db($database_conexao2, $conexao2);
$query_Recordset4 = sprintf("SELECT * FROM cad_cliente WHERE email = %s", GetSQLValueString($colname_Recordset4, "text"));
$Recordset4 = mysql_query($query_Recordset4, $conexao2) or die(mysql_error());
$row_Recordset4 = mysql_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysql_num_rows($Recordset4);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>

<link href="css/evento.css" rel="stylesheet" type="text/css" />
<link href="css/buscafiltros.css" rel="stylesheet" type="text/css" />
<link href="css/asside.css" rel="stylesheet" type="text/css" />
<link href="css/INGRESSO.css" rel="stylesheet" type="text/css" />
<link href="css/carrinho.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.section {
	font-family: "OpenSans ExtraBold";
	font-size: 24px;
	font-weight: bold;
}
</style>
</head>

<body>
<div id="ola" style="display:block; position:fixed; margin-top:60px; right:310px; z-index:3; float:right;"><span class="div_ola">Olá, <?php echo $row_Recordset4['nome']; ?></span> </div>
<!-- cabeçlho divs publicar logo carrinho user etc...-->

<div id="top">


<div id="barrinha"></div>

<a href="cad_evento.php">


<div id="publicar">

<div id="tpublicar"><font face="Arial, Helvetica, sans-serif">PUBLICAR EVENTO </font></div>

<div id="tgratis"><font face="Arial, Helvetica, sans-serif">grátis</font></div>

</div>

</a>

<div id="carrinho"><a href="carrinho.php"><img src="images/carrinhomercado3.png" width="100%" height="100%"></a></div>

<div id="user"><a href="area_do_cliente_fisico.php"><img src="images/usuario3.png" width="100%" height="100%"></a> </div>

<div id="logo" align="center"><a href="index.php"><img src="images/logomarcadas.png" width="100%" height="100%"  /></a></div>

</div>

<!--fim cabeçalho -->

<!-- asside inicio -->

<aside id="esquerda"><img src="aside_eventos/<?php echo $row_Recordset2['aside_esqueda']; ?>" width="100%" height="100%" /></aside>

<aside id="direita"><img src="aside_eventos/<?php echo $row_Recordset2['aside_direita']; ?>" width="100%" height="100%"/></aside>

<!-- asside fim-->

<!-- menu hamburger inicio -->

<input id="menu-ham" type="checkbox" />

<label for="menu-ham">  

<div id="menuhanburger" class="menu">

<span class="ham"> </span>

</div>

</label>
<ul>
<li>
 <table border="0" id="tb" align="right"  class="tablemenu">
  <tr>
    <td class="tabe1"><div align="center" ><A href="#"><img src="images/seguindo.png" width="100%" height="100%" /></A></div></td>
    <td class="tabd1"><div align="center" ><A href="#"><img src="images/contatos.png" width="100%" height="100%" /></A></div></td>
  </tr>
  <tr>
    <td class="tabe2"><div align="center" ><A href="#"><img src="images/anuncie.png" width="100%" height="100%" /></A></div></td>
    <td class="tabd2"><div align="center" ><A href="#"><img src="images/como funciona.png" width="100%" height="100%" /></A></div></td>
  </tr>
  <tr>
    <td class="tabe3"><div align="center" ><A href="#"><img src="images/organizadores.png" width="100%" height="100%" /></A></div></td>
    <td class="tabd3"><div align="center"><A href="#"><img src="images/quem somos.png" width="100%" height="100%" /></A></div></td>
  </tr>
  <tr>
    <td colspan="2" class="tab4"><div align="center" ><A href="#"><img src="images/locais.png" width="100%" height="100%" /></A></div></td>
    </tr>
  <tr>
    <td colspan="2" class="tab5"><div align="center" style=" cursor:pointer"><A href="#"><img src="images/eventos.png" width="100%" height="100%" /></A></div></td>
    </tr>
</table>


</li>

</ul>

<!-- menu hamburger fim  -->

<!-- detalhe do evento inicio -->

<section>
  <p align="center" class="section">Carinho de compras </p>

</section>


</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);

mysql_free_result($Recordset3);

mysql_free_result($Recordset4);
?>
