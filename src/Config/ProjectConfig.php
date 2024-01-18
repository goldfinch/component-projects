<?php

namespace Goldfinch\Component\Projects\Configs;

use Goldfinch\Harvest\Harvest;
use JonoM\SomeConfig\SomeConfig;
use SilverStripe\ORM\DataObject;
use Goldfinch\Harvest\Traits\HarvestTrait;
use SilverStripe\View\TemplateGlobalProvider;

class ProjectConfig extends DataObject implements TemplateGlobalProvider
{
    use SomeConfig, HarvestTrait;

    private static $table_name = 'ProjectConfig';

    private static $db = [];

    public function harvest(Harvest $harvest): void
    {
        // ..
    }
}
