@extends('layouts.admin')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success" role="alert" style="margin-left: 16%; position: sticky;">
            {{ session()->get('message') }}<button type="button" data-dismiss="alert" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>

        </div>
    @endif
    <div class="container">
        <a href="/kullanici-ekle" class="btn btn-dark" style="margin-top: 20%; margin-left: 10%;" >Kullanıcı Ekle</a><a href="{{route('user.export')}}" class="btn btn-primary" style="margin-top: 20%; " >Tabloyu İndir</a>
        <table class="table " style="width: 85%;  margin-left: 10%; margin-bottom: 20%; text-align: center;">
            <thead class="thead bg-dark" style="color: white;">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">İşlemler</th>
            </tr>
            </thead>
            <tbody style="border: black 1px solid;">
            @foreach($users as $user)

                <tr bgcolor="white">
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td><a href="{{route('user.delete',$user->id)}}" class="btn btn-danger" onclick="return confirm('{{$user->name}} isimli kullanıcıyı silmek istediğinize emin misiniz?')"><i class="far fa-trash-alt"></i></a> <a href="/kullanici-guncelle/{{$user->id}}" class="btn btn-primary"><i class="fas fa-edit"></i></a> <a href="/kullanici-profil-karti/{{$user->id}}" class="btn btn-primary"><i class="far fa-eye"></i></a></td>

                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
@endsection








































