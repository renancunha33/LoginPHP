<?php
 
 
$conexao = mysql_connect("Localhost", "root", "") or die (mysql_error());
 
mysql_query('CREATE DATABASE IF NOT EXISTS BANCO') or die (mysql_error());
 
 
mysql_query('USE BANCO') or die (mysql_error());
 
mysql_query('CREATE TABLE IF NOT EXISTS `DAODS` (
 `ds_nome` varchar(50) NOT NULL,
 `ds_telefone` varchar(15) NOT NULL,
 `cd_login` varchar(30) NOT NULL,
 KEY `cd_login` (`cd_login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
') or die (mysql_error());
 
mysql_query('CREATE TABLE IF NOT EXISTS `LOGIN` (
 `cd_login` varchar(20) NOT NULL,
 `ds_senha` varchar(20) NOT NULL,
 PRIMARY KEY (`cd_login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
') or die (mysql_error());
 
 
mysql_query("ALTER TABLE `DAODS`
 ADD CONSTRAINT `DAODS_ibfk_1` FOREIGN KEY (`cd_login`) REFERENCES `LOGIN` (`cd_login`);") or die (mysql_error());
 

 echo "<script>javascript:alert('Banco criado!')</script>";

 echo "<script>javascript:location.href='login.php?valor=1'</script>";

?>
