<?php

namespace Goldfinch\Component\Projects\Mills;

use Goldfinch\Mill\Mill;

class ProjectsMill extends Mill
{
    public function factory(): array
    {
        return [
            'Title' => $this->faker->sentence(3),
            'Content' => $this->faker->paragraph(20),
        ];
    }
}