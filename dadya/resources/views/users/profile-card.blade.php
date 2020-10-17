@extends('layouts.admin')


@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success" role="alert" style="margin-left: 16%; position: sticky;">
            {{ session()->get('message') }}<button type="button" data-dismiss="alert" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>

        </div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger" role="alert" style="margin-left: 16%; position: sticky;">
            {{ session()->get('error') }}<button type="button" data-dismiss="alert" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>

        </div>
    @endif

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="card" style="margin-left: 25%; margin-bottom: 300px; margin-top: 100px;" >
                        <div class="card-header bg-dark">
                            <strong>{{$user->name}} İsimli Kullanıcının Profil Kartı</strong>
                        </div>
                        <div class="card-body">
                            <img src="{{$user->profile_photo_path}}" alt="PP" style="border-radius: 50%"><br>
                            <i class="fas fa-user"></i> <strong>{{$user->name}}</strong><br>
                            <i class="glyphicon glyphicon-envelope"></i> <strong>{{$user->email}}</strong><br>
                            <strong>Üyelik Türü : </strong> @if($user->admin == true) <strong>Admin</strong>  @else <strong>Üye</strong> @endif<br>
                            <strong>Yasaklanma Durumu : </strong> @if($user->banned_until == null) <strong>Yok</strong> @else @if(\Carbon\Carbon::now()->diffInDays($user->banned_until) > 14) <strong>Kalıcı Yasaklı</strong> @else  <strong>{{$user->banned_until}} tarihine kadar yasaklı</strong> @endif @endif
                        </div>
                        <div class="card-footer">
                            <a href="#" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">İşlemler</a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/kullanici-islemleri/sureli-yasakla/{{$user->id}}">Süreli Yasakla</a></li>
                                <li><a href="">Kalıcı Yasakla</a></li>
                            </ul>
                            @if($user->admin == false)
                                <form style="margin-top: 5px;"  method="post" action="{{route('user.setadmin',$user->id)}}">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Admin Yetkisi Ver</button>
                                </form>
                            @else
                                <form style="margin-top: 5px;" method="post" action="{{route('user.removeadmin',$user->id)}}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Admin Yetkisini Al</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
