<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        .btn-danger:hover{
            background-color: white;
            color: #C82333;
        }
        .btn-primary:hover{
            background-color: white;
            color: #0069D9;
        }
    </style>
</head>
<body>

<table class="table float-right" style="width: 80%; margin-top: 10%; margin-left: 10%; text-align: center;">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
        <th scope="col">İşlem</th>
    </tr>
    </thead>
    <tbody>
        @foreach($users as $user)

            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->password}}</td>
                <td><a class="btn btn-danger" href="/sil/{{$user->id}}">Sil</a>
                    <a class="btn btn-primary" href="/guncelle/{{$user->id}}">Güncelle</a>
                </td>

            </tr>
        @endforeach

    </tbody>
</table>

</body>
</html>
