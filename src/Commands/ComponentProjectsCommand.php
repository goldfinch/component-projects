<?php

namespace Goldfinch\Component\Projects\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;

#[AsCommand(name: 'vendor:component-projects')]
class ComponentProjectsCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-projects';

    protected $description = 'Populate goldfinch/component-projects components';

    protected function execute($input, $output): int
    {
        $command = $this->getApplication()->find(
            'vendor:component-projects-projectitem',
        );
        $input = new ArrayInput(['name' => 'ProjectItem']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-projects-projectcategory',
        );
        $input = new ArrayInput(['name' => 'ProjectCategory']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-projects-projectconfig',
        );
        $input = new ArrayInput(['name' => 'ProjectConfig']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-projects-projectsblock',
        );
        $input = new ArrayInput(['name' => 'ProjectsBlock']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'templates:component-projects',
        );
        $input = new ArrayInput([]);
        $command->run($input, $output);

        $command = $this->getApplication()->find('config:component-projects');
        $input = new ArrayInput(['name' => 'component-projects']);
        $command->run($input, $output);

        return Command::SUCCESS;
    }
}
