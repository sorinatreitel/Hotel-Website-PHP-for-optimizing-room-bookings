<?php

namespace App\Http\Controllers;

use Exception;
use Stripe\StripeClient;
use Illuminate\Http\Request;
use Stripe\Exception\CardException;
use Session;

class StripeController extends Controller
{
    public function index()
    {
        return view('stripe.index');
    }

    public function store(Request $request)
    {
        //dd($request);
        require_once(base_path() . '/vendor/stripe/stripe-php/init.php');
        try {
            $stripe = new StripeClient(env('STRIPE_SECRET'));

            $stripe->paymentIntents->create([
                'amount' => $request->price_stripe * 100,
                'currency' => 'ron',
                'payment_method' => $request->payment_method,
                'description' => 'Servicii hoteliere',
                'confirm' => true,
                'receipt_email' => $request->stripe_email
            ]);

            Session::flash('adults', $request->adults);
            Session::flash('children', $request->children);

        } catch (CardException $th) {
            return back()->with('stripe_error', 'yes');
        }

        return back()->with('stripe_success', 'yes');
    }
}
