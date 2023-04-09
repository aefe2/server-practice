<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class FileSizeValidator extends AbstractValidator
{

    protected string $message = 'Файл слишком большой';

    public function rule(): bool
    {
        return (bool)!($this->value['size'] > 20971520);
    }
}