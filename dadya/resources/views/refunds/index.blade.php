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
                <th scope="col">Talep ID</th>
                <th scope="col">Başlık</th>
                <th scope="col">İlgili Siparişin Numarası</th>
            </tr>
            </thead>
            <tbody style="border: black 1px solid;">
            @foreach($refunds as $refund)
                @if($refund->created_by == Auth()->user()->id and $refund->is_approve == false and $refund->is_solved == false)
                    <tr bgcolor="white">
                        <th scope="row">{{$refund->id}}</th>
                        <th>{{$refund->title}}</th>
                        <th>#{{$refund->order[0]->id}}</th>
                    </tr>
                @endif
            @endforeach


            </tbody>
        </table>

        <h4 style="margin-left: 10%;">Onaylanmış Aktif Taleplerim</h4>
        <table class="table " style="width: 85%;  margin-left: 10%; margin-bottom: 20px; text-align: center;">
            <thead class="thead bg-dark" style="color: white;">
            <tr>
                <th scope="col">Talep ID</th>
                <th scope="col">Başlık</th>
                <th scope="col">İlgili Siparişin Numarası</th>
            </tr>
            </thead>
            <tbody style="border: black 1px solid;">
            @foreach($refunds as $refund)
                @if($refund->created_by == Auth()->user()->id and $refund->is_approve == true and $refund->is_solved == false)
                    <tr bgcolor="white">
                        <th scope="row">{{$refund->id}}</th>
                        <th>{{$refund->title}}</th>
                        <th>#{{$refund->order[0]->id}}</th>
                    </tr>
                @endif
            @endforeach


            </tbody>
        </table>

        <h4 style="margin-left: 10%;">Sonuçlanan Taleplerim</h4>
        <table class="table " style="width: 85%;  margin-left: 10%; margin-bottom: 20px; text-align: center;">
            <thead class="thead bg-dark" style="color: white;">
            <tr>
                <th scope="col">Talep ID</th>
                <th scope="col">Başlık</th>
                <th scope="col">İlgili Siparişin Numarası</th>
                <th scope="col">Sonuç</th>
            </tr>
            </thead>
            <tbody style="border: black 1px solid;">
            @foreach($refunds as $refund)
                @if($refund->created_by == Auth()->user()->id and $refund->is_solved == true)
                    <tr bgcolor="white">
                        <th scope="row">{{$refund->id}}</th>
                        <th>{{$refund->title}}</th>
                        <th>#{{$refund->order[0]->id}}</th>
                        <th>@if($refund->is_approved == true) ONAYLANDI @else REDDEDİLDİ @endif</th>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection








































