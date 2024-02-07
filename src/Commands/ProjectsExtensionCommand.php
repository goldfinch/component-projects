<?php

namespace Goldfinch\Component\Projects\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-projects:ext:page')]
class ProjectsExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-projects:ext:page';

    protected $description = 'Create Projects page extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/projects-extension.stub';

    protected $suffix = 'Extension';
}
