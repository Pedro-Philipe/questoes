<?php

namespace App\Application\Console;

use App\Infrastructure\Persistence\Eloquent\Bootstrap;
use App\Infrastructure\Persistence\Eloquent\Seeds\ProgramaDatabaseSeeder;
use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SeederCommand extends Command
{
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        Bootstrap::load($this->container);
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('questoes:seed')
            ->setAliases(['seed'])
            ->setDescription('Execução de dados iniciais')
            ->setHelp('Este comando executará a inserção de dados inciais para funcionamento da aplicação');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("<info>------ Inserindo seeds iniciais ------</info>");
        (new ProgramaDatabaseSeeder())->run();
        $output->writeln("<info>------        Concluído         ------</info>");

        exit;
    }
}
