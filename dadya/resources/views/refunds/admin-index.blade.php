@extends('layouts.admin')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success" role="alert" style="margin-left: 16%; position: sticky;">
            {{ session()->get('message') }}<button type="button" data-dismiss="alert" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>

        </div>
    @endif
    <div class="container">
        <h4 style="margin-left: 10%;">Aktif Talepler</h4>
        <table class="table " style="width: 85%;  margin-left: 10%; margin-bottom: 20px; text-align: center;">
            <thead class="thead bg-dark" style="color: white;">
            <tr>
                <th scope="col">Talep ID</th>
                <th scope="col">Başlık</th>
                <th scope="col">İlgili Ürün</th>
                <th scope="col">Onay Durumu</th>
                <th scope="col">Talep Durumu</th>
                <th scope="col">Görüntüle</th>
            </tr>
            </thead>
            <tbody style="border: black 1px solid;">
            @if(count($refunds) > 0)
                @foreach($refunds as $refund)
                    <tr bgcolor="white">
                        <th scope="row">{{$refund->id}}</th>
                        <th>{{$refund->title}}</th>
                        <th>{{$refund->book[0]->name}}</th>
                        <th>@if($refund->is_approved == true) ONAYLANDI @else ONAYLANMADI @endif</th>
                        <th>AKTİF</th>
                        <th><a class="btn btn-primary" href="{{route('refund.show',$refund->id)}}"><i class="far fa-eye"></i></a></th>
                    </tr>
                @endforeach
            @else
                <tr bgcolor="white">
                    <th class="text-muted">Aktif iade talebi bulunmuyor.</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            @endif



            </tbody>
        </table>

        <h4 style="margin-left: 10%;">Sonuçlanan Talepler</h4>
        <table class="table " style="width: 85%;  margin-left: 10%; margin-bottom: 20px; text-align: center;">
            <thead class="thead bg-dark" style="color: white;">
            <tr>
                <th scope="col">Talep ID</th>
                <th scope="col">Başlık</th>
                <th scope="col">İlgili Ürün</th>
                <th scope="col">Onay Durumu</th>
                <th scope="col">Talep Durumu</th>
                <th scope="col">Görüntüle</th>
            </tr>
            </thead>
            <tbody style="border: black 1px solid;">
                @foreach($refunds as $refund)
                    @if($refund->is_solved == 1)
                        <tr bgcolor="white">
                            <th scope="row">{{$refund->id}}</th>
                            <th>{{$refund->title}}</th>
                            <th>{{$refund->book[0]->name}}</th>
                            <th>@if($refund->is_approved == true) ONAYLANDI @else ONAYLANMADI @endif</th>
                            <th>ÇÖZÜLDÜ</th>
                            <th><a class="btn btn-primary" href="{{route('refund.show',$refund->id)}}"><i class="far fa-eye"></i></a></th>
                        </tr>
                    @else
                        <tr bgcolor="white">
                            <th class="text-muted">Sonuçlanmış iade talebi bulunmuyor.</th>
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
