@extends('layouts.app')
@section('title')
    {{$book->name}} Kitabı
@endsection

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
                    <div class="col-md-8">
                        <div class="card" style="margin-left: 25%; margin-top: 10px; width: 70%;">
                            <div class="card-header">
                                <strong>{{$book->name}} Adlı Kitabın Detayı</strong>
                            </div>
                            <div class="card-body">
                                <div class="img-container" style="display: inline-block; ">
                                    <img height="200px" width="200px" src="{{asset('/uploads/books/').'/'.$book->photo}}" alt="{{$book->name}}"/>
                                </div>
                                <div class="detail-container" style="display: inline-block; margin-left: 20px;">
                                    <i class="fas fa-book"></i> <strong>Kitabın Adı : {{$book->name}}</strong><br>
                                    <i class="fas fa-user"></i> <strong>Yazar : {{$book->author}}</strong><br>
                                    <i class="fas fa-money-bill-wave"></i> <strong>Fiyatı : {{$book->price}}</strong><br>
                                    <div class="input-group mt-2">
                                </div>
                                    <form action="{{route('cart.add')}}" method="post" enctype="multipart/form-data">
                                        <label for="miktar">Sipariş Adeti:</label>
                                        <input type="number" id="miktar" name="miktar"  min="1" max="{{$book->number}}" step="1" value="1">
                                        @csrf
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Sepete Ekle</button>
                                        <input type="hidden" name="book_id" value="{{$book->id}}">
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer text-muted float-left" style="width: 100%;">
                                Stokta bu üründen {{$book->number}} adet bulunuyor.<br>

                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>Kitap Türleri</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <ul class="list-unstyled">
                                            <li><a href="#" class="badge badge-secondary">Tarih</a></li>
                                            <li><a href="#" class="badge badge-secondary">Karikatür</a></li>
                                            <li><a href="#" class="badge badge-secondary">Roman</a></li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <ul class="list-unstyled">
                                            <li><a href="#" class="badge badge-secondary">Kurgu</a></li>
                                            <li><a href="#" class="badge badge-secondary">Kişisel Gelişim</a></li>
                                            <li><a href="#" class="badge badge-secondary">Hikaye</a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card mb-4" >
                            <div class="card-header">
                                <h5>Diğer Kitaplar</h5>
                            </div>
                            <div class="card-body">
                                @foreach($books as $book)
                                    <div class="card">
                                        <a href="/kitap-detay/{{$book->id}}">
                                            <img class="card-img-top" src="{{asset('/uploads/books/').'/'.$book->photo}}" alt="{{$book->name}}" style="width:287px;  object-fit: cover;">
                                        </a>
                                        <div class="card-body">
                                            <p class="card-text">Kitap İsmi : {{$book->name}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
