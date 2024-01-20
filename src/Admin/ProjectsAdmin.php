<?php

namespace Goldfinch\Component\Projects\Admin;

use SilverStripe\Admin\ModelAdmin;
use JonoM\SomeConfig\SomeConfigAdmin;
use Goldfinch\Component\Projects\Blocks\ProjectsBlock;
use Goldfinch\Component\Projects\Configs\ProjectConfig;
use Goldfinch\Component\Projects\Models\Nest\ProjectItem;
use Goldfinch\Component\Projects\Models\Nest\ProjectCategory;

class ProjectsAdmin extends ModelAdmin
{
    use SomeConfigAdmin;

    private static $url_segment = 'projects';
    private static $menu_title = 'Projects';
    private static $menu_icon_class = 'font-icon-block-accordion';
    // private static $menu_priority = -0.5;

    private static $managed_models = [
        ProjectItem::class => [
            'title' => 'Projects',
        ],
        ProjectCategory::class => [
            'title' => 'Categories',
        ],
        ProjectsBlock::class => [
            'title' => 'Blocks',
        ],
        ProjectConfig::class => [
            'title' => 'Settings',
        ],
    ];

    public function getManagedModels()
    {
        $models = parent::getManagedModels();

        $cfg = ProjectConfig::current_config();

        if ($cfg->DisabledCategories) {
            unset($models[ProjectCategory::class]);
        }

        if (!class_exists('DNADesign\Elemental\Models\BaseElement')) {
            unset($models[ProjectsBlock::class]);
        }

        if (empty($cfg->config('db')->db)) {
            unset($models[ProjectConfig::class]);
        }

        return $models;
    }
}
