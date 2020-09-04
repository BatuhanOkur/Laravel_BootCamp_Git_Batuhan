<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Book List</title>
    <style>
        .btn-danger:hover{
            background-color: #ffffff;
            color: #C82333;
        }
        .btn-primary:hover{
            background-color: white;
            color: #0069D9;
        }
        body{
            background-color: #F7F7F7;
        }
        tbody{
            border: black 1px solid;
        }
        .btn-success:hover{
            background-color: white;
            color: #218838;
        }
    </style>
</head>
<body>
<a href="/kitapkayit" class="btn btn-success" style="margin-top: 20%; margin-left: 10%;" >Kitap Ekle</a>
<table class="table" style="width: 85%;  margin-left: 10%; text-align: center;">
    <thead class="thead" style="background-color: #218838; color: white;">
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Author</th>
        <th scope="col">Type</th>
        <th scope="col">Number</th>
        <th scope="col">Price</th>
        <th scope="col">Created By</th>
        <th scope="col">Updated By</th>
        <th scope="col">İşlemler</th>
    </tr>
    </thead>
    <tbody>
    @foreach($books as $book)

        <tr bgcolor="white">
            <td scope="row">{{$book->name}}</td>
            <td>{{$book->author}}</td>
            <td>{{$book->type}}</td>
            <td>{{$book->number}}</td>
            <td>{{$book->type}}</td>
            <td>{{$book->created_by}}</td>
            <td>{{$book->updated_by}}</td>
            <td><a href="/kitapsil/{{$book->id}}" class="btn btn-danger" >Sil</a> <a href="/kitapguncelle/{{$book->id}}" class="btn btn-primary">Güncelle</a></td>

        </tr>
    @endforeach


    </tbody>
</table>

</body>
</html>







































