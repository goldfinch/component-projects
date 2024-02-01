<?php

namespace Goldfinch\Component\Projects\Controllers\Nest;

use Goldfinch\Nest\Controllers\NestController;
use Goldfinch\Component\Projects\Configs\ProjectConfig;

class ProjectsController extends NestController
{
    public function NestedList()
    {
        if ($this->NestedObject) {
            $cfg = $this->NestedObject::config();
            $cfgDB = ProjectConfig::current_config();
            if ($cfgDB->ItemsPerPage) {
                $cfg->set('nestedListPageLength', $cfgDB->ItemsPerPage);
            }
        }

        return parent::NestedList();
    }
}
