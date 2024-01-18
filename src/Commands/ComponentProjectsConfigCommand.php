<?php

namespace Goldfinch\Component\Projects\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-projects:config')]
class ComponentProjectsConfigCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-projects:config';

    protected $description = 'Create component-projects config';

    protected $path = 'app/_config';

    protected $type = 'component-projects yml config';

    protected $stub = 'projectconfig.stub';

    protected $extension = '.yml';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
