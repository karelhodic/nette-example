<?php

namespace App\component\Article;

use App\Package\Article\ArticleFacade;
use Nette\Application\UI\Control;

class Article extends Control
{
    private ArticleFacade $articleFacade;

    public function __construct(ArticleFacade $articleFacade)
    {
        $this->articleFacade = $articleFacade;
    }

    public function render(): void
    {
        $this->getTemplate()->articles = $this->articleFacade->getArticles();
        $this->getTemplate()->setFile(__DIR__ . '/Article.latte');
        $this->getTemplate()->render();
    }
}
