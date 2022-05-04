<?php

use Framework\Http\RequestFactory;
use Framework\Http\Response;

require __DIR__ . '/../vendor/autoload.php';

### Initialization

$request = RequestFactory::fromGlobals();

### Action

$response = (new Response())
    ->withHeader('X-developer', 'DaJaM');

### Sending

header('HTTP/1.1 ' . $response->getStatusCode() . ' ' . $response->getReasonPhrase());
foreach ($response->getHeaders() as $name => $value) {
    header($name . ':' . $value);
}
echo $response->getBody();