<?php

require_once './Database.php';

$db = Database::getInstance();

$connection = $db->getConnection();

$query = $connection->query("SELECT * FROM foods");

$result = $query->fetchAll(PDO::FETCH_ASSOC);

print_r($result);
