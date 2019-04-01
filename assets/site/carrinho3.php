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

$colname_DetailRS1 = "-1";
if (isset($_GET['recordID'])) {
  $colname_DetailRS1 = $_GET['recordID'];
}
mysql_select_db($database_conexao2, $conexao2);
$query_DetailRS1 = sprintf("SELECT * FROM carrinho  WHERE id_do_evento = %s", GetSQLValueString($colname_DetailRS1, "int"));
$DetailRS1 = mysql_query($query_DetailRS1, $conexao2) or die(mysql_error());
$row_DetailRS1 = mysql_fetch_assoc($DetailRS1);
$totalRows_DetailRS1 = mysql_num_rows($DetailRS1);
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
    <td>cpf</td>
    <td><?php echo $row_DetailRS1['cpf']; ?></td>
  </tr>
  <tr>
    <td>email</td>
    <td><?php echo $row_DetailRS1['email']; ?></td>
  </tr>
  <tr>
    <td>evento</td>
    <td><?php echo $row_DetailRS1['evento']; ?></td>
  </tr>
  <tr>
    <td>data_evento</td>
    <td><?php echo $row_DetailRS1['data_evento']; ?></td>
  </tr>
  <tr>
    <td>local_evento</td>
    <td><?php echo $row_DetailRS1['local_evento']; ?></td>
  </tr>
  <tr>
    <td>Cidade_bairro</td>
    <td><?php echo $row_DetailRS1['Cidade_bairro']; ?></td>
  </tr>
  <tr>
    <td>tipo_de_ingresso</td>
    <td><?php echo $row_DetailRS1['tipo_de_ingresso']; ?></td>
  </tr>
  <tr>
    <td>valor</td>
    <td><?php echo $row_DetailRS1['valor']; ?></td>
  </tr>
  <tr>
    <td>Valor_da_Taxa</td>
    <td><?php echo $row_DetailRS1['Valor_da_Taxa']; ?></td>
  </tr>
  <tr>
    <td>codigo_do_ingresso</td>
    <td><?php echo $row_DetailRS1['codigo_do_ingresso']; ?></td>
  </tr>
  <tr>
    <td>orientacoes_do_evento</td>
    <td><?php echo $row_DetailRS1['orientacoes_do_evento']; ?></td>
  </tr>
  <tr>
    <td>protocolo</td>
    <td><?php echo $row_DetailRS1['protocolo']; ?></td>
  </tr>
  <tr>
    <td>patrocinio</td>
    <td><?php echo $row_DetailRS1['patrocinio']; ?></td>
  </tr>
  <tr>
    <td>datahora</td>
    <td><?php echo $row_DetailRS1['datahora']; ?></td>
  </tr>
  <tr>
    <td>id_do_evento</td>
    <td><?php echo $row_DetailRS1['id_do_evento']; ?></td>
  </tr>
  <tr>
    <td>boleto</td>
    <td><?php echo $row_DetailRS1['boleto']; ?></td>
  </tr>
  <tr>
    <td>valor_boleto</td>
    <td><?php echo $row_DetailRS1['valor_boleto']; ?></td>
  </tr>
  <tr>
    <td>valor_taxa</td>
    <td><?php echo $row_DetailRS1['valor_taxa']; ?></td>
  </tr>
  <tr>
    <td>data_pagamento</td>
    <td><?php echo $row_DetailRS1['data_pagamento']; ?></td>
  </tr>
  <tr>
    <td>data_gerado</td>
    <td><?php echo $row_DetailRS1['data_gerado']; ?></td>
  </tr>
</table>
</body>
</html><?php
mysql_free_result($DetailRS1);
?>