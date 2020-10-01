@extends('layouts.app')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success" role="alert" style="margin-left: 16%; position: sticky;">
            {{ session()->get('message') }}<button type="button" data-dismiss="alert" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>

        </div>
    @endif
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="card" style="margin-left: 25%; margin-top: 100px; width: 50%;">
                        <div class="card-header bg-dark">
                            <strong style="color:#ffffff;">{{$book->name}} Adlı Kitabın Detayı</strong>
                        </div>
                        <div class="card-body">
                            <div class="img-container" style="display: inline-block; ">
                                <img src="{{asset('/uploads/books/').'/'.$book->photo}}" alt="{{$book->name}}"/>
                            </div>
                            <div class="detail-container" style="display: inline-block; margin-left: 20px;">
                                <i class="fas fa-book"></i> <strong>Kitabın Adı : {{$book->name}}</strong><br>
                                <i class="fas fa-user"></i> <strong>Yazar : {{$book->author}}</strong><br>
                                <i class="fas fa-money-bill-wave"></i> <strong>Fiyatı : {{$book->price}}</strong><br>
                                <div class="input-group mt-2">
                            </div>
                                <form action="#">
                                    <label for="quantity">Sipariş Adeti:</label>
                                    <input type="number" id="quantity" name="quantity" min="1" max="{{$book->number}}" step="1" value="1">
                                    @csrf
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Sepete Ekle</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer text-muted float-left" style="width: 100%;">
                            Stokta bu üründen {{$book->number}} adet bulunuyor.<br>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
