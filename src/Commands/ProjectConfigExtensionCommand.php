<?php

namespace Goldfinch\Component\Projects\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-projects:ext:config')]
class ProjectConfigExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-projects:ext:config';

    protected $description = 'Create ProjectConfig extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/projectconfig-extension.stub';

    protected $suffix = 'Extension';
}
