<?php

namespace App\Package\Article;

class ArticleFacade
{
    /** @var ArticleDatabase */
    private ArticleDatabase $articleDatabase;

    /** @var ArticleMapper */
    private ArticleMapper $articleMapper;

    public function __construct(ArticleDatabase $articleDatabase, ArticleMapper $articleMapper)
    {
        $this->articleDatabase = $articleDatabase;
        $this->articleMapper = $articleMapper;
    }

    /**
     * @param  bool $loggingIn
     * @return array<Article>
     */
    public function getArticles(bool $loggingIn = true): array
    {
        $rows = $this->articleDatabase->getRows();

        if (!$loggingIn) {
            // jenom články pro nepřihlášené
            $rows->where(ArticleDatabase::COLUMN_REQUIRES_LOGGING_IN, false);
        }

        return $this->articleMapper->getArticles($rows->fetchAll());
    }
}
