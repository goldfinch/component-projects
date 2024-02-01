<?php

namespace Goldfinch\Component\Projects\Models\Nest;

use Goldfinch\Fielder\Fielder;
use Goldfinch\Mill\Traits\Millable;
use SilverStripe\ORM\PaginatedList;
use SilverStripe\Control\Controller;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\Fielder\Traits\FielderTrait;
use Goldfinch\Component\Projects\Pages\Nest\ProjectsByCategory;

class ProjectCategory extends NestedObject
{
    use FielderTrait, Millable;

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

    public function fielder(Fielder $fielder): void
    {
        $fielder->require(['Title']);

        $fielder->fields([
            'Root.Main' => [
                $fielder->string('Title'),
                $fielder->html('Content'),
            ],
        ]);
    }

    public function List()
    {
        if (Controller::has_curr()) {
            $ctrl = Controller::curr();

            return PaginatedList::create($this->Items(), $ctrl->getRequest()); // ->setPageLength(10);
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
