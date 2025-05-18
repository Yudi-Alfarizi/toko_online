<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('themes/' . $this->data['currentTheme'] . '/pages/home', $this->data);
    }
}
