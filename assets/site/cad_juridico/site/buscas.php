<?php require_once('Connections/conexao.php'); ?>
<?php require_once('Connections/conexao2.php'); ?>
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

$maxRows_Recordset1 = 20;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_conexao2, $conexao2);
$query_Recordset1 = "SELECT * FROM cad_evento ORDER BY id DESC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $conexao2) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

mysql_select_db($database_conexao2, $conexao2);
$query_Recordset2 = "SELECT * FROM asides ORDER BY id DESC";
$Recordset2 = mysql_query($query_Recordset2, $conexao2) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

mysql_select_db($database_conexao2, $conexao2);
$query_Recordset3 = "SELECT * FROM cad_cliente";
$Recordset3 = mysql_query($query_Recordset3, $conexao2) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Gospel Eventos direcionada para todo publico gospel "/>
 <link rel="icon" type="image/png" href="images/icons/Logo-Marca3.ico"/>
<meta name="keywords" content="locais , Eventos , Serviços Comemorações&nbsp; "/>
<META NAME="ABSTRACT" CONTENT="Destinado a todo publico gospel  ">
<META NAME="KEYWORDS" CONTENT="Evangélico e Gospel">
<META NAME="ROBOT" CONTENT="All">
<META NAME="RATING" CONTENT="general">
<META NAME="DISTRIBUTION" CONTENT="global">
<META NAME="LANGUAGE" CONTENT="PT">
<meta name="author" content="Allan Jeferson" />
<title>Gospel Eventos</title>
<link href="css/busca.css" rel="stylesheet" type="text/css" />
<link href="css/buscafiltros.css" rel="stylesheet" type="text/css" />
<link href="css/card.css" rel="stylesheet" type="text/css" />

<link href="css/asside_buscas.css" rel="stylesheet" type="text/css" />


<style type="text/css">
@import url("OpenSans_Light/stylesheet.css");
@import url("OpenSans_Semibold/stylesheet.css");
@import url("OpenSans_ExtraBold/stylesheet.css");
@import url("../../webfonts/OpenSans_Regular/stylesheet.css");

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
	color: #000;
}
#fundo #card #local table tr td {
	font-family: "OpenSans Light";
	color: #000;
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
.div_ola {
	font-family: "OpenSans Regular";
}
</style>





</head>

<body>
<div id="ola" style="display:block; position:fixed; margin-top:60px; right:310px; z-index:3; float:right;"><span class="div_ola">Olá, <?php echo $row_Recordset3['nome']; ?></span> </div>
<div id="infobuscacelular">

<font face="Open Sans extrabold" size="+2"><?php echo $totalRows_Recordset1 ?>  eventos</font>

<font face="Open Sans">encontrados com o filtro </font>

</div>


<div id="top">


<div id="infobusca">

<table height="100%" border="0" align="center" cellpadding="5" cellspacing="0" id="tbinfobusca">

  <tr>
  
    <td align="center" valign="middle">
    
    <font face="Open Sans extrabold"><h1><?php echo $totalRows_Recordset1 ?></h1></font>
    
    </td>
    
    <td align="center" valign="middle">
    
    <font face="Open Sans semibold"><h2>eventos</h2></font>
    
    </td>
    
    <td align="center" valign="middle">
    
    <font face="Open Sans Light"><h4>encontrados com o filtro </h4></font>
    
    </td>
    
    <td align="center" valign="middle" id="complemento_busca">
    
    <img src="images/filtos2.png" width="25" height="30" />
    
    </td>
    
    <td align="center" valign="middle" id="complemento_busca">
    
    <font face="Open Sans Light"><h4>Rio de janeiro / Todas as datas</h4></font>
    
    </td>
    
  </tr>
  
</table>

</div>

<div id="barrinha"></div>

<a href="cad_evento.php">

<div id="publicar">

<div id="tpublicar">

<font face="Arial, Helvetica, sans-serif">PUBLICAR EVENTO </font>

</div> 

<div id="tgratis"><font face="Arial, Helvetica, sans-serif">grátis</font>

</div>

</div>

</a>

<div id="carrinho">

<a href="carrinho.php">

<img src="images/carrinhomercado3.png" width="100%" height="100%">

</a>

</div>

<div id="user"> 

  <div align="center">
    <a href="area_do_cliente_fisico.php"><img src="images/usuario3.png"> </a></div>
 </div> 

<div id="seguindo"> 

<a href="assets/index.html">

<img src="images/senguindo2.png" width="100%" height="100%" />

</a>

</div>

</div>

<div id="logo" align="center">

<a href="index.php">

<img src="images/logomarcadas.png" width="100%" height="100%"  />

</a>

</div>

<aside id="esquerda">

<img src="aside/<?php echo $row_Recordset2['aside_esquerda']; ?>" width="100%" height="100%" />

</aside>

<aside id="direita">

<img src="aside/<?php echo $row_Recordset2['aside_direita']; ?>" width="100%" height="100%"/>

</aside>

<div id="buscat"> 

<div id="campos2">
	
<input id="novobusca" type="text" placeholder="Eventos, Artistas, Locais, Organizações" />
 	
</div>

<div id="campos">

<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" class="style1">

  <tr>
  
    <td id="1" valign="top" style="height: 44px" class="style2" width="40%">
	
      <table  border="0" id="eventos">
      
					<tr>
                    
						<td class="eventos">
                        
						<input type="text" id="inbusca1" placeholder=" Eventos, Artistas, Locais, Organizações" >
                        
                        </td>
                        
						<td class="imgeventos">
                        
                        <img src="images/lupa.png" width="20px" height="20px" />
                        
                        </td>
                        
					</tr>
                    
	</table>
    
	</td>
    
    <td id="2" valign="44px" width="30%" class="style9">
    
    <table border="0" id="cidade" cellspacing="1">
    
					<tr>
									
                                    <td align="left" valign="middle" class="cidade">
                                    
                                    <input type="text" id="inbusca2" placeholder=" Cidade ou Estado">
                                    
                                    </td>
									
                                    
                                    <td class="imgcidade">
                                    
                                    <img src="images/gps.png" width="18" height="28" />
                                    
                                    </td>
                                    
					</tr>
                    
	</table>
    
    </td>
    
    <td id="3" style="height: 44px" class="style10 tbbordir" width="20%">
						
                        <table id="tbdate" width="100%" border="0" cellspacing="0" cellpadding="0">
  	
    <tr>
  	
    <td width="100%" align="center">
    
    <input type="date">
    
    <input type="date">
    
    </td>
    
  	</tr>
  
	</table>
    
	</td>
    
    <td id="4" valign="top" style="height: 44px" class="style3" width="10%">
    
    <table border="0" id="filtros" cellspacing="1">
    
					<tr>
                    
					  <td class="filtos">
                      
                      <input type="text" id="inbusca4" placeholder=" +Filtros">
                      
                      </td>
                      
					  <td class="imgfiltos">
                      
      				  <img src="images/filtos.png" width="20px" height="28px" />
                      
                      </td>
                      
					</tr>
                    
	</table>
    
    </td>
    
  </tr>
  
</table>

</div>

<div id="btbusca" style="display:flex;justify-content:center;align-items:center;">

<font face="Arial, Helvetica, sans-serif">BUSCAR</font> 

</div>

</div>


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
   
    <td class="tabe1">
    
    <div align="center" >
    
    <A href="#">
    
    <img src="images/seguindo.png" width="100%" height="100%" />
    
    </A>
    
    </div>
    
    </td>
   
    <td class="tabd1">
    
    <div align="center" >
    
    <A href="#">
    
    <img src="images/contatos.png" width="100%" height="100%" />
    
    </A>
    
    </div>
    
    </td>
 
  </tr>
 
  <tr>
   
    <td class="tabe2">
    
    <div align="center" >
    
    <A href="#">
    
    <img src="images/anuncie.png" width="100%" height="100%" />
    
    </A>
    
    </div>
    
    </td>
   
    <td class="tabd2">
    
    <div align="center" >
    
    <A href="#">
    
    <img src="images/como funciona.png" width="100%" height="100%" />
    
    </A>
    
    </div>
    
    </td>
 
  </tr>
  
  <tr>
   
    <td class="tabe3">
    
    <div align="center" >
    
    <A href="#">
    
    <img src="images/organizadores.png" width="100%" height="100%" />
    
    </A>
    
    </div>
    
    </td>
   
    <td class="tabd3">
    
    <div align="center">
    
    <A href="#">
    
    <img src="images/quem somos.png" width="100%" height="100%" />
    
    </A>
    
    </div>
    
    </td>
  
  </tr>
  
  <tr>
   
    <td colspan="2" class="tab4">
    
    <div align="center" >
    
    <A href="#">
    
    <img src="images/locais.png" width="100%" height="100%" />
    
    </A>
    
    </div>
    
    </td>
   
    </tr>
    
  <tr>
  
    <td colspan="2" class="tab5">
    
    <div align="center" style=" cursor:pointer">
    
    <A href="#">
    
    <img src="images/eventos.png" width="100%" height="100%" />
    
    </A>
    
    </div>
    
    </td>
    
    </tr>
    
</table>

</li>

</ul>


<div id="fundo">

<main class="flex-centralizado mainDiv1" >

<!-- card novo allan-->

 <?php do { ?>
   <div id="card">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
    
    <td>
      <a href="evento.php?id=<?php echo $row_Recordset1['id']; ?>">
      <div class="container imagem" style="    background-image: url('fotos/<?php echo $row_Recordset1['foto_banner']; ?>');">
     
        
          <map name = "shape">
            
          </map>
          
          </div></a>
      
      </td>
    
    </tr>
  
</table>
       
       
     
     <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
       
       <td colspan="7" align="center" valign="middle" height="50px">
         
          <a href="evento.php?id=<?php echo $row_Recordset1['id']; ?>"><font face='OpenSans ExtraBold' color="#FF0000" size="5"><?php echo $row_Recordset1['nome_do_evento']; ?></font></a>
         
         </td>
         
         </tr>
       
       <tr>
         
         <td width="41%" rowspan="2" align="right" valign="middle">
           
           <font face='OpenSans ExtraBold' color="#000000" size="5"> 
             
             <a href="evento.php?id=<?php echo $row_Recordset1['id']; ?>"><?php echo $row_Recordset1['data_do_evento_inicio_dia']; ?>/<?php echo $row_Recordset1['data_do_evento_inicio_mes']; ?></a>
             
             </font> 
           
           <a href="evento.php?id=<?php echo $row_Recordset1['id']; ?>">
             
             <font face='OpenSans Light'> <?php echo $row_Recordset1['data_do_evento_inicio_ano']; ?></font>
             
             </a>
           
           </td>
         
         <td colspan="6">
           
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
             
             <tr>
               
               <td width="60%" align="center" valign="middle" class="categorias">
                 
                 <a href="evento.php?id=<?php echo $row_Recordset1['id']; ?>"><?php echo $row_Recordset1['hora_de_inicio']; ?>hs</a>
                 
                 </td>
               
               <td width="60%" align="left" valign="middle" class="categorias">Início</td>
               
               </tr>
             
             </table>
           
           </td>
         
         </tr>
       
       <tr>
         
         <td colspan="6">
           
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
             
             <tr>
               
               <td width="60%"  align="center" valign="middle" class="categorias">
                 
                 <a href="evento.php?id=<?php echo $row_Recordset1['id']; ?>"><?php echo $row_Recordset1['hora_de_fim']; ?>hs</a>
                 
                 </td>
               
               <td width="60%"  align="left" valign="middle" class="categorias">Fim</td>
               
               </tr>
             
             </table>
           
           </td>
         
         </tr>
       
       <tr>
         
         
         <td colspan="7" height="40px">
           
           <font face='OpenSans Light' class="categorias"> 
             
             <a href="evento.php?id=<?php echo $row_Recordset1['id']; ?>">Categoria: </a>
             
             </font>
           
           <a href="evento.php?id=<?php echo $row_Recordset1['id']; ?>">
             
             <font face="OpenSans ExtraBold" ><?php echo $row_Recordset1['categoria_do_evento']; ?></font>
             
             </a>
           
           </td>
         
         </tr>
       
       <tr>
         
         
         <td colspan="6" height="40px" class="local">
           
           <a href="evento.php?id=<?php echo $row_Recordset1['id']; ?>"><?php echo $row_Recordset1['bairro_cidade_do_evento']; ?></a>
           
           </td>
         
         <td width="30px"  rowspan="2" align="center" valign="middle">
           
           <div style="display:<?php echo $row_Recordset1['cadeirante']; ?>"><img src="images/cadeirante.png" width="30px" height="30px" /></div>
           
           </td>
         
         </tr>
       
       <tr>
         
         <td colspan="6" height="30px" class="local2">
           
           <a href="evento.php?id=<?php echo $row_Recordset1['id']; ?>"><?php echo $row_Recordset1['local_do_evento']; ?></a>
           
           </td>
         
         </tr>
       
       </table>
     
     
   </div>
   <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
<!--aqui termina o card-->

 


<!--aqui termina o card-->

</main>

</div>   


</body>

</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);

mysql_free_result($Recordset3);
?>
