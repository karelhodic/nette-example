<?php

namespace App\Package\ArticleRating;

class ArticleRatingFacade
{
    private ArticleRatingDatabase $articleRatingDatabase;

    /**
     * @param ArticleRatingDatabase $articleRatingDatabase
     */
    public function __construct(ArticleRatingDatabase $articleRatingDatabase)
    {
        $this->articleRatingDatabase = $articleRatingDatabase;
    }

    /**
     * @throws \App\Package\DatabaseException
     */
    public function like(int $articleId, int $userId): void
    {
        try {
            $this->articleRatingDatabase->save([
                ArticleRatingDatabase::COLUMN_USER_ID => $userId,
                ArticleRatingDatabase::COLUMN_ARTICLE_ID => $articleId,
                ArticleRatingDatabase::COLUMN_RATING => true,
            ]);
        // @phpstan-ignore-next-line
        } catch (\Nette\Database\UniqueConstraintViolationException $ex) {
            $this->articleRatingDatabase->getRows()
                ->where(ArticleRatingDatabase::COLUMN_USER_ID, $userId)
                ->where(ArticleRatingDatabase::COLUMN_ARTICLE_ID, $articleId)
                ->update([
                    ArticleRatingDatabase::COLUMN_RATING => true,
                ]);
        }
    }

    /**
     * @throws \App\Package\DatabaseException
     */
    public function dislike(int $articleId, int $userId): void
    {
        try {
            $this->articleRatingDatabase->save([
                ArticleRatingDatabase::COLUMN_USER_ID => $userId,
                ArticleRatingDatabase::COLUMN_ARTICLE_ID => $articleId,
                ArticleRatingDatabase::COLUMN_RATING => false,
            ]);
        // @phpstan-ignore-next-line
        } catch (\Nette\Database\UniqueConstraintViolationException $ex) {
            $this->articleRatingDatabase->getRows()
                ->where(ArticleRatingDatabase::COLUMN_USER_ID, $userId)
                ->where(ArticleRatingDatabase::COLUMN_ARTICLE_ID, $articleId)
                ->update([
                    ArticleRatingDatabase::COLUMN_RATING => false,
                ]);
        }
    }
}
