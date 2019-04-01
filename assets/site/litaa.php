<?php require_once('../../Connections/conexao2.php'); ?><?php
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE cad_cliente SET nome=%s, sobrenome=%s, rg=%s, confirma_email=%s, cep=%s, email=%s, senha=%s, cpf=%s, data_hora=%s, fisico=%s WHERE id=%s",
                       GetSQLValueString($_POST['nome'], "text"),
                       GetSQLValueString($_POST['sobrenome'], "text"),
                       GetSQLValueString($_POST['rg'], "text"),
                       GetSQLValueString($_POST['confirma_email'], "text"),
                       GetSQLValueString($_POST['cep'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['senha'], "text"),
                       GetSQLValueString($_POST['cpf'], "text"),
                       GetSQLValueString($_POST['data_hora'], "date"),
                       GetSQLValueString($_POST['fisico'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_conexao2, $conexao2);
  $Result1 = mysql_query($updateSQL, $conexao2) or die(mysql_error());

  $updateGoTo = "lita.php";
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
$query_DetailRS1 = sprintf("SELECT * FROM cad_cliente  WHERE id = %s", GetSQLValueString($colname_DetailRS1, "int"));
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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body>
<table border="1" align="center">
  <tr>
    <td>id</td>
    <td><?php echo $row_DetailRS1['id']; ?></td>
  </tr>
  <tr>
    <td>nome</td>
    <td><?php echo $row_DetailRS1['nome']; ?></td>
  </tr>
  <tr>
    <td>sobrenome</td>
    <td><?php echo $row_DetailRS1['sobrenome']; ?></td>
  </tr>
  <tr>
    <td>rg</td>
    <td><?php echo $row_DetailRS1['rg']; ?></td>
  </tr>
  <tr>
    <td>confirma_email</td>
    <td><?php echo $row_DetailRS1['confirma_email']; ?></td>
  </tr>
  <tr>
    <td>cep</td>
    <td><?php echo $row_DetailRS1['cep']; ?></td>
  </tr>
  <tr>
    <td>email</td>
    <td><?php echo $row_DetailRS1['email']; ?></td>
  </tr>
  <tr>
    <td>senha</td>
    <td><?php echo $row_DetailRS1['senha']; ?></td>
  </tr>
  <tr>
    <td>cpf</td>
    <td><?php echo $row_DetailRS1['cpf']; ?></td>
  </tr>
  <tr>
    <td>data_hora</td>
    <td><?php echo $row_DetailRS1['data_hora']; ?></td>
  </tr>
  <tr>
    <td>fisico</td>
    <td><?php echo $row_DetailRS1['fisico']; ?></td>
  </tr>
</table>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Id:</td>
      <td><?php echo $row_DetailRS1['id']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nome:</td>
      <td><input type="text" name="nome" value="<?php echo htmlentities($row_DetailRS1['nome'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Sobrenome:</td>
      <td><input type="text" name="sobrenome" value="<?php echo htmlentities($row_DetailRS1['sobrenome'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Rg:</td>
      <td><input type="text" name="rg" value="<?php echo htmlentities($row_DetailRS1['rg'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Confirma_email:</td>
      <td><input type="text" name="confirma_email" value="<?php echo htmlentities($row_DetailRS1['confirma_email'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Cep:</td>
      <td><input type="text" name="cep" value="<?php echo htmlentities($row_DetailRS1['cep'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Email:</td>
      <td><input type="text" name="email" value="<?php echo htmlentities($row_DetailRS1['email'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Senha:</td>
      <td><input type="text" name="senha" value="<?php echo htmlentities($row_DetailRS1['senha'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Cpf:</td>
      <td><input type="text" name="cpf" value="<?php echo htmlentities($row_DetailRS1['cpf'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Data_hora:</td>
      <td><input type="text" name="data_hora" value="<?php echo htmlentities($row_DetailRS1['data_hora'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Fisico:</td>
      <td><input type="text" name="fisico" value="<?php echo htmlentities($row_DetailRS1['fisico'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Atualizar registro" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id" value="<?php echo $row_DetailRS1['id']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html><?php
mysql_free_result($DetailRS1);
?>