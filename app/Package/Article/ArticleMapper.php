<?php

namespace App\Package\Article;

class ArticleMapper
{
    /**
     * @param  array $rows
     * @return array<Article>
     */
    public function getArticles(array $rows): array
    {
        $articles = [];

        foreach ($rows as $row) {
            $articles[] = new Article(
                $row[ArticleDatabase::COLUMN_ID],
                $row[ArticleDatabase::COLUMN_NAME],
                $row[ArticleDatabase::COLUMN_PEREX],
                $row[ArticleDatabase::COLUMN_CREATED],
                $row[ArticleDatabase::COLUMN_REQUIRES_LOGGING_IN],
            );
        }

        return $articles;
    }
}
