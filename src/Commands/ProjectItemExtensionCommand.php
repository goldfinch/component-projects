<?php

namespace Goldfinch\Component\Projects\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-projects:ext:item')]
class ProjectItemExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-projects:ext:item';

    protected $description = 'Create ProjectItem extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/projectitem-extension.stub';

    protected $suffix = 'Extension';
}
