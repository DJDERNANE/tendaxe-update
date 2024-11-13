<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'icon',
        'name',
        'sub_category_id',
    ];


    public function subCategory()
    {
        return $this->belongsto(SubCategory::class);
    }
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
