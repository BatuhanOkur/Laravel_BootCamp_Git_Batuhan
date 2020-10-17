@extends('layouts.app')
@section('title')
    Siparişiniz Alındı
@endsection

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="card" style="margin-left: 25%; margin-top: 10px;">
                        <div class="card-header bg-dark">
                            <strong style="color: white;">Siparişiniz alındı!</strong>
                        </div>
                        <div class="card-body">
                            <p>Siparişiniz tarafımıza ulaştı,en yakın zamanda işleme alınacaktır.Bizi tercih ettiğiniz için teşekkür ederiz !</p>
                        </div>
                        <div class="card-footer">
                            <a href="/" class="btn btn-primary">Anasayfaya Dön</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
