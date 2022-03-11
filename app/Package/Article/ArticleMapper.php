<?php

namespace App\Package\Article;

use App\Package\ArticleRating\ArticleRating;
use App\Package\ArticleRating\ArticleRatingDatabase;
use Nette\Database\Table\Selection;

class ArticleMapper
{
    /**
     * @param  Selection $rows
     * @param ?int $userId
     * @return array<Article>
     */
    public function getArticles(Selection $rows, ?int $userId): array
    {
        $articles = [];

        $rows->select('*')
            ->select("( SELECT
                                    COUNT(*)
                                FROM
                                    `" . ArticleRatingDatabase::TABLE . "`
                                WHERE
                                    `" . ArticleRatingDatabase::COLUMN_RATING . "` = ?
                                AND
                                    `" . ArticleRatingDatabase::TABLE . "`.`". ArticleRatingDatabase::COLUMN_ARTICLE_ID . "` = `" . ArticleDatabase::TABLE . "`.`" . ArticleDatabase::COLUMN_ID. "`
                                ) likeCount", true)
            ->select("( SELECT
                                    COUNT(*)
                                FROM
                                    `" . ArticleRatingDatabase::TABLE . "`
                                WHERE
                                    `" . ArticleRatingDatabase::COLUMN_RATING . "` = ?
                                AND
                                    `" . ArticleRatingDatabase::TABLE . "`.`". ArticleRatingDatabase::COLUMN_ARTICLE_ID . "` = `" . ArticleDatabase::TABLE . "`.`" . ArticleDatabase::COLUMN_ID. "`
                                ) dislikeCount", false);

        if ($userId !== null) {
            $rows->select("( SELECT
                                    COUNT(*)
                                FROM
                                    `" . ArticleRatingDatabase::TABLE . "`
                                WHERE
                                    `" . ArticleRatingDatabase::COLUMN_RATING . "` = ?
                                AND
                                    `" . ArticleRatingDatabase::TABLE . "`.`". ArticleRatingDatabase::COLUMN_ARTICLE_ID . "` = `" . ArticleDatabase::TABLE . "`.`" . ArticleDatabase::COLUMN_ID. "`
                                AND
                                    `" . ArticleRatingDatabase::TABLE . "`.`" . ArticleRatingDatabase::COLUMN_USER_ID . "` = ?          
                                ) like", true, $userId)
                ->select("( SELECT
                                    COUNT(*)
                                FROM
                                    `" . ArticleRatingDatabase::TABLE . "`
                                WHERE
                                    `" . ArticleRatingDatabase::COLUMN_RATING . "` = ?
                                AND
                                    `" . ArticleRatingDatabase::TABLE . "`.`". ArticleRatingDatabase::COLUMN_ARTICLE_ID . "` = `" . ArticleDatabase::TABLE . "`.`" . ArticleDatabase::COLUMN_ID. "`
                                AND
                                    `" . ArticleRatingDatabase::TABLE . "`.`" . ArticleRatingDatabase::COLUMN_USER_ID . "` = ?          
                                ) dislike", false, $userId);
        }

        foreach ($rows as $row) {
            $articles[] = new Article(
                $row[ArticleDatabase::COLUMN_ID],
                $row[ArticleDatabase::COLUMN_NAME],
                $row[ArticleDatabase::COLUMN_PEREX],
                $row[ArticleDatabase::COLUMN_CREATED],
                $row[ArticleDatabase::COLUMN_REQUIRES_LOGGING_IN],
                new ArticleRating(
                    $row['likeCount'],
                    $row['dislikeCount'],
                    $row['like'],
                    $row['dislike']
                )
            );
        }

        return $articles;
    }
}
