<?php

namespace Goldfinch\Component\Projects\Pages\Nest;

use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Component\Projects\Controllers\Nest\ProjectsController;

class Projects extends Nest
{
    private static $table_name = 'Projects';

    private static $controller_name = ProjectsController::class;

    private static $icon_class = 'font-icon-block-accordion';
}
