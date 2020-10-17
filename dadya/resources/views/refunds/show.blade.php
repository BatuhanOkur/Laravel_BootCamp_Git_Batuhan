@extends('layouts.admin')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success" role="alert" style="margin-left: 16%; position: sticky;">
            {{ session()->get('message') }}<button type="button" data-dismiss="alert" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>

        </div>
    @endif
    <div class="container">
        <div class="card" style="margin-left: 25%; margin-top: 100px; margin-bottom: 200px;">
            <div class="card-header">
                <h5 class="text-uppercase">{{$refund->id}} ıd'lı talep</h5>
            </div>
            <div class="card-body">
                <p class="card-text"><strong>Başlık :</strong> {{$refund->title}}</p>
                <p class="card-text"><strong>İlgili Sipariş Numarası :</strong> {{$refund->order[0]->id}}</p>
                <p class="card-text"><strong>Detay :</strong> {{$refund->details}}</p>
                <p class="card-text"><strong>Oluşturan :</strong> {{$refund->user[0]->name}}</p>
                <p class="card-text"><strong>Onay Durumu :</strong> @if($refund->is_approved == true) ONAYLANDI @else ONAYLANMADI @endif</p>
                <p class="card-text"><strong>Talep Durumu :</strong> @if($refund->is_solved == true) SONUÇLANDI @else SONUÇLANMADI @endif</p>
            </div>
            <div class="card-footer">
                <form method="post" action="{{route('refund.approve',$refund->id)}}">
                    @csrf
                    <button type="submit" class="btn btn-success">Onayla</button>
                </form>
                <form method="post" action="{{route('refund.solve',$refund->id)}}">
                    @csrf
                    <button type="submit" class="btn btn-primary">Sonuçlandır</button>
                </form>
            </div>
        </div>
    </div>

@endsection
