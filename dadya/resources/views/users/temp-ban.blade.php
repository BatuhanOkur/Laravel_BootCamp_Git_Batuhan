@extends('layouts.admin')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="card" style="margin-left: 25%; margin-top: 100px;">
                        <div class="card-header bg-dark">
                            <strong>{{$user->name}} Kullanıcısını Süreli Yasaklama </strong> Formu
                        </div>
                        <div class="card-body card-block">
                            <form action="{{route('user.temp-ban',$user->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="datetime-local" id="date" name="date" class="form-control">
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Banla
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
