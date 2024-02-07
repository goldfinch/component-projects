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

    protected $no_arguments = true;

    protected function execute($input, $output): int
    {
        $command = $this->getApplication()->find('vendor:component-projects:ext:admin');
        $command->run(new ArrayInput(['name' => 'ProjectsAdmin']), $output);

        $command = $this->getApplication()->find('vendor:component-projects:ext:config');
        $command->run(new ArrayInput(['name' => 'ProjectConfig']), $output);

        $command = $this->getApplication()->find('vendor:component-projects:ext:block');
        $command->run(new ArrayInput(['name' => 'ProjectsBlock']), $output);

        $command = $this->getApplication()->find('vendor:component-projects:ext:page');
        $command->run(new ArrayInput(['name' => 'Projects']), $output);

        $command = $this->getApplication()->find('vendor:component-projects:ext:controller');
        $command->run(new ArrayInput(['name' => 'ProjectsController']), $output);

        $command = $this->getApplication()->find('vendor:component-projects:ext:item');
        $command->run(new ArrayInput(['name' => 'ProjectItem']), $output);

        $command = $this->getApplication()->find('vendor:component-projects:ext:category');
        $command->run(new ArrayInput(['name' => 'ProjectCategory']), $output);

        $command = $this->getApplication()->find('vendor:component-projects:config');
        $command->run(new ArrayInput(['name' => 'component-projects']), $output);

        $command = $this->getApplication()->find('vendor:component-projects:templates');
        $command->run(new ArrayInput([]), $output);

        return Command::SUCCESS;
    }
}
