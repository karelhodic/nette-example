<?php

namespace App\component\SignForm;

interface ISignInFormFactory
{
    public function create(): SignInForm;
}
