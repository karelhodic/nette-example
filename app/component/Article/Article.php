<?php

namespace App\component\Article;

use App\Package\Article\ArticleDatabase;
use App\Package\Article\ArticleUserFacade;
use App\Package\ArticleRating\ArticleRatingUserFacade;
use IPub\VisualPaginator\Components as VisualPaginator;
use Nette\Application\UI\Control;

class Article extends Control
{
    /** @const počet článků na stranu */
    public const ITEMS_PER_PAGE = 5;

    private ArticleUserFacade $articleUserFacade;

    private ArticleRatingUserFacade $articleRatingUserFacade;

    private array $order = [];

    private ArticleOrderData $articleOrderData;

    public function __construct(ArticleUserFacade $articleUserFacade, ArticleRatingUserFacade $articleRatingUserFacade)
    {
        $this->articleUserFacade = $articleUserFacade;
        $this->articleRatingUserFacade = $articleRatingUserFacade;
        $this->articleOrderData = new ArticleOrderData();
    }

    public function render(): void
    {
        /** @var VisualPaginator\Control $visualPaginator */
        $visualPaginator = $this['visualPaginator'];
        $paginator = $visualPaginator->getPaginator();

        $this->getTemplate()->articles = $this->articleUserFacade->getArticles(
            $paginator->getItemsPerPage(),
            $paginator->getOffset(),
            $this->order,
        );

        $this->getTemplate()->order = $this->articleOrderData;

        $this->getTemplate()->setFile(__DIR__ . '/Article.latte');
        $this->getTemplate()->render();
    }

    protected function createComponentVisualPaginator(): VisualPaginator\Control
    {
        $control = new VisualPaginator\Control();

        // budeme stránkovat bez ajaxu
        $control->disableAjax();

        $paginator = $control->getPaginator();
        $paginator->itemsPerPage = self::ITEMS_PER_PAGE;
        $paginator->itemCount = $this->articleUserFacade->countArticles();
        $control->setTemplateFile(__DIR__ . '/../../Presenters/templates/paginator.latte');

        return $control;
    }

    /**
     * @throws \Nette\Security\AuthenticationException
     */
    public function handleLike(int $articleId): void
    {
        if (!$this->getPresenter()->isAjax()) {
            return;
        }

        $this->articleRatingUserFacade->like($articleId);
        $this->redrawControl();
    }

    /**
     * @throws \Nette\Security\AuthenticationException
     */
    public function handleDislike(int $articleId): void
    {
        if (!$this->getPresenter()->isAjax()) {
            return;
        }

        $this->articleRatingUserFacade->dislike($articleId);
        $this->redrawControl();
    }

    public function articleNew(): void
    {
        $this->articleOrderData->setNew(true);
        $this->order[ArticleDatabase::COLUMN_CREATED] = 'DESC';
    }

    public function articleOld(): void
    {
        $this->articleOrderData->setOld(true);
        $this->order[ArticleDatabase::COLUMN_CREATED] = 'ASC';
    }

    public function rating(): void
    {
        $this->articleOrderData->setRating(true);
        $this->order[ArticleDatabase::COLUMN_LIKE_COUNT] = 'DESC';
    }

    public function alphabetical(): void
    {
        $this->articleOrderData->setAlphabetical(true);
        $this->order[ArticleDatabase::COLUMN_NAME] = 'ASC';
    }
}
