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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO cad_cliente (nome, sobrenome, rg, confirma_email, cep, email, senha, cpf) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nome'], "text"),
                       GetSQLValueString($_POST['sobrenome'], "text"),
                       GetSQLValueString($_POST['rg'], "text"),
                       GetSQLValueString($_POST['confirma_email'], "text"),
                       GetSQLValueString($_POST['cep'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['senha'], "text"),
                       GetSQLValueString($_POST['cpf'], "text"));

  mysql_select_db($database_conexao2, $conexao2);
  $Result1 = mysql_query($insertSQL, $conexao2) or die(mysql_error());
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>





<style>
@import url("webfonts/OpenSans_Semibold/stylesheet.css");


input{
	border-radius:10px;
	border-color:#FF0000;
	border: solid #F00;
	height:20px;
	width:250px;
	border-width:1px;
	padding:5px;
	outline:inherit;
	
	}


.sub{
	height:40px;
	
	}
	
.td2{
	border-radius:10px;
	border-color:#FF0000;
	border: solid #F00;
	border-width:1px;
	padding:2px;
	}
	
	
.td{
	border-radius:10px;
	border-color:#FF0000;
	border: solid #F00;
	height:20px;
	width:30px;
	border-width:1px;
	
	}
body,td,th {
	font-family: "OpenSans Semibold";
	font-size: 16px;
}
</style>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td align="left" valign="middle"  class="td2" nowrap="nowrap">Nome:</td>
      <td><input type="text" name="nome" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" valign="middle" class="td2" nowrap="nowrap">Sobrenome:</td>
      <td><input type="text" name="sobrenome" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" valign="middle" class="td2" nowrap="nowrap">Cpf:</td>
      <td><input type="text" name="cpf" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" valign="middle" class="td2" nowrap="nowrap">Rg:</td>
      <td><input type="text" name="rg" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" valign="middle" class="td2" nowrap="nowrap">Cep:</td>
      <td><input type="text" name="cep" value="" size="32" /></td>
    </tr>
    
    
    <tr valign="baseline">
      <td align="left" valign="middle" class="td2" nowrap="nowrap">Email:</td>
      <td><input type="text" name="email" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" valign="middle" class="td2" nowrap="nowrap">Confirma email:</td>
      <td><input type="text" name="confirma_email" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" valign="middle" class="td2" nowrap="nowrap">Senha:</td>
      <td><input type="text" name="senha" value="" size="32" /></td>
    </tr>
    
    <tr valign="baseline">
      <td align="left" valign="middle" nowrap="nowrap">&nbsp;</td>
      <td align="center"><input type="submit" class="sub" value="Inserir registro" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>