<?php
header('Content-Type: application/json');
$path = '/health';
echo json_encode([
    'status' => 'ok',
    'service' => 'ats',
    'check' => $path,
    'time' => gmdate('c'),
]);
