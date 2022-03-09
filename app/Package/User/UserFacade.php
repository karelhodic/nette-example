<?php

namespace App\Package\User;

use App\Package\DatabaseException;
use Nette\SmartObject;

class UserFacade
{
    use SmartObject;

    private UserDatabase $userDatabase;

    private UserMapper $userMapper;

    public function __construct(UserDatabase $userDatabase, UserMapper $userMapper)
    {
        $this->userDatabase = $userDatabase;
        $this->userMapper = $userMapper;
    }

    /**
     * @throws DatabaseException
     */
    public function createUser(User $user): void
    {
        $this->userDatabase->save($this->userMapper->toArray($user));
    }

    /**
     * @throws DatabaseException
     */
    public function getUser(int $id): User
    {
        return $this->userMapper->create($this->userDatabase->getRow($id));
    }
}
