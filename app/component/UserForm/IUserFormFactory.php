<?php

namespace App\component\UserForm;

interface IUserFormFactory
{
    public function create(): UserForm;
}
