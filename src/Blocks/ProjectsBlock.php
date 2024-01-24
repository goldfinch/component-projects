<?php

namespace Goldfinch\Component\Projects\Blocks;

use Goldfinch\Fielder\Fielder;
use Goldfinch\Fielder\Traits\FielderTrait;
use DNADesign\Elemental\Models\BaseElement;
use Goldfinch\Component\Projects\Models\Nest\ProjectItem;
use Goldfinch\Component\Projects\Models\Nest\ProjectCategory;

class ProjectsBlock extends BaseElement
{
    use FielderTrait;

    private static $table_name = 'ProjectsBlock';
    private static $singular_name = 'Projects';
    private static $plural_name = 'Projects';

    private static $db = [];

    private static $inline_editable = false;
    private static $description = '';
    private static $icon = 'font-icon-block-accordion';

    public function fielder(Fielder $fielder): void
    {
        // ..
    }

    public function Items()
    {
        return ProjectItem::get();
    }

    public function Categories()
    {
        return ProjectCategory::get();
    }

    public function getSummary()
    {
        return $this->getDescription();
    }

    public function getType()
    {
        $default = $this->i18n_singular_name() ?: 'Block';

        return _t(__CLASS__ . '.BlockType', $default);
    }
}
