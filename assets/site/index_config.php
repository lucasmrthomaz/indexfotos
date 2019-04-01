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

/*Linecraft PHP File Upload*/
if (isset($_POST['MM_insert2'])) {
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
	$upload_folder="aside_eventos/";
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
<?php require_once('Connections/conexao.php'); ?>
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
  $insertSQL = sprintf("INSERT INTO slaid_1 (img, titulo, linha_1, linha_2, linha_3, linha_4, linha_5, linha_6, linha_7) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['img'], "text"),
                       GetSQLValueString($_POST['titulo'], "text"),
                       GetSQLValueString($_POST['linha_1'], "text"),
                       GetSQLValueString($_POST['linha_2'], "text"),
                       GetSQLValueString($_POST['linha_3'], "text"),
                       GetSQLValueString($_POST['linha_4'], "text"),
                       GetSQLValueString($_POST['linha_5'], "text"),
                       GetSQLValueString($_POST['linha_6'], "text"),
                       GetSQLValueString($_POST['linha_7'], "text"));

  mysql_select_db($database_conexao, $conexao);
  $Result1 = mysql_query($insertSQL, $conexao) or die(mysql_error());

  $insertGoTo = "indexconfig.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO slaid_2 (img, titulo, linha_1, linha_2, linha_3, linha_4, linha_5, linha_6, linha_7) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['img'], "text"),
                       GetSQLValueString($_POST['titulo'], "text"),
                       GetSQLValueString($_POST['linha_1'], "text"),
                       GetSQLValueString($_POST['linha_2'], "text"),
                       GetSQLValueString($_POST['linha_3'], "text"),
                       GetSQLValueString($_POST['linha_4'], "text"),
                       GetSQLValueString($_POST['linha_5'], "text"),
                       GetSQLValueString($_POST['linha_6'], "text"),
                       GetSQLValueString($_POST['linha_7'], "text"));

  mysql_select_db($database_conexao, $conexao);
  $Result1 = mysql_query($insertSQL, $conexao) or die(mysql_error());

  $insertGoTo = "indexconfig.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form3")) {
  $insertSQL = sprintf("INSERT INTO slaid_3 (img, titulo, linha_1, linha_2, linha_3, linha_4, linha_5, linha_6, linha_7) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['img'], "text"),
                       GetSQLValueString($_POST['titulo'], "text"),
                       GetSQLValueString($_POST['linha_1'], "text"),
                       GetSQLValueString($_POST['linha_2'], "text"),
                       GetSQLValueString($_POST['linha_3'], "text"),
                       GetSQLValueString($_POST['linha_4'], "text"),
                       GetSQLValueString($_POST['linha_5'], "text"),
                       GetSQLValueString($_POST['linha_6'], "text"),
                       GetSQLValueString($_POST['linha_7'], "text"));

  mysql_select_db($database_conexao, $conexao);
  $Result1 = mysql_query($insertSQL, $conexao) or die(mysql_error());

  $insertGoTo = "indexconfig.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form4")) {
  $insertSQL = sprintf("INSERT INTO slaid_4 (img, titulo, linha_1, linha_2, linha_3, linha_4, linha_5, linha_6, linha_7) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['img'], "text"),
                       GetSQLValueString($_POST['titulo'], "text"),
                       GetSQLValueString($_POST['linha_1'], "text"),
                       GetSQLValueString($_POST['linha_2'], "text"),
                       GetSQLValueString($_POST['linha_3'], "text"),
                       GetSQLValueString($_POST['linha_4'], "text"),
                       GetSQLValueString($_POST['linha_5'], "text"),
                       GetSQLValueString($_POST['linha_6'], "text"),
                       GetSQLValueString($_POST['linha_7'], "text"));

  mysql_select_db($database_conexao, $conexao);
  $Result1 = mysql_query($insertSQL, $conexao) or die(mysql_error());

  $insertGoTo = "indexconfig.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form5")) {
  $insertSQL = sprintf("INSERT INTO slaid_5 (img, titulo, linha_1, linha_2, linha_3, linha_4, linha_5, linha_6, linha_7) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['img'], "text"),
                       GetSQLValueString($_POST['titulo'], "text"),
                       GetSQLValueString($_POST['linha_1'], "text"),
                       GetSQLValueString($_POST['linha_2'], "text"),
                       GetSQLValueString($_POST['linha_3'], "text"),
                       GetSQLValueString($_POST['linha_4'], "text"),
                       GetSQLValueString($_POST['linha_5'], "text"),
                       GetSQLValueString($_POST['linha_6'], "text"),
                       GetSQLValueString($_POST['linha_7'], "text"));

  mysql_select_db($database_conexao, $conexao);
  $Result1 = mysql_query($insertSQL, $conexao) or die(mysql_error());

  $insertGoTo = "indexconfig.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form6")) {
  $insertSQL = sprintf("INSERT INTO slaid_6 (img, titulo, linha_1, linha_2, linha_3, linha_4, linha_5, linha_6, linha_7) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['img'], "text"),
                       GetSQLValueString($_POST['titulo'], "text"),
                       GetSQLValueString($_POST['linha_1'], "text"),
                       GetSQLValueString($_POST['linha_2'], "text"),
                       GetSQLValueString($_POST['linha_3'], "text"),
                       GetSQLValueString($_POST['linha_4'], "text"),
                       GetSQLValueString($_POST['linha_5'], "text"),
                       GetSQLValueString($_POST['linha_6'], "text"),
                       GetSQLValueString($_POST['linha_7'], "text"));

  mysql_select_db($database_conexao, $conexao);
  $Result1 = mysql_query($insertSQL, $conexao) or die(mysql_error());

  $insertGoTo = "indexconfig.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form7")) {
  $insertSQL = sprintf("INSERT INTO slaid_7 (img, titulo, linha_1, linha_2, linha_3, linha_4, linha_5, linha_6, linha_7) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['img'], "text"),
                       GetSQLValueString($_POST['titulo'], "text"),
                       GetSQLValueString($_POST['linha_1'], "text"),
                       GetSQLValueString($_POST['linha_2'], "text"),
                       GetSQLValueString($_POST['linha_3'], "text"),
                       GetSQLValueString($_POST['linha_4'], "text"),
                       GetSQLValueString($_POST['linha_5'], "text"),
                       GetSQLValueString($_POST['linha_6'], "text"),
                       GetSQLValueString($_POST['linha_7'], "text"));

  mysql_select_db($database_conexao, $conexao);
  $Result1 = mysql_query($insertSQL, $conexao) or die(mysql_error());

  $insertGoTo = "indexconfig.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form8")) {
  $insertSQL = sprintf("INSERT INTO aside_dos_eventos (aside_direita, aside_esqueda) VALUES (%s, %s)",
                       GetSQLValueString($_POST['aside_direita'], "text"),
                       GetSQLValueString($_POST['aside_esqueda'], "text"));

  mysql_select_db($database_conexao2, $conexao2);
  $Result1 = mysql_query($insertSQL, $conexao2) or die(mysql_error());

  $insertGoTo = "index_config.php";
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

<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><a href="lista_de_islides.php">ATUALIZAÇÃO DE SLIDE</a></td>
    <td><a href="indexCONFIG.php">CADASTRO DE SLIDE</a></td>
    <td><a href="index.PHP">INDEX</a></td>
  </tr>
</table>

<p>&nbsp;</p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">SLIDE 1
      <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" enctype="multipart/form-data">
        <table align="center" cellpadding="0" cellspacing="5">
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle" nowrap="nowrap"  class="td">Imagem:</td>
            <td width="70%" align="center" valign="middle"><input type="file" name="img" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Titulo:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="titulo" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle" nowrap="nowrap"   class="td">Linha 1:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_1" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Linha 2:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_2" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Linha 3:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_3" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle" nowrap="nowrap"   class="td">Linha 4:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_4" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Linha 5:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_5" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle" nowrap="nowrap"  class="td">Linha 6:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_6" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle" nowrap="nowrap">&nbsp;</td>
            <td width="70%" align="center" valign="middle"><input class="sub" type="submit" value="Inserir registro" /></td>
          </tr>
        </table>
        <input type="hidden" name="MM_insert" value="form1" />
      </form>
    <p>&nbsp;</p></td>
    <td align="center">&nbsp;&nbsp;SLIDE 2
      <form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2" enctype="multipart/form-data">
        <table align="center">
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle" nowrap="nowrap"  class="td">Imagem:</td>
            <td width="70%" align="center" valign="middle"><input type="file" name="img" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Titulo:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="titulo" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Linha 1:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_1" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Linha 2:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_2" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle" nowrap="nowrap"   class="td">Linha 3:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_3" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Linha 4:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_4" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Linha 5:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_5" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle" nowrap="nowrap"   class="td">Linha 6:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_6" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle" nowrap="nowrap">&nbsp;</td>
            <td width="70%" align="center" valign="middle"><input class="sub" type="submit" value="Inserir registro" /></td>
          </tr>
        </table>
        <input type="hidden" name="MM_insert" value="form2" />
      </form>
    <p>&nbsp;</p></td>
    <td align="center">&nbsp;&nbsp;SLIDE 3
      <form action="<?php echo $editFormAction; ?>" method="post" name="form3" id="form3" enctype="multipart/form-data">
        <table align="center">
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Imagem:</td>
            <td width="70%" align="center" valign="middle"><input type="file" name="img" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Titulo:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="titulo" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Linha 1:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_1" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle" nowrap="nowrap"   class="td">Linha 2:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_2" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Linha 3:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_3" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Linha 4:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_4" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle" nowrap="nowrap"  class="td">Linha 5:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_5" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle" nowrap="nowrap"   class="td">Linha 6:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_6" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle" nowrap="nowrap">&nbsp;</td>
            <td width="70%" align="center" valign="middle"><input class="sub" type="submit" value="Inserir registro" /></td>
          </tr>
        </table>
        <input type="hidden" name="MM_insert" value="form3" />
      </form>
    <p>&nbsp;</p></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">&nbsp;&nbsp;SLIDE 4
      <form action="<?php echo $editFormAction; ?>" method="post" name="form4" id="form4" enctype="multipart/form-data">
        <table align="center">
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Imagem:</td>
            <td width="70%" align="center" valign="middle"><input type="file" name="img" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Titulo:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="titulo" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Linha 1:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_1" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle" nowrap="nowrap"  class="td">Linha 2:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_2" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Linha 3:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_3" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Linha 4:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_4" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle" nowrap="nowrap"   class="td">Linha 5:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_5" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Linha 6:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_6" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle" nowrap="nowrap">&nbsp;</td>
            <td width="70%" align="center" valign="middle"><input class="sub" type="submit" value="Inserir registro" /></td>
          </tr>
        </table>
        <input type="hidden" name="MM_insert" value="form4" />
      </form>
    <p>&nbsp;</p></td>
    <td align="center">&nbsp;&nbsp;SLIDE 5
      <form action="<?php echo $editFormAction; ?>" method="post" name="form5" id="form5" enctype="multipart/form-data">
        <table align="center">
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Imagem:</td>
            <td width="70%" align="center" valign="middle"><input type="file" name="img" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Titulo:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="titulo" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Linha 1:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_1" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Linha 2:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_2" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle" nowrap="nowrap"   class="td">Linha 3:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_3" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle" nowrap="nowrap"   class="td">Linha 4:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_4" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle" nowrap="nowrap"   class="td">Linha 5:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_5" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Linha 6:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_6" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle" nowrap="nowrap">&nbsp;</td>
            <td width="70%" align="center" valign="middle"><input class="sub" type="submit" value="Inserir registro" /></td>
          </tr>
        </table>
        <input type="hidden" name="MM_insert" value="form5" />
      </form>
    <p>&nbsp;</p></td>
    <td align="center">&nbsp;&nbsp;SLIDE 6
      <form action="<?php echo $editFormAction; ?>" method="post" name="form6" id="form6" enctype="multipart/form-data">
        <table align="center">
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Imagem:</td>
            <td width="70%" align="center" valign="middle"><input type="file" name="img" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle" nowrap="nowrap"  class="td">Titulo:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="titulo" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Linha 1:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_1" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Linha 2:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_2" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle" nowrap="nowrap"   class="td">Linha 3:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_3" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Linha 4:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_4" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Linha 5:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_5" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Linha 6:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_6" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle" nowrap="nowrap">&nbsp;</td>
            <td width="70%" align="center" valign="middle"><input class="sub" type="submit" value="Inserir registro" /></td>
          </tr>
        </table>
        <input type="hidden" name="MM_insert" value="form6" />
      </form>
    <p>&nbsp;</p></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top">&nbsp;&nbsp;SLIDE 7
      <form action="<?php echo $editFormAction; ?>" method="post" name="form7" id="form7" enctype="multipart/form-data">
        <table align="center">
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle" nowrap="nowrap"   class="td">Imagem:</td>
            <td width="70%" align="center" valign="middle"><input type="file" name="img" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Titulo:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="titulo" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle" nowrap="nowrap"   class="td">Linha 1:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_1" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Linha 2:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_2" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Linha 3:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_3" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Linha 4:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_4" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle"  nowrap="nowrap"  class="td">Linha 5:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_5" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle" nowrap="nowrap"   class="td">Linha 6:</td>
            <td width="70%" align="center" valign="middle"><input type="text" name="linha_6" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td width="30%" align="center" valign="middle" nowrap="nowrap">&nbsp;</td>
            <td width="70%" align="center" valign="middle"><input class="sub" type="submit" value="Inserir registro" /></td>
          </tr>
        </table>
        <input type="hidden" name="MM_insert" value="form7" />
      </form>
    <p>&nbsp;</p></td>
    <td align="center" valign="top"><p>Aside dos  eventos  </p>
    <p><iframe src="cad_aside_eventos.php" width="100%" height="250px" frameborder="0"></iframe></p></td>
    <td align="center" valign="top"> Aside das buscas
      <p><iframe src="cad_aside_busca.php" width="100%" height="250px" frameborder="0"></iframe></p>
    </td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>