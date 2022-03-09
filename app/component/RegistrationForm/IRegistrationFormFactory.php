<?php

namespace App\component\RegistrationForm;

interface IRegistrationFormFactory
{
    public function create(): RegistrationForm;
}
