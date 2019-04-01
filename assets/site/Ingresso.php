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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<style>
@import url("webfonts/OpenSans_Semibold/stylesheet.css");
@import url("../../webfonts/OpenSans_ExtraBold/stylesheet.css");
@import url("../../webfonts/OpenSans_Regular/stylesheet.css");

table{
	border:solid;
	border-color:transparent;
	
	
	
	}
	
	
	
input{
	height:15px;
	width:250px;
	padding:5px;
	outline:inherit;
	border-color:transparent;
	
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
	
td{
	border-radius:0px;
	border-color:#ccc;
	border: solid #ccc;
	border-width:1px;
	padding:10px;
	}
	
	
.td{
	border-radius:10px;
	border-color:#FF0000;
	border: solid #F00;
	height:20px;
	width:30px;
	border-width:1px;
	
	}
	
#tabela1{
	border-radius:25px;
	border-color:transparent;
	
	}
		
body,td,th {
	font-family: "OpenSans Regular";
	font-size: 16px;
	color: #FFFFFF;
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


.container1 {
         width: 100vw;
         height:100vh;
         display: flex;
         justify-content: center;
         align-items: center
     }
     
		 

#box1{
	border:none;
	border-color:transparent;
	width:400px;
	
	
	}		 
    body {
        margin: 0px;

	
	}

	 
    


</style>

</head>

<body>
<div class="container1" align="center">
<div class="box1" id="box1" align="center">
<table id="tabela1" width="400px" border="0"  class="table table-striped table-dark" bgcolor="#333333" align="center" cellpadding="10" cellspacing="10">

    <td align="center"><?php echo $row_DetailRS2['id']; ?></td>
    <td align="center"><?php echo $row_DetailRS2['protocolo']; ?></td>
  </tr>
  <tr align="center">
    <td><?php echo $row_DetailRS2['evento']; ?></td>
    <td><?php echo $row_DetailRS2['data_evento']; ?></td>
  </tr>
  <tr align="center">
    <td><?php echo $row_DetailRS2['local_evento']; ?></td>
    <td><?php echo $row_DetailRS2['Cidade_bairro']; ?></td>
  </tr>
  <tr align="center">
    <td><?php echo $row_DetailRS2['tipo_de_ingresso']; ?></td>
    <td><?php echo $row_DetailRS2['id_do_evento']; ?></td>
  </tr>
  <tr align="center">
    <td><?php echo $row_DetailRS2['codigo_do_ingresso']; ?></td>
    <td><?php echo $row_DetailRS2['patrocinio']; ?></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle"><img src="images/logomarcadas.png" width="200" height="27" /></td>
    </tr>
  <tr>

  <tr>
    <td colspan="2" align="center" valign="middle"><iframe name="I1" id="I1" src="https://chart.googleapis.com/chart?chs=350x350&amp;cht=qr&amp;chl=<?php echo $row_DetailRS2['id']; ?>-<?php echo $row_DetailRS2['nome']; ?>-<?php echo $row_DetailRS2['cpf']; ?>-<?php echo $row_DetailRS2['evento']; ?>-<?php echo $row_DetailRS2['data_evento']; ?>-<?php echo $row_DetailRS2['local_evento']; ?>-<?php echo $row_DetailRS2['tipo_de_ingresso']; ?>-<?php echo $row_DetailRS2['id_do_evento']; ?>-<?php echo $row_DetailRS2['datahora']; ?>" height="350px" width="350px" scrolling="no" style="float: absmiddle" border="0" frameborder="0">
			</iframe>

</td>
  </tr>
</table></div></div>
</body>
</html><?php
mysql_free_result($DetailRS1);

mysql_free_result($DetailRS2);
?>