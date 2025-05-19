<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'sku',
        'price',
        'stock',
        'product_category_id',
        'image_url',
        'is_active',
    ];

    public function getRouteKeyName()
    {
        return 'slug'; // Gunakan slug untuk route binding
    }
    
    public function category()
    {
        return $this->belongsTo(ProductCategories::class, 'product_category_id');
    }
}
