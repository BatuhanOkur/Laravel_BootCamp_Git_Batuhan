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
    <div class="container">
        <div class="input-group" style="margin-top: 10%; margin-left: 15%;">
            <div class="card" style="width: 30%">
                <h5 class="card-header bg-dark" style=" color: white;">Book Registry</h5>
                <div class="card-body">
                    <form class="form-signin" action="{{route('book.save')}}" method="post" enctype="multipart/form-data">
                        <div class="form-group ">
                            <label for="book_name" class="float-left h5">Kitap Adı</label>
                            <input type="text" name="book_name" class="form-control" id="book_name"  placeholder="Type here name...">

                        </div>
                        <div class="form-group">
                            <label for="author" class="float-left h5">Yazar</label>
                            <input type="text" name="author" class="form-control" id="author"  placeholder="Type here name...">

                        </div>
                        <div class="form-group">
                            <label for="type" class="float-left h5">Tür</label>
                            <input type="text" name="type" class="form-control" id="type"  placeholder="Type here type of book...">
                        </div>
                        <div class="form-group">
                            <label for="number" class="float-left h5">Adet</label>
                            <input type="text" name="number" class="form-control" id="number"  placeholder="Type here number...">
                        </div>
                        <div class="form-group">
                            <label for="price" class="float-left h5">Ücret</label>
                            <input type="text" class="form-control" name="price" id="price" placeholder="Type here book's price...">
                        </div>
                        <div class="form-group">
                            <label for="is_approved" class="float-left h5">Onay(Evetse 1 Hayırsa 0)</label>
                            <input type="text" class="form-control" name="is_approved" id="is_approved" placeholder="Type here approve situation...">
                        </div>
                        <div class="form-group">
                            <label for="created_by" class="float-left h5">Ekleyen</label>
                            <input type="text" class="form-control" name="created_by" id="created_by" placeholder="Type here creator(for database)...">
                        </div>
                        <div class="form-group">
                            <label for="photo" class="float-left h5">Fotoğraf</label>
                            <input type="file" name="photo"  class="form-control" >
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

