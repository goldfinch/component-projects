<?php

namespace Goldfinch\Component\Projects\Pages\Nest;

use Goldfinch\Harvest\Harvest;
use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Harvest\Traits\HarvestTrait;
use Goldfinch\Component\Projects\Controllers\Nest\ProjectsController;

class Projects extends Nest
{
    use HarvestTrait;

    private static $table_name = 'Projects';

    private static $controller_name = ProjectsController::class;

    private static $icon_class = 'font-icon-block-accordion';

    public function harvest(Harvest $harvest): void
    {
        // ..
    }

    public function harvestSettings(Harvest $harvest): void
    {
        // ..
    }
}
