<?php

namespace App\Enums;

enum RoleEnum: string
{
    case STUDENT = 'student';
    case TEACHER = 'teacher';
    case ADMIN = 'admin';

    public function getLabel(): ?string
    {
        return __("resources.users.options.roles." . $this->value);
    }

}