<?php

namespace Goldfinch\Component\Projects\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;

#[AsCommand(name: 'vendor:component-projects')]
class ProjectsSetCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-projects';

    protected $description = 'Set of all [goldfinch/component-projects] commands';

    protected function execute($input, $output): int
    {
        $command = $this->getApplication()->find(
            'vendor:component-projects:ext:admin',
        );
        $input = new ArrayInput(['name' => 'ProjectsAdmin']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-projects:ext:config',
        );
        $input = new ArrayInput(['name' => 'ProjectConfig']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-projects:ext:block',
        );
        $input = new ArrayInput(['name' => 'ProjectsBlock']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-projects:ext:page',
        );
        $input = new ArrayInput(['name' => 'Projects']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-projects:ext:controller',
        );
        $input = new ArrayInput(['name' => 'ProjectsController']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-projects:ext:item',
        );
        $input = new ArrayInput(['name' => 'ProjectItem']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-projects:ext:category',
        );
        $input = new ArrayInput(['name' => 'ProjectCategory']);
        $command->run($input, $output);

        $command = $this->getApplication()->find('vendor:component-projects:config');
        $input = new ArrayInput(['name' => 'component-projects']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-projects:templates',
        );
        $input = new ArrayInput([]);
        $command->run($input, $output);

        return Command::SUCCESS;
    }
}
