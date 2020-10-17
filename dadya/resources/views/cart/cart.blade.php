@extends('layouts.app')
@section('title')
    Alışveriş Sepetim
@endsection
@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Sepetim</h1>
        </div>
    </section>
    @if(session()->has('message'))
        <div class="alert alert-success" role="alert" style="width: 50%; margin-left: 30%; margin-top: 20px; position: sticky;">
            {{ session()->get('message') }}<button type="button" data-dismiss="alert" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>

        </div>
    @endif
    <div class="container mb-4">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Ürün</th>
                            <th scope="col">Stoktaki Durum</th>
                            <th scope="col" class="text-center">Adet</th>
                            <th scope="col" class="text-right">Fiyat</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($carts as $cart)
                            <tr>
                                <td><img src="{{asset('/uploads/books/').'/'.$cart->book[0]->photo}}"
                                         alt="{{$cart->book[0]->name}}" width="50px" height="50px"/></td>
                                <td>{{$cart->book[0]->name}}</td>
                                <td>@if($cart->book[0]->number > 0) MEVCUT @else TÜKENDİ @endif</td>
                                <td>{{$cart->miktar}}</td>
                                <td class="text-right">{{$cart->book[0]->price*$cart->miktar}} TL</td>
                                <td class="text-right">
                                    <form action="{{route('delete.cart',$cart->id)}}" method="post">
                                        @csrf
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    Toplam Tutar : {{$totalPrice}} TL
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col mb-2">
                <div class="row">
                    <div class="col-sm-12  col-md-6">
                        <button class="btn btn-lg btn-block btn-light text-uppercase" style="border: black solid 1px;">
                            Alışverişe Devam Et
                        </button>
                    </div>
                    <div class="col-sm-12 col-md-6 text-right">
                        <form action="{{route('buy.view')}}" method="post">
                            <input type="hidden" name="totalprice" id="totalprice" value="{{$totalPrice}}">
                            @csrf
                            <button type="submit" class="btn btn-lg btn-block btn-success text-uppercase">Siparişi Tamamla</button>
                        </form>
                    </div>
                </div>
            </div>
@endsection
