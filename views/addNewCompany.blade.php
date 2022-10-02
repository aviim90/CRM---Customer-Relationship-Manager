<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Add Company</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5 mb-5">
                <div class="card-header">Add Company</div>
                <div class="card-body">
                    <form action="" method="POST">
                        <input type="hidden" name="action" value="insert">
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input name="name" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Address</label>
                            <input name="address" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Vat-Code</label>
                            <input name="vat_code" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Full Name</label>
                            <input name="company_name" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Phone</label>
                            <input name="phone" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control">
                        </div>



                        <button class="btn btn-success">Add</button>
                        <a href="index.php" class="btn btn-info float-end">Back</a>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

