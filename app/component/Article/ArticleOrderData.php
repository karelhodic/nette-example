<?php

namespace App\component\Article;

class ArticleOrderData
{
    private bool $new = false;

    private bool $old = false;

    private bool $rating = false;

    private bool $alphabetical = false;

    /**
     * @return bool
     */
    public function isNew(): bool
    {
        return $this->new;
    }

    /**
     * @param bool $new
     */
    public function setNew(bool $new): void
    {
        $this->new = $new;
    }

    /**
     * @return bool
     */
    public function isOld(): bool
    {
        return $this->old;
    }

    /**
     * @param bool $old
     */
    public function setOld(bool $old): void
    {
        $this->old = $old;
    }

    /**
     * @return bool
     */
    public function isRating(): bool
    {
        return $this->rating;
    }

    /**
     * @param bool $rating
     */
    public function setRating(bool $rating): void
    {
        $this->rating = $rating;
    }

    /**
     * @return bool
     */
    public function isAlphabetical(): bool
    {
        return $this->alphabetical;
    }

    /**
     * @param bool $alphabetical
     */
    public function setAlphabetical(bool $alphabetical): void
    {
        $this->alphabetical = $alphabetical;
    }
}
