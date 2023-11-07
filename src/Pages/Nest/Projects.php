<?php

namespace Goldfinch\Component\Projects\Pages\Nest;

use Goldfinch\Component\Projects\Controllers\Nest\ProjectsController;
use Goldfinch\Nest\Pages\Nest;

class Projects extends Nest
{
    private static $table_name = 'Projects';
    private static $controller_name = ProjectsController::class;

    private static $icon_class = 'bi-inboxes-fill';
}
