<?php

namespace App\Presenters;

use App\component\Navbar\INavbarFactory;
use App\component\Navbar\Navbar;
use Nette\Application\UI\Presenter;

class BasePresenter extends Presenter
{
    /** @var INavbarFactory @inject */
    public INavbarFactory $navbarFactory;

    public function createComponentNavbar(): Navbar
    {
        return $this->navbarFactory->create();
    }
}
