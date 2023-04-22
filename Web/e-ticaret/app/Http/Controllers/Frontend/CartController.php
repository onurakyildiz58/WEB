<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if(Auth::check())
        {
            $prod_check = Product::where('id', $product_id)->first();
            if($prod_check)
            {
                if(Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists())
                {
                    return response()->json(['status' => $prod_check->name.' ürünü sepetinizdedir']);
                }
                else
                {
                    $cartItem           = new Cart();
                    $cartItem->user_id  = Auth::id();
                    $cartItem->prod_id  = $product_id;
                    $cartItem->prod_qty = $product_qty;
                    $cartItem->save();
                    return response()->json(['status' => $prod_check->name.' ürünü sepete eklendi']);
                }
            }
        }
        else
        {
            return response()->json(['status' => 'sepete ürün eklemek için giriş yapınız']);
        }
    }
    public function viewcart()
    {
        $cart = Cart::where('user_id', Auth::id())->get();
        return view('frontend.cart', compact('cart'));
    }
    public function deleteCardItem(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request->input('prod_id');
            if(Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
            {
                $cardItem = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cardItem->delete();
                return response()->json(['status' => 'ürün sepetinizden silinmiştir']);
            }
        }
        else
        {
            return response()->json(['status' => 'sepete ürün eklemek için giriş yapınız']);
        }
    }
    public function updatecart(Request $request)
    {
        $product_id = $request->input('prod_id');
        $product_qty = $request->input('prod_qty');

        if(Auth::check())
        {
            if(Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists())
            {
                $cart = Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->first();
                $cart->prod_qty = $product_qty;
                $cart->update();
                //return response()->json(['status' => "Miktar Güncellenmiştir"]);
            }
        }
    }
    public function countCartItems()
    {
        $count = Cart::where('user_id', Auth::id())->count();
        return response()->json(['count'=> $count]);
    }
}
