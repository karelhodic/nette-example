<?php

namespace App\Package\Article;

use App\Package\ArticleRating\ArticleRating;
use App\Package\ArticleRating\ArticleRatingDatabase;
use Nette\Database\Table\Selection;
use Nette\Utils\DateTime;

class ArticleMapper
{
    /**
     * @param  Selection $rows
     * @param  ?int      $userId
     * @return array<Article>
     * @throws \App\Package\DatabaseException
     */
    public function getArticles(Selection $rows, ?int $userId): array
    {
        $articles = [];

        $rows->select('*')
            ->select('( SELECT
                                    COUNT(*)
                                FROM
                                    `' . ArticleRatingDatabase::TABLE . '`
                                WHERE
                                    `' . ArticleRatingDatabase::COLUMN_RATING . '` = ?
                                AND
                                    `' . ArticleRatingDatabase::TABLE . '`.`' . ArticleRatingDatabase::COLUMN_ARTICLE_ID . '` = `' . ArticleDatabase::TABLE . '`.`' . ArticleDatabase::COLUMN_ID . '`
                                ) `' . ArticleDatabase::COLUMN_LIKE_COUNT . '`', true)
            ->select('( SELECT
                                    COUNT(*)
                                FROM
                                    `' . ArticleRatingDatabase::TABLE . '`
                                WHERE
                                    `' . ArticleRatingDatabase::COLUMN_RATING . '` = ?
                                AND
                                    `' . ArticleRatingDatabase::TABLE . '`.`' . ArticleRatingDatabase::COLUMN_ARTICLE_ID . '` = `' . ArticleDatabase::TABLE . '`.`' . ArticleDatabase::COLUMN_ID . '`
                                ) `' . ArticleDatabase::COLUMN_DISLIKE_COUNT . '`', false);

        if ($userId !== null) {
            $rows->select('( SELECT
                                    COUNT(*)
                                FROM
                                    `' . ArticleRatingDatabase::TABLE . '`
                                WHERE
                                    `' . ArticleRatingDatabase::COLUMN_RATING . '` = ?
                                AND
                                    `' . ArticleRatingDatabase::TABLE . '`.`' . ArticleRatingDatabase::COLUMN_ARTICLE_ID . '` = `' . ArticleDatabase::TABLE . '`.`' . ArticleDatabase::COLUMN_ID . '`
                                AND
                                    `' . ArticleRatingDatabase::TABLE . '`.`' . ArticleRatingDatabase::COLUMN_USER_ID . '` = ?          
                                ) like', true, $userId)
                ->select('( SELECT
                                    COUNT(*)
                                FROM
                                    `' . ArticleRatingDatabase::TABLE . '`
                                WHERE
                                    `' . ArticleRatingDatabase::COLUMN_RATING . '` = ?
                                AND
                                    `' . ArticleRatingDatabase::TABLE . '`.`' . ArticleRatingDatabase::COLUMN_ARTICLE_ID . '` = `' . ArticleDatabase::TABLE . '`.`' . ArticleDatabase::COLUMN_ID . '`
                                AND
                                    `' . ArticleRatingDatabase::TABLE . '`.`' . ArticleRatingDatabase::COLUMN_USER_ID . '` = ?          
                                ) dislike', false, $userId);
        } else {
            $rows->select('(SELECT 0) like')
                ->select('(SELECT 0 ) dislike');
        }

        foreach ($rows as $row) {
            if (!is_int($row[ArticleDatabase::COLUMN_ID])) {
                throw new \App\Package\DatabaseException(ArticleDatabase::COLUMN_ID . ' invalid type');
            }

            if (!is_string($row[ArticleDatabase::COLUMN_NAME])) {
                throw new \App\Package\DatabaseException(ArticleDatabase::COLUMN_NAME . ' invalid type');
            }

            if (!is_string($row[ArticleDatabase::COLUMN_PEREX])) {
                throw new \App\Package\DatabaseException(ArticleDatabase::COLUMN_PEREX . ' invalid type');
            }

            if (!($row[ArticleDatabase::COLUMN_CREATED] instanceof DateTime)) {
                throw new \App\Package\DatabaseException(ArticleDatabase::COLUMN_CREATED . ' invalid type');
            }

            if (!is_int($row[ArticleDatabase::COLUMN_REQUIRES_LOGGING_IN])) {
                throw new \App\Package\DatabaseException(ArticleDatabase::COLUMN_REQUIRES_LOGGING_IN . ' invalid type');
            }

            if (!is_int($row['likeCount'])) {
                throw new \App\Package\DatabaseException('likeCount invalid type');
            }

            if (!is_int($row['dislikeCount'])) {
                throw new \App\Package\DatabaseException('dislikeCount invalid type');
            }

            if (!is_int($row['like'])) {
                throw new \App\Package\DatabaseException('like invalid type');
            }

            if (!is_int($row['dislike'])) {
                throw new \App\Package\DatabaseException('dislike invalid type');
            }

            $articles[] = new Article(
                $row[ArticleDatabase::COLUMN_ID],
                $row[ArticleDatabase::COLUMN_NAME],
                $row[ArticleDatabase::COLUMN_PEREX],
                $row[ArticleDatabase::COLUMN_CREATED],
                (bool)$row[ArticleDatabase::COLUMN_REQUIRES_LOGGING_IN],
                new ArticleRating(
                    $row['likeCount'],
                    $row['dislikeCount'],
                    (bool)$row['like'],
                    (bool)$row['dislike'],
                ),
            );
        }

        return $articles;
    }
}
