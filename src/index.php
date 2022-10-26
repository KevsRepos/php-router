<?php declare(strict_types=1);

require_once __DIR__ . "/package/router.php";

$router = new Router\Router();

$router->handle_request();

echo $router->get_page();