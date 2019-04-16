<?php

class Db {
	private $db;

	public function __construct() {
		$config = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/config/database.ini', true);
		try {
			$this->db = new PDO($config['driver'].':host='.$config['host'].';dbname='.$config['database'], $config['user'], $config['password'],array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		} catch (PDOException $e) {
			die('Imposible conectar a la base de datos.');
		}
	}

	public function query($sql, $vars = []) {
		$st = $this->db->prepare($sql);
		$res = $st->execute($vars);
		if(!$res) {
    	print_r($st->errorInfo());
    	die;
		} else {
			return $st;
		}
	}

	public function lastInserted() {
		return $this->db->lastInsertId();
	}

	public function __destruct() {
		//liberar conexión
		$this->db = null;
	}
}
