<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Companies Table</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <p>Companies</p>
                    <a class="btn btn-warning" href="addNewCompany.php">Add Company</a>
                </div>
                <div class="card-body text-center">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Vat</th>
                            <th>Company Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        @foreach($companies as $company)
                        <tbody>
                        <tr>
                            <td>{{$company->name}}</td>
                            <td>{{$company->address}}</td>
                            <td>{{$company->vat_code}}</td>
                            <td>{{$company->company_name}}</td>
                            <td>{{$company->phone}}</td>
                            <td>{{$company->email}}</td>
                            <td><a class="btn btn-success" href="updateCompany.php">Update</a></td>
                            <td><a class="btn btn-danger" href="?deleteCompany_id={{$company->id}}">Delete</a></td>
                        </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
