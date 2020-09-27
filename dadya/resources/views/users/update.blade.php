@extends('layouts.admin')

@section('content')
    <div class="error-container" style="margin-left: 13%; position: sticky;">
        @if(count($errors) > 0)
            <ul>
                @foreach($errors->all() as $error)
                    <li class="alert alert-danger mb-0" role="alert" style="list-style-type:">{{$error}}
                        <button type="button" data-dismiss="alert" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="input-group" style="margin-left: 45%; margin-top: 100px;">
        <div class="card">
            <h5 class="card-header bg-dark" style="color: white;">Çalışan Ekle</h5>
            <div class="card-body">
                <form class="form-signin" action="{{route('user.update',$user->id)}}" method="post">

                    <div class="form-group ">
                        <label for="name" class="float-left h5">İsim</label>
                        <input type="text" name="name" value="{{$user->name}}" class="form-control" id="name"  placeholder="Type here name...">

                    </div>
                    <div class="form-group">
                        <label for="email" class="float-left h5">Email</label>
                        <input type="email" class="form-control" value="{{$user->email}}" name="email" id="email"  placeholder="Type here  email address...">

                    </div>
                    <div class="form-group">
                        <label for="password" class="float-left h5">Şifre</label>
                        <input type="password" class="form-control"  name="password" id="password" placeholder="Type here  password...">
                    </div>
                    <div class="form-group">
                        <label for="admin" class="float-left h5">Admin(Evetse 1 Hayırsa 0)</label>
                        <input type="text" class="form-control" name="admin" id="admin" value="{{$user->admin}}" placeholder="Type here admin situation...">
                    </div>
                    @csrf
                    <button type="submit" class="btn btn-dark">Ekle</button>
                </form>
            </div>
        </div>
    </div>
@endsection
