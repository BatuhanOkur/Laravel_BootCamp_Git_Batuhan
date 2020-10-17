<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Refund;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RefundController extends Controller
{
    public function myRefundsIndex(){
        $refunds = Refund::with(['order'])->where('deleted_at','=',null)->get();
        return view('refunds.index',compact('refunds'));
    }

    public function adminRefundsIndex(){
        $refunds = Refund::with(['order'])->where('deleted_at','=',null)->get();
        return view('refunds.admin-index',compact('refunds'));
    }

    public function refundShow($id){
        $refund = Refund::with(['order'])->with(['user'])->where('id',$id)->get();
        $refund = $refund->first();
        return view('refunds.show',compact('refund'));
    }

    public function createRefundView(){
        $orders = Order::where('user_id',auth()->user()->id)->where('is_delivered',true)->get();
        return view('refunds.create',compact('orders'));
    }

    public function createRefund(Request $request){
        $this->validate($request,[
            'title' => 'required|max:255',
            'order_id' => 'required|integer|min:1',
            'details' => 'required',
        ]);
        $created_by = auth()->user()->id;
        $updated_by = $created_by;
        Refund::create([
            'title' => $request->get('title'),
            'order_id' => $request->get('order_id'),
            'details' => $request->get('details'),
            'created_by' => $created_by,
            'updated_by' => $updated_by
        ]);
        $to_name = auth()->user()->name;
        $to_email = auth()->user()->email;
        $mailData = [
          'order_id' => $request->get('order_id')
        ];
        Mail::send('email.refund',$mailData,function ($message) use ($to_email,$to_name){
            $message->to($to_email,$to_name)->subject('Talebiniz tarafımıza ulaştı!');
            $message->from(env('MAIL_USERNAME'),'Dadya Kitapçılık');
        });
        return redirect()->route('refund.index')->with('message','Talebiniz başarıyla oluşturuldu!');
    }

    public function solveRefund($id){
        Refund::where('id',$id)->update([
            'is_solved' => true
        ]);
        $refund = Refund::where('id',$id)->get();
        $refund = $refund->first();
        if($refund->is_approved == false){
            return redirect()->back()->with('message',$id." ID'li talebi reddettiniz.");
        }
        else{
            return redirect()->back()->with('message',$id." ID'li talebi sonuçlandırdınız.");
        }

    }

    public function approveRefund($id){
        Refund::where('id',$id)->update([
            'is_approved' => true
        ]);

        return redirect()->back()->with('message',$id. " ID'li talebi onayladınız.");
    }
}
