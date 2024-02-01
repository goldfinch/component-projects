<?php

namespace Goldfinch\Component\Projects\Mills;

use Goldfinch\Mill\Mill;

class ProjectCategoryMill extends Mill
{
    public function factory(): array
    {
        return [
            'Title' => $this->faker->catchPhrase(),
        ];
    }
}
