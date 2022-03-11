<?php

namespace App\Presenters;

use App\component\UserForm\IUserFormFactory;
use App\component\UserForm\UserForm;

class UserPresenter extends BasePresenter
{
    /** @var IUserFormFactory @inject */
    public IUserFormFactory $userFormFactory;

    public function createComponentUserForm(): UserForm
    {
        return $this->userFormFactory->create();
    }
}
