@extends('layouts.admin')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success" role="alert" style="width: 50%; margin-left: 30%; margin-top: 20px; position: sticky;">
            {{ session()->get('message') }}<button type="button" data-dismiss="alert" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>

        </div>
    @endif
    <div class="container">
        <div style=" margin-left: 10%; margin-top: 100px;">
            <a class="btn btn-primary" href="{{route('book.export')}}" >Tabloyu indir</a><a class="btn btn-primary" href="/kitap-ekle" >Kitap Ekle</a>
        </div>
        <table class="table " style="width: 100%;  margin-left: 10%; margin-bottom: 20px; text-align: center;">
            <thead class="thead bg-dark" style="color: white;">
            <tr>
                <th scope="col">Resim</th>
                <th scope="col">İsim</th>
                <th scope="col">Yazar</th>
                <th scope="col">Tür</th>
                <th scope="col">Adet</th>
                <th scope="col">Ücret</th>
                <th scope="col">Onay</th>
                <th scope="col">Ekleyen</th>
                <th scope="col">İşlemler</th>
            </tr>
            </thead>
            <tbody style="border: black 1px solid;">
            @foreach($books as $book)

                <tr bgcolor="white">
                    <th scope="row"><img src="{{asset('/uploads/books/').'/'.$book->photo}}" alt="{{$book->name}}" width="100px" height="100px"/></th>
                    <td>{{$book->name}}</td>
                    <td>{{$book->author}}</td>
                    <td>{{$book->type}}</td>
                    <td>{{$book->number}}</td>
                    <td>{{$book->price}}</td>
                    <td>{{$book->is_approved}}</td>
                    <td>{{$book->user[0]->name}}</td>
                    <td><a href="{{route('book.delete',$book->id)}}" class="btn btn-danger" onclick="return confirm('{{$book->name}} isimli kitabı silmek istediğinize emin misiniz?')"><i class="far fa-trash-alt"></i></a> <a href="/kitap-guncelle/{{$book->id}}" class="btn btn-primary"><i class="fas fa-edit"></i></a></td>

                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
@endsection








































