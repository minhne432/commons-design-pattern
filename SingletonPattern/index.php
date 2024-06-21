<?php

require 'Database.php';

$db = Database::getInstance();

$connection = $db->getConnection();

$query = $connection->query("SLECT * FROM foods");
$results = $query->fetchAll(PDO::FETCH_ASSOC);

print_r($results);
