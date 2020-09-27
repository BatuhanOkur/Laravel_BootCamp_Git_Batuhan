@extends('layouts.app')

@section('content')

    <div class="container"  >
        @if(count($books) == 0)
            <div class="container"  >
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="http://bestanimations.com/Books/flipping-pages-old-book-inspiration-animated-gif.gif" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">İyi kitaplar babalarını ebedîleştiren çocuklardır. <br>-Eflatun</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="http://bestanimations.com/Books/readig-book-cozy-fireplace-animated-gif.gif" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Bir kitap, içinizdeki donmuş değerleri parçalayarak bir balta olmalıdır. <br>-Franz Kafka</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="http://bestanimations.com/Books/pretty-scrapbook-turning-pages-animated-gif.gif" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">İçinde iyi yanı bulunmayacak kadar kötü kitap yoktur. <br>-Geothe</p>
                    </div>
                </div>
            </div>
        @endif
        @foreach($books as $book)
            @if($book->number > 0 and $book->deleted_at == null)
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset('/uploads/books/').'/'.$book->photo}}" alt="{{$book->name}}">
                    <div class="card-body">
                        <p class="card-text">Kitap : {{$book->name}}<br>Yazar : {{$book->author}}<br>Fiyat : {{$book->price}}</p>
                        <div class="card-footer text-muted float-left">
                            Stokta bu üründen {{$book->number}} adet bulunuyor.
                        </div>
                        <a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Sepete Ekle</a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection

