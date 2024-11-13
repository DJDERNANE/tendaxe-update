<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'icon',
        'name',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsto(Category::class);
    }

    public function subsubcategories()
    {
        return $this->hasMany(SubSubCategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
