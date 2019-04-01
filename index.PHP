<?php require_once('Connections/conexao.php'); ?>
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

mysql_select_db($database_conexao, $conexao);
$query_Recordset1 = "SELECT * FROM slaid_1 ORDER BY id DESC";
$Recordset1 = mysql_query($query_Recordset1, $conexao) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_conexao, $conexao);
$query_Recordset2 = "SELECT * FROM slaid_2 ORDER BY id DESC";
$Recordset2 = mysql_query($query_Recordset2, $conexao) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

mysql_select_db($database_conexao, $conexao);
$query_Recordset3 = "SELECT * FROM slaid_3 ORDER BY id DESC";
$Recordset3 = mysql_query($query_Recordset3, $conexao) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);

mysql_select_db($database_conexao, $conexao);
$query_Recordset4 = "SELECT * FROM slaid_4 ORDER BY id DESC";
$Recordset4 = mysql_query($query_Recordset4, $conexao) or die(mysql_error());
$row_Recordset4 = mysql_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysql_num_rows($Recordset4);

mysql_select_db($database_conexao, $conexao);
$query_Recordset5 = "SELECT * FROM slaid_5 ORDER BY id DESC";
$Recordset5 = mysql_query($query_Recordset5, $conexao) or die(mysql_error());
$row_Recordset5 = mysql_fetch_assoc($Recordset5);
$totalRows_Recordset5 = mysql_num_rows($Recordset5);

mysql_select_db($database_conexao, $conexao);
$query_Recordset6 = "SELECT * FROM slaid_6";
$Recordset6 = mysql_query($query_Recordset6, $conexao) or die(mysql_error());
$row_Recordset6 = mysql_fetch_assoc($Recordset6);
$totalRows_Recordset6 = mysql_num_rows($Recordset6);

mysql_select_db($database_conexao, $conexao);
$query_Recordset7 = "SELECT * FROM slaid_7 ORDER BY id DESC";
$Recordset7 = mysql_query($query_Recordset7, $conexao) or die(mysql_error());
$row_Recordset7 = mysql_fetch_assoc($Recordset7);
$totalRows_Recordset7 = mysql_num_rows($Recordset7);
?>
<!DOCTYPE html>
<html class="nojs html css_verticalspacer" lang="pt-BR">
 <head>

  
  <script type="text/javascript">
   // Update the 'nojs'/'js' class on the html node
document.documentElement.className = document.documentElement.className.replace(/\bnojs\b/g, 'js');

// Check that all required assets are uploaded and up-to-date
if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["museutils.js", "museconfig.js", "jquery.watch.js", "webpro.js", "musewpslideshow.js", "jquery.museoverlay.js", "touchswipe.js", "jquery.musepolyfill.bgsize.js", "jquery.museresponsive.js", "require.js", "index.css"], "outOfDate":[]};
</script>

  
  <title>Gospel Eventos</title>
  
  
<link rel="stylesheet" type="text/css" href="css/site_global.css?crc=444006867"/>
  
<link rel="stylesheet" type="text/css" href="css/index.css" id="pagesheet"/>
  
<link rel="icon" type="image/png" href="images/icons/Logo-Marca3.ico"/>

<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  
<meta name="generator" content="2018.1.0.386"/>

<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  
<meta name="description" content="Gospel Eventos direcionada para todo publico gospel "/> 

<meta name="keywords" content="locais , Eventos , Serviços Comemorações&nbsp; "/>

<META NAME="ABSTRACT" CONTENT="Destinado a todo publico gospel  ">

<META NAME="KEYWORDS" CONTENT="Evangélico e Gospel">

<META NAME="ROBOT" CONTENT="All">

<META NAME="RATING" CONTENT="general">

<META NAME="DISTRIBUTION" CONTENT="global">

<META NAME="LANGUAGE" CONTENT="PT">

<meta name="author" content="Allan Jeferson" />
  
  
  <!-- IE-only CSS -->
  <!--[if lt IE 9]>
  <link rel="stylesheet" type="text/css" href="css/iefonts_index.css?crc=3824530138"/>
  <link rel="stylesheet" type="text/css" href="css/nomq_index.css?crc=70364817" id="nomq_pagesheet"/>
  <![endif]-->
  <!-- Other scripts -->
  <script type="text/javascript">
   var __adobewebfontsappname__ = "muse";
</script>
  <!-- JS includes -->
  <script src="https://webfonts.creativecloud.com/open-sans:n8,n7:default.js" type="text/javascript"></script>
</head>
 <body>

 
  <div class="breakpoint active" id="bp_infinity" data-min-width="1151"><!-- responsive breakpoint node -->
  
   <div class="clearfix borderbox" id="page"><!-- group -->
   
    <div class="clearfix grpelem" id="pslideshowu94"><!-- group -->
    
     <div class="SlideShowWidget clearfix HeroFillFrame grpelem" id="slideshowu94" data-visibility="changed" style="visibility:hidden"><!-- none box -->
     
      <div class="popup_anchor allow_click_through" data-col-pos="0" id="u110popup">
      
       <div class="SlideShowContentPanel clearfix fullscreen" data-col-pos="0" id="u110"><!-- stack box -->
        
        <div class="SSSlide clip_frame fullscreen" data-col-pos="0" id="u115"><!-- image -->
         
         <img class="ImageInclude" data-col-pos="0" id="u115_img" data-src="FOTOS/<?php echo $row_Recordset1['img']; ?>" src="images/blank.gif?crc=4208392903" alt="" data-width="2000" data-height="1467"/>
         
         <div class="clearfix grpelem hero" id="u3199-16">
           <!-- content -->
           
           <h1><strong><font size="+6"><b><?php echo $row_Recordset1['titulo']; ?></b></font></strong></h1>
           
           <h3><?php echo $row_Recordset1['linha_1']; ?></h3>
           
           <h3><?php echo $row_Recordset1['linha_2']; ?></h3>
           
           <h3><?php echo $row_Recordset1['linha_3']; ?></h3>
          
           <h3><?php echo $row_Recordset1['linha_4']; ?><br><?php echo $row_Recordset1['linha_5']; ?></h3>
             
           
           <h3><?php echo $row_Recordset1['linha_6']; ?></h3>
         
         
         </div>
        
        </div>
        
        <div class="SSSlide invi clip_frame fullscreen" data-col-pos="1" id="u243"><!-- image -->
         
         <img class="ImageInclude" data-col-pos="1" id="u243_img" data-src="FOTOS/<?php echo $row_Recordset2['img']; ?>" src="images/blank.gif?crc=4208392903" alt="" data-width="2000" data-height="1500"/>
         
         <div class="clearfix grpelem hero" id="u3199-16">
           <!-- content -->
           
           <h1><strong><font size="+6"><b><?php echo $row_Recordset2['titulo']; ?></b></font></strong></h1>
           
           <h3><?php echo $row_Recordset2['linha_1']; ?></h3>
           
           <h3><?php echo $row_Recordset2['linha_2']; ?></h3>
           
           <h3><?php echo $row_Recordset2['linha_3']; ?></h3>
          
           <h3><?php echo $row_Recordset2['linha_4']; ?><br><?php echo $row_Recordset2['linha_5']; ?></h3>
             
           
           <h3><?php echo $row_Recordset2['linha_6']; ?></h3>
         
         </div>
        
        </div>
        
        <div class="SSSlide invi clip_frame fullscreen" data-col-pos="2" id="u263"><!-- image -->
         
         <img class="ImageInclude" data-col-pos="2" id="u263_img" data-src="FOTOS/<?php echo $row_Recordset3['img']; ?>" src="images/blank.gif?crc=4208392903" alt="" data-width="2000" data-height="1333"/>
         
         <div class="clearfix grpelem hero" id="u3199-16">
           <!-- content -->
           
           <h1><strong><font size="+6"><b><?php echo $row_Recordset3['titulo']; ?></b></font></strong></h1>
           
           <h3><?php echo $row_Recordset3['linha_1']; ?></h3>
           
           <h3><?php echo $row_Recordset3['linha_2']; ?></h3>
           
           <h3><?php echo $row_Recordset3['linha_3']; ?></h3>
           
           <h3><?php echo $row_Recordset3['linha_4']; ?><br><?php echo $row_Recordset3['linha_5']; ?></h3>
             
           
           <h3><?php echo $row_Recordset3['linha_6']; ?></h3>
         
         </div>
        
        </div>
        
        <div class="SSSlide invi clip_frame fullscreen" data-col-pos="3" id="u283"><!-- image -->
         
         <img class="ImageInclude" data-col-pos="3" id="u283_img" data-src="FOTOS/<?php echo $row_Recordset4['img']; ?>" src="images/blank.gif?crc=4208392903" alt="" data-width="2000" data-height="1125"/>
         
         <div class="clearfix grpelem hero" id="u3199-16">
           <!-- content -->
           
           <h1><strong><font size="+6"><b><?php echo $row_Recordset4['titulo']; ?></b></font></strong></h1>
           
           <h3><?php echo $row_Recordset4['linha_1']; ?></h3>
           
           <h3><?php echo $row_Recordset4['linha_2']; ?></h3>
           
           <h3><?php echo $row_Recordset4['linha_3']; ?></h3>
           
           <h3><?php echo $row_Recordset4['linha_4']; ?><br><?php echo $row_Recordset4['linha_5']; ?></h3>
             
          
           <h3><?php echo $row_Recordset4['linha_6']; ?></h3>
        
         </div>
        
        </div>
        
        <div class="SSSlide invi clip_frame fullscreen" data-col-pos="4" id="u303"><!-- image -->
        
         <img class="ImageInclude" data-col-pos="4" id="u303_img" data-src="FOTOS/<?php echo $row_Recordset5['img']; ?>" src="images/blank.gif?crc=4208392903" alt="" data-width="2000" data-height="1331"/>
        
         <div class="clearfix grpelem hero" id="u3199-16">
           <!-- content -->
           
           <h1>
           
           <strong>
           
           <font size="+6"><b><?php echo $row_Recordset5['titulo']; ?></b></font>
           
           </strong>
           
           </h1>
           
           <h3><?php echo $row_Recordset5['linha_1']; ?></h3>
           
           <h3><?php echo $row_Recordset5['linha_2']; ?></h3>
           
           <h3><?php echo $row_Recordset5['linha_3']; ?></h3>
           
           <h3><?php echo $row_Recordset5['linha_4']; ?><br> <?php echo $row_Recordset5['linha_5']; ?></h3>
            
        
           <h3><?php echo $row_Recordset5['linha_6']; ?></h3>
        
         </div>
       
        </div>
       
        <div class="SSSlide invi clip_frame fullscreen" data-col-pos="5" id="u323"><!-- image -->
         
         <img class="ImageInclude" data-col-pos="5" id="u323_img" data-src="FOTOS/<?php echo $row_Recordset6['img']; ?>" src="images/blank.gif?crc=4208392903" alt="" data-width="2000" data-height="1125"/>
        
        <div class="clearfix grpelem hero" id="u3199-16">
           <!-- content -->
           
           <h1>
           
           <strong>
           
           <font size="+6"><b><?php echo $row_Recordset6['titulo']; ?></b></font>
           
           </strong>
           
           </h1>
           
           <h3><?php echo $row_Recordset6['linha_1']; ?></h3>
          
           <h3><?php echo $row_Recordset6['linha_2']; ?></h3>
           
           <h3><?php echo $row_Recordset6['linha_3']; ?></h3>
           
           <h3><?php echo $row_Recordset6['linha_4']; ?><br><?php echo $row_Recordset6['linha_5']; ?></h3>
             
           
           <h3><?php echo $row_Recordset6['linha_6']; ?></h3>
        
         </div>
        
        </div>
        
        <div class="SSSlide invi clip_frame fullscreen" data-col-pos="6" id="u343"><!-- image -->
         
         <img class="ImageInclude" data-col-pos="6" id="u343_img" data-src="FOTOS/<?php echo $row_Recordset7['img']; ?>" src="images/blank.gif?crc=4208392903" alt="" data-width="2000" data-height="1125"/>
         
         <div class="clearfix grpelem hero" id="u3199-16">
           <!-- content -->
           
           <h1><strong><font size="+6"><b><?php echo $row_Recordset6['titulo']; ?></b></font></strong></h1>
           
           <h2><?php echo $row_Recordset7['linha_1']; ?></h2>
           
           <h2><?php echo $row_Recordset7['linha_2']; ?></h3>
           
           <h2><?php echo $row_Recordset7['linha_3']; ?></h2>
           
           <h2><?php echo $row_Recordset7['linha_4']; ?><br><?php echo $row_Recordset7['linha_5']; ?></h2>
             
          
           <h2><?php echo $row_Recordset7['linha_6']; ?></h2>
        
        </div>
        
        </div>
      
	</div>
      
      </div>
     
      <div class="popup_anchor allow_click_through" data-col-pos="4" id="u108-4popup">
      
       <img class="SSPreviousButton temp_no_img_src" data-col-pos="4" id="u108-4" alt="" width="70" height="72" data-orig-src="images/u108-4.png?crc=4157794724" src="images/blank.gif?crc=4208392903"/><!-- rasterized frame -->
     
      </div>
      
      <div class="popup_anchor allow_click_through" data-col-pos="1" id="u101popup">
       
       <div class="SSSlideLinks clearfix" data-col-pos="1" id="u101"><!-- horizontal-rows box -->
       
        <div class="SSSlideLink rounded-corners transition grpelem" data-col-pos="0" id="u102" data-sizePolicy="fixed" data-pintopage="page_fluidx"><!-- image --></div>
       
        <div class="SSSlideLink rounded-corners transition grpelem" data-col-pos="1" id="u249" data-sizePolicy="fixed" data-pintopage="page_fluidx"><!-- image --></div>
        
        <div class="SSSlideLink rounded-corners transition grpelem" data-col-pos="2" id="u269" data-sizePolicy="fixed" data-pintopage="page_fluidx"><!-- image --></div>
        
        <div class="SSSlideLink rounded-corners transition grpelem" data-col-pos="3" id="u289" data-sizePolicy="fixed" data-pintopage="page_fluidx"><!-- image --></div>
       
        <div class="SSSlideLink rounded-corners transition grpelem" data-col-pos="4" id="u309" data-sizePolicy="fixed" data-pintopage="page_fluidx"><!-- image --></div>
       
        <div class="SSSlideLink rounded-corners transition grpelem" data-col-pos="5" id="u329" data-sizePolicy="fixed" data-pintopage="page_fluidx"><!-- image --></div>
        
        <div class="SSSlideLink rounded-corners transition grpelem" data-col-pos="6" id="u349" data-sizePolicy="fixed" data-pintopage="page_fluidx"><!-- image --></div>
      
       </div>
      
      </div>
      
      <div class="popup_anchor allow_click_through" data-col-pos="5" id="u99-4popup">
      
       <img class="SSNextButton temp_no_img_src" data-col-pos="5" id="u99-4" alt="" width="70" height="72" data-orig-src="images/u99-4.png?crc=306563860" src="images/blank.gif?crc=4208392903"/><!-- rasterized frame -->
     
      </div>
     
     </div>
     
     <div class="gradient shared_content" id="u363" data-mu-ie-matrix="progid:DXImageTransform.Microsoft.Matrix(M11=-1,M12=0,M21=0,M22=-1,SizingMethod='auto expand')" data-mu-ie-matrix-dx="0" data-mu-ie-matrix-dy="0" data-content-guid="u363_content"><!-- simple frame -->
     
     </div>
    
    </div>
   
    <div class="gradient shared_content" id="u3361" data-content-guid="u3361_content"><!-- simple frame --></div>
    
    <div class="museBGSize shared_content" id="u464" data-content-guid="u464_content"><!-- simple frame --></div>
   
    <div class="rounded-corners clearfix shared_content" id="u3397-8" data-content-guid="u3397-8_content"><!-- content -->
     
     <p id="u3397-2">Eventos</p>
    
     <p id="u3397-4">neste</p>
    
     <p id="u3397-6">fim de semana</p>
    
    </div>
    
    <div class="rounded-corners shared_content" id="u443" data-content-guid="u443_content"><!-- simple frame --></div>
    
    <form onsubmit="window.location.href='buscas.html';" class="form-grp clearfix" id="widgetu451" method="post" enctype="multipart/form-data" action="scripts/form-u451.php" data-sizePolicy="fixed" data-pintopage="topcenter"><!-- none box -->
     
     <div class="clearfix grpelem" id="u463-3" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"><!-- content -->
    
      <p class="shared_content" data-content-guid="u463-3_0_content">&nbsp;</p>
    
     </div>
    
     <div class="clearfix grpelem" id="u461-3" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"><!-- content -->
    
      <p class="shared_content" data-content-guid="u461-3_0_content">&nbsp;</p>
    
     </div>
     
     <div class="clearfix grpelem" id="u462-3" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"><!-- content -->
     
      <p class="shared_content" data-content-guid="u462-3_0_content">&nbsp;</p>
    
     </div>
    
     <button class="submit-btn NoWrap rounded-corners clearfix" id="u452-4" type="submit" value="BUSCAR" tabindex="2"><!-- content -->
     
      <div style="margin-top:0px;height:20px;" class="shared_content" data-content-guid="u452-4_0_content">
      
       <p>BUSCAR</p>
     
      </div>
     
     </button>
    
     <div class="fld-grp clearfix grpelem" id="widgetu453" data-required="true" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"><!-- none box -->
      
      <span class="fld-input NoWrap actAsDiv clearfix grpelem" id="u455-4" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"><!-- content -->
      
      <div id="u455-3">
      
      <input class="wrapped-input shared_content" type="text" spellcheck="false" id="widgetu453_input" name="custom_U453" tabindex="1" data-sizePolicy="fixed" data-pintopage="page_fixedLeft" data-content-guid="widgetu453_input_content"/>
      
      <label class="wrapped-input fld-prompt" id="widgetu453_prompt" for="widgetu453_input">
      
      <span class="actAsPara shared_content" data-content-guid="widgetu453_prompt_0_content">Cidade ou Estado</span>
      
      </label>
      
      </div></span>
    
     </div>
   
    </form>
   
    <a class="nonblock nontext museBGSize shared_content" id="u448" href="assets/index.php" target="_blank" data-content-guid="u448_content"><!-- simple frame --></a>
    
    <a class="nonblock nontext museBGSize shared_content" id="u449" href="assets/index.php" target="_blank" data-content-guid="u449_content"><!-- simple frame --></a>
   
    <div class="museBGSize shared_content" id="u450" data-content-guid="u450_content"><!-- simple frame --></div>
    
    <a class="nonblock nontext Button rounded-corners clearfix shared_content" id="buttonu444" href="assets/index.php" data-content-guid="buttonu444_content"><!-- container box -->
    
    <div class="clearfix grpelem" id="u447-7" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"><!-- content -->
    
    <p id="u447-2">PUBLICAR</p>
    
    <p id="u447-5"><span id="u447-3">EVENTO</span><span id="u447-4"></span></p>
    
    </div>
    
    <div class="rounded-corners grpelem" id="u445" data-sizePolicy="fixed" data-pintopage="page_fluidx"><!-- simple frame --></div>
    
    <div class="clearfix grpelem" id="u446-4" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"><!-- content -->
    
    <p>grátis</p>
   
    </div>
    
    </a>
    
    <div class="rounded-corners clearfix shared_content" id="u3396-8" data-content-guid="u3396-8_content"><!-- content -->
     
     <p id="u3396-2">+Categorias</p>
     
     <p id="u3396-4">e</p>
     
     <p id="u3396-6">+Subcategorias</p>
    
    </div>
   
    <div class="verticalspacer" data-offset-top="120" data-content-above-spacer="728" data-content-below-spacer="608" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"></div>
  
   </div>
 
  </div>
  
  <div class="breakpoint" id="bp_1150" data-min-width="801" data-max-width="1150"><!-- responsive breakpoint node -->
  
   <div class="clearfix borderbox temp_no_id" data-orig-id="page"><!-- group -->
   
    <div class="clearfix grpelem" id="ppslideshowu94"><!-- column -->
    
     <div class="clearfix colelem temp_no_id" data-orig-id="pslideshowu94"><!-- group -->
      
      <div class="SlideShowWidget clearfix HeroFillFrame grpelem temp_no_id" data-visibility="changed" style="visibility:hidden" data-orig-id="slideshowu94"><!-- none box -->
      
       <div class="clearfix grpelem" id="pu110"><!-- column -->
       
        <div class="popup_anchor allow_click_through temp_no_id" data-col-pos="0" data-orig-id="u110popup">
         
         <div class="SlideShowContentPanel clearfix fullscreen temp_no_id" data-col-pos="0" data-orig-id="u110"><!-- stack box -->
          
          <div class="SSSlide clip_frame fullscreen temp_no_id" data-col-pos="0" data-orig-id="u115"><!-- image -->
           
           <img class="ImageInclude temp_no_id" data-col-pos="0" data-src="FOTOS/<?php echo $row_Recordset1['img']; ?>" src="images/blank.gif?crc=4208392903" alt="" data-width="1150" data-height="844" data-orig-id="u115_img"/>
          
          <div class="clearfix grpelem hero" id="u3199-16"><!-- content -->
     
     <h1><strong><font size="+6"><b><?php echo $row_Recordset1['titulo']; ?></b></font></strong></h1>
           
           <h3><?php echo $row_Recordset1['linha_1']; ?></h3>
           
           <h3><?php echo $row_Recordset1['linha_2']; ?></h3>
           
           <h3><?php echo $row_Recordset1['linha_3']; ?></h3>
          
           <h3><?php echo $row_Recordset1['linha_4']; ?><br><?php echo $row_Recordset1['linha_5']; ?></h3>
             
           
           <h3><?php echo $row_Recordset1['linha_6']; ?></h3>
         
    
    </div></div>
          
          <div class="SSSlide invi clip_frame fullscreen temp_no_id" data-col-pos="1" data-orig-id="u243"><!-- image -->
           
           <img class="ImageInclude temp_no_id" data-col-pos="1" data-src="FOTOS/<?php echo $row_Recordset2['img']; ?>" src="images/blank.gif?crc=4208392903" alt="" data-width="1150" data-height="863" data-orig-id="u243_img"/>
           
           <div class="clearfix grpelem hero" id="u3199-16">
             <!-- content -->
             
             <h1><strong><font size="+6"><b><?php echo $row_Recordset2['titulo']; ?></b></font></strong></h1>
           
           <h3><?php echo $row_Recordset2['linha_1']; ?></h3>
           
           <h3><?php echo $row_Recordset2['linha_2']; ?></h3>
           
           <h3><?php echo $row_Recordset2['linha_3']; ?></h3>
          
           <h3><?php echo $row_Recordset2['linha_4']; ?><br><?php echo $row_Recordset2['linha_5']; ?></h3>
             
           
           <h3><?php echo $row_Recordset2['linha_6']; ?></h3>
         
           
           </div>
          
          </div>
          
          <div class="SSSlide invi clip_frame fullscreen temp_no_id" data-col-pos="2" data-orig-id="u263"><!-- image -->
           
           <img class="ImageInclude temp_no_id" data-col-pos="2" data-src="FOTOS/<?php echo $row_Recordset3['img']; ?>" src="images/blank.gif?crc=4208392903" alt="" data-width="1150" data-height="766" data-orig-id="u263_img"/>
           
           <div class="clearfix grpelem hero" id="u3199-16">
             <!-- content -->
             
             <h1><strong><font size="+6"><b><?php echo $row_Recordset3['titulo']; ?></b></font></strong></h1>
           
           <h3><?php echo $row_Recordset3['linha_1']; ?></h3>
           
           <h3><?php echo $row_Recordset3['linha_2']; ?></h3>
           
           <h3><?php echo $row_Recordset3['linha_3']; ?></h3>
          
           <h3><?php echo $row_Recordset3['linha_4']; ?><br><?php echo $row_Recordset3['linha_5']; ?></h3>
             
           
           <h3><?php echo $row_Recordset3['linha_6']; ?></h3>
         
           
           </div>
          
          </div>
          
          <div class="SSSlide invi clip_frame fullscreen temp_no_id" data-col-pos="3" data-orig-id="u283"><!-- image -->
           
           <img class="ImageInclude temp_no_id" data-col-pos="3" data-src="FOTOS/<?php echo $row_Recordset4['img']; ?>" src="images/blank.gif?crc=4208392903" alt="" data-width="1289" data-height="725" data-orig-id="u283_img"/>
          
           <div class="clearfix grpelem hero" id="u3199-16">
             <!-- content -->
             
             <h1><strong><font size="+6"><b><?php echo $row_Recordset4['titulo']; ?></b></font></strong></h1>
           
           <h3><?php echo $row_Recordset4['linha_1']; ?></h3>
           
           <h3><?php echo $row_Recordset4['linha_2']; ?></h3>
           
           <h3><?php echo $row_Recordset4['linha_3']; ?></h3>
          
           <h3><?php echo $row_Recordset4['linha_4']; ?><br><?php echo $row_Recordset4['linha_5']; ?></h3>
             
           
           <h3><?php echo $row_Recordset4['linha_6']; ?></h3>
         
           
           </div>
          
          </div>
          
          <div class="SSSlide invi clip_frame fullscreen temp_no_id" data-col-pos="4" data-orig-id="u303"><!-- image -->
           
           <img class="ImageInclude temp_no_id" data-col-pos="4" data-src="FOTOS/<?php echo $row_Recordset5['img']; ?>" src="images/blank.gif?crc=4208392903" alt="" data-width="1150" data-height="765" data-orig-id="u303_img"/>
           
           <div class="clearfix grpelem hero" id="u3199-16">
             <!-- content -->
             
             <h1><strong><font size="+6"><b><?php echo $row_Recordset5['titulo']; ?></b></font></strong></h1>
           
           <h3><?php echo $row_Recordset5['linha_1']; ?></h3>
           
           <h3><?php echo $row_Recordset5['linha_2']; ?></h3>
           
           <h3><?php echo $row_Recordset5['linha_3']; ?></h3>
          
           <h3><?php echo $row_Recordset5['linha_4']; ?><br><?php echo $row_Recordset1['linha_5']; ?></h3>
             
           
           <h3><?php echo $row_Recordset5['linha_6']; ?></h3>
         
           
           </div>
          
          </div>
          
          <div class="SSSlide invi clip_frame fullscreen temp_no_id" data-col-pos="5" data-orig-id="u323"><!-- image -->
          
           <img class="ImageInclude temp_no_id" data-col-pos="5" data-src="FOTOS/<?php echo $row_Recordset6['img']; ?>" src="images/blank.gif?crc=4208392903" alt="" data-width="1289" data-height="725" data-orig-id="u323_img"/>
           
           <div class="clearfix grpelem hero" id="u3199-16">
             <!-- content -->
             
             <h1><strong><font size="+6"><b><?php echo $row_Recordset6['titulo']; ?></b></font></strong></h1>
           
           <h3><?php echo $row_Recordset6['linha_1']; ?></h3>
           
           <h3><?php echo $row_Recordset6['linha_2']; ?></h3>
           
           <h3><?php echo $row_Recordset6['linha_3']; ?></h3>
          
           <h3><?php echo $row_Recordset6['linha_4']; ?><br><?php echo $row_Recordset6['linha_5']; ?></h3>
             
           
           <h3><?php echo $row_Recordset6['linha_6']; ?></h3>
         
           
           </div>
          
          </div>
          
          <div class="SSSlide invi clip_frame fullscreen temp_no_id" data-col-pos="6" data-orig-id="u343"><!-- image -->
           
           <img class="ImageInclude temp_no_id" data-col-pos="6" data-src="FOTOS/<?php echo $row_Recordset7['img']; ?>" src="images/blank.gif?crc=4208392903" alt="" data-width="1289" data-height="725" data-orig-id="u343_img"/>
           
           <div class="clearfix grpelem hero" id="u3199-16">
             <!-- content -->
             
             <h1><strong><font size="+6"><b><?php echo $row_Recordset7['titulo']; ?></b></font></strong></h1>
           
           <h3><?php echo $row_Recordset7['linha_1']; ?></h3>
           
           <h3><?php echo $row_Recordset7['linha_2']; ?></h3>
           
           <h3><?php echo $row_Recordset7['linha_3']; ?></h3>
          
           <h3><?php echo $row_Recordset7['linha_4']; ?><br><?php echo $row_Recordset7['linha_5']; ?></h3>
             
           
           <h3><?php echo $row_Recordset7['linha_6']; ?></h3>
         
               
            
         
          
           </div>
         
          </div>
        
         </div>
        
        </div>
        
        <div class="popup_anchor allow_click_through temp_no_id" data-col-pos="4" data-orig-id="u108-4popup">
        
         <img class="SSPreviousButton pinned-colelem temp_no_id temp_no_img_src" data-col-pos="4" alt="" width="70" height="72" data-orig-src="images/u108-42.png?crc=4157794724" data-orig-id="u108-4" src="images/blank.gif?crc=4208392903"/><!-- rasterized frame -->
        
        </div>
       
       </div>
       
       <div class="clearfix grpelem" id="pu101"><!-- group -->
        
        <div class="popup_anchor allow_click_through temp_no_id" data-col-pos="1" data-orig-id="u101popup">
         
         <div class="SSSlideLinks clearfix temp_no_id" data-col-pos="1" data-orig-id="u101"><!-- horizontal-rows box -->
          
          <div class="SSSlideLink rounded-corners transition grpelem temp_no_id" data-col-pos="0" data-sizePolicy="fixed" data-pintopage="page_fluidx" data-orig-id="u102"><!-- image --></div>
          
          <div class="SSSlideLink rounded-corners transition grpelem temp_no_id" data-col-pos="1" data-sizePolicy="fixed" data-pintopage="page_fluidx" data-orig-id="u249"><!-- image --></div>
          
          <div class="SSSlideLink rounded-corners transition grpelem temp_no_id" data-col-pos="2" data-sizePolicy="fixed" data-pintopage="page_fluidx" data-orig-id="u269"><!-- image --></div>
         
          <div class="SSSlideLink rounded-corners transition grpelem temp_no_id" data-col-pos="3" data-sizePolicy="fixed" data-pintopage="page_fluidx" data-orig-id="u289"><!-- image --></div>
          
          <div class="SSSlideLink rounded-corners transition grpelem temp_no_id" data-col-pos="4" data-sizePolicy="fixed" data-pintopage="page_fluidx" data-orig-id="u309"><!-- image --></div>
          
          <div class="SSSlideLink rounded-corners transition grpelem temp_no_id" data-col-pos="5" data-sizePolicy="fixed" data-pintopage="page_fluidx" data-orig-id="u329"><!-- image --></div>
         
          <div class="SSSlideLink rounded-corners transition grpelem temp_no_id" data-col-pos="6" data-sizePolicy="fixed" data-pintopage="page_fluidx" data-orig-id="u349"><!-- image --></div>
         
         </div>
        
        </div>
        
        <div class="popup_anchor allow_click_through temp_no_id" data-col-pos="5" data-orig-id="u99-4popup">
         
         <img class="SSNextButton temp_no_id temp_no_img_src" data-col-pos="5" alt="" width="70" height="72" data-orig-src="images/u99-42.png?crc=306563860" data-orig-id="u99-4" src="images/blank.gif?crc=4208392903"/><!-- rasterized frame -->
       
        </div>
       
       </div>
      
      </div>
     
      <span class="gradient placeholder" data-placeholder-for="u363_content"><!-- placeholder node --></span>
     
     </div>
    
     <span class="gradient pinned-colelem placeholder" data-placeholder-for="u3361_content"><!-- placeholder node --></span>
    
    </div>
    
    <span class="museBGSize placeholder" data-placeholder-for="u464_content"><!-- placeholder node --></span>
    
    <span class="rounded-corners placeholder" data-placeholder-for="u443_content"><!-- placeholder node --></span>
    
    <span class="rounded-corners clearfix placeholder" data-placeholder-for="u3397-8_content"><!-- placeholder node --></span>
    
    <form onsubmit="window.location.href='buscas.html';" class="form-grp clearfix temp_no_id" method="post" enctype="multipart/form-data" action="scripts/form-u451.php" data-sizePolicy="fluidWidth" data-pintopage="topleft" data-orig-id="widgetu451"><!-- none box -->
    
     <div class="clearfix grpelem" id="pu463-3"><!-- group -->
     
      <div class="clearfix grpelem temp_no_id" data-sizePolicy="fixed" data-pintopage="page_fixedLeft" data-orig-id="u463-3"><!-- content -->
       
       <span class="placeholder" data-placeholder-for="u463-3_0_content"><!-- placeholder node --></span>
      
      </div>
      
      <div class="clearfix grpelem temp_no_id" data-sizePolicy="fixed" data-pintopage="page_fixedLeft" data-orig-id="u461-3"><!-- content -->
      
       <span class="placeholder" data-placeholder-for="u461-3_0_content"><!-- placeholder node --></span>
     
      </div>
     
      <div class="clearfix grpelem temp_no_id" data-sizePolicy="fixed" data-pintopage="page_fixedLeft" data-orig-id="u462-3"><!-- content -->
      
       <span class="placeholder" data-placeholder-for="u462-3_0_content"><!-- placeholder node --></span>
      
      </div>
      
      <div class="fld-grp clearfix grpelem temp_no_id" data-required="true" data-sizePolicy="fixed" data-pintopage="page_fixedLeft" data-orig-id="widgetu453"><!-- none box -->
       
       <span class="fld-input NoWrap actAsDiv clearfix grpelem temp_no_id" data-sizePolicy="fixed" data-pintopage="page_fixedLeft" data-orig-id="u455-4"><!-- content -->
       
       <div class="temp_no_id" data-orig-id="u455-3">
       
       <span class="wrapped-input placeholder" data-placeholder-for="widgetu453_input_content"><!-- placeholder node --></span>
       
       <label class="wrapped-input fld-prompt temp_no_id" for="widgetu453_input" data-orig-id="widgetu453_prompt">
       
       <span class="actAsPara placeholder" data-placeholder-for="widgetu453_prompt_0_content"><!-- placeholder node -->
       
       </span>
       
       </label>
       
       </div>
       
       </span>
      
      </div>
     
     </div>
     
     <button class="submit-btn NoWrap rounded-corners clearfix temp_no_id" type="submit" value="BUSCAR" tabindex="4" data-orig-id="u452-4"><!-- content -->
     
      <span class="placeholder" data-placeholder-for="u452-4_0_content"><!-- placeholder node --></span>
     
     </button>
    
    </form>
    
    <div class="clearfix temp_no_id" data-orig-id="u12584"><!-- group -->
     
     <span class="clearfix placeholder" data-placeholder-for="u3769-9_content"><!-- placeholder node --></span>
     
     <span class="clearfix placeholder" data-placeholder-for="u3770-13_content"><!-- placeholder node --></span>
     
     <span class="clearfix placeholder" data-placeholder-for="u3771-10_content"><!-- placeholder node --></span>
     
     <span class="clearfix placeholder" data-placeholder-for="u3772-8_content"><!-- placeholder node --></span>
     
     <span class="clearfix placeholder" data-placeholder-for="u3773-8_content"><!-- placeholder node --></span>
     
     <span class="clearfix placeholder" data-placeholder-for="u3774-8_content"><!-- placeholder node --></span>
   
    </div>
    
    <span class="nonblock nontext museBGSize placeholder" data-placeholder-for="u448_content"><!-- placeholder node --></span>
    
    <span class="nonblock nontext museBGSize placeholder" data-placeholder-for="u449_content"><!-- placeholder node --></span>
    
    <span class="museBGSize placeholder" data-placeholder-for="u450_content"><!-- placeholder node --></span>
    
    <span class="nonblock nontext Button rounded-corners clearfix placeholder" data-placeholder-for="buttonu444_content"><!-- placeholder node --></span>
    
    <span class="rounded-corners clearfix placeholder" data-placeholder-for="u3396-8_content"><!-- placeholder node --></span>
    
    <div class="verticalspacer" data-offset-top="120" data-content-above-spacer="725" data-content-below-spacer="605" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"></div>
   
   </div>
  
  </div>
 
  <div class="breakpoint" id="bp_800" data-min-width="551" data-max-width="800"><!-- responsive breakpoint node -->
   
   <div class="clearfix borderbox temp_no_id" data-orig-id="page"><!-- group -->
    
    <div class="clearfix grpelem temp_no_id" data-orig-id="ppslideshowu94"><!-- column -->
     
     <div class="clearfix colelem temp_no_id" data-orig-id="pslideshowu94"><!-- group -->
      
      <div class="SlideShowWidget clearfix HeroFillFrame grpelem temp_no_id" data-visibility="changed" style="visibility:hidden" data-orig-id="slideshowu94"><!-- none box -->
      
       <div class="popup_anchor allow_click_through temp_no_id" data-col-pos="0" data-orig-id="u110popup">
        
        <div class="SlideShowContentPanel clearfix fullscreen temp_no_id" data-col-pos="0" data-orig-id="u110"><!-- stack box -->
         
         <div class="SSSlide clip_frame fullscreen temp_no_id" data-col-pos="0" data-orig-id="u115"><!-- image -->
          
          <img class="ImageInclude temp_no_id" data-col-pos="0" data-src="FOTOS/<?php echo $row_Recordset1['img']; ?>" src="images/blank.gif?crc=4208392903" alt="" data-width="957" data-height="702" data-orig-id="u115_img"/>
          
          <div class="clearfix grpelem hero" id="u3199-16">
            <!-- content -->
            
            <h1><strong><font size="+6"><b><?php echo $row_Recordset1['titulo']; ?></b></font></strong></h1>
           
           <h3><?php echo $row_Recordset1['linha_1']; ?></h3>
           
           <h3><?php echo $row_Recordset1['linha_2']; ?></h3>
           
           <h3><?php echo $row_Recordset1['linha_3']; ?></h3>
          
           <h3><?php echo $row_Recordset1['linha_4']; ?><br><?php echo $row_Recordset1['linha_5']; ?></h3>
             
           
           <h3><?php echo $row_Recordset1['linha_6']; ?></h3>
         
          </div>
         
         </div>
         
         <div class="SSSlide invi clip_frame fullscreen temp_no_id" data-col-pos="1" data-orig-id="u243"><!-- image -->
          
          <img class="ImageInclude temp_no_id" data-col-pos="1" data-src="FOTOS/<?php echo $row_Recordset2['img']; ?>" src="images/blank.gif?crc=4208392903" alt="" data-width="936" data-height="702" data-orig-id="u243_img"/>
          
          <div class="clearfix grpelem hero" id="u3199-16">
            <!-- content -->
            
            <h1><strong><font size="+6"><b><?php echo $row_Recordset2['titulo']; ?></b></font></strong></h1>
           
           <h3><?php echo $row_Recordset2['linha_1']; ?></h3>
           
           <h3><?php echo $row_Recordset2['linha_2']; ?></h3>
           
           <h3><?php echo $row_Recordset2['linha_3']; ?></h3>
          
           <h3><?php echo $row_Recordset2['linha_4']; ?><br><?php echo $row_Recordset2['linha_5']; ?></h3>
             
           
           <h3><?php echo $row_Recordset2['linha_6']; ?></h3>
         
          
          </div>
         
         </div>
         
         <div class="SSSlide invi clip_frame fullscreen temp_no_id" data-col-pos="2" data-orig-id="u263"><!-- image -->
          
          <img class="ImageInclude temp_no_id" data-col-pos="2" data-src="FOTOS/<?php echo $row_Recordset3['img']; ?>" src="images/blank.gif?crc=4208392903" alt="" data-width="1053" data-height="702" data-orig-id="u263_img"/>
          
          <div class="clearfix grpelem hero" id="u3199-16">
            <!-- content -->
            
            <h1><strong><font size="+6"><b><?php echo $row_Recordset3['titulo']; ?></b></font></strong></h1>
           
           <h3><?php echo $row_Recordset3['linha_1']; ?></h3>
           
           <h3><?php echo $row_Recordset3['linha_2']; ?></h3>
           
           <h3><?php echo $row_Recordset3['linha_3']; ?></h3>
          
           <h3><?php echo $row_Recordset3['linha_4']; ?><br><?php echo $row_Recordset3['linha_5']; ?></h3>
             
           
           <h3><?php echo $row_Recordset3['linha_6']; ?></h3>
         
          
          </div>
         
         </div>
         
         <div class="SSSlide invi clip_frame fullscreen temp_no_id" data-col-pos="3" data-orig-id="u283"><!-- image -->
          
          <img class="ImageInclude temp_no_id" data-col-pos="3" data-src="FOTOS/<?php echo $row_Recordset4['img']; ?>" src="images/blank.gif?crc=4208392903" alt="" data-width="1248" data-height="702" data-orig-id="u283_img"/>
          
          <div class="clearfix grpelem hero" id="u3199-16">
            <!-- content -->
            
            <h1><strong><font size="+6"><b><?php echo $row_Recordset4['titulo']; ?></b></font></strong></h1>
           
           <h3><?php echo $row_Recordset4['linha_1']; ?></h3>
           
           <h3><?php echo $row_Recordset4['linha_2']; ?></h3>
           
           <h3><?php echo $row_Recordset4['linha_3']; ?></h3>
          
           <h3><?php echo $row_Recordset4['linha_4']; ?><br><?php echo $row_Recordset4['linha_5']; ?></h3>
             
           
           <h3><?php echo $row_Recordset4['linha_6']; ?></h3>
         
          </div>
         
         </div>
         
         <div class="SSSlide invi clip_frame fullscreen temp_no_id" data-col-pos="4" data-orig-id="u303"><!-- image -->
          
          <img class="ImageInclude temp_no_id" data-col-pos="4" data-src="FOTOS/<?php echo $row_Recordset5['img']; ?>" src="images/blank.gif?crc=4208392903" alt="" data-width="1055" data-height="702" data-orig-id="u303_img"/>
          
          <div class="clearfix grpelem hero" id="u3199-16">
            <!-- content -->
            
            <h1><strong><font size="+6"><b><?php echo $row_Recordset5['titulo']; ?></b></font></strong></h1>
           
           <h3><?php echo $row_Recordset5['linha_1']; ?></h3>
           
           <h3><?php echo $row_Recordset5['linha_2']; ?></h3>
           
           <h3><?php echo $row_Recordset5['linha_3']; ?></h3>
          
           <h3><?php echo $row_Recordset5['linha_4']; ?><br><?php echo $row_Recordset5['linha_5']; ?></h3>
             
           
           <h3><?php echo $row_Recordset5['linha_6']; ?></h3>
         
          
          </div>
         
         </div>
         
         <div class="SSSlide invi clip_frame fullscreen temp_no_id" data-col-pos="5" data-orig-id="u323"><!-- image -->
          
          <img class="ImageInclude temp_no_id" data-col-pos="5" data-src="FOTOS/<?php echo $row_Recordset6['img']; ?>" src="images/blank.gif?crc=4208392903" alt="" data-width="1248" data-height="702" data-orig-id="u323_img"/>
          
          <div class="clearfix grpelem hero" id="u3199-16">
            <!-- content -->
            
           <h1><strong><font size="+6"><b><?php echo $row_Recordset6['titulo']; ?></b></font></strong></h1>
           
           <h3><?php echo $row_Recordset6['linha_1']; ?></h3>
           
           <h3><?php echo $row_Recordset6['linha_2']; ?></h3>
           
           <h3><?php echo $row_Recordset6['linha_3']; ?></h3>
          
           <h3><?php echo $row_Recordset6['linha_4']; ?><br><?php echo $row_Recordset6['linha_5']; ?></h3>
             
           
           <h3><?php echo $row_Recordset6['linha_6']; ?></h3>
         
          
          </div>
         
         </div>
         
         <div class="SSSlide invi clip_frame fullscreen temp_no_id" data-col-pos="6" data-orig-id="u343"><!-- image -->
         
          <img class="ImageInclude temp_no_id" data-col-pos="6" data-src="FOTOS/<?php echo $row_Recordset7['img']; ?>" src="images/blank.gif?crc=4208392903" alt="" data-width="1248" data-height="702" data-orig-id="u343_img"/>
          
          <div class="clearfix grpelem hero" id="u3199-16">
            <!-- content -->
            
            <h1><strong><font size="+6"><b><?php echo $row_Recordset7['titulo']; ?></b></font></strong></h1>
           
           <h3><?php echo $row_Recordset7['linha_1']; ?></h3>
           
           <h3><?php echo $row_Recordset7['linha_2']; ?></h3>
           
           <h3><?php echo $row_Recordset7['linha_3']; ?></h3>
          
           <h3><?php echo $row_Recordset7['linha_4']; ?><br><?php echo $row_Recordset7['linha_5']; ?></h3>
             
           
           <h3><?php echo $row_Recordset7['linha_6']; ?></h3>
         
          
          </div>
         
         </div>
        
        </div>
       
       </div>
       
       <div class="popup_anchor allow_click_through temp_no_id" data-col-pos="4" data-orig-id="u108-4popup">
        
        <img class="SSPreviousButton temp_no_id temp_no_img_src" data-col-pos="4" alt="" width="70" height="72" data-orig-src="images/u108-43.png?crc=4157794724" data-orig-id="u108-4" src="images/blank.gif?crc=4208392903"/><!-- rasterized frame -->
       
       </div>
       
       <div class="popup_anchor allow_click_through temp_no_id" data-col-pos="1" data-orig-id="u101popup">
       
        <div class="SSSlideLinks clearfix temp_no_id" data-col-pos="1" data-orig-id="u101"><!-- horizontal-rows box -->
         
         <div class="SSSlideLink rounded-corners transition grpelem temp_no_id" data-col-pos="0" data-sizePolicy="fixed" data-pintopage="page_fluidx" data-orig-id="u102"><!-- image --></div>
         
         <div class="SSSlideLink rounded-corners transition grpelem temp_no_id" data-col-pos="1" data-sizePolicy="fixed" data-pintopage="page_fluidx" data-orig-id="u249"><!-- image --></div>
         
         <div class="SSSlideLink rounded-corners transition grpelem temp_no_id" data-col-pos="2" data-sizePolicy="fixed" data-pintopage="page_fluidx" data-orig-id="u269"><!-- image --></div>
         
         <div class="SSSlideLink rounded-corners transition grpelem temp_no_id" data-col-pos="3" data-sizePolicy="fixed" data-pintopage="page_fluidx" data-orig-id="u289"><!-- image --></div>
         
         <div class="SSSlideLink rounded-corners transition grpelem temp_no_id" data-col-pos="4" data-sizePolicy="fixed" data-pintopage="page_fluidx" data-orig-id="u309"><!-- image --></div>
         
         <div class="SSSlideLink rounded-corners transition grpelem temp_no_id" data-col-pos="5" data-sizePolicy="fixed" data-pintopage="page_fluidx" data-orig-id="u329"><!-- image --></div>
         
         <div class="SSSlideLink rounded-corners transition grpelem temp_no_id" data-col-pos="6" data-sizePolicy="fixed" data-pintopage="page_fluidx" data-orig-id="u349"><!-- image --></div>
        
        </div>
       
       </div>
       
       <div class="popup_anchor allow_click_through temp_no_id" data-col-pos="5" data-orig-id="u99-4popup">
        
        <img class="SSNextButton temp_no_id temp_no_img_src" data-col-pos="5" alt="" width="70" height="72" data-orig-src="images/u99-43.png?crc=306563860" data-orig-id="u99-4" src="images/blank.gif?crc=4208392903"/><!-- rasterized frame -->
       
       </div>
      
      </div>
      
      <span class="gradient placeholder" data-placeholder-for="u363_content"><!-- placeholder node --></span>
     
     </div>
     
     <span class="gradient pinned-colelem placeholder" data-placeholder-for="u3361_content"><!-- placeholder node --></span>
    
    </div>
    
    <span class="museBGSize placeholder" data-placeholder-for="u464_content"><!-- placeholder node --></span>
    
    <span class="rounded-corners placeholder" data-placeholder-for="u443_content"><!-- placeholder node --></span>
    
    <span class="rounded-corners clearfix placeholder" data-placeholder-for="u3397-8_content"><!-- placeholder node --></span>
    
    
    <form onsubmit="window.location.href='buscas.html';" class="form-grp clearfix temp_no_id" method="post" enctype="multipart/form-data" action="scripts/form-u451.php" data-sizePolicy="fluidWidth" data-pintopage="topleft" data-orig-id="widgetu451"><!-- none box -->
     
     <div class="clearfix grpelem temp_no_id" data-orig-id="pu463-3"><!-- group -->
      
      <div class="clearfix grpelem temp_no_id" data-sizePolicy="fixed" data-pintopage="page_fixedLeft" data-orig-id="u463-3"><!-- content -->
       
       <span class="placeholder" data-placeholder-for="u463-3_0_content"><!-- placeholder node --></span>
      
      </div>
      
      <div class="clearfix grpelem temp_no_id" data-sizePolicy="fixed" data-pintopage="page_fixedLeft" data-orig-id="u461-3"><!-- content -->
      
      <span class="placeholder" data-placeholder-for="u461-3_0_content"><!-- placeholder node --></span>
     
     </div>
      
      <div class="clearfix grpelem temp_no_id" data-sizePolicy="fixed" data-pintopage="page_fixedLeft" data-orig-id="u462-3"><!-- content -->
       
       <span class="placeholder" data-placeholder-for="u462-3_0_content"><!-- placeholder node --></span>
      
      </div>
      
      <div class="fld-grp clearfix grpelem temp_no_id" data-required="true" data-sizePolicy="fluidWidth" data-pintopage="page_fluidx" data-orig-id="widgetu453"><!-- none box -->
       
       <span class="fld-input NoWrap actAsDiv clearfix grpelem temp_no_id" data-orig-id="u455-4"><!-- content -->
       
       <div class="temp_no_id" data-orig-id="u455-3">
       
       <span class="wrapped-input placeholder" data-placeholder-for="widgetu453_input_content"><!-- placeholder node --></span>
       
       <label class="wrapped-input fld-prompt temp_no_id" for="widgetu453_input" data-orig-id="widgetu453_prompt">
       
       <span class="actAsPara placeholder" data-placeholder-for="widgetu453_prompt_0_content"><!-- placeholder node --></span>
       
       </label></div></span>
      
      </div>
     
     </div>
     
     <button class="submit-btn NoWrap rounded-corners clearfix temp_no_id" type="submit" value="BUSCAR" tabindex="6" data-orig-id="u452-4"><!-- content -->
      
      <span class="placeholder" data-placeholder-for="u452-4_0_content"><!-- placeholder node --></span>
   
     </button>
    
    </form>
   
    <div class="clearfix temp_no_id" data-orig-id="u12584"><!-- group -->
      
      <span class="clearfix placeholder" data-placeholder-for="u3769-9_content"><!-- placeholder node --></span>
     
      <span class="clearfix placeholder" data-placeholder-for="u3770-13_content"><!-- placeholder node --></span>
      
      <span class="clearfix placeholder" data-placeholder-for="u3771-10_content"><!-- placeholder node --></span>
   
    </div>
    
    <span class="museBGSize placeholder" data-placeholder-for="u450_content"><!-- placeholder node --></span>
    
  
   
  
  
    <a href="assets/index.php"><span class="nonblock nontext museBGSize placeholder" data-placeholder-for="u449_content">
    
    <a href="assets/index.php"></a></span>
    
    </a>
    
    <a href="assets/index.php"><span class="nonblock nontext museBGSize placeholder" data-placeholder-for="u448_content">
    
    <a href="assets/index.php"></a></span>
    
    </a>
   
   
    
    <span class="nonblock nontext Button rounded-corners clearfix placeholder" data-placeholder-for="buttonu444_content"><!-- placeholder node --></span>
    
    <span class="rounded-corners clearfix placeholder" data-placeholder-for="u3396-8_content"><!-- placeholder node --></span>
   
    <div class="verticalspacer" data-offset-top="120" data-content-above-spacer="702" data-content-below-spacer="582" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"></div>
  
   </div>
 
  </div>
 
  <div class="breakpoint" id="bp_550" data-max-width="550"><!-- responsive breakpoint node -->
  
   <div class="clearfix borderbox temp_no_id" data-orig-id="page"><!-- group -->
   
    <div class="clearfix grpelem temp_no_id" data-orig-id="ppslideshowu94"><!-- column -->
    
     <div class="clearfix colelem temp_no_id" data-orig-id="pslideshowu94"><!-- group -->
      
      <div class="SlideShowWidget clearfix HeroFillFrame grpelem temp_no_id" data-visibility="changed" style="visibility:hidden" data-orig-id="slideshowu94"><!-- none box -->
      
       <div class="clearfix grpelem temp_no_id" data-orig-id="pu110"><!-- column -->
       
        <div class="popup_anchor allow_click_through temp_no_id" data-col-pos="0" data-orig-id="u110popup">
        
         <div class="SlideShowContentPanel clearfix fullscreen temp_no_id" data-col-pos="0" data-orig-id="u110"><!-- stack box -->
          
          <div class="SSSlide clip_frame fullscreen temp_no_id" data-col-pos="0" data-orig-id="u115"><!-- image -->
          
           <img class="ImageInclude temp_no_id" data-col-pos="0" data-src="FOTOS/<?php echo $row_Recordset1['img']; ?>" src="images/blank.gif?crc=4208392903" alt="" data-width="886" data-height="650" data-orig-id="u115_img"/>
           
           <div class="clearfix grpelem hero" id="u3199-16">
             <!-- content -->
             
            <h1><strong><font size="+6"><b><?php echo $row_Recordset1['titulo']; ?></b></font></strong></h1>
           
           <h3><?php echo $row_Recordset1['linha_1']; ?></h3>
           
           <h3><?php echo $row_Recordset1['linha_2']; ?></h3>
           
           <h3><?php echo $row_Recordset1['linha_3']; ?></h3>
          
           <h3><?php echo $row_Recordset1['linha_4']; ?><br><?php echo $row_Recordset1['linha_5']; ?></h3>
             
           
           <h3><?php echo $row_Recordset1['linha_6']; ?></h3>
         
           
           </div>
          
          </div>
          
          <div class="SSSlide invi clip_frame fullscreen temp_no_id" data-col-pos="1" data-orig-id="u243"><!-- image -->
           
           <img class="ImageInclude temp_no_id" data-col-pos="1" data-src="FOTOS/<?php echo $row_Recordset2['img']; ?>" src="images/blank.gif?crc=4208392903" alt="" data-width="867" data-height="650" data-orig-id="u243_img"/>
           
           <div class="clearfix grpelem hero" id="u3199-16">
             <!-- content -->
             
             <h1><strong><font size="+6"><b><?php echo $row_Recordset2['titulo']; ?></b></font></strong></h1>
           
           <h3><?php echo $row_Recordset2['linha_1']; ?></h3>
           
           <h3><?php echo $row_Recordset2['linha_2']; ?></h3>
           
           <h3><?php echo $row_Recordset2['linha_3']; ?></h3>
          
           <h3><?php echo $row_Recordset2['linha_4']; ?><br><?php echo $row_Recordset2['linha_5']; ?></h3>
             
           
           <h3><?php echo $row_Recordset2['linha_6']; ?></h3>
         
           </div>
          
          </div>
          
          <div class="SSSlide invi clip_frame fullscreen temp_no_id" data-col-pos="2" data-orig-id="u263"><!-- image -->
           
           <img class="ImageInclude temp_no_id" data-col-pos="2" data-src="FOTOS/<?php echo $row_Recordset3['img']; ?>" src="images/blank.gif?crc=4208392903" alt="" data-width="975" data-height="650" data-orig-id="u263_img"/>
           
           <div class="clearfix grpelem hero" id="u3199-16">
             <!-- content -->
            
            <h1><strong><font size="+6"><b><?php echo $row_Recordset3['titulo']; ?></b></font></strong></h1>
           
           <h3><?php echo $row_Recordset3['linha_1']; ?></h3>
           
           <h3><?php echo $row_Recordset3['linha_2']; ?></h3>
           
           <h3><?php echo $row_Recordset3['linha_3']; ?></h3>
          
           <h3><?php echo $row_Recordset3['linha_4']; ?><br><?php echo $row_Recordset1['linha_5']; ?></h3>
             
           
           <h3><?php echo $row_Recordset3['linha_6']; ?></h3>
         
           </div>
          
          </div>
          
          <div class="SSSlide invi clip_frame fullscreen temp_no_id" data-col-pos="3" data-orig-id="u283"><!-- image -->
           
           <img class="ImageInclude temp_no_id" data-col-pos="3" data-src="FOTOS/<?php echo $row_Recordset4['img']; ?>" src="images/blank.gif?crc=4208392903" alt="" data-width="1156" data-height="650" data-orig-id="u283_img"/>
           
           <div class="clearfix grpelem hero" id="u3199-16">
             <!-- content -->
             
             <h1><strong><font size="+6"><b><?php echo $row_Recordset1['titulo']; ?></b></font></strong></h1>
           
           <h3><?php echo $row_Recordset4['linha_1']; ?></h3>
           
           <h3><?php echo $row_Recordset4['linha_2']; ?></h3>
           
           <h3><?php echo $row_Recordset4['linha_3']; ?></h3>
          
           <h3><?php echo $row_Recordset4['linha_4']; ?><br><?php echo $row_Recordset4['linha_5']; ?></h3>
             
           
           <h3><?php echo $row_Recordset4['linha_6']; ?></h3>
         
           
           </div>
          
          </div>
          
          <div class="SSSlide invi clip_frame fullscreen temp_no_id" data-col-pos="4" data-orig-id="u303"><!-- image -->
           
           <img class="ImageInclude temp_no_id" data-col-pos="4" data-src="FOTOS/<?php echo $row_Recordset5['img']; ?>" src="images/blank.gif?crc=4208392903" alt="" data-width="977" data-height="650" data-orig-id="u303_img"/>
           
           <div class="clearfix grpelem hero" id="u3199-16">
             <!-- content -->
             
            <h1><strong><font size="+6"><b><?php echo $row_Recordset1['titulo']; ?></b></font></strong></h1>
           
           <h3><?php echo $row_Recordset5['linha_1']; ?></h3>
           
           <h3><?php echo $row_Recordset5['linha_2']; ?></h3>
           
           <h3><?php echo $row_Recordset5['linha_3']; ?></h3>
          
           <h3><?php echo $row_Recordset5['linha_4']; ?><br><?php echo $row_Recordset5['linha_5']; ?></h3>
             
           
           <h3><?php echo $row_Recordset5['linha_6']; ?></h3>
         
           
           </div>
          
          </div>
          
          <div class="SSSlide invi clip_frame fullscreen temp_no_id" data-col-pos="5" data-orig-id="u323"><!-- image -->
           
           <img class="ImageInclude temp_no_id" data-col-pos="5" data-src="FOTOS/<?php echo $row_Recordset6['img']; ?>" src="images/blank.gif?crc=4208392903" alt="" data-width="1156" data-height="650" data-orig-id="u323_img"/>
           
           <div class="clearfix grpelem hero" id="u3199-16">
             <!-- content -->
             
            <h1><strong><font size="+6"><b><?php echo $row_Recordset6['titulo']; ?></b></font></strong></h1>
           
           <h3><?php echo $row_Recordset6['linha_1']; ?></h3>
           
           <h3><?php echo $row_Recordset6['linha_2']; ?></h3>
           
           <h3><?php echo $row_Recordset6['linha_3']; ?></h3>
          
           <h3><?php echo $row_Recordset6['linha_4']; ?><br><?php echo $row_Recordset6['linha_5']; ?></h3>
             
           
           <h3><?php echo $row_Recordset6['linha_6']; ?></h3>
         
           </div>
          
          </div>
          
          <div class="SSSlide invi clip_frame fullscreen temp_no_id" data-col-pos="6" data-orig-id="u343"><!-- image -->
           
           <img class="ImageInclude temp_no_id" data-col-pos="6" data-src="FOTOS/<?php echo $row_Recordset7['img']; ?>" src="images/blank.gif?crc=4208392903" alt="" data-width="1156" data-height="650" data-orig-id="u343_img"/>
           
           <div class="clearfix grpelem hero" id="u3199-16">
             <!-- content -->
             
             <h1><strong><font size="+6"><b><?php echo $row_Recordset7['titulo']; ?></b></font></strong></h1>
           
           <h3><?php echo $row_Recordset7['linha_1']; ?></h3>
           
           <h3><?php echo $row_Recordset7['linha_2']; ?></h3>
           
           <h3><?php echo $row_Recordset7['linha_3']; ?></h3>
          
           <h3><?php echo $row_Recordset7['linha_4']; ?><br><?php echo $row_Recordset7['linha_5']; ?></h3>
             
           
           <h3><?php echo $row_Recordset7['linha_6']; ?></h3>
         
           </div>
          
          </div>
         
         </div>
        
        </div>
        
        <div class="popup_anchor allow_click_through temp_no_id" data-col-pos="4" data-orig-id="u108-4popup">
         
         <img class="SSPreviousButton pinned-colelem temp_no_id temp_no_img_src" data-col-pos="4" alt="" width="70" height="72" data-orig-src="images/u108-44.png?crc=4157794724" data-orig-id="u108-4" src="images/blank.gif?crc=4208392903"/><!-- rasterized frame -->
        
        </div>
       
       </div>
       
       <div class="clearfix grpelem temp_no_id" data-orig-id="pu101"><!-- group -->
        
        <div class="popup_anchor allow_click_through temp_no_id" data-col-pos="1" data-orig-id="u101popup">
         
         <div class="SSSlideLinks clearfix temp_no_id" data-col-pos="1" data-orig-id="u101"><!-- horizontal-rows box -->
          
          <div class="SSSlideLink rounded-corners transition grpelem temp_no_id" data-col-pos="0" data-sizePolicy="fixed" data-pintopage="page_fluidx" data-orig-id="u102"><!-- image --></div>
          
          <div class="SSSlideLink rounded-corners transition grpelem temp_no_id" data-col-pos="1" data-sizePolicy="fixed" data-pintopage="page_fluidx" data-orig-id="u249"><!-- image --></div>
          
          <div class="SSSlideLink rounded-corners transition grpelem temp_no_id" data-col-pos="2" data-sizePolicy="fixed" data-pintopage="page_fluidx" data-orig-id="u269"><!-- image --></div>
          
          <div class="SSSlideLink rounded-corners transition grpelem temp_no_id" data-col-pos="3" data-sizePolicy="fixed" data-pintopage="page_fluidx" data-orig-id="u289"><!-- image --></div>
          
          <div class="SSSlideLink rounded-corners transition grpelem temp_no_id" data-col-pos="4" data-sizePolicy="fixed" data-pintopage="page_fluidx" data-orig-id="u309"><!-- image --></div>
          
          <div class="SSSlideLink rounded-corners transition grpelem temp_no_id" data-col-pos="5" data-sizePolicy="fixed" data-pintopage="page_fluidx" data-orig-id="u329"><!-- image --></div>
          
          <div class="SSSlideLink rounded-corners transition grpelem temp_no_id" data-col-pos="6" data-sizePolicy="fixed" data-pintopage="page_fluidx" data-orig-id="u349"><!-- image --></div>
         
         </div>
       
       </div>
        
        <div class="popup_anchor allow_click_through temp_no_id" data-col-pos="5" data-orig-id="u99-4popup">
         
         <img class="SSNextButton temp_no_id temp_no_img_src" data-col-pos="5" alt="" width="70" height="72" data-orig-src="images/u99-44.png?crc=306563860" data-orig-id="u99-4" src="images/blank.gif?crc=4208392903"/><!-- rasterized frame -->
        
        </div>
       
       </div>
      
      </div>
      
      <span class="gradient placeholder" data-placeholder-for="u363_content"><!-- placeholder node --></span>
     
     </div>
     
   	<span class="gradient pinned-colelem placeholder" data-placeholder-for="u3361_content"><!-- placeholder node --></span>
    
    </div>
   
    <div id="u464-wrapper">
     
     <span class="museBGSize placeholder" data-placeholder-for="u464_content"><!-- placeholder node --></span>
    
    </div>
    
    <span class="museBGSize placeholder" data-placeholder-for="u450_content"><!-- placeholder node --></span>
    
    <span class="rounded-corners placeholder" data-placeholder-for="u443_content"><!-- placeholder node --></span>
    
    <span class="rounded-corners clearfix placeholder" data-placeholder-for="u3397-8_content"><!-- placeholder node --></span>
    
    <form onsubmit="window.location.href='buscas.html';" class="form-grp clearfix temp_no_id" method="post" enctype="multipart/form-data" action="scripts/form-u451.php" data-sizePolicy="fluidWidth" data-pintopage="topleft" data-orig-id="widgetu451"><!-- none box -->
     
     <div class="clearfix grpelem temp_no_id" data-orig-id="pu463-3"><!-- group -->
      
      <div class="clearfix grpelem temp_no_id" data-sizePolicy="fixed" data-pintopage="page_fixedLeft" data-orig-id="u463-3"><!-- content -->
       
      <span class="placeholder" data-placeholder-for="u463-3_0_content"><!-- placeholder node --></span>
      
      </div>
      
      <div class="clearfix grpelem temp_no_id" data-sizePolicy="fixed" data-pintopage="page_fixedLeft" data-orig-id="u461-3"><!-- content -->
       
       <span class="placeholder" data-placeholder-for="u461-3_0_content"><!-- placeholder node --></span>
      
      </div>
      
      <div class="clearfix grpelem temp_no_id" data-sizePolicy="fixed" data-pintopage="page_fixedLeft" data-orig-id="u462-3"><!-- content -->
       
       <span class="placeholder" data-placeholder-for="u462-3_0_content"><!-- placeholder node --></span>
      
      </div>
      
      <div class="fld-grp clearfix grpelem temp_no_id" data-required="true" data-sizePolicy="fluidWidth" data-pintopage="page_fluidx" data-orig-id="widgetu453"><!-- none box -->
       
       <span class="fld-input NoWrap actAsDiv clearfix grpelem temp_no_id" data-orig-id="u455-4"><!-- content -->
       
       <div class="temp_no_id" data-orig-id="u455-3">
       
       <span class="wrapped-input placeholder" data-placeholder-for="widgetu453_input_content"><!-- placeholder node -->
       
       </span>
       
       <label class="wrapped-input fld-prompt temp_no_id" for="widgetu453_input" data-orig-id="widgetu453_prompt">
       
       <span class="actAsPara placeholder" data-placeholder-for="widgetu453_prompt_0_content"><!-- placeholder node -->
       
       </span>
       
       </label>
       
       </div>
       
       </span>
      
      </div>
     
     </div>
     
     <button class="submit-btn NoWrap rounded-corners clearfix temp_no_id" type="submit" value="BUSCAR" tabindex="8" data-orig-id="u452-4"><!-- content -->
      
      <span class="placeholder" data-placeholder-for="u452-4_0_content"><!-- placeholder node --></span>
     
     </button>
    
    </form>
    
    <span class="nonblock nontext museBGSize placeholder" data-placeholder-for="u449_content"><!-- placeholder node --></span>
    
    <span class="nonblock nontext museBGSize placeholder" data-placeholder-for="u448_content"><!-- placeholder node --></span>
    
    <span class="clearfix placeholder" data-placeholder-for="u3199-16_content"><!-- placeholder node --></span>
    
    <span class="nonblock nontext Button rounded-corners clearfix placeholder" data-placeholder-for="buttonu444_content"><!-- placeholder node -->
    </span>
    
    <span class="rounded-corners clearfix placeholder" data-placeholder-for="u3396-8_content"><!-- placeholder node --></span>
    
    <div class="verticalspacer" data-offset-top="120" data-content-above-spacer="650" data-content-below-spacer="530" data-sizePolicy="fixed" data-pintopage="page_fixedLeft">
    
    </div>
   
   </div>
 
  </div>
 
  <div id="menuinferior"  align="center"> 

<div id="1" class="box" style="display:flex;justify-content:center;align-items:center;">

Festas, <br>

Shows e <br>

Festivais

</div>

<div id="1" class="box" style="display:flex;justify-content:center;align-items:center;">

Palestras, <br>

Conferêscias, <br>

Congresos, <br>

Seminários <br>

e Convenções  

</div>

<div id="1" class="box" style="display:flex;justify-content:center;align-items:center;">Alternativos <br>
--- <br>
Música Excurções</div>

<div id="1" class="box" style="display:flex;justify-content:center;align-items:center;">Retiros, <br>Viagens <br>e Excurções</div>

<div id="1" class="box" style="display:flex;justify-content:center;align-items:center;">Esportivos <br>---<br> Gastronômicos</div>

<div id="1" class="box" style="display:flex;justify-content:center;align-items:center;">Arte <br>---<br> Moda</div>

<div id="1" class="box" style="display:flex;justify-content:center;align-items:center;">Infantis <br>---<br> Jovens ou <br>adolescentes</div>

<div id="1" class="box" style="display:flex;justify-content:center;align-items:center;">solidários <br>---<br> Gratuitos</div>

<div id="1" class="box" style="display:flex;justify-content:center;align-items:center;">Cursos e<br> Workshops</div>

<div id="1" class="box" style="display:flex;justify-content:center;align-items:center;">Encontros, <br>Networkings, <br>Férias e<br> Exposições

</div>

<div id="1" class="box" style="display:flex;justify-content:center;align-items:center;">Saude e <br>Bem estar</div>

<div id="fundo">  </div>

<div id="barrinha"></div>

<div id="logo"><img src="images/logomarcadas.png" width="100%" height="100%"> </div>

<div id="busca"><input type="text" id="inbusca" placeholder=" Cidade ou Estado"> </div>

<div id="btbusca" style="display:flex;justify-content:center;align-items:center;"> BUSCAR </div>

<div id="publicar"><div id="tpublicar">PUBLICAR EVENTO </div> 

<div id="tgratis">grátis</div></div>

<div id="carrinho"><a href="assets/index.php" target="_blank"><img src="images/carrinhomercado2.png" width="100%" height="100%"></a></div>

<div id="user"> <a href="assets/index.php" target="_blank"><img src="images/usuario2.png" width="100%" height="100%"> </a></div>

<div id="categorias">+Categorias<br> e <br>+Subcategorias</div>

<div id="eventos">Eventos <br> neste <br>fim de semana</div>

</div>

<input id="menu-ham" type="checkbox" />

<label for="menu-ham">  

<div id="menuhanburger" class="menu">

<span class="ham"> </span>

</div>

</label>

<ul>

<li>

 <table border="0"  align="right"  class="tablemenu">
 
  <tr>
  
    <td class="tabe1"><div align="center" style=" cursor:pointer"><img src="images/seguindo.png" width="100%" height="100%" /></div></td>
   
   <td class="tabd1"><div align="center" style=" cursor:pointer"><img src="images/contatos.png" width="100%" height="100%" /></div></td>
 
  </tr>
 
  <tr>
   
    <td class="tabe2"><div align="center" style=" cursor:pointer"><img src="images/anuncie.png" width="100%" height="100%" /></div></td>
  
    <td class="tabd2"><div align="center" style=" cursor:pointer"><img src="images/como funciona.png" width="100%" height="100%" /></div></td>
 
  </tr>
  
  <tr>
   
    <td class="tabe3"><div align="center" style=" cursor:pointer"><img src="images/organizadores.png" width="100%" height="100%" /></div></td>
  
    <td class="tabd3"><div align="center" style=" cursor:pointer"><img src="images/quem somos.png" width="100%" height="100%" /></div></td>
 
  </tr>
 
  <tr>
 
    <td colspan="2" class="tab4"><div align="center" style=" cursor:pointer"><img src="images/locais.png" width="100%" height="100%" /></div>
    
    </td>
    
    </tr>
  
  <tr>
    
    <td colspan="2" class="tab5"><div align="center" style=" cursor:pointer"><img src="images/eventos.png" width="100%" height="100%" /></div>
    
    </td>
    
    </tr>

</table>


</li>

</ul>

  <!-- Other scripts -->
  <script type="text/javascript">
   // Decide whether to suppress missing file error or not based on preference setting
var suppressMissingFileError = false
</script>
  <script type="text/javascript">
   window.Muse.assets.check=function(c){if(!window.Muse.assets.checked){window.Muse.assets.checked=!0;var b={},d=function(a,b){if(window.getComputedStyle){var c=window.getComputedStyle(a,null);return c&&c.getPropertyValue(b)||c&&c[b]||""}if(document.documentElement.currentStyle)return(c=a.currentStyle)&&c[b]||a.style&&a.style[b]||"";return""},a=function(a){if(a.match(/^rgb/))return a=a.replace(/\s+/g,"").match(/([\d\,]+)/gi)[0].split(","),(parseInt(a[0])<<16)+(parseInt(a[1])<<8)+parseInt(a[2]);if(a.match(/^\#/))return parseInt(a.substr(1),
16);return 0},f=function(f){for(var g=document.getElementsByTagName("link"),j=0;j<g.length;j++)if("text/css"==g[j].type){var l=(g[j].href||"").match(/\/?css\/([\w\-]+\.css)\?crc=(\d+)/);if(!l||!l[1]||!l[2])break;b[l[1]]=l[2]}g=document.createElement("div");g.className="version";g.style.cssText="display:none; width:1px; height:1px;";document.getElementsByTagName("body")[0].appendChild(g);for(j=0;j<Muse.assets.required.length;){var l=Muse.assets.required[j],k=l.match(/([\w\-\.]+)\.(\w+)$/),i=k&&k[1]?
k[1]:null,k=k&&k[2]?k[2]:null;switch(k.toLowerCase()){case "css":i=i.replace(/\W/gi,"_").replace(/^([^a-z])/gi,"_$1");g.className+=" "+i;i=a(d(g,"color"));k=a(d(g,"backgroundColor"));i!=0||k!=0?(Muse.assets.required.splice(j,1),"undefined"!=typeof b[l]&&(i!=b[l]>>>24||k!=(b[l]&16777215))&&Muse.assets.outOfDate.push(l)):j++;g.className="version";break;case "js":j++;break;default:throw Error("Unsupported file type: "+k);}}c?c().jquery!="1.8.3"&&Muse.assets.outOfDate.push("jquery-1.8.3.min.js"):Muse.assets.required.push("jquery-1.8.3.min.js");
g.parentNode.removeChild(g);if(Muse.assets.outOfDate.length||Muse.assets.required.length)g="Alguns arquivos no servidor podem estar ausentes ou incorretos. Limpe o cache do navegador e tente novamente. Se o problema persistir, entre em contato com o autor do site.",f&&Muse.assets.outOfDate.length&&(g+="\nOut of date: "+Muse.assets.outOfDate.join(",")),f&&Muse.assets.required.length&&(g+="\nMissing: "+Muse.assets.required.join(",")),suppressMissingFileError?(g+="\nUse SuppressMissingFileError key in AppPrefs.xml to show missing file error pop up.",console.log(g)):alert(g)};location&&location.search&&location.search.match&&location.search.match(/muse_debug/gi)?
setTimeout(function(){f(!0)},5E3):f()}};
var muse_init=function(){require.config({baseUrl:""});require(["jquery","museutils","whatinput","jquery.watch","webpro","musewpslideshow","jquery.museoverlay","touchswipe","jquery.musepolyfill.bgsize","jquery.museresponsive"],function(c){var $ = c;$(document).ready(function(){try{
window.Muse.assets.check($);/* body */
Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();/* body */
Muse.Utils.prepHyperlinks(true);/* body */
Muse.Utils.resizeHeight('.popup_anchor.allow_click_through');/* resize height */
Muse.Utils.makeButtonsVisibleAfterSettingMinWidth();/* body */
Muse.Utils.initWidget('#slideshowu94', ['#bp_infinity', '#bp_1150', '#bp_800', '#bp_550'], function(elem) { var widget = new WebPro.Widget.ContentSlideShow(elem, {autoPlay:true,displayInterval:3500,slideLinkStopsSlideShow:false,transitionStyle:'horizontal',lightboxEnabled_runtime:false,shuffle:false,transitionDuration:500,enableSwipe:true,elastic:'fullScreen',resumeAutoplay:true,resumeAutoplayInterval:3000,playOnce:false,autoActivate_runtime:false,isResponsive:true}); $(elem).data('widget', widget); return widget; });/* #slideshowu94 */
Muse.Utils.initWidget('#widgetu451', ['#bp_infinity', '#bp_1150', '#bp_800', '#bp_550'], function(elem) { return new WebPro.Widget.Form(elem, {validationEvent:'submit',errorStateSensitivity:'high',fieldWrapperClass:'fld-grp',formSubmittedClass:'frm-sub-st',formErrorClass:'frm-subm-err-st',formDeliveredClass:'frm-subm-ok-st',notEmptyClass:'non-empty-st',focusClass:'focus-st',invalidClass:'fld-err-st',requiredClass:'fld-err-st',ajaxSubmit:true}); });/* #widgetu451 */
Muse.Utils.fullPage('#page');/* 100% height page */
$( '.breakpoint' ).registerBreakpoint();/* Register breakpoints */
Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
}catch(b){if(b&&"function"==typeof b.notify?b.notify():Muse.Assert.fail("Error calling selector function: "+b),false)throw b;}})})};

</script>
  <!-- RequireJS script -->
  <script src="scripts/require.js?crc=7928878" type="text/javascript" async data-main="scripts/museconfig.js?crc=310584261" onload="if (requirejs) requirejs.onError = function(requireType, requireModule) { if (requireType && requireType.toString && requireType.toString().indexOf && 0 <= requireType.toString().indexOf('#scripterror')) window.Muse.assets.check(); }" onerror="window.Muse.assets.check();"></script>
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
?>
