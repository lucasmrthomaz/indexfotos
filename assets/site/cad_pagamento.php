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

$currentPage = $_SERVER["PHP_SELF"];

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO pagamento (id_evento, nome_do_evento, tipo_de_ingresso, valor_ingresso, valor_taxa, data_limite_de_venda) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_evento'], "int"),
                       GetSQLValueString($_POST['nome_do_evento'], "text"),
                       GetSQLValueString($_POST['tipo_de_ingresso'], "text"),
                       GetSQLValueString($_POST['valor_ingresso'], "double"),
                       GetSQLValueString($_POST['valor_taxa'], "double"),
                       GetSQLValueString($_POST['data_limite_de_venda'], "text"));

  mysql_select_db($database_conexao2, $conexao2);
  $Result1 = mysql_query($insertSQL, $conexao2) or die(mysql_error());

  $insertGoTo = "cad_pagamento.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE cad_evento SET id_cliente=%s, email_cliente=%s, nome_do_evento=%s, foto_banner=%s, foto_aside_direita=%s, foto_aside_esquerda=%s, data_do_evento_inicio_dia=%s, data_do_evento_inicio_mes=%s, data_do_evento_inicio_ano=%s, `data_do_evento _termino_dia`=%s, `data_do_evento _termino_mes`=%s, `data_do_evento _termino_ano`=%s, hora_de_inicio=%s, hora_de_fim=%s, categoria_do_evento=%s, local_do_evento=%s, bairro_cidade_do_evento=%s, cadeirante=%s, data_hora=%s, descricao=%s, cnpj=%s, produtor=%s, responsavel=%s WHERE id=%s",
                       GetSQLValueString($_POST['id_cliente'], "int"),
                       GetSQLValueString($_POST['email_cliente'], "text"),
                       GetSQLValueString($_POST['nome_do_evento'], "text"),
                       GetSQLValueString($_POST['foto_banner'], "text"),
                       GetSQLValueString($_POST['foto_aside_direita'], "text"),
                       GetSQLValueString($_POST['foto_aside_esquerda'], "text"),
                       GetSQLValueString($_POST['data_do_evento_inicio_dia'], "text"),
                       GetSQLValueString($_POST['data_do_evento_inicio_mes'], "text"),
                       GetSQLValueString($_POST['data_do_evento_inicio_ano'], "text"),
                       GetSQLValueString($_POST['data_do_evento__termino_dia'], "text"),
                       GetSQLValueString($_POST['data_do_evento__termino_mes'], "text"),
                       GetSQLValueString($_POST['data_do_evento__termino_ano'], "text"),
                       GetSQLValueString($_POST['hora_de_inicio'], "text"),
                       GetSQLValueString($_POST['hora_de_fim'], "text"),
                       GetSQLValueString($_POST['categoria_do_evento'], "text"),
                       GetSQLValueString($_POST['local_do_evento'], "text"),
                       GetSQLValueString($_POST['bairro_cidade_do_evento'], "text"),
                       GetSQLValueString($_POST['cadeirante'], "text"),
                       GetSQLValueString($_POST['data_hora'], "date"),
                       GetSQLValueString($_POST['descricao'], "text"),
                       GetSQLValueString($_POST['cnpj'], "text"),
                       GetSQLValueString($_POST['produtor'], "text"),
                       GetSQLValueString($_POST['responsavel'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_conexao2, $conexao2);
  $Result1 = mysql_query($updateSQL, $conexao2) or die(mysql_error());

  $updateGoTo = "cad_pagamento.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE cad_evento SET id_cliente=%s, email_cliente=%s, nome_do_evento=%s, foto_banner=%s, foto_aside_direita=%s, foto_aside_esquerda=%s, data_do_evento_inicio_dia=%s, data_do_evento_inicio_mes=%s, data_do_evento_inicio_ano=%s, `data_do_evento _termino_dia`=%s, `data_do_evento _termino_mes`=%s, `data_do_evento _termino_ano`=%s, hora_de_inicio=%s, hora_de_fim=%s, categoria_do_evento=%s, local_do_evento=%s, bairro_cidade_do_evento=%s, cadeirante=%s, data_hora=%s, descricao=%s, cnpj=%s, produtor=%s, responsavel=%s WHERE id=%s",
                       GetSQLValueString($_POST['id_cliente'], "int"),
                       GetSQLValueString($_POST['email_cliente'], "text"),
                       GetSQLValueString($_POST['nome_do_evento'], "text"),
                       GetSQLValueString($_POST['foto_banner'], "text"),
                       GetSQLValueString($_POST['foto_aside_direita'], "text"),
                       GetSQLValueString($_POST['foto_aside_esquerda'], "text"),
                       GetSQLValueString($_POST['data_do_evento_inicio_dia'], "text"),
                       GetSQLValueString($_POST['data_do_evento_inicio_mes'], "text"),
                       GetSQLValueString($_POST['data_do_evento_inicio_ano'], "text"),
                       GetSQLValueString($_POST['data_do_evento__termino_dia'], "text"),
                       GetSQLValueString($_POST['data_do_evento__termino_mes'], "text"),
                       GetSQLValueString($_POST['data_do_evento__termino_ano'], "text"),
                       GetSQLValueString($_POST['hora_de_inicio'], "text"),
                       GetSQLValueString($_POST['hora_de_fim'], "text"),
                       GetSQLValueString($_POST['categoria_do_evento'], "text"),
                       GetSQLValueString($_POST['local_do_evento'], "text"),
                       GetSQLValueString($_POST['bairro_cidade_do_evento'], "text"),
                       GetSQLValueString($_POST['cadeirante'], "text"),
                       GetSQLValueString($_POST['data_hora'], "date"),
                       GetSQLValueString($_POST['descricao'], "text"),
                       GetSQLValueString($_POST['cnpj'], "text"),
                       GetSQLValueString($_POST['produtor'], "text"),
                       GetSQLValueString($_POST['responsavel'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_conexao2, $conexao2);
  $Result1 = mysql_query($updateSQL, $conexao2) or die(mysql_error());

  $updateGoTo = "cad_pagamento.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset1 = $_SESSION['MM_Username'];
}
mysql_select_db($database_conexao2, $conexao2);
$query_Recordset1 = sprintf("SELECT * FROM cad_juridica WHERE email = %s ORDER BY id ASC", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $conexao2) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset2 = $_SESSION['MM_Username'];
}
mysql_select_db($database_conexao2, $conexao2);
$query_Recordset2 = sprintf("SELECT * FROM cad_evento WHERE email_cliente = %s ORDER BY id DESC", GetSQLValueString($colname_Recordset2, "text"));
$Recordset2 = mysql_query($query_Recordset2, $conexao2) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

$maxRows_Recordset3 = 10;
$pageNum_Recordset3 = 0;
if (isset($_GET['pageNum_Recordset3'])) {
  $pageNum_Recordset3 = $_GET['pageNum_Recordset3'];
}
$startRow_Recordset3 = $pageNum_Recordset3 * $maxRows_Recordset3;

mysql_select_db($database_conexao2, $conexao2);
$query_Recordset3 = "SELECT * FROM pagamento ORDER BY id DESC";
$query_limit_Recordset3 = sprintf("%s LIMIT %d, %d", $query_Recordset3, $startRow_Recordset3, $maxRows_Recordset3);
$Recordset3 = mysql_query($query_limit_Recordset3, $conexao2) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);

if (isset($_GET['totalRows_Recordset3'])) {
  $totalRows_Recordset3 = $_GET['totalRows_Recordset3'];
} else {
  $all_Recordset3 = mysql_query($query_Recordset3);
  $totalRows_Recordset3 = mysql_num_rows($all_Recordset3);
}
$totalPages_Recordset3 = ceil($totalRows_Recordset3/$maxRows_Recordset3)-1;

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
$query_DetailRS1 = sprintf("SELECT * FROM cad_evento WHERE id = %s ORDER BY id DESC", GetSQLValueString($colname_DetailRS1, "int"));
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

$queryString_Recordset3 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset3") == false && 
        stristr($param, "totalRows_Recordset3") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset3 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset3 = sprintf("&totalRows_Recordset3=%d%s", $totalRows_Recordset3, $queryString_Recordset3);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top"><p>&nbsp;</p>
      <form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
        <table align="center">
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Id:</td>
            <td><?php echo $row_DetailRS1['id']; ?></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Id_cliente:</td>
            <td><input type="text" name="id_cliente" value="<?php echo htmlentities($row_DetailRS1['id_cliente'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Email_cliente:</td>
            <td><input type="text" name="email_cliente" value="<?php echo htmlentities($row_DetailRS1['email_cliente'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Nome_do_evento:</td>
            <td><input type="text" name="nome_do_evento" value="<?php echo htmlentities($row_DetailRS1['nome_do_evento'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Foto_banner:</td>
            <td><input type="text" name="foto_banner" value="<?php echo htmlentities($row_DetailRS1['foto_banner'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Foto_aside_direita:</td>
            <td><input type="text" name="foto_aside_direita" value="<?php echo htmlentities($row_DetailRS1['foto_aside_direita'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Foto_aside_esquerda:</td>
            <td><input type="text" name="foto_aside_esquerda" value="<?php echo htmlentities($row_DetailRS1['foto_aside_esquerda'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Data_do_evento_inicio_dia:</td>
            <td><input type="text" name="data_do_evento_inicio_dia" value="<?php echo htmlentities($row_DetailRS1['data_do_evento_inicio_dia'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Data_do_evento_inicio_mes:</td>
            <td><input type="text" name="data_do_evento_inicio_mes" value="<?php echo htmlentities($row_DetailRS1['data_do_evento_inicio_mes'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Data_do_evento_inicio_ano:</td>
            <td><input type="text" name="data_do_evento_inicio_ano" value="<?php echo htmlentities($row_DetailRS1['data_do_evento_inicio_ano'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Data_do_evento _termino_dia:</td>
            <td><input type="text" name="data_do_evento__termino_dia" value="<?php echo htmlentities($row_DetailRS1['data_do_evento _termino_dia'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Data_do_evento _termino_mes:</td>
            <td><input type="text" name="data_do_evento__termino_mes" value="<?php echo htmlentities($row_DetailRS1['data_do_evento _termino_mes'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Data_do_evento _termino_ano:</td>
            <td><input type="text" name="data_do_evento__termino_ano" value="<?php echo htmlentities($row_DetailRS1['data_do_evento _termino_ano'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Hora_de_inicio:</td>
            <td><input type="text" name="hora_de_inicio" value="<?php echo htmlentities($row_DetailRS1['hora_de_inicio'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Hora_de_fim:</td>
            <td><input type="text" name="hora_de_fim" value="<?php echo htmlentities($row_DetailRS1['hora_de_fim'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Categoria_do_evento:</td>
            <td><input type="text" name="categoria_do_evento" value="<?php echo htmlentities($row_DetailRS1['categoria_do_evento'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Local_do_evento:</td>
            <td><input type="text" name="local_do_evento" value="<?php echo htmlentities($row_DetailRS1['local_do_evento'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Bairro_cidade_do_evento:</td>
            <td><input type="text" name="bairro_cidade_do_evento" value="<?php echo htmlentities($row_DetailRS1['bairro_cidade_do_evento'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Cadeirante:</td>
            <td><input type="text" name="cadeirante" value="<?php echo htmlentities($row_DetailRS1['cadeirante'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Data_hora:</td>
            <td><input type="text" name="data_hora" value="<?php echo htmlentities($row_DetailRS1['data_hora'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Descricao:</td>
            <td><input type="text" name="descricao" value="<?php echo htmlentities($row_DetailRS1['descricao'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Cnpj:</td>
            <td><input type="text" name="cnpj" value="<?php echo htmlentities($row_DetailRS1['cnpj'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Produtor:</td>
            <td><input type="text" name="produtor" value="<?php echo htmlentities($row_DetailRS1['produtor'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Responsavel:</td>
            <td><input type="text" name="responsavel" value="<?php echo htmlentities($row_DetailRS1['responsavel'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">&nbsp;</td>
            <td><input type="submit" value="Atualizar registro" /></td>
          </tr>
        </table>
        <input type="hidden" name="MM_update" value="form2" />
        <input type="hidden" name="id" value="<?php echo $row_DetailRS1['id']; ?>" />
      </form>
    <p>&nbsp;</p></td>
    <td align="center" valign="top"><p>&nbsp;</p>
      <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
        <table align="center">
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Id_evento:</td>
            <td><input type="text" name="id_evento" value="<?php echo $row_DetailRS1['id']; ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Nome_do_evento:</td>
            <td><input type="text" name="nome_do_evento" value="<?php echo $row_DetailRS1['nome_do_evento']; ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Tipo_de_ingresso:</td>
            <td><input type="text" name="tipo_de_ingresso" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Valor_ingresso:</td>
            <td><input type="text" name="valor_ingresso" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Valor_taxa:</td>
            <td><input name="valor_taxa" type="text" value="2,00" size="32" readonly="readonly" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Data_limite_de_venda:</td>
            <td><input type="text" name="data_limite_de_venda" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">&nbsp;</td>
            <td><input type="submit" value="Inserir registro" /></td>
          </tr>
        </table>
        <input type="hidden" name="MM_insert" value="form1" />
      </form>
    <p>&nbsp;</p>
    <table border="1" align="center">
      <tr>
        <td>id</td>
        <td>id_evento</td>
        <td>nome_do_evento</td>
        <td>tipo_de_ingresso</td>
        <td>valor_ingresso</td>
        <td>valor_taxa</td>
        <td>data_hora</td>
        <td>data_limite_de_venda</td>
      </tr>
      <?php do { ?>
      <tr>
        <td><a href="altera_preco.php?recordID=<?php echo $row_Recordset3['id']; ?>"> <?php echo $row_Recordset3['id']; ?>&nbsp; </a></td>
        <td><?php echo $row_Recordset3['id_evento']; ?>&nbsp; </td>
        <td><?php echo $row_Recordset3['nome_do_evento']; ?>&nbsp; </td>
        <td><?php echo $row_Recordset3['tipo_de_ingresso']; ?>&nbsp; </td>
        <td><?php echo $row_Recordset3['valor_ingresso']; ?>&nbsp; </td>
        <td><?php echo $row_Recordset3['valor_taxa']; ?>&nbsp; </td>
        <td><?php echo $row_Recordset3['data_hora']; ?>&nbsp; </td>
        <td><?php echo $row_Recordset3['data_limite_de_venda']; ?>&nbsp; </td>
      </tr>
      <?php } while ($row_Recordset3 = mysql_fetch_assoc($Recordset3)); ?>
    </table>
    <br />
    <table border="0">
      <tr>
        <td><?php if ($pageNum_Recordset3 > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_Recordset3=%d%s", $currentPage, 0, $queryString_Recordset3); ?>">Primeiro</a>
          <?php } // Show if not first page ?></td>
        <td><?php if ($pageNum_Recordset3 > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_Recordset3=%d%s", $currentPage, max(0, $pageNum_Recordset3 - 1), $queryString_Recordset3); ?>">Anterior</a>
          <?php } // Show if not first page ?></td>
        <td><?php if ($pageNum_Recordset3 < $totalPages_Recordset3) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_Recordset3=%d%s", $currentPage, min($totalPages_Recordset3, $pageNum_Recordset3 + 1), $queryString_Recordset3); ?>">Próximo</a>
          <?php } // Show if not last page ?></td>
        <td><?php if ($pageNum_Recordset3 < $totalPages_Recordset3) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_Recordset3=%d%s", $currentPage, $totalPages_Recordset3, $queryString_Recordset3); ?>">Último</a>
          <?php } // Show if not last page ?></td>
      </tr>
    </table>
Registros <?php echo ($startRow_Recordset3 + 1) ?> a <?php echo min($startRow_Recordset3 + $maxRows_Recordset3, $totalRows_Recordset3) ?> de <?php echo $totalRows_Recordset3 ?>
<p></p></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);

mysql_free_result($Recordset3);

mysql_free_result($DetailRS1);
?>
