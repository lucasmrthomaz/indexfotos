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
<title>Gospel Eventos</title>
<link href="css/evento.css" rel="stylesheet" type="text/css" />
<link href="css/buscafiltros.css" rel="stylesheet" type="text/css" />
<link href="css/asside.css" rel="stylesheet" type="text/css" />
<link href="css/INGRESSO.css" rel="stylesheet" type="text/css" />








<style type="text/css">
@import url("OpenSans_Light/stylesheet.css");
@import url("OpenSans_Semibold/stylesheet.css");
@import url("OpenSans_ExtraBold/stylesheet.css");

.style1 {
	margin-bottom: 0;
}
.style2 {
	border-right-style: solid;
	border-right-width: 3px;
	border-color:#F00;
}
.style3 {
	border-left-style: solid;
	border-left-width: 0px;
	border-right-style: solid;
	border-right-width: 3px;
	border-color:#F00;
}
.style4 {
				text-align: right;
				padding:5px;
				
}
#fundo #card #categoria table tr td {
	font-family: "OpenSans Light";
}
#fundo #card #local table tr td {
	font-family: "OpenSans Light";
}

	

.style5 {
				text-align: justify;
}

	

.style8 {
				color: #FF0000;
				font-family: Arial, Helvetica, sans-serif;
				font-size: large;
}

	

.style9 {
			
}
.style10 {
				border-left: 3px solid #F00;
				
				
}




html, body {
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
}
.container.imagem{
    width: 100%;
    min-height: 500px;
    background-size: cover;
    background-position: center;
	border-radius:10px;
}

	
.teste {
    background-color: red;
    width: 100px;
    height: 150px;
    margin-top: 0px; /* altura que está do topo */
    top: 80px; /* altura que vai parar antes do topo */
    position: sticky;
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

<div id="fundo">

<div id="card" >

<div id="imagem">

<div class="container imagem" style="    background-image: url('fotos/<?php echo $row_Recordset1['foto_banner']; ?>');">

    <map name = "shape">  
     
    <area shape = "rect" coords = "0, 0, 500, 500" href="/31.01.2018/production/ajax/historicoperini1.php"/>
       
    </map>
    
    </div>

</div>

<div id="evento">

<font face="Open Sans extrabold" size="+3">   
 
  <?php echo $row_Recordset1['nome_do_evento']; ?>
  
  </font>  
  
</div>

<div id="local">

<font face="Open Sans extrabold" size="4"><?php echo $row_Recordset1['local_do_evento']; ?></font>

<font face="Open Sans" size="4"> ( fotos do local)


<br />

<?php echo $row_Recordset1['bairro_cidade_do_evento']; ?></font></div>

<div id="horario">

<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>
  
    <td width="37%" rowspan="2" valign="middle">
    
    <font face="Open Sans extrabold" size="+4"><?php echo $row_Recordset1['data_do_evento_inicio_dia']; ?>/<?php echo $row_Recordset1['data_do_evento_inicio_mes']; ?></font>
    
    </td>
    
    <td width="23%" rowspan="2" valign="middle">
    
    <font face="Open Sans" size="5"> <?php echo $row_Recordset1['data_do_evento_inicio_ano']; ?></font>
    
    </td>
    
    <td width="23%">
    
    <font face="Open Sans" size="4"><?php echo $row_Recordset1['hora_de_inicio']; ?>hs</font>
    
    </td>
    
    <td width="17%">
    
    <font face="Open Sans" size="4">Inicio</font>
    
    </td>
    
  </tr>
  
  <tr>
  
    <td>
    
    <font face="Open Sans" size="4"><?php echo $row_Recordset1['hora_de_fim']; ?>hs</font>
    
    </td>
    
    <td>
    
    <font face="Open Sans" size="4">Fim</font>
    
    </td>
   
  </tr>
  
</table>

 </div>

<div id="categoria">

<font face="Open Sans" size="4">Categoria: <?php echo $row_Recordset1['categoria_do_evento']; ?></font>

</div>

<div id="descricao">
 
  <table width="100%" border="0" align="center" cellpadding="5" cellspacing="5">
  <tr>
    <td><p><font face="Open Sans" size="4"&nbsp;>Descrição do evento:
  <br /><?php echo $row_Recordset1['descricao']; ?></font></p></td>
  </tr>
</table>

  
</div>


</div>

<!--div compra de ingress inicio -->

<div id="ingresso1" >

<table  width="100%" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
  
    <td width="41%" align="right" valign="middle">
    
    <font face="Open Sans" size="3" color="#FFFFFF"> Ingresso no&nbsp;</font>
     
    </td>
    
    <td width="34%" align="left" valign="middle">
    
    <img src="images/carrinhomercado2.png" width="30" height="30" />
    
    </td>
    
    <td width="25%" align="center" valign="middle">
    
    <font face="Open Sans" size="3" color="#FFFFFF">R$&nbsp;&nbsp;<span id="valor">0</span>,00</font>
    
    </td>
    
  </tr>
  
</table>

</div>


<div id="ingresso2">


<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>
  
    <td>
    
    <font face="Open Sans extrabold" size="3">Promocional (Limitado)</font>
    
    </td>
    
    <td rowspan="3">
    
    <font face="Open Sans" size="2">Encerrado</font>
    
    </td>
    
  </tr>
  
  <tr>
  
    <td>
    
    <font face="Open Sans" size="3">R$ 10,00(+R$ 2,00 taxa)</font>
    
    </td>
    
    </tr>
    
  <tr>
  
    <td>
    
    <font face="Open Sans" size="3">Vendas até 25/12/2018</font>
    
    </td>
    
    </tr>
    
</table>

<hr width="90%" align="center" color="#FF0000"/>

<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>
  
    <td width="73%">
    
    <font face="Open Sans extrabold" size="3">Pista</font>
    
    </td>
    
    <td width="27%" rowspan="3" align="center" valign="middle">
    
    <div id="contador" align="center">
    
    <div id="sub">
    
    <img src="images/menos.png" width="20" height="20">
    
    </div> 
   
    <div id="numero">
    
    <font face="Open Sans Semibold" size="3"><span class="soma">  0  </span></font>
    
    </div> 
        
    <div id="soma">
    
    <img src="images/mais.png" width="20" height="20">
    
    </div>
    
    </div> 
    
</td>

  </tr>
  
  <tr>
  
    <td>
    
    <font face="Open Sans" size="3">R$ 30,00(+R$ 2,00 taxa)</font>
    
    </td>
    
    </tr>
    
  <tr>
  
    <td height="27">
    
    <font face="Open Sans" size="3">Vendas até 25/12/2018</font>
    
    </td>
    
    </tr>
    
</table>

<hr width="90%" align="center" color="#FF0000"/>

<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
 
  <tr>
  
    <td width="75%">
    
    <font face="Open Sans extrabold" size="3">Meia-Pista</font>
    
    </td>
    
    <td width="25%" rowspan="3" align="center" valign="middle">
     
<div id="contadorm" align="center">

  <div id="subm">
  
  <img src="images/menos.png" width="20" height="20">
  
  </div> 
   
    <div id="numerom ">
    
    <font face="Open Sans Semibold" size="3"><strong><span class="somam">  0  </span></strong></font>
    
    </div> 
        
        <div id="somam"><img src="images/mais.png" width="20" height="20"></div>
   
    </div>   
      
      </td>
  
  </tr>
 
  <tr>
    
    <td>
    
    <font face="Open Sans" size="3">R$ 15,00(+R$ 2,00 taxa)</font>
    
    </td>
    
    </tr>
    
  <tr>
  
    <td>
    
    <font face="Open Sans" size="3">Vendas até 25/12/2018</font>
    
    </td>
    
    </tr>
    
</table>

<hr width="90%" align="center" color="#FF0000"/>

<div id="compra">  

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
 
  <tr>
   
    <td width="18%" rowspan="2" align="left" valign="middle">
    
    <img src="images/cadeirante.png" width="30" height="36" />
    
    </td>
   
    <td width="59%" align="right" valign="bottom">
    
    <font face="Open Sans" size="2" color="#FF0000">pague</font>
    
    </td>
   
    <td width="23%" rowspan="2" align="right">
    
    <font face="Open Sans extrabold" size="+3" color="#FF0000"> 12X</font>
    
    </td>
 
  </tr>
 
  <tr>
   
    <td align="right" valign="top"><font face="Open Sans" size="2" color="#FF0000">em até</font>
    
    </td>
  
    </tr>

</table>

<div id="btcompra">

<table width="100%"  height="100%" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
  
    <td align="center" valign="middle">
    
    <font face="Open Sans" size="2" color="#FFFFFF"> COMPRAR INGESSOS</font>
    
    </td>
    
  </tr>
  
</table>

</div>
</div>
</div>



<!--div compra de ingress fim  -->


</div>


<!-- detalhe do evento fim  -->



<script type="text/javascript">

		<!-- contador 0 inicio -->
        var contador = document.querySelector('.soma');

document.querySelector('#soma').addEventListener('click', function(){
  var numero = parseInt(contador.textContent) + 1;
  contador.textContent = numero;
});
document.querySelector('#sub').addEventListener('click', function(){
  var numero = parseInt(contador.textContent) - 1;
  contador.textContent = numero;
});
      	<!-- contador 1 fim -->
	  
	  
	  	<!-- contador 2 inicio -->
        var contadorm = document.querySelector('.somam');

document.querySelector('#somam').addEventListener('click', function(){
  var numerom = parseInt(contadorm.textContent) + 1;
  contadorm.textContent = numerom;
});
document.querySelector('#subm').addEventListener('click', function(){
  var numerom = parseInt(contadorm.textContent) - 1;
  contadorm.textContent = numerom;
});
     <!-- contador 2 fim -->
	 
	 <!-- contador 3 inicio -->
  
var contadorm1 = document.querySelector('#valor');

document.querySelector('#somam').addEventListener('click', function(){
  var numerom1 = parseInt(contadorm1.textContent) + 15 + 2;
  contadorm1.textContent = numerom1;
});
document.querySelector('#subm').addEventListener('click', function(){
  var numerom1 = parseInt(contadorm1.textContent) - 15 - 2;
  contadorm1.textContent = numerom1;
});


		<!-- contador 3 fim -->
      
	  
	  	<!-- contador 4 inicio -->
        var contadorm2 = document.querySelector('#valor');

document.querySelector('#soma').addEventListener('click', function(){
  var numerom2 = parseInt(contadorm2.textContent) + 30 + 2;
  contadorm2.textContent = numerom2;
});
document.querySelector('#sub').addEventListener('click', function(){
  var numerom2 = parseInt(contadorm2.textContent) - 30 - 2;
  contadorm2.textContent = numerom2;
});

		<!-- contador 4 fim -->

      </script>         
      
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);

mysql_free_result($Recordset3);

mysql_free_result($Recordset4);
?>
