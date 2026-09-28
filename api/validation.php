<?php

function ats_jsonschema_validate(array $payload, array $required): array
{
    $validator = 'jsonschema';
    $errors = [];
    foreach ($required as $field) {
        if (!array_key_exists($field, $payload) || trim((string) $payload[$field]) === '') {
            $errors[] = $field . ' is required';
        }
    }

    return $errors;
}
