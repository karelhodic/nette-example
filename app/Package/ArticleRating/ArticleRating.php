<?php

namespace App\Package\ArticleRating;

class ArticleRating
{
    private int $likeCount;

    private int $dislikeCount;

    private bool $like;

    private bool $dislike;

    /**
     * @return int
     */
    public function getLikeCount(): int
    {
        return $this->likeCount;
    }

    /**
     * @param int $likeCount
     */
    public function setLikeCount(int $likeCount): void
    {
        $this->likeCount = $likeCount;
    }

    /**
     * @return int
     */
    public function getDislikeCount(): int
    {
        return $this->dislikeCount;
    }

    /**
     * @param int $dislikeCount
     */
    public function setDislikeCount(int $dislikeCount): void
    {
        $this->dislikeCount = $dislikeCount;
    }

    /**
     * @return bool
     */
    public function isLike(): bool
    {
        return $this->like;
    }

    /**
     * @param bool $like
     */
    public function setLike(bool $like): void
    {
        $this->like = $like;
    }

    /**
     * @return bool
     */
    public function isDislike(): bool
    {
        return $this->dislike;
    }

    /**
     * @param bool $dislike
     */
    public function setDislike(bool $dislike): void
    {
        $this->dislike = $dislike;
    }

    /**
     * @param int $likeCount
     * @param int $dislikeCount
     * @param bool $like
     * @param bool $dislike
     */
    public function __construct(int $likeCount, int $dislikeCount, bool $like, bool $dislike)
    {
        $this->likeCount = $likeCount;
        $this->dislikeCount = $dislikeCount;
        $this->like = $like;
        $this->dislike = $dislike;
    }
}