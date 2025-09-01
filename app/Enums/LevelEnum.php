<?php

namespace App\Enums;

use Filament\Support\Colors\Color;

enum LevelEnum: string
{
    case BEGINNER = 'beginner';
    case INTERMEDIATE = 'intermediate';
    case ADVANCED = 'advanced';

    public function getLabel(): ?string
    {
        return __("resources.course.options.difficulty_level." . $this->value);
    }
}