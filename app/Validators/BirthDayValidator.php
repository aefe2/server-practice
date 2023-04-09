<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class BirthDayValidator extends AbstractValidator
{

    protected string $message = 'Поле :field не может существовать';

    public function rule(): bool
    {
        return (bool)!($this->value > date('Y-m-d'));
    }
}