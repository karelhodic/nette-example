<?php

namespace App\Package\User;

use App\component\RegistrationForm\RegistrationFormData;
use App\Package\DatabaseException;
use Nette\Database\Table\ActiveRow;
use Nette\Security\Passwords;
use Nette\SmartObject;
use Nette\Utils\DateTime;

class UserMapper
{
    use SmartObject;

    private Passwords $password;

    public function __construct(Passwords $password)
    {
        $this->password = $password;
    }

    /**
     * @throws DatabaseException
     */
    public function create(ActiveRow $row): User
    {

        if (!is_int($row[UserDatabase::COLUMN_ID])) {
            throw new \App\Package\DatabaseException(UserDatabase::COLUMN_ID . ' invalid type');
        }

        if (!is_string($row[UserDatabase::COLUMN_FIRST_NAME])) {
            throw new \App\Package\DatabaseException(UserDatabase::COLUMN_FIRST_NAME . ' invalid type');
        }

        if (!is_string($row[UserDatabase::COLUMN_LAST_NAME])) {
            throw new \App\Package\DatabaseException(UserDatabase::COLUMN_LAST_NAME . ' invalid type');
        }

        if (!is_string($row[UserDatabase::COLUMN_EMAIL])) {
            throw new \App\Package\DatabaseException(UserDatabase::COLUMN_EMAIL . ' invalid type');
        }

        if (!is_string($row[UserDatabase::COLUMN_PASSWORD])) {
            throw new \App\Package\DatabaseException(UserDatabase::COLUMN_PASSWORD . ' invalid type');
        }

        if (!($row[UserDatabase::COLUMN_CREATED] instanceof DateTime)) {
            throw new \App\Package\DatabaseException(UserDatabase::COLUMN_CREATED . ' invalid type');
        }

        return new User(
            $row[UserDatabase::COLUMN_ID],
            $row[UserDatabase::COLUMN_FIRST_NAME],
            $row[UserDatabase::COLUMN_LAST_NAME],
            $row[UserDatabase::COLUMN_EMAIL],
            $row[UserDatabase::COLUMN_PASSWORD],
            $row[UserDatabase::COLUMN_CREATED],
        );
    }

    public function userFromForm(RegistrationFormData $formData): User
    {
        return new User(
            null,
            $formData->firstName,
            $formData->lastName,
            $formData->email,
            $this->password->hash($formData->password),
            new DateTime(),
        );
    }

    public function toArray(User $user): array
    {
        return [
            UserDatabase::COLUMN_ID => $user->getId(),
            UserDatabase::COLUMN_FIRST_NAME => $user->getFirstName(),
            UserDatabase::COLUMN_LAST_NAME => $user->getLastName(),
            UserDatabase::COLUMN_EMAIL => $user->getEmail(),
            UserDatabase::COLUMN_PASSWORD => $user->getPassword(),
            UserDatabase::COLUMN_CREATED => $user->getCreated(),
        ];
    }
}
