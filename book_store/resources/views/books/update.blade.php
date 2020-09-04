<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Create Book</title>
</head>
<body class="text-center" style="background: #F7F7F7;">


<div class="input-group" style="margin-left: 45%; margin-top: 20%; margin-bottom: 20%;">
    <div class="card">
        <h5 class="card-header" style="background-color: #218838; color: white;">Book Registry</h5>
        <div class="card-body">
            <form class="form-signin" action="/kitapguncelle/{{$book->id}}" method="post">
                <div class="form-group ">
                    <label for="book_name" class="float-left h5">Book Name</label>
                    <input type="text" name="book_name" class="form-control" value="{{$book->name}}" id="book_name"  placeholder="Type here name...">

                </div>
                <div class="form-group">
                    <label for="author" class="float-left h5">Author</label>
                    <input type="text" name="author" class="form-control" id="author" value="{{$book->author}}"  placeholder="Type here name...">

                </div>
                <div class="form-group">
                    <label for="type" class="float-left h5">Type</label>
                    <input type="text" name="type" class="form-control" id="type" value="{{$book->type}}"  placeholder="Type here type of book...">
                </div>
                <div class="form-group">
                    <label for="number" class="float-left h5">Number</label>
                    <input type="text" name="number" class="form-control" id="number" value="{{$book->number}}"  placeholder="Type here number...">
                </div>
                <div class="form-group">
                    <label for="price" class="float-left h5">Price</label>
                    <input type="text" class="form-control" name="price" id="price" value="{{$book->price}}" placeholder="Type here book's price...">
                </div>
                <div class="form-group">
                    <label for="created_by" class="float-left h5">Created By</label>
                    <input type="text" class="form-control" name="created_by" id="created_by" value="{{$book->created_by}}" placeholder="Type here creator(for database)...">
                </div>
                <div class="form-group">
                    <label for="updated_by" class="float-left h5">Updated By</label>
                    <input type="text" class="form-control" name="updated_by" id="updated_by" value="{{$book->updated_by}}" placeholder="Type here last updater(for database)...">
                </div>
                @csrf
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
