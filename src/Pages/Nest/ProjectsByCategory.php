<?php

namespace Goldfinch\Component\Projects\Pages\Nest;

use Goldfinch\Harvest\Harvest;
use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Harvest\Traits\HarvestTrait;
use Goldfinch\Component\Projects\Models\Nest\ProjectCategory;
use Goldfinch\Component\Projects\Controllers\Nest\ProjectsByCategoryController;

class ProjectsByCategory extends Nest
{
    use HarvestTrait;

    private static $table_name = 'ProjectsByCategory';

    private static $controller_name = ProjectsByCategoryController::class;

    private static $allowed_children = [];

    private static $icon_class = 'font-icon-block-accordion';

    public function harvest(Harvest $harvest): void
    {
        $harvest->remove([
            'Content',
            'MenuTitle',
        ]);

        $harvest->description('Title', 'Does not show up anywhere except SiteTree in the CMS');
    }

    public function harvestSettings(Harvest $harvest): void
    {
        $harvest->removeFieldsInTab('Root.Search');
        $harvest->removeFieldsInTab('Root.General');
        $harvest->removeFieldsInTab('Root.SEO');

        $harvest->disable(['NestedObject', 'NestedPseudo']);
    }

    protected function onBeforeWrite()
    {
        parent::onBeforeWrite();

        $this->NestedObject = ProjectCategory::class;
        $this->NestedPseudo = 1;
        $this->ShowInMenus = 0;
        $this->ShowInSearch = 0;
    }
}
