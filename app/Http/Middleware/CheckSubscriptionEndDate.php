<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSubscriptionEndDate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            // Use first() method to safely retrieve the first item if it exists
            $store = Auth::user()->store->first(); // Adjust this line

            if ($store) {
                // Again, use first() to safely access the first subscription
                $latestSubscription = $store->latestSubscription->first(); // Adjust this line

                if ($latestSubscription) {
                    $endDate = $latestSubscription->date_fin;

                    // Check if the end date has passed
                    if ($endDate <= now()) {
                        // Block the store or perform any other action
                        $store->isActive = false; // Ensure you have a proper column and logic to handle this in your Store model
                        $store->save();

                        // You can also redirect the user to a different route or display a message
                        return redirect()->back()->with('error', 'Your subscription has expired.');
                    }
                } else {
                    // Handle the case where there is no subscription
                    return redirect()->back()->with('error', 'No active subscription found.');
                }
            } else {
                // Handle the case where there is no store linked to the user
                return redirect()->back()->with('error', 'No store found.');
            }
        }

        return $next($request);
    }
}
