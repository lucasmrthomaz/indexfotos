<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conexao2 = "localhost";
$database_conexao2 = "usereventos";
$username_conexao2 = "root";
$password_conexao2 = "";
$conexao2 = mysql_pconnect($hostname_conexao2, $username_conexao2, $password_conexao2) or trigger_error(mysql_error(),E_USER_ERROR); 
?>