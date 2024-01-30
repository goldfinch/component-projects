<?php

namespace Goldfinch\Component\Projects\Commands;

use Goldfinch\Taz\Services\Templater;
use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-projects:templates')]
class ProjectsTemplatesCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-projects:templates';

    protected $description = 'Publish [goldfinch/component-projects] templates';

    protected $no_arguments = true;

    protected function execute($input, $output): int
    {
        $templater = Templater::create($input, $output, $this, 'goldfinch/component-projects');

        $theme = $templater->defineTheme();

        if (is_string($theme)) {

            $componentPathTemplates = BASE_PATH . '/vendor/goldfinch/component-projects/templates/';
            $componentPath = $componentPathTemplates . 'Goldfinch/Component/Projects/';
            $themeTemplates = 'themes/' . $theme . '/templates/';
            $themePath = $themeTemplates . 'Goldfinch/Component/Projects/';

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
                    'from' => $componentPath . 'Models/Nest/ProjectCategory.ss',
                    'to' => $themePath . 'Models/Nest/ProjectCategory.ss',
                ],
                [
                    'from' => $componentPath . 'Pages/Nest/Projects.ss',
                    'to' => $themePath . 'Pages/Nest/Projects.ss',
                ],
                [
                    'from' => $componentPath . 'Pages/Nest/ProjectsByCategory.ss',
                    'to' => $themePath . 'Pages/Nest/ProjectsByCategory.ss',
                ],
                [
                    'from' => $componentPath . 'Partials/ProjectFilter.ss',
                    'to' => $themePath . 'Partials/ProjectFilter.ss',
                ],
                [
                    'from' => $componentPathTemplates . 'Loadable/Goldfinch/Component/Projects/Models/Nest/ProjectCategory.ss',
                    'to' => $themeTemplates . 'Loadable/Goldfinch/Component/Projects/Models/Nest/ProjectCategory.ss',
                ],
                [
                    'from' => $componentPathTemplates . 'Loadable/Goldfinch/Component/Projects/Models/Nest/ProjectItem.ss',
                    'to' => $themeTemplates . 'Loadable/Goldfinch/Component/Projects/Models/Nest/ProjectItem.ss',
                ],
            ];

            return $templater->copyFiles($files);
        } else {
            return $theme;
        }
    }
}
