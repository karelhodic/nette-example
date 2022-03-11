<?php

namespace App\Package\ArticleRating;

use Nette\Security\AuthenticationException;
use Nette\Security\User;

class ArticleRatingUserFacade
{
    private User $user;

    private ArticleRatingFacade $articleRatingFacade;

    /**
     * @param User                $user
     * @param ArticleRatingFacade $articleRatingFacade
     */
    public function __construct(User $user, ArticleRatingFacade $articleRatingFacade)
    {
        $this->user = $user;
        $this->articleRatingFacade = $articleRatingFacade;
    }

    /**
     * @throws AuthenticationException
     */
    public function like(int $articleId): void
    {
        /** @var int | null $userId */
        $userId = $this->user->getId();

        if ($userId === null) {
            throw new \Nette\Security\AuthenticationException('Nepřihlášený');
        }

        $this->articleRatingFacade->like($articleId, $userId);
    }

    /**
     * @throws AuthenticationException
     */
    public function dislike(int $articleId): void
    {
        /** @var int | null $userId */
        $userId = $this->user->getId();

        if ($userId === null) {
            throw new \Nette\Security\AuthenticationException('Nepřihlášený');
        }

        $this->articleRatingFacade->dislike($articleId, $userId);
    }
}
