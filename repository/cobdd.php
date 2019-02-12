<?php
Class Connection {
	private  $server = "localhost";
	private  $dbname = "porfolio oc";
	private  $user = "root";
	private  $pass = "";
	protected $pdo;

	public function openConnection() {
		try {
			$pdo = new PDO("mysql:host=".$this->server.";dbname=".$this->dbname, $this->user, $this->pass);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
			$pdo->exec("SET CHARACTER SET utf8");
			return ($pdo);
		} catch (PDOException $e) {
			$message = $e->getmessage();
			echo $message;
			exit();
		}
	}
	public function closeConnection() {
	 	$this->con = null;
	}
}

?>
