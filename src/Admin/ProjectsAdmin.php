<?php

namespace Goldfinch\Component\Projects\Admin;

use Goldfinch\Component\Projects\Models\Nest\ProjectItem;
use Goldfinch\Component\Projects\Blocks\ProjectsBlock;
use Goldfinch\Component\Projects\Configs\ProjectConfig;
use Goldfinch\Component\Projects\Models\Nest\ProjectCategory;
use SilverStripe\Admin\ModelAdmin;
use JonoM\SomeConfig\SomeConfigAdmin;
use SilverStripe\Forms\GridField\GridFieldConfig;

class ProjectsAdmin extends ModelAdmin
{
    use SomeConfigAdmin;

    private static $url_segment = 'projects';
    private static $menu_title = 'Projects';
    private static $menu_icon_class = 'font-icon-block-accordion';
    // private static $menu_priority = -0.5;

    private static $managed_models = [
        ProjectItem::class => [
            'title'=> 'Projects',
        ],
        ProjectCategory::class => [
            'title'=> 'Categories',
        ],
        ProjectsBlock::class => [
            'title'=> 'Blocks',
        ],
        ProjectConfig::class => [
            'title'=> 'Settings',
        ],
    ];

    // public $showImportForm = true;
    // public $showSearchForm = true;
    // private static $page_length = 30;

    public function getList()
    {
        $list = parent::getList();

        // ..

        return $list;
    }

    protected function getGridFieldConfig(): GridFieldConfig
    {
        $config = parent::getGridFieldConfig();

        // ..

        return $config;
    }

    public function getSearchContext()
    {
        $context = parent::getSearchContext();

        // ..

        return $context;
    }

    public function getEditForm($id = null, $fields = null)
    {
        $form = parent::getEditForm($id, $fields);

        // ..

        return $form;
    }

    // public function getExportFields()
    // {
    //     return [
    //         // 'Name' => 'Name',
    //         // 'Category.Title' => 'Category'
    //     ];
    // }
}
