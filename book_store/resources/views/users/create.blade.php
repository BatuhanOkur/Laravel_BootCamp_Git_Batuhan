<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Create Employee</title>
</head>
<body class="text-center" style="background: #F7F7F7;">


<div class="input-group" style="margin-left: 45%; margin-top: 20%; margin-bottom: 20%;">
    <div class="card">
        <h5 class="card-header" style="background-color: #218838; color: white;">Employee Registry</h5>
        <div class="card-body">
            <form class="form-signin" action="/calisankaydet" method="post">
                <div class="form-group ">
                    <label for="name" class="float-left h5">Name</label>
                    <input type="text" name="name" class="form-control" id="name"  placeholder="Type here name...">

                </div>
                <div class="form-group">
                    <label for="email" class="float-left h5">Email address</label>
                    <input type="email" class="form-control" name="email" id="email"  placeholder="Type here  email address...">

                </div>
                <div class="form-group">
                    <label for="password" class="float-left h5">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Type here  password...">
                </div>
                <div class="form-group">
                    <label for="duty" class="float-left h5">Duty</label>
                    <input type="text" class="form-control" name="duty" id="duty" placeholder="Type here duty..">
                </div>
                <div class="form-group">
                    <label for="salary" class="float-left h5">Salary</label>
                    <input type="text" class="form-control" name="salary" id="salary" placeholder="Type here salary(per month)..">
                </div>
                @csrf
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
