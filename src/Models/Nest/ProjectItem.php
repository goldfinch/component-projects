<?php

namespace Goldfinch\Component\Projects\Models\Nest;

use Goldfinch\Fielder\Fielder;
use SilverStripe\Assets\Image;
use SilverStripe\Control\Director;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\Fielder\Traits\FielderTrait;
use Goldfinch\Component\Projects\Admin\ProjectsAdmin;
use Goldfinch\Component\Projects\Pages\Nest\Projects;
use Goldfinch\Component\Projects\Configs\ProjectConfig;

class ProjectItem extends NestedObject
{
    use FielderTrait;

    public static $nest_up = null;
    public static $nest_up_children = [];
    public static $nest_down = Projects::class;
    public static $nest_down_parents = [];

    private static $table_name = 'ProjectItem';
    private static $singular_name = 'project';
    private static $plural_name = 'projects';

    private static $db = [
        'Content' => 'HTMLText',
    ];

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

    public function fielder(Fielder $fielder): void
    {
        $fielder->require(['Title']);

        $fielder->fields([
            'Root.Main' => [
                $fielder->string('Title'),
                $fielder->html('Content'),
                $fielder->tag('Categories'),
                ...$fielder->media('Image'),
            ],
        ]);

        $fielder->dataField('Image')->setFolderName('projects');

        $cfg = ProjectConfig::current_config();

        if ($cfg->DisabledCategories) {
            $fielder->remove('Categories');
        }
    }

    // type : mix | inside | outside
    public function OtherItems($type = 'mix', $limit = 6)
    {
        $model = ProjectItem::get()->filter(['ID:not' => $this->ID])->shuffle();

        if ($type == 'mix') {
            //
        } else if ($type == 'inside') {
            $categories = $this->Categories()->column('ID');

            if (count($categories)) {
                $model = $model->filterAny('Categories.ID', $categories);
            }
        } else if ($type == 'outside') {
            $categories = $this->Categories()->column('ID');

            if (count($categories)) {
                $model = $model->filterAny('Categories.ID:not', $categories);
            }
        }

        return $model->limit($limit);
    }

    public function CMSEditLink()
    {
        $admin = new ProjectsAdmin();
        return Director::absoluteBaseURL() .
            '/' .
            $admin->getCMSEditLinkForManagedDataObject($this);
    }
}
