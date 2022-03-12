<?php

namespace App\Package\Article;

use App\Package\Database;

class ArticleDatabase extends Database
{
    public const TABLE = 'article';

    /** @var ?string Jméno tabulky */
    protected ?string $nameTable = self::TABLE;

    public const COLUMN_ID = 'id';
    public const COLUMN_NAME = 'name';
    public const COLUMN_PEREX = 'perex';
    public const COLUMN_CREATED = 'created';
    public const COLUMN_REQUIRES_LOGGING_IN = 'requires_logging_in';
    public const COLUMN_LIKE_COUNT = 'likeCount';
    public const COLUMN_DISLIKE_COUNT = 'dislikeCount';
}
