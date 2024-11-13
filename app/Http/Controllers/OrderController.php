<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Store;
use App\Models\clientStore;
use App\Models\Client;
use App\Models\OrderItem;
use App\Models\CartItem;
use App\Models\Cart;
use App\Models\User;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'total_price' => 'required|numeric|min:0',
        ]);

        $user = Auth::user();
        $cartItems = CartItem::whereHas('cart', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->with('product')->get();
        if ($cartItems->isEmpty()) {
            return redirect()->back()->withErrors(['message' => 'Your cart is empty.']);
        }

        // Create new order
        $order = Order::create([
            'user_id' => $user->id,
            'total_price' => $request->total_price,
            'status' => 'pending',
            'shipping_address' => $request->address,
            'contry' => $request->contry,
            'phone' => $request->phone,
            'region' => $request->region,
            'email' => $request->email,
        ]);
        $test =[];
        // Add items to the order
        foreach ($cartItems as $cartItem) {
            orderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'store_id' => $cartItem->product->store->id,
                'price' => $cartItem->price,
            ]);
            $store = $cartItem->product->store;
            if (!$store) {
                return response()->json(['error' => 'Store not found'], 404);
            }

            // Retrieve the user (assuming user is the client in this case
            if (!$user) {
                return response()->json(['error' => 'User not found'], 404);
            }
            $client = Client::firstOrCreate(
                ['user_id' => $user->id],
                ['address' => $request->address]
            );
            $existingClientStore = ClientStore::where('client_id', $client->id)
            ->where('store_id', $store->id)
            ->first();

            if (!$existingClientStore) {
            // Attach the client to the store if not already attached
            ClientStore::create([
            'client_id' => $client->id,
            'store_id' => $store->id
            ]);
        }
        }

        $cart = Cart::where('user_id', $user->id)->first();

        if ($cart) {
            // Delete all items in the cart
           CartItem::where('cart_id', $cart->id)->delete();
        }

        return redirect()->route('orders.index')->with('success', 'Order placed successfully.');
        
    }

    public function index(){
        $orders = Order::where('user_id', Auth::id())->get();
      
        return view('store.order', compact('orders'));
        //return $orders;
    }

    public function allUnactiveOrders(){
        $orders = Order::all();
        return view('admin.store.orders', compact('orders'));
    }

    public function allActiveOrders(){
        $orders = Order::where('active', true)->get();
    }

    public function VendorOrders(){
        $storeId = Auth::user()->store[0]->id; // Assuming each user has a store_id
        $orderItems = OrderItem::where('store_id', $storeId)->where('active', true)
            ->with(['order', 'product'])
            ->get();
              $user = Auth::user();
        
        $store = $user->store;
      
 
        $clientStores = ClientStore::where('store_id', $store[0]->id)
            ->with('client.user')
            ->get();
        return view('store.panel.orders', compact('orderItems','clientStores'));
    }

    public function show(Order $order){ 
        $orderItems = $order->orderItems;
        return view('admin.store.orderDetails', compact('order', 'orderItems'));
    }


    public function accept(Request $request){ 
        $ids = $request->input('ids');
        $orderItems = OrderItem::whereIn('id', $ids)->update([
            'active' => true
        ]);
        return redirect()->route('orders.unactive');
    }

    public function ordersProducts(User $user){
        $user = Auth::user();
        
        $store = $user->store;
      
 
        $products = $store[0]->products;
        return view('store.panel.orderProducts', compact('user', 'products'));;
    }
}
