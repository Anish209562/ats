<?php
header('Content-Type: application/json');
$path = '/readiness';
echo json_encode([
    'status' => 'ready',
    'service' => 'ats',
    'check' => $path,
    'time' => gmdate('c'),
]);
