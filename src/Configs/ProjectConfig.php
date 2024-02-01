<?php

namespace Goldfinch\Component\Projects\Configs;

use Goldfinch\Fielder\Fielder;
use JonoM\SomeConfig\SomeConfig;
use SilverStripe\ORM\DataObject;
use Goldfinch\Fielder\Traits\FielderTrait;
use SilverStripe\View\TemplateGlobalProvider;

class ProjectConfig extends DataObject implements TemplateGlobalProvider
{
    use SomeConfig, FielderTrait;

    private static $table_name = 'ProjectConfig';

    private static $db = [
        'ItemsPerPage' => 'Int(10)',
        'DisabledCategories' => 'Boolean',
    ];

    public function fielder(Fielder $fielder): void
    {
        $fielder->fields([
            'Root.Main' => [
                $fielder->string('ItemsPerPage', 'Items per page')->setDescription('used in paginated/loadable list'),
                $fielder->checkbox('DisabledCategories', 'Disabled categories'),
            ],
        ]);

        $fielder->validate(['ItemsPerPage' => function($value, $fail) {
            if (!$this->ID && $value == null) {
                // Skip this validation on config creation as it can be created without user interaction. A default value assigned through db for `ItemsPerPage` will cover it here
            } else {
                $value = (int) $value;
                $min = 1;
                $max = 100;
                if (!$value || $value < $min || $value > $max) {
                    $fail('The :attribute must be between '.$min.' and '.$max.'.');
                }
            }
        }]);
    }
}
