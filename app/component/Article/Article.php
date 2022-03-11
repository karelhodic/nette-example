<?php

namespace App\component\Article;

use App\Package\Article\ArticleUserFacade;
use Nette\Application\UI\Control;

class Article extends Control
{
    private ArticleUserFacade $articleUserFacade;

    public function __construct(ArticleUserFacade $articleUserFacade)
    {
        $this->articleUserFacade = $articleUserFacade;
    }

    public function render(): void
    {
        $this->getTemplate()->articles = $this->articleUserFacade->getArticles();
        $this->getTemplate()->setFile(__DIR__ . '/Article.latte');
        $this->getTemplate()->render();
    }
}
