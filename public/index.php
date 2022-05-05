<?php

use Framework\Http\ResponseSender;
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\Diactoros\Response;

require __DIR__ . '/../vendor/autoload.php';

### Initialization

$request = ServerRequestFactory::fromGlobals();

### Action

$response = new Response();

$response->getBody()->write("<b>some content</b>\n");

$response = $response
    ->withAddedHeader('X-Project-name', 'yes-framework');

$emitter = new ResponseSender();
$emitter->send($response);

