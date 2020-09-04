<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Employee List</title>
    <style>
        .btn-danger:hover{
            background-color: white;
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
<a href="/kurtar" class="btn btn-success" style="margin-top: 20%; margin-left: 10%;" >Geri getir</a>
<table class="table" style="width: 85%;  margin-left: 10%; text-align: center;">
    <thead class="thead" style="background-color: #218838; color: white;">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Password</th>
        <th scope="col">Duty</th>
        <th scope="col">Salary</th>
        <th scope="col">İşlemler</th>
    </tr>
    </thead>
    <tbody>
    @foreach($employees as $employee)

        <tr bgcolor="white">
            <th scope="row">{{$employee->id}}</th>
            <td>{{$employee->name}}</td>
            <td>{{$employee->email}}</td>
            <td>{{$employee->password}}</td>
            <td>{{$employee->duty}}</td>
            <td>{{$employee->salary}}</td>
            <td><a href="/calisansil/{{$employee->id}}" class="btn btn-danger" >Sil</a> <a href="/calisanguncelle/{{$employee->id}}" class="btn btn-primary">Güncelle</a></td>

        </tr>
    @endforeach


    </tbody>
</table>

</body>
</html>







































