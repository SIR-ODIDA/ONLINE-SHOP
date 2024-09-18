<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\product;

use App\Models\user;

use App\Models\Cart;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // directs to admin dashboard if login is admin
    public function index()
    {
        return view('admin.index');
    }

    public function home()
    {
        $product = Product::all();

        // Check if the user is logged in
        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = '[' . Cart::where('user_id', $userid)->count() . ']';
        } else {
            $count = '[0]';  // Display zero count if the user is not logged in
        }

        return view('home.index', compact('product', 'count'));
    }

    public function login_home()
    {
        $product = Product::all();

        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = '[' . Cart::where('user_id', $userid)->count() . ']';
        } else {
            $count = '[0]';  // Display zero count if the user is not logged in
        }

        return view('home.index', compact('product', 'count'));
    }

    public function product_details($id)
    {
        $data = Product::find($id);

        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = '[' . Cart::where('user_id', $userid)->count() . ']';
        } else {
            $count = '[0]';  // Display zero count if the user is not logged in
        }

        return view('home.product_details', compact('data', 'count'));
    }

    public function add_cart($id)
    {
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;

        $data = new Cart;
        $data->user_id = $user_id;
        $data->product_id = $product_id;  // Makes sure the correct product_id is saved
        $data->save();

        // Set a session flash message to trigger the SweetAlert
        session()->flash('success', 'Product Added to the Cart Successfully');

        return redirect()->back();
    }


    public function mycart()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;

            // Get the count of items in the cart
            $count = Cart::where('user_id', $userid)->count();

            // Get the cart items with related product and user data
            $cart = Cart::where('user_id', $userid)->with(['product', 'user'])->get();

            // Return the view with the cart and count data
            return view('home.mycart', compact('count', 'cart'));
        }

        // Handle case where user is not authenticated
        return redirect()->route('login'); // Adjust according to your route names
    }


}
