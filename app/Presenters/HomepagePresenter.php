<?php

declare(strict_types=1);

namespace App\Presenters;

use App\component\Article\Article;
use App\component\Article\IArticleFactory;

final class HomepagePresenter extends BasePresenter
{
    /** @var IArticleFactory @inject */
    public IArticleFactory $articleFactory;

    public function createComponentArticle(): Article
    {
        return $this->articleFactory->create();
    }

    public function renderArticleNew(): void
    {
        /** @var Article $article */
        $article = $this['article'];
        $article->articleNew();
        $this->setView('default');
    }

    public function renderArticleOld(): void
    {
        /** @var Article $article */
        $article = $this['article'];
        $article->articleOld();
        $this->setView('default');
    }

    public function renderRating(): void
    {
        /** @var Article $article */
        $article = $this['article'];
        $article->rating();
        $this->setView('default');
    }

    public function renderAlphabetical(): void
    {
        /** @var Article $article */
        $article = $this['article'];
        $article->alphabetical();
        $this->setView('default');
    }
}
