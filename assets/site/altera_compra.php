<?php require_once('../../Connections/conexao2.php'); ?>
<?php require_once('../../Connections/conexao2.php'); ?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE carrinho SET cpf=%s, nome=%s, email=%s, evento=%s, data_evento=%s, local_evento=%s, Cidade_bairro=%s, tipo_de_ingresso=%s, valor=%s, codigo_do_ingresso=%s, orientacoes_do_evento=%s, protocolo=%s, patrocinio=%s, datahora=%s, id_do_evento=%s WHERE id=%s",
                       GetSQLValueString($_POST['cpf'], "text"),
                       GetSQLValueString($_POST['nome'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['evento'], "text"),
                       GetSQLValueString($_POST['data_evento'], "text"),
                       GetSQLValueString($_POST['local_evento'], "text"),
                       GetSQLValueString($_POST['Cidade_bairro'], "text"),
                       GetSQLValueString($_POST['tipo_de_ingresso'], "text"),
                       GetSQLValueString($_POST['valor'], "double"),
                       GetSQLValueString($_POST['codigo_do_ingresso'], "text"),
                       GetSQLValueString($_POST['orientacoes_do_evento'], "text"),
                       GetSQLValueString($_POST['protocolo'], "text"),
                       GetSQLValueString($_POST['patrocinio'], "text"),
                       GetSQLValueString($_POST['datahora'], "date"),
                       GetSQLValueString($_POST['id_do_evento'], "int"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_conexao2, $conexao2);
  $Result1 = mysql_query($updateSQL, $conexao2) or die(mysql_error());

  $updateGoTo = "carrinho.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE carrinho SET nome=%s, cpf=%s, email=%s, evento=%s, data_evento=%s, local_evento=%s, Cidade_bairro=%s, tipo_de_ingresso=%s, valor=%s, codigo_do_ingresso=%s, orientacoes_do_evento=%s, protocolo=%s, patrocinio=%s, datahora=%s, id_do_evento=%s WHERE id=%s",
                       GetSQLValueString($_POST['nome'], "text"),
                       GetSQLValueString($_POST['cpf'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['evento'], "text"),
                       GetSQLValueString($_POST['data_evento'], "text"),
                       GetSQLValueString($_POST['local_evento'], "text"),
                       GetSQLValueString($_POST['Cidade_bairro'], "text"),
                       GetSQLValueString($_POST['tipo_de_ingresso'], "text"),
                       GetSQLValueString($_POST['valor'], "double"),
                       GetSQLValueString($_POST['codigo_do_ingresso'], "text"),
                       GetSQLValueString($_POST['orientacoes_do_evento'], "text"),
                       GetSQLValueString($_POST['protocolo'], "text"),
                       GetSQLValueString($_POST['patrocinio'], "text"),
                       GetSQLValueString($_POST['datahora'], "date"),
                       GetSQLValueString($_POST['id_do_evento'], "int"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_conexao2, $conexao2);
  $Result1 = mysql_query($updateSQL, $conexao2) or die(mysql_error());

  $updateGoTo = "carrinho.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE carrinho SET nome=%s, cpf=%s, email=%s, evento=%s, data_evento=%s, local_evento=%s, Cidade_bairro=%s, tipo_de_ingresso=%s, valor=%s, Valor_da_Taxa=%s, codigo_do_ingresso=%s, orientacoes_do_evento=%s, protocolo=%s, patrocinio=%s, datahora=%s, id_do_evento=%s, boleto=%s, valor_boleto=%s, valor_taxa=%s, data_pagamento=%s, data_gerado=%s WHERE id=%s",
                       GetSQLValueString($_POST['nome'], "text"),
                       GetSQLValueString($_POST['cpf'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['evento'], "text"),
                       GetSQLValueString($_POST['data_evento'], "text"),
                       GetSQLValueString($_POST['local_evento'], "text"),
                       GetSQLValueString($_POST['Cidade_bairro'], "text"),
                       GetSQLValueString($_POST['tipo_de_ingresso'], "text"),
                       GetSQLValueString($_POST['valor'], "double"),
                       GetSQLValueString($_POST['Valor_da_Taxa'], "double"),
                       GetSQLValueString($_POST['codigo_do_ingresso'], "text"),
                       GetSQLValueString($_POST['orientacoes_do_evento'], "text"),
                       GetSQLValueString($_POST['protocolo'], "text"),
                       GetSQLValueString($_POST['patrocinio'], "text"),
                       GetSQLValueString($_POST['datahora'], "date"),
                       GetSQLValueString($_POST['id_do_evento'], "int"),
                       GetSQLValueString($_POST['boleto'], "text"),
                       GetSQLValueString($_POST['valor_boleto'], "double"),
                       GetSQLValueString($_POST['valor_taxa'], "double"),
                       GetSQLValueString($_POST['data_pagamento'], "text"),
                       GetSQLValueString($_POST['data_gerado'], "date"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_conexao2, $conexao2);
  $Result1 = mysql_query($updateSQL, $conexao2) or die(mysql_error());

  $updateGoTo = "carrinho.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$maxRows_DetailRS1 = 10;
$pageNum_DetailRS1 = 0;
if (isset($_GET['pageNum_DetailRS1'])) {
  $pageNum_DetailRS1 = $_GET['pageNum_DetailRS1'];
}
$startRow_DetailRS1 = $pageNum_DetailRS1 * $maxRows_DetailRS1;

$colname_DetailRS1 = "-1";
if (isset($_GET['recordID'])) {
  $colname_DetailRS1 = $_GET['recordID'];
}
mysql_select_db($database_conexao2, $conexao2);
$query_DetailRS1 = sprintf("SELECT * FROM carrinho WHERE id = %s", GetSQLValueString($colname_DetailRS1, "int"));
$query_limit_DetailRS1 = sprintf("%s LIMIT %d, %d", $query_DetailRS1, $startRow_DetailRS1, $maxRows_DetailRS1);
$DetailRS1 = mysql_query($query_limit_DetailRS1, $conexao2) or die(mysql_error());
$row_DetailRS1 = mysql_fetch_assoc($DetailRS1);

if (isset($_GET['totalRows_DetailRS1'])) {
  $totalRows_DetailRS1 = $_GET['totalRows_DetailRS1'];
} else {
  $all_DetailRS1 = mysql_query($query_DetailRS1);
  $totalRows_DetailRS1 = mysql_num_rows($all_DetailRS1);
}
$totalPages_DetailRS1 = ceil($totalRows_DetailRS1/$maxRows_DetailRS1)-1;

$maxRows_DetailRS2 = 10;
$pageNum_DetailRS2 = 0;
if (isset($_GET['pageNum_DetailRS2'])) {
  $pageNum_DetailRS2 = $_GET['pageNum_DetailRS2'];
}
$startRow_DetailRS2 = $pageNum_DetailRS2 * $maxRows_DetailRS2;

$colname_DetailRS2 = "-1";
if (isset($_GET['recordID'])) {
  $colname_DetailRS2 = $_GET['recordID'];
}
mysql_select_db($database_conexao2, $conexao2);
$query_DetailRS2 = sprintf("SELECT * FROM carrinho  WHERE id = %s", GetSQLValueString($colname_DetailRS2, "int"));
$query_limit_DetailRS2 = sprintf("%s LIMIT %d, %d", $query_DetailRS2, $startRow_DetailRS2, $maxRows_DetailRS2);
$DetailRS2 = mysql_query($query_limit_DetailRS2, $conexao2) or die(mysql_error());
$row_DetailRS2 = mysql_fetch_assoc($DetailRS2);

if (isset($_GET['totalRows_DetailRS2'])) {
  $totalRows_DetailRS2 = $_GET['totalRows_DetailRS2'];
} else {
  $all_DetailRS2 = mysql_query($query_DetailRS2);
  $totalRows_DetailRS2 = mysql_num_rows($all_DetailRS2);
}
$totalPages_DetailRS2 = ceil($totalRows_DetailRS2/$maxRows_DetailRS2)-1;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="images/icons/Logo-Marca3.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Gospel Eventos direcionada para todo publico gospel "/> 
<meta name="keywords" content="locais , Eventos , Serviços Comemorações&nbsp; "/>
<META NAME="ABSTRACT" CONTENT="Destinado a todo publico gospel  ">
<META NAME="KEYWORDS" CONTENT="Evangélico e Gospel">
<META NAME="ROBOT" CONTENT="All">
<META NAME="RATING" CONTENT="general">
<META NAME="DISTRIBUTION" CONTENT="global">
<META NAME="LANGUAGE" CONTENT="PT">
<meta name="author" content="Allan Jeferson" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>






<title>Documento sem título</title>




<style>
@import url("webfonts/OpenSans_Semibold/stylesheet.css");
@import url("../../webfonts/OpenSans_ExtraBold/stylesheet.css");
@import url("../../webfonts/OpenSans_Regular/stylesheet.css");


input{
	height:15px;
	width:250px;
	padding:5px;
	outline:inherit;

	
	}


.sub{
	height:40px;
	border-radius:10px;
	width:100%;
	background-color:#F00;
	color:#FFF;
	font-size:18px;
	font-family:"OpenSans Regular";
	}
	
td1{
	border-radius:10px;
	border-color:#FF0000;
	border: solid #F00;
	border-width:1px;
	padding:2px;
	}
	
	
.td1{
	border-radius:10px;
	border-color:#FF0000;
	border: solid #F00;
	height:20px;
	width:30px;
	border-width:1px;
	
	}
body,td,th {
	font-family: "OpenSans Regular";
	font-size: 16px;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
</style>

</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center" cellpadding="10" border="0" cellspacing="10">
    <tr valign="baseline">
      <td colspan="3" align="center" valign="middle" nowrap="nowrap">ALTERAÇÃO DE TITULARIDADE DO INGRESSO </td>
    </tr>
    <tr valign="baseline">
      <td align="left" valign="middle" nowrap="nowrap">Numero do registro
      <input name="id2" type="text" required class="form-control"  placeholder="Número do Pedido" value="<?php echo htmlentities($row_DetailRS1['id'], ENT_COMPAT, 'utf-8'); ?>" size="32" readonly="readonly" /></td>
      <td align="left" valign="middle">Evento:
      <input  name="evento" type="text" required class="form-control"  placeholder="Evento" value="<?php echo htmlentities($row_DetailRS1['evento'], ENT_COMPAT, 'utf-8'); ?>" size="32" readonly="readonly" /></td>
      <td align="left" valign="middle">Data evento:
      <input  name="data_evento" type="text" required class="form-control"  placeholder="Data   Evento" value="<?php echo htmlentities($row_DetailRS1['data_evento'], ENT_COMPAT, 'utf-8'); ?>" size="32" readonly="readonly" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" valign="middle" nowrap="nowrap">Nome:
      <input type="text" class="form-control"  placeholder="Nome" required name="nome" value="<?php echo htmlentities($row_DetailRS1['nome'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      <td align="left" valign="middle">Email:
      <input type="text" class="form-control"  placeholder="E-mail" required name="email" value="<?php echo htmlentities($row_DetailRS1['email'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      <td align="left" valign="middle">Cpf:
      <input type="text" class="form-control"  placeholder="CPF/CNPJ" required name="cpf" value="<?php echo htmlentities($row_DetailRS1['cpf'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" valign="middle" nowrap="nowrap">Local evento:
      <input   name="local_evento" type="text" required class="form-control"  placeholder="Local do Evento" value="<?php echo htmlentities($row_DetailRS1['local_evento'], ENT_COMPAT, 'utf-8'); ?>" size="32" readonly="readonly" /></td>
      <td align="left" valign="middle">Cidade bairro:
      <input   name="Cidade_bairro" type="text" required class="form-control"  placeholder="Cidade / Bairro" value="<?php echo htmlentities($row_DetailRS1['Cidade_bairro'], ENT_COMPAT, 'utf-8'); ?>" size="32" readonly="readonly" /></td>
      <td align="left" valign="middle">Tipo de ingresso:
      <input   name="tipo_de_ingresso" type="text" required class="form-control"  placeholder="Tipo de Ingresso" value="<?php echo htmlentities($row_DetailRS1['tipo_de_ingresso'], ENT_COMPAT, 'utf-8'); ?>" size="32" readonly="readonly" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" valign="middle" nowrap="nowrap">Valor:
      <input   name="valor" type="text" required class="form-control"  placeholder="Valor" value="<?php echo htmlentities($row_DetailRS1['valor'], ENT_COMPAT, 'utf-8'); ?>" size="32" readonly="readonly" /></td>
      <td align="left" valign="middle">Valor da Taxa:
      <input   name="Valor_da_Taxa" type="text" required class="form-control"  placeholder="Valor da Taxa" value="<?php echo $row_DetailRS1['Valor_da_Taxa']; ?>" size="32" readonly="readonly" /></td>
      <td align="left" valign="middle">Codigo do ingresso:
      <input   name="codigo_do_ingresso" type="text" required class="form-control"  placeholder="Codigo do Ingresso" value="<?php echo htmlentities($row_DetailRS1['codigo_do_ingresso'], ENT_COMPAT, 'utf-8'); ?>" size="32" readonly="readonly" /></td>
    </tr>
    <tr valign="baseline">
      <td colspan="3" align="left" valign="middle" nowrap="nowrap">Orientacoes do evento:
      <input   name="orientacoes_do_evento" type="text" required class="form-control"  placeholder="Orientações do Evento" value="<?php echo htmlentities($row_DetailRS1['orientacoes_do_evento'], ENT_COMPAT, 'utf-8'); ?>" size="32" readonly="readonly" /></td>
    </tr>
    <tr align="left" valign="baseline">
      <td colspan="3" valign="middle" nowrap="nowrap"><input type="submit" class="sub" value="Atualizar registro" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id" value="<?php echo $row_DetailRS1['id']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html><?php
mysql_free_result($DetailRS1);

mysql_free_result($DetailRS2);
?>