<?php

namespace App\component\Article;

interface IArticleFactory
{
    public function create(): Article;
}
