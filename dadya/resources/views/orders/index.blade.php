@extends('layouts.admin')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success" role="alert" style="margin-left: 16%; position: sticky;">
            {{ session()->get('message') }}<button type="button" data-dismiss="alert" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>

        </div>
    @endif
    <div class="container">
        <h4 style="margin-left: 10%;">Aktif Taleplerim</h4>
        <table class="table " style="width: 85%;  margin-left: 10%; margin-bottom: 20px; text-align: center;">
            <thead class="thead bg-dark" style="color: white;">
            <tr>
                <th scope="col">Sipariş Numarası</th>
                <th scope="col">Ürünler</th>
                <th scope="col">Ürün Miktarı</th>
                <th scope="col">Ödenen Tutar</th>
                <th scope="col">Teslimat Adresi</th>
            </tr>
            </thead>
            <tbody style="border: black 1px solid;">
            @foreach($orders as $order)
                @if($order->is_delivered == false)
                    <th>{{$order->id}}</th>
                    <th>{{$order->products}}</th>
                    <th>{{$order->count}}</th>
                    <th>{{$order->total}}</th>
                    <th>{{$order->address}}</th>
                @endif
            @endforeach


            </tbody>
        </table>

        <h4 style="margin-left: 10%;">Sonuçlanan Taleplerim</h4>
        <table class="table " style="width: 85%;  margin-left: 10%; margin-bottom: 20px; text-align: center;">
            <thead class="thead bg-dark" style="color: white;">
            <tr>
                <th scope="col">Sipariş Numarası</th>
                <th scope="col">Ürünler</th>
                <th scope="col">Ürün Miktarı</th>
                <th scope="col">Ödenen Tutar</th>
                <th scope="col">Teslimat Adresi</th>
            </tr>
            </thead>
            <tbody style="border: black 1px solid;">
            @foreach($orders as $order)
                @if($order->is_delivered == true)
                    <th>{{$order->id}}</th>
                    <th>{{$order->products}}</th>
                    <th>{{$order->count}}</th>
                    <th>{{$order->total}}</th>
                    <th>{{$order->address}}</th>
                @endif
            @endforeach


            </tbody>
        </table>
    </div>
@endsection








































