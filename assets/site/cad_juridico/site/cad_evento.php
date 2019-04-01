
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
	
	}


.sub{
	height:40px;
	
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
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" enctype="multipart/form-data">
  <table align="center">
    <tr valign="baseline">
      <td align="left" valign="middle" nowrap="nowrap">Nome do evento:</td>
      <td><input type="text" name="nome_do_evento" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" valign="middle" nowrap="nowrap">Foto banner:</td>
      <td><input type="file" name="foto_banner" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" valign="middle" nowrap="nowrap">Dia inicio:</td>
      <td><input type="text" name="data_do_evento_inicio_dia" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" valign="middle" nowrap="nowrap">Mês inicio:</td>
      <td><input type="text" name="data_do_evento_inicio_mes" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" valign="middle" nowrap="nowrap"> Ano inicio:</td>
      <td><input type="text" name="data_do_evento_inicio_ano" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" valign="middle" nowrap="nowrap">Dia termino:</td>
      <td><input type="text" name="data_do_evento__termino_dia" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" valign="middle" nowrap="nowrap"> Mês termino:</td>
      <td><input type="text" name="data_do_evento__termino_mes" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" valign="middle" nowrap="nowrap"> Ano termino:</td>
      <td><input type="text" name="data_do_evento__termino_ano" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" valign="middle" nowrap="nowrap">Hora de inicio:</td>
      <td><input type="text" name="hora_de_inicio" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" valign="middle" nowrap="nowrap">Hora de fim:</td>
      <td><input type="text" name="hora_de_fim" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" valign="middle" nowrap="nowrap">Categoria do evento:</td>
      <td><input type="text" name="categoria_do_evento" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" valign="middle" nowrap="nowrap">Local do evento:</td>
      <td><input type="text" name="local_do_evento" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" valign="middle" nowrap="nowrap">Bairro cidade do evento:</td>
      <td><input type="text" name="bairro_cidade_do_evento" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" valign="middle" nowrap="nowrap">Cadeirante:</td>
      <td><label>
            <input type="radio" class="td" name="cadeirante" value="block" id="RadioGroup1_0"> SIM</label>
          <br />
          <label>
            <input type="radio" class="td" name="cadeirante" value="none" id="RadioGroup1_1" />
            NÃO</label>
          <br />
     
<label for="cadeirante 2"></label></td>
    </tr>
    <tr valign="baseline">
      <td align="left" valign="middle" nowrap="nowrap">Descrição:</td>
      <td><input type="text" name="descricao" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" valign="middle" nowrap="nowrap">Cnpj:</td>
      <td><input type="text" name="cnpj" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" valign="middle" nowrap="nowrap">Produtor:</td>
      <td><input type="text" name="produtor" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" valign="middle" nowrap="nowrap">Responsável:</td>
      <td><input type="text" name="responsavel" value="" size="32" /></td>
    </tr>
    <tr align="center" valign="middle">
      <td nowrap="nowrap">&nbsp;</td>
      <td><input type="submit" class="sub" value="Inserir registro" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>