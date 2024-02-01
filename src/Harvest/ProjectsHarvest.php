<?php

namespace Goldfinch\Component\Projects\Harvest;

use Goldfinch\Harvest\Harvest;
use Goldfinch\Blocks\Pages\Blocks;
use Goldfinch\Component\Projects\Pages\Nest\Projects;
use Goldfinch\Component\Projects\Blocks\ProjectsBlock;
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

        ProjectsByCategory::mill(1)->make([
            'Title' => 'Projects by category',
            'Content' => '',
            'ParentID' => $projectsPage->ID,
        ]);

        ProjectCategory::mill(5)->make();

        ProjectItem::mill(30)->make()->each(function($item) {
            $categories = ProjectCategory::get()->shuffle()->limit(rand(0,4));

            foreach ($categories as $category) {
                $item->Categories()->add($category);
            }
        });

        // add one block to Blocks demo page (if it's exists)
        if (class_exists(Blocks::class)) {
            $demoBlocks = Blocks::get()->filter('Title', 'Blocks')->first();

            if ($demoBlocks && $demoBlocks->exists() && $demoBlocks->ElementalArea()->exists()) {
                ProjectsBlock::mill(1)->make([
                    'ClassName' => $demoBlocks->ClassName,
                    'TopPageID' => $demoBlocks->ID,
                    'ParentID' => $demoBlocks->ElementalArea()->ID,
                    'Title' => 'Projects',
                ]);
            }
        }
    }
}
