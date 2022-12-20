<?php 

$env_path = realpath(dirname(__FILE__, 1)) . "/src/config/env.ini";

$env = parse_ini_file($env_path);

require_once(dirname(__FILE__) . "/src/config/database.php");

Database::getConnection();

$sql = "SELECT * FROM users";

$result = Database::getResultFromQuery($sql);

while($row = $result->fetch_assoc()) {
	print_r($row);
	echo "<hr>";
}
