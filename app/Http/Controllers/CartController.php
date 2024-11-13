<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = [];
    
        if (Auth::check()) {
            // Authenticated user
            $user = Auth::user();
            $cart = $user->cart;
    
            // Check if the user has a cart, if not, create one
            if (!$cart) {
                $cart = $user->cart()->create();
            }
    
            // Get all cart items along with product details
            $cartItems = $cart->cartItems()->with('product')->get();
    
            // Return the products with their price and quantity
            $products = $cartItems->map(function ($cartItem) {
                return [
                    'product_id' => $cartItem->product->id,
                    'name' => $cartItem->product->name,
                    'picture' => $cartItem->product->picture,
                    'price' => $cartItem->price,
                    'quantity' => $cartItem->quantity
                ];
            });
        } else {
            // Non-authenticated user, retrieve cart from session
            $cart = session()->get('cart', []);
    
            foreach ($cart as $productId => $item) {
                $products[] = [
                    'product_id' => $productId,
                    'name' => $item['name'],
                    'picture' => $item['picture'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity']
                ];
            }
        }
    
        // Return the products for the cart view
        return view('store.cart', compact('products'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'ok';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('qte', 1);
    
        // Find the product
        $product = Product::findOrFail($productId);
    
        // Initialize the cart array in the session if it doesn't exist
        $cart = session()->get('cart', []);
    
        // Check if the product is already in the cart
        if (isset($cart[$productId])) {
            // If it exists, increase the quantity
            $cart[$productId]['quantity'] += $quantity;
        } else {
            // Add the product to the cart
            $cart[$productId] = [
                'product_id' => $productId,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'picture' => $product->picture,
            ];
        }
    
        // Store the updated cart in the session
        session()->put('cart', $cart);
    
        // Calculate the total cart value
        $cartTotal = collect($cart)->sum(function ($item) {
            return $item['quantity'] * $item['price'];
        });
    
        // Handle for authenticated users
        if (Auth::check()) {
            // Get the authenticated user
            $user = Auth::user();
    
            // If the user has an existing cart, merge session cart with user's cart
            foreach ($cart as $item) {
                // Check if the product is already in the user's cart
                $cartItem = $user->cart->cartItems()->where('product_id', $item['product_id'])->first();
    
                if ($cartItem) {
                    // If the item already exists in the user's cart, update the quantity
                    $cartItem->quantity += $item['quantity'];
                    $cartItem->save();
                } else {
                    // Otherwise, create a new cart item
                    CartItem::create([
                        'cart_id' => $user->cart->id,
                        'product_id' => $item['product_id'],
                        'quantity' => $item['quantity'],
                        'price' => $item['price'],
                    ]);
                }
            }
    
            // Clear the session cart after merging with the user's cart
            session()->forget('cart');
        }
    
        // Return a JSON response if the request is an AJAX request
        if ($request->ajax()) {
            return response()->json([
                'message' => 'Product added to cart!',
                'cartTotal' => $cartTotal, // Send the updated cart total
            ]);
        }
    
        // Redirect back if not an AJAX request
        return redirect()->back()->with('success', 'Product added to cart!');
    }
    
    
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($productId)
    {
        if (Auth::check()) {
            // Authenticated user, delete from user's cart
            $user = Auth::user();
            $cart = $user->cart;
    
            // Remove the cart item
            $cartItem = $cart->cartItems()->where('product_id', $productId)->first();
            if ($cartItem) {
                $cartItem->delete();
            }
        } else {
            // Non-authenticated user, remove from session cart
            $cart = session()->get('cart', []);
    
            // Remove the product if it exists
            if (isset($cart[$productId])) {
                unset($cart[$productId]);
                session()->put('cart', $cart); // Update the session
            }
        }
    
        return redirect()->back()->with('success', 'Product removed from cart!');
    }
    
}
