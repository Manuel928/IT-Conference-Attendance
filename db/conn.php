<?php

// Remote Connection
// $host = "sql9.freesqldatabase.com";
// $db = "sql9635819";
// $user = "sql9635819";
// $password = "INWYKc1Pb9";
// $charset = "utf8mb4";

// $dsn = "mysql:host=$host;dbname=$db;charset=$charset";


// Development Connection

$host = "localhost";
$db = "attendants_db";
$user = "root";
$password = "";
$charset = "utf8mb4";

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "<h2 class = 'text-danger'>No Database Found!</h2>";
    throw new PDOException($e->getMessage());
}

require_once 'crud.php';
$crud = new crud($pdo);


?>







<?php
// $host = 'localhost';
// $db = 'attendants_db';
// $user = 'root';
// $password = '';
// $charset = 'utf8mb4';

// // Data Source Name (dsn)
// $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// try {
//     $pdo = new PDO($dsn, $user, $password);
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     echo "<h3 class = 'text-danger'>No Database Found!</h3>";
//     throw new PDOException($e->getMessage());
// }

// require_once 'crud.php';
// $crud = new crud($pdo);
?>