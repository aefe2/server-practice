<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class CyrillicValidator extends AbstractValidator
{
    protected string $message = 'Поле должно содержать только кириллицу';

    public function rule(): bool
    {
        return preg_match('/[а-яёА-ЯЁ]+/u', $this->value);
    }
}