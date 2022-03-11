<?php

namespace App\component\Article;

use App\Package\Article\ArticleUserFacade;
use IPub\VisualPaginator\Components as VisualPaginator;
use Nette\Application\UI\Control;

class Article extends Control
{
    /** @const počet článků na stranu */
    public const ITEMS_PER_PAGE = 5;

    private ArticleUserFacade $articleUserFacade;

    public function __construct(ArticleUserFacade $articleUserFacade)
    {
        $this->articleUserFacade = $articleUserFacade;
    }

    public function render(): void
    {
        /** @var VisualPaginator\Control $visualPaginator */
        $visualPaginator = $this['visualPaginator'];
        $paginator = $visualPaginator->getPaginator();

        $this->getTemplate()->articles = $this->articleUserFacade->getArticles(
            $paginator->getItemsPerPage(),
            $paginator->getOffset(),
        );

        $this->getTemplate()->setFile(__DIR__ . '/Article.latte');
        $this->getTemplate()->render();
    }

    protected function createComponentVisualPaginator(): VisualPaginator\Control
    {
        $control = new VisualPaginator\Control();

        // budeme stránkovat bez apaxu
        $control->disableAjax();

        $paginator = $control->getPaginator();
        $paginator->itemsPerPage = self::ITEMS_PER_PAGE;
        $paginator->itemCount = $this->articleUserFacade->countArticles();
        $control->setTemplateFile(__DIR__ . '/../../Presenters/templates/paginator.latte');

        return $control;
    }
}
