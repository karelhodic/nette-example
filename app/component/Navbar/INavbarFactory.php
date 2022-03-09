<?php

namespace App\component\Navbar;

interface INavbarFactory
{
    public function create(): Navbar;
}
