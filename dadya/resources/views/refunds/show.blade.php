@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card" style="margin-left: 25%; margin-top: 100px;">
            <div class="card-header">
                <h5 class="text-uppercase">{{$refund->id}} ıd'lı talep</h5>
            </div>
            <div class="card-body">
                <p class="card-text"><strong>Başlık :</strong> {{$refund->title}}</p>
                <p class="card-text"><strong>Ürün :</strong> {{$refund->book[0]->name}}</p>
                <p class="card-text"><strong>Detay :</strong> {{$refund->details}}</p>
                <p class="card-text"><strong>Oluşturan :</strong> {{$refund->user[0]->name}}</p>
                <p class="card-text"><strong>Onay Durumu :</strong> @if($refund->is_approved == true) ONAYLANDI @else ONAYLANMADI @endif</p>
                <p class="card-text"><strong>Talep Durumu :</strong> @if($refund->is_solved == true) SONUÇLANDI @else SONUÇLANMADI @endif</p>
            </div>
            <div class="card-footer">
                <a class="btn btn-success" href="#">Onayla</a> <a class="btn btn-danger" href="#">Reddet</a> <a
                   class="btn btn-primary" href="#">Sonuçlandır</a>
            </div>
        </div>
    </div>

@endsection
