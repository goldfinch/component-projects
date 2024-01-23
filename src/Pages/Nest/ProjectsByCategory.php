<?php

namespace Goldfinch\Component\Projects\Pages\Nest;

use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Component\Projects\Controllers\Nest\ProjectsByCategoryController;

class ProjectsByCategory extends Nest
{
    private static $table_name = 'ProjectsByCategory';

    private static $controller_name = ProjectsByCategoryController::class;

    private static $icon_class = 'font-icon-block-accordion';

    protected function onBeforeWrite()
    {
        parent::onBeforeWrite();

        $this->ShowInMenus = 0;
        $this->ShowInSearch = 0;
    }
}
