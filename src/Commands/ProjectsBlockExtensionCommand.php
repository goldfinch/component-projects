<?php

namespace Goldfinch\Component\Projects\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-projects-projectsblock')]
class ProjectsBlockExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-projects-projectsblock';

    protected $description = 'Create ProjectsBlock extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-projects block extension';

    protected $stub = 'projectsblock-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
