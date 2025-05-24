<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class Home extends BaseController
{
    public function index(): string
    {
        $categoryModel = new CategoryModel();
        $this->data['categories'] = $categoryModel->getNestedCategories(); // <- ini method yang tersedia

        return view('themes/' . $this->data['currentTheme'] . '/pages/home', $this->data);
    }
}
