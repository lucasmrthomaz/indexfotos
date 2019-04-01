<?php
/*Linecraft PHP File Upload*/
if (isset($_POST['MM_update'])) {
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
<?php require_once('Connections/conexao.php'); ?><?php
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE slaid_2 SET img=%s, titulo=%s, linha_1=%s, linha_2=%s, linha_3=%s, linha_4=%s, linha_5=%s, linha_6=%s, linha_7=%s, data_hora=%s WHERE id=%s",
                       GetSQLValueString($_POST['img'], "text"),
                       GetSQLValueString($_POST['titulo'], "text"),
                       GetSQLValueString($_POST['linha_1'], "text"),
                       GetSQLValueString($_POST['linha_2'], "text"),
                       GetSQLValueString($_POST['linha_3'], "text"),
                       GetSQLValueString($_POST['linha_4'], "text"),
                       GetSQLValueString($_POST['linha_5'], "text"),
                       GetSQLValueString($_POST['linha_6'], "text"),
                       GetSQLValueString($_POST['linha_7'], "text"),
                       GetSQLValueString($_POST['data_hora'], "date"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_conexao, $conexao);
  $Result1 = mysql_query($updateSQL, $conexao) or die(mysql_error());

  $updateGoTo = "lista_de_islides.php";
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
mysql_select_db($database_conexao, $conexao);
$query_DetailRS1 = sprintf("SELECT * FROM slaid_2 WHERE id = %s ORDER BY id DESC", GetSQLValueString($colname_DetailRS1, "int"));
$query_limit_DetailRS1 = sprintf("%s LIMIT %d, %d", $query_DetailRS1, $startRow_DetailRS1, $maxRows_DetailRS1);
$DetailRS1 = mysql_query($query_limit_DetailRS1, $conexao) or die(mysql_error());
$row_DetailRS1 = mysql_fetch_assoc($DetailRS1);

if (isset($_GET['totalRows_DetailRS1'])) {
  $totalRows_DetailRS1 = $_GET['totalRows_DetailRS1'];
} else {
  $all_DetailRS1 = mysql_query($query_DetailRS1);
  $totalRows_DetailRS1 = mysql_num_rows($all_DetailRS1);
}
$totalPages_DetailRS1 = ceil($totalRows_DetailRS1/$maxRows_DetailRS1)-1;

$maxRows_DetailRS2 = 5;
$pageNum_DetailRS2 = 0;
if (isset($_GET['pageNum_DetailRS2'])) {
  $pageNum_DetailRS2 = $_GET['pageNum_DetailRS2'];
}
$startRow_DetailRS2 = $pageNum_DetailRS2 * $maxRows_DetailRS2;

$colname_DetailRS2 = "-1";
if (isset($_GET['recordID'])) {
  $colname_DetailRS2 = $_GET['recordID'];
}
mysql_select_db($database_conexao, $conexao);
$query_DetailRS2 = sprintf("SELECT * FROM slaid_2 WHERE id = %s ORDER BY id DESC", GetSQLValueString($colname_DetailRS2, "int"));
$query_limit_DetailRS2 = sprintf("%s LIMIT %d, %d", $query_DetailRS2, $startRow_DetailRS2, $maxRows_DetailRS2);
$DetailRS2 = mysql_query($query_limit_DetailRS2, $conexao) or die(mysql_error());
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



<script type="text/javascript">


function add1(value){
  var resultado1 = document.getElementById('resultado1');
resultado1.value += " " + value;
}

function add2(value){
  var resultado2 = document.getElementById('resultado2');
resultado2.value += " " + value;
}

function add3(value){
  var resultado3 = document.getElementById('resultado3');
resultado3.value += " " + value;
}

function add4(value){
  var resultado4 = document.getElementById('resultado4');
resultado4.value += " " + value;
}

function add5(value){
  var resultado5 = document.getElementById('resultado5');
resultado5.value += " " + value;
}

function add6(value){
  var resultado6 = document.getElementById('resultado6');
resultado6.value += " " + value;
}

function add7(value){
  var resultado7 = document.getElementById('resultado7');
resultado7.value += " " + value;
}


</script>



<style>
@import url("webfonts/OpenSans_Semibold/stylesheet.css");


img{
	border-radius:10px;
	
	}


input{
	border-radius:10px;
	border-color:#FF0000;
	border: solid #F00;
	height:20px;
	width:250px;
	border-width:1px;
	padding:5px;
	
	}
.ck{
	width:20px;
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
.vasio{border-color:transparent;}	
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
<table width="50%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><img src="Fotos/<?php echo $row_DetailRS1['img']; ?>" width="400" height="300" /></td>
  </tr>
</table>




<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" enctype="multipart/form-data">
  <table width="513" align="center">
    <tr valign="baseline">
      <td width="100"  align="center" valign="middle" nowrap="nowrap" class="td">Id:</td>
      <td colspan="2" align="center" valign="middle"  class="td"><?php echo $row_DetailRS1['id']; ?></td>
    </tr>
    <tr valign="baseline">
      <td width="100" align="center" valign="middle" nowrap="nowrap" class="td">Imagem:</td>
      <td colspan="2" class="td" align="left" valign="middle"><input type="FILE" class="vasio" name="img" value="<?php echo htmlentities($row_DetailRS1['img'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td width="100" align="center" valign="middle" nowrap="nowrap" class="td">Titulo:</td>
      <td width="250" align="center" valign="middle"><input type="text" id="resultado1" name="titulo" value="<?php echo htmlentities($row_DetailRS1['titulo'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      <td class="td" width="250" align="center" valign="middle"><input class="ck" onclick="add1(value)" type="checkbox" value="&nbsp;" />
            PULAR LINHA </td>
    </tr>
    <tr valign="baseline">
      <td width="100" align="center" valign="middle" nowrap="nowrap"  class="td">Linha 1:</td>
      <td width="250" align="center" valign="middle"><input id="resultado2" type="text" name="linha_1" value="<?php echo htmlentities($row_DetailRS1['linha_1'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      <td class="td"  width="250" align="center" valign="middle"><input class="ck" onclick="add2(value)" type="checkbox" value=" " />
      PULAR  LINHA </td>
    </tr>
    <tr valign="baseline">
      <td width="100"  align="center" valign="middle" nowrap="nowrap" class="td">Linha 2:</td>
      <td width="250" align="center" valign="middle"><input type="text" id="resultado3" name="linha_2" value="<?php echo htmlentities($row_DetailRS1['linha_2'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      <td  class="td" width="250" align="center" valign="middle"><input class="ck" onclick="add3(value)" type="checkbox" value=" " />
      PULAR  LINHA </td>
    </tr>
    <tr valign="baseline">
      <td width="100"  align="center" valign="middle" nowrap="nowrap" class="td">Linha 3:</td>
      <td width="250" align="center" valign="middle"><input type="text" id="resultado4" name="linha_3" value="<?php echo htmlentities($row_DetailRS1['linha_3'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      <td  class="td" width="250" align="center" valign="middle"><input class="ck" onclick="add4(value)" type="checkbox" value=" " />
      PULAR  LINHA </td>
    </tr>
    <tr valign="baseline">
      <td width="100" align="center" valign="middle" nowrap="nowrap"  class="td">Linha 4:</td>
      <td width="250" align="center" valign="middle"><input type="text" id="resultado5" name="linha_4" value="<?php echo htmlentities($row_DetailRS1['linha_4'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      <td class="td"  width="250" align="center" valign="middle"><input class="ck" onclick="add5(value)" type="checkbox" value=" " />
      PULAR LINHA </td>
    </tr>
    <tr valign="baseline">
      <td width="100" align="center" valign="middle" nowrap="nowrap"  class="td">Linha 5:</td>
      <td width="250" align="center" valign="middle"><input type="text" id="resultado6" name="linha_5" value="<?php echo htmlentities($row_DetailRS1['linha_5'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      <td class="td"  width="250" align="center" valign="middle"><input class="ck" onclick="add6(value)" type="checkbox" value=" " />
      PULAR LINHA </td>
    </tr>
    <tr valign="baseline">
      <td width="100" align="center" valign="middle" nowrap="nowrap"  class="td">Linha 6:</td>
      <td width="250" align="center" valign="middle"><input type="text" id="resultado7" name="linha_6" value="<?php echo htmlentities($row_DetailRS1['linha_6'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      <td class="td"  width="250" align="center" valign="middle"><input class="ck" onclick="add7(value)" type="checkbox" value=" " />
      PULAR LINHA </td>
    </tr>
    <tr valign="baseline">
      <td width="100" align="center" valign="middle" nowrap="nowrap"  class="td">Data hora:</td>
      <td width="250" align="center" valign="middle"><input type="text" name="data_hora" value="<?php echo htmlentities($row_DetailRS1['data_hora'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      <td width="250" align="center" valign="middle">&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td width="100" align="center" valign="middle" nowrap="nowrap">&nbsp;</td>
      <td width="250"  align="center" valign="middle"><input class="sub" type="submit" value="Atualizar registro" /></td>
      <td width="250"  align="center" valign="middle">&nbsp;</td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id" value="<?php echo $row_DetailRS1['id']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html><?php
mysql_free_result($DetailRS1);

mysql_free_result($DetailRS2);
?>