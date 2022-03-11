<?php

namespace App\component\UserForm;

use App\Package\User\UserFacade;
use Nette\Application\AbortException;
use Nette\Application\UI\Control;
use Nette\Application\UI\Form;
use Nette\Security as NS;

class UserForm extends Control
{
    /** @var NS\User */
    private NS\User $user;

    /** @var UserFacade */
    private UserFacade $userFacade;

    /** @var NS\Passwords */
    private NS\Passwords $passwords;

    public function __construct(NS\User $user, UserFacade $userFacade, NS\Passwords $passwords)
    {
        $this->user = $user;
        $this->userFacade = $userFacade;
        $this->passwords = $passwords;
    }

    public function render(): void
    {
        $this->getTemplate()->setFile(__DIR__ . '/UserForm.latte');
        $this->getTemplate()->render();
    }

    protected function createComponentForm(): Form
    {
        $form = new Form();

        $form->addPassword('passwordOld', 'Staré heslo')
            ->setRequired();

        $form->addPassword('passwordNew', 'Nové heslo')
            ->addRule($form::MIN_LENGTH, 'Heslo musí mít alespoň %d znaků', 8)
            ->addRule($form::PATTERN, 'Musí obsahovat číslici', '.*[0-9].*')
            ->setRequired();

        $form->addPassword('passwordNew2', 'Nové heslo znovu')
            ->addRule($form::MIN_LENGTH, 'Heslo musí mít alespoň %d znaků', 8)
            ->addRule($form::PATTERN, 'Musí obsahovat číslici', '.*[0-9].*')
            ->setRequired();

        $form->addSubmit('change', 'Změnit heslo');

        // @phpstan-ignore-next-line
        $form->onSuccess[] = [$this, 'formSucceeded'];

        return $form;
    }

    /**
     * @param  Form         $form
     * @param  UserFormData $data
     * @throws AbortException
     */
    public function formSucceeded(Form $form, UserFormData $data): void
    {
        try {

            /** @var int | null $userId */
            $userId = $this->user->getId();

            if ($userId === null) {
                $this->getPresenter()->flashMessage('Pro změnu hesla se musíte přihlásit');
                $this->getPresenter()->redirect('Sign:in');
            }

            $user = $this->userFacade->getUser($userId);

            // ověření starého hesla
            if (!$this->passwords->verify($data->passwordOld, $user->getPassword())) {
                $this->getPresenter()->flashMessage('Staré heslo je chybné!');
                $this->getPresenter()->redirect('this');
            }

            // ověření nového hesla
            if ($data->passwordNew !== $data->passwordNew2) {
                $this->getPresenter()->flashMessage('Hesla nejsou stejná');
                $this->getPresenter()->redirect('this');
            }

            $this->getPresenter()->flashMessage('Heslo změněno');
            $this->getPresenter()->redirect('Homepage:');
        } catch (\App\Package\DatabaseException $ex) {
            $this->getPresenter()->flashMessage('Změna hesla se nezdařila');
            $this->getPresenter()->redirect('this');
        }
    }
}
