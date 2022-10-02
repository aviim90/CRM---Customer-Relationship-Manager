<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Login Page</title>
</head>
<body>
<div class="container d-flex vh-100 justify-content-center align-items-center">
    <div class="row">
        <div class="col-md-12">
            <div class="card text-center text-bg-dark bg-opacity-75">
                <div class="card-body align-items-center p-5 ">
                    <form action="login.php" method="post">
                        <input type="hidden" name="action" value="login">
                        <div class="mb-3">
                            <label for="weight" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="height" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary col-12" type="submit" name="submit">Login</button>
                        </div>
                        <div>
                            <span class="text-danger">{{$message}}</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>