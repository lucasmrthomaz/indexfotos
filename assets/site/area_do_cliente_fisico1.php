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

$currentPage = $_SERVER["PHP_SELF"];

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
$query_Recordset4 = sprintf("SELECT * FROM cad_cliente WHERE email = %s ORDER BY id DESC", GetSQLValueString($colname_Recordset4, "text"));
$Recordset4 = mysql_query($query_Recordset4, $conexao2) or die(mysql_error());
$row_Recordset4 = mysql_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysql_num_rows($Recordset4);

$maxRows_Recordset5 = 10;
$pageNum_Recordset5 = 0;
if (isset($_GET['pageNum_Recordset5'])) {
  $pageNum_Recordset5 = $_GET['pageNum_Recordset5'];
}
$startRow_Recordset5 = $pageNum_Recordset5 * $maxRows_Recordset5;

$colname_Recordset5 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset5 = $_SESSION['MM_Username'];
}
mysql_select_db($database_conexao2, $conexao2);
$query_Recordset5 = sprintf("SELECT * FROM carrinho WHERE email = %s ORDER BY id DESC", GetSQLValueString($colname_Recordset5, "text"));
$query_limit_Recordset5 = sprintf("%s LIMIT %d, %d", $query_Recordset5, $startRow_Recordset5, $maxRows_Recordset5);
$Recordset5 = mysql_query($query_limit_Recordset5, $conexao2) or die(mysql_error());
$row_Recordset5 = mysql_fetch_assoc($Recordset5);

if (isset($_GET['totalRows_Recordset5'])) {
  $totalRows_Recordset5 = $_GET['totalRows_Recordset5'];
} else {
  $all_Recordset5 = mysql_query($query_Recordset5);
  $totalRows_Recordset5 = mysql_num_rows($all_Recordset5);
}
$totalPages_Recordset5 = ceil($totalRows_Recordset5/$maxRows_Recordset5)-1;

$maxRows_Recordset6 = 30;
$pageNum_Recordset6 = 0;
if (isset($_GET['pageNum_Recordset6'])) {
  $pageNum_Recordset6 = $_GET['pageNum_Recordset6'];
}
$startRow_Recordset6 = $pageNum_Recordset6 * $maxRows_Recordset6;

$colname_Recordset6 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset6 = $_SESSION['MM_Username'];
}
mysql_select_db($database_conexao2, $conexao2);
$query_Recordset6 = sprintf("SELECT * FROM carrinho WHERE email LIKE %s ORDER BY id DESC", GetSQLValueString("%" . $colname_Recordset6 . "%", "text"));
$query_limit_Recordset6 = sprintf("%s LIMIT %d, %d", $query_Recordset6, $startRow_Recordset6, $maxRows_Recordset6);
$Recordset6 = mysql_query($query_limit_Recordset6, $conexao2) or die(mysql_error());
$row_Recordset6 = mysql_fetch_assoc($Recordset6);

if (isset($_GET['totalRows_Recordset6'])) {
  $totalRows_Recordset6 = $_GET['totalRows_Recordset6'];
} else {
  $all_Recordset6 = mysql_query($query_Recordset6);
  $totalRows_Recordset6 = mysql_num_rows($all_Recordset6);
}
$totalPages_Recordset6 = ceil($totalRows_Recordset6/$maxRows_Recordset6)-1;

$colname_Recordset7 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset7 = $_SESSION['MM_Username'];
}
mysql_select_db($database_conexao2, $conexao2);
$query_Recordset7 = sprintf("SELECT * FROM carrinho WHERE email LIKE %s ORDER BY id DESC", GetSQLValueString("%" . $colname_Recordset7 . "%", "text"));
$Recordset7 = mysql_query($query_Recordset7, $conexao2) or die(mysql_error());
$row_Recordset7 = mysql_fetch_assoc($Recordset7);
$totalRows_Recordset7 = mysql_num_rows($Recordset7);

$colname_Recordset8 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset8 = $_SESSION['MM_Username'];
}
mysql_select_db($database_conexao2, $conexao2);
$query_Recordset8 = sprintf("SELECT * FROM cad_juridica WHERE email = %s ORDER BY id DESC", GetSQLValueString($colname_Recordset8, "text"));
$Recordset8 = mysql_query($query_Recordset8, $conexao2) or die(mysql_error());
$row_Recordset8 = mysql_fetch_assoc($Recordset8);
$totalRows_Recordset8 = mysql_num_rows($Recordset8);

$queryString_Recordset6 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset6") == false && 
        stristr($param, "totalRows_Recordset6") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset6 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset6 = sprintf("&totalRows_Recordset6=%d%s", $totalRows_Recordset6, $queryString_Recordset6);

$queryString_Recordset5 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset5") == false && 
        stristr($param, "totalRows_Recordset5") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset5 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset5 = sprintf("&totalRows_Recordset5=%d%s", $totalRows_Recordset5, $queryString_Recordset5);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link href="css/evento.css" rel="stylesheet" type="text/css" />
<link href="css/buscafiltros.css" rel="stylesheet" type="text/css" />
<link href="css/asside.css" rel="stylesheet" type="text/css" />
<link href="css/INGRESSO.css" rel="stylesheet" type="text/css" />
<link href="css/carrinho.css" rel="stylesheet" type="text/css" />
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





<title>Gospel Eventos</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>




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
.sem{
	border:none;
	}
body,td,th {
	font-family: "OpenSans Semibold";
	font-size: 16px;
}
.carrinho {
	font-size: 36px;
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
 
 <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>
<h2 align="center">&nbsp;</h2>
<h2 align="center">Olá <?php echo $row_Recordset4['nome']; ?><?php echo $row_Recordset8['nome']; ?> <?php echo $row_Recordset4['sobrenome']; ?><?php echo $row_Recordset8['sobrenome']; ?>!</h2>
<p>&nbsp;</p>
<div class="row" >
<div class="card col-md-4">
  <div>
    <div>
      <div>
        <div>
          <h3 class="card-header col-md">Meus Pedidos</h3>
        </div>
      </div>
    </div>
  </div>
  <div>
    <div>
      <div>
        <div>
          <div class="card-body">
            <p><strong>Resumo online de todos os pedidos:</strong><br />
              Confira o status de suas compras realizadas na GOSPEL EVENTOS.</p>
            <a id="OverviewPage_ToMyOrderOverview_Link" href="carrinho.php">Visualizar status dos meus pedidos</a></div>
          <div></div>
        </div>
      </div>
    </div>
    <div>
      <div></div>
    </div>
  </div>
</div>
<div class="card col-md-4">
  <div>
    <div>
      <div>
        <div>
          <h3 class="card-header col-md">Newsletter GOSPEL EVENTOS</h3>
        </div>
      </div>
    </div>
  </div>
  <div>
    <div>
      <div>
        <div>
          <div class="card-body">
            <p>Inscreva-se nas Newsletters personalizadas e no TicketAlarm dos seus artistas favoritos e fique por dentro dos próximos eventos.</p>
            
            <ul1>
              <li><a id="OverviewPage_ToNewsletter_Link" href="https://www.eventim.com.br/tnl.dll?fun=newsletter&amp;action=show&amp;affiliate=BR1&amp;doc=feature/newsletter">Ir para Newsletter</a></li>
              <li><a id="OverviewPage_ToTicketAlarm_Link" href="https://www.eventim.com.br/tnl.dll?fun=newsletter&amp;action=show&amp;affiliate=BR1&amp;doc=feature/ticketAlarm">Ir para o TicketAlarm</a></li>
            </ul1>
          </div>
          <div></div>
        </div>
      </div>
    </div>
    <div>
      <div></div>
    </div>
  </div>
</div>
<div class="card col-md-4">
  <div>
    <div>
      <div>
        <div>
          <h3 class="card-header col-md">Meus Dados</h3>
        </div>
      </div>
    </div>
  </div>
  <div>
    <div>
      <div>
        <div>
          <div class="card-body">
            <p>Visualize e/ou altere seus dados cadastrais conforme sua necessidade.</p>
            <a id="OverviewPage_ToMyData_Link" href="modelo pagina vasia.php?recordID=<?php echo $row_Recordset4['id']; ?>">Visualizar/alterar os dados de cadastro</a></div>
          <div></div>
        </div>
      </div>
    </div>
    <div>
      <div></div>
    </div>
  </div>
</div>
<div></div>
<div class="card  col-md-4">
  <div>
    <div>
      <div>
        <div>
          <h3 class="card-header col-md">Alterar senha</h3>
        </div>
      </div>
    </div>
  </div>
  <div>
    <div>
      <div>
        <div>
          <div class="card-body">
            <p>Altere a sua senha de acesso à Minha GOSPEL EVENTOS.</p>
            <a id="OverviewPage_ToChangePassword_Link" href="https://www.eventim.com.br/tpwd.dll?fun=chpwd&amp;affiliate=BR1&amp;doc=feature/changePassword">Alterar a senha</a></div>
          <div></div>
        </div>
      </div>
    </div>
    <div>
      <div></div>
    </div>
  </div>
</div>
<div class="card col-md-4">
  <div>
    <div>
      <div>
        <div>
          <h3 class="card-header col-md">Ajuda</h3>
        </div>
      </div>
    </div>
  </div>
  <div>
    <div>
      <div>
        <div>
          <div>
            <p>A seção de Perguntas Frequentes responderá às dúvidas mais comuns em relação ao processo de compra.</p>
            <a id="OverviewPage_ToHelpContact_Link" href="https://www.eventim.com.br/tpwd.dll?fun=thelp&amp;affiliate=BR1&amp;doc=feature/helpContact/start">Ir para as Perguntas Frequentes</a></div>
          <div></div>
        </div>
      </div>
    </div>
    <div>
      <div></div>
    </div>
  </div>
</div>
<div class="card col-md-4"> 
  <div>
    <div>
      <div>
        <div>
          <h3 class="card-header col-md">GOSPEL EVENTOS FanBonus</h3>
        </div>
      </div>
    </div>
  </div>
  <div>
    <div>
      <div>
        <div>
          <div class="card-body">
            <p>Economize a cada compra! Se cadastre gratuitamente no programa de fidelidade da GOSPEL EVENTOS. Garanta vantagens exclusivas já no seu próximo pedido.</p>
            <a target="_blank" href="https://www.eventim.com.br/tickets.html?affiliate=BR1&amp;doc=fanBonus">GOSPEL EVENTOS FanBonus</a></div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<p>&nbsp;</p>

</td>
  </tr>
</table>
 
 
</section>

</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset8);
?>
