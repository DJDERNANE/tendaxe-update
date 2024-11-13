<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'picture',
        'icon',
        'parent_id', 
        'level',
        'position'
    ];


     // Category.php (Model)
     public function getBreadcrumbPath()
     {
         $path = collect([]);
         $category = $this;
     
         while ($category) {
             $path->prepend($category);
             $category = $category->parent;
         }
     
         return $path;
     }

    public function products()
    {
        return $this->belongsToMany(Product::class,'product_categories', 'category_id', 'product_id');
    }

  

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

 
}
