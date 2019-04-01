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
  $insertSQL = sprintf("INSERT INTO carrinho (nome, cpf, email, evento, data_evento, local_evento, Cidade_bairro, tipo_de_ingresso, valor, Valor_da_Taxa, codigo_do_ingresso, orientacoes_do_evento, protocolo, patrocinio, id_do_evento) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nome'], "text"),
                       GetSQLValueString($_POST['cpf'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['evento'], "text"),
                       GetSQLValueString($_POST['data_evento'], "text"),
                       GetSQLValueString($_POST['local_evento'], "text"),
                       GetSQLValueString($_POST['Cidade_bairro'], "text"),
                       GetSQLValueString($_POST['tipo_de_ingresso'], "text"),
                       GetSQLValueString($_POST['valor'], "double"),
                       GetSQLValueString($_POST['taxa'], "double"),
                       GetSQLValueString($_POST['codigo_do_ingresso'], "text"),
                       GetSQLValueString($_POST['orientacoes_do_evento'], "text"),
                       GetSQLValueString($_POST['protocolo'], "text"),
                       GetSQLValueString($_POST['patrocinio'], "text"),
                       GetSQLValueString($_POST['id_do_evento'], "int"));

  mysql_select_db($database_conexao2, $conexao2);
  $Result1 = mysql_query($insertSQL, $conexao2) or die(mysql_error());

  $insertGoTo = "evento.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
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

$colname_Recordset5 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset5 = $_GET['id'];
}
mysql_select_db($database_conexao2, $conexao2);
$query_Recordset5 = sprintf("SELECT * FROM pagamento WHERE id_evento = %s ORDER BY id DESC", GetSQLValueString($colname_Recordset5, "int"));
$Recordset5 = mysql_query($query_Recordset5, $conexao2) or die(mysql_error());
$row_Recordset5 = mysql_fetch_assoc($Recordset5);
$totalRows_Recordset5 = mysql_num_rows($Recordset5);

$colname_Recordset6 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset6 = $_GET['id'];
}
mysql_select_db($database_conexao2, $conexao2);
$query_Recordset6 = sprintf("SELECT * FROM pagamento WHERE id_evento = %s ORDER BY id DESC", GetSQLValueString($colname_Recordset6, "int"));
$Recordset6 = mysql_query($query_Recordset6, $conexao2) or die(mysql_error());
$row_Recordset6 = mysql_fetch_assoc($Recordset6);
$totalRows_Recordset6 = mysql_num_rows($Recordset6);

$colname_Recordset7 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset7 = $_SESSION['MM_Username'];
}
mysql_select_db($database_conexao2, $conexao2);
$query_Recordset7 = sprintf("SELECT * FROM cad_juridica WHERE email = %s ORDER BY id DESC", GetSQLValueString($colname_Recordset7, "text"));
$Recordset7 = mysql_query($query_Recordset7, $conexao2) or die(mysql_error());
$row_Recordset7 = mysql_fetch_assoc($Recordset7);
$totalRows_Recordset7 = mysql_num_rows($Recordset7);

$colname_Recordset8 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset8 = $_SESSION['MM_Username'];
}
mysql_select_db($database_conexao2, $conexao2);
$query_Recordset8 = sprintf("SELECT * FROM carrinho WHERE email LIKE %s ORDER BY id DESC", GetSQLValueString("%" . $colname_Recordset8 . "%", "text"));
$Recordset8 = mysql_query($query_Recordset8, $conexao2) or die(mysql_error());
$row_Recordset8 = mysql_fetch_assoc($Recordset8);
$totalRows_Recordset8 = mysql_num_rows($Recordset8);
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

tr{
	border:none;
	
	}	
	
td{
	border:none;
	
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


.sumir{
	display:none;
	position:absolute;
	visibility:hidden;
	
	
	}
</style>





</head>

<body>
<div id="ola" style="display:block; position:fixed; margin-top:57px; right:310px; z-index:3; float:right;"><font face="Open Sans" size="3">Olá, <?php echo $row_Recordset4['nome']; ?></font> </div>
<!-- cabeçlho divs publicar logo carrinho user etc...-->
<div id="calc">
<?php do { ?>

<?php 
$b1 = $b1 + $row_Recordset8['Valor_da_Taxa'];
$a1 = $a1 + $row_Recordset8['valor']; 
?>
 <?php } while ($row_Recordset8 = mysql_fetch_assoc($Recordset8)); ?>
 
<?php 
$a3 = $b1 + $a1;
?> 
<div id="top">


<div id="barrinha"></div>

<a href="cad_evento.php">


<div id="publicar">

<div id="tpublicar"><font face="Arial, Helvetica, sans-serif">PUBLICAR EVENTO </font></div>

<div id="tgratis"><font face="Arial, Helvetica, sans-serif">grátis</font></div>

</div>

</a>

<div id="carrinho"> <a href="carrinho.php"><img src="images/carrinhomercado3.png" width="100%" height="100%"></a></div>

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
  
    <td width="41%" align="center" valign="middle">
    
    <font face="Open Sans" size="3" color="#FFFFFF"> <?php echo $totalRows_Recordset8 ?>&nbsp; Ingressos &nbsp; no&nbsp;</font>
     
    </td>
    
    <td width="34%" align="left" valign="middle">
    
    <img src="images/carrinhomercado2.png" width="30" height="30" />
    
    </td>
    
    <td width="25%" align="center" valign="middle">
    
    <font face="Open Sans" size="3" color="#FFFFFF">R$ <?php 
echo $a3;
echo ',00';
?></font>
    
    </td>
    
  </tr>
  
</table>

</div>

<div id="ingresso2">
<table width="100%" border="1" bgcolor="#FFFFFF" align="center"  class="pagamento">
<tr><td>
<br />
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><div id="btcompra">

      
       <table width="100%"  height="100%" border="0" cellspacing="0" cellpadding="0">
        
        <tr>
          
          <td align="center" valign="middle">             
            <a href="carrinho.php"><font face="Open Sans" size="3" color="#FFFFFF">COMPRAR INGESSOS</font></a>
            
            </td><td> <font face="Open Sans" size="2" color="#FFFFFF">em <br />até</font></td><td align="left"> <font face="Open Sans extrabold" size="+3" color="#FFFFFF"> 12X  </font></td>
          
          </tr>
        
        </table></td>
  </tr>
</table>

<br />

</td></tr>      
  
  <tr>
  <td>
    

  <?php do { ?><form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  
  
  
    <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
      
      <tr>
        
        <td width="73%" align="left">
          
          <font face="Open Sans extrabold" size="3"><?php echo $row_Recordset6['tipo_de_ingresso']; ?></font>
          
          </td>
        
        <td width="27%" rowspan="3" align="center" valign="middle">
          
          <div id="contador" align="center">
            
            <div id="sub" class="sub1<?php echo $row_Recordset6['id']; ?>"> <a href="carrinho.php"><img src="images/menos.png" width="20" height="20"></a>
              
              </div> 
            
            <div id="numero">
              
              <font face="Open Sans Semibold" size="3"></font>
              
              </div> 
            
            <div id="soma" class="soma1<?php echo $row_Recordset6['id']; ?>">
              <input class="btmais" type="submit" value="" />
              <img src="images/mais.png" width="20" height="20">
              
              </div>
            
            </div> 
          
          </td>
        
        </tr>
      
      <tr>
        
        <td>
          
          <font face="Open Sans" size="3">R$<?php echo $row_Recordset6['valor_ingresso']; ?> &nbsp;(+R$ <?php echo $row_Recordset6['valor_taxa']; ?>% taxa)</font>
          
          </td>
        
        </tr>
      
      <tr>
        
        <td height="27">
          
          <font face="Open Sans" size="3">Vendas até <?php echo $row_Recordset6['data_limite_de_venda']; ?></font>
          
          </td>
        
        </tr>
      
    </table>
    
  <hr width="90%" align="center" color="#FF0000"/>
    
    
    
      <script type="text/javascript">

		<!-- contador 0 inicio -->    
		
		
		
        var contadorn<?php echo $row_Recordset6['id']; ?> = document.querySelector('.soma<?php echo $row_Recordset6['id']; ?>');

document.querySelector('.soma1<?php echo $row_Recordset6['id']; ?>').addEventListener('click', function(){
  var numeron<?php echo $row_Recordset6['id']; ?> = parseInt(contadorn<?php echo $row_Recordset6['id']; ?>.textContent) + 1;
  contadorn<?php echo $row_Recordset6['id']; ?>.textContent = numeron<?php echo $row_Recordset6['id']; ?>;
});
document.querySelector('.sub1<?php echo $row_Recordset6['id']; ?>').addEventListener('click', function(){
  var numeron<?php echo $row_Recordset6['id']; ?> = parseInt(contadorn<?php echo $row_Recordset6['id']; ?>.textContent) - 1;
  contadorn<?php echo $row_Recordset6['id']; ?>.textContent = numeron<?php echo $row_Recordset6['id']; ?>;
});
      	<!-- contador 1 fim -->
		
<!-- contador 0 inicio -->
        var contador<?php echo $row_Recordset6['id']; ?> = document.querySelector('#valor');

document.querySelector('.soma1<?php echo $row_Recordset6['id']; ?>').addEventListener('click', function(){
  var numero<?php echo $row_Recordset6['id']; ?> = parseInt(contador<?php echo $row_Recordset6['id']; ?>.textContent) + <?php echo $row_Recordset6['valor_ingresso']; ?> + (<?php echo $row_Recordset6['valor_ingresso']; ?>* (<?php echo $row_Recordset6['valor_taxa']; ?>/100)) ;
  contador<?php echo $row_Recordset6['id']; ?>.textContent = numero<?php echo $row_Recordset6['id']; ?>;
});
document.querySelector('.sub1<?php echo $row_Recordset6['id']; ?>').addEventListener('click', function(){
  var numero<?php echo $row_Recordset6['id']; ?> = parseInt(contador<?php echo $row_Recordset6['id']; ?>.textContent) - <?php echo $row_Recordset6['valor_ingresso']; ?> 
  contador<?php echo $row_Recordset6['id']; ?>.textContent = numero<?php echo $row_Recordset6['id']; ?>;
});
      	<!-- contador 1 fim -->		
		
		
		</script>
      
       
        <input class="sumir" type="text" name="nome" value="<?php echo $row_Recordset4['nome']; ?>" size="32" />
       
        <input class="sumir" type="text" name="cpf" value="<?php echo $row_Recordset4['cpf']; ?>
		
		<?php echo $row_Recordset7['cnpj']; ?>" size="32" />
       
        <input class="sumir" type="text" name="email" value="<?php echo $row_Recordset4['email']; ?>
		
		<?php echo $row_Recordset7['email']; ?>" size="32" />
        
        <input class="sumir" type="text" name="evento" value="<?php echo $row_Recordset1['nome_do_evento']; ?>" size="32" />
       
        <input class="sumir" type="text" name="data_evento" value="<?php echo $row_Recordset1['data_do_evento_inicio_dia'],'/',$row_Recordset1['data_do_evento_inicio_mes'],'/',$row_Recordset1['data_do_evento_inicio_ano']; ?>" size="32" />
        
        <input class="sumir" type="text" name="local_evento" value="<?php echo $row_Recordset1['local_do_evento']; ?>" size="32" />
        
        <input class="sumir" type="text" name="Cidade_bairro" value="<?php echo $row_Recordset1['bairro_cidade_do_evento']; ?>" size="32" />
        
        <input class="sumir" type="text" name="tipo_de_ingresso" value="<?php echo $row_Recordset6['tipo_de_ingresso']; ?>" size="32" />
        
          <input class="sumir" type="text" name="valor" value="<?php echo $row_Recordset6['valor_ingresso']; ?>" size="32" />
          <input class="sumir" type="text" name="taxa" value="<?php echo $row_Recordset6['valor_taxa']; ?>" size="32" />
          <input class="sumir" type="text" name="codigo_do_ingresso" value="<?php echo $row_Recordset5['id'],'-',$row_Recordset5['id_evento'],'-',$row_Recordset4['id'],'-',$row_Recordset5['data_hora'],'-',$row_Recordset4['id']; ?>" size="32" />
          
          <input class="sumir" type="text" name="orientacoes_do_evento" value="" size="32" />
          
          <input class="sumir" type="text" name="protocolo" value="<?php echo $row_Recordset5['id'],'-',$row_Recordset5['id_evento'],'-', $row_Recordset5['data_hora'],'-',$row_Recordset4['id'],'-',$row_Recordset4['id']; ?>" size="32" />
          
          <input class="sumir" type="text" name="patrocinio" value="<?php echo $row_Recordset1['produtor'],'-',$row_Recordset1['data_hora']; ?>" size="32" />
          
          <input class="sumir" type="text" name="id_do_evento" value="<?php echo $row_Recordset1['id']; ?>" size="32" />
          
          <input class="sumir" type="submit" value="Inserir registro" />

 		  <input class="sumir" type="hidden" name="MM_insert" value="form1" />
 		  <input type="hidden" name="MM_insert" value="form1" />
     
      </form>
<?php } while ($row_Recordset6 = mysql_fetch_assoc($Recordset6)); ?>
 
</td>

</tr>

</table>
</div></div>
<!--div compra de ingress fim  -->





<!-- detalhe do evento fim  -->


<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);

mysql_free_result($Recordset3);

mysql_free_result($Recordset4);

mysql_free_result($Recordset5);

mysql_free_result($Recordset6);

mysql_free_result($Recordset7);

mysql_free_result($Recordset8);
?>
