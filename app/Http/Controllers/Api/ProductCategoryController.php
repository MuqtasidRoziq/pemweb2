<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProductCategories;
use App\Http\Resources\ProductCategoryResource;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategories::latest()->paginate(10);

        return new ProductCategoryResource(true, 'List Data Product Category', $categories);
    }
}
