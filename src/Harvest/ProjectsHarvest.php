<?php

namespace Goldfinch\Component\Projects\Harvest;

use Goldfinch\Harvest\Harvest;
use Goldfinch\Component\Projects\Pages\Nest\Projects;
use Goldfinch\Component\Projects\Models\Nest\ProjectItem;
use Goldfinch\Component\Projects\Models\Nest\ProjectCategory;
use Goldfinch\Component\Projects\Pages\Nest\ProjectsByCategory;

class ProjectsHarvest extends Harvest
{
    public static function run(): void
    {
        $projectsPage = Projects::mill(1)->make([
            'Title' => 'Projects',
            'Content' => '',
        ])->first();

        $byCategoryPage = ProjectsByCategory::mill(1)->make([
            'Title' => 'Projects by category',
            'Content' => '',
            'ParentID' => $projectsPage->ID,
        ]);

        ProjectCategory::mill(5)->make();

        ProjectItem::mill(20)->make()->each(function($item) {
            $categories = ProjectCategory::get()->shuffle()->limit(rand(0,4));

            foreach ($categories as $category) {
                $item->Categories()->add($category);
            }
        });
    }
}
