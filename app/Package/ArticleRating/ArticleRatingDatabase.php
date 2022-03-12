<?php

namespace App\Package\ArticleRating;

use App\Package\Database;

class ArticleRatingDatabase extends Database
{
    public const TABLE = 'article_rating';

    /** @var ?string Jméno tabulky */
    protected ?string $nameTable = self::TABLE;

    public const COLUMN_ID = 'id';
    public const COLUMN_USER_ID = 'user_id';
    public const COLUMN_ARTICLE_ID = 'article_id';
    public const COLUMN_RATING = 'rating';
}
