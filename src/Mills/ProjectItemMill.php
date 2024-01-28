<?php

namespace Goldfinch\Component\Projects\Mills;

use Goldfinch\Mill\Mill;

class ProjectItemMill extends Mill
{
    public function factory(): array
    {
        return [
            'Title' => $this->faker->sentence(5),
            'Content' => $this->faker->paragraph(10),
        ];
    }
}
