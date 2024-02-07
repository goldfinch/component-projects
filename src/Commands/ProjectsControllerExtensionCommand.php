<?php

namespace Goldfinch\Component\Projects\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-projects:ext:controller')]
class ProjectsControllerExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-projects:ext:controller';

    protected $description = 'Create ProjectsController extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/projectscontroller-extension.stub';

    protected $suffix = 'Extension';
}
