<?php

namespace App\Controllers;

use Universe\Controller;

class AboutController extends Controller
{
    public function index()
    {
        return $this->render('about');
    }
}