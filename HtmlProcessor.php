<?php

$response = [];

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestBody = json_decode(file_get_contents('php://input'), true);

    if (!empty($requestBody)) {
        $requestElement = array_shift($requestBody);
        $response['formatted_text'] = preg_replace('/<a[^>]*>(.*?)<\/a>/s', '$1', $requestElement);
    } else {
        http_response_code(500);
        $response['error'] = 'Тело пустое';
    }
}
print_r(json_encode($response));
