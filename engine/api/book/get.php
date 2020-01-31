<?php

use Database\PDO;

$request = json_decode(file_get_contents("php://input"), true);

if (!isset($request['id']))
    throw new RuntimeException("Field 'id' must be set");

$mysqli = new PDO();

$book = $mysqli->getBook($request['id']);
$book['authors'] = $mysqli->getAuthorsIdsOfBook($book['id']);

print json_encode($book);
