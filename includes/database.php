<?php

define('HOST', 'cvweb.chguzftnednb.eu-north-1.rds.amazonaws.com');
define('DB_NAME', 'cvweb');
define('USER', 'root');
define('PASS', 'ccggo92140');

try {
	$db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

	echo $e;
}

?>