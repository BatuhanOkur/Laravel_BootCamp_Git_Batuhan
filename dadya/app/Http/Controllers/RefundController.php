<?php

namespace App\Http\Controllers;

use App\Models\Refund;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RefundController extends Controller
{
    public function myRefundsIndex(){
        $refunds = Refund::with(['book'])->where('deleted_at','=',null)->get();
        return view('refunds.index',compact('refunds'));
    }

    public function adminRefundsIndex(){
        $refunds = Refund::with(['book'])->where('deleted_at','=',null)->get();
        return view('refunds.admin-index',compact('refunds'));
    }

    public function refundShow($id){
        $refund = Refund::with(['book'])->with(['user'])->where('id',$id)->get();
        $refund = $refund->first();
        return view('refunds.show',compact('refund'));
    }

    public function createRefundView(){
        return view('refunds.create');
    }

    public function createRefund(Request $request){
        $this->validate($request,[
            'title' => 'required|max:255',
            'book_id' => 'required|integer|min:1',
            'details' => 'required',
        ]);
        $created_by = auth()->user()->id;
        $updated_by = $created_by;
        Refund::create([
            'title' => $request->get('title'),
            'book_id' => $request->get('book_id'),
            'details' => $request->get('details'),
            'created_by' => $created_by,
            'updated_by' => $updated_by
        ]);
        $to_name = auth()->user()->name;
        $to_email = auth()->user()->email;
        $body = [];
        $mailData = array('body' => $body);
        Mail::send('email.refund',$mailData,function ($message) use ($to_email,$to_name){
            $message->to($to_email,$to_name)->subject('Talebiniz tarafımıza ulaştı!');
            $message->from(env('MAIL_USERNAME'),'Dadya Kitapçılık');
        });
        return redirect()->route('refund.index')->with('message','Talebiniz başarıyla oluşturuldu!');
    }
}
