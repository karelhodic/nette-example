<?php

namespace App\component\RegistrationForm;

use App\Package\User\UserFacade;
use App\Package\User\UserMapper;
use Nette\Application\AbortException;
use Nette\Application\UI\Control;
use Nette\Application\UI\Form;

class RegistrationForm extends Control
{
    private UserFacade $userFacade;

    private UserMapper $userMapper;

    public function __construct(UserFacade $userFacade, UserMapper $userMapper)
    {
        $this->userFacade = $userFacade;
        $this->userMapper = $userMapper;
    }

    public function render(): void
    {
        $this->getTemplate()->setFile(__DIR__ . '/RegistrationForm.latte');
        $this->getTemplate()->render();
    }

    protected function createComponentForm(): Form
    {
        $form = new Form();

        $form->addText('firstName', 'Jméno')
            ->setRequired();

        $form->addText('lastName', 'Příjmení')
            ->setRequired();

        $form->addEmail('email', 'email')
            ->setRequired();

        $form->addPassword('password', 'Password')
            ->addRule($form::MIN_LENGTH, 'Heslo musí mít alespoň %d znaků', 8)
            ->addRule($form::PATTERN, 'Musí obsahovat číslici', '.*[0-9].*')
            ->setRequired();

        $form->addSubmit('create', 'Vytvořit');

        // @phpstan-ignore-next-line
        $form->onSuccess[] = [$this, 'formSucceeded'];

        return $form;
    }

    /**
     * @throws AbortException
     */
    public function formSucceeded(Form $form, RegistrationFormData $data): void
    {
        try {
            $this->userFacade->createUser($this->userMapper->userFromForm($data));
        } catch (\Nette\Database\UniqueConstraintViolationException $ex) {
            $this->getPresenter()->flashMessage('Zvolte jiný email!');

            return;
        } catch (\App\Package\DatabaseException $ex) {
            $this->getPresenter()->flashMessage('Něco se pokazilo');
            $this->getPresenter()->redirect('default');
        }

        $this->getPresenter()->flashMessage('Účet založen');
        $this->getPresenter()->redirect('homepage:default');
    }
}
