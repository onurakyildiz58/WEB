<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('frontend.orders.index', compact('orders'));
    }
    public function viewOrder($id)
    {
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('frontend.orders.view', compact('orders'));

    }
    public function addmoney()
    {
        return view('frontend.addmoney');
    }
    public function saveMoney(Request $request)
    {
        if(Auth::user()->money == NULL)
        {
            $user = User::where('id', Auth::id())->get();
            $user->money = $request->input('money');
            $user->save();
        }
        else
        {
            $user = User::where('id', Auth::id())->get();
            $money = $user->money;
            $user->money = $request->input('money') + $money;
            $user->update();
        }

        $user = User::where('id', Auth::id())->where('money', '!=', 'NULL')->first();
        return view('frontend.index', compact('user'));
    }
}
