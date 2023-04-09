<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class FileTypeValidator extends AbstractValidator
{

    protected string $message = 'Не подходящий формат';

    public function rule(): bool
    {
        return (bool)(in_array($this->value['type'], ['image/jpeg', 'image/png', 'image/jpg']));
    }
}