<?php

namespace App\Presenters;

use App\component\SignForm\ISignInFormFactory;
use App\component\SignForm\SignInForm;

class SignPresenter extends BasePresenter
{
    /** @var ISignInFormFactory @inject */
    public ISignInFormFactory $signFormFactory;

    /**
     * @throws \Nette\Application\AbortException
     */
    public function actionOut(): void
    {
        $this->getUser()->logout();
        $this->redirect('Homepage:');
    }

    public function createComponentSignInForm(): SignInForm
    {
        return $this->signFormFactory->create();
    }
}
