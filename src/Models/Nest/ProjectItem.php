<?php

namespace Goldfinch\Component\Projects\Models\Nest;

use Goldfinch\Harvest\Harvest;
use SilverStripe\Assets\Image;
use SilverStripe\Control\Director;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\Harvest\Traits\HarvestTrait;
use Goldfinch\Component\Projects\Admin\ProjectsAdmin;
use Goldfinch\Component\Projects\Pages\Nest\Projects;
use Goldfinch\Component\Projects\Configs\ProjectConfig;

class ProjectItem extends NestedObject
{
    use HarvestTrait;

    public static $nest_up = null;
    public static $nest_up_children = [];
    public static $nest_down = Projects::class;
    public static $nest_down_parents = [];

    private static $table_name = 'ProjectItem';
    private static $singular_name = 'project';
    private static $plural_name = 'projects';

    private static $db = [];

    private static $many_many = [
        'Categories' => ProjectCategory::class,
    ];

    private static $many_many_extraFields = [
        'Categories' => [
            'SortExtra' => 'Int',
        ],
    ];

    private static $has_one = [
        'Image' => Image::class,
    ];

    private static $owns = ['Image', 'Categories'];

    private static $summary_fields = [
        'Image.CMSThumbnail' => 'Image',
    ];

    public function harvest(Harvest $harvest): void
    {
        $harvest->require(['Title']);

        $harvest->fields([
            'Root.Main' => [
                $harvest->string('Title'),
                $harvest->tag('Categories'),
                ...$harvest->media('Image'),
            ],
        ]);

        $harvest->dataField('Image')->setFolderName('projects');

        $cfg = ProjectConfig::current_config();

        if ($cfg->DisabledCategories) {
            $harvest->remove('Categories');
        }
    }

    public function getNextItem()
    {
        return ProjectItem::get()
            ->filter(['SortOrder:LessThan' => $this->SortOrder])
            ->Sort('SortOrder DESC')
            ->first();
    }

    public function getPreviousItem()
    {
        return ProjectItem::get()
            ->filter(['SortOrder:GreaterThan' => $this->SortOrder])
            ->first();
    }

    public function getOtherItems()
    {
        return ProjectItem::get()
            ->filter('ID:not', $this->ID)
            ->limit(6);
    }

    public function CMSEditLink()
    {
        $admin = new ProjectsAdmin();
        return Director::absoluteBaseURL() .
            '/' .
            $admin->getCMSEditLinkForManagedDataObject($this);
    }
}
