<?php

namespace Goldfinch\Component\Projects\Pages\Nest;

use Goldfinch\Harvest\Harvest;
use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Harvest\Traits\HarvestTrait;
use Goldfinch\Component\Projects\Models\Nest\ProjectItem;
use Goldfinch\Component\Projects\Pages\Nest\ProjectsByCategory;
use Goldfinch\Component\Projects\Controllers\Nest\ProjectsController;

class Projects extends Nest
{
    use HarvestTrait;

    private static $table_name = 'Projects';

    private static $controller_name = ProjectsController::class;

    private static $allowed_children = [ProjectsByCategory::class];

    private static $icon_class = 'font-icon-block-accordion';

    public function harvest(Harvest $harvest): void
    {
        // ..
    }

    public function harvestSettings(Harvest $harvest): void
    {
        $harvest->disable(['NestedObject', 'NestedPseudo']);
    }

    protected function onBeforeWrite()
    {
        parent::onBeforeWrite();

        $this->NestedObject = ProjectItem::class;
        $this->NestedPseudo = 0;
    }
}
