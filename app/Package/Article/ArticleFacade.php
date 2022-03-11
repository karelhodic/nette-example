<?php

namespace App\Package\Article;

use Nette\Database\Table\Selection;

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
     * @param  int  $limit
     * @param  int  $offset
     * @return array<Article>
     */
    public function getArticles(bool $loggingIn, int $limit, int $offset): array
    {
        $rows = $this->getRowsRequiresLoggingIn($loggingIn);

        // @phpstan-ignore-next-line
        $rows->limit($limit, $offset);

        return $this->articleMapper->getArticles($rows->fetchAll());
    }

    /**
     * @param  bool $loggingIn
     * @return int
     */
    public function countArticles(bool $loggingIn = true): int
    {
        return $this->getRowsRequiresLoggingIn($loggingIn)
            ->count('*');
    }

    /**
     * @param  bool $loggingIn
     * @return Selection
     */
    protected function getRowsRequiresLoggingIn(bool $loggingIn): Selection
    {
        $rows = $this->articleDatabase->getRows();

        if (!$loggingIn) {
            // jenom články pro nepřihlášené
            $rows->where(ArticleDatabase::COLUMN_REQUIRES_LOGGING_IN, false);
        }

        return $rows;
    }
}
