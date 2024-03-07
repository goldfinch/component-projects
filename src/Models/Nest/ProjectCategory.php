<?php

namespace Goldfinch\Component\Projects\Models\Nest;

use Goldfinch\Mill\Traits\Millable;
use SilverStripe\ORM\PaginatedList;
use SilverStripe\Control\Controller;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\Component\Projects\Configs\ProjectConfig;
use Goldfinch\Component\Projects\Pages\Nest\ProjectsByCategory;

class ProjectCategory extends NestedObject
{
    use Millable;

    public static $nest_up = null;
    public static $nest_up_children = [];
    public static $nest_down = ProjectsByCategory::class;
    public static $nest_down_parents = [];

    private static $table_name = 'ProjectCategory';
    private static $singular_name = 'category';
    private static $plural_name = 'categories';

    private static $db = [
        'Content' => 'HTMLText',
    ];

    private static $belongs_many_many = [
        'Items' => ProjectItem::class,
    ];

    private static $searchable_list_fields = [
        'Title', 'Content',
    ];

    private static $summary_fields = [
        'Items.Count' => 'Projects',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fielder = $fields->fielder($this);

        $fielder->required(['Title']);

        $fielder->fields([
            'Root.Main' => [
                $fielder->string('Title'),
                $fielder->html('Content'),
            ],
        ]);

        return $fields;
    }

    public function List()
    {
        if (Controller::has_curr()) {
            $ctrl = Controller::curr();

            $cfg = ProjectConfig::current_config();

            return PaginatedList::create($this->Items(), $ctrl->getRequest())->setPageLength($cfg->ItemsPerPage ?? 10);
        }
    }

    public function OtherCategories($type = 'mix', $limit = 6, $escapeEmpty = true)
    {
        $filter = ['ID:not' => $this->ID];

        if ($escapeEmpty) {
            $filter['Items.Count():GreaterThan'] = 0;
        }

        return ProjectCategory::get()->filter($filter)->shuffle()->limit($limit);
    }
}
