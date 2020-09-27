@extends('layouts.admin')

@section('content')
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
        <div class="card">
            <h5 class="card-header bg-dark" style="color: white;">Talep Oluştur</h5>
            <div class="card-body">
                <form class="form-signin" action="{{route('refund.create')}}" method="post">

                    <div class="form-group ">
                        <label for="title" class="float-left h5">Başlık</label>
                        <input type="text" name="title" class="form-control" id="title"  placeholder="Type here title...">

                    </div>
                    <div class="form-group">
                        <label for="book_id" class="float-left h5">Kitap ID</label>
                        <input type="text" class="form-control" name="book_id" id="book_id"  placeholder="Type here book id...">

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
@endsection
