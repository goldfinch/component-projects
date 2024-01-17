<?php

namespace Goldfinch\Component\Projects\Commands;

use Goldfinch\Taz\Services\InputOutput;
use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\ArrayInput;

#[AsCommand(name: 'vendor:component-projects-projectitem')]
class ProjectItemExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-projects-projectitem';

    protected $description = 'Create ProjectItem extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-projects item extension';

    protected $stub = 'projectitem-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
