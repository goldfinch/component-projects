<?php

namespace Goldfinch\Component\Projects\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-projects:config')]
class ProjectsConfigCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-projects:config';

    protected $description = 'Create Projects YML config';

    protected $path = 'app/_config';

    protected $type = 'config';

    protected $stub = './stubs/config.stub';

    protected $extension = '.yml';
}
