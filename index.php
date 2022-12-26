<?php 

$env_path = realpath(dirname(__FILE__, 1)) . "/src/config/env.ini";

$env = parse_ini_file($env_path);

require_once(dirname(__FILE__) . "/src/config/config.php");
require_once(dirname(__FILE__) . "/src/views/login.php");

Database::getConnection();

// $sql = "SELECT * FROM users";

// $result = Database::getResultFromQuery($sql);

// while($row = $result->fetch_assoc()) {
// 	print_r($row);
// 	echo "<hr>";
// }

// $user = new User(['name' => 'James', 'email' => 'james@cod.br']);
// $user->email = 'novo@email.com';
// print_r($user->email);

// print_r(User::get(['id' => 2], 'name, email'));

// print_r(User::get([], 'name'));

// echo '<br>';

// echo User::getSelect(['name' => 'Chaves']);

// foreach (User::get() as $user) {
// 	echo "<pre>";
// 	print_r($user);
// 	echo "</pre>";
// }



