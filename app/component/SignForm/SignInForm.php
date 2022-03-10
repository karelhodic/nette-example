<?php

namespace App\component\SignForm;

use Nette\Application\AbortException;
use Nette\Application\UI\Control;
use Nette\Application\UI\Form;
use Nette\Security\User;

class SignInForm extends Control
{
    /** @var User */
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function render(): void
    {
        $this->getTemplate()->setFile(__DIR__ . '/SignInForm.latte');
        $this->getTemplate()->render();
    }

    protected function createComponentForm(): Form
    {
        $form = new Form();

        $form->addEmail('email', 'email')
            ->setRequired();

        $form->addPassword('password', 'Password')
            ->setRequired();

        $form->addSubmit('login', 'Přihlásit');

        // @phpstan-ignore-next-line
        $form->onSuccess[] = [$this, 'formSucceeded'];

        return $form;
    }

    /**
     * @param  Form           $form
     * @param  SignInFormData $data
     * @throws AbortException
     */
    public function formSucceeded(Form $form, SignInFormData $data): void
    {
        try {
            $this->user->login($data->email, $data->password);
            $this->getPresenter()->redirect('Homepage:');
        } catch (\Nette\Security\AuthenticationException $ex) {
            $this->getPresenter()->flashMessage('Přihlášení se nezdařilo');
            $this->getPresenter()->redirect('Sign:in');
        }
    }
}
