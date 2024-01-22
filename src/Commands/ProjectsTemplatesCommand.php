<?php

namespace Goldfinch\Component\Projects\Commands;

use Goldfinch\Taz\Services\Templater;
use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-projects:templates')]
class ProjectsTemplatesCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-projects:templates';

    protected $description = 'Publish [goldfinch/component-projects] templates';

    protected function execute($input, $output): int
    {
        $templater = Templater::create($input, $output, $this, 'goldfinch/component-projects');

        $theme = $templater->defineTheme();

        if (is_string($theme)) {

            $componentPath = BASE_PATH . '/vendor/goldfinch/component-projects/templates/Goldfinch/Component/Projects/';
            $themePath = 'themes/' . $theme . '/templates/Goldfinch/Component/Projects/';

            $files = [
                [
                    'from' => $componentPath . 'Blocks/ProjectsBlock.ss',
                    'to' => $themePath . 'Blocks/ProjectsBlock.ss',
                ],
                [
                    'from' => $componentPath . 'Models/Nest/ProjectItem.ss',
                    'to' => $themePath . 'Models/Nest/ProjectItem.ss',
                ],
                [
                    'from' => $componentPath . 'Pages/Nest/Projects.ss',
                    'to' => $themePath . 'Pages/Nest/Projects.ss',
                ],
            ];

            return $templater->copyFiles($files);
        } else {
            return $theme;
        }
    }
}
