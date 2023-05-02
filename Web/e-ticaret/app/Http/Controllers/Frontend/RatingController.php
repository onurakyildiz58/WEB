<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function starsRating(Request $request)
    {
        $stars = $request->input('product_rating');
        $prod_id = $request->input('prod_id');

        $prod_check = Product::where('id', $prod_id)->where('status', '0')->first();
        if($prod_check)
        {
            $verified_purchase = Order::where('orders.user_id', Auth::id())
                ->join('order_items', 'orders.id', 'order_items.order_id')
                ->where('order_items.prod_id', $prod_id)->get();
            if($verified_purchase->count() > 0)
            {
                $rate_check = Rating::where('user_id', Auth::id())->where('prod_id', $prod_id)->first();
                if($rate_check)
                {
                    $rate_check->stars_rated = $stars;
                    $rate_check->update();
                }
                else
                {
                    Rating::create([
                        'user_id'     => Auth::id(),
                        'prod_id'     => $prod_id,
                        'stars_rated' => $stars,
                    ]);
                }
                return redirect()->back()->with('status', 'Puanlamanız İçin Teşekkürler');
            }
            else
            {
                return redirect()->back()->with('status', 'Puanlamak İçin Satın Alınız');
            }
        }
        else
        {
            return redirect()->back()->with('status', 'böyle bi ürün bulunmamaktadır');

        }
    }
}
