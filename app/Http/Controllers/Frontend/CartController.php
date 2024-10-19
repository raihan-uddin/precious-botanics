<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        $pageTitle = 'Cart';
        return view('frontend.pages.cart', compact('pageTitle'));
    }
}
