<?php

namespace Goldfinch\Component\Projects\Pages\Nest;

use Goldfinch\Fielder\Fielder;
use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Fielder\Traits\FielderTrait;
use Goldfinch\Component\Projects\Models\Nest\ProjectItem;
use Goldfinch\Component\Projects\Pages\Nest\ProjectsByCategory;
use Goldfinch\Component\Projects\Controllers\Nest\ProjectsController;

class Projects extends Nest
{
    use FielderTrait;

    private static $table_name = 'Projects';

    private static $controller_name = ProjectsController::class;

    private static $allowed_children = [ProjectsByCategory::class];

    private static $icon_class = 'font-icon-block-accordion';

    public function fielder(Fielder $fielder): void
    {
        // ..
    }

    public function fielderSettings(Fielder $fielder): void
    {
        $fielder->disable(['NestedObject', 'NestedPseudo']);
    }

    protected function onBeforeWrite()
    {
        parent::onBeforeWrite();

        $this->NestedObject = ProjectItem::class;
        $this->NestedPseudo = 0;
    }
}
