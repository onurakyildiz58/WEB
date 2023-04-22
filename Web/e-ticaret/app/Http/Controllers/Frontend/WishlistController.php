<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function viewwish()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.wishlist', compact('wishlist'));
    }
    public function addWish(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request->input('product_id');
            if(Product::find($prod_id))
            {
                if(Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
                {
                    return response()->json(['status' => 'ürün istek listenizdedir']);
                }
                else
                {
                    $wish = new Wishlist();
                    $wish->user_id = Auth::id();
                    $wish->prod_id = $prod_id;
                    $wish->save();
                    return response()->json(['status' => 'ürün istek listenize eklendi']);
                }
            }
        }
        else
        {
            return response()->json(['status' => 'istek listenize ürün eklemek için giriş yapınız']);
        }
    }
    public function removeWish(Request $request)
    {
       if(Auth::check())
       {
           $prod_id = $request->input('product_id');
           if(Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
           {
               $wish = Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
               $wish->delete();
               return response()->json(['status' => 'ürün istek listenizden silinmiştir']);
           }
       }
       else
       {
           return response()->json(['status' => 'ürünü istek listenizden silmek için giriş yapınız']);
       }
    }

    public function countWishListItems()
    {
        $count = Wishlist::where('user_id', Auth::id())->count();
        return response()->json(['count'=> $count]);
    }
}
