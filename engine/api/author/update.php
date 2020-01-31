<?php

use Database\PDO;

$pdo = new PDO();

$request = json_decode(file_get_contents("php://input"), true);
if (!isset($request['old']) || !isset($request['new']))
    throw new RuntimeException("Fields 'old', 'new' must be exists");

if (!$pdo->checkAuthor($request['old'])) throw new RuntimeException("Author '${request['old']}' does not exist");
if ($pdo->checkAuthor($request['new'])) throw new RuntimeException("Author '${request['new']}' already exists");
$pdo->updateAuthor($request['old'], $request['new']);
