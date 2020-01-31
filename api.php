<?php

try {
    header('Content-Type: application/json');
    http_response_code(200);
    include __DIR__ . "/engine/api/$routes[2]/$routes[3].php";
} catch (RuntimeException $e) {
    http_response_code(500);
    print json_encode([
        'issueType' => substr(strrchr(get_class($e), "\\"), 1),
        'issueMessage' => $e->getMessage(),
        'issueCode' => $e->getCode()
    ]);
}
