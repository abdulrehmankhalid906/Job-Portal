<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    public function session(Request $request)
    {
        if(Auth::user()->package_id == '')
        {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $checkout_session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $request->package_name,
                        ],
                        'unit_amount' => $request->package_price * 100,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('success', ['package_id' => $request->package_id]),
                'cancel_url' => route('packages.index'),
            ]);

            // Redirect to the Stripe Checkout page
            return redirect($checkout_session->url);
        }
        else
        {
            return redirect()->route('packages.index')->with('error', 'You have already purchased a package');
        }
    }
    public function success(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user['package_id'] = $request->package_id;
        $user->save();
        return redirect()->route('packages.index')->with('success', 'You have successfully purchased the package');
    }
}