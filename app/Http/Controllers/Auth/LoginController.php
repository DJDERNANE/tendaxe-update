<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;

class LoginController extends Controller
{
    public function index()
    {
       
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // validation
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        // login attempt
        if (!Auth::attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('error', 'mauvais e-mail ou mot de passe');
        }
    
        // Handle cart redirect if present
        $redirectUrl = session()->pull('redirect_after_login', null);  // Check if there is a redirect URL stored
    
        // Check user type and redirect accordingly
        if (Auth::user()->type_user === "admin") {
            return redirect()->route('dashboard');
        }
    
        if (Auth::user()->type_user === "storeAdmin") {
            return redirect()->route('store');
        }
    
        if (Auth::user()->type_user === "publisher") {
            if (Auth::user()->etat === "desactive") {
                Auth::logout();
                return redirect()->route('suspended');
            } else {
                return redirect()->route('dashboard');
            }
        }
    
        if (Auth::user()->type_user === "vendor") {
            if (Auth::user()->etat === "desactive") {
                Auth::logout();
                return redirect()->route('suspended');
            } else {
                return redirect()->route('storePanel');
            }
        }
    
        if (Auth::user()->type_user === "content") {
            return redirect()->route('rep.dashboard');
        }



        $cart = session()->get('cart', []);

        if (Auth::user()) {
            if ($cart) {
                foreach ($cart as $item){
                    // Check if the product is already in the user's cart
                    $cartItem = Auth::user()->cart->cartItems()->where('product_id', $item['product_id'])->first();
                        
                    if ($cartItem) {
                        // If the item already exists in the user's cart, update the quantity
                        $cartItem->quantity += $item['quantity'];
                        $cartItem->save();
                    } else {
                        // Otherwise, create a new cart item
                        CartItem::create([
                            'cart_id' => Auth::user()->cart->id,
                            'product_id' => $item['product_id'],
                            'quantity' => $item['quantity'],
                            'price' => $item['price'],
                        ]);
                    }
                }

            } 
        }
     // Clear the session cart after merging with the user's cart
            session()->forget('cart');
        // Redirect to the stored URL if there is one (like the cart page), otherwise, go to home
        return $redirectUrl ? redirect($redirectUrl) : redirect()->route('home');
    }
}    