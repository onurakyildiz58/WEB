<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function review($slug)
    {
        $prod_check = Product::where('slug', $slug)->where('status', '0')->first();
        if($prod_check)
        {
            $prod_id = $prod_check->id;
            $review = Review::where('user_id', Auth::id())->where('prod_id', $prod_id)->first();
            if($review)
            {
                return view('frontend.reviews.edit', compact( 'review', 'prod_check'));
            }
            else
            {
                $verified_purchase = Order::where('orders.user_id', Auth::id())->join('order_items', 'orders.id', 'order_items.order_id')->where('order_items.prod_id', $prod_id)->get();
                return view('frontend.reviews.index' ,compact('prod_check', 'verified_purchase'));
            }
        }
        else
        {
            return redirect()->back()->with('status', 'Ürün Stokta Yoktur');
        }
    }
    public function addReview(Request $request)
    {
        $review = $request->input('review');
        $prod_id = $request->input('prod_id');
        $prod_check = Product::where('id', $prod_id)->where('status', '0')->first();

        if($prod_check)
        {
            $new_review = Review::create([
                'user_id' => Auth::id(),
                'prod_id' => $prod_id,
                'user_review' => $review,
            ]);

            $category_slug = $prod_check->category->slug;
            $prod_slug = $prod_check->slug;
            if($new_review)
            {
                return redirect('view-category/'.$category_slug.'/'.$prod_slug)->with('status', 'Yorumunuz İçin Teşekkürler');
            }
        }
        else
        {
            return redirect()->back()->with('status', 'Ürün Stokta Yoktur');
        }
    }
    public function editReview($slug)
    {
        $prod_check = Product::where('slug', $slug)->where('status', '0')->first();
        if($prod_check)
        {
            $product_id = $prod_check->id;
            $review = Review::where('user_id', Auth::id())->where('prod_id', $product_id)->first();
            if($review)
            {
                return view('frontend.reviews.edit', compact( 'review', 'prod_check'));
            }
            else
            {
                return redirect()->back()->with('status', 'Ürün İçin Yorumunuz Yoktur');
            }
        }
        else
        {
            return redirect()->back()->with('status', 'Ürün Stokta Yoktur');
        }
    }
    public function updateReview(Request $request)
    {
        $user_review = $request->input('review');
        if($user_review != '')
        {
            $review_id = $request->input('review_id');
            $review = Review::where('id', $review_id)->where('user_id', Auth::id())->first();
            if($review)
            {
                $review->user_review = $user_review;
                $review->update();
                return redirect('view-category/'.$review->product->category->slug.'/'.$review->product->slug)->with('status', 'Yorumunuz Güncellenmiştir');
            }
            else
            {
                return redirect()->back()->with('status', 'Ürün İçin Yorumunuz Yoktur');
            }
        }
        else
        {
            return redirect()->back()->with('status', 'Yorumu Boş Bırakamazsınız');
        }
    }
}
