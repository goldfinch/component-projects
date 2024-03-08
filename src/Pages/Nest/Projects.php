<?php

namespace Goldfinch\Component\Projects\Pages\Nest;

use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Mill\Traits\Millable;
use Goldfinch\Component\Projects\Models\Nest\ProjectItem;
use Goldfinch\Component\Projects\Models\Nest\ProjectCategory;
use Goldfinch\Component\Projects\Pages\Nest\ProjectsByCategory;
use Goldfinch\Component\Projects\Controllers\Nest\ProjectsController;

class Projects extends Nest
{
    use Millable;

    private static $table_name = 'Projects';

    private static $controller_name = ProjectsController::class;

    private static $allowed_children = [ProjectsByCategory::class];

    private static $icon_class = 'font-icon-block-accordion';

    private static $defaults = [
        'NestedObject' => ProjectItem::class,
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fielder = $this->intFielder($fields)->getFielder();

        // ..

        return $fields;
    }

    public function getSettingsFields()
    {
        $fields = parent::getSettingsFields();

        $fielder = $this->intFielder($fields)->getFielder();

        $fielder->disable(['NestedObject', 'NestedPseudo']);

        return $fields;
    }

    protected function onBeforeWrite()
    {
        parent::onBeforeWrite();

        $this->NestedObject = ProjectItem::class;
        $this->NestedPseudo = 0;
    }

    public function Categories()
    {
        return ProjectCategory::get();
    }
}
