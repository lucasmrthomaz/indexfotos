
<?php require_once('../../Connections/conexao2.php'); ?>

<?php
/*Linecraft PHP File Upload*/
if (isset($_POST['MM_insert'])) {
	$upload_error_codes=array("",
		"The uploaded file exceeds the upload_max_filesize directive in php.ini.","",
		"The uploaded file was only partially uploaded.",
		"No file was uploaded.","Missing a temporary folder.",
		"Failed to write file to disk.","File upload stopped by extension.");
	$allowed_ext_string="jpg,png";
	$allowed_extensions=explode(",",$allowed_ext_string);
	$upload_status = "";
	$allowed_size =  100+0;
	$success_page = "";
	$thumbs_dir = "";
	$resize_image = "";
	$resize_width = +0;
	$resize_height = +0;
	$thumb_width = +0;
	$thumb_height = +0;		
	$make_thumbs = "";
	$thumb_prefix = "";
	$thumb_suffix = "";
	$file_prefix = "";
	$file_suffix = "";
	$append_date_stamp = "";
	$date_stamp=($append_date_stamp=="1")?date(time()):"";
	$haulted = false;
	$upload_folder="Fotos/";
	//Check for restrictions
	//Check if upload folder exists
	if(!file_exists($upload_folder)){die("Upload folder doesn't exist");}
	if(!is_writable($upload_folder)){die("Upload folder is not writable");}
	if($make_thumbs == "yes" && !file_exists($thumbs_dir)){die("Thumbnails folder doesn't exist");}
	if($make_thumbs == "yes" && !is_writable($thumbs_dir)){die("Thumbnails folder is not writable");}
	foreach($_FILES as $files => $_file){
		//Check if it's not empty
		if($_file['name']!=""){
			$pathinfo = pathinfo($_file['name']);
			//If allowed extension or no extension restriction
			if(!in_array(strtolower($pathinfo['extension']),$allowed_extensions) && $allowed_ext_string!=""){
				die(strtoupper($pathinfo['extension'])." files are not allowed.
				<br>No files have been uploaded.");
			}
			if($_file['size']>$allowed_size*1048576 && $allowed_size!=0){
				die("The file size of ".basename($_file['name'])." is ".round($_file['size']/1048576,2)."MB,
				which is larger than allowed ".$allowed_size."MB.<br>No files have been uploaded.");
			}		
		}
	}
	//All checks passed, attempt to upload
	foreach($_FILES as $files => $_file){
		//Check if it's not empty
		if($_file['name']!=""){
			$pathinfo = pathinfo($_file['name']);
			$file_name_array = explode(".", basename($_file['name']));
			$filename = $file_name_array[count($file_name_array)-2];
			$target = $upload_folder;
			$file_uploaded = false;
			$target = $target."/".$file_prefix.$filename.$file_suffix.$date_stamp.".".$pathinfo['extension'];
			//if image
			if(strtolower($pathinfo['extension'])=="jpeg" || strtolower($pathinfo['extension'])=="jpg"){
				//if needs resizing or a thumbnail
				if(($resize_image == "yes" && ($resize_width!="" || $resize_height!="")) || ($make_thumbs == "yes" && ($thumb_width!="" || $thumb_height!=""))){
					$src = imagecreatefromjpeg($_file['tmp_name']);
					list($width,$height)=getimagesize($_file['tmp_name']);
					//if needs thumbnail
					if ($make_thumbs == "yes" && ($thumb_width!="" || $thumb_height!="")){
						$thumb_newwidth=($thumb_width!=0)?$thumb_width:(($width/$height)*$thumb_height);
						$thumb_newheight=($thumb_height!=0)?$thumb_height:(($height/$width)*$thumb_width);
						$tmp=imagecreatetruecolor($thumb_newwidth,$thumb_newheight);
						imagecopyresampled($tmp,$src,0,0,0,0,$thumb_newwidth,$thumb_newheight,$width,$height);
						$thumb_name=$thumb_prefix.$filename.$thumb_suffix.$date_stamp.".".$pathinfo['extension'];
						if(imagejpeg($tmp,$thumbs_dir."/".$thumb_name,100)){
							$upload_status=$upload_status."Thumbnail for ".basename($_file['name'])." was created successfully.<br>";
						}else{
							die($upload_status."There was a problem creating a thumbnail for ". basename($_file['name']).".
							Upload was interrupted.<br>");
						}
					}
					//if needs resizing
					if($resize_image == "yes" && ($resize_width!="" || $resize_height!="")){
						$newwidth=($resize_width!=0)?$resize_width:(($width/$height)*$resize_height);
						$newheight=($resize_height!=0)?$resize_height:(($height/$width)*$resize_width);
						$tmp=imagecreatetruecolor($newwidth,$newheight);
						imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height); 
						if(imagejpeg($tmp,$target,100)){
							$upload_status=$upload_status.basename($_file['name'])." was successfully resized.<br>";
							$file_uploaded=true;
						}else{
							die($upload_status.basename($_file['name'])." could not be resized. Upload was interrupted.<br>");
						}
					}
				}
			}
			if(!$file_uploaded){
				if(move_uploaded_file($_file['tmp_name'], $target)){
					$upload_status=$upload_status.basename($_file['name'])." was uploaded successfully.<br>";
				}else{
					$haulted=true;
				}
			}
			//Cleanup
			if(isset($src)){imagedestroy($src);unset($src);}
			if(isset($tmp)){imagedestroy($tmp);unset($tmp);}
			if($haulted){die($upload_status."There was a problem uploading ". basename($_file['name']).".
						Error: ".$upload_error_codes[basename($_file['error'])].". Upload was interrupted.<br>");}
		}
	}
	if($success_page!="" && $upload_status!=""){
		header("Location: ".$success_page);
	}
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



foreach($_FILES as $files => $_file){
$_POST[$files]=""; 
if($_file['name']!=""){
$pathinfo=pathinfo($_file['name']);
$file_name_array = explode(".", basename($_file['name']));
$filename = $file_name_array[count($file_name_array)-2]; 
$_POST[$files]=$file_prefix.$filename.$file_suffix.$date_stamp.".".$pathinfo['extension']; 
}
}



$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO cad_evento (nome_do_evento, foto_banner, data_do_evento_inicio_dia, data_do_evento_inicio_mes, data_do_evento_inicio_ano, `data_do_evento _termino_dia`, `data_do_evento _termino_mes`, `data_do_evento _termino_ano`, hora_de_inicio, hora_de_fim, categoria_do_evento, local_do_evento, bairro_cidade_do_evento, cadeirante, descricao, cnpj, produtor, responsavel) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nome_do_evento'], "text"),
                       GetSQLValueString($_POST['foto_banner'], "text"),
                       GetSQLValueString($_POST['data_do_evento_inicio_dia'], "int"),
                       GetSQLValueString($_POST['data_do_evento_inicio_mes'], "int"),
                       GetSQLValueString($_POST['data_do_evento_inicio_ano'], "int"),
                       GetSQLValueString($_POST['data_do_evento__termino_dia'], "int"),
                       GetSQLValueString($_POST['data_do_evento__termino_mes'], "int"),
                       GetSQLValueString($_POST['data_do_evento__termino_ano'], "int"),
                       GetSQLValueString($_POST['hora_de_inicio'], "date"),
                       GetSQLValueString($_POST['hora_de_fim'], "date"),
                       GetSQLValueString($_POST['categoria_do_evento'], "text"),
                       GetSQLValueString($_POST['local_do_evento'], "text"),
                       GetSQLValueString($_POST['bairro_cidade_do_evento'], "text"),
                       GetSQLValueString($_POST['cadeirante'], "text"),
                       GetSQLValueString($_POST['descricao'], "text"),
                       GetSQLValueString($_POST['cnpj'], "text"),
                       GetSQLValueString($_POST['produtor'], "text"),
                       GetSQLValueString($_POST['responsavel'], "text"));

  mysql_select_db($database_conexao2, $conexao2);
  $Result1 = mysql_query($insertSQL, $conexao2) or die(mysql_error());

  $insertGoTo = "cad_evento.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$maxRows_Recordset1 = 10;
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

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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


body,td,th {
	font-family: "OpenSans Semibold";
	font-size: 16px;
}

table{
	border-radius:10px;
	border:solid;
	border-color:transparent;	
	}

td{border-radius:10px;

}


body {
	background-color: #FFF;
}
</style>



</head>

<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="700px" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>

<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" enctype="multipart/form-data">
  <table align="center" class="table table-striped table-dark">
    <tr valign="baseline">
      <td height="32" align="center" valign="middle" nowrap="nowrap"><input type="text" class="form-control" placeholder="Nome do evento:" name="nome_do_evento" value="" size="32" /></td>
      <td align="left" valign="middle"><label for="data_do_evento_inicio_dia"></label>
        Início&nbsp;&nbsp;&nbsp;&nbsp;
          <select name="data_do_evento_inicio_dia2" id="data_do_evento_inicio_dia">
          <option value="01">01</option>
          <option value="02">02</option>
          <option value="03">03</option>
          <option value="04">04</option>
          <option value="05">05</option>
          <option value="06">06</option>
          <option value="07">07</option>
          <option value="08">08</option>
          <option value="09">09</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
          <option value="25">25</option>
          <option value="26">26</option>
          <option value="27">27</option>
          <option value="28">28</option>
          <option value="29">29</option>
          <option value="30">30</option>
          <option value="31">31</option>
      </select> 
          / 
          <label for="data_do_evento_inicio_mes"></label>
          <select name="data_do_evento_inicio_mes2" id="data_do_evento_inicio_mes">
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
      </select>
          / 
          <label for="data_do_evento_inicio_ano"></label>
          <select name="data_do_evento_inicio_ano2" id="data_do_evento_inicio_ano">
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
            <option value="2026">2026</option>
            <option value="2027">2027</option>
            <option value="2028">2028</option>
            <option value="2029">2029</option>
            <option value="2030">2030</option>
          </select></td>
    </tr>
    <tr valign="baseline">
      <td align="center" valign="middle" nowrap="nowrap">

      <input type="file" class="form-control" placeholder="Foto banner:"  value="" size="32" />
           </td>
      <td align="left" valign="middle">Término
<select name="data_do_evento_termino_dia2" id="data_do_evento_termino_dia">
          <option value="01">01</option>
          <option value="02">02</option>
          <option value="03">03</option>
          <option value="04">04</option>
          <option value="05">05</option>
          <option value="06">06</option>
          <option value="07">07</option>
          <option value="08">08</option>
          <option value="09">09</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
          <option value="25">25</option>
          <option value="26">26</option>
          <option value="27">27</option>
          <option value="28">28</option>
          <option value="29">29</option>
          <option value="30">30</option>
          <option value="31">31</option>
      </select> 
          / 
        <label for="data_do_evento_termino_mes"></label>
        <select name="data_do_evento_termino_mes2" id="data_do_evento_inicio_mes">
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
      </select>
          / 
        <label for="data_do_evento_termino_ano"></label>
        <select name="data_do_evento_termino_ano2" id="data_do_evento_inicio_ano">
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
            <option value="2026">2026</option>
            <option value="2027">2027</option>
            <option value="2028">2028</option>
            <option value="2029">2029</option>
            <option value="2030">2030</option>
          </select></td>
    </tr>
    <tr valign="baseline">
      <td align="center" valign="middle" nowrap="nowrap"><input type="text"  class="form-control" placeholder="Hora de inicio:" name="hora_de_inicio" value="" size="32" /></td>
      <td align="center" valign="middle"><input type="text" class="form-control" placeholder="Hora de fim:" name="hora_de_fim" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="center" valign="middle" nowrap="nowrap"><input type="text" class="form-control" placeholder="Categoria do evento:" name="categoria_do_evento" value="" size="32" /></td>
      <td align="center" valign="middle"><input class="form-control" placeholder="Descrição:" type="text" name="descricao" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td height="32" align="center" valign="middle" nowrap="nowrap"><input type="text" class="form-control" placeholder="Local do evento:" name="local_do_evento" value="" size="32" /></td>
      <td align="center" valign="middle"><input type="text" class="form-control" placeholder="Bairro / Cidade do evento:" name="bairro_cidade_do_evento" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="center" valign="middle" nowrap="nowrap"><input class="form-control" placeholder="Responsável:" type="text" name="responsavel" value="" size="32" /></td>
      <td align="center" valign="middle"><input class="form-control" placeholder="Cnpj:" type="text" name="cnpj" value="" size="32" />
      <label for="cadeirante 2"></label></td>
    </tr>
    <tr valign="baseline">
      <td align="center" valign="middle" nowrap="nowrap"><input class="form-control" placeholder="Produtor:" type="text" name="produtor" value="" size="32" /></td>
      <td align="center" valign="middle">Cadeirante:&nbsp;&nbsp;&nbsp;
        <label>
        <input type="radio" ria-label="Radio button for following text input" name="cadeirante" value="block" id="RadioGroup1_0" />
        SIM</label>
        &nbsp;&nbsp;&nbsp;
        <label>
          <input type="radio" class="td" name="cadeirante" value="none" id="RadioGroup1_1" />
      NÃO</label></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="center" valign="middle" nowrap="nowrap"><input class="form-control" type="submit"  value="Inserir registro" /></td>
    </tr>
  </table>
  
<input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;

</td>
  </tr>
</table>


<table width="700px" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>
<table border="1" align="center" class="table table-striped table-dark">
  <tr>
    <td>Codigo do Evento</td>
    <td>Nome do evento</td>
    <td>Foto banner</td>
  </tr>
  <?php do { ?>
    <tr>
      <td align="center"><a href="cad_pagamento.php?recordID=<?php echo $row_Recordset1['id']; ?>"> <?php echo $row_Recordset1['id']; ?>&nbsp; </a></td>
      <td><?php echo $row_Recordset1['nome_do_evento']; ?>&nbsp; </td>
      <td><img src="Fotos/<?php echo $row_Recordset1['foto_banner']; ?>" width="200px" height="120px" /> </td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
<br />
<table border="0">
  <tr>
    <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>">Primeiro</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">Anterior</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">Próximo</a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>">Último</a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
Registros <?php echo ($startRow_Recordset1 + 1) ?> a <?php echo min($startRow_Recordset1 + $maxRows_Recordset1, $totalRows_Recordset1) ?> de <?php echo $totalRows_Recordset1 ?>
</p>

</td>
  </tr>
</table>

</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
