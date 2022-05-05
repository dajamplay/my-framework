<?php

use Framework\Http\ResponseSender;
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\Diactoros\Response;
use Aura\Router\RouterContainer;

require __DIR__ . '/../vendor/autoload.php';

### Initialization

$router = new RouterContainer();

$routes = $router->getMap();

$router->get('blog.read', '/blog/{id}', function ($request, $response) {
    $id = (int) $request->getAttribute('id');
    $response->getBody()->write("You asked for blog entry {$id}.");
    return $response;
});

$request = ServerRequestFactory::fromGlobals();

### Action

$response = new Response();

$response->getBody()->write("<b>some content</b>\n");

$response = $response
    ->withAddedHeader('X-Project-name', 'yes-framework');

$emitter = new ResponseSender();
$emitter->send($response);

