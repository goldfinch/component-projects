<?php

namespace Goldfinch\Component\Projects\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-projects:ext:controller')]
class ProjectsControllerExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-projects:ext:controller';

    protected $description = 'Create ProjectsController extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/projectscontroller-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
