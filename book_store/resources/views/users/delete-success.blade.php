<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Sayfa Mesajı</title>
    <style>
        .btn-success:hover{
            background-color: white;
            color: #218838;
        }
    </style>
</head>
<body class="text-center" style="background: #F7F7F7;">


<div class="card" style="width: 85%; margin-top: 10%; margin-left: 10%; text-align: center;">
    <h5 class="card-header" style="background-color: #218838; color: white;">Sayfa Mesajı</h5>
    <div class="card-body">
        <h5 class="card-title">Çalışan silme işlemi başarılı!</h5>
        <p class="card-text">Seçtiğiniz {{$employee->id}} ID'li çalışan listeden silindi.</p>
        <a href="/calisanliste" class="btn btn-success">Çalışan listesine geri dön.</a>
    </div>
</div>

</body>
</html>
