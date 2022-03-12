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
     * @param  int   $limit
     * @param  int   $offset
     * @param  array $order
     * @return array
     * @throws \App\Package\DatabaseException
     */
    public function getArticles(int $limit, int $offset, array $order = []): array
    {
        /** @var int | null $userId */
        $userId = $this->user->getId();

        return $this->articleFacade->getArticles($userId, $this->user->isLoggedIn(), $limit, $offset, $order);
    }

    public function countArticles(): int
    {
        return $this->articleFacade->countArticles($this->user->isLoggedIn());
    }
}
