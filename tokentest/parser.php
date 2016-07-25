<?php
require __DIR__ . '\\vendor\\autoload.php';
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\ValidationData;
$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJub25lIiwianRpIjoiNGYxZzIzYTEyYWEifQ.eyJqdGkiOiI0ZjFnMjNhMTJhYSIsImlhdCI6MTQ2OTQzMTQ1NiwibmJmIjoxNDY5NDMxNTE2LCJleHAiOjE0Njk0MzUwNTYsInVzZXJFbWFpbCI6IjQ0MzQ3NDcxM0BxcS5jb20iLCJ1c2VyUGFzcyI6ImZ1Y2tKYXZhIn0.';
$token = (new Parser())->parse((string) $token); // Parses from a string
$token->getHeaders(); // Retrieves the token header
$token->getClaims(); // Retrieves the token claims


$data = new ValidationData(); // It will use the current time to validate (iat, nbf and exp)
$data->setIssuer('http://example.com');
$data->setAudience('http://example.org');
$data->setId('4f1g23a12aa');

var_dump($token->validate($data)); // false, because token cannot be used before of now() + 60

$data->setCurrentTime(time() + 61); // changing the validation time to future

var_dump($token->validate($data)); // true, because current time is between "nbf" and "exp" claims

$data->setCurrentTime(time() + 4000); // changing the validation time to future

var_dump($token->validate($data)); // false, because token is expired since current time is greater than exp