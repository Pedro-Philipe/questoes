<?php
declare(strict_types=1);

use App\Domain\User\UserRepository;
use App\Infrastructure\Persistence\User\InMemoryUserRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        \App\Domain\Repositories\BancaRepository::class => \DI\autowire(\App\Infrastructure\Persistence\Eloquent\Repositories\Banca\BancaRepository::class),
        \App\Domain\Repositories\OrgaoRepository::class => \DI\autowire(\App\Infrastructure\Persistence\Eloquent\Repositories\Orgao\OrgaoRepository::class),
        \App\Domain\Repositories\AssuntoRepository::class => \DI\autowire(\App\Infrastructure\Persistence\Eloquent\Repositories\Assunto\AssuntoRepository::class),
    ]);
};
