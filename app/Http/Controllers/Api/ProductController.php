<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Products;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{

    public function index()
    {
        $products = Products::latest()->paginate(10);
        return new ProductResource(true, 'List Data Products', $products);
    }
}
