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

$maxRows_Recordset1 = 1;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_conexao, $conexao);
$query_Recordset1 = "SELECT * FROM slaid_1 ORDER BY id DESC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $conexao) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$maxRows_Recordset2 = 1;
$pageNum_Recordset2 = 0;
if (isset($_GET['pageNum_Recordset2'])) {
  $pageNum_Recordset2 = $_GET['pageNum_Recordset2'];
}
$startRow_Recordset2 = $pageNum_Recordset2 * $maxRows_Recordset2;

mysql_select_db($database_conexao, $conexao);
$query_Recordset2 = "SELECT * FROM slaid_2 ORDER BY id DESC";
$query_limit_Recordset2 = sprintf("%s LIMIT %d, %d", $query_Recordset2, $startRow_Recordset2, $maxRows_Recordset2);
$Recordset2 = mysql_query($query_limit_Recordset2, $conexao) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);

if (isset($_GET['totalRows_Recordset2'])) {
  $totalRows_Recordset2 = $_GET['totalRows_Recordset2'];
} else {
  $all_Recordset2 = mysql_query($query_Recordset2);
  $totalRows_Recordset2 = mysql_num_rows($all_Recordset2);
}
$totalPages_Recordset2 = ceil($totalRows_Recordset2/$maxRows_Recordset2)-1;

$maxRows_Recordset4 = 1;
$pageNum_Recordset4 = 0;
if (isset($_GET['pageNum_Recordset4'])) {
  $pageNum_Recordset4 = $_GET['pageNum_Recordset4'];
}
$startRow_Recordset4 = $pageNum_Recordset4 * $maxRows_Recordset4;

mysql_select_db($database_conexao, $conexao);
$query_Recordset4 = "SELECT * FROM slaid_4 ORDER BY id DESC";
$query_limit_Recordset4 = sprintf("%s LIMIT %d, %d", $query_Recordset4, $startRow_Recordset4, $maxRows_Recordset4);
$Recordset4 = mysql_query($query_limit_Recordset4, $conexao) or die(mysql_error());
$row_Recordset4 = mysql_fetch_assoc($Recordset4);

if (isset($_GET['totalRows_Recordset4'])) {
  $totalRows_Recordset4 = $_GET['totalRows_Recordset4'];
} else {
  $all_Recordset4 = mysql_query($query_Recordset4);
  $totalRows_Recordset4 = mysql_num_rows($all_Recordset4);
}
$totalPages_Recordset4 = ceil($totalRows_Recordset4/$maxRows_Recordset4)-1;

$maxRows_Recordset5 = 1;
$pageNum_Recordset5 = 0;
if (isset($_GET['pageNum_Recordset5'])) {
  $pageNum_Recordset5 = $_GET['pageNum_Recordset5'];
}
$startRow_Recordset5 = $pageNum_Recordset5 * $maxRows_Recordset5;

mysql_select_db($database_conexao, $conexao);
$query_Recordset5 = "SELECT * FROM slaid_5 ORDER BY id DESC";
$query_limit_Recordset5 = sprintf("%s LIMIT %d, %d", $query_Recordset5, $startRow_Recordset5, $maxRows_Recordset5);
$Recordset5 = mysql_query($query_limit_Recordset5, $conexao) or die(mysql_error());
$row_Recordset5 = mysql_fetch_assoc($Recordset5);

if (isset($_GET['totalRows_Recordset5'])) {
  $totalRows_Recordset5 = $_GET['totalRows_Recordset5'];
} else {
  $all_Recordset5 = mysql_query($query_Recordset5);
  $totalRows_Recordset5 = mysql_num_rows($all_Recordset5);
}
$totalPages_Recordset5 = ceil($totalRows_Recordset5/$maxRows_Recordset5)-1;

$maxRows_Recordset6 = 1;
$pageNum_Recordset6 = 0;
if (isset($_GET['pageNum_Recordset6'])) {
  $pageNum_Recordset6 = $_GET['pageNum_Recordset6'];
}
$startRow_Recordset6 = $pageNum_Recordset6 * $maxRows_Recordset6;

mysql_select_db($database_conexao, $conexao);
$query_Recordset6 = "SELECT * FROM slaid_6 ORDER BY id DESC";
$query_limit_Recordset6 = sprintf("%s LIMIT %d, %d", $query_Recordset6, $startRow_Recordset6, $maxRows_Recordset6);
$Recordset6 = mysql_query($query_limit_Recordset6, $conexao) or die(mysql_error());
$row_Recordset6 = mysql_fetch_assoc($Recordset6);

if (isset($_GET['totalRows_Recordset6'])) {
  $totalRows_Recordset6 = $_GET['totalRows_Recordset6'];
} else {
  $all_Recordset6 = mysql_query($query_Recordset6);
  $totalRows_Recordset6 = mysql_num_rows($all_Recordset6);
}
$totalPages_Recordset6 = ceil($totalRows_Recordset6/$maxRows_Recordset6)-1;

$maxRows_Recordset7 = 1;
$pageNum_Recordset7 = 0;
if (isset($_GET['pageNum_Recordset7'])) {
  $pageNum_Recordset7 = $_GET['pageNum_Recordset7'];
}
$startRow_Recordset7 = $pageNum_Recordset7 * $maxRows_Recordset7;

mysql_select_db($database_conexao, $conexao);
$query_Recordset7 = "SELECT * FROM slaid_7 ORDER BY id DESC";
$query_limit_Recordset7 = sprintf("%s LIMIT %d, %d", $query_Recordset7, $startRow_Recordset7, $maxRows_Recordset7);
$Recordset7 = mysql_query($query_limit_Recordset7, $conexao) or die(mysql_error());
$row_Recordset7 = mysql_fetch_assoc($Recordset7);

if (isset($_GET['totalRows_Recordset7'])) {
  $totalRows_Recordset7 = $_GET['totalRows_Recordset7'];
} else {
  $all_Recordset7 = mysql_query($query_Recordset7);
  $totalRows_Recordset7 = mysql_num_rows($all_Recordset7);
}
$totalPages_Recordset7 = ceil($totalRows_Recordset7/$maxRows_Recordset7)-1;

$maxRows_Recordset3 = 10;
$pageNum_Recordset3 = 0;
if (isset($_GET['pageNum_Recordset3'])) {
  $pageNum_Recordset3 = $_GET['pageNum_Recordset3'];
}
$startRow_Recordset3 = $pageNum_Recordset3 * $maxRows_Recordset3;

mysql_select_db($database_conexao, $conexao);
$query_Recordset3 = "SELECT * FROM slaid_3 ORDER BY id DESC";
$query_limit_Recordset3 = sprintf("%s LIMIT %d, %d", $query_Recordset3, $startRow_Recordset3, $maxRows_Recordset3);
$Recordset3 = mysql_query($query_limit_Recordset3, $conexao) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);

if (isset($_GET['totalRows_Recordset3'])) {
  $totalRows_Recordset3 = $_GET['totalRows_Recordset3'];
} else {
  $all_Recordset3 = mysql_query($query_Recordset3);
  $totalRows_Recordset3 = mysql_num_rows($all_Recordset3);
}
$totalPages_Recordset3 = ceil($totalRows_Recordset3/$maxRows_Recordset3)-1;

$maxRows_Recordset8 = 1;
$pageNum_Recordset8 = 0;
if (isset($_GET['pageNum_Recordset8'])) {
  $pageNum_Recordset8 = $_GET['pageNum_Recordset8'];
}
$startRow_Recordset8 = $pageNum_Recordset8 * $maxRows_Recordset8;

mysql_select_db($database_conexao, $conexao);
$query_Recordset8 = "SELECT * FROM slaid_3 ORDER BY id DESC";
$query_limit_Recordset8 = sprintf("%s LIMIT %d, %d", $query_Recordset8, $startRow_Recordset8, $maxRows_Recordset8);
$Recordset8 = mysql_query($query_limit_Recordset8, $conexao) or die(mysql_error());
$row_Recordset8 = mysql_fetch_assoc($Recordset8);

if (isset($_GET['totalRows_Recordset8'])) {
  $totalRows_Recordset8 = $_GET['totalRows_Recordset8'];
} else {
  $all_Recordset8 = mysql_query($query_Recordset8);
  $totalRows_Recordset8 = mysql_num_rows($all_Recordset8);
}
$totalPages_Recordset8 = ceil($totalRows_Recordset8/$maxRows_Recordset8)-1;

$maxRows_record11 = 5;
$pageNum_record11 = 0;
if (isset($_GET['pageNum_record11'])) {
  $pageNum_record11 = $_GET['pageNum_record11'];
}
$startRow_record11 = $pageNum_record11 * $maxRows_record11;

mysql_select_db($database_conexao, $conexao);
$query_record11 = "SELECT * FROM slaid_1 WHERE id < $row_Recordset1[id] ORDER BY id DESC";
$query_limit_record11 = sprintf("%s LIMIT %d, %d", $query_record11, $startRow_record11, $maxRows_record11);
$record11 = mysql_query($query_limit_record11, $conexao) or die(mysql_error());
$row_record11 = mysql_fetch_assoc($record11);

if (isset($_GET['totalRows_record11'])) {
  $totalRows_record11 = $_GET['totalRows_record11'];
} else {
  $all_record11 = mysql_query($query_record11);
  $totalRows_record11 = mysql_num_rows($all_record11);
}
$totalPages_record11 = ceil($totalRows_record11/$maxRows_record11)-1;

$maxRows_record12 = 5;
$pageNum_record12 = 0;
if (isset($_GET['pageNum_record12'])) {
  $pageNum_record12 = $_GET['pageNum_record12'];
}
$startRow_record12 = $pageNum_record12 * $maxRows_record12;

mysql_select_db($database_conexao, $conexao);
$query_record12 = "SELECT * FROM slaid_2 WHERE id < $row_Recordset2[id] ORDER BY id DESC";
$query_limit_record12 = sprintf("%s LIMIT %d, %d", $query_record12, $startRow_record12, $maxRows_record12);
$record12 = mysql_query($query_limit_record12, $conexao) or die(mysql_error());
$row_record12 = mysql_fetch_assoc($record12);

if (isset($_GET['totalRows_record12'])) {
  $totalRows_record12 = $_GET['totalRows_record12'];
} else {
  $all_record12 = mysql_query($query_record12);
  $totalRows_record12 = mysql_num_rows($all_record12);
}
$totalPages_record12 = ceil($totalRows_record12/$maxRows_record12)-1;

$maxRows_record13 = 5;
$pageNum_record13 = 0;
if (isset($_GET['pageNum_record13'])) {
  $pageNum_record13 = $_GET['pageNum_record13'];
}
$startRow_record13 = $pageNum_record13 * $maxRows_record13;

mysql_select_db($database_conexao, $conexao);
$query_record13 = "SELECT * FROM slaid_3 WHERE id < $row_Recordset8[id] ORDER BY id DESC";
$query_limit_record13 = sprintf("%s LIMIT %d, %d", $query_record13, $startRow_record13, $maxRows_record13);
$record13 = mysql_query($query_limit_record13, $conexao) or die(mysql_error());
$row_record13 = mysql_fetch_assoc($record13);

if (isset($_GET['totalRows_record13'])) {
  $totalRows_record13 = $_GET['totalRows_record13'];
} else {
  $all_record13 = mysql_query($query_record13);
  $totalRows_record13 = mysql_num_rows($all_record13);
}
$totalPages_record13 = ceil($totalRows_record13/$maxRows_record13)-1;

$maxRows_record14 = 10;
$pageNum_record14 = 0;
if (isset($_GET['pageNum_record14'])) {
  $pageNum_record14 = $_GET['pageNum_record14'];
}
$startRow_record14 = $pageNum_record14 * $maxRows_record14;

mysql_select_db($database_conexao, $conexao);
$query_record14 = "SELECT * FROM slaid_4 WHERE id < $row_Recordset4[id] ORDER BY id DESC";
$query_limit_record14 = sprintf("%s LIMIT %d, %d", $query_record14, $startRow_record14, $maxRows_record14);
$record14 = mysql_query($query_limit_record14, $conexao) or die(mysql_error());
$row_record14 = mysql_fetch_assoc($record14);

if (isset($_GET['totalRows_record14'])) {
  $totalRows_record14 = $_GET['totalRows_record14'];
} else {
  $all_record14 = mysql_query($query_record14);
  $totalRows_record14 = mysql_num_rows($all_record14);
}
$totalPages_record14 = ceil($totalRows_record14/$maxRows_record14)-1;

$maxRows_record15 = 5;
$pageNum_record15 = 0;
if (isset($_GET['pageNum_record15'])) {
  $pageNum_record15 = $_GET['pageNum_record15'];
}
$startRow_record15 = $pageNum_record15 * $maxRows_record15;

mysql_select_db($database_conexao, $conexao);
$query_record15 = "SELECT * FROM slaid_5 WHERE id < $row_Recordset5[id] ORDER BY id DESC";
$query_limit_record15 = sprintf("%s LIMIT %d, %d", $query_record15, $startRow_record15, $maxRows_record15);
$record15 = mysql_query($query_limit_record15, $conexao) or die(mysql_error());
$row_record15 = mysql_fetch_assoc($record15);

if (isset($_GET['totalRows_record15'])) {
  $totalRows_record15 = $_GET['totalRows_record15'];
} else {
  $all_record15 = mysql_query($query_record15);
  $totalRows_record15 = mysql_num_rows($all_record15);
}
$totalPages_record15 = ceil($totalRows_record15/$maxRows_record15)-1;

$maxRows_record16 = 5;
$pageNum_record16 = 0;
if (isset($_GET['pageNum_record16'])) {
  $pageNum_record16 = $_GET['pageNum_record16'];
}
$startRow_record16 = $pageNum_record16 * $maxRows_record16;

mysql_select_db($database_conexao, $conexao);
$query_record16 = "SELECT * FROM slaid_6 WHERE id < $row_Recordset6[id] ORDER BY id DESC";
$query_limit_record16 = sprintf("%s LIMIT %d, %d", $query_record16, $startRow_record16, $maxRows_record16);
$record16 = mysql_query($query_limit_record16, $conexao) or die(mysql_error());
$row_record16 = mysql_fetch_assoc($record16);

if (isset($_GET['totalRows_record16'])) {
  $totalRows_record16 = $_GET['totalRows_record16'];
} else {
  $all_record16 = mysql_query($query_record16);
  $totalRows_record16 = mysql_num_rows($all_record16);
}
$totalPages_record16 = ceil($totalRows_record16/$maxRows_record16)-1;

$maxRows_record17 = 5;
$pageNum_record17 = 0;
if (isset($_GET['pageNum_record17'])) {
  $pageNum_record17 = $_GET['pageNum_record17'];
}
$startRow_record17 = $pageNum_record17 * $maxRows_record17;

mysql_select_db($database_conexao, $conexao);
$query_record17 = "SELECT * FROM slaid_7 WHERE id < $row_Recordset7[id] ORDER BY id DESC";
$query_limit_record17 = sprintf("%s LIMIT %d, %d", $query_record17, $startRow_record17, $maxRows_record17);
$record17 = mysql_query($query_limit_record17, $conexao) or die(mysql_error());
$row_record17 = mysql_fetch_assoc($record17);

if (isset($_GET['totalRows_record17'])) {
  $totalRows_record17 = $_GET['totalRows_record17'];
} else {
  $all_record17 = mysql_query($query_record17);
  $totalRows_record17 = mysql_num_rows($all_record17);
}
$totalPages_record17 = ceil($totalRows_record17/$maxRows_record17)-1;

$queryString_record11 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_record11") == false && 
        stristr($param, "totalRows_record11") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_record11 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_record11 = sprintf("&totalRows_record11=%d%s", $totalRows_record11, $queryString_record11);

$queryString_record12 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_record12") == false && 
        stristr($param, "totalRows_record12") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_record12 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_record12 = sprintf("&totalRows_record12=%d%s", $totalRows_record12, $queryString_record12);

$queryString_record13 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_record13") == false && 
        stristr($param, "totalRows_record13") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_record13 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_record13 = sprintf("&totalRows_record13=%d%s", $totalRows_record13, $queryString_record13);

$queryString_record14 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_record14") == false && 
        stristr($param, "totalRows_record14") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_record14 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_record14 = sprintf("&totalRows_record14=%d%s", $totalRows_record14, $queryString_record14);

$queryString_record15 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_record15") == false && 
        stristr($param, "totalRows_record15") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_record15 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_record15 = sprintf("&totalRows_record15=%d%s", $totalRows_record15, $queryString_record15);

$queryString_record16 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_record16") == false && 
        stristr($param, "totalRows_record16") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_record16 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_record16 = sprintf("&totalRows_record16=%d%s", $totalRows_record16, $queryString_record16);

$queryString_record17 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_record17") == false && 
        stristr($param, "totalRows_record17") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_record17 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_record17 = sprintf("&totalRows_record17=%d%s", $totalRows_record17, $queryString_record17);

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

$queryString_Recordset2 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset2") == false && 
        stristr($param, "totalRows_Recordset2") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset2 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset2 = sprintf("&totalRows_Recordset2=%d%s", $totalRows_Recordset2, $queryString_Recordset2);

$queryString_Recordset3 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset3") == false && 
        stristr($param, "totalRows_Recordset3") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset3 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset3 = sprintf("&totalRows_Recordset3=%d%s", $totalRows_Recordset3, $queryString_Recordset3);

$queryString_Recordset4 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset4") == false && 
        stristr($param, "totalRows_Recordset4") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset4 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset4 = sprintf("&totalRows_Recordset4=%d%s", $totalRows_Recordset4, $queryString_Recordset4);

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

$queryString_Recordset7 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset7") == false && 
        stristr($param, "totalRows_Recordset7") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset7 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset7 = sprintf("&totalRows_Recordset7=%d%s", $totalRows_Recordset7, $queryString_Recordset7);

$queryString_Recordset8 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset8") == false && 
        stristr($param, "totalRows_Recordset8") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset8 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset8 = sprintf("&totalRows_Recordset8=%d%s", $totalRows_Recordset8, $queryString_Recordset8);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>

<style>
@import url("webfonts/OpenSans_Semibold/stylesheet.css");

img{
	border-radius:10px;
	
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
<p>&nbsp;</p>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top">SLIDE 1
      <table width="80%" border="0" align="center" cellpadding="5" cellspacing="5">
    <tr bgcolor="#CCCCCC">
      <td width="30%" align="center" valign="top" class="td" >Número</td>
      <td width="30%" align="center" valign="top" class="td">Imagem</td>
      <td width="60%" align="center" valign="top" class="td">Título</td>
    </tr>
    <?php do { ?>
        <tr valign="middle">
          <td  align="center" class="td"><a href="slide1.php?recordID=<?php echo $row_Recordset1['id']; ?>">Ativo</a><br /><?php echo $row_Recordset1['data_hora']; ?></td>
          <td align="center"  class="td"><img src="Fotos/<?php echo $row_Recordset1['img']; ?>" width="80" height="50" /></td>
          <td  align="center" class="td"><?php echo $row_Recordset1['titulo']; ?></td>
        </tr><?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
        
        
         <?php do { ?><tr valign="middle">
      <td   align="center" class="td"><a href="slide1.php?recordID=<?php echo $row_record11['id']; ?>">Anteriores</a> <br /><?php echo $row_record11['data_hora']; ?></td>
      <td align="center"  class="td"><img src="Fotos/<?php echo $row_record11['img']; ?>" width="80" height="50" /></td>
      <td   align="center" class="td"><?php echo $row_record11['titulo']; ?></td>
    </tr> <?php } while ($row_record11 = mysql_fetch_assoc($record11)); ?>
    
  </table>
    
      
      <br />
      <table border="0">
        <tr>
          <td><?php if ($pageNum_record11 > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_record11=%d%s", $currentPage, 0, $queryString_record11); ?>">Primeiro</a>
              <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_record11 > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_record11=%d%s", $currentPage, max(0, $pageNum_record11 - 1), $queryString_record11); ?>">Anterior</a>
              <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_record11 < $totalPages_record11) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_record11=%d%s", $currentPage, min($totalPages_record11, $pageNum_record11 + 1), $queryString_record11); ?>">Próximo</a>
              <?php } // Show if not last page ?></td>
          <td><?php if ($pageNum_record11 < $totalPages_record11) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_record11=%d%s", $currentPage, $totalPages_record11, $queryString_record11); ?>">Último</a>
              <?php } // Show if not last page ?></td>
        </tr>
      </table>
Registros <?php echo ($startRow_record11 + 1) ?> a <?php echo min($startRow_record11 + $maxRows_record11, $totalRows_record11) ?> de <?php echo $totalRows_record11 ?>

      <p><br />
    </p></td>
    <td align="center" valign="top">SLIDE 2
      <table width="80%" border="0" align="center" cellpadding="5" cellspacing="5">
        <tr bgcolor="#CCCCCC">
      <td width="30%" align="center" valign="top" class="td" >Número</td>
      <td width="30%" align="center" valign="top" class="td">Imagem</td>
      <td width="60%" align="center" valign="top" class="td">Título</td>
    </tr>
        <?php do { ?>
        <tr valign="middle">
          <td  class="td" align="center"><a href="slide2.php?recordID=<?php echo $row_Recordset2['id']; ?>"> Ativo</a><br /><?php echo $row_Recordset2['data_hora']; ?></td>
          <td  class="td" align="center"><img src="Fotos/<?php echo $row_Recordset2['img']; ?>" alt="" width="80" height="50" /></td>
          <td class="td" align="center"><?php echo $row_Recordset2['titulo']; ?>&nbsp; </td>
        </tr>
        <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>
        
        
        <?php do { ?><tr valign="middle">
      <td   align="center" class="td"><a href="slide1.php?recordID=<?php echo $row_record12['id']; ?>">Anteriores</a><br /><?php echo $row_record12['data_hora']; ?></td>
      <td align="center"  class="td"><img src="Fotos/<?php echo $row_record12['img']; ?>" width="80" height="50" /></td>
      <td   align="center" class="td"><?php echo $row_record12['titulo']; ?></td>
    </tr> <?php } while ($row_record12 = mysql_fetch_assoc($record12)); ?>
    
    </table>
     
      <br />
      <table border="0">
        <tr>
          <td><?php if ($pageNum_record12 > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_record12=%d%s", $currentPage, 0, $queryString_record12); ?>">Primeiro</a>
          <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_record12 > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_record12=%d%s", $currentPage, max(0, $pageNum_record12 - 1), $queryString_record12); ?>">Anterior</a>
          <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_record12 < $totalPages_record12) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_record12=%d%s", $currentPage, min($totalPages_record12, $pageNum_record12 + 1), $queryString_record12); ?>">Próximo</a>
          <?php } // Show if not last page ?></td>
          <td><?php if ($pageNum_record12 < $totalPages_record12) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_record12=%d%s", $currentPage, $totalPages_record12, $queryString_record12); ?>">Último</a>
          <?php } // Show if not last page ?></td>
        </tr>
      </table>
Registros <?php echo ($startRow_record12 + 1) ?> a <?php echo min($startRow_record12 + $maxRows_record12, $totalRows_record12) ?> de <?php echo $totalRows_record12 ?> <br /></td>
    <td align="center" valign="top">SLIDE 3
      <table width="80%" border="0" align="center" cellpadding="5" cellspacing="5">
    <tr bgcolor="#CCCCCC">
      <td width="30%" align="center" valign="top" class="td" >Número</td>
      <td width="30%" align="center" valign="top" class="td">Imagem</td>
      <td width="60%" align="center" valign="top" class="td">Título</td>
    </tr>
        <?php do { ?>
        <tr valign="middle">
          <td  class="td" align="center"><a href="slide3.php?recordID=<?php echo $row_Recordset8['id']; ?>"> Ativo</a><br /><?php echo $row_Recordset8['data_hora']; ?></td>
          <td  class="td" align="center"><img src="Fotos/<?php echo $row_Recordset8['img']; ?>" alt="" width="80" height="50" /></td>
          <td  class="td" align="center"><?php echo $row_Recordset8['titulo']; ?>&nbsp; </td>
        </tr>
        <?php } while ($row_Recordset8 = mysql_fetch_assoc($Recordset8)); ?>
        
        
        <?php do { ?><tr valign="middle">
      <td   align="center" class="td"><a href="slide1.php?recordID=<?php echo $row_record13['id']; ?>">Anteriores</a><br /><?php echo $row_record13['data_hora']; ?></td>
      <td  align="center"  class="td"><img src="Fotos/<?php echo $row_record13['img']; ?>" width="80" height="50" /></td>
      <td   align="center" class="td"><?php echo $row_record13['titulo']; ?></td>
    </tr> <?php } while ($row_record13 = mysql_fetch_assoc($record13)); ?>
    
    
      </table>
      <br />
      <table border="0">
        <tr>
          <td><?php if ($pageNum_record13 > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_record13=%d%s", $currentPage, 0, $queryString_record13); ?>">Primeiro</a>
          <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_record13 > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_record13=%d%s", $currentPage, max(0, $pageNum_record13 - 1), $queryString_record13); ?>">Anterior</a>
          <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_record13 < $totalPages_record13) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_record13=%d%s", $currentPage, min($totalPages_record13, $pageNum_record13 + 1), $queryString_record13); ?>">Próximo</a>
          <?php } // Show if not last page ?></td>
          <td><?php if ($pageNum_record13 < $totalPages_record13) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_record13=%d%s", $currentPage, $totalPages_record13, $queryString_record13); ?>">Último</a>
          <?php } // Show if not last page ?></td>
        </tr>
      </table>
Registros <?php echo ($startRow_record13 + 1) ?> a <?php echo min($startRow_record13 + $maxRows_record13, $totalRows_record13) ?> de <?php echo $totalRows_record13 ?> <br /></td>
  </tr>
  <tr>
    <td height="70" align="center" valign="top">&nbsp;</td>
    <td align="center" valign="top">&nbsp;</td>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top">SLIDE 4
      <table width="80%" border="0" align="center" cellpadding="5" cellspacing="5">
    <tr bgcolor="#CCCCCC">
      <td width="30%" align="center" valign="top" class="td" >Número</td>
      <td width="30%" align="center" valign="top" class="td">Imagem</td>
      <td width="60%" align="center" valign="top" class="td">Título</td>
    </tr>
        <?php do { ?>
        <tr valign="middle">
          <td width="70" align="center"  class="td"><a href="slide4.php?recordID=<?php echo $row_Recordset4['id']; ?>"> Ativo</a><br /><?php echo $row_Recordset4['data_hora']; ?></td>
          <td  class="td" align="center"><img src="Fotos/<?php echo $row_Recordset4['img']; ?>" alt="" width="80" height="50" /></td>
          <td  class="td" align="center"><?php echo $row_Recordset4['titulo']; ?>&nbsp; </td>
        </tr>
        <?php } while ($row_Recordset4 = mysql_fetch_assoc($Recordset4)); ?>
        
        <?php do { ?><tr valign="middle">
      <td  align="center" class="td"><a href="slide1.php?recordID=<?php echo $row_record14['id']; ?>">Anteriores</a><br /><?php echo $row_record14['data_hora']; ?></td>
      <td align="center"  class="td"><img src="Fotos/<?php echo $row_record14['img']; ?>" width="80" height="50" /></td>
      <td   align="center" class="td"><?php echo $row_record14['titulo']; ?></td>
    </tr> <?php } while ($row_record14 = mysql_fetch_assoc($record14)); ?>
    
      </table>
      <br />
      <table border="0">
        <tr>
          <td><?php if ($pageNum_record14 > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_record14=%d%s", $currentPage, 0, $queryString_record14); ?>">Primeiro</a>
          <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_record14 > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_record14=%d%s", $currentPage, max(0, $pageNum_record14 - 1), $queryString_record14); ?>">Anterior</a>
          <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_record14 < $totalPages_record14) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_record14=%d%s", $currentPage, min($totalPages_record14, $pageNum_record14 + 1), $queryString_record14); ?>">Próximo</a>
          <?php } // Show if not last page ?></td>
          <td><?php if ($pageNum_record14 < $totalPages_record14) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_record14=%d%s", $currentPage, $totalPages_record14, $queryString_record14); ?>">Último</a>
          <?php } // Show if not last page ?></td>
        </tr>
      </table>
Registros <?php echo ($startRow_record14 + 1) ?> a <?php echo min($startRow_record14 + $maxRows_record14, $totalRows_record14) ?> de <?php echo $totalRows_record14 ?>
</p>
      <p><br />
      </p></td>
    <td align="center" valign="top">SLIDE 5
      <table width="80%" border="0" align="center" cellpadding="5" cellspacing="5">
    <tr bgcolor="#CCCCCC">
      <td width="30%" align="center" valign="top" class="td" >Número</td>
      <td width="30%" align="center" valign="top" class="td">Imagem</td>
      <td width="60%" align="center" valign="top" class="td">Título</td>
    </tr>
        <?php do { ?>
        <tr valign="middle">
          <td  class="td" align="center"><a href="slide5.php?recordID=<?php echo $row_Recordset5['id']; ?>"> Ativo</a><br /><?php echo $row_Recordset5['data_hora']; ?></td>
          <td  class="td" align="center"><img src="Fotos/<?php echo $row_Recordset5['img']; ?>" alt="" width="80" height="50" /></td>
          <td class="td"  align="center"><?php echo $row_Recordset5['titulo']; ?>&nbsp; </td>
        </tr>
        <?php } while ($row_Recordset5 = mysql_fetch_assoc($Recordset5)); ?>
        
        
        <?php do { ?><tr valign="middle">
      <td   align="center" class="td"><a href="slide1.php?recordID=<?php echo $row_record15['id']; ?>">Anteriores</a><br /><?php echo $row_record15['data_hora']; ?></td>
      <td  align="center"  class="td"><img src="Fotos/<?php echo $row_record15['img']; ?>" width="80" height="50" /></td>
      <td   align="center" class="td"><?php echo $row_record15['titulo']; ?></td>
    </tr> <?php } while ($row_record15 = mysql_fetch_assoc($record15)); ?>
      </table>
      <br />
      <table border="0">
        <tr>
          <td><?php if ($pageNum_record15 > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_record15=%d%s", $currentPage, 0, $queryString_record15); ?>">Primeiro</a>
          <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_record15 > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_record15=%d%s", $currentPage, max(0, $pageNum_record15 - 1), $queryString_record15); ?>">Anterior</a>
          <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_record15 < $totalPages_record15) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_record15=%d%s", $currentPage, min($totalPages_record15, $pageNum_record15 + 1), $queryString_record15); ?>">Próximo</a>
          <?php } // Show if not last page ?></td>
          <td><?php if ($pageNum_record15 < $totalPages_record15) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_record15=%d%s", $currentPage, $totalPages_record15, $queryString_record15); ?>">Último</a>
          <?php } // Show if not last page ?></td>
        </tr>
      </table>
Registros <?php echo ($startRow_record15 + 1) ?> a <?php echo min($startRow_record15 + $maxRows_record15, $totalRows_record15) ?> de <?php echo $totalRows_record15 ?></td>
    <td align="center" valign="top">SLIDE 6
      <table width="80%" border="0" align="center" cellpadding="5" cellspacing="5">
    <tr bgcolor="#CCCCCC">
      <td width="30%" align="center" valign="top" class="td" >Número</td>
      <td width="30%" align="center" valign="top" class="td">Imagem</td>
      <td width="60%" align="center" valign="top" class="td">Título</td>
    </tr>
        <?php do { ?>
        <tr valign="middle">
          <td class="td"  align="center"><a href="slide6.php?recordID=<?php echo $row_Recordset6['id']; ?>"> Ativo</a><br /><?php echo $row_Recordset6['data_hora']; ?></td>
          <td  class="td" align="center"><img src="Fotos/<?php echo $row_Recordset6['img']; ?>" alt="" width="80" height="50" /></td>
          <td class="td"  align="center"><?php echo $row_Recordset6['titulo']; ?>&nbsp; </td>
        </tr>
        <?php } while ($row_Recordset6 = mysql_fetch_assoc($Recordset6)); ?>
        
        
        <?php do { ?><tr valign="middle">
      <td   align="center" class="td"><a href="slide1.php?recordID=<?php echo $row_record16['id']; ?>">Anteriores</a><br /><?php echo $row_record16['data_hora']; ?></td>
      <td align="center"  class="td"><img src="Fotos/<?php echo $row_record16['img']; ?>" width="80" height="50" /></td>
      <td   align="center" class="td"><?php echo $row_record16['titulo']; ?></td>
    </tr> <?php } while ($row_record16 = mysql_fetch_assoc($record16)); ?>
      </table>
      <br />
      <table border="0">
        <tr>
          <td><?php if ($pageNum_record16 > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_record16=%d%s", $currentPage, 0, $queryString_record16); ?>">Primeiro</a>
          <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_record16 > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_record16=%d%s", $currentPage, max(0, $pageNum_record16 - 1), $queryString_record16); ?>">Anterior</a>
          <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_record16 < $totalPages_record16) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_record16=%d%s", $currentPage, min($totalPages_record16, $pageNum_record16 + 1), $queryString_record16); ?>">Próximo</a>
          <?php } // Show if not last page ?></td>
          <td><?php if ($pageNum_record16 < $totalPages_record16) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_record16=%d%s", $currentPage, $totalPages_record16, $queryString_record16); ?>">Último</a>
          <?php } // Show if not last page ?></td>
        </tr>
      </table>
Registros <?php echo ($startRow_record16 + 1) ?> a  de <?php echo $totalRows_record16 ?><?php echo min($startRow_record16 + $maxRows_record16, $totalRows_record16) ?></td>
  </tr>
  <tr>
  <td height="70" align="center" valign="top">&nbsp;</td>
  <td align="center" valign="top">&nbsp;</td>
  <td align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
  <td align="center" valign="top">&nbsp;</td>
  <td align="center" valign="top">SLIDE 7
     <table width="80%" border="0" align="center" cellpadding="5" cellspacing="5">
    <tr bgcolor="#CCCCCC">
      <td width="30%" align="center" valign="top" class="td" >Número</td>
      <td width="30%" align="center" valign="top" class="td">Imagem</td>
      <td width="60%" align="center" valign="top" class="td">Título</td>
    </tr>
      <?php do { ?>
      <tr valign="middle">
        <td  class="td" align="center"><a href="slide7.php?recordID=<?php echo $row_Recordset7['id']; ?>"> Ativo</a><br /><?php echo $row_Recordset7['data_hora']; ?></td>
        <td  class="td" align="center"><img src="Fotos/<?php echo $row_Recordset7['img']; ?>" alt="" width="80" height="50" /></td>
        <td  class="td" align="center"><?php echo $row_Recordset7['titulo']; ?> </td>
      </tr>
      <?php } while ($row_Recordset7 = mysql_fetch_assoc($Recordset7)); ?>
      
      
      <?php do { ?><tr valign="middle">
      <td   align="center" class="td"><a href="slide1.php?recordID=<?php echo $row_record17['id']; ?>">Anteriores</a><br /><?php echo $row_record17['data_hora']; ?></td>
      <td  align="center"  class="td"><img src="Fotos/<?php echo $row_record17['img']; ?>" width="80" height="50" /></td>
      <td   align="center" class="td"><?php echo $row_record17['titulo']; ?></td>
    </tr> <?php } while ($row_record17 = mysql_fetch_assoc($record17)); ?>
    </table>
    <br />
    <table border="0">
      <tr>
        <td><?php if ($pageNum_record17 > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_record17=%d%s", $currentPage, 0, $queryString_record17); ?>">Primeiro</a>
            <?php } // Show if not first page ?></td>
        <td><?php if ($pageNum_record17 > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_record17=%d%s", $currentPage, max(0, $pageNum_record17 - 1), $queryString_record17); ?>">Anterior</a>
            <?php } // Show if not first page ?></td>
        <td><?php if ($pageNum_record17 < $totalPages_record17) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_record17=%d%s", $currentPage, min($totalPages_record17, $pageNum_record17 + 1), $queryString_record17); ?>">Próximo</a>
            <?php } // Show if not last page ?></td>
        <td><?php if ($pageNum_record17 < $totalPages_record17) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_record17=%d%s", $currentPage, $totalPages_record17, $queryString_record17); ?>">Último</a>
            <?php } // Show if not last page ?></td>
      </tr>
    </table>
Registros <?php echo ($startRow_record17 + 1) ?> a <?php echo min($startRow_record17 + $maxRows_record17, $totalRows_record17) ?> de <?php echo $totalRows_record17 ?>
<p><br />
  </p></td>
  <td align="center" valign="top"><p>&nbsp;</p></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);

mysql_free_result($Recordset4);

mysql_free_result($Recordset5);

mysql_free_result($Recordset6);

mysql_free_result($Recordset7);

mysql_free_result($Recordset3);

mysql_free_result($Recordset8);

mysql_free_result($record11);

mysql_free_result($record12);

mysql_free_result($record13);

mysql_free_result($record14);

mysql_free_result($record15);

mysql_free_result($record16);

mysql_free_result($record17);
?>
