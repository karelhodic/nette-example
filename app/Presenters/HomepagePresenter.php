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
}
