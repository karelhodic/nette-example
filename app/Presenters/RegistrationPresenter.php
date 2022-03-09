<?php

namespace App\Presenters;

use App\component\RegistrationForm\IRegistrationFormFactory;
use App\component\RegistrationForm\RegistrationForm;

class RegistrationPresenter extends BasePresenter
{
    /** @var IRegistrationFormFactory @inject */
    public IRegistrationFormFactory $registrationFormFactory;

    public function createComponentRegistrationForm(): RegistrationForm
    {
        return $this->registrationFormFactory->create();
    }
}
