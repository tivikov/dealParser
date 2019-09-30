<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.dashboard');
    }

    public function me() {
        return view('dashboard.me');
    }

    public function getProducts() {
        $products = Product::orderBy('id', 'asc')->paginate(50);
        return view('dashboard.dashboardProducts')->with('products', $products);
    }

}
