<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function addToCart(Request $request){
        $userID = auth()->user()->id;
        Cart::create([
            'book_id' => $request->get('book_id'),
            'user_id' => $userID,
            'miktar' => $request->get('miktar')
        ]);
        return redirect()->back()->with('message','Ürün sepete eklendi !');
    }

    public function cartIndex(){
        $carts = Cart::with(['book'])->where('user_id','=',auth()->user()->id)->where('deleted_at','=',null)->get();
        $totalPrice = 0;
        $products = [];
        foreach ($carts as $cart){
            $bookPrice = $cart->book[0]->price * $cart->miktar;
            $totalPrice += $bookPrice;
            array_push($products,$cart->book[0]->name);
        }
        return view('cart.cart',compact('carts','totalPrice','products'));
    }

    public function deleteCart($id){
        $cart = Cart::where('id',$id)->get();
        $cart = $cart->first();
        Cart::where('id','=',$id)->update([
            'deleted_at' => Carbon::now()
        ]);

        return redirect()->back()->with('message', 'Ürünü sepetten başarıyla sildiniz!');
    }

    public function buyItemsView(Request $request){
        $total = $request->get('totalprice');
        $carts = Cart::with(['book'])->where('user_id','=',auth()->user()->id)->where('deleted_at','=',null)->get();
        $qnt = 0;
        foreach ($carts as $cart){
            $qnt += $cart->miktar;
        }
        return view('cart.buy',compact('total','carts','qnt'));
    }

    public function buyItems(Request $request){
        $order = Order::create([
           'products' => $request->get('products'),
           'user_id' => auth()->user()->id,
            'count' => $request->get('count'),
            'total' => $request->get('total'),
            'address' => $request->get('address'),
            'city' => $request->get('city')
        ]);
        Cart::where('user_id','=',auth()->user()->id)->where('deleted_at','=',null)->update([
            'deleted_at' => Carbon::now()
        ]);
        $to_name = auth()->user()->name;
        $to_email = auth()->user()->email;
        $total = $request->get('total');
        $deliveryTime = Carbon::now()->addDays(7)->format('d.m.Y');
        $deliveryAddress = $request->get('address');
        $mailData = [
            'total' => $total,
            'address' => $deliveryAddress,
            'time' => $deliveryTime,
            'order_id' => $order->id,
        ];
        Mail::send('email.order',$mailData,function ($message) use ($to_email,$to_name){
            $message->to($to_email,$to_name)->subject('Siparişiniz tarafımıza ulaştı!');
            $message->from(env('MAIL_USERNAME'),'Dadya Kitapçılık');
        });
        return view('orders.order-success');
    }
}
