<?php

namespace Goldfinch\Component\Projects\Blocks;

use DNADesign\Elemental\Models\BaseElement;
use Goldfinch\Component\Projects\Models\Nest\ProjectItem;
use Goldfinch\Component\Projects\Models\Nest\ProjectCategory;

class ProjectsBlock extends BaseElement
{
    private static $table_name = 'ProjectsBlock';
    private static $singular_name = 'Projects';
    private static $plural_name = 'Projects';

    private static $db = [];

    private static $inline_editable = false;
    private static $description = 'Projects block handler';
    private static $icon = 'font-icon-block-accordion';

    public function Items()
    {
        return ProjectItem::get();
    }

    public function Categories()
    {
        return ProjectCategory::get();
    }
}
