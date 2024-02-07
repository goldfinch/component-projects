<?php

namespace Goldfinch\Component\Projects\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-projects:ext:block')]
class ProjectsBlockExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-projects:ext:block';

    protected $description = 'Create ProjectsBlock extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/projectsblock-extension.stub';

    protected $suffix = 'Extension';
}
