@extends('layouts.admin')

@section('content')
    @if(count($orders) > 0)
        <div class="error-container" style="margin-left: 13%; position: sticky;">
            @if(count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="alert alert-danger mb-0" role="alert" style="list-style-type:none;">{{$error}}
                            <button type="button" data-dismiss="alert" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="input-group" style="margin-left: 25%; width: 20%; margin-top: 100px;">
            <div class="card" style="margin-bottom: 200px;">
                <h5 class="card-header bg-dark" style="color: white;">Talep Oluştur</h5>
                <div class="card-body">
                    <form class="form-signin" action="{{route('refund.create')}}" method="post">

                        <div class="form-group ">
                            <label for="title" class="float-left h5">Başlık</label>
                            <input type="text" name="title" class="form-control" id="title"  placeholder="Type here title...">

                        </div>
                        <div class="form-group">
                            <label for="order_id" class="float-left h5">İlgili Siparişin Numarası</label>
                            <input list="orders" name="order_id" id="order_id">
                            <datalist id="orders">
                                @foreach($orders as $order)
                                    <option value="{{$order->id}}"></option>
                                @endforeach
                            </datalist>
                        </div>
                        <div class="form-group">
                            <label for="details" class="float-left h5">Detaylar</label>
                            <input type="text" class="form-control" name="details" id="details" placeholder="Type here  details...">
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-dark">Talebi oluştur</button>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="card" style="margin-left: 25%; margin-top: 10%; margin-bottom: 300px; height: 50%; width: 50%;">
                            <div class="card-header bg-dark">
                                <strong style="color: white;">Teslim edilmiş siparişiniz yok!</strong>
                            </div>
                            <div class="card-body">
                                <p>Teslim edilmiş siparişiniz olmadan iade talebi oluşturamazsınız.</p>
                            </div>
                            <div class="card-footer">
                                <a href="/admin" class="btn btn-primary">Anasayfaya Dön</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
