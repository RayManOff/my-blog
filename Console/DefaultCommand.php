<?php

namespace Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DefaultCommand extends Command
{
    protected function configure()
    {
        $this->setName('default')->setDescription('Outputs \'Hello World\'');
//        $this->setDefinition('Команда запускется по умолчанию если название команды не передано');

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Команда оп',
            'умолчанию',
            '=========='
        ]);

    }
}