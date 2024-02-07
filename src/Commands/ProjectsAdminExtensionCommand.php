<?php

namespace Goldfinch\Component\Projects\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-projects:ext:admin')]
class ProjectsAdminExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-projects:ext:admin';

    protected $description = 'Create ProjectsAdmin extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/projectsadmin-extension.stub';

    protected $suffix = 'Extension';
}
