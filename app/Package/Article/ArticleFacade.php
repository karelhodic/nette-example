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
     * @return array<Article>
     */
    public function getArticles(): array
    {
        return $this->articleMapper->getArticles($this->articleDatabase->getRows()->fetchAll());
    }
}
