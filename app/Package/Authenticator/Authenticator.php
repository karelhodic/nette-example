<?php

namespace App\Package\Authenticator;

use App\Package\User\UserDatabase;
use Nette\Security as NS;

class Authenticator implements NS\IAuthenticator
{
    /** @var UserDatabase */
    protected UserDatabase $userDatabase;

    /** @var NS\Passwords */
    protected NS\Passwords $passwords;

    public function __construct(UserDatabase $userDatabase, NS\Passwords $passwords)
    {

        $this->userDatabase = $userDatabase;
        $this->passwords = $passwords;
    }

    /**
     * @param  array<int, string> $credentials
     * @return NS\IIdentity
     * @throws NS\AuthenticationException
     */
    public function authenticate(array $credentials): NS\IIdentity
    {
        [$username, $password] = $credentials;

        $row = $this->userDatabase->getRows()
            ->where('email', $username)
            ->fetch();

        if (!$row) {
            throw new \Nette\Security\AuthenticationException('User not found.');
        }

        if (!is_string($row->password)) {
            throw new \Nette\Security\AuthenticationException('User password isn\'t string');
        }

        if (!$this->passwords->verify($password, $row->password)) {
            throw new \Nette\Security\AuthenticationException('Invalid password.');
        }

        return new NS\Identity($row->id, $row->email, ['username' => $row->first_name]);
    }
}
