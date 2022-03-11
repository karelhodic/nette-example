<?php

namespace App\Package\Article;

use Nette\Security\User;

class ArticleUserFacade
{
    /** @var ArticleFacade */
    private ArticleFacade $articleFacade;

    /** @var User */
    private User $user;

    public function __construct(ArticleFacade $articleFacade, User $user)
    {
        $this->articleFacade = $articleFacade;
        $this->user = $user;
    }

    /**
     * @return array<Article>
     */
    public function getArticles(): array
    {
        return $this->articleFacade->getArticles($this->user->isLoggedIn());
    }
}
