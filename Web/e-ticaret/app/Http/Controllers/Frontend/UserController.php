<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\money;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    public function deleteOrder($id, $money)
    {
         $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
         $userMoney = money::where('user_id', Auth::id())->first();
         $userMoney->card_money = $money + $userMoney->card_money;
         $orders->delete();
         $userMoney->update();
        return redirect('my-orders')->with('status', 'sipariş silindi, para iade edildi');
    }
    protected function profil()
    {
        $user = User::where('id', Auth::id())->first();
        return view('frontend.user.user', compact('user'));
    }
    public function updateUserView()
    {
        $user = User::where('id', Auth::id())->first();
        return view('frontend.user.update', compact('user'));
    }
    public function updateUser(Request $request)
    {
        $user = User::where('id', Auth::id())->first();
        $user->name = $request->input('name');
        $user->password = Hash::make($request->input('password'));
        $user->lname = $request->input('lname');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address1 = $request->input('address1');
        $user->address2 = $request->input('address2');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->county = $request->input('county');
        $user->pincode = $request->input('pincode');
        $user->update();
        return redirect('my-profil')->with('status', 'Bilgileriniz Güncellenmiştir');
    }
}
