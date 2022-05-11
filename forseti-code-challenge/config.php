<?php
require 'env.php';

$config = array();
if(ENVIRONMENT == 'dev') {
	define("BASE_URL", "http://localhost/forseti-code-challenge/");
	$config['dbname'] = 'forseti';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {
	define("BASE_URL", "http://siteemproducao_nome.com.br/");
	$config['dbname'] = 'forseti';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = 'root';
}

global $db;
try {
	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}