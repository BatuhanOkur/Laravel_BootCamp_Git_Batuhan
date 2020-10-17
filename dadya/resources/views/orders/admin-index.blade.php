@extends('layouts.admin')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success" role="alert" style="margin-left: 16%; position: sticky;">
            {{ session()->get('message') }}<button type="button" data-dismiss="alert" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>

        </div>
    @endif
    <div class="container">
        <h4 style="margin-left: 10%;">Aktif Siparişler</h4>
        <table class="table " style="width: 85%;  margin-left: 10%; margin-bottom: 20px; text-align: center;">
            <thead class="thead bg-dark" style="color: white;">
            <tr>
                <th scope="col">Sipariş ID</th>
                <th scope="col">Ürün</th>
                <th scope="col">Alıcı</th>
                <th scope="col">Toplam Ürün</th>
                <th scope="col">Toplam Fiyat</th>
                <th scope="col">Adres</th>
                <th scope="col">İşlemler</th>
            </tr>
            </thead>
            <tbody style="border: black 1px solid;">
            @if(count($orders) > 0)
                @foreach($orders as $order)
                    @if($order->is_delivered == 0)
                        <tr bgcolor="white">
                            <th scope="row">{{$order->id}}</th>
                            <th>{{$order->products}}</th>
                            <th>{{$order->user[0]->name}}</th>
                            <th>{{$order->count}}</th>
                            <th>{{$order->total}} TL</th>
                            <th>{{$order->address}}</th>
                            <th>
                                <form method="post" action="{{route('order.deliver',$order->id)}}">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Teslimi Onayla</button>
                                </form>
                            </th>
                        </tr>
                    @else
                        <tr bgcolor="white">
                            <th class="text-muted">Teslim edilmemiş sipariş bulunmuyor.</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    @endif
                @endforeach
            @endif





            </tbody>
        </table>

        <h4 style="margin-left: 10%;">Sonuçlanan Siparişler</h4>
        <table class="table " style="width: 85%;  margin-left: 10%; margin-bottom: 200px; text-align: center;">
            <thead class="thead bg-dark" style="color: white;">
            <tr>
                <th scope="col">Sipariş ID</th>
                <th scope="col">Ürün</th>
                <th scope="col">Alıcı</th>
                <th scope="col">Toplam Ürün</th>
                <th scope="col">Toplam Fiyat</th>
                <th scope="col">Adres</th>
            </tr>
            </thead>
            <tbody style="border: black 1px solid;">
            @foreach($orders as $order)
                @if($order->is_delivered == 1)
                    <tr bgcolor="white">
                        <th scope="row">{{$order->id}}</th>
                        <th>{{$order->products}}</th>
                        <th>{{$order->user[0]->name}}</th>
                        <th>{{$order->count}}</th>
                        <th>{{$order->total}} TL</th>
                        <th>{{$order->address}}</th>
                    </tr>
                @else
                    <tr bgcolor="white">
                        <th class="text-muted">Sonuçlanmış sipariş bulunmuyor.</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                @endif
            @endforeach





            </tbody>
        </table>
    </div>
@endsection
