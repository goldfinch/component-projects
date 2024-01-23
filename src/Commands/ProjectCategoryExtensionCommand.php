<?php

namespace Goldfinch\Component\Projects\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-projects:ext:category')]
class ProjectCategoryExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-projects:ext:category';

    protected $description = 'Create ProjectCategory extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/projectcategory-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
