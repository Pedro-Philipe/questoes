<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use App\Infrastructure\Persistence\Eloquent\Bootstrap;

return function (App $app) {
    $container = $app->getContainer();
    Bootstrap::load($container);


    $app->options('/{routes:.+}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });

    $app->group('/api/programa', function (Group $group) use ($container) {
        $group->get('/banca', \App\Application\Actions\Banca\ListarBancasAction::class);
        $group->get('/orgao', \App\Application\Actions\Orgao\ListarOrgaosAction::class);
        $group->get('/assunto', \App\Application\Actions\Assunto\ObterAssunto::class);
    });
};
