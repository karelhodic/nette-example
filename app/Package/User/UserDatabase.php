<?php

namespace App\Package\User;

use App\Package\Database;

class UserDatabase extends Database
{
    public const TABLE = 'user';
    public const COLUMN_ID = 'id';
    public const COLUMN_FIRST_NAME = 'first_name';
    public const COLUMN_LAST_NAME = 'last_name';
    public const COLUMN_EMAIL = 'email';
    public const COLUMN_PASSWORD = 'password';
    public const COLUMN_CREATED = 'created';

    /** @var ?string Jméno tabulky */
    protected ?string $nameTable = self::TABLE;
}
