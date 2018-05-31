<?php

namespace App\Http\Controllers\Admin;

use App\Services\CategoryServices;

class ArticleController extends ApiController
{
    private $categoryServices;

    public function __construct(CategoryServices $categoryServices)
    {
        $this->categoryServices = $categoryServices;
    }

    public function index()
    {

    }

    public function list()
    {

    }

    public function create()
    {
        $category_list = $this->categoryServices->getSingleTreeArray();

        return view('admin.article.create', compact('category_list'));
    }
}
