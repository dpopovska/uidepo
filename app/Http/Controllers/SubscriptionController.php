<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    private $mainmenu = 'block-live-pages';

    private $submenu  = 'subscriptions';

    /**
     * Display a listing of the resource Subscriptions
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions = Subscription::order('created_at')->get();

        return view('subscriptions.list', compact('subscriptions'))->with(['mainmenu' => $this->mainmenu, 'submenu' => $this->submenu]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $subscription = request()->validate([
            'email' => 'required|email|unique:subscriptions,email'
        ], ['email.unique' => 'You are already subscribed!']);

        // Two messages are used for "single details" page where 
        // two subscriptions forms are placed on the same page 
        $message = (request()->has('form_up')) 
                    ? 'success_up' 
                    : 'success_down';

        Subscription::create($subscription);

        return back()->with($message, 'Thanks for your subscription!');
    }
}
