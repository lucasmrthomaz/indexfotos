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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO boleto (nome, cpf, email, evento, data_evento, local_evento, Cidade_bairro, tipo_de_ingresso, valor, `Valor_da_ Taxa`, codigo_do_ingresso, orientacoes_do_evento, protocolo, patrocinio, id_do_evento, boleto, valor_boleto, valor_taxa, data_pagamento) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nome'], "text"),
                       GetSQLValueString($_POST['cpf'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['evento'], "text"),
                       GetSQLValueString($_POST['data_evento'], "text"),
                       GetSQLValueString($_POST['local_evento'], "text"),
                       GetSQLValueString($_POST['Cidade_bairro'], "text"),
                       GetSQLValueString($_POST['tipo_de_ingresso'], "text"),
                       GetSQLValueString($_POST['valor'], "double"),
                       GetSQLValueString($_POST['Valor_da__Taxa'], "double"),
                       GetSQLValueString($_POST['codigo_do_ingresso'], "text"),
                       GetSQLValueString($_POST['orientacoes_do_evento'], "text"),
                       GetSQLValueString($_POST['protocolo'], "text"),
                       GetSQLValueString($_POST['patrocinio'], "text"),
                       GetSQLValueString($_POST['id_do_evento'], "int"),
                       GetSQLValueString($_POST['boleto'], "text"),
                       GetSQLValueString($_POST['valor_boleto'], "double"),
                       GetSQLValueString($_POST['valor_taxa'], "double"),
                       GetSQLValueString($_POST['data_pagamento'], "text"));

  mysql_select_db($database_conexao2, $conexao2);
  $Result1 = mysql_query($insertSQL, $conexao2) or die(mysql_error());

  $insertGoTo = "boleto.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset1 = $_SESSION['MM_Username'];
}
mysql_select_db($database_conexao2, $conexao2);
$query_Recordset1 = sprintf("SELECT * FROM carrinho WHERE email LIKE %s ORDER BY id DESC", GetSQLValueString("%" . $colname_Recordset1 . "%", "text"));
$Recordset1 = mysql_query($query_Recordset1, $conexao2) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset2 = $_SESSION['MM_Username'];
}
mysql_select_db($database_conexao2, $conexao2);
$query_Recordset2 = sprintf("SELECT * FROM carrinho WHERE email LIKE %s ORDER BY id DESC", GetSQLValueString("%" . $colname_Recordset2 . "%", "text"));
$Recordset2 = mysql_query($query_Recordset2, $conexao2) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script language= "JavaScript">
location.href="https://sandbox.boletobancario.com/boletofacil/integration/api/v1/issue-charge?token= BD3408649EA4B6262CCA074E57D6923001E0E400EDD888B5EB3477533E50CEDD
&description=allan&amount=<?php 
echo $a3;
?>&payerName=<?php echo $row_Recordset2['nome']; ?>+jeferson&payerCpfCnpj=<?php echo $row_Recordset1['cpf']; ?>";
</script>


</ head> 
<title>Documento sem título</title>

<style type="text/css">
@import url("../../webfonts/OpenSans_Regular/stylesheet.css");

.section {
	font-family: "OpenSans ExtraBold";
	font-size: 24px;
	font-weight: bold;
}
body,td,th {
	font-family: "OpenSans Regular";
}
#calc{
	display: block;
	position:absolute;
	top:0;
	left:0;
	visibility:inherit;
	color:#FFF;

	
	} 
</style>

</head>

<body>

<div id="calc">
<?php do { ?>

<?php 
$b1 = $b1 + $row_Recordset2['Valor_da_Taxa'];
$a1 = $a1 + $row_Recordset2['valor']; 
?>
 <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>
 
<?php 
$a3 = $b1 + $a1;
?> 
 
</div>
<p>&nbsp;</p>
<p><?php echo $_SESSION['MM_Username']; ?></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3">Boleto de compra </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?php 
echo $a3;
echo ',00';
?></td>
    <td><?php echo $row_Recordset1['codigo_do_ingresso']; ?></td>
    <td><?php echo $row_Recordset1['protocolo']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><?php echo $row_Recordset1['data_gerado']; ?></td>
    <td><?php echo $row_Recordset1['datahora']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php do { ?>
    <tr>
      
      <td><?php echo $row_Recordset1['id']; ?>-<?php echo $row_Recordset1['evento']; ?>-<?php echo $row_Recordset1['data_evento']; ?></td>
      <td><?php echo $row_Recordset1['local_evento']; ?>-<?php echo $row_Recordset1['Cidade_bairro']; ?>-<?php echo $row_Recordset1['tipo_de_ingresso']; ?></td>
      <td><?php echo $row_Recordset1['valor']; ?></td>
      
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  <
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>




1
<?php header ("https://sandbox.boletobancario.com/boletofacil/integration/api/v1/issue-charge?token= BD3408649EA4B6262CCA074E57D6923001E0E400EDD888B5EB3477533E50CEDD
&description=allan&amount=$a3&payerName=$row_Recordset2['nome']+jeferson&payerCpfCnpj=$row_Recordset1['cpf']") ?>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
