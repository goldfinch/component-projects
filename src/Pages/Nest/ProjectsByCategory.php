<?php

namespace Goldfinch\Component\Projects\Pages\Nest;

use Goldfinch\Fielder\Fielder;
use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Fielder\Traits\FielderTrait;
use Goldfinch\Component\Projects\Models\Nest\ProjectCategory;
use Goldfinch\Component\Projects\Controllers\Nest\ProjectsByCategoryController;

class ProjectsByCategory extends Nest
{
    use FielderTrait;

    private static $table_name = 'ProjectsByCategory';

    private static $controller_name = ProjectsByCategoryController::class;

    private static $allowed_children = [];

    private static $icon_class = 'font-icon-block-accordion';

    private static $can_be_root = false;

    private static $description = 'Nested pseudo page, to display individual categories. Can only be added within Projects page as a child page';

    public function fielder(Fielder $fielder): void
    {
        $fielder->remove([
            'Content',
            'MenuTitle',
        ]);

        $fielder->description('Title', 'Does not show up anywhere except SiteTree in the CMS');
    }

    public function fielderSettings(Fielder $fielder): void
    {
        $fielder->removeFieldsInTab('Root.Search');
        $fielder->removeFieldsInTab('Root.General');
        $fielder->removeFieldsInTab('Root.SEO');

        $fielder->disable(['NestedObject', 'NestedPseudo']);
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
