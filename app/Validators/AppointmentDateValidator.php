<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class AppointmentDateValidator extends AbstractValidator
{

    protected string $message = 'Поле :field не допускается прошедшее время';

    public function rule(): bool
    {
        return (bool)!($this->value < date('Y-m-d'));
    }
}