<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function adminOrdersIndex(){
        $orders = Order::with(['user'])->where('deleted_at','=',null)->get();
        return view('orders.admin-index',compact('orders'));
    }

    public function OrderIndex(){
        $orders = Order::where('deleted_at',null)->where('user_id',auth()->user()->id)->get();
        return view('orders.index',compact('orders'));
    }

    public function deliverOrder($id){
        Order::where('id',$id)->update([
            'is_delivered' => true
        ]);

        return redirect()->back()->with('message',$id. "numaralı sipariş sonuçlandırıldı.");
    }
}
