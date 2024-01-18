<?php

namespace Goldfinch\Component\Projects\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-projects:projectcategory')]
class ProjectCategoryExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-projects:projectcategory';

    protected $description = 'Create ProjectCategory extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-projects category extension';

    protected $stub = 'projectcategory-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
