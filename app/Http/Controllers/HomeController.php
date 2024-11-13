<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Partner;
use App\Models\Brand;
use App\Models\Testimonials;
use App\Models\Store;
class HomeController extends Controller
{
    public function index(){
        $categories = Category::where('level', 0)->orderBy('position', 'asc')->get();
        $products = Product::where('accepted', true)->orderBy('valeur', 'desc')->take(12)->get();
        $brands = Brand::all();
        $testimonials = Testimonials::all();
        $partners = Partner::all();
        $brands = Brand::all();
        $stores = Store::where('isActive', true)->get();
        return view('home', compact('categories', 'products', 'brands', 'testimonials', 'partners', 'brands', 'stores' ));
    }
}
