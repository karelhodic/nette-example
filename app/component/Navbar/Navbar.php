<?php

namespace App\component\Navbar;

use Nette\Application\UI\Control;

class Navbar extends Control
{
    public function render(): void
    {
        $this->getTemplate()->setFile(__DIR__ . '/Navbar.latte');
        $this->getTemplate()->render();
    }
}