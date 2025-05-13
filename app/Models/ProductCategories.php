<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategories extends Model
{
    use HasFactory;
    protected $table = 'product_categories';

    protected $fillable = ['name_categories'];
    public function products()
    {
        return $this->hasMany(Products::class, 'product_category_id');
    }
}
