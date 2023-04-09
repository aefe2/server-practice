<?php
//
//namespace Validators;
//
//use Src\Validator\AbstractValidator;
//
//class AppointmentTimeValidator extends AbstractValidator
//{
//
//    protected string $message = 'Поле :field нельзя записать на прошедшее время';
//
//    public function rule(): bool
//    {
//        return (bool)!($this->value < date('H:i:s'));
//    }
//}