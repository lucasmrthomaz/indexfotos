<?php require_once('Connections/conexao.php'); ?><?php require_once('Connections/conexao.php'); ?><?php
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE slaid_1 SET img=%s, titulo=%s, linha_1=%s, linha_2=%s, linha_3=%s, linha_4=%s, linha_5=%s, linha_6=%s, linha_7=%s, data_hora=%s WHERE id=%s",
                       GetSQLValueString($_POST['img'], "text"),
                       GetSQLValueString($_POST['titulo'], "int"),
                       GetSQLValueString($_POST['linha_1'], "text"),
                       GetSQLValueString($_POST['linha_2'], "text"),
                       GetSQLValueString($_POST['linha_3'], "text"),
                       GetSQLValueString($_POST['linha_4'], "text"),
                       GetSQLValueString($_POST['linha_5'], "text"),
                       GetSQLValueString($_POST['linha_6'], "text"),
                       GetSQLValueString($_POST['linha_7'], "text"),
                       GetSQLValueString($_POST['data_hora'], "date"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_conexao, $conexao);
  $Result1 = mysql_query($updateSQL, $conexao) or die(mysql_error());

  $updateGoTo = "edita_slide.php";
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
mysql_select_db($database_conexao, $conexao);
$query_DetailRS1 = sprintf("SELECT * FROM slaid_1 WHERE id = %s ORDER BY id DESC", GetSQLValueString($colname_DetailRS1, "int"));
$query_limit_DetailRS1 = sprintf("%s LIMIT %d, %d", $query_DetailRS1, $startRow_DetailRS1, $maxRows_DetailRS1);
$DetailRS1 = mysql_query($query_limit_DetailRS1, $conexao) or die(mysql_error());
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
mysql_select_db($database_conexao, $conexao);
$query_DetailRS2 = sprintf("SELECT * FROM slaid_2 WHERE id = %s ORDER BY id DESC", GetSQLValueString($colname_DetailRS2, "int"));
$query_limit_DetailRS2 = sprintf("%s LIMIT %d, %d", $query_DetailRS2, $startRow_DetailRS2, $maxRows_DetailRS2);
$DetailRS2 = mysql_query($query_limit_DetailRS2, $conexao) or die(mysql_error());
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="middle"><p>Slide 1    </p>
    <p>&nbsp;</p>
    <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
      <table align="center">
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Id:</td>
          <td><?php echo $row_DetailRS1['id']; ?></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Img:</td>
          <td><input type="text" name="img" value="<?php echo htmlentities($row_DetailRS1['img'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Titulo:</td>
          <td><input type="text" name="titulo" value="<?php echo htmlentities($row_DetailRS1['titulo'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Linha_1:</td>
          <td><input type="text" name="linha_1" value="<?php echo htmlentities($row_DetailRS1['linha_1'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Linha_2:</td>
          <td><input type="text" name="linha_2" value="<?php echo htmlentities($row_DetailRS1['linha_2'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Linha_3:</td>
          <td><input type="text" name="linha_3" value="<?php echo htmlentities($row_DetailRS1['linha_3'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Linha_4:</td>
          <td><input type="text" name="linha_4" value="<?php echo htmlentities($row_DetailRS1['linha_4'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Linha_5:</td>
          <td><input type="text" name="linha_5" value="<?php echo htmlentities($row_DetailRS1['linha_5'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Linha_6:</td>
          <td><input type="text" name="linha_6" value="<?php echo htmlentities($row_DetailRS1['linha_6'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Linha_7:</td>
          <td><input type="text" name="linha_7" value="<?php echo htmlentities($row_DetailRS1['linha_7'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Data_hora:</td>
          <td><input type="text" name="data_hora" value="<?php echo htmlentities($row_DetailRS1['data_hora'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">&nbsp;</td>
          <td><input type="submit" value="Atualizar registro" /></td>
        </tr>
      </table>
      <input type="hidden" name="MM_update" value="form1" />
      <input type="hidden" name="id" value="<?php echo $row_DetailRS1['id']; ?>" />
    </form>
    <p>&nbsp;</p></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table border="1" align="center">
  <tr>
    <td>id</td>
    <td><?php echo $row_DetailRS2['id']; ?></td>
  </tr>
  <tr>
    <td>img</td>
    <td><?php echo $row_DetailRS2['img']; ?></td>
  </tr>
  <tr>
    <td>titulo</td>
    <td><?php echo $row_DetailRS2['titulo']; ?></td>
  </tr>
  <tr>
    <td>linha_1</td>
    <td><?php echo $row_DetailRS2['linha_1']; ?></td>
  </tr>
  <tr>
    <td>linha_2</td>
    <td><?php echo $row_DetailRS2['linha_2']; ?></td>
  </tr>
  <tr>
    <td>linha_3</td>
    <td><?php echo $row_DetailRS2['linha_3']; ?></td>
  </tr>
  <tr>
    <td>linha_4</td>
    <td><?php echo $row_DetailRS2['linha_4']; ?></td>
  </tr>
  <tr>
    <td>linha_5</td>
    <td><?php echo $row_DetailRS2['linha_5']; ?></td>
  </tr>
  <tr>
    <td>linha_6</td>
    <td><?php echo $row_DetailRS2['linha_6']; ?></td>
  </tr>
  <tr>
    <td>linha_7</td>
    <td><?php echo $row_DetailRS2['linha_7']; ?></td>
  </tr>
  <tr>
    <td>data_hora</td>
    <td><?php echo $row_DetailRS2['data_hora']; ?></td>
  </tr>
</table>

</body>
</html><?php
mysql_free_result($DetailRS1);

mysql_free_result($DetailRS2);
?>
